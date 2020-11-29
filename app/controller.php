<?php

include 'Users.php';
include 'Properties.php';
include 'Rents.php';
include 'Tokens.php';
include 'Utils.php';

switch ($_GET["table"]) {
    case "users":              
        $table = new Users();  
        break;
    case "properties":
        $table = new Properties();
        break;
    case "rents":
        $table = new Rents();
        break;
    case "tokens":
        $table = new Tokens();
        break;
    default:
        exit("Falha na operação");
        break;
}

if ($_GET["operation"] === "delete") {
    $response = $table->delete($_GET["id"]);
    redirect_to("../views/control-panel.php", $response["message"], $response["type"]);
}

if ($_GET["operation"] === "update") {
    $response = $table->update($_GET["id"], $_POST);
    redirect_to("../views/control-panel.php", $response["message"], $response["type"]);
}

if ($_GET["operation"] === "create") {
    $response = $table->create($_POST);
    redirect_to("../views/control-panel.php", $response["message"], $response["type"]);
}