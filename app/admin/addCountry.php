<?php

use App\models\Address;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
    $country = json_decode($stream)->data;
    $add = Address::addCountries($country);
    echo json_encode($add, JSON_UNESCAPED_UNICODE);
}
