<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="conteiner">
    <h1>Корзина</h1>

    <?php $_SESSION['basket'] = $products;
    if (empty($_SESSION['basket'])) {
        $_SESSION['empty']['title'] = 'Добавьте пластинки своей мечты';
        $_SESSION['empty']['desc'] = 'Так вы их точно не потеряете';
        $sum = 0;
        $count = 0;
    } ?>

    <div class="basket">
        <div class="basket__basket">

            <?php foreach ($products as $product) : ?>

                <?php if (isset($productsInOrder) && in_array($product->product_id, $productsInOrder)) : ?>
                    <div class="basket__flex disabled" data-id="<?= $product->product_id ?>">
                        <h4 class="disabled__desc">Товар больше не доступен</h4>
                    <?php else : ?>
                        <div class="basket__flex" data-id="<?= $product->product_id ?>">
                        <?php endif ?>

                        <div class="basket__image">
                            <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                                <img src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>" class="basket__img">
                            </a>
                        </div>
                        <div class="basket__info">
                            <div class="basket__info_plastinka">
                                <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                                    <h3 class="info__name"><?= $product->product_name ?></h3>
                                </a>
                                <p>Исполнитель: <?= $product->executor_name ?></p>
                                <p>Жанр: <?= $product->category_name ?></p>
                                <p class="basket__price_position"><?= number_format($product->price, 0, '', ' ')  ?> <span> &#8381;</span></p>
                            </div>
                            <div class="basket__icons">
                                <?php if (isset($productsInOrder) && in_array($product->product_id, $productsInOrder)) : ?><?php else : ?>
                                <img src="/accets/img/recycling.png" alt="icon" id="<?= $product->product_id ?>" class="basket__icon delete">
                                <?php if (isset($favourite) && in_array($product->product_id, $favourite)) : ?>
                                    <img class="card__icon basket__icon" data-favourite="favourite" data-id="<?= $product->product_id ?>" src="/accets/img/favLove.png" alt="icon">
                                <?php else : ?>
                                    <img class="card__icon basket__icon" data-favourite="addFav" data-id="<?= $product->product_id ?>" src="/accets/img/favourites.png" alt="icon">
                                <?php endif ?>
                            <?php endif ?>
                            </div>
                        </div>

                        </div>
                        <?php if (isset($productsInOrder) && in_array($product->product_id, $productsInOrder)) : ?>
                            <div class="disabled_delete">
                                <button id="<?= $product->product_id ?>" class="btn_delete">Удалить</button>
                            </div>

                        <?php endif ?>
                    <?php endforeach ?>
                    <h2 class="empty"><?= $_SESSION['empty']['title'] ?? '' ?></h2>
                    <p class="empty_desc"> <?= $_SESSION['empty']['desc'] ?? '' ?></p>
                    <button name="clear" class="clear <?= empty($_SESSION['basket']) ? 'none' : '' ?>">Очистить корзину</button>
                    </div>
                    <div class="basket_sum <?= empty($_SESSION['basket']) ? 'none' : '' ?>">
                        <h2 class="basket__sum_title">Сумма заказа</h2>
                        <p>Товаров(<span class="count"><?= $count ?></span>)</p>
                        <div class="basket__address">
                            <p>Адрес доставки</p>
                            <img src="/accets/img/pen.png" alt="icon" class="basket__icon_address">
                        </div>
                        <?php if (isset($_SESSION['address']['error'])) : ?>
                            <p class="address__error"><?= $_SESSION['address']['error'] ?></p>
                        <?php endif ?>
                        <form action="">
                            <select name="delivery" onchange="this.form.submit()" id="delivery">
                                <option value="" hidden>Способ доставки</option>
                                <?php foreach ($deliveries as $delivery) : ?>
                                    <option <?= isset($_SESSION['delivery']) && $_SESSION['delivery'] == $delivery->id ? 'selected' : '' ?> value="<?= $delivery->id ?>"><?= $delivery->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($_SESSION['delivery']['error'])) : ?>
                                <p class="delivery_error"><?= $_SESSION['delivery']['error'] ?></p>
                            <?php endif ?>
                        </form>
                        <h2>К оплате: <span class="sum"><?= $sum ?></span> &#8381;</h2>
                        <form action="/app/tables/users/finishOrder.php">
                            <button name="finishOrder" class="basket__btn">Оформить заказ</button>
                        </form>
                    </div>
        </div>
    </div>

    <section class="section__footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
    </section>

    <div class="modal-window-address">
        <div class="modal">
            <p class="modal__close">x</p>
            <h1 class="modal__title">Адрес</h1>
            <div class="address">
                <h2>Пункт получения</h2>
                <form action="" id="form-address" method="POST">
                    <div>
                        <select name="country_id" id="country" class="country">
                            <option value="" hidden>Страна*</option>
                            <?php foreach ($countries as $country) : ?>
                                <option value="<?= $country->id ?>"><?= $country->name ?></option>
                            <?php endforeach ?>
                        </select>
                        <p class="address__hidden country_hidden" hidden>Выберете страну</p>
                    </div>
                    <div>
                        <div class="address__div">
                            <div class="address__block">
                                <select name="area_id" id="area" class="area">
                                    <option value="" hidden>Регион*</option>
                                    <?php foreach ($areas as $area) : ?>
                                        <option value="<?= $area->id ?>"><?= $area->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="address__hidden" hidden>Выберете область</p>
                            </div>
                            <div class="address__block">
                                <select name="city_id" id="city" class="city">
                                    <option value="" hidden>Город*</option>
                                    <?php foreach ($cities as $city) : ?>
                                        <option value="<?= $city->id ?>"><?= $city->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="address__hidden" hidden>Выберете город</p>
                            </div>
                            <div class="address__block">
                                <input class="address__street" name="street" type="text" placeholder="улица*">
                                <p class="address__hidden" hidden>Укажите улицу</p>
                            </div>
                            <div class="address__block">
                                <input class="address__house" name="house" type="text" placeholder="дом*">
                                <p class="address__hidden" hidden>Укажите дом</p>
                            </div>
                            <input class="address__flat" name="flat" type="text" placeholder="кв">

                        </div>
                        <div class="address__button">
                            <button name="address" class="modal__btn modal__btn_black">Подтвердить</button>
                        </div>
                </form>
            </div>
            <button class="modal__btn deny">Отмена</button>
        </div>
    </div>
    </body>
    <?php unset($_SESSION['empty']);
    unset($_SESSION['address']['error']);
    ?>

    </html>