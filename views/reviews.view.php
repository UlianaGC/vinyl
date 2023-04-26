<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<div class="conteiner">
    <h1>Отзывы</h1>
    <div class="reviews">
        <div class="reviews__block">
            <?php foreach ($reviews as $review) : ?>
                <div class="reviews__item">
                    <div class="reviews__avatar">
                        <p class="reviews__desc"><?= $review->firstLetter ?></p>
                    </div>
                    <div class="reviews__body">
                        <div class="reviews__login"><?= $review->login ?></div>
                        <div class="reviews__text"><?= $review->text ?></div>
                        <div class="reviews__date"><?= $review->date_making ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="reviews__new">
            <?php if (!isset($_SESSION["auth"])|| !$_SESSION["auth"]) : ?>
                <h3>Вы можете оставить свой отзыв после авторизации</h3>
                <?php else : ?>
                    <h3>Вы можете оставить свой отзыв</h3>
                <textarea name="text" id="text" cols="30" rows="10" placeholder="введите свой отзыв"></textarea>
                <div class="rewiews__div_btn">
                    <button class="reviews__btn" data-login="<?= $user->login ?>" data-first="<?= $user->firstLetter ?>" data-user="<?= $_SESSION['id'] ?? '' ?>">Отправить отзыв</button>
                </div>
        
            <?php endif ?>
        </div>
    </div>
</div>
<section class="section__footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>
    </body>

    </html>