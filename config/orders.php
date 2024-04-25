<?php 
    require_once('connect.php');
        
    $OrderTable = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
    $OrderTable = mysqli_fetch_all($OrderTable, MYSQLI_ASSOC);
    $OrderItemTable = mysqli_query($ConnectDatabase, "SELECT * FROM `orderItem`");
    $OrderItemTable = mysqli_fetch_all($OrderItemTable, MYSQLI_ASSOC);

    function addOrdersListAdm($OrderTable, $OrderItemTable) {
        foreach($OrderTable as $key => $item) {
            $i = 0;
            foreach ($OrderItemTable as $itemItem) {
                
                if ($itemItem['IDORDER'] == $item['ID']) $i++;
            }
            ?>
                <tr>
                    <td class="number_order"><?= $key + 1 ?></td>
                    <td class="nameClient_order"><?= $item['NAME'] ?></td>
                    <td class="valueProd_order"><?= $i ?></td>
                    <td class="amount_order"><?= $item['SUMM'] ?></td>
                    <td class="details_order"><a href="#info_block" onclick="infoOrder(<?= $item['ID'] ?>)">Показать</a></td>
                    <td class="function_order">
                        <?php 
                            if ($item['STATUS'] == 1) {
                                ?>
                                    <div class="function_body">
                                        <span class="add" onclick="updOrder(<?= $item['ID'] ?>)">✓</span>
                                        <span class="del" onclick="delOrder(<?= $item['ID'] ?>)">✗</span>
                                    </div>
                                <?php
                            } elseif ($item['STATUS'] == 2) echo 'Оформлен';
                            elseif ($item['STATUS'] == 0) echo 'Отменен';
                        ?>
                        
                    </td>
                </tr>
            <?php
        }
    }

    function addOrdersListUsr($OrderTable, $OrderItemTable) {
        foreach($OrderTable as $key => $item) {
            $i = 0;
            foreach ($OrderItemTable as $itemItem) {
                
                if ($itemItem['IDORDER'] == $item['ID']) $i++;
            }
            ?>
                <tr>
                    <td class="number_order"><?= $key + 1 ?></td>
                    <td class="valueProd_order"><?= $i ?></td>
                    <td class="amount_order"><?= $item['SUMM'] ?></td>
                    <td class="details_order"><a href="#info_block" onclick="infoOrderUser(<?= $item['ID'] ?>)">Показать</a></td>
                    <td class="sost_order">
                        <?php 
                            if ($item['STATUS'] == 1) echo 'В обработке';
                            elseif ($item['STATUS'] == 2) echo 'Оформлен';
                            elseif ($item['STATUS'] == 0) echo 'Отменен';
                        ?>
                        
                    </td>
                </tr>
            <?php
        }
    }
?>