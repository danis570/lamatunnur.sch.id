<?php

namespace Danish\LamatunnurSchId\Repository;

use Danish\LamatunnurSchId\Domain\StudentRegistration;

class StudentRegistrationRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(StudentRegistration $student): StudentRegistration
    {
        $statement = $this->connection->prepare("
            INSERT INTO student_registration(
                img,
                full_name,
                birth_place,
                birth_date,
                student_nik,
                address,
                gender,
                child_order,
                total_siblings,
                religion,
                parent_phone,
                school_name,
                school_class,
                school_address,
                father_name,
                father_job,
                mother_name,
                mother_job,
                parent_address,
                guardian_name,
                guardian_job,
                guardian_address,
                is_re_registered
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )
        ");

        $statement->execute([
            $student->img,
            $student->full_name,
            $student->birth_place,
            $student->birth_date,
            $student->student_nik,
            $student->address,
            $student->gender,
            $student->child_order,
            $student->total_siblings,
            $student->religion,
            $student->parent_phone,
            $student->school_name,
            $student->school_class,
            $student->school_address,
            $student->father_name,
            $student->father_job,
            $student->mother_name,
            $student->mother_job,
            $student->parent_address,
            $student->guardian_name,
            $student->guardian_job,
            $student->guardian_address,
            $student->is_re_registered
        ]);

        $student->id = $this->connection->lastInsertId();

        return $student;
    }

    public function update(StudentRegistration $student): StudentRegistration
    {
        $statement = $this->connection->prepare("
            UPDATE student_registration
            SET
                img = ?,
                full_name = ?,
                birth_place = ?,
                birth_date = ?,
                student_nik = ?,
                address = ?,
                gender = ?,
                child_order = ?,
                total_siblings = ?,
                religion = ?,
                parent_phone = ?,
                school_name = ?,
                school_class = ?,
                school_address = ?,
                father_name = ?,
                father_job = ?,
                mother_name = ?,
                mother_job = ?,
                parent_address = ?,
                guardian_name = ?,
                guardian_job = ?,
                guardian_address = ?,
                is_re_registered = ?
            WHERE id = ?
        ");

        $statement->execute([
            $student->img,
            $student->full_name,
            $student->birth_place,
            $student->birth_date,
            $student->student_nik,
            $student->address,
            $student->gender,
            $student->child_order,
            $student->total_siblings,
            $student->religion,
            $student->parent_phone,
            $student->school_name,
            $student->school_class,
            $student->school_address,
            $student->father_name,
            $student->father_job,
            $student->mother_name,
            $student->mother_job,
            $student->parent_address,
            $student->guardian_name,
            $student->guardian_job,
            $student->guardian_address,
            $student->is_re_registered,
            $student->id
        ]);

        return $student;
    }

    public function findById(int $id): ?StudentRegistration
    {
        $statement = $this->connection->prepare("
            SELECT *
            FROM student_registration
            WHERE id = ?
            LIMIT 1
        ");

        $statement->execute([$id]);

        try {

            if ($row = $statement->fetch()) {

                $student = new StudentRegistration();

                $student->id = $row['id'];
                $student->img = $row['img'];
                $student->full_name = $row['full_name'];
                $student->birth_place = $row['birth_place'];
                $student->birth_date = $row['birth_date'];
                $student->student_nik = $row['student_nik'];
                $student->address = $row['address'];
                $student->gender = $row['gender'];
                $student->child_order = $row['child_order'];
                $student->total_siblings = $row['total_siblings'];
                $student->religion = $row['religion'];
                $student->parent_phone = $row['parent_phone'];
                $student->school_name = $row['school_name'];
                $student->school_class = $row['school_class'];
                $student->school_address = $row['school_address'];
                $student->father_name = $row['father_name'];
                $student->father_job = $row['father_job'];
                $student->mother_name = $row['mother_name'];
                $student->mother_job = $row['mother_job'];
                $student->parent_address = $row['parent_address'];
                $student->guardian_name = $row['guardian_name'];
                $student->guardian_job = $row['guardian_job'];
                $student->guardian_address = $row['guardian_address'];
                $student->is_re_registered = $row['is_re_registered'];
                $student->created_at = $row['created_at'];
                $student->deleted_at = $row['deleted_at'];

                return $student;

            } else {
                return null;
            }

        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(int $id): void
    {
        $statement = $this->connection->prepare("
            DELETE FROM student_registration
            WHERE id = ?
        ");

        $statement->execute([$id]);
    }

    public function findAll(): array
    {
        $statement = $this->connection->prepare("
            SELECT *
            FROM student_registration
            ORDER BY id DESC
        ");

        $statement->execute();

        $students = [];

        while ($row = $statement->fetch()) {

            $student = new StudentRegistration();

            $student->id = $row['id'];
            $student->img = $row['img'];
            $student->full_name = $row['full_name'];
            $student->birth_place = $row['birth_place'];
            $student->birth_date = $row['birth_date'];
            $student->student_nik = $row['student_nik'];
            $student->address = $row['address'];
            $student->gender = $row['gender'];
            $student->is_re_registered = $row['is_re_registered'];

            $students[] = $student;
        }

        return $students;
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM student_registration");
    }
}