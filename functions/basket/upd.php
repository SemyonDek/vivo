<?php 
    require_once('../../config/connect.php');
    session_start();
    
    $id = $_POST['id'];
    $value = $_POST['value'];
    
    if(isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
        $basket = $_SESSION['basket'];
    } else $basket = [];

    $basket[$id]['VALUE'] += $value;
    $basket[$id]['AMOUNTFULL'] = $basket[$id]['PRICEFULL'] * $basket[$id]['VALUE'];
    $basket[$id]['AMOUNT'] = $basket[$id]['PRICESALE'] * $basket[$id]['VALUE'];

    $_SESSION['basket'] = $basket;

    $sum = 0;
    $sumfull = 0;
    $sale = 0;
    $_SESSION['basketSum'] = 0;
    foreach ($_SESSION['basket'] as $value) {
        $sum += $value['AMOUNT'];
        $sumfull += $value['AMOUNTFULL'];
    }

    $_SESSION['basketSum'] = $sum;
    $_SESSION['basketSumFull'] = $sumfull;
    $_SESSION['basketSale'] = $sumfull - $sum;

    require_once('../../config/products.php');
?>

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