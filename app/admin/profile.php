<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/adminUser.css'
];
$script = [];
$title = 'Профиль';

$users = User::all();

$roles = User::allRoles();

if (!empty($_GET) && isset($_GET["user"])) {
    if ($_GET["user"] !== 'Все') {
        $users = User::showUsersByRole($_GET["user"]);   
    }
} else {
    $_GET["user"] = 'Все';
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/profile.view.php';