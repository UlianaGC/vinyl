<?php

use App\models\Executor;
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

$products = Product::productByExecutor($_GET['id']);
$executor = Executor::getExecutor($_GET['id']);
$tracks = TrackList::all();

$title = $executor->name;
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/productsByExecutor.view.php';