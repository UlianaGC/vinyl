<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

<div class="main__info">
    <h2>Товары по исполнителю - <?= $executor->name?></h2>
    <div class="info__table">
        <div class="table__headerProductsByCategory">
            <h4>id</h4>
            <h4>название</h4>
            <h4>год релиза</h4>
            <h4>треклист</h4>
            <h4>изображение</h4>
            <h4>цена</h4>
            <h4>жанр</h4>
        </div>
        <?php foreach ($products as $product) : ?>
            <div class="table__productsByCategory">
                <p><?= $product->id ?></p>
                <a class="noWhite" href="/app/admin/product.php?executor=<?= $product->executor_id?>"><p class="link"><?= $product->product_name ?></p></a>
                <p><?= $product->year_release ?></p>
                <div>
                    <?php foreach ($tracks as $track) : ?>
                        <?php if($track->product_id==$product->id):?>
                        <p><?= $track->name ?></p>
                        <?php endif?>
                    <?php endforeach ?>
                   
                </div>
                <p><?= $product->photo ?></p>
                <p><?= $product->price ?></p>
                <a class="noWhite" href="/app/admin/product.php?category=<?= $product->category_id?>"><p class="link"><?= $product->category_name ?></p></a>
                
            </div>
        <?php endforeach ?>
    </div>
</div>
</main>
</body>
</html>