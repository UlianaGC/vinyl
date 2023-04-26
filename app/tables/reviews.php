<?php

use App\models\Review;
use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$style = [
    '/accets/css/general.css',
    '/accets/css/reviews.css'
];
$script = [
    '/accets/js/burger.js',
    '/accets/js/fetch.js',
    '/accets/js/loadReview.js'
];
$title = 'Отзывы';

$reviews = Review::all();

if (!empty($_SESSION["auth"])) {
    $user = User::find($_SESSION['id']);
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/views/reviews.view.php';
