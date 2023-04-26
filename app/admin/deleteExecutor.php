<?php

use App\models\Executor;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->id;
 $delete = Executor::delete($id);
 echo json_encode($delete, JSON_UNESCAPED_UNICODE);
}

// include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/executor.view.php';