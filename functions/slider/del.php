<?php 
    require_once('../../config/connect.php');

    $idSlider = $_POST['idSlider'];
    $itemSlider = mysqli_query($ConnectDatabase, "SELECT * FROM `sliders` WHERE `ID`='$idSlider'");    
    $itemSlider = mysqli_fetch_assoc($itemSlider);
    unlink('../../'.$itemSlider['SRC']);

    mysqli_query($ConnectDatabase, "DELETE FROM sliders WHERE `sliders`.`ID` = $idSlider");


    require_once('../../config/slider.php');
?>

<div id="img_slider">
    <?php 
        addSliderAdmUpd($SliderList);
    ?>
</div>