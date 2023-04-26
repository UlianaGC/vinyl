<?php

use App\models\Order;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents("php://input");
if ($stream != null) {
    $id = json_decode($stream)->id;
    $change = Order::statusChange($id, 5);
    echo json_encode($change, JSON_UNESCAPED_UNICODE);
}


