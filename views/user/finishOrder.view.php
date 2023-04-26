<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="conteiner">
    <h1>Оформление заказа</h1>
    
    <div class="info_person">
        <p><?= $user->login ?> <span> <?= $user->email ?></span></p>
        <p class="info_person__address"><?= $country->name ?>, <?= $area->name ?>, <?= $city->name ?>, улица <?= $_SESSION['address']['street'] ?> <?= $_SESSION['address']['house'] ?>/<?= $_SESSION['address']['flat'] ?></p>
    </div>
    <h2 class="composition_order">Состав заказа</h2>
    <div class="finish_order">
        <div class="finish_order__finish_order">
            <?php foreach ($products as $product) : ?>
                <div class="finish_order__flex">
                    <div class="finish_order__image">
                        <img src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>" class="finish_order__img">
                    </div>
                    <div class="finish_order__info">
                        <div class="finish_order__info_plastinka">
                            <h3><?= $product->product_name ?></h3>
                            <p>Исполнитель: <?= $product->executor_name ?></p>
                            <p>Жанр: <?= $product->category_name ?></p>
                            <p class="basket__price_position"><?= number_format($product->price, 0, '', ' ')  ?> <span> &#8381;</span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="finish_order_sum">
            <h2 class="finish_order__sum_title">Сумма заказа</h2>
            <p>Товара(<?= $count->count ?>)</p>
            <p>Доставка: <span><?= $priceDelivery->price?></span> &#8381;</p>
            <h2>К оплате: <span><?=number_format(($sum->sum+$priceDelivery->price), 0, '', ' ')  ?></span> &#8381;</h2>
            <form action="/app/tables/users/addOrder.php">
                <button class="finish_order__btn">Оформить заказ</button>
            </form>
        </div>
    </div>
</div>
<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
</section>
</body>

</html>