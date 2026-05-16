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
        if (
            $request->full_name == null ||
            $request->birth_place == null ||
            $request->birth_date == null ||
            $request->student_nik == null ||
            $request->address == null ||
            $request->gender == null ||
            $request->religion == null ||
            // HAPUS parent_phone dari validasi wajib
            // $request->parent_phone == null ||

            trim($request->full_name) == "" ||
            trim($request->birth_place) == "" ||
            trim($request->birth_date) == "" ||
            trim($request->student_nik) == "" ||
            trim($request->address) == "" ||
            trim($request->gender) == "" ||
            trim($request->religion) == ""
            // trim($request->parent_phone) == ""
        ) {
            throw new ValidationException("Required fields can not blank");
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