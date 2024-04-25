<?php 
    session_start();
    if(isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
        header('Location: admin');
    }
    require_once('config/category.php');
?>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/fonts.css">
<div id="header">
    <div class="layout">
        <div class="header_logo">
            <a class="logo" href="index.php">
                <img src="img/main/logo.svg" alt="">
            </a>
        </div>
        <div class="header_catalog-btn">
            <a class="open-catalog" href="catalog.php">
                <span class="open-catalog__icon">
                    <svg class="">
                        <use xlink:href="svg/sprite.svg#grid"></use>
                    </svg>
                </span>
                <span class="open-catalog__txt">КАТАЛОГ</span>
            </a>
        </div>
        <div class="header_search">
            <form id="search-form" class="search-form" action="search.php" method="get">
                <input id="title-search-input" class="search-form_input" type="text" name="search" placeholder="Найди мне...">
                <button class="search-form_btn" type="submit">
                    <img src="img/main/search.svg" alt="">
                </button>
            </form>
        </div>
        <div class="header_controls flex">
            <div class="header__controls-group authorization">
                <?php 
                    if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
                        ?>
                            <a class="header-control" id="" href="account.php">
                                <span class="header-control__icon">
                                    <img src="img/main/user.svg" alt="">
                                </span>
                                <span class="header-control__txt">Аккаунт</span>
                            </a> 
                        <?php
                    }
                ?>
            </div>
            <div class="header__controls-group authorization">
                <?php 
                    if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
                        ?>
                            <a class="header-control" id="" href="functions/account/logout.php">
                                <span class="header-control__icon">
                                    <img class="unlog" src="img/main/door.png" alt="">
                                </span>
                                <span class="header-control__txt">Выйти</span>
                            </a> 
                        <?php
                    } else {
                        ?>
                            <a class="header-control" id="" href="login.php">
                                <span class="header-control__icon">
                                    <img src="img/main/user.svg" alt="">
                                </span>
                                <span class="header-control__txt">Войти</span>
                            </a> 
                        <?php
                    }
                ?>
            </div>
            <div class="header__controls-group">
                <a class="header-control" href="basket.php">
                    <span class="header-control__icon">
                        <img src="img/main/cart.svg" alt="">
                        <span class="header-control__count centered js-basket-line-count" style="display:none;">0</span>
                    </span>
                    <span class="header-control__txt">корзина</span>
                </a> 
            </div>
        </div>
    </div>
</div>
<div id="header_cat">
    <div class="layout">
        <?php 
            $i = 1;
            foreach ($CategoryTable as $item) {
                if ($i <= 4) {
                    ?>
                        <div class="cat_item">
                            <a href="catalog.php?idCat=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                        </div>
                    <?php
                    $i++;
                } else {
                    break;
                }
            }
        ?>
    </div>
</div>