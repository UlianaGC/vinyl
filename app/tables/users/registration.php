<?php

$style = [
    '/accets/css/general.css',
    '/accets/css/registration.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/passwordRegistration.js',
];
$title = 'Регистрация';

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/registration.view.php';
