<?php

require_once("../autoload.php");

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
    default:
        exit("Falha na operação");
        break;
}

if ($_GET["operation"] === "delete") {
    $response = $table->delete($_GET["id"]);
    Utils::redirect_to("../views/control-panel.php", $response);
}

if ($_GET["operation"] === "update") {
    $response = $table->update($_POST, $_FILES);
    Utils::redirect_to("../views/control-panel.php", $response);
}

if ($_GET["operation"] === "create") {
    $response = $table->create($_POST, $_FILES);
    Utils::redirect_to("../views/control-panel.php", $response);
}