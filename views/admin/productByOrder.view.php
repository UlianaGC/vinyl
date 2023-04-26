<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <h1 class="info__title">Заказ №<?= $infoByOrder->order_id ?> от <?= $infoByOrder->date_making ?>, пользователь - <?= $infoByOrder->login ?></h1>
    <div class="info__table">
        <div class="table__header_order_detailed">
            <h4>id</h4>
            <h4>название</h4>
            <h4>исполнитель</h4>
            <h4>жанр</h4>
            <h4>цена</h4>
        </div>
        <?php foreach ($products as $product) : ?>
            <div class="table__body_order_detailed">
                <p><?= $product->id ?></p>
                <p><?= $product->product_name ?></p>
                <p><?= $product->executor_name ?></p>
                <p><?= $product->category_name ?></p>
                <p><?= $product->price ?></p>
            </div>
    <?php endforeach ?></div>
            
    <h3>Итого: <?= $count->count ?>шт</h3>
    <h3>Итого: <?= $sum->sum ?>₽</h3>
</div>

</div>
</main>
</body>

</html>