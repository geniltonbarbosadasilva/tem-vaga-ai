<?php

class CSV
{
    public static function getCSV($name)
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
}
