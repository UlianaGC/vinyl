<?php

use App\models\Category;
use App\models\Product;
use App\models\TrackList;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$style = [
    '/accets/css/adminUser.css',
    '/accets/css/adminProductBy.css'
];
$script = [];

$products = Product::productByCategory($_GET['id']);
$category = Category::getCategory($_GET['id']);
$tracks = TrackList::all();

$title = $category->name;
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/productsByCategory.view.php';