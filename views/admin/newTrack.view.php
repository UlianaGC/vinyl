<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script defer src="/accets/js/fetch.js"></script>
    <script defer src="/accets/js/deleteTrack.js"></script>
    <link rel="stylesheet" href="/accets/css/adminProduct.css">
</head>

<body>
    <div class="update__form">
        <h1>Треклист <?= $idLastProduct->name ?>:</h1>
        <?php foreach ($tracks as $track) : ?>
            <div class="doing_treck" data-block="<?= $track->id ?>">
                <p class="track__p" data-track="<?= $track->id ?>"><?= $track->name ?></p>
                <img class="remove" data-btn="<?= $track->id ?>" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                <img class="update" data-id="<?= $track->id ?>" src="/accets/img/free-icon-edit-1160119.png" alt="icon">
            </div>
        <?php endforeach ?>
        <div class="newTrack">
                    <input class="name" type="text">
                    <img class="insert" data-insert="<?= $idLastProduct->id?>" src="/accets/img/4.png" alt="icon">
                </div>
        <button><a class="finishInsertProduct" href="/app/admin/product.php">Завершить создание</a></button>
    </div>
</body>

</html>