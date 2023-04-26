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
$title = 'Города';

$cities = Address::allCities();
$areas = Address::allAreas();
$countries = Address::allCountries();

if (!empty($_GET) && isset($_GET["country"])) {
    if ($_GET["country"] !== 'Все') {
        $cities = Address::citiesByCountry($_GET['country']);
        $areas = Address::areasByCountry($_GET['country']);
    }
} 

if (!empty($_GET) && isset($_GET["area"])) {
    if ($_GET["area"] !== 'Все') {
        $cities = Address::citiesByArea($_GET['area']);
    }
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/cities.view.php';
