<?php

namespace App\models;

use App\helpers\Connection;

class User
{

    public static function all()
    {
        $query = Connection::make()->query('SELECT users.*, roles.name as role_name FROM users
        INNER JOIN roles ON users.role_id=roles.id');
        return $query->fetchAll();
    }

    public static function getUser($email, $password)
    {

        $query = Connection::make()->prepare("SELECT * FROM users 
        WHERE users.email = :email");
        $query->execute(['email' => $email]);
        $user = $query->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        };
        return null;
    }

    public static function insert($data)
    {
        $query = Connection::make()->prepare("INSERT into users (login, email, password, role_id) values (:login, :email, :password, :role_id)");
        return $query->execute([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role_id' => 2,
        ]);
    }

    public static function find($id){
        $query = Connection::make()->prepare('SELECT users.*, SUBSTRING(login, 1, 1) as firstLetter FROM users
        WHERE users.id=:id');
        $query->execute([':id' => $id]);
        return $query->fetch();
    }

    public static function showUsersByRole($id)
    {
        $query =  Connection::make()->prepare('SELECT users.*, roles.name as role_name FROM users
        INNER JOIN roles ON users.role_id=roles.id
        WHERE role_id=:role_id');
        $query->execute(['role_id' => $id]);
        return $query->fetchAll();
    }

    public static function allRoles()
    {
        $query =  Connection::make()->query('SELECT * FROM roles');
        return $query->fetchAll();
    }
}