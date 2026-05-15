<?php

namespace Danish\LamatunnurSchId\Middleware;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Repository\SessionRepository;
use Danish\LamatunnurSchId\Repository\UserRepository;
use Danish\LamatunnurSchId\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
private SessionService $sessionService;

    public function __construct(){
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userRepository = new UserRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }
	function before(): void
    {
        $user = $this->sessionService->current();
        if($user == null){
            View::redirect('/users/login');
        }
    }
}
