<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/headerAdmin.php'; ?>

    
    <div class="main__info">
        <form action="" class="info__radio">
            <div class="radio__block"> <input type="radio" id="all" name="user" value="Все" <?= isset($_GET['user']) && $_GET['user'] == 'Все' ? 'checked' : '' ?> onchange="this.form.submit()">
                <label for="all">Все</label>
            </div>
            <?php foreach ($roles as $role) : ?>
                <div class="radio__block"><input type="radio" id="<?= $role->id ?>" name="user" value="<?= $role->id ?>" <?= isset($_GET['user']) && $_GET['user'] == $role->id ? 'checked' : '' ?> onchange="this.form.submit()">
                    <label for="<?= $role->id ?>"><?= $role->name ?></label>
                </div>
            <?php endforeach ?>
        </form>
        <div class="info__table">
            <div class="table__header">
                <h4>id</h4>
                <h4>почта</h4>
                <h4>логин</h4>
                <h4>роль</h4>
            </div>
            <?php foreach ($users as $user) : ?>
                <div class="table__body">
                    <p><?= $user->id ?></p>
                    <p><?= $user->email ?></p>
                    <p><?= $user->login ?></p>
                    <p><?= $user->role_name ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</main>
</body>

</html>