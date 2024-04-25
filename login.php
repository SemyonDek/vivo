<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход на сайт</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="login-body">
    <div class="layout">
        <div id="crumbs">
            <a href="">Главная / </a>
            <a href="">Вход на сайт</a>
        </div>
        <div class="login_block">
            <div class="title-basket">
                Вход на сайт
            </div>
            <form id="loginForm">
                <div class="title_form">Логин:</div>
                <input type="text" name="login">
                <div class="title_form">Пароль:</div>
                <input type="password" name="password">
                <input id="logButton" class="next_order" type="button" value="Вход">
            </form>
        </div>
    </div>
</div>
<script src="script/login.js"></script>
<?php 
    require_once('footer.php');
?>
</body>
</html>