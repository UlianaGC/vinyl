<?php

use App\models\Executor;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/adminUser.css',
    '/accets/css/adminCategories.css',
    '/accets/css/adminProduct.css'
];
$script = [
    '/accets/js/modalWindowAdmin.js',
    '/accets/js/fetch.js',
    '/accets/js/loadExecutor.js',
];
$title = 'Исполнители';
$executors = Executor::all();

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/executor.view.php';
