function addCom() {
    let comm = document.getElementById('commText');
    let estimation = document.getElementById('estimationComm');
    let idProd = document.getElementById('prodIdComm');

    if (comm.value == '') {
        alert('Введите отзыв');
    } else {
        let formData = new FormData();
        formData.append('commText', comm.value);
        formData.append('estimation', estimation.value);
        formData.append('idprod', idProd.value);
        
        var url = 'functions/review/add.php';
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.send(formData);
        xhr.onload = () => {
            alert(xhr.response);
        } 
    }
}

function delComm(id) {
    let formData = new FormData();
    formData.append('idComm', id);
    
    var url = '../functions/review/del.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('BodyCommTable').innerHTML = xhr.response.getElementById('BodyCommTable').innerHTML;
    } 
}

function updComm(id) {
    let formData = new FormData();
    formData.append('idComm', id);
    
    var url = '../functions/review/upd.php';
    let xhr = new XMLHttpRequest();
    xhr.responseType = 'document';
    xhr.open('POST', url);
    xhr.send(formData);
    xhr.onload = () => {
        document.getElementById('BodyCommTable').innerHTML = xhr.response.getElementById('BodyCommTable').innerHTML;
    } 
}