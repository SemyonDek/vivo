function infoOrder(id) {
    let formData = new FormData();

    formData.append('idOrder', id);

    var url = '../functions/order/info.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('info_block').innerHTML = xhr.response.getElementById('info_block').innerHTML;
    } 
}

function infoOrderUser(id) {
    let formData = new FormData();

    formData.append('idOrder', id);

    var url = 'functions/order/info.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('info_block').innerHTML = xhr.response.getElementById('info_block').innerHTML;
    } 
}

function updOrder(id) {
    let formData = new FormData();

    formData.append('idOrder', id);

    var url = '../functions/order/upd.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('BodyOrdersTable').innerHTML = xhr.response.getElementById('BodyOrdersTable').innerHTML;
    } 
}

function delOrder(id) {
    let formData = new FormData();

    formData.append('idOrder', id);

    var url = '../functions/order/del.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('BodyOrdersTable').innerHTML = xhr.response.getElementById('BodyOrdersTable').innerHTML;
    } 
}

function buyOneClick() {
    let number = document.getElementById('numberOneClick').value;
    
    if (number == '') {
        alert('Введите номер');
    } else {
        let formData = new FormData();
        formData.append('number', number);

        var url = 'functions/order/onclick.php';
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            console.log(xhr.response);
            window.location.replace("index.php");
        } 
    }

    
}

buttonOrder.onclick = function() {
    const form = document.getElementById('orderForm');
    const { elements } = form;
    const data = Array.from(elements)
        .filter((item) => !!item.name)
        .map((element) => {
        if (element.id.startsWith('radio_')) {
            const { id, checked } = element
            value = checked
            name = id
            return { name, value }
        } else {
            const { name, value } = element
    
            return { name, value }
        }
    })
    
    style_input_red = 'border-color: red;';
    style_input_gray = 'border-color: black;';
    prov = true;
    data.forEach(element => {
        if (element['value'] == '' && (!element['name'].startsWith('commClient')) && (!element['name'].startsWith('radio_'))) {
            document.getElementById(element['name']).style = style_input_red;
            prov = false;
        } else {
            if (!element['name'].startsWith('radio_'))
                document.getElementById(element['name']).style = style_input_gray;
        }
    });
    if (!prov) return;

    let formData = new FormData(form);
    data.forEach(element => {
        if (element['name'].startsWith('radio_')) {
            formData.append(element['name'], element['value ']);
        }
    });
    var url = 'functions/order/add.php';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        alert(xhr.response);
        window.location.replace("index.php");
    } 
}

