<?php

require_once("../autoload.php");

[
    "email" => $email,
    "password" => $password
] = $_POST;

$sql = "SELECT * FROM Users WHERE email='$email' AND password='$password'";

$user = new Users();
$result = $user->getConnection()->query($sql);

if ($result->num_rows > 0) {
    $id = $result->fetch_array(MYSQLI_ASSOC)["id"];
    echo "
    <script>
        alert(\"Logado com sucesso\");
        localStorage.id_user = $id;
        javascript:history.go(-1);
    </script>";
} else {
    echo "
    <script>
        alert(\"Usuario ou senha não encontrados\");
        javascript:history.go(-1);
    </script>";
}
