<?php

use App\models\Order;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/adminUser.css',
    '/accets/css/adminCategories.css'    
];
$script = [
    '/accets/js/modalWindowAdmin.js',
    '/accets/js/fetch.js',
    '/accets/js/loadOrderAdmin.js',
];
$title = 'Заказы';

$orders = Order::all();
$statuses = Order::allSatatuses();

$statusOrder = Order::statusOrder();

if (!empty($_GET) && isset($_GET["status"])) {
    if ($_GET["status"] !== 'Все') {
        $orders = Order::orderByStatus($_GET["status"]);   
    }
} else {
    $_GET["status"] = 'Все';
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/order.view.php';