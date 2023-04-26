<?php

use App\models\Order;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

Order::create($_SESSION['id'], $_SESSION['address'], $_SESSION['delivery']);

header('Location: /app/tables/users/order.php');