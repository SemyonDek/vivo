<?php 
    require_once('config/category.php');
    require_once('config/products.php');
    require_once('config/reviews.php');
    $idProd = $_GET['idProd'];
    $itemProd = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE `ID`='$idProd'");    
    $itemProd = mysqli_fetch_assoc($itemProd);
    $idCat = $itemProd['IDCAT'];
    $itemCat = mysqli_query($ConnectDatabase, "SELECT * FROM `categories` WHERE `ID`='$idCat'");    
    $itemCat = mysqli_fetch_assoc($itemCat);
    $PhotosProd = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd` WHERE `IDPROD`='$idProd'");    
    $PhotosProd = mysqli_fetch_all($PhotosProd, MYSQLI_ASSOC);
    $idBrand = $itemProd['IDBRAND'];
    $itemBrand = mysqli_query($ConnectDatabase, "SELECT * FROM `brands` WHERE `ID`='$idBrand'");    
    $itemBrand = mysqli_fetch_assoc($itemBrand);
    $priceProd = $itemProd['PRICE'] - ($itemProd['PRICE'] * ($itemProd['SALE'] / 100));

    $CommList = mysqli_query($ConnectDatabase, "SELECT * FROM `reviews` WHERE `IDPROD`='$idProd'");    
    $CommList = mysqli_fetch_all($CommList, MYSQLI_ASSOC);

    $sum = 0;
    $i = 0;
    foreach ($CommList as $item) {
        if ($item['PUBLICATION'] == 1) {
            $sum += $item['ESTIMATION'];
            $i++;
        }
    }
    if ($i !== 0) $sum = $sum / $i;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $itemProd['NAME'] ?></title>
    <link rel="stylesheet" href="css/product-card.css">
</head>
<body>

<?php 
    require_once('header.php');
?>

<div id="product_body">
    <div class="layout">
        <div id="crumbs">
            <a href="index.php">Главная / </a>
            <a href="catalog.php">Каталог / </a>
            <a href="catalog.php?idCat=<?= $itemCat['ID'] ?>"><?= $itemCat['NAME'] ?> / </a>
            <a href="product-card.php?idProd=<?= $idProd ?>"><?= $itemProd['NAME'] ?></a>
        </div>
        <div class="left-block">
            <div class="row-body">
                <div class="photo-block">
                    <div class="main-photo">
                        <img id="main-photo-block" src="<?= $PhotosProd[0]['SRC'] ?>" alt="">
                    </div>
                    <div class="list-photo">
                        <?php 
                            foreach($PhotosProd as $key => $item) {
                                ?>
                                    <img id="photo-prod_<?= $key + 1 ?>" onclick="swipePhotos(<?= $key + 1 ?>)" 
                                    class="<?php 
                                        if ($key == 0) echo 'active-photo';
                                    ?>" src="<?= $item['SRC'] ?>" alt="">
                                <?php
                            }
                        ?>
                    </div>    
                </div>
                <div class="main-info-block">
                    <div class="name-prod">
                        <?= $itemProd['NAME'] ?>
                    </div>
                    <ul class="parametrs-prod">
                        <li>
                            <span>Код товара:</span>
                            <span><?= $itemProd['CODE'] ?></span>
                        </li>
                        <li class="estimation-li">
                            <span>Оценка:</span>
                            <span id="estimation"><?= $sum.' '.str_repeat('★', (int)$sum).str_repeat('☆', 5 - (int)$sum)?></span>
                        </li>
                    </ul>
                    <div class="title-prod">
                        ХАРАКТЕРИСТИКИ
                    </div>
                    <ul class="parametrs-prod">
                        <li>
                            <span>Производитель:</span>
                            <span><?= $itemBrand['NAME'] ?></span>
                        </li>
                        <li>
                            <span>Серия:</span>
                            <span><?= $itemProd['SERIES'] ?></span>
                        </li>
                        <li>
                            <span>Страна:</span>
                            <span><?= $itemProd['COUNTRY'] ?></span>
                        </li>
                        <li>
                            <span>Гарантия:</span>
                            <span><?php 
                                if ($itemProd['WARRANTY'] == 1) echo 'Пол года';
                                elseif ($itemProd['WARRANTY'] == 2) echo '1 год';
                                elseif ($itemProd['WARRANTY'] == 3) echo '2 года';
                                elseif ($itemProd['WARRANTY'] == 4) echo '3 года';
                                elseif ($itemProd['WARRANTY'] == 5) echo '4 года';
                                elseif ($itemProd['WARRANTY'] == 6) echo '5 лет';
                            ?></span>
                        </li>
                        <li>
                            <span>Тип зеркала:</span>
                            <span><?= $itemProd['MIRROR'] ?></span>
                        </li>
                        <li>
                            <span>Ширина:</span>
                            <span><?= $itemProd['XSIZE'] ?> см</span>
                        </li>
                        <li>
                            <span>Высота:</span>
                            <span><?= $itemProd['YSIZE'] ?> см</span>
                        </li>
                        <li>
                            <span>Глубина:</span>
                            <span><?= $itemProd['ZSIZE'] ?> см</span>
                        </li>
                        <li>
                            <span>Цвет:</span>
                            <span><?= $itemProd['COLOR'] ?></span>
                        </li>
                        <li>
                            <span>Подстветка:</span>
                            <span><?php 
                                if ($itemProd['LIGHT']) echo 'Есть';
                                else echo 'Нет'
                            ?></span>
                        </li>
                    </ul>
                </div>
                <div class="reviews-block">
                    
                </div>
            </div>
        </div>
        <div class="right-block">
            <form action="">
                <div class="price-prod">
                    <span>
                        <?php 
                            echo number_format($priceProd, 0, '.', ' ').' ';
                            if ($itemProd['SALE'] !== '0') {
                                ?>
                                    <div class="sale-prod-amount"><?= $itemProd['SALE'] ?></div>
                                <?php
                            }
                        
                        ?> 
                        <button class="add-basket_item-prod" type="button" onclick="addBasket(<?= $idProd ?>)">
                            <div class="img_add-basket"></div>
                        </button>
                    </span> 
                </div>
            </form>
        </div>
        <div class="left-block">
            <?php 
                if (isset($_SESSION['accountId'])) {
                    ?>
                        <div class="name-prod">
                            Оставить отзыв 
                        </div>
                        <form id="comProd" action="">
                            <input type="hidden" name="prodIdComm" id="prodIdComm" value="<?= $idProd ?>">
                            <div class="estimation_comm">
                                <select name="estimationComm" id="estimationComm">
                                    <option value="1">1★</option>
                                    <option value="2">2★</option>
                                    <option value="3">3★</option>
                                    <option value="4">4★</option>
                                    <option value="5">5★</option>
                                </select>
                            </div>
                            <textarea name="commText" id="commText" rows="5" placeholder="Оставьте свой отзыв"></textarea>
                            <div class="button-line">
                                <input type="button" value="Оставить отзыв" onclick="addCom()">
                            </div>
                        </form>
                    <?php
                }
            ?>
            
            <div class="name-prod">
                Отзывы 
            </div>
            <div class="reviews-comm">
                <?php 
                    addListCommUser($CommList);
                ?>
            </div>
        </div>
        <div class="clear-both"></div>
    </div>
</div>

<?php 
    require_once('footer.php')
?>

<script>
    function swipePhotos(number) {
        let mainPhoto = document.getElementById('main-photo-block');
        let swipePhoto = document.getElementById('photo-prod_' + number);
        let oldPhoto = document.getElementsByClassName('active-photo')[0];
        oldPhoto.classList.remove('active-photo');
        swipePhoto.classList.add('active-photo');
        mainPhoto.src = swipePhoto.src;
    }
</script>
<script src="script/comm.js"></script>
<script src="script/product.js"></script>
    
    
</body>
</html>