<?php 
    session_start();
    if(!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'admin') {
        header('Location: ../');
    }
?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/fonts.css">
<div id="header">
    <div class="layout">
        <div class="header_logo">
            <a class="logo" href="index.php">
                <img src="../img/main/logo.svg" alt="">
            </a>
        </div>
        <div class="header_catalog-btn">
            <a class="open-catalog" href="catalog.php">
                <span class="open-catalog__icon">
                    <svg class="">
                        <use xlink:href="../svg/sprite.svg#grid"></use>
                    </svg>
                </span>
                <span class="open-catalog__txt">КАТАЛОГ</span>
            </a>
        </div>
        <div class="header_search">
            <form id="search-form" class="search-form" action="search.php" method="get">
                <input id="title-search-input" class="search-form_input" type="text" name="search" placeholder="Найди мне...">
                <button class="search-form_btn" type="submit">
                    <img src="../img/main/search.svg" alt="">
                </button>
            </form>
        </div>
        <div class="header_controls flex">
            <div class="header__controls-group authorization">
                <a class="header-control" id="" href="../functions/account/logout.php">
                    <span class="header-control__icon">
                        <img src="../img/main/door.png" alt="">
                    </span>
                    <span class="header-control__txt">Выйти</span>
                </a> 
            </div>
        </div>
    </div>
</div>
<div id="header_cat">
    <div class="layout">
        <div class="cat_item">
            <a href="slider.php">Слайдер</a>
        </div>
        <div class="cat_item">
            <a href="brand.php">Бренды</a>
        </div>
        <div class="cat_item">
            <a href="category.php">Категории</a>
        </div>
        <div class="cat_item">
            <a href="reviews.php">Отзывы</a>
        </div>
        <div class="cat_item">
            <a href="orders.php">Заказы</a>
        </div>
    </div>
</div>