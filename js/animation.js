function info() {
    alert("Devido ao COVID19 verifique se o local da sua viagem esta em zona crítica de risco antes de viajar. "
        + "Caso precise cancelar sua reserva, estamos com taxa 0 durante a pandemia");
}

function infoRent() {
    alert("Para criar um novo registro de aluguel, escolha uma propriedade na pagina de resultados e click em Fechar Negocio");
}

function scrollFunction() {
    if (document.documentElement.scrollTop > 100) {
        document.getElementById("logo").style.width = "150px";
    } else if (document.documentElement.scrollTop < 50) {
        document.getElementById("logo").style.width = "200px";
    }
}

function fillField(elem) {
    document.getElementById('search-local').value = elem.text;
}

function lightTheme() {
    var rootCss = document.querySelector(':root');
    rootCss.style.setProperty('--text-color-on-background', '#404040');
    rootCss.style.setProperty('--background-color', '#FFFFFF');
    rootCss.style.setProperty('--shadow-color', 'rgba( 0, 0, 0, .4)');
    rootCss.style.setProperty('--shadow-color-hover', 'rgba( 0, 0, 0, .8)');
}

function darkTheme() {
    var rootCss = document.querySelector(':root');
    rootCss.style.setProperty('--text-color-on-background', '#FFFFFF');
    rootCss.style.setProperty('--background-color', '#404040');
    rootCss.style.setProperty('--shadow-color', 'rgba( 191, 191, 191, .4)');
    rootCss.style.setProperty('--shadow-color-hover', 'rgba( 191, 191, 191, .8)');
}

function setTheme() {
    if (!localStorage.theme) {
        localStorage.theme = "lightTheme";
    }
    if (localStorage.theme == "lightTheme") {
        localStorage.theme = "darkTheme";
        darkTheme();
    } else {
        localStorage.theme = "lightTheme";
        lightTheme();
    }
}

// Remove espaços Brancos
function clearBlankSpace(id) {
    let html = "";
    let element = document.getElementById(id);
    let children = element.children;
    for (const child of children) {
        html += child.outerHTML;
    }
    element.innerHTML = html;
}

window.onscroll = function () { scrollFunction() };

if (document.getElementById("slider")) {
    clearBlankSpace("slider");
}

if ( localStorage.theme == "darkTheme" ) {
    darkTheme();
}
