<?php

namespace App\models;

use App\helpers\Connection;

class Category
{
    public static function all()
    {
        $query = Connection::make()->query('SELECT * FROM categories');
        return $query->fetchAll();
    }

    public static function getCategoriesByExecutor($executor_id)
    {
        $query = Connection::make()->prepare('SELECT categories.*, executors.id as executor FROM categories
        INNER JOIN products ON categories.id=products.category_id
        INNER JOIN executors ON products.executor_id=executors.id
        WHERE executors.id=:executor_id
        GROUP BY executors.id');
        $query->execute(['executor_id' => $executor_id]);
        return $query->fetchAll();
    }

    public static function find($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM categories WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function add($name)
    {
        $category = self::find($name);
        $conn = Connection::make();
        if (!$category) {
            $query = $conn->prepare('INSERT INTO categories (name) values (:name)');
            $query->execute(['name' => $name]);
        }
        return $conn->lastInsertId();
    }

    public static function delete($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM categories 
        WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function getCategory($id)
    {
        $query =  Connection::make()->prepare('SELECT * FROM categories
        WHERE id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}
