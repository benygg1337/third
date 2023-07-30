<?php
/*
Template Name: old
*/?>

<?php get_header(); ?>

<body>
    <div class="in2-wrapper">
        <main class="in2-page">
            <section class="in2-page-bg">
                <div class="in2-page-bg__image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="in2-page-bg__name _anim-items _anim-no-hide"><?php echo do_shortcode('[my_custom_block_7 id="85"]'); ?></div>
                <div class="in2-page-bg__date _anim-items _anim-no-hide"><?php echo do_shortcode('[my_custom_block_8 id="93"]'); ?></div>
            </section>
            <div class='page__container _in2-container'>
                <!-- О нас -->
                <section class="in2-about-us">
                    <div class="in2-about-us__title in2-title _anim-items _anim-no-hide">О нас</div>
                    <div class="in2-about-us__text _anim-items _anim-no-hide">
                        <?php echo do_shortcode('[my_custom_block_6 id="78"]'); ?>
                    </div>
                </section>

                <!-- Место торжества -->
                <section class="in2-place">
                    <span class="in2-decor"></span>
                    <div class="in2-place__title in2-title _anim-items _anim-no-hide">Место торжества</div>
                    <div class="in2-place__row">
                        <div class="in2-place__column">
                            <div class="in2-place__item">
                                <div class="in2-place__place _anim-items _anim-no-hide">Роспись</div>
                                <div class="in2-place__name _anim-items _anim-no-hide">
                                    <?php echo do_shortcode('[my_custom_block id="39"]'); ?>
                                </div>
                                <div class="in2-place__address _anim-items _anim-no-hide">
                                <?php
                                    $address_block = do_shortcode('[my_custom_block_2 id="48"]');
                                    $address = wp_strip_all_tags($address_block); // Удаление HTML-разметки из адреса
                                    echo $address;
                                    ?>
                                </div>
                                <?php
                                $map_query = urlencode($address);
                                $map_link = "https://yandex.ru/maps/?text={$map_query}";
                                ?>
                                <a href="<?php echo htmlspecialchars($map_link); ?>" target="_blank"
                                    class="in2-place__btn in2-btn _anim-items _anim-no-hide">Посмотреть
                                    на карте</a>
                            </div>
                        </div>
                        <div class="in2-place__column">
                            <div class="in2-place__item">
                                <div class="in2-place__place _anim-items _anim-no-hide">Праздничный ужин</div>
                                <div class="in2-place__name _anim-items _anim-no-hide">
                                    <?php echo do_shortcode('[my_custom_block_3 id="51"]'); ?>
                                </div>
                                <div class="in2-place__address _anim-items _anim-no-hide">
                                    <?php
                                    $address_block = do_shortcode('[my_custom_block_4 id="53"]');
                                    $address = wp_strip_all_tags($address_block); // Удаление HTML-разметки из адреса
                                    echo $address;
                                    ?>
                                </div>
                                <?php
                                $map_query = urlencode($address);
                                $map_link = "https://yandex.ru/maps/?text={$map_query}";
                                ?>
                                <a href="<?php echo htmlspecialchars($map_link); ?>" target="_blank"
                                    class="in2-place__btn in2-btn _anim-items _anim-no-hide">Посмотреть
                                    на карте</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Опрос -->
                <section class="in2-survey">
                    <div class='survey__container _in2-container'>
                        <div class="in2-survey__title in2-title _anim-items _anim-no-hide">Опрос</div>
                        <form class="in2-survey__form" action="/wp-content/themes/pink/polll.php" enctype="multipart/form-data" method="POST" id="form">
    <div class="in2-survey__subtitle">Ваше имя и фамилия</div>
    <div class="in2-survey__item">
        <input type="text" name="fio" data-value="Ф.И.О" class="in2-input _req">
    </div>
    <div class="in2-survey__row _anim-items _anim-no-hide">
        <div class="in2-survey__block">
            <div class="in2-survey__item">
                <input id="radio-yes" checked type="radio" name="visit" value="Присутствие подтверждаю" class="in2-input-radio">
                <label for="radio-yes" class="in2-radio__label">Присутствие подтверждаю</label>

                <input id="radio-no" type="radio" name="visit" value="К сожалению, не смогу быть" class="in2-input-radio">
                <label for="radio-no" class="in2-radio__label">К сожалению, не смогу быть</label>
            </div>
        </div>
        <div class="in2-survey__block">
            <div class="in2-survey__item">
                <input id="redio-red-wine" type="radio" name="drink" value="Вино красное" class="in2-input-radio">
                <label for="redio-red-wine" class="in2-radio__label">Вино красное</label>

                <input id="radio-white-wine" type="radio" name="drink" value="Вино белое" class="in2-input-radio">
                <label for="radio-white-wine" class="in2-radio__label">Вино белое</label>

                <input id="radio-whiskey" type="radio" name="drink" value="Виски" class="in2-input-radio">
                <label for="radio-whiskey" class="in2-radio__label">Виски</label>

                <input id="radio-no-alco" type="radio" name="drink" value="Безалкогольное" class="in2-input-radio">
                <label for="radio-no-alco" class="in2-radio__label">Безалкогольное</label>
            </div>
        </div>
        <div class="in2-survey__block">
            <div class="in2-survey__item">
                <input id="radio-beef" type="radio" name="dish" value="Говядина" class="in2-input-radio">
                <label for="radio-beef" class="in2-radio__label">Говядина</label>

                <input id="radio-lamb" type="radio" name="dish" value="Ягненок" class="in2-input-radio">
                <label for="radio-lamb" class="in2-radio__label">Ягненок</label>

                <input id="radio-turkey" type="radio" name="dish" value="Индейка" class="in2-input-radio">
                <label for="radio-turkey" class="in2-radio__label _req">Индейка</label>
            </div>
        </div>
    </div>
    <button type="submit" class="in2-form__btn in2-btn _anim-items _anim-no-hide"><span>Отправить</span></button>
