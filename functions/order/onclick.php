<?php 
    session_start();
    require_once('../../config/connect.php');

    $number = $_POST['number'];
    $sum = $_SESSION['basketSum'];

    mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `IDUSER`, `ONECLICK`, `SUMM`, `NAME`, `PHONE`, `EMAIL`, `COMM`, `DELIVERY`, `PAY`, `STATUS`) VALUES 
    (NULL, 0, 0, '$sum', '', '$number', '', '', 0, 0, 1)");

    $idOrder = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `orders`"); 
    $idOrder = mysqli_fetch_all($idOrder);
    $idOrder = $idOrder[0][0];

    foreach($_SESSION['basket'] as $item) {
        $idProd = $item['ID'];
        $value = $item['VALUE'];
        $amount = $item['AMOUNT'];
        
        mysqli_query($ConnectDatabase, "INSERT INTO `orderItem` 
        (`IDORDER`, `IDPROD`, `QUANTITY`, `AMOUNT`) VALUES 
        ('$idOrder', '$idProd', '$value', '$amount')");
    }

    $_SESSION['basket'] = [];
    $_SESSION['basketSum'] = 0;
    $_SESSION['basketSumFull'] = 0;
    $_SESSION['basketSale'] = 0;

    echo 'Заказ оформлен';
?>