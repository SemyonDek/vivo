<?php
    require_once('../../config/connect.php');
    session_start();
    
    $idProd = $_POST['idProd'];
    $itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");    
    $itemProd = mysqli_fetch_assoc($itemProd);
    $price = $itemProd['PRICE'];
    $sale = $itemProd['SALE'];
    $priceSale = $price - ($price * ($sale / 100));
    $value = 1;
    $amountFull = $value * $price;
    $amount = $value * $priceSale;
    
    $prod = [];
    $prod['ID'] = $idProd;
    $prod['VALUE'] = $value;
    $prod['PRICEFULL'] = $price;
    $prod['SALE'] = $sale;
    $prod['PRICESALE'] = $priceSale;
    $prod['AMOUNTFULL'] = $amountFull;
    $prod['AMOUNT'] = $amount;
    
    if(isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
        $basket = $_SESSION['basket'];
    } else $basket = [];
    
    $prov = true;
    foreach ($basket as $key => $item) {
        if ($item['ID'] == $prod['ID']) {
            $basket[$key]['VALUE']++;
            $basket[$key]['AMOUNTFULL'] = $basket[$key]['PRICEFULL'] * $basket[$key]['VALUE'];
            $basket[$key]['AMOUNT'] = $basket[$key]['PRICESALE'] * $basket[$key]['VALUE'];
            $prov = false;
            break;
        }
    }
    if ($prov) array_push($basket, $prod);

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

    echo 'Товар добавлен в корзину';
?>