<?php

function redirect_to($url, $message = "")
{
    header('Location: ' . $url . "?message=$message");

    exit();
}
