<?php
    session_start();
    require_once('../../config/connect.php');
    $name = $_POST['nameUser'];
    $number = $_POST['numberUser'];
    $mail = $_POST['mailUser'];
    $idUser = $_SESSION['accountId'];

    mysqli_query($ConnectDatabase, "UPDATE `users` SET `NAME` = '$name', `NUMBER` = '$number', `EMAIL` = '$mail' WHERE `users`.`ID` = $idUser");

    echo 'Данные изменены';
?>