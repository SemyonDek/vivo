<?php 
    require_once('../../config/connect.php');

    $imgSlider = $_FILES['imgSlider'];
    $srcImgSlider = '';

    $typeFIle = substr($imgSlider['name'], strrpos($imgSlider['name'], '.') + 1);

    $prov = True;
    while ($prov) {
        $fileName = uniqid() . '.' . $typeFIle;
        $fileUrl = '../../img/slider/' . $fileName;
        $srcImgSlider = 'img/slider/' . $fileName;

        if (!file_exists($fileUrl)) {
            move_uploaded_file($imgSlider['tmp_name'], $fileUrl);

            $prov = False;
        }
    }

    mysqli_query($ConnectDatabase, "INSERT INTO `sliders` (`ID`, `SRC`) VALUES (NULL, '$srcImgSlider')");


    require_once('../../config/slider.php');
?>

<div id="img_slider">
    <?php 
        addSliderAdmUpd($SliderList);
    ?>
</div>