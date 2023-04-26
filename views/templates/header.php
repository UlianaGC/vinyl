<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/accets/img/fav.png" type="image/x-icon">
    <?php foreach ($style as $item) : ?>
        <link rel="stylesheet" href="<?= $item ?>">
    <?php endforeach ?>
    <?php foreach ($script as $item) : ?>
        <script defer src="<?= $item ?>"></script>
    <?php endforeach ?>

    <title><?= $title ?></title>
</head>

<body>
    <header>
        <a class="header__logo" href="/"></a>
        <nav class="header__nav">
            <?php if (!isset($_SESSION['auth']) || !$_SESSION['auth']) : ?>
                <ul class="header__list">
                    <li><a class="header__decoration" href="/">Главная</a></li>
                </ul>
                <ul class="header__list">
                    <li><a href="/app/tables/users/entrance.php">Вход\Регистрация</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/catalog.php">Каталог</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/info.php">Доставка</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/reviews.php">Политика</a></li>
                </ul>
            <?php else : ?>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/users/profile.php">Профиль</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/users/order.php">Заказы</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/users/basket.php">Корзина</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/users/favourite.php">Избранное</a></li>
                </ul>
                <ul class="header__list header__list3">
                    <li><a href="/app/tables/users/logout.php">Выход</a></li>
                </ul>
            <?php endif ?>
        </nav>
        <img class="burger" src="/accets/img/burger.png" alt="icon">
    </header>