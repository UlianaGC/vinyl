<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>


<div class="main__info">
    <div class="info__table">

        <div class="table__header_countries">
            <h4>id</h4>
            <h4>название</h4>
            <h4>действия</h4>
        </div>
        <div class="body_country">
            <?php foreach ($countries as $country) : ?>
                <div class="table__body_countries">
                    <p><?= $country->id ?></p>
                    <p><?= $country->name ?></p>
                    <div class="doing">
                        <img class="remove" data-id="<?= $country->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <button class="add">Добавить новую страну</button>
    </div>
</div>
</main>
</body>
<div class="modal-wrapper">
    <div class="modal">
        <p class="closed">X</p>
        <h2 class="modal__title">Добавить страну</h2>
        <input name="country" id="country" type="text">
        <button class="insertCountries">Добавить</button>
    </div>
</div>

</html>