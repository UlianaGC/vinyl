<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <form action="" class="info__radio">
        <div class="radio__block"> <input type="radio" id="all" name="countryRadio" value="Все" <?= isset($_GET['countryRadio']) && $_GET['countryRadio'] == 'Все' ? 'checked' : '' ?> onchange="this.form.submit()">
            <label for="all">Все</label>
        </div>
        <?php foreach ($countries as $country) : ?>
            <div class="radio__block"><input type="radio" id="<?= $country->id ?>" name="countryRadio" value="<?= $country->id ?>" <?= isset($_GET['countryRadio']) && $_GET['countryRadio'] == $country->id ? 'checked' : '' ?> onchange="this.form.submit()">
                <label for="<?= $country->id ?>"><?= $country->name ?></label>
            </div>
        <?php endforeach ?>
    </form>
    <div class="info__table">
        <div class="table__header_areas">
            <h4>id</h4>
            <h4>страна</h4>
            <h4>название</h4>
            <h4>действия</h4>
        </div>
        <div class="body_area">
            <?php foreach ($areas as $area) : ?>
                <div class="table__body_areas">
                    <p><?= $area->id ?></p>
                    <p><?= $area->country_name ?></p>
                    <p><?= $area->name ?></p>
                    <div class="doing">
                        <img class="removeArea" data-id="<?= $area->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <button class="add">Добавить новый регион</button>
    </div>
</div>
</main>
</body>
<div class="modal-wrapper">
    <div class="modal">
        <div class="modal__area">
            <p class="closed">X</p>
            <h2 class="modal__title">Добавить регион</h2>
            <input name="area" id="area" type="text">
            <select name="country" id="country" id="country">
                <?php foreach ($countries as $country) : ?>
                    <option value="<?= $country->id ?>"><?= $country->name ?></option>
                <?php endforeach ?>
            </select>
            <button class="insertAreas">Добавить</button>
        </div>
    </div>
</div>

</html>