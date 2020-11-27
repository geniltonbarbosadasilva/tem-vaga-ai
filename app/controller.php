<?php
echo "id=" . $_GET["id"] . "<br>";

include 'Users.php';
include 'Properties.php';
include 'Rents.php';
include 'Tokens.php';
include 'Utils.php';

switch ($_GET["table"]) {
    case "users":              
        $table = new Users();  
        echo "table=" . $_GET["table"] . "<br>";
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
    echo "operation=" . $_GET["operation"];
    $table->delete($_GET["id"]);
    redirect_to( "../views/control-panel.php","Deletado com Sucesso!");
}

if ($_GET["operation"] === "update") {
}
