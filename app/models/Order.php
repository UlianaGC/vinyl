<?php

namespace App\models;

use App\helpers\Connection;

class Order
{
    public static function all()
    {
        $query = Connection::make()->query('SELECT orders.*, cities.name as city_name, areas.name as area_name, countries.name as country_name, users.email as user_name, statuses.name as status_name, deliveries.name as delivery_name FROM orders
        INNER JOIN cities ON orders.city_id=cities.id
        INNER JOIN areas ON cities.area_id=areas.id
        INNER JOIN countries ON areas.country_id=countries.id
        INNER JOIN users ON orders.user_id=users.id
        INNER JOIN statuses ON orders.status_id=statuses.id
        INNER JOIN deliveries ON orders.delivery_id=deliveries.id');
        return $query->fetchAll();
    }

    public static function productsByOrders($id)
    {
        $query = Connection::make()->prepare('SELECT products.id, products.name as product_name, products.price, executors.name as executor_name, categories.name as category_name FROM product_in_order
        INNER JOIN products ON product_in_order.product_id=products.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        where order_id = :id');
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

    public static function count($id)
    {
        $query = Connection::make()->prepare('SELECT COUNT(*) as count FROM product_in_order
        WHERE order_id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public static function sum($id)
    {
        $query = Connection::make()->prepare('SELECT SUM(products.price) as sum FROM product_in_order
        INNER JOIN products ON product_in_order.product_id=products.id
        WHERE order_id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public static function infoByOrder($id)
    {
        $query = Connection::make()->prepare('SELECT order_id, orders.date_making, users.login FROM product_in_order
        INNER JOIN orders ON product_in_order.order_id=orders.id
        INNER JOIN users ON orders.user_id=users.id
        WHERE order_id=:id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public static function allSatatuses()
    {
        $query = Connection::make()->query('SELECT * FROM statuses');
        return $query->fetchAll();
    }

    public static function orderByStatus($id)
    {
        $query = Connection::make()->prepare('SELECT orders.*, cities.name as city_name, areas.name as area_name, countries.name as country_name, users.email as user_name, statuses.name as status_name, deliveries.name as delivery_name FROM orders
        INNER JOIN cities ON orders.city_id=cities.id
        INNER JOIN areas ON cities.area_id=areas.id
        INNER JOIN countries ON areas.country_id=countries.id
        INNER JOIN users ON orders.user_id=users.id
        INNER JOIN statuses ON orders.status_id=statuses.id
        INNER JOIN deliveries ON orders.delivery_id=deliveries.id
        WHERE status_id=:id');
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

    // public static function updateStatus($id, $status_id)
    // {
    //     $query = Connection::make()->prepare("UPDATE orders SET status_id = :status_id 
    //     WHERE id = :id");
    //     $query->execute([
    //         'id' => $id,
    //         'status_id' => $status_id
    //     ]);
    // }

    public static function orderByUser($user_id)
    {
        $query = Connection::make()->prepare('SELECT orders.id, orders.date_making, orders.status_id, orders.reason_cancel FROM orders
        INNER JOIN users ON orders.user_id=users.id
        WHERE user_id=:user_id AND status_id!=5');
        $query->execute(['user_id' => $user_id]);
        return $query->fetchAll();
    }

    public static function priceDelivery($city_id)
    {
        $query = Connection::make()->prepare('SELECT price FROM cities
        WHERE id=:id');
        $query->execute(['id' => $city_id]);
        return $query->fetch();
    }

    public static function productsInOrdersByUser($user_id)
    {
        $query = Connection::make()->prepare('SELECT product_in_order.order_id, products.name as product_name, products.price, products.photo, executors.name as executor_name, categories.name as category_name FROM product_in_order
        INNER JOIN orders ON product_in_order.order_id=orders.id
        INNER JOIN products ON product_in_order.product_id=products.id
        INNER JOIN executors ON products.executor_id=executors.id
        INNER JOIN categories ON products.category_id=categories.id
        WHERE user_id=:user_id AND status_id!=5');
        $query->execute(['user_id' => $user_id]);
        return $query->fetchAll();
    }

    public static function statusDeny($id, $status_id, $reason_cancel)
    {
        $query = Connection::make()->prepare("UPDATE orders SET status_id = :status_id, reason_cancel = :reason_cancel WHERE id = :id");
        $query->execute([
            'id' => $id,
            'status_id' => $status_id,
            'reason_cancel' => $reason_cancel
        ]);
    }

    public static function statusChange($id, $status_id)
    {
        $query = Connection::make()->prepare("UPDATE orders SET status_id = :status_id 
        WHERE id = :id");
        $query->execute([
            'id' => $id,
            'status_id' => $status_id
        ]);
    }

    public static function statusOrder()
    {
        $query = Connection::make()->query("SELECT status_id FROM orders
        WHERE status_id=4");
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    public static function find()
    {
        $query = Connection::make()->query("SELECT product_id FROM product_in_order 
        INNER JOIN orders ON product_in_order.order_id=orders.id
        WHERE status_id != 4 AND status_id != 5");
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }

    public static function confirm($id)
    {
        $query = Connection::make()->prepare('UPDATE orders SET date_arrival=CURRENT_DATE(), status_id=5
        WHERE id=:id');
        $query->execute(['id' => $id]);
    }

    public static function create($user_id, $address, $delivery)
    {
        $basket = Basket::getProductsFinish($user_id);

        $conn = Connection::make();

        try {
            $conn->beginTransaction();

            $order_id = self::addOrder($user_id, $conn, $address, $delivery);

            self::addProductsInOrder($basket, $order_id, $conn);

            Basket::clear($user_id, $conn);
            Basket::clearFav($user_id, $conn);

            $conn->commit();
        } catch (\PDOException $error) {
            $conn->rollBack();
            echo ('Ошибка ' . $error->getMessage());
        }
    }

    public static function addOrder($user_id, $conn, $address, $delivery)
    {
        $query = $conn->prepare('INSERT INTO orders (date_making, street, house, flat, city_id, user_id, status_id, delivery_id) VALUES (:date_making, :street, :house, :flat, :city_id, :user_id, 1, :delivery_id)');
        $query->execute([
            'date_making' => date('Y-m-d'),
            'street' => $address['street'],
            'house' => $address['house'],
            'flat' => $address['flat'],
            'city_id' => $address['city'],
            'user_id' => $user_id,
            'delivery_id' => $delivery,
            
        ]);
        return $conn->lastInsertId();
    }

    private static function getParam($array, $value)
    {
        return implode(',', array_fill(0, count($array), $value));
    }

    public static function addProductsInOrder($basket, $order_id, $conn)
    {
        $base = 'INSERT INTO product_in_order (order_id, product_id) VALUES';
        $params = self::getParam($basket, '(?,?)');
        $queryText =  $base . $params;
        $values = [];
        foreach ($basket as $item) {
            $values[] = $order_id;
            $values[] = $item->product_id;
        }
        $query = $conn->prepare($queryText);
        $query->execute($values);
    }
}
