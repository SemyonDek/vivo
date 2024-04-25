<?php
    require_once('connect.php');

    $BrandTable = mysqli_query($ConnectDatabase, "SELECT * FROM `brands`");
    $BrandTable = mysqli_fetch_all($BrandTable, MYSQLI_ASSOC);
    
    function addListBrandAdm($BrandTable) {
        foreach ($BrandTable as $item) {
            ?>
                <div class="item_brand">
                    <a href="brand-card.php?idBrand=<?= $item['ID'] ?>">
                        <div class="img_brand" style="background-image: url('../<?= $item['SRC'] ?>');" ></div>
                    </a>
                    <a href="brand-card.php?idBrand=<?= $item['ID'] ?>">
                        <div class="text_brand">
                            <?= $item['NAME'] ?>
                        </div>
                    </a>
                </div>
            <?php
        }
    }

    function oprtionBrand($BrandTable, $idBrand = '') {
        foreach ($BrandTable as $item) {
            ?>
                <option value="<?= $item['ID'] ?>" <?php if($idBrand == $item['ID']) echo 'selected="selected"' ?> ><?= $item['NAME'] ?></option>
            <?php
        }
    }

    function addListBrandUser($BrandTable) {
        foreach ($BrandTable as $item) {
            ?>
                <div class="item_brand">
                    <a href="brand-card.php?idBrand=<?= $item['ID'] ?>">
                        <div class="img_brand" style="background-image: url('<?= $item['SRC'] ?>');" ></div>
                    </a>
                    <a href="brand-card.php?idBrand=<?= $item['ID'] ?>">
                        <div class="text_brand">
                            <?= $item['NAME'] ?>
                        </div>
                    </a>
                </div>
            <?php
        }
    }
?>