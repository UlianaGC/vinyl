<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="conteiner">
    <h1>Избранное</h1>

    <?php $_SESSION['favourite'] = $products;
    if (empty($_SESSION['favourite'])) {
        $_SESSION['empty']['title'] = 'Добавьте пластинки своей мечты';
        $_SESSION['empty']['desc'] = 'Так вы их точно не потеряете';
    } ?>

    <div class="basket">
        <div class="basket__basket">
            <?php foreach ($products as $product) : ?>
                <div class="basket__flex" data-id="<?= $product->product_id ?>">
                    <div class="basket__image">
                        <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                            <img src="/upload/<?= $product->photo ?>" alt="<?= $product->product_name ?>" class="basket__img">
                        </a>
                    </div>
                    <div class="basket__info">
                        <div class="basket__info_plastinka">
                            <a href="/app/tables/product.php?id=<?= $product->product_id ?>&executor_name=<?= $product->executor_name ?>">
                                <h3 class="info__name"><?= $product->product_name ?></h3>
                            </a>
                            <p>Исполнитель: <?= $product->executor_name ?></p>
                            <p>Жанр: <?= $product->category_name ?></p>
                            <p><?= $product->price ?> <span> &#8381;</span></p>
                        </div>
                        <div class="basket__icons">
                            <img src="/accets/img/recycling.png" alt="icon" id="<?= $product->product_id ?>" class="basket__icon delete">
                             <?php if (isset($basket) && in_array($product->product_id, $basket)) : ?>
                            <img class="card__icon basket__icon" data-basket="basket" data-id="<?= $product->product_id ?>" src="/accets/img/tickCheck.png" alt="icon">
                        <?php else : ?>
                            <img class="card__icon basket__icon" data-basket="add" data-id="<?= $product->product_id ?>" src="/accets/img/basket.png" alt="icon">
                        <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <h2 class="empty"><?= $_SESSION['empty']['title'] ?? '' ?></h2>
            <p class="empty_desc"> <?= $_SESSION['empty']['desc'] ?? '' ?></p>
            <button name="clear" class="clear <?= empty($_SESSION['favourite']) ? 'none' : '' ?>">Очистить избранное</button>
        </div>
    </div>
</div>
<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
</section>

<?php unset($_SESSION['empty']); ?>

</html>