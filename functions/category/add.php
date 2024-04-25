<?php 
    require_once('../../config/connect.php');
    $nameCat = $_POST['nameCat'];
    mysqli_query($ConnectDatabase, "INSERT INTO `categories` (`ID`, `NAME`) VALUES (NULL, '$nameCat')");

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