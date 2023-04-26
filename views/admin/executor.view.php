<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>


<div class="main__info">
    <button class="add executor">Добавить нового исполнителя</button>
    <div class="info__table">
        <div class="table__header_category">
            <h4>id</h4>
            <h4>название</h4>
            <h4>действия</h4>
        </div>
        <div class="body_executor">
        <?php foreach ($executors as $executor) : ?>
            <div class="table__body_category">
                <p><?= $executor->id ?></p>
                <p><?= $executor->name ?></p>
                <div class="doing">
                    <img class="remove" data-id="<?= $executor->id?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    <a class="detailed" href="/app/admin/productsByExecutor.php?id=<?= $executor->id?>">подробнее</a>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
</div>
</main>
</body>
<div class="modal-wrapper">
    <div class="modal">
            <p class="closed">X</p>
            <h2 class="modal__title">Добавить исполнителя</h2>
            <input name="executor" id="executor" type="text">
            <button class="insertExecutors">Добавить</button>
    </div>
</div>
</html>