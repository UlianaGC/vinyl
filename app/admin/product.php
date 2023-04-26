<?php

use App\models\Category;
use App\models\Executor;
use App\models\Product;
use App\models\TrackList;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/adminUser.css',
    '/accets/css/adminProduct.css',
    '/accets/css/adminCategories.css'
];
$script = [
    '/accets/js/modalWindowAdmin.js',
    '/accets/js/fetch.js',
    '/accets/js/loadProduct.js'
];
$title = 'Товары';

$products = Product::all();
$categories = Category::all();
$executors = Executor::all();
$tracks = TrackList::all();

if (!empty($_GET) && isset($_GET["category"])) {
    if ($_GET["category"] !== 'Все') {
        $products = Product::productByCategory($_GET["category"]);
        $executors = Executor::getExecutorsByCategory($_GET['category']);
    }
} 

if (!empty($_GET) && isset($_GET["executor"])) {
    if ($_GET["executor"] !== 'Все') {
        $products = Product::productByExecutor($_GET["executor"]);
    }
} 

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/product.view.php';
