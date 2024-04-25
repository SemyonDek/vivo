<?php 
    require_once('../../config/connect.php');
    $idCat = $_POST['idcat'];
    $TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");    
    $TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

    $prov = true;
    foreach($TableProdAll as $item) {
        if ($item['IDCAT'] == $idCat) {
            $prov = false;
        }
    }
    if($prov) {
        mysqli_query($ConnectDatabase, "DELETE FROM categories WHERE `categories`.`ID` = $idCat");
    }

    require_once('../../config/category.php');
?>

<table>
    <thead>
        <tr>
            <td class="number_cat">№</td>
            <td class="name_cat">Название категории</td>
            <td class="function_cat">Функции</td>
        </tr>
    </thead>
    <tbody id="tBody">
        <?php
            addListCatAdmin($CategoryTable);
        ?>
    </tbody>
</table>