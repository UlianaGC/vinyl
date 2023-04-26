<?php

namespace App\models;

use App\helpers\Connection;

class Basket
{
    public static function getProductsByUser($id)
    {
        $query = Connection::make()->prepare('SELECT baskets.user_id, baskets.product_id, products.photo, products.name as product_name, products.price, executors.name as executor_name, categories.name as category_name FROM baskets
        INNER JOIN products ON baskets.product_id=products.id
        INNER JOIN users ON baskets.user_id=users.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE baskets.user_id=:user_id');
        $query->execute(['user_id'=>$id]);
        return $query->fetchAll();
    }

    public static function getProductsFinish($id)
    {
        $query = Connection::make()->prepare('SELECT baskets.user_id, baskets.product_id, products.photo, products.name as product_name, products.price, executors.name as executor_name, categories.name as category_name FROM baskets
        INNER JOIN products ON baskets.product_id=products.id
        INNER JOIN users ON baskets.user_id=users.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE baskets.user_id=:user_id AND products.id NOT IN (SELECT product_id FROM product_in_order)');
        $query->execute(['user_id'=>$id]);
        return $query->fetchAll();
    }

    public static function count($id)
    {
        $query = Connection::make()->prepare('SELECT COUNT(*) as count FROM baskets
        INNER JOIN users ON baskets.user_id=users.id
        INNER JOIN products ON baskets.product_id=products.id
        where user_id=:user_id AND products.id NOT IN (SELECT product_id FROM product_in_order)');
        $query->execute(['user_id'=>$id]);
        return $query->fetch();
    }

    public static function sum($id)
    {
        $query = Connection::make()->prepare('SELECT SUM(products.price) as sum FROM baskets
        INNER JOIN users ON baskets.user_id=users.id
        INNER JOIN products ON baskets.product_id=products.id
        WHERE user_id=:user_id AND products.id NOT IN (SELECT product_id FROM product_in_order)');
        $query->execute(['user_id'=>$id]);
        return $query->fetch();
    }

    public static function delete($user_id, $product_id)
    {
        $query = Connection::make()->prepare('DELETE FROM baskets
        WHERE user_id=:user_id AND product_id=:product_id');
        $query->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
        return 'delete';
    }

    public static function clear($user_id, $conn = null)
    {
        $conn = $conn??Connection::make();
        $query =  $conn->prepare('DELETE FROM baskets WHERE user_id=:user_id');
        $query->execute(['user_id' => $user_id]);
        return 'clear';
    }

    public static function clearFav($user_id, $conn = null)
    {
        $conn = $conn??Connection::make();
        $query =  $conn->prepare('DELETE FROM favourites WHERE user_id=:user_id AND favourites.product_id IN (SELECT product_in_order.product_id FROM product_in_order)');
        $query->execute(['user_id' => $user_id]);
    }

    public static function add($user_id, $product_id)
    {
        $query = Connection::make()->prepare('INSERT INTO baskets (product_id, user_id) VALUES (:product_id, :user_id)');
        $query->execute(['user_id'=>$user_id, 'product_id'=>$product_id]);
        return 'add';
    }

    public static function find($user_id)
    {
        $query = Connection::make()->prepare("SELECT product_id FROM baskets WHERE user_id = :user_id");
        $query->execute(["user_id" => $user_id]);
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    public static function delivery()
    {
        $query = Connection::make()->query('SELECT * FROM deliveries');
        return $query->fetchAll();
    }

    public static function areasByCountry($id)
    {
        $query = Connection::make()->prepare('SELECT * FROM areas
        WHERE country_id=:id');
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }

    public static function citiesByArea($id)
    {
        $query = Connection::make()->prepare('SELECT * FROM cities
        WHERE area_id=:id');
        $query->execute(['id'=>$id]);
        return $query->fetchAll();
    }
}