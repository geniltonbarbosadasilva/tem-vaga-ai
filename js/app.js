//  Esse arquivo era utilizado anteriormente para carregar a página de resultados,
//  Depois que essa função passou a ser feita em php, ele deixou de ser usado.

function makeCard( { id, img_urls, title, price, description } ) {
    return `<div id="${id}" class="item transition">
        <div class="card">
            <img src="${img_urls[0]}">
            <h1 class="dark-text">${title}</h1>
            <p class="green-text">${price}</p>
            <p class="card-text transition">${description}</p>
        </div>
    </div>`;
}

function buildPage(data) {
    html = data.reduce( (accumulator, imovel) => { 
        accumulator += makeCard(imovel);
        return accumulator;
    }, "");

    document.getElementById("content-grid").innerHTML = html;

    for (const item of document.getElementsByClassName("item")) {
        item.addEventListener("click", redirect);
    }    
}

function loadContent() {
    if(window.location.href.search("one-result") != -1){ 
        oneResultLoader(window.location.search);
    }else if (document.getElementById("content-grid") != undefined) {
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

function buildOneResult(data) {
    document.getElementById("title").appendChild(document.createTextNode(data.title));
    document.getElementById("price").appendChild(document.createTextNode(data.price));
    document.getElementById("desc").appendChild(document.createTextNode(data.description));
    document.getElementById("address").appendChild(document.createTextNode(data.address));

    document.getElementById("slide-1").setAttribute("src", data.img_urls[0]);
    document.getElementById("slide-2").setAttribute("src", data.img_urls[1]);
    document.getElementById("slide-3").setAttribute("src", data.img_urls[2]);
}

function oneResultLoader(path) {
    if(path == ""){
        path = "1";
    }
    let id = path.replace("?", "");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            buildOneResult(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", `https://my-json-server.typicode.com/genilton2528/fakeapi/imoveis/${id}`, true);
    xhttp.send();
}

function redirect(element) {
    window.location.href = "one-result.php?id=" + element.id; 
}

function openLink(link) {
    window.location.href = link;
}

function openModal() {
    document.getElementById("id-modal").style.display="block";
}

function openUserModal() {
    document.getElementById("name-user-modal").innerText = localStorage.name_user;
    document.getElementById("id-user-modal").style.display="block";
}

function closeModal() {
    document.getElementById("id-user-modal").style.display="none";
}

// window.onload = function () { loadContent() }

const loginBtn = document.getElementById("login-btn");
loginBtn.addEventListener( "click", openModal);


if ( localStorage.id_user ) {
    loginBtn.innerText = "Conta";
    loginBtn.removeEventListener( "click", openModal);
    loginBtn.addEventListener( "click", openUserModal);
}