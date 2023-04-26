<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$extensions = ["jpg", "jpeg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];

if ($_FILES["photo"]['name'] != '') {
    $name = $_FILES["photo"]["name"];
    $tmpName = $_FILES["photo"]["tmp_name"];
    $error = $_FILES["photo"]["error"];
    $path_parts = pathinfo($name);
    $image = $name;
    if ($error == 0) {
        if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $image)) {
            $_SESSION["error"] = "Не получилось загрузить файл";
            if (isset($_POST["updateProduct"])) {
                if ($_POST["id"] != null) {
                    Product::update($_POST, $image);
                }
            }
        };
    } else {
        $_SESSION["error"] = "Ошибка";
    };
} else {
    Product::noImg($_POST);
};
header("Location: /app/admin/product.php");
