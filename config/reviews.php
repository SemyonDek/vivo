<?php 
    require_once('connect.php');

    $CommTable = mysqli_query($ConnectDatabase, "SELECT * FROM `reviews`");
    $CommTable = mysqli_fetch_all($CommTable, MYSQLI_ASSOC);
    $TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");    
    $TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
    function addListCommAdm($CommTable, $TableProdAll) {
        foreach($CommTable as $key => $itemComm) {
            foreach ($TableProdAll as $itemProd) {
                if ($itemProd['ID'] == $itemComm['IDPROD']) {
                    ?>
                        <tr>
                            <td class="number_comm"><?= $key + 1 ?></td>
                            <td class="name_prod"><?= $itemProd['NAME'] ?></td>
                            <td class="estimation"><?php 
                                echo str_repeat('★', $itemComm['ESTIMATION']);
                                echo str_repeat('☆', 5 - $itemComm['ESTIMATION']);
                            ?></td>
                            <td class="name_user"><?= $itemComm['USERNAME'] ?></td>
                            <td class="comm"><?= $itemComm['TEXT'] ?></td>
                            <td class="data"><?= $itemComm['DATE'] ?></td>
                            <td class="function">
                                <?php 
                                    if ($itemComm['PUBLICATION'] == 0) {
                                        ?>
                                            <div class="function_body">
                                                <span class="add" onclick="updComm(<?= $itemComm['ID'] ?>)">✓</span>
                                                <span class="del" onclick="delComm(<?= $itemComm['ID'] ?>)">✗</span>
                                            </div>
                                        <?php
                                    } else {
                                        echo 'Опубликовано';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php
                }
            }
            
        }
    }

    function addListCommUser($CommTable) {
        foreach ($CommTable as $item) {
            if ($item['PUBLICATION'] == 1) {
                ?>
                    <div class="item-reviews">
                        <div class="name_item-comm"><?= $item['USERNAME'] ?></div>
                        <div class="date_item-comm"><?= $item['DATE'] ?></div>
                        <div class="estimation_item-comm"><?php 
                                    echo str_repeat('★', $item['ESTIMATION']);
                                    echo str_repeat('☆', 5 - $item['ESTIMATION']);
                                ?></div>
                        <div class="text_item-comm"><?= $item['TEXT'] ?></div>
                    </div>
                <?
            }
        }
    }
?>