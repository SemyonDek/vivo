function minusQuantity(id) {
    var quantity = document.getElementById('quantityInput_' + id);
    if (quantity.value > 1) {
        quantity.value = Number(quantity.value) - 1;
        let formData = new FormData();
        formData.append('id', id);
        formData.append('value', -1);
        var url = 'functions/basket/upd.php';
        let xhr = new XMLHttpRequest();   
        xhr.responseType = 'document';  
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            document.getElementById('BasketTable').innerHTML = xhr.response.getElementById('BasketTable').innerHTML;
            document.getElementById('ammountBasket').innerHTML = xhr.response.getElementById('ammountBasket').innerHTML;
            document.getElementById('FullammountBasket').innerHTML = xhr.response.getElementById('FullammountBasket').innerHTML;
            document.getElementById('saleammountBasket').innerHTML = xhr.response.getElementById('saleammountBasket').innerHTML;
        } 
    } 
}
function plusQuantity(id) {
    var quantity = document.getElementById('quantityInput_' + id);
    if (quantity.value < 98) {
        quantity.value = Number(quantity.value) + 1;
        let formData = new FormData();
        formData.append('id', id);
        formData.append('value', +1);
        var url = 'functions/basket/upd.php';
        let xhr = new XMLHttpRequest();   
        xhr.responseType = 'document';  
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            document.getElementById('BasketTable').innerHTML = xhr.response.getElementById('BasketTable').innerHTML;
            document.getElementById('ammountBasket').innerHTML = xhr.response.getElementById('ammountBasket').innerHTML;
            document.getElementById('FullammountBasket').innerHTML = xhr.response.getElementById('FullammountBasket').innerHTML;
            document.getElementById('saleammountBasket').innerHTML = xhr.response.getElementById('saleammountBasket').innerHTML;
        } 
    }
}

switching_order.onclick = function() {
    window.location.href = "order.php";
}

function delBasketItem(id) {
    let formData = new FormData();
    formData.append('id', id);
    var url = 'functions/basket/del.php';
    let xhr = new XMLHttpRequest();   
    xhr.responseType = 'document';  
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('BasketTable').innerHTML = xhr.response.getElementById('BasketTable').innerHTML;
        document.getElementById('ammountBasket').innerHTML = xhr.response.getElementById('ammountBasket').innerHTML;
        document.getElementById('FullammountBasket').innerHTML = xhr.response.getElementById('FullammountBasket').innerHTML;
        document.getElementById('saleammountBasket').innerHTML = xhr.response.getElementById('saleammountBasket').innerHTML;
    } 
}