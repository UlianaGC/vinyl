<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/accets/css/adminProduct.css">
    <script defer src="/accets/js/fetch.js"></script>
    <script defer src="/accets/js/deleteTrack.js"></script>
    <title></title>
</head>

<body>
    <div class="update">
        <div class="update__block">
            <form class="update__form update_info" action="/app/admin/save.php" method="POST" enctype="multipart/form-data">
                <h1 class="modal__title">Изменить товар</h1>
                <input type="number" name="id" value="<?= $product->id ?>" readonly>
                <input name="name" type="text" placeholder="название" value="<?= $product->name ?>">
                <input name="year_release" type="number" value="<?= $product->year_release ?>">

                <input name="photo" type="file">
                <input name="price" type="number" value="<?= $product->price ?>">
                <select name="category" id="category">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? 'selected' : ' ' ?>><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>
                <select name="executor" id="executor" value="<?= $product->executor_name ?>">
                    <?php foreach ($executors as $executor) : ?>
                        <option value="<?= $executor->id ?>" <?= $executor->id == $product->executor_id ? 'selected' : ' ' ?>><?= $executor->name ?></option>
                    <?php endforeach ?>
                </select>
                <button class="updateProduct" name="updateProduct">Изменить</button>
            </form>
            <div class="update__form">
                <h1>Треклист:</h1>
                <?php foreach ($tracks as $track) : ?>
                    <div class="doing_treck" data-block="<?= $track->id ?>">
                        <p class="track__p" data-track="<?= $track->id ?>"><?= $track->name ?></p>
                        <img class="remove" data-btn="<?= $track->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                        <img class="update" data-id="<?= $track->id ?>" src="/accets/img/free-icon-edit-1160119.png" alt="icon">
                    </div>

                <?php endforeach ?>
                <div class="newTrack">
                    <input class="name" type="text">
                    <img class="insert" data-insert="<?= $product->id?>" src="/accets/img/4.png" alt="icon">
                </div>
            </div>
        </div>
    </div>
</body>

</html>