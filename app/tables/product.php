<?php

use App\models\Basket;
use App\models\Favourites;
use App\models\Order;
use App\models\Product;
use App\models\TrackList;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/style_card.css',
    '/accets/css/product.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/hr_card.js',
    '/accets/js/fetch.js',
    '/accets/js/loadBasketCard.js',
    '/accets/js/loadAuthFalse.js'
];

$product = Product::getProductById($_GET['id']);
$vinylExecutor = Product::vinylExecutor($_GET['id'], $_GET['executor_name']);
$productsInOrder = Order::find();

$title = $product->name;

$trackList = TrackList::getTrackByProduct($_GET['id']);

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/product.view.php';