</form>
                    </div>
                </section>
                <!-- Пожелания -->
                <section class="in2-wishes">
                    <div class="in2-wishes__title in2-title _anim-items _anim-no-hide">Пожелания</div>
                    <div class="in2-wishes__row">
                        <div class="in2-wishes__column">
                            <div class="in2-wishes__text _anim-items _anim-no-hide">
                                <p>
                                    <?php echo do_shortcode('[my_custom_block_5 id="70"]'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="in2-wishes__column">
                            <div class="in2-wishes__block">
                                <div class="in2-wishes__colour">
                                </div>
                                <div class="in2-wishes__colour">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Контакты -->
                <section class="in2-contacts">
                    <div class="in2-contacts__title in2-title _anim-items _anim-no-hide">Контакты</div>
                    <div class="in2-contacts__row">
                        <a href="tel:795686678728"
                            class="in2-contacts__items  _anim-items _anim-no-hide">Алексей:<span>+ 7
                                956 866 78
                                78</span></a>
                        <a href="tel:795686665221" class="in2-contacts__items  _anim-items _anim-no-hide">Елена:<span>+7 956 866 652 21</span></a>
                    </div>
                    <a href="tel:79568667878" class="in2-contacts__item  _anim-items _anim-no-hide">Наш свадебный организатор Алёна:<span>+ 7 956 866 78 78</span></a>
                    <div class="in2-contacts__icons _anim-items _anim-no-hide">
                        <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/img/invitation_no_2/whatsapp.png"
                                alt=""></a>
                        <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/img/invitation_no_2/vk.png"
                                alt=""></a>
                        <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/img/invitation_no_2/telegram.png"
                                alt=""></a>
                    </div>
                </section>
            </div>

        </main>
    </div>

</body>

<?php
get_footer(); ?>

</html>