<?php

use App\models\Order;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$stream = file_get_contents("php://input");
if ($stream != null) {
    $id = json_decode($stream)->id;
    $confirm = Order::confirm($id);
    echo json_encode($confirm, JSON_UNESCAPED_UNICODE);
}
