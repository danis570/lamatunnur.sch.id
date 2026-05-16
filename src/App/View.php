<?php

namespace Danish\LamatunnurSchId\App;

class View
{
    public static function render(string $view, $model)
    {
        // require __DIR__ . "/../View/header.php";
        require __DIR__ . "/../View/" . $view . ".php";
        // require __DIR__ . "/../View/footer.php";
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
