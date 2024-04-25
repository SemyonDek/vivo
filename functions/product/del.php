<?php 
    require_once('../../config/connect.php');
    
    $idProd = $_POST['idProd'];

    mysqli_query($ConnectDatabase, "DELETE FROM products WHERE `products`.`ID` = $idProd");

    $Photos = mysqli_query($ConnectDatabase, "SELECT * FROM `photosProd` WHERE `IDPROD`='$idProd'");    
    $Photos = mysqli_fetch_all($Photos, MYSQLI_ASSOC);
    
    $length = count($Photos);
    for ($i=0; $i < $length; $i++) { 
        unlink('../../'.$Photos[$i]['SRC']);
    }

    mysqli_query($ConnectDatabase, "DELETE FROM photosProd WHERE `photosProd`.`IDPROD` = $idProd");
    mysqli_query($ConnectDatabase, "DELETE FROM productsDay WHERE `productsDay`.`IDPROD` = $idProd");
    mysqli_query($ConnectDatabase, "DELETE FROM productsSale WHERE `productsSale`.`IDPROD` = $idProd");

    require_once('../../config/products.php');

?>

<div id="product-list-body" class="product-list-body">
    <?php 
        addListProdAdm($ProductTable, $PhotosProdList);
    ?>

</div>