<?php

namespace Danish\LamatunnurSchId\App;

class View
{
    public static function render(string $view, $model)
    {
        // Ambil nama file asli dari variabel $view (misal: "dashboard" atau "edit")
        $fileName = basename($view);

        // Hardcode: Sebutkan nama-nama file yang dilarang meload header & footer
        $ignoredFiles = ['index', 'dashboard', 'student-biodata', 'student-multiple', 'data', 'edit', 'show'];

        // Jika nama file TIDAK ada di dalam daftar coret, maka load header
        if (!in_array($fileName, $ignoredFiles)) {
            require __DIR__ . "/../View/header.php";
        }

        // Panggil konten file utama
        require __DIR__ . "/../View/" . $view . ".php";

        // Jika nama file TIDAK ada di dalam daftar coret, maka load footer
        if (!in_array($fileName, $ignoredFiles)) {
            require __DIR__ . "/../View/footer.php";
        }
    }


    public function data()
    {
        $allStudents = $this->studentRegistrationService->findAll();

        // Ambil session user
        $currentUser = $_SESSION['user'] ?? null;
        $userRole = $currentUser['role'] ?? 'guest'; // 'admin', 'user', atau 'guest'

        View::render('Student/data', [
            'title' => 'Student Data',
            'students' => $allStudents,
            'user' => $currentUser,
            'userRole' => $userRole
        ]);
    }

    public static function redirect(string $url)
    {
        header("Location: $url");
        if (getenv("mode") != "test") {
            exit();
        }
    }
}
