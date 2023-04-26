<?php

use App\models\Basket;
use App\models\Favourites;
use App\models\Order;
use App\models\Product;
use App\models\Review;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/style_card.css',
    '/accets/css/index.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/hr_card.js',
    '/accets/js/index_slider.js',
    '/accets/js/fetch.js',
    '/accets/js/loadBasketCard.js',
    '/accets/js/loadAuthFalse.js'
];
$title = 'Главная';

$oneNewProduct = Product::getOneNewProduct();
$reviews = Review::getThreeRewiews();
$onePopularProduct = Product::getOnePopularProduct();
$newProducts = Product::getNewProducts();
$popularProducts = Product::getPopularProducts();
$productsInOrder = Order::find();

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/index.view.php';
