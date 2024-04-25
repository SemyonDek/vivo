<?php 
    require_once('connect.php');
        
    $ProdDayTable = mysqli_query($ConnectDatabase, "SELECT * FROM `productsDay`");
    $ProdDayTable = mysqli_fetch_all($ProdDayTable, MYSQLI_ASSOC);
    $TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");    
    $TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);
    $PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd`");
    $PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);

    function addProdDaySlider($ProdDayTable, $TableProdAll, $PhotosProdList) {
        foreach ($ProdDayTable as $itemDay) {
            foreach ($TableProdAll as $itemProd) {
                if ($itemDay['IDPROD'] == $itemProd['ID']) {
                    $price = $itemProd['PRICE'] - ($itemProd['PRICE'] * ($itemProd['SALE'] / 100));
                    ?>
                        <div class="item-prod item-prod_day">
                            <?php 
                                foreach($PhotosProdList as $itemPhoto) {
                                    if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                                        ?>
                                            <div class="img_item-prod" style="background-image: url('<?= $itemPhoto['SRC'] ?>');"></div>
                                        <?php
                                        break;
                                    }
                                }
                            ?>
                            <h3 class="name_item-prod">
                                <?= $itemProd['NAME'] ?>
                            </h3>
                            <h3 class="price_item-prod"><?= number_format($price, 0, '.', ' ').' ' ?></h3>
                            <button class="add-basket_item-prod" onclick="addBasket(<?= $itemProd['ID'] ?>)">
                                <div class="img_add-basket"></div>
                            </button>
                            <?php 
                                if ($itemProd['SALE'] !== '0') {
                                    ?>
                                        <div class="sale_item-prod"><?= $itemProd['SALE'] ?></div>
                                    <?php
                                }
                            ?>
                        </div>

                    <?php
                    break;
                }
            }
        }
    }

    function addProdDaySliderAdm($ProdDayTable, $TableProdAll, $PhotosProdList) {
        foreach ($ProdDayTable as $itemDay) {
            foreach ($TableProdAll as $itemProd) {
                if ($itemDay['IDPROD'] == $itemProd['ID']) {
                    $price = $itemProd['PRICE'] - ($itemProd['PRICE'] * ($itemProd['SALE'] / 100));
                    ?>
                        <div class="item-prod item-prod_day">
                            <?php 
                                foreach($PhotosProdList as $itemPhoto) {
                                    if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                                        ?>
                                            <div class="img_item-prod" style="background-image: url('../<?= $itemPhoto['SRC'] ?>');"></div>
                                        <?php
                                        break;
                                    }
                                }
                            ?>
                            <h3 class="name_item-prod">
                                <?= $itemProd['NAME'] ?>
                            </h3>
                            <h3 class="price_item-prod"><?= number_format($price, 0, '.', ' ').' ' ?></h3>
                            <button class="add-basket_item-prod">
                                <div class="img_add-basket"></div>
                            </button>
                            <?php 
                                if ($itemProd['SALE'] !== '0') {
                                    ?>
                                        <div class="sale_item-prod"><?= $itemProd['SALE'] ?></div>
                                    <?php
                                }
                            ?>
                        </div>

                    <?php
                    break;
                }
            }
        }
    }
?>