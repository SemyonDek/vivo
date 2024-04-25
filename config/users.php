<?php 
    require_once('connect.php');
        
    $Account = mysqli_query($ConnectDatabase, "SELECT * FROM `users`");
    $Account = mysqli_fetch_all($Account, MYSQLI_ASSOC);
?>