<?php 
    require_once('../../config/connect.php');
    $idBrand = $_POST['idBrand'];
    $nameBrand = $_POST['nameBrand'];
    $textBrand = $_POST['textBrand'];

    mysqli_query($ConnectDatabase, "UPDATE `brands` SET `NAME` = '$nameBrand', `TEXT` = '$textBrand' WHERE `brands`.`ID` = $idBrand");

    $itemBrand = mysqli_query($ConnectDatabase, "SELECT * FROM `brands` WHERE `ID`='$idBrand'");    
    $itemBrand = mysqli_fetch_assoc($itemBrand);

    if (!empty($_FILES['imgBrand']['tmp_name'])) {
        $imgBrand = $_FILES['imgBrand'];
        unlink('../../'.$itemBrand['SRC']);
        $srcImgBrand = '';
    
        $typeFIle = substr($imgBrand['name'], strrpos($imgBrand['name'], '.') + 1);
    
        $prov = True;
        while ($prov) {
            $fileName = uniqid() . '.' . $typeFIle;
            $fileUrl = '../../img/brand/' . $fileName;
            $srcImgBrand = 'img/brand/' . $fileName;
    
            if (!file_exists($fileUrl)) {
                move_uploaded_file($imgBrand['tmp_name'], $fileUrl);
    
                $prov = False;
            }
        }
        mysqli_query($ConnectDatabase, "UPDATE `brands` SET `SRC` = '$srcImgBrand' WHERE `brands`.`ID` = $idBrand");
    }

    echo 'Бренд изменен';
?>