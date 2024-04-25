<?php 
    require_once('../../config/connect.php');

    $idOrder = $_POST['idOrder'];
    $itemOrder = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE `ID`='$idOrder'");    
    $itemOrder = mysqli_fetch_assoc($itemOrder);
    $ListItemOrder = mysqli_query($ConnectDatabase, "SELECT * FROM `orderItem` WHERE `IDORDER`='$idOrder'");    
    $ListItemOrder = mysqli_fetch_all($ListItemOrder, MYSQLI_ASSOC);
    $TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");    
    $TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

?>

<div id="info_block">
    <a href="#close" class="overlay"></a>
    <div id="modal_main_body">
        <a href="#close" class="overlay"></a>
        <div id="modal_body">
            <a href="#close" title="Close" class="close">×</a>
            <div class="info_main_block">
                <div class="title_modal">Заказ №<?= $idOrder ?></div>
                <div class="text_modal">
                    ФИО: <span><?= $itemOrder['NAME'] ?></span>
                    <br>
                    Телефон: <span><?= $itemOrder['PHONE'] ?></span>
                    <br>
                    Почта: <span><?= $itemOrder['EMAIL'] ?></span>
                    <br>
                    Доставка: <span><?php 
                        if ($itemOrder['DELIVERY'] == 1) {
                            echo 'Самовывоз';
                        } elseif ($itemOrder['DELIVERY'] == 2){
                            echo 'Доставка';
                        }
                    ?></span>
                    <br>
                    Оплата: <span><?php 
                        if ($itemOrder['PAY'] == 1) {
                            echo 'Наличный расчет';
                        } elseif ($itemOrder['PAY'] == 2) {
                            echo 'Оплата картой';
                        }
                    ?></span>
                    <br>
                    Коментарий: <span><?= nl2br($itemOrder['COMM']) ?></span>
                    <br>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <td class="name_prod">Товар</td>
                                <td class="value_prod">Количество</td>
                                <td class="amount_prod">Сумма</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($ListItemOrder as $item) {
                                    foreach ($TableProdAll as $itemProd) {
                                        if ($itemProd['ID'] == $item['IDPROD']) {
                                            ?>
                                                <tr>
                                                    <td class="name_prod"><?= $itemProd['NAME'] ?></td>
                                                    <td class="value_prod"><?= $item['QUANTITY'] ?></td>
                                                    <td class="amount_prod"><?= number_format($item['AMOUNT'], 0, '.', ' ').' ' ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    Сумма заказа: <span><?= $itemOrder['SUMM'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>