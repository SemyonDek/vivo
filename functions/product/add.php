<?php 
    require_once('../../config/connect.php');

    
    $nameProd = $_POST['nameProd'];
    $codeProd = $_POST['codeProd'];
    $catidProd = $_POST['catidProd'];
    $priceProd = $_POST['priceProd'];
    $saleProd = $_POST['saleProd'];

    $brandidProd = $_POST['brandidProd'];
    $seriesProd = $_POST['seriesProd'];
    $countryProd = $_POST['countryProd'];
    $warrProd = $_POST['warrProd'];
    $glassProd = $_POST['glassProd'];

    $xsizeProd = $_POST['xsizeProd'];
    $ysizeProd = $_POST['ysizeProd'];
    $zsizeProd = $_POST['zsizeProd'];
    $colorProd = $_POST['colorProd'];
    
    if (isset($_POST['checkboxLightProd'])) {
        $checkboxLightProd = 1;
    } else {
        $checkboxLightProd = 0;
    }

    mysqli_query($ConnectDatabase, "INSERT INTO `products` 
    (`ID`, `NAME`, `CODE`, `IDCAT`, `PRICE`, `SALE`, `IDBRAND`, `SERIES`, 
    `COUNTRY`, `WARRANTY`, `MIRROR`, 
    `XSIZE`, `YSIZE`, `ZSIZE`, `COLOR`, `LIGHT`) VALUES 
    (NULL, '$nameProd', '$codeProd', '$catidProd', '$priceProd', '$saleProd', '$brandidProd', '$seriesProd', 
    '$countryProd', '$warrProd', '$glassProd', 
    '$xsizeProd', '$ysizeProd', '$zsizeProd', '$colorProd', '$checkboxLightProd')");

    $idProd = mysqli_query($ConnectDatabase, "SELECT MAX(id) FROM `products`"); 
    $idProd = mysqli_fetch_all($idProd);
    $idProd = $idProd[0][0];

    if (isset($_POST['checkboxDayProd'])) {
        mysqli_query($ConnectDatabase, "INSERT INTO `productsDay` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    }
    if (isset($_POST['checkboxMaxSaleProd'])) {
        mysqli_query($ConnectDatabase, "INSERT INTO `productsSale` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    }

    foreach ($_FILES as $key => $item) {
        if ($item['name'] !== '') {
            $typeFIle = substr($item['name'], strrpos($item['name'], '.') + 1);

            $prov = True;
            while ($prov) {
                $fileName = uniqid() . '.' . $typeFIle;
                $fileUrl = '../../img/product/' . $fileName;
                $fileUrlDataBase = 'img/product/' . $fileName;

                if (!file_exists($fileUrl)) {
                    move_uploaded_file($item['tmp_name'], $fileUrl);

                    mysqli_query($ConnectDatabase, "INSERT INTO `photosProd` (`ID`, `IDPROD`, `SRC`) 
                    VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                    $prov = False;
                }
            }
        }
    }

    echo 'Товар добавлен';
    
?>