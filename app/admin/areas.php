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
$title = 'Регионы';

$areas = Address::allAreas();
$countries = Address::allCountries();

if (!empty($_GET) && isset($_GET["countryRadio"])) {
    if ($_GET["countryRadio"] !== 'Все') {
        $areas = Address::areasByCountry($_GET["countryRadio"]);   
    }
} else {
    $_GET["countryRadio"] = 'Все';
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/areas.view.php';
