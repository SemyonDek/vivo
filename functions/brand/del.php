<?php 
    require_once('../../config/connect.php');
    $idBrand = $_POST['idBrand'];

    $TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");    
    $TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

    $prov = true;
    foreach($TableProdAll as $item) {
        if ($item['IDBRAND'] == $idBrand) {
            $prov = false;
        }
    }
    if($prov) {
        
        $itemBrand = mysqli_query($ConnectDatabase, "SELECT * FROM `brands` WHERE `ID`='$idBrand'");    
        $itemBrand = mysqli_fetch_assoc($itemBrand);
        unlink('../../'.$itemBrand['SRC']);
    
        mysqli_query($ConnectDatabase, "DELETE FROM brands WHERE `brands`.`ID` = $idBrand");
        echo 'Бренд удален';
    }

?>