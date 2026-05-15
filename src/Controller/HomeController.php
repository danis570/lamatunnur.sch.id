<?php

namespace Danish\LamatunnurSchId\Controller;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Repository\SessionRepository;
use Danish\LamatunnurSchId\Repository\StudentRegistrationRepository;
use Danish\LamatunnurSchId\Repository\UserRepository;
use Danish\LamatunnurSchId\Service\SessionService;

class HomeController
{
    private SessionService $sessionService;
    private StudentRegistrationRepository $studentRegistrationRepository;

    public function __construct()
    {
        $connection = Database::getConnection();

        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);

        $this->sessionService = new SessionService(
            $sessionRepository,
            $userRepository
        );

        $this->studentRegistrationRepository =
            new StudentRegistrationRepository($connection);
    }
    public function index()
    {
        $user = $this->sessionService->current();

        if ($user == null) {

            View::render('Home/index', [
                "title" => "PHP Login Management"
            ]);

        } else {

            $students = $this->studentRegistrationRepository->findAll();

            View::render('Home/dashboard', [
                'title' => 'Dashboard',
                'user' => $user,
                'students' => $students
            ]);
        }
    }
}
