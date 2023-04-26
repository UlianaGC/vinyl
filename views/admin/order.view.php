<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <form action="" class="info__radio">
        <div class="radio__block"> <input type="radio" id="all" name="status" value="Все" <?= isset($_GET['status']) && $_GET['status'] == 'Все' ? 'checked' : '' ?> onchange="this.form.submit()">
            <label for="all">Все</label>
        </div>
        <?php foreach ($statuses as $status) : ?>
            <div class="radio__block"><input type="radio" id="<?= $status->id ?>" name="status" value="<?= $status->id ?>" <?= isset($_GET['status']) && $_GET['status'] == $status->id ? 'checked' : '' ?> onchange="this.form.submit()">
                <label for="<?= $status->id ?>"><?= $status->name ?></label>
            </div>
        <?php endforeach ?>
    </form>
    <div class="info__table">
        <div class="table__header_order">
            <h4>id</h4>
            <h4>дата создания</h4>
            <h4>дата завершения</h4>
            <h4>пользователь</h4>
            <h4>адрес</h4>
            <h4>доставка</h4>
            <h4>статус</h4>
            <h4>причина отказа</h4>
            <h4>действия</h4>

        </div>
        <?php foreach ($orders as $order) : ?>
            <div class="table__body_order">
                <p><?= $order->id ?></p>
                <p><?= $order->date_making ?></p>
                <p><?= $order->date_arrival ?></p>
                <p><?= $order->user_name ?></p>
                <p><?= $order->country_name ?>, <?= $order->area_name ?>, <?= $order->city_name ?> г, <?= $order->street ?>, <?= $order->house ?> д, <?= $order->flat ?>кв</p>
                <p><?= $order->delivery_name ?></p>
                <p data-name="<?= $order->id?>" data-id="<?= $order->id ?>"><?= $order->status_name ?></p>
                
                <textarea disabled class='reason_cancel' name='reason_cancel' data-textarea='<?= $order->id ?>'><?= $order->reason_cancel?></textarea>
                <div class="doing_order">
                    <a class="detailed" data-det="<?= $order->id ?>" href="/app/admin/productByOrder.php?id=<?= $order->id ?>">подробнее</a>
                    <?php if ($order->status_id == 1) : ?>
                        <button class="can" data-can="<?= $order->id ?>" name="can">Отменить</button>
                        <button class="confirm" data-confirm="<?= $order->id ?>" name="confirm">Принять</button>
                    <?php elseif ($order->status_id == 2) : ?>
                        <button class="end" data-end="<?= $order->id ?>" name="end">Завершить</button>
                    <?php else : ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="modal-wrapper" data-modal="<?= $order->id?>">
                <div class="modal">
                    <div class="modal__area">
                        <p class="closed" data-close="<?= $order->id?>">X</p>
                        <h2 class="modal__title">Укажите причину отказа</h2>
                        <textarea name="reason_cancel" data-text="<?= $order->id ?>" cols="30" rows="10"></textarea>
                        <button class="cancel" data-status="<?= $order->status_id?>" data-btn="<?= $order->id ?>">ОК</button>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>
</main>
</body>

</html>