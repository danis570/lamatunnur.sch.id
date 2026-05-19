<?php

namespace Danish\LamatunnurSchId\Controller;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Exception\ValidationException;
use Danish\LamatunnurSchId\Model\StudentRegistrationRequest;
use Danish\LamatunnurSchId\Repository\StudentRegistrationRepository;
use Danish\LamatunnurSchId\Service\FileUploadService;
use Danish\LamatunnurSchId\Service\StudentRegistrationService;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class StudentController
{
    private StudentRegistrationService $studentRegistrationService;
    private FileUploadService $fileUploadService;

    public function __construct()
    {
        $connection = Database::getConnection('prod');
        $studentRegistrationRepository = new StudentRegistrationRepository($connection);
        $this->fileUploadService = new FileUploadService();
        $this->studentRegistrationService = new StudentRegistrationService(
            $studentRegistrationRepository,
            $this->fileUploadService
        );

        // Start session untuk multi-step
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Multi-step registration form
    public function registrationMultiStep()
    {
        $currentStep = (int) ($_GET['step'] ?? 1);

        // Validasi step
        if ($currentStep < 1 || $currentStep > 3) {
            $currentStep = 1;
        }

        // Ambil data dari session jika ada
        $formData = $_SESSION['registration_form_data'] ?? [];
        $error = $_SESSION['registration_error'] ?? null;

        // Clear error setelah ditampilkan
        unset($_SESSION['registration_error']);

        View::render('Student/registration_multi', [
            'title' => 'Pendaftaran Santri baru',
            'currentStep' => $currentStep,
            'formData' => $formData,
            'error' => $error
        ]);
    }

    // Process each step
    public function postRegistrationStep()
    {
        // Debug
        error_log("=== postRegistrationStep CALLED ===");
        error_log("Step: " . ($_POST['step'] ?? 'not set'));
        error_log("POST data: " . print_r($_POST, true));

        $step = (int) ($_POST['step'] ?? 1);

        // Initialize session data
        if (!isset($_SESSION['registration_form_data'])) {
            $_SESSION['registration_form_data'] = [];
        }

        // Save data to session FIRST (sebelum validasi)
        $this->saveStepData($step, $_POST, $_FILES);

        // Debug: cek session setelah save
        error_log("Session after save: " . print_r($_SESSION['registration_form_data'], true));

        // Validate current step (setelah data disimpan)
        $validationError = $this->validateStep($step, $_POST, $_FILES);

        if ($validationError) {
            error_log("Validation error: " . $validationError);
            $_SESSION['registration_error'] = $validationError;
            header("Location: /students/registration-multi?step=" . $step);
            exit;
        }

        // Move to next step or process final
        if ($step == 3) {
            error_log("Step 3 - Processing final registration");
            $this->processFinalRegistration();
        } else {
            $nextStep = $step + 1;
            error_log("Moving to step: " . $nextStep);
            header("Location: /students/registration-multi?step=" . $nextStep);
            exit;
        }
    }

    private function validateStep(int $step, array $postData, array $files): ?string
    {
        switch ($step) {
            case 1:
                if (empty(trim($postData['full_name'] ?? ''))) {
                    return "Nama lengkap wajib diisi";
                }
                if (empty(trim($postData['student_nik'] ?? ''))) {
                    return "NIK wajib diisi";
                }
                if (empty(trim($postData['birth_place'] ?? ''))) {
                    return "Tempat lahir wajib diisi";
                }
                if (empty($postData['birth_date'] ?? '')) {
                    return "Tanggal lahir wajib diisi";
                }
                if (empty(trim($postData['address'] ?? ''))) {
                    return "Alamat wajib diisi";
                }
                if (empty(trim($postData['gender'] ?? ''))) {
                    return "Jenis kelamin wajib dipilih";
                }
                if (empty(trim($postData['religion'] ?? ''))) {
                    return "Agama wajib diisi";
                }
                // parent_phone TIDAK WAJIB - comment atau hapus
                // if (empty(trim($postData['parent_phone'] ?? ''))) {
                //     return "No HP Orang Tua wajib diisi";
                // }
                break;
            case 2:
                // Data sekolah opsional, bisa kosong
                break;
            case 3:
                // Data orang tua opsional, bisa kosong
                break;
        }
        return null;
    }

    private function saveStepData(int $step, array $postData, array $files)
    {
        $stepFields = [
            1 => [
                'full_name',
                'birth_place',
                'birth_date',
                'student_nik',
                'address',
                'gender',
                'child_order',
                'total_siblings',
                'religion',
                'parent_phone'
            ],
            2 => ['school_name', 'school_class', 'school_address'],
            3 => [
                'father_name',
                'father_job',
                'mother_name',
                'mother_job',
                'parent_address',
                'guardian_name',
                'guardian_job',
                'guardian_address'
            ]
        ];

        $fields = $stepFields[$step] ?? [];

        foreach ($fields as $field) {
            if (isset($postData[$field])) {
                $_SESSION['registration_form_data'][$field] = $postData[$field];
                error_log("Saved field {$field} = {$postData[$field]}");
            }
        }

        // Handle file upload di step 1
        if ($step == 1 && isset($files['img']) && $files['img']['error'] === UPLOAD_ERR_OK) {
            try {
                $uploadedFile = $this->fileUploadService->uploadStudentPhoto($files['img']);
                if ($uploadedFile) {
                    $_SESSION['registration_form_data']['img'] = $uploadedFile;
                    error_log("Uploaded file: " . $uploadedFile);
                }
            } catch (\Exception $e) {
                error_log("Upload error: " . $e->getMessage());
                $_SESSION['registration_error'] = $e->getMessage();
            }
        }
    }

    private function processFinalRegistration()
    {
        error_log("=== processFinalRegistration CALLED ===");

        $data = $_SESSION['registration_form_data'] ?? [];
        error_log("Final session data: " . print_r($data, true));

        $request = new StudentRegistrationRequest();

        // Set all properties
        $request->img = $data['img'] ?? null;
        $request->full_name = $data['full_name'] ?? '';
        $request->birth_place = $data['birth_place'] ?? '';
        $request->birth_date = $data['birth_date'] ?? '';
        $request->student_nik = $data['student_nik'] ?? '';
        $request->address = $data['address'] ?? '';
        $request->gender = $data['gender'] ?? '';
        $request->child_order = (int) ($data['child_order'] ?? 0);
        $request->total_siblings = (int) ($data['total_siblings'] ?? 0);
        $request->religion = $data['religion'] ?? '';
        $request->parent_phone = $data['parent_phone'] ?? '';
        $request->school_name = $data['school_name'] ?? null;
        $request->school_class = $data['school_class'] ?? null;
        $request->school_address = $data['school_address'] ?? null;
        $request->father_name = $data['father_name'] ?? null;
        $request->father_job = $data['father_job'] ?? null;
        $request->mother_name = $data['mother_name'] ?? null;
        $request->mother_job = $data['mother_job'] ?? null;
        $request->parent_address = $data['parent_address'] ?? null;
        $request->guardian_name = $data['guardian_name'] ?? null;
        $request->guardian_job = $data['guardian_job'] ?? null;
        $request->guardian_address = $data['guardian_address'] ?? null;
        $request->is_re_registered = isset($data['is_re_registered']) ? 1 : 0;

        try {
            $response = $this->studentRegistrationService->registration($request);
            error_log("Registration success! Student ID: " . $response->studentRegistration->id);

            // Clear session data
            unset($_SESSION['registration_form_data']);

            // Set success message
            $_SESSION['last_registered_id'] = $response->studentRegistration->id;
            $_SESSION['registration_success'] = true;

            error_log("Redirecting to /students/registration-success");
            header("Location: /students/registration-success");
            exit;

        } catch (ValidationException $e) {
            error_log("Validation error: " . $e->getMessage());
            $_SESSION['registration_error'] = $e->getMessage();
            header("Location: /students/registration-multi?step=3");
            exit;
        } catch (\PDOException $e) {

            error_log("PDO Error: " . $e->getMessage());

            // Duplicate NIK
            if (
                str_contains($e->getMessage(), 'student_nik') ||
                str_contains($e->getMessage(), 'Duplicate entry')
            ) {

                $_SESSION['registration_error'] =
                    "NIK santri sudah terdaftar. Silakan periksa lagi atau hubungi admin jika merasa sudah benar.";
            } else {

                $_SESSION['registration_error'] =
                    "Terjadi kesalahan pada sistem. Silakan coba lagi.";

            }

            header("Location: /students/registration-multi?step=3");
            exit;

        } catch (\Exception $e) {

            error_log("General error: " . $e->getMessage());

            $_SESSION['registration_error'] =
                "Terjadi kesalahan. Silakan coba beberapa saat lagi.";

            header("Location: /students/registration-multi?step=3");
            exit;
        }
    }

    public function cancelRegistration()
    {
        unset($_SESSION['registration_form_data']);
        unset($_SESSION['registration_error']);
        header("Location: /");
        exit;
    }


    public function registration()
    {
        View::render('Student/registration', [
            'title' => 'Student Registration'
        ]);
    }

    public function postRegistration()
    {
        $request = new StudentRegistrationRequest();

        $request->img = $this->fileUploadService
            ->uploadStudentPhoto($_FILES['img']);

        $request->full_name = $_POST['full_name'];
        $request->birth_place = $_POST['birth_place'];
        $request->birth_date = $_POST['birth_date'];
        $request->student_nik = $_POST['student_nik'];
        $request->address = $_POST['address'];
        $request->gender = $_POST['gender'];

        $request->child_order = (int) $_POST['child_order'];
        $request->total_siblings = (int) $_POST['total_siblings'];

        $request->religion = $_POST['religion'];
        $request->parent_phone = $_POST['parent_phone'];

        $request->school_name = $_POST['school_name'] ?? null;
        $request->school_class = $_POST['school_class'] ?? null;
        $request->school_address = $_POST['school_address'] ?? null;

        $request->father_name = $_POST['father_name'] ?? null;
        $request->father_job = $_POST['father_job'] ?? null;

        $request->mother_name = $_POST['mother_name'] ?? null;
        $request->mother_job = $_POST['mother_job'] ?? null;

        $request->parent_address = $_POST['parent_address'] ?? null;

        $request->guardian_name = $_POST['guardian_name'] ?? null;
        $request->guardian_job = $_POST['guardian_job'] ?? null;
        $request->guardian_address = $_POST['guardian_address'] ?? null;

        $request->is_re_registered = isset($_POST['is_re_registered']) ? 1 : 0;

        try {
            $response = $this->studentRegistrationService->registration($request);

            // Simpan ID student yang baru registrasi ke session
            session_start();
            $_SESSION['last_registered_id'] = $response->studentRegistration->id;
            $_SESSION['registration_success'] = true;

            // Redirect ke halaman success
            View::redirect('/students/registration-success');

        } catch (ValidationException $exception) {
            View::render('Student/registration', [
                'title' => 'Student Registration',
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Tambahkan method baru untuk halaman success
    // Perbaiki method registrationSuccess()
    public function registrationSuccess()
    {
        // Cek apakah session sudah aktif sebelum memulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $studentId = $_SESSION['last_registered_id'] ?? null;
        $registrationSuccess = $_SESSION['registration_success'] ?? false;

        if (!$studentId || !$registrationSuccess) {
            View::redirect('/students/registration');
            return;
        }

        $student = $this->studentRegistrationService->findById($studentId);

        View::render('Student/registration_success', [
            'title' => 'Registrasi Berhasil',
            'student' => $student,
            'studentId' => $studentId
        ]);
    }

    public function data()
    {
        // Pastikan session aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $allStudents = $this->studentRegistrationService->findAll();

        // Ambil dari session
        $currentUser = $_SESSION['user'] ?? null;
        $userRole = $currentUser['role'] ?? 'guest';

        // DEBUG
        error_log("=== DATA CONTROLLER ===");
        error_log("Session user: " . print_r($_SESSION['user'], true));
        error_log("User Role: " . $userRole);

        View::render('Student/data', [
            'title' => 'Student Data',
            'students' => $allStudents,
            'user' => $currentUser,
            'userRole' => $userRole  // WAJIB dikirim
        ]);
    }

    public function edit(int $id)
    {
        $student = $this->studentRegistrationService
            ->findById($id);

        if ($student == null) {

            View::redirect('/students/data');

            return;
        }

        View::render('Student/edit', [
            'title' => 'Edit Student',
            'student' => $student
        ]);
    }

    public function update()
    {
        $request = new StudentRegistrationRequest();

        $request->id = isset($_POST['id']) ? (int) $_POST['id'] : null;

        if (!$request->id) {
            View::redirect('/students/data');
            return;
        }

        // Ambil data student lama untuk mendapatkan gambar
        $existingStudent = $this->studentRegistrationService->findById($request->id);

        // Proses upload gambar
        $imageName = $existingStudent ? $existingStudent->img : null; // Default pakai gambar lama

        // Cek apakah ada upload file baru
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/photos/students-registration/';

            // Buat folder jika belum ada
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Validasi file
            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
            $fileType = mime_content_type($_FILES['img']['tmp_name']);

            if (in_array($fileType, $allowedTypes)) {
                // Hapus gambar lama jika ada
                if ($existingStudent && $existingStudent->img && file_exists($uploadDir . $existingStudent->img)) {
                    unlink($uploadDir . $existingStudent->img);
                }

                // Upload gambar baru
                $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                $imageName = time() . '_' . uniqid() . '.' . $extension;
                $uploadPath = $uploadDir . $imageName;

                if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadPath)) {
                    $imageName = $existingStudent ? $existingStudent->img : null;
                }
            }
        }

        // Cek apakah user ingin menghapus gambar
        if (isset($_POST['delete_image']) && $_POST['delete_image'] == '1') {
            if ($existingStudent && $existingStudent->img) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/photos/students-registration/';
                if (file_exists($uploadDir . $existingStudent->img)) {
                    unlink($uploadDir . $existingStudent->img);
                }
            }
            $imageName = null;
        }

        // DATA WAJIB
        $request->full_name = trim($_POST['full_name'] ?? '');
        $request->student_nik = trim($_POST['student_nik'] ?? '');

        if ($request->full_name === '' || $request->student_nik === '') {
            View::render('Student/edit', [
                'error' => 'Nama dan NIK wajib diisi',
                'student' => $request
            ]);
            return;
        }

        // DATA LAIN
        $request->birth_place = $_POST['birth_place'] ?? '';
        $request->birth_date = $_POST['birth_date'] ?? '';
        $request->address = $_POST['address'] ?? '';
        $request->gender = ($_POST['gender'] === 'Laki-laki') ? 'L' : 'P';

        $request->child_order = (int) ($_POST['child_order'] ?? 0);
        $request->total_siblings = (int) ($_POST['total_siblings'] ?? 0);

        $request->religion = $_POST['religion'] ?? '';
        $request->parent_phone = $_POST['parent_phone'] ?? '';

        $request->school_name = $_POST['school_name'] ?? '';
        $request->school_class = $_POST['school_class'] ?? '';
        $request->school_address = $_POST['school_address'] ?? '';

        $request->father_name = $_POST['father_name'] ?? '';
        $request->father_job = $_POST['father_job'] ?? '';
        $request->mother_name = $_POST['mother_name'] ?? '';
        $request->mother_job = $_POST['mother_job'] ?? '';
        $request->parent_address = $_POST['parent_address'] ?? '';

        $request->guardian_name = $_POST['guardian_name'] ?? '';
        $request->guardian_job = $_POST['guardian_job'] ?? '';
        $request->guardian_address = $_POST['guardian_address'] ?? '';

        $request->is_re_registered = (isset($_POST['is_re_registered']) && $_POST['is_re_registered'] == '1') ? 1 : 0;

        // Set gambar ke request
        $request->img = $imageName;

        try {
            $this->studentRegistrationService->update($request);

            View::redirect('/students/data');
        } catch (\Exception $e) {
            View::render('Student/edit', [
                'error' => $e->getMessage(),
                'student' => $request
            ]);
        }
    }
    public function delete()
    {
        $id = (int) $_POST['id'];

        try {

            $this->studentRegistrationService
                ->deleteById($id);

            View::redirect('/students/data');

        } catch (ValidationException $exception) {

            View::redirect('/students/data');
        }
    }

    public function deleteMultiple()
    {
        $studentIds =
            $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/students/data');

            return;
        }

        foreach ($studentIds as $id) {

            try {

                $this->studentRegistrationService
                    ->deleteById((int) $id);

            } catch (\Exception $e) {

                // skip jika ada error
                continue;
            }
        }

        View::redirect('/students/data');
    }

    public function exportPdf(int $id)
    {
        $student =
            $this->studentRegistrationService
                ->findById($id);

        if ($student == null) {

            View::redirect('/students/data');

            return;
        }

        ob_start();

        require __DIR__ .
            '/../View/Pdf/student-biodata.php';

        $html = ob_get_clean();

        $options = new Options();

        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream(
            'biodata-santri.pdf',
            [
                'Attachment' => true
            ]
        );
    }

    public function exportPdfMultiple()
    {
        $studentIds = $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/students/data');

            return;
        }

        $students = [];

        foreach ($studentIds as $id) {

            $student =
                $this->studentRegistrationService
                    ->findById((int) $id);

            if ($student != null) {

                $students[] = $student;
            }
        }

        ob_start();

        require __DIR__ .
            '/../View/Pdf/student-multiple.php';

        $html = ob_get_clean();

        $options = new Options();

        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();


        // PENTING
        while (ob_get_level()) {
            ob_end_clean();
        }

        $dompdf->stream(
            'biodata-santri.pdf',
            [
                'Attachment' => true
            ]
        );

        exit;
    }

    public function exportExcelMultiple()
    {
        $studentIds = $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/students/data');

            return;
        }

        $students = [];

        foreach ($studentIds as $id) {

            $student =
                $this->studentRegistrationService
                    ->findById((int) $id);

            if ($student != null) {

                $students[] = $student;
            }
        }

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        // HEADER

        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NAMA LENGKAP');
        $sheet->setCellValue('C1', 'TEMPAT LAHIR');
        $sheet->setCellValue('D1', 'TANGGAL LAHIR');
        $sheet->setCellValue('E1', 'NIK');
        $sheet->setCellValue('F1', 'ALAMAT');
        $sheet->setCellValue('G1', 'JENIS KELAMIN');

        $sheet->setCellValue('H1', 'ANAK KE');
        $sheet->setCellValue('I1', 'JUMLAH SAUDARA');

        $sheet->setCellValue('J1', 'AGAMA');
        $sheet->setCellValue('K1', 'NO HP ORANG TUA');

        $sheet->setCellValue('L1', 'NAMA SEKOLAH');
        $sheet->setCellValue('M1', 'KELAS');
        $sheet->setCellValue('N1', 'ALAMAT SEKOLAH');

        $sheet->setCellValue('O1', 'NAMA AYAH');
        $sheet->setCellValue('P1', 'PEKERJAAN AYAH');

        $sheet->setCellValue('Q1', 'NAMA IBU');
        $sheet->setCellValue('R1', 'PEKERJAAN IBU');

        $sheet->setCellValue('S1', 'ALAMAT ORANG TUA');

        $sheet->setCellValue('T1', 'NAMA WALI');
        $sheet->setCellValue('U1', 'PEKERJAAN WALI');
        $sheet->setCellValue('V1', 'ALAMAT WALI');

        $sheet->setCellValue('W1', 'STATUS DAFTAR ULANG');

        // DATA

        $row = 2;
        $no = 1;

        foreach ($students as $student) {

            $sheet->setCellValue('A' . $row, $no++);

            $sheet->setCellValue('B' . $row, $student->full_name);

            $sheet->setCellValue('C' . $row, $student->birth_place);

            $sheet->setCellValue('D' . $row, $student->birth_date);

            // NIK sebagai STRING
            $sheet->setCellValueExplicit(
                'E' . $row,
                $student->student_nik,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );

            $sheet->setCellValue('F' . $row, $student->address);

            $sheet->setCellValue('G' . $row, $student->gender);

            $sheet->setCellValue('H' . $row, $student->child_order);

            $sheet->setCellValue('I' . $row, $student->total_siblings);

            $sheet->setCellValue('J' . $row, $student->religion);

            $sheet->setCellValueExplicit(
                'K' . $row,
                $student->parent_phone,
                \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING
            );

            $sheet->setCellValue('L' . $row, $student->school_name);

            $sheet->setCellValue('M' . $row, $student->school_class);

            $sheet->setCellValue('N' . $row, $student->school_address);

            $sheet->setCellValue('O' . $row, $student->father_name);

            $sheet->setCellValue('P' . $row, $student->father_job);

            $sheet->setCellValue('Q' . $row, $student->mother_name);

            $sheet->setCellValue('R' . $row, $student->mother_job);

            $sheet->setCellValue('S' . $row, $student->parent_address);

            $sheet->setCellValue('T' . $row, $student->guardian_name);

            $sheet->setCellValue('U' . $row, $student->guardian_job);

            $sheet->setCellValue('V' . $row, $student->guardian_address);

            $sheet->setCellValue(
                'W' . $row,
                $student->is_re_registered
                ? 'Sudah'
                : 'Belum'
            );

            $row++;
        }

        // CLEAN BUFFER

        if (ob_get_length()) {
            ob_end_clean();
        }

        // HEADER DOWNLOAD

        $fileName =
            'students-' .
            date('Y-m-d-H-i-s') .
            '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header(
            'Content-Disposition: attachment; filename="' .
            $fileName .
            '"'
        );

        header('Cache-Control: max-age=0');

        // WRITER

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output');

        exit;
    }

    public function show(int $id)
    {
        $student = $this->studentRegistrationService->findById($id);

        if ($student == null) {
            View::redirect('/students/data');
            return;
        }

        // Ambil role user
        $currentUser = $_SESSION['user'] ?? null;
        $userRole = $currentUser['role'] ?? 'guest';

        View::render('Student/show', [
            'title' => 'Detail Student',
            'student' => $student,
            'userRole' => $userRole  // Kirim juga ke view show
        ]);
    }

    public function acceptMultiple()
    {
        $ids = $_POST['student_ids'] ?? [];

        if (empty($ids)) {
            header("Location: /students/data");
            exit;
        }

        $connection = \Danish\LamatunnurSchId\Config\Database::getConnection('prod');

        $repo = new \Danish\LamatunnurSchId\Repository\StudentRegistrationRepository($connection);

        $repo->acceptMultiple($ids);

        header("Location: /students/data");
        exit;
    }


}