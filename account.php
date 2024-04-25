<?php
    require_once('config/orders.php');

    session_start();
    if(!isset($_SESSION['accountName']) && $_SESSION['accountName'] !== 'user') {
        header('Location: index.php');
    }

    $idUser = $_SESSION['accountId'];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");    
    $usersData = mysqli_fetch_assoc($usersData);

    $UsersOrder = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE `IDUSER` = '$idUser'");    
    $UsersOrder = mysqli_fetch_all($UsersOrder, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/account.css">
</head>
<body>
<?php 
    require_once('header.php')
?>
<div id="info_block">
</div>
<div id="account_body">
    <div class="layout">
        <div id="crumbs">
            <a href="">Главная / </a>
            <a href="">Аккаунт</a>
        </div>
        <div class="title-basket">Данные пользователя</div>
        <form id="userInfo" action="">
            <div class="info_user">
                <div class="item_info_user_text">Имя:</div>
                <input type="text" class="item_info_user_form" placeholder="ФИО" name="nameUser" id="nameUser" value="<?php if(isset($idUser)) echo $usersData['NAME']?>">
                <div class="item_info_user_text">Телефон:</div>
                <input type="text" class="item_info_user_form" placeholder="Контактный телефон" name="numberUser" id="numberUser" value="<?php if(isset($idUser)) echo $usersData['NUMBER']?>">
                <div class="item_info_user_text">Почта:</div>
                <input type="text" class="item_info_user_form" placeholder="Адресс электронной почты" name="mailUser" id="mailUser" value="<?php if(isset($idUser)) echo $usersData['EMAIL']?>">
                <input type="button" value="Изменить" class="button_account" onclick="updAccount()">
            </div>
        </form>
        <div class="title-basket">Мои заказы</div>
        <table>
            <thead>
                <tr>
                    <td class="number_order">№</td>
                    <td class="valueProd_order">Кол-во товаров</td>
                    <td class="amount_order">Сумма</td>
                    <td class="details_order">Детали</td>
                    <td class="sost_order">Состояние</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    addOrdersListUsr($UsersOrder, $OrderItemTable);
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    require_once('footer.php')
?>
<script>
    function updAccount() {
        let form = document.getElementById('userInfo');
        const { elements } = form;
    
        const data = Array.from(elements)
            .filter((item) => !!item.name)
            .map((element) => {
            const { name, value } = element

            return { name, value }
        })
            
        style_input_red = 'border-color: red;';
        style_input_gray = 'border-color: black;';
        
        prov = true;
        
        data.forEach(element => {
            if (element['value'] == '') {
                document.getElementById(element['name']).style = style_input_red;
                prov = false;
            } else {
                    document.getElementById(element['name']).style = style_input_gray;
            }
        });

        if (!prov) return;
        
        let formData = new FormData(form);
        
        var url = 'functions/account/upd.php';

        let xhr = new XMLHttpRequest();    
        
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            alert(xhr.response);
        } 
    }
</script>
<script src="script/order.js"></script>
</body>
</html>