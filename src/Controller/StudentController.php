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
        $connection = Database::getConnection();
        $studentRegistrationRepository = new StudentRegistrationRepository($connection);

        // 2. ISI NILAI AWAL / INITIALIZE PROPERTI DI SINI
        $this->fileUploadService = new FileUploadService();

        // 3. Masukkan ke service
        $this->studentRegistrationService = new StudentRegistrationService(
            $studentRegistrationRepository,
            $this->fileUploadService
        );
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

            $this->studentRegistrationService->registration($request);

            View::redirect('/students/registration');

        } catch (ValidationException $exception) {

            View::render('Student/registration', [
                'title' => 'Student Registration',
                'error' => $exception->getMessage()
            ]);

        }
    }

    public function edit(int $id)
    {
        $student = $this->studentRegistrationService
            ->findById($id);

        if ($student == null) {

            View::redirect('/');

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
            View::redirect('/');
            return;
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
        $request->gender = $_POST['gender'] ?? '';

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

        try {
            $this->studentRegistrationService->update($request);

            View::redirect('/');
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

            View::redirect('/');

        } catch (ValidationException $exception) {

            View::redirect('/');
        }
    }

    public function deleteMultiple()
    {
        $studentIds =
            $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/');

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

        View::redirect('/');
    }

    public function exportPdf(int $id)
    {
        $student =
            $this->studentRegistrationService
                ->findById($id);

        if ($student == null) {

            View::redirect('/');

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
                'Attachment' => false
            ]
        );
    }

    public function exportPdfMultiple()
    {
        $studentIds = $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/');

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

        $dompdf->stream(
            'biodata-santri.pdf',
            [
                'Attachment' => false
            ]
        );
    }

    public function exportExcelMultiple()
    {
        $studentIds = $_POST['student_ids'] ?? [];

        if (empty($studentIds)) {

            View::redirect('/');

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
        $student =
            $this->studentRegistrationService
                ->findById($id);

        if ($student == null) {

            View::redirect('/');

            return;
        }

        View::render('Student/show', [
            'title' => 'Detail Student',
            'student' => $student
        ]);
    }

    public function acceptMultiple()
    {
        $ids = $_POST['student_ids'] ?? [];

        if (empty($ids)) {
            header("Location: /");
            exit;
        }

        $connection = \Danish\LamatunnurSchId\Config\Database::getConnection('prod');

        $repo = new \Danish\LamatunnurSchId\Repository\StudentRegistrationRepository($connection);

        $repo->acceptMultiple($ids);

        header("Location: /");
        exit;
    }

}