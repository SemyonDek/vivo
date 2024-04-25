<?php 
    require_once('../../config/connect.php');
    $nameBrand = $_POST['nameBrand'];
    $textBrand = $_POST['textBrand'];
    $imgBrand = $_FILES['imgBrand'];
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

    mysqli_query($ConnectDatabase, "INSERT INTO `brands` (`ID`, `NAME`, `TEXT`, `SRC`) VALUES (NULL, '$nameBrand', '$textBrand', '$srcImgBrand')");

    echo 'Бренд добавлен';
?>