<?php

use App\models\Category;

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
    '/accets/js/loadCategory.js',
];
$title = 'Жанры';

$categories = Category::all();
include $_SERVER['DOCUMENT_ROOT'] . '/views/admin/category.view.php';