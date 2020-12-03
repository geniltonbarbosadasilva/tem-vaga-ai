<?php

require_once "../autoload.php";

$properties = new Properties();
$users = new Users();
$rents = new Rents();
$tokens = new Tokens();
$images = new Images();

echo "<pre>";
print_r(
    $images->getLastId()
);
echo "</pre>";


    // $images->create([
    //     "id" => 1,
    //     "id_property" => 1,
    //     "title" => "Test_Image",
    //     "src" => "algumlugar/"
    // ]),
    // $images->getRecordById(4),
    // $images->update([
    //     "id" => 4,
    //     "id_property" => 1,
    //     "title" => "Bbbbbb",
    //     "src" => "algumlugar2/"
    // ]),
    // $images->all(),
    // $images->delete(4)


    // $tokens->create([
    //     "id" => 2,
    //     "id_user" => 49,
    //     "code_hash" => "Teste1"
    // ]),
    // $tokens->getRecordById(4),
    // $tokens->update([
    //     "id" => 3,
    //     "id_user" => 49,
    //     "code_hash" => "Teste2"
    //     ]),
    // $tokens->delete(4),
    // $tokens->all()

