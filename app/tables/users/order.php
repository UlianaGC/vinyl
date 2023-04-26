<?php

use App\models\Order;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/general.css',
    '/accets/css/orders.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/fetch.js',
    '/accets/js/loadOrderConfirm.js'
];
$title = 'Заказы';

$orders = Order::orderByUser($_SESSION['id']);
$productsByOrder = Order::productsInOrdersByUser($_SESSION['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/order.view.php';
