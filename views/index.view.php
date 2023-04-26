<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="conteiner">
    <div class="main">
        <div class="main__text">
            <h1 class="main__title">Прикоснитесь к музыке</h1>
            <p class="main__desc">Доставка осуществляется по всей территории СНГ
                Оплата совершается только при получении товара</p>
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth']) : ?>
                    <a class="btn main__btn_black" href="/app/tables/users/logout.php">Выйти</a>
            <?php else : ?>
                <a class="btn main__btn_black" href="/app/tables/users/entrance.php">Войти</a>
            <?php endif ?>
            <a class="btn main__btn_noblack" href="/app/tables/catalog.php">Каталог</a>
        </div>

        <div class="main__image">
            <img class="main__img" src="accets/img/main__img.png" alt="пластинка">
        </div>
    </div>
</div>

<div class="line">
    <div class="line__text">Новинки Новинки Новинки Новинки Новинки Новинки Новинки Новинки Новинки Новинки
        Новинки Новинки</div>
</div>
<section>
    <div class="conteiner">
        <?php foreach ($oneNewProduct as $product) : ?>
            <?php if (isset($productsInOrder) && in_array($product->id, $productsInOrder)) : ?>
                <div class="new disabled">
                <?php else : ?>
                    <div class="new">
                    <?php endif ?>
                    <div class="new__image">
                        <img class="new__img" src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>">
                    </div>
                    <div class="new__text">
                        <h1 class="new__title"><?= $product->product_name ?></h1>
                        <p class="new__desc"><?= $product->executor_name ?></p>
                        <a class="btn new__btn goOverByProduct" href="/app/tables/product.php?id=<?= $product->id ?>&executor_name=<?= $product->executor_name ?>">Перейти</a>
                    </div>
                    </div>
                <?php endforeach ?>
                </div>
</section>
<div class="conteiner">
    <div class="card card__new">
        <?php foreach ($newProducts as $product) : ?>
            <?php if (isset($productsInOrder) && in_array($product->id, $productsInOrder)) : ?>
                <div class="card__item card__item__left disabled">
                <?php else : ?>
                    <div class="card__item card__item__left">
                    <?php endif ?>
                    <div class="card__cover">
                        <a href="/app/tables/product.php?id=<?= $product->id ?>&executor_name=<?= $product->executor_name ?>">
                            <img class="card__img" src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>">
                        </a>
                    </div>
                    <div class="card__text">
                        <div class="card__info">
                            <a href="/app/tables/product.php?id=<?= $product->id ?>&executor_name=<?= $product->executor_name ?>">
                                <h2 class="card__title"><?= $product->product_name ?>
                                </h2>
                            </a>
                            <p class="card__executor">Исполнитель: <?= $product->executor_name ?></p>
                            <p class="card__genre">Жанр: <?= $product->category_name ?></p>
                            <p class="card__price">Цена: <span class="card__span"> <?= number_format($product->price, 0, '', ' ')  ?></span>&#8381;</p>
                        </div>
                        <div class="card__icons">
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
                <?php endforeach ?>
                </div>
    </div>

    <div class="line line__popular">
        <div class="line__text">Популярное Популярное Популярное Популярное Популярное Популярное Популярное
            Популярное Популярное</div>
    </div>
    <section>
        <div class="conteiner">
            <?php foreach ($onePopularProduct as $product) : ?>
                <?php if (isset($productsInOrder) && in_array($product->product_id, $productsInOrder)) : ?>
                    <div class="popular disabled">
                    <?php else : ?>
                        <div class="popular">
                        <?php endif ?>
                        <div class="popular__text">
                            <h1 class="popular__title"><?= $product->product_name ?></h1>
                            <p class="popular__desc"><?= $product->executor_name ?></p>
                            <a class="btn popular__btn goOverByProduct" href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">Перейти</a>
                        </div>
                        <div class="popular__image">
                            <img class="popular__img" src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>">
                        </div>
                        </div>
                    <?php endforeach ?>
                    </div>
    </section>

    <div class="conteiner">
        <div class="card card__popular">
            <?php foreach ($popularProducts as $product) : ?>
                <?php if (isset($productsInOrder) && in_array($product->id, $productsInOrder)) : ?>
                    <div class="card__item card__item__right disabled">
                    <?php else : ?>
                        <div class="card__item card__item__right">
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
                    <?php endforeach ?>
                    </div>
        </div>
        <div class="block">
            <div class="slider">
                <?php foreach ($reviews as $review) : ?>
                    <div class="slider__div">
                        <div class="slider__p">
                            <p><?= $review->text ?></p>
                            <p>- <?= $review->login ?></p>
                        </div>
                    </div>
                <?php endforeach ?>

                <a class="prev" onclick="minusSlide()">❮</a>
                <a class="next" onclick="plusSlide()">❯</a>
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