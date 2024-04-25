<?php 
    session_start();
    require_once('../../config/connect.php');

    $name = $_POST['nameClient'];
    $number = $_POST['numberClient'];
    $mail = $_POST['mailClient'];
    $comment = $_POST['commClient'];
    $sum = $_SESSION['basketSum'];

    if ($_POST['radio_obtaining_1']) {
        $obtaining = 1;
    } else {
        $obtaining = 2;
    }

    if ($_POST['radio_payment_1']) {
        $payment = 1;
    } else {
        $payment = 2;
    }

    if (isset($_SESSION['accountId'])) {
        $idAccount = $_SESSION['accountId'];
    } else {
        $idAccount = 0;
    }

    mysqli_query($ConnectDatabase, "INSERT INTO `orders` 
    (`ID`, `IDUSER`, `ONECLICK`, `SUMM`, `NAME`, `PHONE`, `EMAIL`, `COMM`, `DELIVERY`, `PAY`, `STATUS`) VALUES 
    (NULL, '$idAccount', 0, '$sum', '$name', '$number', '$mail', '$comment', '$obtaining', '$payment', 1)");

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