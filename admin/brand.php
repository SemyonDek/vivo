<?php
    require_once('../config/brand.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<br>
<div id="body_brand">
    <div class="layout">
        <div id="brands_list_block">
            <h1 class="title_prod">Бренды</h1>
            <input id="add_brand" type="button" value="Добавить">
            <div class="brand_list">
                <?php 
                    addListBrandAdm($BrandTable);
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    add_brand.onclick = function() {
        window.location.href = "brand-card-add.php";
    }
</script>
</body>
</html>