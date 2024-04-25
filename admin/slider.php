<?php
require_once('../config/slider.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/slider.css">
</head>

<body>
    <?php
    require_once('header.php');
    ?>
    <div id="slider-body">
        <div class="layout">
            <h1 class="title_prod">Слайдер</h1>
            <form id="formImg" action="">
                <input type="file" name="imgSlider" id="imgSlider">
            </form>
            <input type="button" value="Добавить" onclick="addSlider()">
            <div id="img_slider">
                <?php
                addSliderAdmUpd($SliderList);
                ?>
            </div>
        </div>
    </div>
    <script>
        function addSlider() {
            let form = document.getElementById('formImg');
            let img = document.getElementById('imgSlider');
            if (img.value == '') {
                alert('Добавьте фотографию')
            } else {
                let formData = new FormData(form);

                var url = '../functions/slider/add.php';

                let xhr = new XMLHttpRequest();
                xhr.responseType = 'document';

                xhr.open('POST', url);
                xhr.send(formData);
                xhr.onload = () => {
                    alert('Слайдер добавлен');
                    document.getElementById('img_slider').innerHTML = xhr.response.getElementById('img_slider').innerHTML;
                    document.getElementById('imgSlider').value = null;
                }
            }
        }

        function delSlider(id) {
            let formData = new FormData();
            formData.append('idSlider', id);

            var url = '../functions/slider/del.php';

            let xhr = new XMLHttpRequest();
            xhr.responseType = 'document';

            xhr.open('POST', url);
            xhr.send(formData);
            xhr.onload = () => {
                alert('Слайдер удален');
                document.getElementById('img_slider').innerHTML = xhr.response.getElementById('img_slider').innerHTML;
                document.getElementById('imgSlider').value = null;
            }
        }
    </script>
</body>

</html>