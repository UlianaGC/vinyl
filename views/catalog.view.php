<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="catalog">
    <div class="conteiner">
        <h1 class="catalog__title">Каталог пластинок</h1>
        <div class="catalog__select">
            <form action="">
                <select onchange="this.form.submit()" id="genre" name="category">
                    <option <?= isset($_GET['category']) && $_GET['category'] == 'Все' ? 'selected' : '' ?> value="Все">Все</option>
                    <?php foreach ($categories as $category) : ?>
                        <option <?= isset($_GET['category']) && $_GET['category'] == $category->id ? 'selected' : '' ?> id="<?= $category->id ?>" value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>
            </form>

            <form action="">
                <select id="executor" onchange="this.form.submit()" name="executor">
                    <option value="Все" <?= isset($_GET['executor']) && $_GET['executor'] == 'Все' ? 'selected' : '' ?>>Все</option>
                    <?php foreach ($executors as $executor) : ?>
                        <option value="<?= $executor->id ?>" <?= isset($_GET['executor']) && $_GET['executor'] == $executor->id ? 'selected' : '' ?>><?= $executor->name ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
        <div class="catalog__cards">
            <?php if (!empty($_GET['category']) && $_GET['category'] != 'Все') : ?>
                <p class="catalog__sort_desc">Вы выбрали жанр: <?= $_SESSION['category'] ?></p>
            <?php elseif(!empty($_GET['executor']) && $_GET['executor'] != 'Все') : ?>
                <p class="catalog__sort_desc">Вы выбрали исполнителя: <?= $_SESSION['executor'] ?></p>
            <?php else : ?>
                <p class="catalog__sort_desc"></p>
            <?php endif ?>
            <div class="card">
                <?php foreach ($products as $product) : ?>
                    <?php if (isset($productsInOrder) && in_array($product->id, $productsInOrder)) : ?>
                        <div class="card__item disabled">
                        <?php else : ?>
                            <div class="card__item">
                            <?php endif ?>
                            <div class="card__cover">
                                <a href="/app/tables/product.php?id=<?= $product->id ?>&executor_name=<?= $product->executor_name ?>">
                                    <img class="card__img" src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>">
                                </a>
                            </div>
                            <div class="card__text">
                                <div class="card__info">
                                    <a href="/app/tables/product.php?id=<?= $product->id ?>&executor_name=<?= $product->executor_name ?>">
                                        <h2 class="card__title"><?= $product->product_name ?></h2>
                                    </a>
                                    <p class="card__executor">Исполнитель: <?= $product->executor_name ?></p>
                                    <p class="card__genre">Жанр: <?= $product->category_name ?></p>
                                    <p class="card__price">Цена: <span class="card__span"> <?= number_format($product->price, 0, '', ' ')  ?></span>&#8381;</p>
                                </div>
                                <div class="card__icons">
                                <?php if (isset($_SESSION['auth'])&&$_SESSION['auth']) : ?>
                                    <?php if (isset($basket) && in_array($product->id, $basket)) : ?>
                                        <img class="card__icon" data-basket="basket" data-id="<?= $product->id ?>" src="/accets/img/tickCheck.png" alt="icon">
                                    <?php else : ?>
                                        <img class="card__icon" data-basket="add" data-id="<?= $product->id ?>" src="/accets/img/basket.png" alt="icon">
                                    <?php endif ?>
                                    <?php if (isset($favourite) && in_array($product->id, $favourite)) : ?>
                                        <img class="card__icon" data-favourite="favourite" data-id="<?= $product->id ?>" src="/accets/img/favLove.png" alt="icon">
                                    <?php else : ?>
                                        <img class="card__icon" data-favourite="addFav" data-id="<?= $product->id ?>" src="/accets/img/favourites.png" alt="icon">
                                    <?php endif ?>
                                <?php else : ?>
                                    <img class="card__icon message" src="/accets/img/basket.png" alt="icon">
                                    <img class="card__icon message" src="/accets/img/favourites.png" alt="icon">
                                <?php endif ?>
                                </div>
                            </div>
                            </div>
                        <?php endforeach ?>
                        </div>
            </div>
        </div>
    </div>
    <section class="section__footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
    </section>
    </body>
    <div class="modal-wrapper">
        <div class="modal">
            <p class="closed">X</p>
            <h3>Для начала совершите вход</h3>
            <p class="modal__desc">Некоторые действия не доступны неавторизированным пользователям</p>
            <button class="modal__entrance"><a href="/app/tables/users/entrance.php">Войти</a></button>
        </div>
    </div>
    </html>