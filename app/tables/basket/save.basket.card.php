<?php

use App\models\Basket;
use App\models\Favourites;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents('php://input');

if ($stream != null) {
    $product_id = json_decode($stream)->data;
    $user_id = $_SESSION['id'];
    $action = json_decode($stream)->action;
    $productInBasket = match ($action) {
        'add' => Basket::add($user_id, $product_id),
        'addFav' => Favourites::add($user_id, $product_id)
    };

    echo json_encode([
        "productInBasket" => $productInBasket
    ], JSON_UNESCAPED_UNICODE);
}
