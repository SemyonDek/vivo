let slides_prod_day = document.getElementsByClassName('item-prod_day'),
    prevBtn_prod_day = document.getElementById('left_button-product_day'),
    nextBtn_prod_day = document.getElementById('right_button-product_day'),
    slideIndex_prod_day = 1;

showSlides_prod_day(slideIndex_prod_day);
    
function showSlides_prod_day (n) {

    if (n < 1) {
        slideIndex_prod_day = slides_prod_day.length;
    } else if (n > slides_prod_day.length) {
        slideIndex_prod_day = 1;
    }
    for (let i = 0; i < slides_prod_day.length; i++) {
        slides_prod_day[i].style.display = 'none';
    }
    slides_prod_day[slideIndex_prod_day - 1].style.display = 'block';

}

function plusSlides_prod_day (n) {
    showSlides_prod_day(slideIndex_prod_day += n);
}
prevBtn_prod_day.onclick = function () {
    plusSlides_prod_day(-1);
}
nextBtn_prod_day.onclick = function () {
    plusSlides_prod_day(1);
}