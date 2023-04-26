<?php

use App\models\Order;

include $_SERVER['DOCUMENT_ROOT'] . "/bootstrap.php";

unset($_SESSION['status']);
unset($_SESSION['error']);

if (isset($_POST['confirm'])) {
    $_SESSION['status']['confirm'] = true;
    Order::updateStatus($_POST['id'], $_POST['status']);
}

if (isset($_POST['deny'])) {
    if (empty($_POST['reason_cancel'])) {
        $_SESSION['error'] = 'заполните поле';
    }
    if (!isset($_SESSION['error'])) {
        $_SESSION['status']['deny'] = true;
        Order::statusDeny($_POST['idCancel'], $_POST['statusCancel'], $_POST['reason_cancel']);
    }
}

