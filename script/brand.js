function addBrand() {
    let form = document.getElementById('updBrandForm');    
    
    const { elements } = form;
    
    const data = Array.from(elements)
        .filter((item) => !!item.name)
        .map((element) => {
        const { name, value } = element

        return { name, value }
    })
        
    style_input_red = 'border-color: red;';
    style_input_gray = 'border-color: black;';
    
    prov = true;
    
    data.forEach(element => {
        if (element['value'] == '') {
            if (!element['name'].startsWith('imgBrand')) {
                document.getElementById(element['name']).style = style_input_red;
            }
            prov = false;
            if (element['name'].startsWith('imgBrand')) alert('Добавьте изображение');
        } else {
            if (!element['name'].startsWith('imgBrand')) {
                document.getElementById(element['name']).style = style_input_gray;
            }
        }
    });

    if (!prov) return;
    
    let formData = new FormData(form);
    
    var url = '../functions/brand/add.php';

    let xhr = new XMLHttpRequest();    
    
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        alert(xhr.response);

        data.forEach(element => {
            if (element['value'] !== '') {
                document.getElementById(element['name']).value = null;
            }
        });
        document.getElementById('imgBrand').value = null;
    } 
}

function delBrand() {
    let idBrand = document.getElementById('idBrand').value;

    if (idBrand !== '') {
        let formData = new FormData();
        formData.append('idBrand', idBrand);
        
        var url = '../functions/brand/del.php';

        let xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            alert(xhr.response);
            window.location.href = "../admin/brand.php";
        } 
    } else {
        alert('Не удалось удалить бренд');
    }
}

function updBrtand() {
    let form = document.getElementById('updBrandForm');    
    
    const { elements } = form;
    
    const data = Array.from(elements)
        .filter((item) => !!item.name)
        .map((element) => {
        const { name, value } = element

        return { name, value }
    })
        
    style_input_red = 'border-color: red;';
    style_input_gray = 'border-color: black;';
    
    prov = true;
    
    data.forEach(element => {
        if (element['value'] == '') {
            if (!element['name'].startsWith('imgBrand')) {
                document.getElementById(element['name']).style = style_input_red;
                prov = false;
            }
        } else {
            if (!element['name'].startsWith('imgBrand')) {
                document.getElementById(element['name']).style = style_input_gray;
            }
        }
    });

    if (!prov) return;
    
    let formData = new FormData(form);
    
    var url = '../functions/brand/upd.php';

    let xhr = new XMLHttpRequest();    
    
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        alert(xhr.response);
    } 
}