<?php 
    require_once('config/brand.php');
    require_once('config/slider.php');
    require_once('config/prodDay.php');
    require_once('config/prodSale.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIVON.RU - Интернет магазин сантехники и мебели для ванной</title>
    <link rel="stylesheet" href="css/index.css">
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
                    addSliderIndex($SliderList);
                ?>
                <!-- <img src="img/main/slider/banner-15-desktop.jpg" alt="" class="img-slider-img">
                <img src="img/main/slider/dolyame-banner-desktop.jpg" alt="" class="img-slider-img">
                <img src="img/main/slider/montage-desktop.jpg" alt="" class="img-slider-img">
                <img src="img/main/slider/return-desktop.jpg" alt="" class="img-slider-img">
                <img src="img/main/slider/showroom-desktop.jpg" alt="" class="img-slider-img"> -->
            </div>
            <div class="buttons_block">
                <div id="left_button-img" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-img" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-right"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div id="product_day" class="product-sliders">
            <h1 class="title_prod">Товар дня</h1>
            <div id="product_day-slider">
                <?php 
                    addProdDaySlider($ProdDayTable, $TableProdAll, $PhotosProdList);
                ?>
                <!-- <div class="item-prod item-prod_day">
                    <div class="img_item-prod" style="background-image: url('img/product/prod1.jpg');"></div>
                    <h3 class="name_item-prod">
                        WeltWasser Душевая кабина WW500 EMMER 12055
                    </h3>
                    <h3 class="price_item-prod">123 123</h3>
                    <button class="add-basket_item-prod">
                        <div class="img_add-basket"></div>
                    </button>
                    <div class="sale_item-prod">50</div>
                </div> -->

            </div>
            <div class="buttons_block">
                <div id="left_button-product_day" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-product_day" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-right"></use>
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
                        addProdSaleSlider($ProdSaleTable, $TableProdAll, $PhotosProdList);
                    ?>
                </div>
            </div>
            <div class="buttons_block">
                <div id="left_button-sale_day" class="button_slider left_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-left"></use>
                    </svg>
                </div>
                <div id="right_button-sale_day" class="button_slider right_button">
                    <svg class="svg-sprite-icon icon-angle-left">
                        <use xlink:href="svg/sprite.svg#angle-right"></use>
                    </svg>
                </div>
            </div>
            </div>
        <div id="brands_list_block">
            <h1 class="title_prod">Бренды</h1>
            <div class="brand_list">
                <?php 
                    addListBrandUser($BrandTable);
                ?>
            </div>
        </div>
        
    </div>
</div>

<?php 
    require_once('footer.php')
?>

<script src="script/slider-img.js"></script>
<script src="script/slider-product-day.js"></script>
<script src="script/slider-product-sale.js"></script>
    
</body>
</html>