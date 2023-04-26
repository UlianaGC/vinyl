<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<div class="conteiner">
    <div class="product">

        <div class="product__image">
            <img src="/upload/<?= $product->photo ?>" alt="<?= $product->name ?>" class="product__img">
        </div>
        <div class="product__info">
            <h1><?= $product->name ?></h1>
            <p>Исполнитель: <?= $product->executor_name ?></p>
            <p>Год релиза: <?= $product->year_release ?> г.</p>
            <p>Жанр: <?= $product->category_name ?></p>
            <p class="product__price">Цена: <span><?= number_format($product->price, 0, '', ' ') ?></span> &#8381;</p>
            <h4>Трек лист:</h4>
            <div class="product__treklist">
                <?php foreach ($trackList as $track) : ?>
                    <p><?= $track->name?></p>
                <?php endforeach ?>
            </div>
            <div class="product__icons_btn">
                <div class="product__icons">
                    <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) : ?>
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
    </div>
    <h2 class="vinyl_executor">Винил данного исполнителя</h2>
    <div class="conteiner">
        <div class="card card__new">
            <?php foreach ($vinylExecutor as $item) : ?>
                <?php if (isset($productsInOrder) && in_array($item->id, $productsInOrder)) : ?>
                    <div class="card__item card__item__left disabled">
                    <?php else : ?>
                        <div class="card__item card__item__left">
                        <?php endif ?>
                        <div class="card__cover">
                            <a href="/app/tables/product.php?id=<?= $item->id ?>&executor_name=<?= $item->executor_name ?>">
                                <img class="card__img" src="/upload/<?= $item->photo ?>" alt="<?= $item->product_name ?>">
                            </a>
                        </div>
                        <div class="card__text">
                            <div class="card__info">
                                <a href="/app/tables/product.php?id=<?= $item->id ?>&executor_name=<?= $item->executor_name ?>">
                                    <h2 class="card__title"><?= $item->product_name ?>
                                    </h2>
                                </a>
                                <p class="card__executor">Исполнитель: <?= $item->executor_name ?></p>
                                <p class="card__genre">Жанр: <?= $item->category_name ?></p>
                                <p class="card__price">Цена: <span class="card__span"> <?= number_format($item->price, 0, '', ' ')  ?></span>&#8381;</p>
                            </div>
                            <div class="card__icons">
                                <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) : ?>
                                    <?php if (isset($basket) && in_array($item->id, $basket)) : ?>
                                        <img class="card__icon" data-basket="basket" data-id="<?= $item->id ?>" src="/accets/img/tickCheck.png" alt="icon">
                                    <?php else : ?>
                                        <img class="card__icon" data-basket="add" data-id="<?= $item->id ?>" src="/accets/img/basket.png" alt="icon">
                                    <?php endif ?>
                                    <?php if (isset($favourite) && in_array($item->id, $favourite)) : ?>
                                        <img class="card__icon" data-favourite="favourite" data-id="<?= $item->id ?>" src="/accets/img/favLove.png" alt="icon">
                                    <?php else : ?>
                                        <img class="card__icon" data-favourite="addFav" data-id="<?= $item->id ?>" src="/accets/img/favourites.png" alt="icon">
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