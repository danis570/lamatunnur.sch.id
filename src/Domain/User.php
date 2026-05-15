<?php

namespace Danish\LamatunnurSchId\Domain;

class User
{
    public ?string $id = null;
    public string $name;
    public string $email;
    public string $role = "USER";
    public string $password;
    public ?string $created_at = null;
}
