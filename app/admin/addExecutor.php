<?php

use App\models\Executor;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
    $executor = json_decode($stream)->data;
    $add = Executor::add($executor);
    echo json_encode($add, JSON_UNESCAPED_UNICODE);
}
