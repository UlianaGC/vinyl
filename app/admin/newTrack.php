<?php

use App\models\TrackList;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}

$idLastProduct = TrackList::idLastProduct();
$tracks = TrackList::getTrackByProduct($idLastProduct->id);

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/newTrack.view.php";
