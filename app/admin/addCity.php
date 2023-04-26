<?php

use App\models\Address;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
    $city = json_decode($stream)->data;
    $area = json_decode($stream)->action;
    $price = json_decode($stream)->perem;
    $add = Address::addCities($city, $price, $area);
    echo json_encode($add, JSON_UNESCAPED_UNICODE);
}
