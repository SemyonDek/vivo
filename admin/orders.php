<?php
require_once('../config/orders.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/orders.css">
</head>

<body>
    <?php
    require_once('header.php');
    ?>
    <div id="info_block">
    </div>
    <div id="orders_body">
        <div class="layout">
            <h1 class="title_prod">Заказы</h1>
            <table>
                <thead>
                    <tr>
                        <td class="number_order">№</td>
                        <td class="nameClient_order">Заказчик</td>
                        <td class="valueProd_order">Количество товаров</td>
                        <td class="amount_order">Сумма</td>
                        <td class="details_order">Детали</td>
                        <td class="function_order">Оформить</td>
                    </tr>
                </thead>
                <tbody id="BodyOrdersTable">
                    <?php
                    addOrdersListAdm($OrderTable, $OrderItemTable)
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="../script/order.js"></script>
</body>

</html>