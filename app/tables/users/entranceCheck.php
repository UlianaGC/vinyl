<?php

use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['entrance'])) {
    if ($_POST['email'] == '') {
        $_SESSION['error']['email'] = 'Поле обязательно для заполнения';
    }
    else{
        $_SESSION['save'] = $_POST['email'];
    }
    if ($_POST['password'] == '') {
        $_SESSION['error']['password'] = 'Поле обязательно для заполнения';
    }

    if(!empty($_SESSION['error'])){
        header('Location: /app/tables/users/entrance.php');
    }
    else {
        $user = User::getUser($_POST['email'], $_POST['password']);
        if ($user == null) {
            $_SESSION['error']['null'] = 'Вы не зарегистрированы';
            $_SESSION['auth'] = false;
            header('Location: /app/tables/users/entrance.php');
            die();
        } else {
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user->id;
            header('Location: /app/tables/users/profile.php');
        }
    }
}
