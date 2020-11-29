<?php

function redirect_to($url, $message = "", $type = "")
{
    header('Location: ' . $url . "?message=$message&type=$type");
    exit();
}
