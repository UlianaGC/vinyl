
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
$script = [];

$products = Order::productsByOrders($_GET['id']);
$count = Order::count($_GET['id']);
$sum = Order::sum($_GET['id']);
$infoByOrder = Order::infoByOrder($_GET['id']);

$title = 'Заказ от '.$infoByOrder->date_making;

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/productByOrder.view.php';