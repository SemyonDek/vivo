<?php 
    require_once('../config/slider.php');
    require_once('../config/prodDay.php');
    require_once('../config/prodSale.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="main_block">
    <div class="layout flex">
        <div id="slider">
            <div id="img_slider">
                <?php 
                    addSliderAdmIndex($SliderList);
                ?>
            </div>
            <div class="buttons_block">
                <div id="left_button-img" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-img" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-right"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div id="product_day" class="product-sliders">
            <h1 class="title_prod">Товар дня</h1>
            <div id="product_day-slider">
                <?php 
                    addProdDaySliderAdm($ProdDayTable, $TableProdAll, $PhotosProdList);
                ?>

            </div>
            <div class="buttons_block">
                <div id="left_button-product_day" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-product_day" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-right"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div id="products_sales">
            <h1 class="title_prod">Товары с максимальной выгодой</h1>
            <div class="block_hidden">
                <div id="product_sales-slider" style="width: <?= 1315 + (1315 * $countStr) ?>px; ">
                    <input type="hidden" id="colstr" value='<?= $countStr ?>'>
                    <?php 
                        addProdSaleSliderAdm($ProdSaleTable, $TableProdAll, $PhotosProdList);
                    ?>
                </div>
            </div>
            <div class="buttons_block">
                <div id="left_button-sale_day" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-sale_day" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="../svg/sprite.svg#angle-right"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../script/slider-img.js"></script>
<script src="../script/slider-product-day.js"></script>
<script src="../script/slider-product-sale.js"></script>
    
</body>
</html>