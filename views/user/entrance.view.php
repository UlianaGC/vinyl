<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<form action="/app/tables/users/entranceCheck.php" class="entrance" method="POST">
    <h1 class="entrance__title">Вход</h1>
    <input class="entrance__text" name="email" placeholder="введите почту" value="<?= $_SESSION['save']??''?>" type="text">
    <?php if (isset($_POST['entrance'])) : ?>
        <p class="error"><?= $_SESSION['error']['email'] ?></p>
    <?php endif ?>
    <div class="enterance__password">
        <input class="entrance__type_password" name="password" placeholder="введите пароль" type="password">
        <?php if (isset($_POST['entrance'])) : ?>
            <p class="error"><?= $_SESSION['error']['password'] ?></p>
        <?php endif ?>
        <img class="enterance__img_password" src="/accets/img/passw1.png" alt="иконка">
    </div>
    <?php if (!empty($_SESSION['error']['null'])) : ?>
        <p class="error-null"><?= $_SESSION['error']['null'] ?></p>
    <?php endif ?>
    <button name="entrance" class="entrance__btn">Войти</button>
</form>

<div class="registration">
    <a href="/app/tables/users/registration.php" class="registration__btn">Регистрация</a>
    <p class="registration__desc">После регистрации вы получите доступ ко всем возможностям данного сайта</p>
</div>

<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; 
    unset($_SESSION['save']);
    unset($_SESSION['error'])?>
</section>
</body>

</html>