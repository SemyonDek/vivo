let leftBut = document.getElementById('left_button-sale_day'),
    rightBut = document.getElementById('right_button-sale_day'),
    slider = document.getElementById('product_sales-slider'),
    valueStr = document.getElementById('colstr').value,
    slideProdSaleIndex = 1;

function swipeProdSale(n) {
    if (n == 1) {
        if (slideProdSaleIndex < valueStr) {
            slider.style.left = '-' + slideProdSaleIndex * 100 + '%';
            slideProdSaleIndex += 1;
        }
    } else if (n == -1) {
        if (slideProdSaleIndex > 1) {
            slideProdSaleIndex -= 1;
            slider.style.left = '-' + (slideProdSaleIndex - 1) * 100 + '%';
        }
    }
}

leftBut.onclick = function () {
    swipeProdSale(-1);
}
rightBut.onclick = function () {
    swipeProdSale(1);
}