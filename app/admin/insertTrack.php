<?php

use App\models\TrackList;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION["admin"]) || !$_SESSION["admin"]) {
    header("Location: /");
    die();
}
$stream = file_get_contents("php://input");
if ($stream != null) {
 $id = json_decode($stream)->data;
 $name = json_decode($stream)->action;
 $insert = TrackList::insert($id, $name);
 echo json_encode($insert, JSON_UNESCAPED_UNICODE);
}
?>