<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация администратора</title>
    <link rel="stylesheet" href="/accets/css/adminAuth.css">
</head>

<body>
    <div class="conteiner">
        <h1 class="conteiner__title">Вход</h1>
        <form class="input" action="/app/admin/authCheck.php" method="POST">
            <input name="email" type="text" placeholder="введите почту">
            <input name="password" type="password" placeholder="введите пароль">
            <button name="auth">Войти</button>
            <p><?= $_SESSION['error']??''?></p>
        </form>
    </div>
</body>
<?php unset($_SESSION['error'])?>
</html>