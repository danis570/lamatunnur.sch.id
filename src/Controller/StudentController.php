<?php

namespace Danish\LamatunnurSchId\Controller;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Exception\ValidationException;
use Danish\LamatunnurSchId\Model\StudentRegistrationRequest;
use Danish\LamatunnurSchId\Repository\StudentRegistrationRepository;
use Danish\LamatunnurSchId\Service\FileUploadService;
use Danish\LamatunnurSchId\Service\StudentRegistrationService;

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

        $request->is_re_registered = isset($_POST['is_re_registered']);

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

        // 1. Ambil data ID terlebih dahulu
        $request->id = (int) ($_POST['id'] ?? 0);

        // 2. WAJIB ISI semua properti teks dari $_POST agar tidak memicu error uninitialized
        $request->full_name = $_POST['full_name'] ?? '';
        $request->student_nik = $_POST['student_nik'] ?? '';
        $request->birth_place = $_POST['birth_place'] ?? ''; // Baris ini yang memicu error sebelumnya
        $request->birth_date = $_POST['birth_date'] ?? '';
        $request->address = $_POST['address'] ?? '';
        $request->gender = $_POST['gender'] ?? '';

        $request->child_order = isset($_POST['child_order']) ? (int) $_POST['child_order'] : 0;
        $request->total_siblings = isset($_POST['total_siblings']) ? (int) $_POST['total_siblings'] : 0;

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

        $request->is_re_registered = isset($_POST['is_re_registered']) ? (int) $_POST['is_re_registered'] : 0;

        // 3. Panggil service update setelah semua data request diinisialisasi
        try {
            $this->studentRegistrationService->update($request);
            View::redirect('/'); // Sesuaikan rute Anda setelah sukses
        } catch (\Exception $exception) {
            // Tampilkan kembali form dengan pesan error jika gagal
            View::render('Student/edit', ['error' => $exception->getMessage()]);
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

}