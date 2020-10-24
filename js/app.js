window.onload = function () { loadContent() }

/* 
    <div class="item">
        <div class="card">
            <img src="https://www.vaipradisney.com/blog/wp-content/uploads/2017/04/ALUGUEL-CASA-26.jpg" class="painel">
            <h1>Teste</h1>
            <p>Preço</p>
            <p class="card-text">Descrição</p>
        </div>
    </div> 
*/


function buildPage(data) {
    for (key in data) {
        let item = document.createElement("div");
        let card = document.createElement("div");
        let img = document.createElement("img");
        let h1 = document.createElement("h1");
        let price = document.createElement("p");
        let desc = document.createElement("p");

        item.setAttribute("class", "item");
        item.setAttribute("id", data[key].id);
        card.setAttribute("class", "card");
        desc.setAttribute("class", "card-text");
        img.setAttribute("src", data[key].img_urls[0]);
        h1.appendChild(document.createTextNode(data[key].title));
        price.appendChild(document.createTextNode(data[key].price));
        desc.appendChild(document.createTextNode(data[key].description));

        card.appendChild(img);
        card.appendChild(h1);
        card.appendChild(price);
        card.appendChild(desc);
        item.appendChild(card);
        item.addEventListener("click", redirect);
        document.getElementById("content-grid").appendChild(item);
    }
}

function buildOnePage(data) {
    alert(data);
}

function loadContent() {
    if (document.getElementById("content-grid") != undefined) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                buildPage(JSON.parse(this.responseText));
            }
        };
        xhttp.open("GET", "https://my-json-server.typicode.com/genilton2528/fakeapi/imoveis/", true);
        xhttp.send();
    }
}

function redirect() {
    window.opener.location = "one-result.html" + this.id;    
}

function login() {
    setTimeout(function () { 
        console.log("Login");
    }, 2000);
}

function openLink(link){
    window.open(link);
}