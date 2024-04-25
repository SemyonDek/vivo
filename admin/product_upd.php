<?php 
    require_once('../config/category.php');
    require_once('../config/brand.php');
    require_once('../config/products.php');
    $idProd = $_GET['idProd'];
    $itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");    
    $itemProd = mysqli_fetch_assoc($itemProd);
    $PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd` WHERE `IDPROD`='$idProd'");    
    $PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
    $DayProd = mysqli_query($ConnectDatabase, "SELECT * FROM `productsDay` WHERE `IDPROD`='$idProd'");    
    $DayProd = mysqli_fetch_assoc($DayProd);
    $SaleProd = mysqli_query($ConnectDatabase, "SELECT * FROM `productsSale` WHERE `IDPROD`='$idProd'");    
    $SaleProd = mysqli_fetch_assoc($SaleProd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/product_add.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="body_upd_prod">
    <div class="layout">
        <h1 class="title_prod">Изменить товар</h1>
        <form id="productForm" action="">
            <input type="hidden" name="idProd" id="idProd" value="<?= $idProd ?>">
            <div id="main_block">
                <div class="photos_block">
                    <div class="file_photo">
                        <input type="file" id="file_photo">
                        <input type="button" class="add_photo" onclick="addPhotosUpd()" value="Добавить фото">
                        <input type="file" class="hidden" name="file_photo_1" id="file_photo_1">
                        <input type="file" class="hidden" name="file_photo_2" id="file_photo_2">
                        <input type="file" class="hidden" name="file_photo_3" id="file_photo_3">
                        <input type="file" class="hidden" name="file_photo_4" id="file_photo_4">
                        <input type="file" class="hidden" name="file_photo_5" id="file_photo_5">
                    </div>
                
                    <div id="phot_prod_add">
                        <?php
                            foreach($PhotosProd as $key => $value) {
                                ?>
                                <div class="photo_add" id="photo_<?= $key + 1 ?>" style="background-image: url(<?= '../' . $value['SRC'] ?>)">
                                <button class="del_photo" type="button" onclick="delPhoto('photo_<?= $key + 1 ?>')">✕</button></div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="block_button">
                        <input type="button" class="add_photo" value="Изменить" onclick="updProd()">
                        <br>
                        <input type="button" class="add_photo" value="Вернуться назад" onclick="window.location.href = 'catalog.php'">
                    </div>

                </div>
                <div class="info_block">
                <div class="line_characteristic">
                        <div class="name_characteristic">Название:</div>
                        <input class="characteristic" type="text" name="nameProd" id="nameProd" value="<?= $itemProd['NAME'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Код товара:</div>
                        <input class="characteristic" type="number" name="codeProd" id="codeProd" value="<?= $itemProd['CODE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Цена:</div>
                        <input class="characteristic" type="number" placeholder="₽" name="priceProd" id="priceProd" value="<?= $itemProd['PRICE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Скидка:</div>
                        <input class="characteristic size" type="number" placeholder="%" name="saleProd" id="saleProd" value="<?= $itemProd['SALE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Категория:</div>
                        <select class="characteristic" name="catidProd" id="catidProd">
                            <option value=""></option>
                            <?php 
                                oprtionCategory($CategoryTable, $itemProd['IDCAT']);
                            ?>
                        </select>
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Производитель:</div>
                        <select class="characteristic" name="brandidProd" id="brandidProd">
                            <option value=""></option>
                            <?php 
                                oprtionBrand($BrandTable, $itemProd['IDBRAND']);
                            ?>
                        </select>
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Серия:</div>
                        <input class="characteristic" type="text" name="seriesProd" id="seriesProd" value="<?= $itemProd['SERIES'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Страна:</div>
                        <input class="characteristic" type="text" name="countryProd" id="countryProd" value="<?= $itemProd['COUNTRY'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Гарантия:</div>
                        <select class="characteristic" name="warrProd" id="warrProd">
                            <option></option>
                            <option value="1" <?php if($itemProd['WARRANTY'] == 1) echo 'selected="selected"' ?>>Пол года</option>
                            <option value="2" <?php if($itemProd['WARRANTY'] == 2) echo 'selected="selected"' ?>>1 год</option>
                            <option value="3" <?php if($itemProd['WARRANTY'] == 3) echo 'selected="selected"' ?>>2 года</option>
                            <option value="4" <?php if($itemProd['WARRANTY'] == 4) echo 'selected="selected"' ?>>3 года</option>
                            <option value="5" <?php if($itemProd['WARRANTY'] == 5) echo 'selected="selected"' ?>>4 года</option>
                            <option value="6" <?php if($itemProd['WARRANTY'] == 6) echo 'selected="selected"' ?>>5 лет</option>
                        </select>
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Тип зеркала:</div>
                        <input class="characteristic" type="text" name="glassProd" id="glassProd" value="<?= $itemProd['MIRROR'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Ширина:</div>
                        <input class="characteristic size" type="number" placeholder="см" name="xsizeProd" id="xsizeProd" value="<?= $itemProd['XSIZE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Высота:</div>
                        <input class="characteristic size" type="number" placeholder="см" name="ysizeProd" id="ysizeProd" value="<?= $itemProd['YSIZE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Глубина:</div>
                        <input class="characteristic size" type="number" placeholder="см" name="zsizeProd" id="zsizeProd" value="<?= $itemProd['ZSIZE'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Цвет:</div>
                        <input class="characteristic" type="text" name="colorProd" id="colorProd" value="<?= $itemProd['COLOR'] ?>">
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Подстветка:</div>
                        <input class="characteristic" type="checkbox" name="checkboxLightProd" id="checkboxLightProd" <?php 
                            if($itemProd['LIGHT']) echo 'checked';
                        ?>>
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Товар дня:</div>
                        <input class="characteristic" type="checkbox" name="checkboxDayProd" id="checkboxDayProd" <?php 
                            if($DayProd) echo 'checked';
                        ?>>
                    </div>
                    <div class="line_characteristic">
                        <div class="name_characteristic">Максимальная выгода:</div>
                        <input class="characteristic" type="checkbox" name="checkboxMaxSaleProd" id="checkboxMaxSaleProd" <?php 
                            if($SaleProd) echo 'checked';
                        ?>>
                    </div>
                    
                </div>
                
            </div>
        </form>
    </div>
</div>

<script src="../script/add-photos.js"></script>
<script src="../script/product.js"></script>

</body>
</html>