<?php

namespace App\models;

use App\helpers\Connection;

class Executor
{
    public static function all()
    {
        $query = Connection::make()->query('SELECT * FROM executors');
        return $query->fetchAll();
    }

    public static function getExecutorsByCategory($category_id)
    {
        $query = Connection::make()->prepare('SELECT executors.*, categories.id as category FROM executors
        INNER JOIN products ON executors.id=products.executor_id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE categories.id=:category_id
        GROUP BY executors.id');
        $query->execute(['category_id'=>$category_id]);
        return $query->fetchAll();
    }

    public static function find($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM executors WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function add($name)
    {
        $executor = self::find($name);
        $conn = Connection::make();
        if (!$executor) {
            $query = $conn->prepare('INSERT INTO executors (name) values (:name)');
            $query->execute(['name' => $name]);
        }
        return $conn->lastInsertId();
    }

    public static function delete($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM executors WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function getExecutor($id)
    {
        $query =  Connection::make()->prepare('SELECT * FROM executors
        WHERE id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}
