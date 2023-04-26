<?php

use App\models\Basket;
use App\models\Favourites;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/general.css',
    '/accets/css/basket.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/loadBasket.js',
    '/accets/js/fetch.js',
    '/accets/js/loadFavourite.js',
    '/accets/js/loadBasketCard.js'

];
$title = 'Избранное';

$products = Favourites::all($_SESSION['id']);

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/favourite.view.php';
