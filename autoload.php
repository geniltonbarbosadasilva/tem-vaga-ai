<?php

define('PROJECT_DIRECTORY', __DIR__ . DIRECTORY_SEPARATOR);

function autoLoadClasses( $className )
{
    $extension =  spl_autoload_extensions();
    require_once(__DIR__ . "/app/Models/" . $className . $extension);
}

spl_autoload_extensions('.php');
spl_autoload_register('autoLoadClasses');
