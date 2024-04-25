<?php
require_once('../config/category.php');
require_once('../config/brand.php');
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
            <h1 class="title_prod">Добавить товар</h1>
            <form id="productForm" action="">
                <div id="main_block">
                    <div class="photos_block">
                        <h1 class="title_img_add">Загрузить картинку</h1>
                        <div class="file_photo">
                            <input type="file" id="file_photo">
                            <input type="button" class="add_photo" onclick="addPhotos()" value="Добавить фото">
                            <input type="file" class="hidden" name="file_photo_1" id="file_photo_1">
                            <input type="file" class="hidden" name="file_photo_2" id="file_photo_2">
                            <input type="file" class="hidden" name="file_photo_3" id="file_photo_3">
                            <input type="file" class="hidden" name="file_photo_4" id="file_photo_4">
                            <input type="file" class="hidden" name="file_photo_5" id="file_photo_5">
                        </div>

                        <div id="phot_prod_add">

                        </div>
                        <div class="block_button">
                            <input type="button" class="add_photo" value="Добавить" onclick="addProduct()">
                            <br>
                            <input type="button" class="add_photo" value="Вернуться назад" onclick="window.location.href = 'catalog.php'">
                        </div>

                    </div>
                    <div class="info_block">
                        <div class="line_characteristic">
                            <div class="name_characteristic">Название:</div>
                            <input class="characteristic" type="text" name="nameProd" id="nameProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Код товара:</div>
                            <input class="characteristic" type="number" name="codeProd" id="codeProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Цена:</div>
                            <input class="characteristic" type="number" placeholder="₽" name="priceProd" id="priceProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Скидка:</div>
                            <input class="characteristic size" type="number" placeholder="%" name="saleProd" id="saleProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Категория:</div>
                            <select class="characteristic" name="catidProd" id="catidProd">
                                <option value=""></option>
                                <?php
                                oprtionCategory($CategoryTable);
                                ?>
                            </select>
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Производитель:</div>
                            <select class="characteristic" name="brandidProd" id="brandidProd">
                                <option value=""></option>
                                <?php
                                oprtionBrand($BrandTable);
                                ?>
                            </select>
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Серия:</div>
                            <input class="characteristic" type="text" name="seriesProd" id="seriesProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Страна:</div>
                            <input class="characteristic" type="text" name="countryProd" id="countryProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Гарантия:</div>
                            <select class="characteristic" name="warrProd" id="warrProd">
                                <option></option>
                                <option value="1">Пол года</option>
                                <option value="2">1 год</option>
                                <option value="3">2 года</option>
                                <option value="4">3 года</option>
                                <option value="5">4 года</option>
                                <option value="6">5 лет</option>
                            </select>
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Тип зеркала:</div>
                            <input class="characteristic" type="text" name="glassProd" id="glassProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Ширина:</div>
                            <input class="characteristic size" type="number" placeholder="см" name="xsizeProd" id="xsizeProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Высота:</div>
                            <input class="characteristic size" type="number" placeholder="см" name="ysizeProd" id="ysizeProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Глубина:</div>
                            <input class="characteristic size" type="number" placeholder="см" name="zsizeProd" id="zsizeProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Цвет:</div>
                            <input class="characteristic" type="text" name="colorProd" id="colorProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Подстветка:</div>
                            <input class="characteristic" type="checkbox" name="checkboxLightProd" id="checkboxLightProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Товар дня:</div>
                            <input class="characteristic" type="checkbox" name="checkboxDayProd" id="checkboxDayProd">
                        </div>
                        <div class="line_characteristic">
                            <div class="name_characteristic">Максимальная выгода:</div>
                            <input class="characteristic" type="checkbox" name="checkboxMaxSaleProd" id="checkboxMaxSaleProd">
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