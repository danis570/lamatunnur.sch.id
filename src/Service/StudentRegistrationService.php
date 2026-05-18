<?php

namespace Danish\LamatunnurSchId\Service;

use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Domain\StudentRegistration;
use Danish\LamatunnurSchId\Exception\ValidationException;
use Danish\LamatunnurSchId\Model\StudentRegistrationRequest;
use Danish\LamatunnurSchId\Model\StudentRegistrationResponse;
use Danish\LamatunnurSchId\Repository\StudentRegistrationRepository;

class StudentRegistrationService
{
    private StudentRegistrationRepository $studentRegistrationRepository;
    // 1. Tambahkan properti baru untuk FileUploadService
    private FileUploadService $fileUploadService;

    // 2. Daftarkan FileUploadService ke dalam parameter constructor
    public function __construct(
        StudentRegistrationRepository $studentRegistrationRepository,
        FileUploadService $fileUploadService
    ) {
        $this->studentRegistrationRepository = $studentRegistrationRepository;
        $this->fileUploadService = $fileUploadService; // 3. Masukkan ke dalam properti
    }

    public function registration(StudentRegistrationRequest $request): StudentRegistrationResponse
    {
        $this->validationStudentRegistrationRequest($request);

        try {

            Database::beginTransaction();

            $student = new StudentRegistration();

            $student->img = $request->img;
            $student->full_name = $request->full_name;
            $student->birth_place = $request->birth_place;
            $student->birth_date = $request->birth_date;
            $student->student_nik = $request->student_nik;
            $student->address = $request->address;
            $student->gender = $request->gender;
            $student->child_order = $request->child_order;
            $student->total_siblings = $request->total_siblings;
            $student->religion = $request->religion;
            $student->parent_phone = $request->parent_phone;

            $student->school_name = $request->school_name;
            $student->school_class = $request->school_class;
            $student->school_address = $request->school_address;

            $student->father_name = $request->father_name;
            $student->father_job = $request->father_job;

            $student->mother_name = $request->mother_name;
            $student->mother_job = $request->mother_job;

            $student->parent_address = $request->parent_address;

            $student->guardian_name = $request->guardian_name;
            $student->guardian_job = $request->guardian_job;
            $student->guardian_address = $request->guardian_address;

            $student->is_re_registered = $request->is_re_registered;

            $this->studentRegistrationRepository->save($student);

            $response = new StudentRegistrationResponse();
            $response->studentRegistration = $student;

            Database::commitTransaction();

            return $response;

        } catch (\Exception $e) {

            Database::rollbackTransaction();

            throw $e;
        }
    }

