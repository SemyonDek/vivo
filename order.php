<?php 
    require_once('config/connect.php');
    session_start();
    if (!isset($_SESSION['basket']) || $_SESSION['basket'] == [] || $_SESSION['basket'] == '') {
        header('Location: basket.php');
    }
    if(isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') {
        $idUser = $_SESSION['accountId'];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$idUser'");    
        $usersData = mysqli_fetch_assoc($usersData);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="css/order.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="order_body">
    <div class="layout">
        <div id="crumbs">
            <a href="">Главная / </a>
            <a href="">Корзина / </a>
            <a href="">Оформление заказа</a>
        </div>
        <div class="left-block">
            <div class="title-basket">Оформление заказа</div>
            <form id="orderForm" action="">
                <div class="title_form">Ваши данные</div>
                <input type="text" placeholder="ФИО" id="nameClient" name="nameClient" value="<?php if(isset($idUser)) echo $usersData['NAME']?>">
                <input type="text" placeholder="Контактный телефон" id="numberClient" name="numberClient" value="<?php if(isset($idUser)) echo $usersData['NUMBER']?>">
                <input type="text" placeholder="Адресс электронной почты" id="mailClient" name="mailClient" value="<?php if(isset($idUser)) echo $usersData['EMAIL']?>">
                <div class="title_form">Способ получения</div>
                <fieldset id="obtaining">
                    <label for="radio_obtaining_1">
                        <div class="radio_block">
                            <input type="radio" id="radio_obtaining_1" name="obtaining" checked="checked">
                            Самовывоз
                        </div>
                    </label>
                    <label for="radio_obtaining_2">
                        <div class="radio_block">
                            <input type="radio" id="radio_obtaining_2" name="obtaining">
                            Доставка
                        </div>
                    </label>
                </fieldset>
                <div class="title_form">Способ оплаты</div>
                <fieldset id="radio_payment">
                    <label for="radio_payment_1">
                        <div class="radio_block">
                            <input type="radio" id="radio_payment_1" name="payment" checked="checked">
                            Наличными
                        </div>
                    </label>
                    <label for="radio_payment_2">
                        <div class="radio_block">
                            <input type="radio" id="radio_payment_2" name="payment">
                            Картой
                        </div>
                    </label>
                </fieldset>
                <textarea name="commClient" id="commClient" rows="5" placeholder="Ваши комментарии"></textarea>
                <input id="buttonOrder" class="next_order" type="button" value="Оформить">
            </form>
        </div>
        <div class="right-block">
            <div class="block_basket_amount">
                <div class="amount_basket">
                    Итого :
                    <span>
                    <?= number_format($_SESSION['basketSum'], 0, '.', ' ').' ' ?>
                    </span> 
                </div>
                <div class="amount_old_basket">
                    Общая стоимость : <?= number_format($_SESSION['basketSumFull'], 0, '.', ' ').' ' ?>
                </div>
                <div class="sale_basket">
                    Ваша скидка : -<?= number_format($_SESSION['basketSale'], 0, '.', ' ').' ' ?>
                </div>
            </div>
        </div>
        <div class="clear-both"></div>
        <div class="clear-both"></div>
    </div>
</div>

<?php 
    require_once('footer.php');
?>
<script src="script/order.js"></script>

</body>
</html>