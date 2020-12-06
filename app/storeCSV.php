<?php

require_once("../autoload.php");

try {
    switch ($_POST["table"]) {
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
        case "images":
            $table = new Images();
            break;
        default:
            Utils::redirect_to("../views/control-panel.php", [
                "type" => "fail",
                "message" => "Tabela não encontrada",
                "table" => "import"
            ]);
            break;
    }

    if (
        array_key_exists("file", $_FILES) &&
        array_key_exists("tmp_name", $_FILES["file"]) &&
        !empty($_FILES["file"]["tmp_name"])
    ) {
        $file_csv = CSV::getCSV($_FILES["file"]["tmp_name"]);
        $header = str_getcsv($file_csv[0]);
        $length_header = count($header);

        foreach ($file_csv as $key => $line) {
            if ($key == 0) {
                continue;
            }
            $line = trim($line);
            if ($line == false || $line == "") {
                continue;
            }
            $values = str_getcsv($line);

            if (count($values) != $length_header) {
                Utils::redirect_to("../views/control-panel.php", [
                    "type" => "fail",
                    "message" =>
                    "Tabela inconcistente, deve ter o mesmo numero de colunas em todas linhas, 
                        na linha " . $key + 1,
                    "table" => "import"
                ]);
            }

            $insert = [];
            foreach ($header as $key => $column) {
                $insert[$column] = $values[$key];
            }

            $response = $table->create($insert, []);
        }

        if ($response["type"]  == "fail") {
            $response["table"] = "import";
            Utils::redirect_to("../views/control-panel.php", $response);
        }

        Utils::redirect_to("../views/control-panel.php", [
            "type" => "success",
            "message" => "Importado com sucesso",
            "table" => "import"
        ]);
    } else {
        Utils::redirect_to("../views/control-panel.php", [
            "type" => "fail",
            "message" => "Arquivo não enviado",
            "table" => "import"
        ]);
    }
} catch (\Throwable $th) {
    Utils::redirect_to("../views/control-panel.php", [
        "type" => "fail",
        "message" => $th->getMessage(),
        "table" => "import"
    ]);
}
