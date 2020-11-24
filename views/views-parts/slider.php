<?php 

function slider($imgs = [ "", "", ""])
{
    echo 
    '<div id="slider" class="slider-container">
    <img id="slide-1" class="mySlides" src="'. $imgs[0] .'">
    <img id="slide-2" class="mySlides" src="'. $imgs[1] .'">
    <img id="slide-3" class="mySlides" src="'. $imgs[2] .'">
    <div class="slide-center slide-container slide-section slide-large slide-text-white slide-display-bottommiddle"
        style="width:100%">
        <div class="slide-left slide-hover-text-khaki" onclick="left()">&#10094;</div>
        <div class="slide-right slide-hover-text-khaki" onclick="right()">&#10095;</div>
        <span class="slide-badge demo slide-border slide-transparent slide-hover-white"
            onclick="currentDiv(0)"></span>
        <span class="slide-badge demo slide-border slide-transparent slide-hover-white"
            onclick="currentDiv(1)"></span>
        <span class="slide-badge demo slide-border slide-transparent slide-hover-white"
            onclick="currentDiv(2)"></span>
    </div>
    </div>';
}

?>