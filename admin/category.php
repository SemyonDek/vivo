<?php 
    require_once('../config/category.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/category.css">
</head>
<body>
<?php 
    require_once('header.php');
?>
<div id="upd_block">
    <a href="#close" class="overlay"></a>
    <div id="modal_main_body">
        <a href="#close" class="overlay"></a>
        <div id="modal_body">
            <a href="#close" title="Close" class="close">×</a>
            <div class="title_modal">Изменение категории</div>
            <div class="text_modal">
                Введите новое название категории
            </div>
            <input id="upd_nameCat" class="name_category" type="text" placeholder="Название">
            <br>
            <input class="add_button" type="button" value="Изменить" onclick="updCategory()">
            <input id="upd_numberCat" type="hidden" value="0">
        </div>
    </div>
</div>
<div id="category-body">
    <div class="layout">
        <h1 class="title_prod">Категории</h1>
        <input id="nameNewCat" type="text" class="name_category" placeholder="Название">
        <input type="button" value="Добавить" class="add_button" onclick='addCatButton()'>
        <br>
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
    </div>
</div>
<script src="../script/category.js"></script>
</body>
</html>