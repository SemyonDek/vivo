<?php 
    require_once('../config/category.php');
    require_once('../config/products.php');
    require_once('../config/brand.php');
    $search = $_GET['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/catalog.css">
    <link rel="stylesheet" href="../css/catalog_adm.css">
</head>
<body>

<?php 
    require_once('header.php');
?>

<div id="body_catalog">
    <div class="layout">
        <div id="filter">
            <form action="" method="get">
                <input type="hidden" name="search" value="<?= $search ?>">
                <div class="filter-list">
                    <h1 class="title-filter">Фильры</h1>
                    <h2 class="title-filter">Бренды</h2>
                    <select name="brandnameid" id="brandnameid">
                        <option value=""></option>
                        <?php
                            $brandnameid = '';
                            if(isset($_GET['brandnameid'])) $brandnameid = $_GET['brandnameid'];
                            oprtionBrand($BrandTable, $brandnameid);
                        ?>
                    </select>
                    <h2 class="title-filter">Страна</h2>
                    <select name="countrynameid" id="countrynameid">
                        <option value=""></option>
                        <?php
                            $countrynameid = '';
                            if(isset($_GET['countrynameid'])) $countrynameid = $_GET['countrynameid'];
                            addListCountry($country, $countrynameid);
                        ?>
                    </select>
                    <h2 class="title-filter">Цена</h2>
                    <input type="number" placeholder="от" name="min_price" value="<?php
                        if(isset($_GET['min_price'])) echo $_GET['min_price'];
                    ?>">
                    —
                    <input type="number" placeholder="до" name="max_price" value="<?php
                        if(isset($_GET['max_price'])) echo $_GET['max_price'];
                    ?>">

                    <input type="submit" value="Применить" class="button_filter">
                </div>
            </form>
            <form action="search.php" method="get">
                <input type="hidden" name="search" value="<?= $search ?>">
                <input class="button_filter" type="submit" value="Сбросить">
            </form>
        </div>
        <div id="product-list_block">
            <div class="name_category-catalog" style="margin-bottom: 25px;">Поиск «<?= $search ?>»</div>
            <div class="sort-catalog">
                <select name="sortValue" id="sortValue">
                    <option value=""></option>
                    <option value="0">Сначала дешевле</option>
                    <option value="1">Сначала дороже</option>
                </select>
            </div>
            <div id="product-list-body" class="product-list-body">
                <?php 
                    addListProdAdm($ProductTable, $PhotosProdList);
                ?>
            </div>
        </div>
    </div>
</div>
<script src="../script/product.js"></script>
</body>
</html>