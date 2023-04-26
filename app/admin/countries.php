<?php

use App\models\Address;

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
    '/accets/js/loadAddress.js',
];
$title = 'Страны';

$countries = Address::allCountries();

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/countries.view.php';
