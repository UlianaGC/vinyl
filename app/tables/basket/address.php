<?php

use App\models\Basket;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents('php://input');

if ($stream != null) {
    $id = json_decode($stream)->data;
    $action = json_decode($stream)->action;
    $address = match ($action) {
        'areasByCountry' => Basket::areasByCountry($id),
        'citiesByArea' => Basket::citiesByArea($id)
    };

    echo json_encode([
        "address" => $address
    ], JSON_UNESCAPED_UNICODE);
}
