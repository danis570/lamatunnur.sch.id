<?php

namespace Danish\LamatunnurSchId\Repository;

use Danish\LamatunnurSchId\Domain\User;

class UserRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }


    public function save(User $user): User
    {
        $statement = $this->connection->prepare("INSERT INTO users(name, email, role, password) 
        VALUES (?, ?, ?, ?)");
        $statement->execute([
            $user->name,
            $user->email,
            $user->role,
            $user->password
        ]);

        return $user;
    }

    public function findByName(string $name): ?User
    {
        $statement = $this->connection->prepare("
        SELECT id, name, email, role, password, created_at
        FROM users
        WHERE name = ?
    ");

        $statement->execute([$name]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();
                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->email = $row['email'];
                $user->role = $row['role'];
                $user->password = $row['password'];
                $user->created_at = $row['created_at'];
                return $user;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function findByEmail(string $email): ?User
    {
        $statement = $this->connection->prepare("
        SELECT id, name, email, role, password, created_at
        FROM users
        WHERE email = ?
    ");

        $statement->execute([$email]);

        try {

            if ($row = $statement->fetch()) {

                $user = new User();

                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->email = $row['email'];
                $user->role = $row['role'];
                $user->password = $row['password'];
                $user->created_at = $row['created_at'];

                return $user;

            } else {
                return null;
            }

        } finally {
            $statement->closeCursor();
        }
    }

    public function findById(string $id): ?User
    {
        $statement = $this->connection->prepare("
        SELECT id, name, email, role, password, created_at
        FROM users
        WHERE id = ?
    ");

        $statement->execute([$id]);

        try {

            if ($row = $statement->fetch()) {

                $user = new User();

                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->email = $row['email'];
                $user->role = $row['role'];
                $user->password = $row['password'];
                $user->created_at = $row['created_at'];

                return $user;

            } else {
                return null;
            }

        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM users");
    }
}
