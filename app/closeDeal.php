<?php

require_once("../autoload.php");

$rents = new Rents();

$response = $rents->create([
    "id_user" => $_GET["id_user"],
    "id_property" => $_GET["id_property"],
    "check_in" => date("Y-m-d")
]);

echo "
<script>
    alert(\"Negócio Fechado!\");    
    javascript:history.go(-1);
</script>";


?>