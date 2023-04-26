<?php

namespace App\models;

use App\helpers\Connection;

class TrackList
{
    public static function getTrackByProduct($id)
    {
        $query = Connection::make()->prepare('SELECT * FROM track_list
        WHERE product_id=:id');
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

    public static function all()
    {
        $query = Connection::make()->query('SELECT * FROM track_list');
        return $query->fetchAll();
    }

    public static function update($id, $name)
    {
        $query = Connection::make()->prepare('UPDATE track_list SET name = :name
        WHERE id=:id');
        $query->execute([
            'id' => $id,
            'name' => $name
        ]);
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare('DELETE FROM track_list
        WHERE id=:id');
        $query->execute(['id' => $id]);
    }

    public static function insert($id, $name)
    {
        $conn = Connection::make();
        $query = $conn->prepare('INSERT INTO track_list(name, product_id) VALUES (:name, :id)');
        $query->execute([
            'id' => $id,
            'name' => $name
        ]);
        return $conn->lastInsertId();
    }

    public static function idLastProduct()
    {
        $query = Connection::make()->query('SELECT id, name FROM products
        ORDER BY id DESC
        LIMIT 1');
        return $query->fetch();
    }
}
