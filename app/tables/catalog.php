<?php

use App\models\Basket;
use App\models\Category;
use App\models\Executor;
use App\models\Favourites;
use App\models\Order;
use App\models\Product;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/card_grid.css',
    '/accets/css/catalog.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/hr_card.js',
    '/accets/js/fetch.js',
    '/accets/js/loadBasketCard.js',
    '/accets/js/loadAuthFalse.js'
];
$title = 'Каталог';

$products = Product::all();
$executors = Executor::all();
$categories = Category::all();
$productsInOrder = Order::find();

if (!empty($_GET) && isset($_GET["category"])) {
    if ($_GET["category"] !== 'Все') {
        $products = Product::productByCategory($_GET["category"]);
        $executors = Executor::getExecutorsByCategory($_GET['category']);
        $_SESSION['category'] = Category::getCategory($_GET['category'])->name;
    }
} 

if (!empty($_GET) && isset($_GET["executor"])) {
    if ($_GET["executor"] !== 'Все') {
        $products = Product::productByExecutor($_GET["executor"]);
        $_SESSION['executor'] = Executor::getExecutor($_GET['executor'])->name;
    }
} 

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/views/catalog.view.php';