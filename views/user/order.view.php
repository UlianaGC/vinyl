<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="conteiner">
    <h1>Заказы</h1>
    <?php foreach ($orders as $order) : ?>
        <div class="conteiner__block">
            <h3>Заказ №<?= $order->id ?> от <?= $order->date_making ?></h3>
            <div class="order">
                <div class="block__order">
                    <?php if ($order->status_id == 4) : ?>
                        <h4>Ваш заказ был отменен по причине: <?= $order->reason_cancel ?></h3>
                        <button data-id="<?= $order->id?>" class="order__btn read_reason_cancel">Прочитано</button>
                    <?php else : ?>
                        <?php foreach ($productsByOrder as $product) : ?>

                            <?php if ($order->id == $product->order_id) : ?>

                                <div class="order__info">
                                    <div class="order__image">
                                        <img src="/upload/<?= $product->photo ?>" alt="пластинка" class="order__img">
                                    </div>
                                    <div class="order__info_plastinka">
                                        <div class="order__more_detailed">
                                            <p class="order__name"><?= $product->product_name ?></p>
                                            <p>Исполнитель: <?= $product->executor_name ?></p>
                                            <p>Жанр: <?= $product->category_name ?></p>
                                        </div>
                                        <div class="order__price">
                                            <p class="order__price_p"><span class="order__price_span"><?= number_format($product->price, 0, '', ' ')  ?></span> &#8381;</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <?php if ($order->status_id == 4) : ?>
                <?php else : ?>
                    <div class="order__buttons">
                        <!-- <div class="order__trek">
                            <div class="order__trek_font">Трек номер</div>
                            <div class="order__trek_back">ghjk3459rwr3sdt
                                <img class="order__copy" src="/accets/img/copy.png" alt="иконка">
                            </div>
                        </div> -->
                        <div class="order__finish"> <button data-id="<?= $order->id ?>" class="order__btn order__btn_black">Подтвердить</button>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>

</div>

<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
</section>
</body>

</html>