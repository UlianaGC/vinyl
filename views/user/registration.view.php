<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<form action="/app/tables/users/insertUser.php" class="registration" method="POST">
    <h1 class="registration__title">Регистрация</h1>
    <input name="email" class="registration__text" placeholder="введите почту*" type="text" value="<?= $_SESSION['save']['email']??'' ?>">
    <?php if (!empty($_SESSION['error']['email'])) : ?>
        <p class="input__p"><?= $_SESSION['error']['email'] ?></p>
    <?php endif ?>
    <input name="login" class="registration__text" placeholder="введите логин*" type="text" value="<?= $_SESSION['save']['login']??'' ?>">
    <?php if (!empty($_SESSION['error']['login'])) : ?>
        <p class="input__p"><?= $_SESSION['error']['login'] ?></p>
    <?php endif ?>
    <div class="registration__password">
        <input name="password" class="registration__type_password registration__type_password_one" placeholder="введите пароль*" type="password">
        <img src="/accets/img/passw1.png" alt="иконки" class="registration__img_password registration__img_password_one">
        <?php if (!empty($_SESSION['error']['password'])) : ?>
            <p class="input__p_margin_little"><?= $_SESSION['error']['password'] ?></p>
        <?php endif ?>
    </div>
    <div class="registration__password">
        <input name="repeatPassword" class="registration__type_password registration__type_password_two" placeholder="подтвердите пароль*" type="password">
        <img src="/accets/img/passw1.png" alt="иконки" class="registration__img_password registration__img_password_two">

        <p class="input__p_margin_little"><?= $_SESSION['error']['repeatPassword'] ?? '' ?></p>

    </div>

    <div class="registration__politics">
        <input class="registration__checkbox" name="politcs" id="check" type="checkbox">
        <label class="registration__label" for="check"><a href="/app/tables/politics.php">
                <p><span class="registration__span">Я принимаю условия</span> Пользовательского
                    соглашения<span class="registration__span"> и даю</span> разрешение на обработку персональных
                    данных</p>
            </a></label>
    </div>
    <button name="insert" class="registration__btn" disabled>Зарегистрироваться</button>
    <?php if (!empty($_SESSION['error']['exists'])) : ?>
        <p class="input__p"><?= $_SESSION['error']['exists'] ?></p>
    <?php endif ?>
</form>
<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
    unset($_SESSION['error']);
    unset($_SESSION['save']) ?>
</section>
<script>
    document.querySelector('.registration__checkbox').addEventListener('change', (e) => {
        document.querySelector('[name="insert"]').disabled = !e.target.checked
    })
</script>
</body>

</html>