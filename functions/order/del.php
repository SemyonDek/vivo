<?php 
    require_once('../../config/connect.php');

    $idOrder = $_POST['idOrder'];


    mysqli_query($ConnectDatabase, "UPDATE `orders` SET `STATUS` = '0' WHERE `orders`.`ID` = $idOrder");

    require_once('../../config/orders.php');
?>

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