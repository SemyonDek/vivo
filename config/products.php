<?php 
    require_once('connect.php');
    require_once('country.php');
    require_once('filters.php');
        
    $ProductTable = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE PRICE BETWEEN $min_prod_mass AND $max_prod_mass 
    $searchStr $idCatProd $idBrand $nameCountry $sort");
    $ProductTable = mysqli_fetch_all($ProductTable, MYSQLI_ASSOC);
    $PhotosProdList = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd`");
    $PhotosProdList = mysqli_fetch_all($PhotosProdList, MYSQLI_ASSOC);
    
    function addListProdAdm($ProductTable, $PhotosProdList) {
        foreach($ProductTable as $item) {
            $price = $item['PRICE'] - ($item['PRICE'] * ($item['SALE'] / 100))
            ?>
                <div class="item-prod">
                    <?php 
                        foreach($PhotosProdList as $itemPhoto) {
                            if ($itemPhoto['IDPROD'] == $item['ID']) {
                                ?>
                                    <div class="img_item-prod" style="background-image: url('../<?= $itemPhoto['SRC'] ?>');"></div>
                                <?php
                                break;
                            }
                        }
                    ?>
                    <a href="product_upd.php?idProd=<?= $item['ID'] ?>">
                        <h3 class="name_item-prod">
                            <?= $item['NAME'] ?>
                        </h3>
                    </a>
                    <h3 class="price_item-prod"><?= number_format($price, 0, '.', ' ').' ' ?></h3>
                    <input type="button" value="Изменить" class="button_prod" 
                        onclick="window.location.href = 'product_upd.php?idProd=<?= $item['ID'] ?>'">
                    <input type="button" value="Удалить" class="button_prod" onclick="delProd(<?= $item['ID'] ?>)">
                    <?php 
                        if ($item['SALE'] !== '0') {
                            ?>
                                <div class="sale_item-prod"><?= $item['SALE'] ?></div>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    }

    function addListProdUser($ProductTable, $PhotosProdList) {
        foreach($ProductTable as $item) {
            $price = $item['PRICE'] - ($item['PRICE'] * ($item['SALE'] / 100));
            ?>
                <div class="item-prod">
                    <?php 
                        foreach($PhotosProdList as $itemPhoto) {
                            if ($itemPhoto['IDPROD'] == $item['ID']) {
                                ?>
                                    <div class="img_item-prod" style="background-image: url('<?= $itemPhoto['SRC'] ?>');"></div>
                                <?php
                                break;
                            }
                        }
                    ?>
                    <a href="product-card.php?idProd=<?= $item['ID'] ?>">
                        <h3 class="name_item-prod">
                            <?= $item['NAME'] ?>
                        </h3>
                    </a>
                    <h3 class="price_item-prod"><?= number_format($price, 0, '.', ' ').' ' ?></h3>
                    <button class="add-basket_item-prod" onclick="addBasket(<?= $item['ID'] ?>)">
                        <div class="img_add-basket"></div>
                    </button>
                    <?php 
                        if ($item['SALE'] !== '0') {
                            ?>
                                <div class="sale_item-prod"><?= $item['SALE'] ?></div>
                            <?php
                        }
                    ?>
                </div>
            <?php
        }
    }

    function addListCountry($country, $idCountry = '') {
        foreach ($country as $item) {
            ?>
                <option value="<?= $item ?>" <?php if($idCountry == $item) echo 'selected="selected"' ?> ><?= $item ?></option>
            <?php
        }
    }

    function addBasketList($basket, $ProductTable, $PhotosProdList) {
        foreach ($basket as $key => $itemBasket) {
            foreach ($ProductTable as $itemProd) {
                if ($itemProd['ID'] == $itemBasket['ID']) {
                    ?>
                        <tr>
                            <td class="img">
                                <?php 
                                    foreach($PhotosProdList as $itemPhoto) {
                                        if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                                            ?>
                                                <div class="img-prod" style="background-image: url('<?= $itemPhoto['SRC'] ?>');" ></div>
                                            <?php
                                            break;
                                        }
                                    }
                                ?>
                            </td>
                            <td class="name">
                                <div class="name-prod"><?= $itemProd['NAME'] ?></div>
                                <div class="code-prod">Код товара: <?= $itemProd['CODE'] ?></div>
                            </td>
                            <td class="amount">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button type="button" class="minus" id="minusQuantity_<?= $key ?>" onclick="minusQuantity(<?= $key ?>)" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input id="quantityInput_<?= $key ?>" type="text" class="countAddProd form-control" value="<?= $itemBasket['VALUE'] ?>" onkeypress="return false">
                                    <div class="input-group-btn">
                                        <button type="button" class="plus" id="plusQuantity_<?= $key ?>" onclick="plusQuantity(<?= $key ?>)">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="price">
                                <?php 
                                    if ($itemBasket['SALE'] !== '0') {
                                        ?>
                                            <div class="sale_prod"><?= $itemBasket['SALE'] ?></div>
                                        <?php
                                    }
                                ?>
                                <div class="price-prod" id="priceProde_<?= $key ?>" ><?= number_format($itemBasket['AMOUNT'], 0, '.', ' ').' '  ?></div>
                                <div class="del_prod" onclick='delBasketItem(<?= $key ?>)'>Удалить</div>
                            </td>
                        </tr>
                    <?php
                }
            }
        }
    }
?>