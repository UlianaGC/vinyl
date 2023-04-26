<?php

use App\models\Delivery;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/info.css'
];
$script = [
    '/accets/js/info_accardion.js'
];
$title = 'Доставка';

$deliveries = Delivery::all();

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/info.view.php';