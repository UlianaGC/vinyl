<?php

use App\models\Basket;
use App\models\User;
use App\models\Favourites;
use App\models\Order;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/general.css',
    '/accets/css/card_grid.css',
    '/accets/css/profile.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/hr_card.js',
    '/accets/js/fetch.js',
    '/accets/js/loadBasketCard.js'
];

$user = User::find($_SESSION['id']);
$products = Favourites::getProductsByUser($_SESSION['id']);
$productsInOrder = Order::find();

$title = $user->login;

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/profile.view.php';
