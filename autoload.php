<?php

function autoLoadClasses( $className )
{
    $extension =  spl_autoload_extensions();
    require_once(__DIR__ . "/app/" . $className . $extension);
}

spl_autoload_extensions('.php');
spl_autoload_register('autoLoadClasses');
