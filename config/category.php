<?php 
    require_once('connect.php');
        
    $CategoryTable = mysqli_query($ConnectDatabase, "SELECT * FROM `categories`");
    $CategoryTable = mysqli_fetch_all($CategoryTable, MYSQLI_ASSOC);

    function addListCatAdmin($CategoryTable) {
        foreach ($CategoryTable as $key => $item) {
            ?>
                <tr>
                    <td class="number_cat"><?= $key + 1 ?></td>
                    <td id="name_cat_<?= $item['ID']?>" class="name_cat"><?= $item['NAME']?></td>
                    <td class="function_cat">
                        <div class="function_body">
                            <span class="upd" onclick="updCatButton(<?= $item['ID']?>)"><a href="#upd_block">↻</a></span>
                            <span class="del" onclick="delCatButton(<?= $item['ID']?>)">✗</span>
                        </div>
                    </td>
                </tr>
            <?php 
        }
    }

    function catListCatalog($CategoryTable, $idCat) {
        $class = '';
        foreach ($CategoryTable as $item) {
            if ($idCat == $item['ID']) {
                $class = 'active';
            } else {
                $class = '';
            }
            ?>
                <a href="catalog.php?idCat=<?= $item['ID'] ?>" class="<?= $class ?>"><?= $item['NAME'] ?></a>
            <?php
        }
    }

    function oprtionCategory($CategoryTable, $idCat = '') {
        foreach ($CategoryTable as $item) {
            ?>
                <option value="<?= $item['ID'] ?>" <?php if($idCat == $item['ID']) echo 'selected="selected"' ?>><?= $item['NAME'] ?></option>
            <?php
        }
    }
?>