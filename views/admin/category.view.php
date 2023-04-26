<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <div class="info__table">
        <div class="table__header_category">
            <h4>id</h4>
            <h4>название</h4>
            <h4>действия</h4>
        </div>
        <div class="body__category">
        <?php foreach ($categories as $category) : ?>
            <div class="table__body_category">
                <p><?= $category->id ?></p>
                <p><?= $category->name ?></p>
                <div class="doing">
                    <img class="remove" data-id="<?= $category->id?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    <a class="detailed" href="/app/admin/productsByCategory.php?id=<?= $category->id?>">подробнее</a>
                </div>
            </div>
        <?php endforeach ?></div>
        <button class="add">Добавить новую категорию</button>
    </div>
</div>
</main>
</body>
<div class="modal-wrapper">
    <div class="modal">
            <p class="closed">X</p>
            <h2 class="modal__title">Добавить жанр</h2>
            <input class="input__category" name="category" type="text">
            <button class="insertCategories">Добавить</button>
    </div>
</div>
</html>