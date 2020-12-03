<?php

require_once("../autoload.php");

// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// return;

function getCSV($name)
{
    $file = fopen($name, "r");
    $result = array();
    $i = 0;
    while (!feof($file)) :
        if (substr(($result[$i] = fgets($file)), 0, 10) !== ';;;;;;;;') :
            $i++;
        endif;
    endwhile;
    fclose($file);
    return $result;
}

function getLine($array, $index)
{
    return explode(';', $array[$index]);
}

$foo = getCSV($_FILES["file"]["tmp_name"]);

echo "<pre>";
var_dump($foo);
echo "</pre>";