<?php

namespace Danish\LamatunnurSchId\Service;

use Danish\LamatunnurSchId\Config\Database;
use Danish\LamatunnurSchId\Domain\User;
use Danish\LamatunnurSchId\Exception\ValidationException;
use Danish\LamatunnurSchId\Model\UserLoginRequest;
use Danish\LamatunnurSchId\Model\UserLoginResponse;
use Danish\LamatunnurSchId\Model\UserRegisterRequest;
use Danish\LamatunnurSchId\Model\UserRegisterResponse;
use Danish\LamatunnurSchId\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function register(UserRegisterRequest $request): UserRegisterResponse
    {
        $this->validationUserRegistrationRequest($request);

        try {
            Database::beginTransaction();
            $user = $this->userRepository->findByName($request->name);

            if ($user != null) {
                throw new ValidationException("User name already exist");
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = "USER";

            // hashing password
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);

            $this->userRepository->save($user);

            $response = new UserRegisterResponse();
            $response->user = $user;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $e) {
            Database::rollbackTransaction();
            throw $e;
        }
    }

    public function validationUserRegistrationRequest(UserRegisterRequest $request)
    {
        if (
            $request->name == null || $request->email == null || $request->password == null ||
            trim($request->name) == "" || trim($request->email) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("Name, Email, Password can not blank");
        }
    }

    public function login(UserLoginRequest $request): UserLoginResponse
    {
        $this->validationUserLoginRequest($request);

        $user = $this->userRepository->findByEmail($request->email);

        if ($user == null) {
            throw new ValidationException("Email or password wrong");
        }

        if (!password_verify($request->password, $user->password)) {
            throw new ValidationException("Email or password wrong");
        }

        $response = new UserLoginResponse();
        $response->user = $user;

        return $response;
    }

    public function validationUserLoginRequest(UserLoginRequest $request): void
    {
        if (
            $request->email == null || $request->password == null ||
            trim($request->email) == "" || trim($request->password) == ""
        ) {
            throw new ValidationException("Email and Password can not blank");
        }
    }

}
