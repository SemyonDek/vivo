<?php 
    require_once('../config/reviews.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/reviews.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="reviews_body">
    <div class="layout">
        <h1 class="title_prod">Отзывы</h1>
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
    </div>
</div>
</body>
<script src="../script/comm.js"></script>
</html>