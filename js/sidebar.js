function sidebar_open() {
    document.querySelector("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}

function sidebar_close() {
    document.querySelector("main").style.marginLeft = "5%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}

sidebar_open();

var urlParams = new URLSearchParams(window.location.search);

switch (urlParams.get('table')) {
    case "user":
        document.getElementById("user").classList.add("negative");
        break;
    case "property":
        document.getElementById("property").classList.add("negative");
        break;
    case "rent":
        document.getElementById("rent").classList.add("negative");
        break;
    case "token":
        document.getElementById("token").classList.add("negative");
        break;
    default:
        document.getElementById("user").classList.add("negative");
        break;
}
