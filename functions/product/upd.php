<?php 
    require_once('../../config/connect.php');
    
    $idProd = $_POST['idProd'];
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

    $Photos = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd` WHERE `IDPROD`='$idProd'");    
    $Photos = mysqli_fetch_all($Photos, MYSQLI_ASSOC);  
    
    mysqli_query($ConnectDatabase, "UPDATE `products` SET 
    `NAME` = '$nameProd', `CODE` = '$codeProd', `IDCAT` = '$catidProd', `PRICE` = '$priceProd', `SALE` = '$saleProd', 
    `IDBRAND` = '$brandidProd', `SERIES` = '$seriesProd', `COUNTRY` = '$countryProd', `WARRANTY` = '$warrProd', `MIRROR` = '$glassProd', 
    `XSIZE` = '$xsizeProd', `YSIZE` = '$ysizeProd', `ZSIZE` = '$zsizeProd', `COLOR` = '$colorProd', `LIGHT` = '$checkboxLightProd'
    WHERE `products`.`ID` = '$idProd'");

    if (isset($_POST['checkboxDayProd'])) {
        mysqli_query($ConnectDatabase, "INSERT INTO `productsDay` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    } else {
        mysqli_query($ConnectDatabase, "DELETE FROM productsDay WHERE `productsDay`.`IDPROD` = $idProd");
    }
    if (isset($_POST['checkboxMaxSaleProd'])) {
        mysqli_query($ConnectDatabase, "INSERT INTO `productsSale` (`ID`, `IDPROD`) VALUES (NULL, '$idProd')");
    } else {
        mysqli_query($ConnectDatabase, "DELETE FROM productsSale WHERE `productsSale`.`IDPROD` = $idProd");
    }
    
    $length = count($Photos);
    for ($i=0; $i < 5; $i++) {
        if ($i < $length) {
            if ($_FILES['file_photo_'.$i+1]['name'] == '') {
                if ($_POST['FilesDell_'.$i+1] == 1) {

                    $idPhoto = $Photos[$i]['ID'];
                    unlink('../../'.$Photos[$i]['SRC']);
                    mysqli_query($ConnectDatabase, "DELETE FROM photosProd WHERE `photosProd`.`ID` = $idPhoto");
                    
                }
            } else {
                
                $typeFIle = substr($_FILES['file_photo_'.$i+1]['name'], strrpos($_FILES['file_photo_'.$i+1]['name'], '.') + 1);
                $urlNewFile = substr($Photos[$i]['SRC'], 0, strrpos($Photos[$i]['SRC'], '.'));
                $urlNewFile = $urlNewFile.'.'.$typeFIle;
                unlink('../../'.$Photos[$i]['SRC']);
                move_uploaded_file($_FILES['file_photo_'.$i+1]['tmp_name'], '../../'.$urlNewFile);
                $idPhoto = $Photos[$i]['ID'];
                mysqli_query($ConnectDatabase, "UPDATE `photosProd` SET `SRC` = '$urlNewFile' WHERE `photosProd`.`ID` = '$idPhoto'");
                
            } 

        } else if ($_FILES['file_photo_'.$i+1]['name'] !== '') {

            $typeFIle = substr($_FILES['file_photo_'.$i+1]['name'], strrpos($_FILES['file_photo_'.$i+1]['name'], '.') + 1);

            $prov = True;
            while ($prov) {
                $fileName = uniqid() . '.' . $typeFIle;
                $fileUrl = '../../img/product/' . $fileName;
                $fileUrlDataBase = 'img/product/' . $fileName;

                if (!file_exists($fileUrl)) {
                    move_uploaded_file($_FILES['file_photo_'.$i+1]['tmp_name'], $fileUrl);

                    mysqli_query($ConnectDatabase, "INSERT INTO `photosProd` (`ID`, `IDPROD`, `SRC`) 
                    VALUES (NULL, '$idProd', '$fileUrlDataBase')");

                    $prov = False;
                }
            }

        } 
    }

    echo 'Товар изменен';
 
?>