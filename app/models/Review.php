<?php

namespace App\models;

use App\helpers\Connection;

class Review{
    public static function getThreeRewiews()
    {
        $query = Connection::make()->query('SELECT text, users.login FROM reviews
        INNER JOIN users ON reviews.user_id=users.id
        ORDER BY date_making DESC
        LIMIT 3');
        return $query->fetchAll();
    }

    public static function all()
    {
        $query = Connection::make()->query('SELECT reviews.*, users.login, SUBSTRING(login, 1, 1) as firstLetter FROM reviews
        INNER JOIN users ON reviews.user_id=users.id');
        return $query->fetchAll();
    }

    public static function add($text, $user_id)
    {
        $query = Connection::make()->prepare('INSERT INTO reviews (date_making, text, user_id) VALUES (:date_making, :text, :user_id)');
        $query->execute([
            'date_making'=>date("Y-m-d"),
            'text'=>$text,
            'user_id'=>$user_id
        ]);
        return 'add';
    }
}