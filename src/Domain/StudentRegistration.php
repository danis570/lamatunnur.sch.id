<?php

namespace Danish\LamatunnurSchId\Domain;

class StudentRegistration
{
    public ?int $id = null;

    public ?string $img = null;

    public string $full_name;

    public string $birth_place;

    public string $birth_date;

    public string $student_nik;

    public string $address;

    public string $gender;

    public int $child_order;

    public int $total_siblings;

    public string $religion;

    public string $parent_phone;

    public ?string $school_name = null;

    public ?string $school_class = null;

    public ?string $school_address = null;

    public ?string $father_name = null;

    public ?string $father_job = null;

    public ?string $mother_name = null;

    public ?string $mother_job = null;

    public ?string $parent_address = null;

    public ?string $guardian_name = null;

    public ?string $guardian_job = null;

    public ?string $guardian_address = null;

    public bool $is_re_registered = false;

    public ?string $created_at = null;

    public ?string $deleted_at = null;
}