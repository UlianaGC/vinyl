<?php

use App\models\Address;
use App\models\Basket;
use App\models\Favourites;
use App\models\Order;

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
    '/accets/js/modalWindowAddress.js',
    '/accets/js/fetch.js',
    '/accets/js/loadBasket.js',
    '/accets/js/loadBasketCard.js',
    // 4 => '/accets/js/loadAddressModal.js',

];
$title = 'Корзина';

$deliveries = Basket::delivery();

$products = Basket::getProductsByUser($_SESSION['id']);

$count = Basket::count($_SESSION['id'])->count;

$sum = Basket::sum($_SESSION['id'])->sum;

$countries = Address::allCountries();
$areas = Address::allAreas();
$cities = Address::allCities();
$productsInOrder = Order::find();

if (isset($_GET["delivery"])) {
    if ($_GET["delivery"] !== '') {
        $_SESSION['delivery'] = $_GET['delivery'];
    }
}

if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    $basket = Basket::find($_SESSION['id']);
    $favourite = Favourites::find($_SESSION['id']);
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/basket.view.php';
