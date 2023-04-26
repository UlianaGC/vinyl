<?php

namespace App\models;

use App\helpers\Connection;

class Delivery
{
    public static function all()
    {
        $query = Connection::make()->query('SELECT * from info_deliveries');
        return $query->fetchAll();
    }
}