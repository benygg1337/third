<!DOCTYPE html>
<html <?php laguage_attributes(); ?>>
 <head>
	<title>Главная</title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">
        <header class="header">
    <div class="header__menu menu">
        <div class="header__icon icon-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav class="menu__body">
            <ul class="menu__list _swiper">
                <li><a href="#about" class="menu__link _goto-block">О нас</a></li>
                <li><a href="#history" class="menu__link _goto-block">Наша история</a></li>
                <li><a href="#order" class="menu__link _goto-block">Распорядок дня</a></li>
                <li><a href="#place" class="menu__link _goto-block">Место проведения</a></li>
                <li><a href="#survey" class="menu__link _goto-block">Опрос</a></li>
                <li><a href="#wishes" class="menu__link _goto-block">Пожелания</a></li>
                <li><a href="#book" class="menu__link _goto-block">Книга пожеланий</a></li>
                <li><a href="#gallery" class="menu__link _goto-block">Галерея</a></li>
                <li><a href="#contacts" class="menu__link _goto-block">Контакты</a></li>
            </ul>
        </nav>
    </div>
</header>