<?php

use App\models\Category;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents("php://input");
if ($stream != null) {
    $category = json_decode($stream)->data;
    $add = Category::add($category);
    echo json_encode($add, JSON_UNESCAPED_UNICODE);
}
