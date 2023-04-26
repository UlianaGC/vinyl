<?php

namespace App\models;

use App\helpers\Connection;

class Address
{
    public static function allCountries()
    {
        $query = Connection::make()->query('SELECT * FROM countries');
        return $query->fetchAll();
    }

    public static function findCountries($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM countries WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function findCountriesById($id)
    {
        $query = Connection::make()->prepare("SELECT name FROM countries WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function addCountries($name)
    {
        $conn = Connection::make();
        $country = self::findCountries($name);
        if (!$country) {
            $query = $conn->prepare('INSERT INTO countries (name) values (:name)');
            $query->execute(['name' => $name]);
        }
        return $conn->lastInsertId();
    }

    public static function deleteCountries($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM countries WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function allAreas()
    {
        $query = Connection::make()->query('SELECT areas.id, areas.name as name, countries.name as country_name FROM areas
        INNER JOIN countries ON areas.country_id=countries.id');
        return $query->fetchAll();
    }

    public static function findAreas($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM areas WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function findAreasById($id)
    {
        $query = Connection::make()->prepare("SELECT name FROM areas WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function addAreas($name, $country)
    {
        $conn = Connection::make();
        $area = self::findAreas($name);
        if (!$area) {
            $query = $conn->prepare('INSERT INTO areas (name, country_id) values (:name, :country_id)');
            $query->execute([
                'name' => $name,
                'country_id' => $country
            ]);
        }
        return $conn->lastInsertId();
    }

    public static function deleteAreas($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM areas WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function areasByCountry($id)
    {
        $query =  Connection::make()->prepare('SELECT areas.id, areas.name as name, countries.name as country_name FROM areas
        INNER JOIN countries ON areas.country_id=countries.id
        WHERE country_id=:country_id');
        $query->execute(['country_id' => $id]);
        return $query->fetchAll();
    }

    public static function allCities()
    {
        $query = Connection::make()->query('SELECT cities.id, cities.name as name, price, areas.name as area_name, countries.name as country_name FROM cities
        INNER JOIN areas ON cities.area_id=areas.id
        INNER JOIN countries ON areas.country_id=countries.id');
        return $query->fetchAll();
    }

    public static function findCities($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM cities WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function findCitiesById($id)
    {
        $query = Connection::make()->prepare("SELECT name FROM cities WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function addCities($name, $price, $area)
    {
        $conn = Connection::make();
        $city = self::findCities($name);
        if (!$city) {
            $query = $conn->prepare('INSERT INTO cities (name, price, area_id) values (:name, :price, :area_id)');
            $query->execute([
                'name' => $name,
                'price' => $price,
                'area_id' => $area
            ]);
        }
        return $conn->lastInsertId();
    }

    public static function deleteCities($id)
    {
        $query =  Connection::make()->prepare('DELETE FROM cities WHERE id=:id');
        $query->execute(['id' => $id]);
        return 'delete';
    }

    public static function updatePrice($id, $price)
    {
        $query =  Connection::make()->prepare('UPDATE cities SET price=:price
        WHERE id=:id');
        $query->execute([
            'id' => $id,
            'price' => $price
        ]);
    }

    public static function citiesByCountry($id)
    {
        $query =  Connection::make()->prepare('SELECT cities.id, cities.price, cities.name as name, areas.name as area_name, countries.name as country_name FROM cities
        INNER JOIN areas ON cities.area_id=areas.id
        INNER JOIN countries ON areas.country_id=countries.id
        WHERE countries.id=:country_id');
        $query->execute(['country_id' => $id]);
        return $query->fetchAll();
    }

    public static function citiesByArea($id)
    {
        $query =  Connection::make()->prepare('SELECT cities.id, cities.price, cities.name as name, areas.name as area_name, countries.name as country_name FROM cities
        INNER JOIN areas ON cities.area_id=areas.id
        INNER JOIN countries ON areas.country_id=countries.id
        WHERE area_id=:area_id');
        $query->execute(['area_id' => $id]);
        return $query->fetchAll();
    }

    public static function getAreasByCountry($id)
    {
        $query =  Connection::make()->prepare('SELECT * FROM areas 
        WHERE country_id=:id ');
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }

    public static function getCitiesByArea($id)
    {
        $query =  Connection::make()->prepare('SELECT * FROM cities 
        WHERE city_id=:id ');
        $query->execute(['id' => $id]);
        return $query->fetchAll();
    }
}
