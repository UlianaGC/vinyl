<?php

use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['insert'])) {
    if ($_POST['email'] != '') {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            $_SESSION['error']['email'] = 'Почта некорректна';
        $_SESSION['save']['email'] = $_POST['email'];
    } else $_SESSION['error']['email'] = 'Поле обязательно для заполнения';

    if ($_POST['login'] != '') {
        if (!preg_match('/^\w+$/u', $_POST['login']))
            $_SESSION['error']['login'] = 'Логин некорректен';
        $_SESSION['save']['login'] = $_POST['login'];
    } else $_SESSION['error']['login'] = 'Поле обязательно для заполнения';

    if ($_POST['password'] != '') {
        // $_SESSION['save']['password'] = $_POST['password'];
    } else $_SESSION['error']['password'] = 'Поле обязательно для заполнения';

    if ($_POST['password'] != $_POST['repeatPassword']) {
        $_SESSION['error']['repeatPassword'] = 'Пароли не совпадают';
    }

    $user = User::getUser($_POST['email'], $_POST['password']);
    if ($user != null) {
        $_SESSION['error']['exists'] = 'Пользователь уже зарегистрирован';
    }

    if (empty($_SESSION['error'])) {
        unset($_SESSION['save']);
        $user = User::insert($_POST);
        $user = User::getUser($_POST['email'], $_POST['password']);
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user->id;
        // $_SESSION['profile']['name'] = $user->name;
        header('Location: /app/tables/users/profile.php');
        die();
    } 
    else
    header('Location: /app/tables/users/registration.php');

}
