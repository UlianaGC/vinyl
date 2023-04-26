<?php

use App\models\Category;
use App\models\Executor;
use App\models\Product;
use App\models\TrackList;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$product = Product::find($_GET["id"]);
$categories = Category::all();
$executors = Executor::all();
$tracks = TrackList::getTrackByProduct($_GET['id']);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/update.view.php";
