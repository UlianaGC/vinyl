<?php

use App\models\Review;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /");
    die();
}

$stream = file_get_contents('php://input');
if (isset($_SESSION['auth']) && $_SESSION['auth']) {
    if ($stream != null) {
        $text = json_decode($stream)->data;
        $badWords = ['дур', 'коз'];
        $resText = preg_replace('/\b[а-яё]*('.implode('|', $badWords).')[а-яё]*\b/ui', '***', $text);
        $user_id = $_SESSION['id'];
        $action = json_decode($stream)->action;
        $review = match ($action) {
            'add' => Review::add($resText, $user_id)
        };
        echo json_encode([
            "review" => $review
        ], JSON_UNESCAPED_UNICODE);
    }
}
