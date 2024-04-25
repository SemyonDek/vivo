function addProduct() {
  let form = document.getElementById("productForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      if (element.name.startsWith("checkbox")) {
        const { name, checked } = element;
        value = checked;
        return { name, value };
      } else {
        const { name, value } = element;

        return { name, value };
      }
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: black;";

  prov = true;

  data.forEach((element) => {
    if (
      element["value"] == "" &&
      (!element["name"].startsWith("file_photo_") ||
        element["name"].startsWith("file_photo_1")) &&
      !element["name"].startsWith("checkbox")
    ) {
      if (
        !element["name"].startsWith("file_photo_") &&
        !element["name"].startsWith("checkbox")
      ) {
        document.getElementById(element["name"]).style = style_input_red;
      }
      console.log(element["name"]);
      prov = false;
      if (element["name"].startsWith("file_photo_1"))
        alert("Добавьте изображение");
    } else {
      if (
        !element["name"].startsWith("file_photo_") &&
        !element["name"].startsWith("checkbox")
      ) {
        document.getElementById(element["name"]).style = style_input_gray;
      }
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/product/add.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);

    data.forEach((element) => {
      if (element["value"] !== "") {
        if (element["name"].startsWith("checkbox")) {
          document.getElementById(element["name"]).checked = false;
        } else {
          document.getElementById(element["name"]).value = "";
        }

        if (element["name"].startsWith("file_photo_")) {
          document.getElementById(element["name"].substr(5)).remove();
        }
      }
    });
    document.getElementById("file_photo").value = null;
  };
}

function delProd(id) {
  if (id !== "") {
    let formData = new FormData();
    formData.append("idProd", id);

    var url = "../functions/product/del.php";

    let xhr = new XMLHttpRequest();
    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      alert("Товар удален");
      document.getElementById("product-list-body").innerHTML =
        xhr.response.getElementById("product-list-body").innerHTML;
    };
  }
}

function updProd() {
  const form = document.getElementById("productForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return { name, value };
    });

  style_input_red = "border-color: red;";
  style_input_gray = "border-color: black;";

  prov = true;

  let elmentFilePhoto = Array();

  data.forEach((element) => {
    if (element["name"].startsWith("file_photo_")) {
      elmentFilePhoto.push(element);
    }
    if (
      element["value"] == "" &&
      !element["name"].startsWith("file_photo_") &&
      !element["name"].startsWith("checkbox")
    ) {
      document.getElementById(element["name"]).style = style_input_red;
      prov = false;
      if (element["name"].startsWith("file_photo_1"))
        alert("Добавьте изображение");
    } else {
      if (
        element["name"] !== "idprod" &&
        !element["name"].startsWith("checkbox")
      )
        document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  let fileCount = 0;
  for (let i = 1; i < 6; i++) {
    if (document.getElementById("photo_" + i) !== null) {
      fileCount++;
    }
  }

  if (fileCount == 0) {
    alert("Добавьте изображение");
    prov = false;
  }

  let FilesUpdDell = Array();
  for (let i = 0; i < 5; i++) {
    if (elmentFilePhoto[i]["value"] == "") {
      if (document.getElementById("photo_" + (i + 1)) == null) {
        FilesUpdDell.push(1);
      } else FilesUpdDell.push(0);
    } else FilesUpdDell.push(0);
  }

  if (!prov) return;

  let formData = new FormData(form);

  let i = 0;
  FilesUpdDell.forEach((element) => {
    i++;
    formData.append("FilesDell_" + i, element);
  });

  var url = "../functions/product/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
  };
}

document.getElementById("sortValue").addEventListener("change", function (e) {
  let url = document.URL;
  if (e.target.value !== "") {
    if (url.indexOf("?") > -1) {
      url = url + "&sort=" + e.target.value;
    } else {
      url = url + "?sort=" + e.target.value;
    }
  }
  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";
  xhr.open("GET", url);
  xhr.send();
  xhr.onload = () => {
    document.getElementById("product-list-body").innerHTML =
      xhr.response.getElementById("product-list-body").innerHTML;
  };
});

function addBasket(id) {
  let formData = new FormData();
  formData.append("idProd", id);
  var url = "functions/basket/add.php";
  let xhr = new XMLHttpRequest();
  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert(xhr.response);
  };
}
