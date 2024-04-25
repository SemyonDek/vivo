<?php 
    require_once('connect.php');
        
    $SliderList = mysqli_query($ConnectDatabase, "SELECT * FROM `sliders`");
    $SliderList = mysqli_fetch_all($SliderList, MYSQLI_ASSOC);

    function addSliderAdmUpd($SliderList) {
        foreach ($SliderList as $item) {
            ?>
                <img src="../<?= $item['SRC'] ?>" alt="" class="img-slider-img">
                <input type="button" value="Удалить" onclick="delSlider(<?= $item['ID'] ?>)" >
            <?php 
        }
    }
    function addSliderAdmIndex($SliderList) {
        foreach ($SliderList as $item) {
            ?>
                <img src="../<?= $item['SRC'] ?>" alt="" class="img-slider-img">
            <?php 
        }
    }
    function addSliderIndex($SliderList) {
        foreach ($SliderList as $item) {
            ?>
                <img src="<?= $item['SRC'] ?>" alt="" class="img-slider-img">
            <?php 
        }
    }
?>