<?php

namespace Danish\LamatunnurSchId\Service;

use Danish\LamatunnurSchId\Exception\ValidationException;

class FileUploadService
{
    public function uploadStudentPhoto(array $file): ?string
    {
        // 1. cek apakah file benar-benar diupload
        if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
            return null; // atau default image
        }

        // 2. cek error upload lain
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new ValidationException("Upload failed");
        }

        // 3. size check
        if ($file['size'] > 2 * 1024 * 1024) {
            throw new ValidationException("Photo max 2MB");
        }

        // 4. extension check
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (!in_array($extension, $allowedExtensions)) {
            throw new ValidationException("Photo must be jpg, jpeg, or png");
        }

        // 5. generate file name
        $fileName = uniqid() . "_" . $file['name'];

        move_uploaded_file(
            $file['tmp_name'],
            __DIR__ . '/../../public/uploads/photos/students-registration/' . $fileName
        );

        return $fileName;
    }
}