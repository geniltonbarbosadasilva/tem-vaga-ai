var slideIndex = 0;
var retreat = 0;

dotsUpdate();

function right() {
    if ( slideIndex == 2 ) {
        slideIndex = 0;
        retreat = 0;
    } else {
        slideIndex += 1;
        retreat -= 100;            
    }
    document.getElementById("slide-1").style.marginLeft = `${retreat}%`;
    dotsUpdate();
}

function left() {
    if (slideIndex == 0) {
        slideIndex = 2;
        retreat = -200;
    }else{
        slideIndex -= 1;
        retreat += 100;    
    }
    document.getElementById("slide-1").style.marginLeft = `${retreat}%`;
    dotsUpdate();
}

function dotsUpdate() {
    var dots = document.getElementsByClassName("demo");    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" slide-white", "");
    }    
    dots[slideIndex].className += " slide-white";
}

function currentDiv(idex) {
    slideIndex = idex;
    retreat = idex * -100;
    document.getElementById("slide-1").style.marginLeft = `${retreat}%`;
    dotsUpdate();
}