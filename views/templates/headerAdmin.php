<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
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
        <nav>
            <div class="nav__left">
            </div>
            <div class="nav__right">
                <p><a href="/app/tables/users/logout.php">Выход</a></p>
            </div>
        </nav>
    </header>
    <main>
        <div class="main__menu">
            <p class="menu__desc active"><a href="/app/admin/profile.php">Пользователи</p></a>
            <p class="menu__desc"><a href="/app/admin/order.php">Заказы</p></a>
            <p class="menu__desc"><a href="/app/admin/category.php">Жанры</p></a>
            <p class="menu__desc"><a href="/app/admin/executor.php">Исполнители</p></a>
            <p class="menu__desc"><a href="/app/admin/product.php">Продукты</p></a>
            <p class="menu__desc"><a href="/app/admin/countries.php">Страны</p></a>
            <p class="menu__desc"><a href="/app/admin/areas.php">Регионы</p></a>
            <p class="menu__desc"><a href="/app/admin/cities.php">Города</p></a>
        </div>