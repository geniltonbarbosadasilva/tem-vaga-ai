<?php

class Utils
{
    public static function redirect_to($url, array $parameters = [])
    {
        $query = http_build_query($parameters);
        header('Location: ' . $url . "?$query");
        exit();
    }
}
