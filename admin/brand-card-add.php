<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/brand-card.css">
</head>
<body>
<?php 
    require_once('header.php');
?>

<div id="body_brand">
    <div class="layout">
        <form id="updBrandForm" class="upd_brand" action="">
            <h1 class="title_brand">
                Название
            </h1>
            <input id="nameBrand" name="nameBrand" type="text" value="">
            <h1 class="title_brand">
                Фотография
            </h1>
            <input id="imgBrand" name="imgBrand" type="file">
            <h1 class="title_brand">
                Описание
            </h1>
            <textarea id="textBrand" name="textBrand" rows="10"></textarea>
            <input type="button" value="Добавить" onclick="addBrand()">
            <input id="back" type="button" value="Назад">
        </form>
    </div>
</div>

<script>
    back.onclick = function() {
        window.location.href = "brand.php";
    }
</script>
<script src="../script/brand.js"></script>
</body>
</html>