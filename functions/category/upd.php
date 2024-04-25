<?php 
    require_once('../../config/connect.php');
    $idCat = $_POST['idCat'];
    $nameCat = $_POST['nameCat'];
    mysqli_query($ConnectDatabase, "UPDATE `categories` SET `NAME` = '$nameCat' WHERE `categories`.`ID` = $idCat");

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