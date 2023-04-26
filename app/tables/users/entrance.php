<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/entrance.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/hr_card.js',
    '/accets/js/passwordEntrance.js'
];
$title = 'Вход';

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/entrance.view.php';