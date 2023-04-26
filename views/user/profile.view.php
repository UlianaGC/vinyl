<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<div class="conteiner">
    <div class="profile">
        <div class="data">
            <div class="data__avatar">
                <p><?= $user->firstLetter ?></p>
            </div>
            <div class="data__info">
                <p class="data__name"><?= $user->login ?></p>
                <p class="data__mail"><?= $user->email ?></p>
            </div>
        </div>
    </div>

    <div class="conteiner">
        <div class="favourites">
            <h2 class="favourites__favourite">Избранное</h2>
            <div class="card">
                <?php foreach ($products as $product) : ?>
                    <?php if (isset($productsInOrder) && in_array($product->product_id, $productsInOrder)) : ?>
                        <div class="card__item disabled">
                        <?php else : ?>
                            <div class="card__item">
                            <?php endif ?>
                            <div class="card__cover">
                                <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                                    <img class="card__img" src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>">
                                </a>
                            </div>
                            <div class="card__text">
                                <div class="card__info">
                                    <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                                        <h2 class="card__title"><?= $product->product_name ?></h2>
                                    </a>
                                    <p class="card__executor">Исполнитель: <?= $product->executor_name ?></p>
                                    <p class="card__genre">Жанр: <?= $product->category_name ?></p>
                                    <p class="card__price">Цена: <span class="card__span"> <?= number_format($product->price, 0, '', ' ')  ?></span>&#8381;</p>
                                </div>
                                <div class="card__icons">
                                    <?php if (isset($basket) && in_array($product->product_id, $basket)) : ?>
                                        <img class="card__icon" data-basket="basket" data-id="<?= $product->product_id ?>" src="/accets/img/tickCheck.png" alt="icon">
                                    <?php else : ?>
                                        <img class="card__icon" data-basket="add" data-id="<?= $product->product_id ?>" src="/accets/img/basket.png" alt="icon">
                                    <?php endif ?>
                                    <img class="card__icon" src="/accets/img/favLove.png" alt="">
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

        </html>