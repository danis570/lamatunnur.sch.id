<?php

namespace Danish\LamatunnurSchId\Middleware;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Repository\SessionRepository;
use Danish\LamatunnurSchId\Repository\UserRepository;
use Danish\LamatunnurSchId\Service\SessionService;

class MustAdminMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $sessionRepository = new SessionRepository($connection);

        $userRepository = new UserRepository($connection);

        $this->sessionService = new SessionService(
            $sessionRepository,
            $userRepository
        );
    }

    public function before(): void
    {
        $user = $this->sessionService->current();

        if ($user == null) {
            View::redirect('/users/login');
        }

        if ($user->role != "ADMIN") {
            View::redirect('/');
        }
    }
}