<?php

namespace App\models;

use App\helpers\Connection;

class Favourites
{
    public static function getProductsByUser($id)
    {
        $query = Connection::make()->prepare('SELECT favourites.user_id, favourites.id as favorite_id, products.id as product_id, products.photo, products.name as product_name, products.price, executors.name as executor_name, categories.name as category_name FROM favourites
        INNER JOIN products ON favourites.product_id=products.id
        INNER JOIN users ON favourites.user_id=users.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE favourites.user_id=:user_id');
        $query->execute(['user_id'=>$id]);
        return $query->fetchAll();
    }

    public static function add($user_id, $product_id)
    {
        $query = Connection::make()->prepare('INSERT INTO favourites (product_id, user_id) VALUES (:product_id, :user_id)');
        $query->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
        return 'addFav';
    }

    public static function find($user_id)
    {
        $query = Connection::make()->prepare("SELECT product_id FROM favourites WHERE user_id = :user_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    public static function all($id)
    {
        $query = Connection::make()->prepare('SELECT favourites.user_id, favourites.product_id, products.photo, products.name as product_name, products.price, executors.name as executor_name, categories.name as category_name FROM favourites
        INNER JOIN products ON favourites.product_id=products.id
        INNER JOIN users ON favourites.user_id=users.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE favourites.user_id=:user_id');
        $query->execute(['user_id'=>$id]);
        return $query->fetchAll();
    }

    public static function delete($user_id, $product_id)
    {
        $query = Connection::make()->prepare('DELETE FROM favourites
        WHERE user_id=:user_id AND product_id=:product_id');
        $query->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
        return 'delete';
    }

    public static function clear($user_id, $conn = null)
    {
        $conn = $conn??Connection::make();
        $query =  $conn->prepare('DELETE FROM favourites WHERE user_id=:user_id');
        $query->execute(['user_id' => $user_id]);
        return 'clear';
    }
}