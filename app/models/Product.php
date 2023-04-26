<?php

namespace App\models;

use App\helpers\Connection;

class Product
{
    public static function getOneNewProduct()
    {
        $query = Connection::make()->query('SELECT products.id, photo, products.name as product_name, executors.name as executor_name FROM products 
        INNER JOIN executors ON products.executor_id=executors.id 
        ORDER BY products.id DESC 
        LIMIT 1');
        return $query->fetchAll();
    }

    public static function getNewProducts()
    {
        $query = Connection::make()->query('SELECT products.id, photo, products.name as product_name, executors.name as executor_name, categories.name as category_name, price FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        ORDER BY products.id DESC 
        LIMIT 1, 3');
        return $query->fetchAll();
    }

    public static function getOnePopularProduct()
    {
        $query = Connection::make()->query('SELECT product_id, products.name as product_name, products.photo, products.price, executors.name as executor_name FROM favourites
        INNER JOIN products ON favourites.product_id=products.id
        INNER JOIN executors ON products.executor_id=executors.id
        GROUP by favourites.product_id
        ORDER by COUNT(product_id)
        LIMIT 1');
        return $query->fetchAll();
    }

    public static function getPopularProducts()
    {
        $query = Connection::make()->query('SELECT products.id, products.name as product_name, products.price , products.photo, products.price, executors.name as executor_name, categories.name as category_name FROM favourites
        INNER JOIN products ON favourites.product_id=products.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        GROUP by favourites.product_id
        ORDER by COUNT(product_id)
        LIMIT 3, 3');
        return $query->fetchAll();
    }

    public static function getProductById($product_id)
    {
        $query = Connection::make()->prepare('SELECT products.*, executors.name as executor_name, categories.name as category_name FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE products.id=:id');
        $query->execute(['id' => $product_id]);
        return $query->fetch();
    }

    public static function vinylExecutor($product_id, $executor_name)
    {
        $query = Connection::make()->prepare('SELECT products.id, photo, products.name as product_name, executors.name as executor_name, categories.name as category_name, price FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE NOT products.id=:product_id AND executors.name=:executor_name
        LIMIT 3');
        $query->execute([
            'product_id' => $product_id,
            'executor_name' => $executor_name
        ]);
        return $query->fetchAll();
    }

    public static function all()
    {
        $query = Connection::make()->query('SELECT products.id, photo, products.name as product_name, executors.name as executor_name, categories.name as category_name, price, year_release, description FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id');
        return $query->fetchAll();
    }

    public static function productByCategory($category_id)
    {
        $query = Connection::make()->prepare("SELECT products.id, photo, products.name as product_name, executors.id as executor_id, executors.name as executor_name, categories.name as category_name, categories.id as category_id, price, year_release, description FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id 
        WHERE products.category_id=:id");
        $query->execute(['id' => $category_id]);
        return $query->fetchAll();
    }

    public static function productByExecutor($executor_id)
    {
        $query = Connection::make()->prepare("SELECT products.id, photo, products.name as product_name, executors.id as executor_id, executors.name as executor_name, categories.id as category_id, categories.name as category_name, price, year_release, description FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id 
        WHERE products.executor_id=:id");
        $query->execute(['id' => $executor_id]);
        return $query->fetchAll();
    }

    public static function add($data, $image)
    {
        $query = Connection::make()->prepare('INSERT INTO products (name, year_release, photo, price, executor_id, category_id) VALUES (:name, :year_release, :photo, :price, :executor_id, :category_id)');
        $query->execute([
            'name' => $data['name'],
            'year_release' => $data['year_release'],
            'photo' => $image,
            'price' => $data['price'],
            'executor_id' => $data['executor'],
            'category_id' => $data['category']
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM products WHERE id = :id ");
        $query->execute(["id" => $id]);
        return "delete";
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT products.*, categories.name as category_name, executors.name as executor_name FROM products
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE products.id=:id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public static function update($data, $iamge)
    {

        $query = Connection::make()->prepare("UPDATE products SET name = :name, price = :price, year_release = :year_release, photo = :photo, category_id = :category_id, executor_id = :executor_id
        WHERE id = :id");
        $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "year_release" => $data["year_release"],
            "image" => $iamge,
            "country_id" => $data["country_id"],
            "category_id" => $data["category_id"],
            "executor_id" => $data["executor_id"],
            "id" => $data["id"]
        ]);
    }

    public static function noImg($data)
    {
        $query = Connection::make()->prepare("UPDATE products SET name = :name, price = :price, year_release = :year_release, category_id = :category_id, executor_id = :executor_id
        WHERE id = :id");
        $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "year_release" => $data["year_release"],
            "category_id" => $data["category"],
            "executor_id" => $data["executor"],
            "id" => $data["id"]
        ]);
    }
}
