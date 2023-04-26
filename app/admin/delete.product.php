<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;
 $delete = Product::delete($id);
 $image = json_decode($stream)->image;
 unlink($_SERVER["DOCUMENT_ROOT"].'/upload/'.$image);
 echo json_encode($delete, JSON_UNESCAPED_UNICODE);
}