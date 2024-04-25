<?php 
    require_once('../../config/connect.php');
    
    $idComm = $_POST['idComm'];
    
    mysqli_query($ConnectDatabase, "DELETE FROM reviews WHERE `reviews`.`ID` = $idComm");
    
    
    require_once('../../config/reviews.php');
?>

<table>
    <thead>
        <tr>
            <td class="number_comm">№</td>
            <td class="name_prod">Товар</td>
            <td class="estimation">Оценка</td>
            <td class="name_user">Отправитель</td>
            <td class="comm">Содержание</td>
            <td class="data">Дата</td>
            <td class="function">Опубликовать</td>
        </tr>
    </thead>
    <tbody id="BodyCommTable">
        <?php 
            addListCommAdm($CommTable, $TableProdAll);
        ?>
    </tbody>
</table>