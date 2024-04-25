<?php 
    $idBrand = $_GET['idBrand'];
    require_once('config/connect.php');
    $itemBrand = mysqli_query($ConnectDatabase, "SELECT * FROM `brands` WHERE `ID`='$idBrand'");    
    $itemBrand = mysqli_fetch_assoc($itemBrand);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бренд</title>
    <link rel="stylesheet" href="css/brand-card.css">
</head>
<body>

<?php 
    require_once('header.php');
?>

<div id="body_brand">
    <div class="layout">
        <h1 class="title_brand">
            <?= $itemBrand['NAME'] ?>
        </h1>
        <div class="text_brand">
            <?= nl2br($itemBrand['TEXT']) ?>
        </div>
        <div class="img_brand" style="background-image: url('<?= $itemBrand['SRC'] ?>');" ></div>
        <a href="catalog.php?brandnameid=<?= $idBrand ?>" class="link_input_button">Перейти в каталог</a>
    </div>
</div>

<?php 
    require_once('footer.php')
?>

</body>
</html>