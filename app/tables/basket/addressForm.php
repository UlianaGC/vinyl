<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
//     header("Location: /");
//     die();
// }

$_SESSION['address']['country'] = $_POST['country_id'];
$_SESSION['address']['area'] = $_POST['area_id'];
$_SESSION['address']['city'] = $_POST['city_id'];
$_SESSION['address']['street'] = $_POST['street'];
$_SESSION['address']['house'] = $_POST['house'];
$_SESSION['address']['flat'] = $_POST['flat'];

echo json_encode($_SESSION['address'], JSON_UNESCAPED_UNICODE);
