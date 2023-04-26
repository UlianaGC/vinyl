<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>


<div class="main__info">
    <form action="">
        <select onchange="this.form.submit()" id="genre" name="country">
            <option <?= isset($_GET['country']) && $_GET['country'] == 'Все' ? 'selected' : '' ?> value="Все">Все</option>
            <?php foreach ($countries as $country) : ?>
                <option <?= isset($_GET['country']) && $_GET['country'] == $country->id ? 'selected' : '' ?> id="<?= $country->id ?>" value="<?= $country->id ?>"><?= $country->name ?></option>
            <?php endforeach ?>
        </select>
    </form>

    <form action="">
        <select id="executor" onchange="this.form.submit()" name="area">
            <option value="Все" <?= isset($_GET['area']) && $_GET['area'] == 'Все' ? 'selected' : '' ?>>Все</option>
            <?php foreach ($areas as $area) : ?>
                <option value="<?= $area->id ?>" <?= isset($_GET['area']) && $_GET['area'] == $area->id ? 'selected' : '' ?>><?= $area->name ?></option>
            <?php endforeach ?>
        </select>
    </form>
    <div class="info__table info__city">
        <button class="add add_city">Добавить новый город</button>
        <div class="table__header_cities">
            <h4>id</h4>
            <h4>регион</h4>
            <h4>название</h4>
            <h4>цена</h4>
            <h4>действия</h4>
        </div>
        <div class="body_city">
            <?php foreach ($cities as $city) : ?>
                <div class="table__body_cities">
                    <p><?= $city->id ?></p>
                    <p><?= $city->area_name ?></p>
                    <p class="name-<?= $city->id?>"><?= $city->name ?></p>
                    <p class="price-<?= $city->id?>"><?= $city->price ?></p>
                    <div class="doing">
                        <img class="removeCity" data-id="<?= $city->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                        <img class="update" data-id="<?= $city->id ?>" src="/accets/img/free-icon-edit-1160119.png" alt="icon">
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
            <h2 class="modal__title">Добавить город</h2>
            <input name="city" id="city" type="text">
            <input type="number" name="price" id="price">
            <select name="area" id="area">
                <?php foreach ($areas as $area) : ?>
                    <option value="<?= $area->id ?>"><?= $area->name ?></option>
                <?php endforeach ?>
            </select>
            <button class="insertCities">Добавить</button>
    </div>
</div>

</html>