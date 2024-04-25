<?php 
    session_start();
    require_once('../../config/connect.php');

    $idprod = $_POST['idprod'];
    $estimation = $_POST['estimation'];
    
    $iduser = $_SESSION['accountId'];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$iduser'");    
    $usersData = mysqli_fetch_all($usersData, MYSQLI_ASSOC);
    $nameUser = $usersData[0]['NAME'];

    $commtext = $_POST['commText'];
    
    $date = date('d.m.Y').' г.';
    
    mysqli_query($ConnectDatabase, "INSERT INTO `reviews` 
    (`ID`, `IDPROD`, `ESTIMATION`, `USERNAME`, `TEXT`, `DATE`, `PUBLICATION`) VALUES 
    (NULL, '$idprod', '$estimation', '$nameUser', '$commtext', '$date', 0)");

    echo 'Отзыв отправлен';
?>