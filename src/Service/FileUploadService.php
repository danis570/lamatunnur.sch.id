<?php

namespace Danish\LamatunnurSchId\Service;

use Danish\LamatunnurSchId\Exception\ValidationException;

class FileUploadService
{
    public function uploadStudentPhoto(array $file): string
    {
        if ($file['error'] != 0) {
            throw new ValidationException("Photo is required");
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            throw new ValidationException("Photo max 2MB");
        }

        $extension = strtolower(
            pathinfo($file['name'], PATHINFO_EXTENSION)
        );

        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (!in_array($extension, $allowedExtensions)) {
            throw new ValidationException("Photo must be jpg, jpeg, or png");
        }

        $fileName = uniqid() . "_" . $file['name'];

        move_uploaded_file(
            $file['tmp_name'],
            __DIR__ . '/../../public/uploads/photos/students-registration/' . $fileName
        );

        return $fileName;
    }
}