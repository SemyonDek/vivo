function updCatButton(id) {
    let updCatInput = document.getElementById('upd_nameCat'),
        nameCat = document.getElementById('name_cat_' + id),
        idCat = document.getElementById('upd_numberCat');
    updCatInput.value = nameCat.innerHTML;
    idCat.value = id;
}

function delCatButton(id) {
    let formData = new FormData();
    formData.append('idcat', id);
    
    var url = '../functions/category/del.php';2

    let xhr = new XMLHttpRequest();    
    xhr.responseType = 'document';

    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        // alert("Категория удалена");

        document.getElementById('tBody').innerHTML = xhr.response.getElementById('tBody').innerHTML;
    } 
}

function addCatButton() {
    let nameNewCat = document.getElementById('nameNewCat').value;

    if (nameNewCat !== '') {
        let formData = new FormData();
        formData.append('nameCat', nameNewCat);
        
        var url = '../functions/category/add.php';

        let xhr = new XMLHttpRequest();    
        xhr.responseType = 'document';

        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Категория добавлена");
            document.getElementById('nameNewCat').value = '';
            document.getElementById('tBody').innerHTML = xhr.response.getElementById('tBody').innerHTML;
        } 
    } else {
        alert('Введите название');
    }
}

function updCategory() {
    let nameCat = document.getElementById('upd_nameCat').value,
        idCat = document.getElementById('upd_numberCat').value;

    if (nameCat !== '') {
        let formData = new FormData();
        formData.append('idCat', idCat);
        formData.append('nameCat', nameCat);
        
        var url = '../functions/category/upd.php';

        let xhr = new XMLHttpRequest();    
        xhr.responseType = 'document';

        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Категория добавлена");
            document.getElementById('tBody').innerHTML = xhr.response.getElementById('tBody').innerHTML;
        } 
    } else {
        alert('Введите название');
    }
}