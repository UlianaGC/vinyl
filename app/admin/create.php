<?php

use App\models\Product;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

unset($_SESSION['error']);
if (isset($_POST['insertProduct'])) {
    if (isset($_FILES['photo'])) {
        $name = $_FILES['photo']["name"];
        $tmpName = $_FILES['photo']["tmp_name"];
        $error = $_FILES['photo']["error"];
        if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $name)) {
        } else {
            $product = Product::add($_POST, $name);
        }
    }
};
// header('Location: /app/admin/product.php');
header('Location: /app/admin/newTrack.php');
