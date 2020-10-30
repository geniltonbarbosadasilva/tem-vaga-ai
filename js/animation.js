function info() {
  alert("Devido ao COVID19 verifique se o local da sua viagem esta em zona crítica de risco antes de viajar. "
    + "Caso precise cancelar sua reserva, estamos com taxa 0 durante a pandemia");
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

if(document.getElementById("slider")){
  clearBlankSpace("slider");
}
