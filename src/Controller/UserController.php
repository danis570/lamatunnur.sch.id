<?php

namespace Danish\LamatunnurSchId\Controller;

use Danish\LamatunnurSchId\App\View;
use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Exception\ValidationException;
use Danish\LamatunnurSchId\Model\UserLoginRequest;
use Danish\LamatunnurSchId\Model\UserRegisterRequest;
use Danish\LamatunnurSchId\Repository\SessionRepository;
use Danish\LamatunnurSchId\Repository\UserRepository;
use Danish\LamatunnurSchId\Service\SessionService;
use Danish\LamatunnurSchId\Service\UserService;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }
    public function register()
    {
        View::render('User/register', [
            'title' => 'Register new User'
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->name = $_POST['name'];
        $request->email = $_POST['email'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            View::redirect('/users/login');
        } catch (ValidationException $exception) {
            View::render('User/register', [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function login()
    {
        View::render('User/login', [
            'title' => 'Login User'
        ]);
    }

public function postLogin()
{
    $request = new UserLoginRequest();
    $request->email = $_POST['email'];
    $request->password = $_POST['password'];

    try {
        $response = $this->userService->login($request);
        
        // Hapus session lama jika ada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Regenerate session ID untuk keamanan
        session_regenerate_id(true);
        
        // SIMPAN ROLE KE SESSION - INI YANG PALING PENTING
        $_SESSION['user'] = [
            'id' => $response->user->id,
            'name' => $response->user->name,
            'email' => $response->user->email,
            'role' => $response->user->role  // Pastikan ini 'admin' atau 'user'
        ];
        
        // Buat juga session via service jika diperlukan
        $this->sessionService->create($response->user->id);
        
        // DEBUG - Cek apakah role tersimpan
        error_log("=== LOGIN DEBUG ===");
        error_log("User ID: " . $response->user->id);
        error_log("User Name: " . $response->user->name);
        error_log("User Role: " . $response->user->role);
        error_log("Session: " . print_r($_SESSION, true));
        
        // Redirect ke halaman data
        View::redirect('/students/data');

    } catch (ValidationException $exception) {
        View::render('User/login', [
            'title' => 'Login User',
            'error' => $exception->getMessage()
        ]);
    }
}

    public function logout()
{
    // Hapus session
    $this->sessionService->destroy();
    
    // Pastikan session benar-benar terhapus
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_destroy();
    
    View::redirect("/");
}

}
