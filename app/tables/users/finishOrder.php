<?php

use App\models\Address;
use App\models\Basket;
use App\models\Order;
use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/general.css',
    '/accets/css/finish_order.css'
];
$script = ['/accets/js/burger.js'];
$title = 'Оформление заказа';

if (isset($_GET['finishOrder'])) {
    if ($_SESSION['delivery'] == null) {
        $_SESSION['delivery']['error'] = 'Выберете способ доставки';
        header('Location: /app/tables/users/basket.php');
        die();
    }
    if ($_SESSION['address'] == null) {
        $_SESSION['address']['error'] = 'Выберете адрес доставки';
        header('Location: /app/tables/users/basket.php');
        die();
    } else {
        foreach ($_SESSION['address'] as $key => $value) {
            if ($value != '') {
                $country = Address::findCountriesById($_SESSION['address']['country']);
                $area = Address::findAreasById($_SESSION['address']['area']);
                $city = Address::findCitiesById($_SESSION['address']['city']);
                $user = User::find($_SESSION['id']);
                $products = Basket::getProductsFinish($_SESSION['id']);
                $count = Basket::count($_SESSION['id']);
                $sum = Basket::sum($_SESSION['id']);
                $priceDelivery = Order::priceDelivery($_SESSION['address']['city']);
            } else {
                $_SESSION['address']['error'] = 'Выберете адрес доставки';
                header('Location: /app/tables/users/basket.php');
                die();
            }
        }
    }
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/finishOrder.view.php';
