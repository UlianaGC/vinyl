<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <div class="catalog__select">
        <form action="">
            <select onchange="this.form.submit()" id="genre" name="category">
                <option <?= isset($_GET['category']) && $_GET['category'] == 'Все' ? 'selected' : '' ?> value="Все">Все</option>
                <?php foreach ($categories as $category) : ?>
                    <option <?= isset($_GET['category']) && $_GET['category'] == $category->id ? 'selected' : '' ?> id="<?= $category->id ?>" value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach ?>
            </select>
        </form>

        <form action="">
            <select id="executor" onchange="this.form.submit()" name="executor">
                <option value="Все" <?= isset($_GET['executor']) && $_GET['executor'] == 'Все' ? 'selected' : '' ?>>Все</option>
                <?php foreach ($executors as $executor) : ?>
                    <option value="<?= $executor->id ?>" <?= isset($_GET['executor']) && $_GET['executor'] == $executor->id ? 'selected' : '' ?>><?= $executor->name ?></option>
                <?php endforeach ?>
            </select>
        </form>
    </div>
    <button class="add">Добавить товар</button>
    <div class="info__table">
        <div class="table__headerProductsByCategory">
            <h4>id</h4>
            <h4>название</h4>
            <h4>год релиза</h4>
            <h4>треклист</h4>
            <h4>изображение</h4>
            <h4>цена</h4>
            <h4>исполнитель</h4>
            <h4>жанр</h4>
            <h4>Действия</h4>
        </div>
        <?php foreach ($products as $product) : ?>
            <div class="table__productsByCategory">
                <p><?= $product->id ?></p>
                <p><?= $product->product_name ?></p>
                <p><?= $product->year_release ?></p>
                <div class="products_track">
                    <?php foreach ($tracks as $track) : ?>
                        <?php if ($product->id == $track->product_id) : ?>
                            <p><?= $track->name ?></p>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
                <p><?= $product->photo ?></p>
                <p><?= $product->price ?></p>
                <p><?= $product->executor_name ?></p>
                <p><?= $product->category_name ?></p>
                <div class="action">
                    <img class="remove" data-image="<?= $product->photo ?>" data-id="<?= $product->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    <a href="/app/admin/update.php?id=<?= $product->id ?>"><img class="update" data-id="<?= $product->id ?>" src="/accets/img/free-icon-edit-1160119.png" alt="icon"></a>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<div class="modal-wrapper">
    <div class="modal">
        <form action="/app/admin/create.php" method="POST" enctype="multipart/form-data">
            <p class="closed">X</p>
            <h2 class="modal__title">Добавить товар</h2>
            <div class="modal__block">
                <input name="name" type="text" placeholder="название">
                <input name="year_release" type="number" placeholder="год релиза">
                <input name="photo" type="file">
                <input name="price" type="number" placeholder="цена">

                <select class="category"  name="category" id="category">
                <option disabled selected hidden value="Все">Все</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>

                <select class="executorByCategory"  name="executor" id="executor">
                <option disabled selected hidden value="Все">Все</option>
                    <?php foreach ($executors as $executor) : ?>
                        <option value="<?= $executor->id ?>"><?= $executor->name ?></option>
                    <?php endforeach ?>
                </select>

            </div>
            <button name="insertProduct">Добавить</button>
        </form>
    </div>
</div>
</main>
</body>

</html>