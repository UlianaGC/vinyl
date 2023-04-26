<?php

use App\models\Address;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;
 $price = json_decode($stream)->updatePrice;
 $update = Address::updatePrice($id, $price);
 echo json_encode($update, JSON_UNESCAPED_UNICODE);
}