<?php

require_once "../autoload.php";

$property = new Properties();
$user = new Users();

echo "<pre>";
var_dump($property->all());
var_dump($user->all());
echo "</pre>";