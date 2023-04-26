<footer class="footer">
            <div class="cont">
                <div class="footer__top">
                    <div class="footer__contacts">
                        <h4 class="footer_phone">Phone</h4>
                        <a href="tel:+73410">+7-34-10</a>
                    </div>
                </div>
                <div class="footer__middle">
                    <div class="footer__column">
                        <div class="footer__title">Страницы сайта</div>
                        <ul class="footer__list">
                            <li class="footer__item"><a href="/">Главная</a></li>
                            <li class="footer__item"><a href="/app/tables/catalog.php">Каталог</a></li>

                            <?php if(isset($_SESSION['auth'])):?>
                            <li class="footer__item"><a href="/app/tables/users/basket.php">Корзина</a></li>
                            <li class="footer__item"><a href="/app/tables/users/favourite.php">Избранное</a></li>
                            <?php endif?>
                            
                            <li class="footer__item"><a href="/app/tables/reviews.php">Отзывы</a></li>
                            <li class="footer__item"><a href="/app/tables/users/entrance.php">Вход\Регистрация</a></li>
                        </ul>
                    </div>
                    <div class="footer__column">
                        <div class="footer__title">Мы в соц. сетях</div>
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#">Vkontakte</a></li>
                            <li class="footer__item"><a href="#">Telegram</a></li>
                            <li class="footer__item"><a href="#">Pinterest</a></li>
                        </ul>
                    </div>
                    <div class="footer__column">
                        <div class="footer__title">Доставка и политика</div>
                        <ul class="footer__list">
                            <li class="footer__item"><a href="/app/tables/info.php">Доставка</a></li>
                            <li class="footer__item"><a href="#">Политика</a></li>
                        </ul>
                    </div>
                    <div class="footer__column">
                        <div class="footer__title">E-mail</div>
                        <p class="footer__desc">Не стесняйся, обращайся к нам по электронной почте</p>
                        <a href="mailto:vinyl@inbox.ru" class="footer__mail">vinyl@inbox.ru</a>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="footer__logo"></div>
                    <div class="footer__copy">&#169;2022@vinyl All Rights Reserved</div>
                </div>
            </div>
        </footer>