    public function validationStudentRegistrationRequest(StudentRegistrationRequest $request): void
    {
        $errors = [];

        // STEP 1 - Data Pribadi (WAJIB SEMUA)
        if (empty(trim($request->full_name ?? ''))) {
            $errors[] = "Nama lengkap tidak boleh kosong";
        }
        if (empty(trim($request->birth_place ?? ''))) {
            $errors[] = "Tempat lahir tidak boleh kosong";
        }
        if (empty(trim($request->birth_date ?? ''))) {
            $errors[] = "Tanggal lahir tidak boleh kosong";
        }
        if (empty(trim($request->student_nik ?? ''))) {
            $errors[] = "NIK tidak boleh kosong";
        }
        if (empty(trim($request->address ?? ''))) {
            $errors[] = "Alamat tidak boleh kosong";
        }
        if (empty(trim($request->gender ?? ''))) {
            $errors[] = "Jenis kelamin tidak boleh kosong";
        }
        if (empty(trim($request->religion ?? ''))) {
            $errors[] = "Agama tidak boleh kosong";
        }
        if (empty(trim($request->parent_phone ?? ''))) {
            $errors[] = "No HP Orang Tua tidak boleh kosong";
        }

        // child_order dan total_siblings bisa 0, jadi validasi berbeda
        if (!isset($request->child_order) || $request->child_order === '' || $request->child_order === null) {
            $errors[] = "Anak ke- tidak boleh kosong";
        }
        if (!isset($request->total_siblings) || $request->total_siblings === '' || $request->total_siblings === null) {
            $errors[] = "Jumlah saudara tidak boleh kosong";
        }

        // STEP 2 - Data Sekolah (WAJIB)
        if (empty(trim($request->school_name ?? ''))) {
            $errors[] = "Nama sekolah tidak boleh kosong";
        }
        if (empty(trim($request->school_class ?? ''))) {
            $errors[] = "Kelas tidak boleh kosong";
        }
        if (empty(trim($request->school_address ?? ''))) {
            $errors[] = "Alamat sekolah tidak boleh kosong";
        }

        // STEP 3 - Data Orang Tua (WAJIB)
        if (empty(trim($request->father_name ?? ''))) {
            $errors[] = "Nama ayah tidak boleh kosong";
        }
        if (empty(trim($request->father_job ?? ''))) {
            $errors[] = "Pekerjaan ayah tidak boleh kosong";
        }
        if (empty(trim($request->mother_name ?? ''))) {
            $errors[] = "Nama ibu tidak boleh kosong";
        }
        if (empty(trim($request->mother_job ?? ''))) {
            $errors[] = "Pekerjaan ibu tidak boleh kosong";
        }
        if (empty(trim($request->parent_address ?? ''))) {
            $errors[] = "Alamat orang tua tidak boleh kosong";
        }

        // STEP 3 - Data Wali (WAJIB)
        if (empty(trim($request->guardian_name ?? ''))) {
            $errors[] = "Nama wali tidak boleh kosong";
        }
        if (empty(trim($request->guardian_job ?? ''))) {
            $errors[] = "Pekerjaan wali tidak boleh kosong";
        }
        if (empty(trim($request->guardian_address ?? ''))) {
            $errors[] = "Alamat wali tidak boleh kosong";
        }

        if (!empty($errors)) {
            throw new ValidationException(implode(", ", $errors));
        }
    }

    public function findById(int $id): ?StudentRegistration
    {
        return $this->studentRegistrationRepository
            ->findById($id);
    }

    public function deleteById(int $id): void
    {
        $student =
            $this->studentRegistrationRepository
                ->findById($id);

        if ($student == null) {
            throw new ValidationException("Student not found");
        }

        // HAPUS FOTO

        if (!empty($student->img)) {

            $photoPath =
                __DIR__ .
                '/../../public/uploads/photos/students-registration/' .
                $student->img;

            if (file_exists($photoPath)) {

                unlink($photoPath);
            }
        }

        // HAPUS DATABASE

        $this->studentRegistrationRepository
            ->deleteById($id);
    }

    public function update(StudentRegistrationRequest $request): void
    {
        $student = $this->studentRegistrationRepository->findById($request->id);

        if ($student == null) {
            throw new ValidationException("Student not found");
        }

        $student->img = $request->img;
        $student->full_name = $request->full_name;
        $student->birth_place = $request->birth_place;
        $student->birth_date = $request->birth_date;
        $student->student_nik = $request->student_nik;
        $student->address = $request->address;
        $student->gender = $request->gender;

        $student->child_order = $request->child_order;
        $student->total_siblings = $request->total_siblings;

        $student->religion = $request->religion;
        $student->parent_phone = $request->parent_phone;

        $student->school_name = $request->school_name;
        $student->school_class = $request->school_class;
        $student->school_address = $request->school_address;

        $student->father_name = $request->father_name;
        $student->father_job = $request->father_job;

        $student->mother_name = $request->mother_name;
        $student->mother_job = $request->mother_job;

        $student->parent_address = $request->parent_address;

        $student->guardian_name = $request->guardian_name;
        $student->guardian_job = $request->guardian_job;
        $student->guardian_address = $request->guardian_address;

        $student->is_re_registered =
            $request->is_re_registered;

        $this->studentRegistrationRepository
            ->update($student);
    }

    public function findAll(): array
    {
        // Fungsi ini langsung memanggil findAll() milik Repository yang tadi sudah kita cek
        return $this->studentRegistrationRepository->findAll();
    }

}