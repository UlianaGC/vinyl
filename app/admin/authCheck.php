<?php

use App\models\User;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION["error"]);
if (isset($_POST["auth"])) {
    $user = User::getUser($_POST["email"], $_POST["password"]);

    if ($user == null) {
        $_SESSION["admin"] = false;
        $_SESSION["error"] = "Администратор не найден";
        header("Location: /app/admin/auth.php");
        die();
    } else {
        if ($user->role_id == 1) {
            $_SESSION["admin"] = true;
            $_SESSION["id"] = $user->id;
            header("Location: /app/admin/profile.php");
        } else {
            $_SESSION["error"] = "Вы не администратор";
            header("Location: /app/admin/auth.php");
        }
    }
}
