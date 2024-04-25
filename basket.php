<?php 
    session_start();
    require_once('config/products.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/basket.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="buy_oneclick_block">
    <a href="#close" class="overlay"></a>
    <div id="modal_main_body">
        <a href="#close" class="overlay"></a>
        <div id="modal_body">
            <a href="#close" title="Close" class="close">×</a>
            <div class="title_modal">Купить в один клик</div>
            <div class="text_modal">
                Пожалуйста, укажите свой номер телефона, мы свяжемся с вами в ближайшее время
            </div>
            <input class="modal_input" type="text" placeholder="Телефон" name="numberOneClick" id="numberOneClick">
            <br>
            <input class="next_order" type="button" value="Купить" onclick="buyOneClick()">
        </div>
    </div>
</div>
<div id="basket-body">
    <div class="layout">
        <div id="crumbs">
            <a href="">Главная / </a>
            <a href="">Корзина</a>
        </div>
        <div class="left-block">
            <div class="title-basket">
                Моя корзина
            </div>
            <table id="BasketTable">
                <?php 
                    addBasketList($_SESSION['basket'], $ProductTable, $PhotosProdList);
                ?>
            </table>
        </div>
        <div class="right-block">
            <div class="block_basket_amount">
                <div class="amount_basket" id="ammountBasket">
                    Итого : <?= number_format($_SESSION['basketSum'], 0, '.', ' ').' ' ?>
                </div>
                <div class="amount_old_basket" id="FullammountBasket">
                    Общая стоимость : <?= number_format($_SESSION['basketSumFull'], 0, '.', ' ').' ' ?>
                </div>
                <div class="sale_basket" id="saleammountBasket">
                    Ваша скидка : -<?= number_format($_SESSION['basketSale'], 0, '.', ' ').' ' ?>
                </div>
                <input id="switching_order" class="next_order" type="button" value="ПРОДОЛЖИТЬ">
                <br>
                <a href="#buy_oneclick_block">Купить в один клик</a>
            </div>
        </div>
        <div class="clear-both">

        </div>
    </div>
</div>
<?php 
    require_once('footer.php')
?>
<script></script>
<script src="script/basket.js"></script>
<script src="script/order.js"></script>
</body>
</html>