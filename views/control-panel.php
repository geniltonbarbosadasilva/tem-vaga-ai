<?php
require_once("../autoload.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Tem Vaga ai</title>
    <link rel="shortcut icon" href="../img/ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/slider.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/sidebar.css">

</head>

<body>
    <?php
    include 'views-parts/header.php';
    include 'views-parts/sidebar.php';

    headerResult();
    sidebar();
    ?>

    <main>
        <?php

        $table = (isset($_GET["table"])) ? $_GET["table"] : "user";

        if ($table != "import") {
            if ($table == "rent") {
                echo 
                "<a href='#' onclick='infoRent()'>
                    <button class='create-button transition'>Novo +</button>
                </a>";
            } else {
                echo 
                "<a href='create-$table.php'>
                    <button class='create-button transition'>Novo +</button>
                </a>";                    
            }
        }

        if (array_key_exists("message", $_GET)) {
            echo "<p id='message' class='transition message " . $_GET["type"] . " '>" . $_GET["message"] . "<p>";
        }

        switch ($table) {
            case 'user':
                $users = new Users();
                $users->table();
                break;
            case 'property':
                $properties = new Properties();
                $properties->table();
                break;
            case 'rent':
                $rents = new Rents();
                $rents->table();
                break;
            case 'import':
                echo
                "<form class='create-form' enctype='multipart/form-data' action='../app/storeCSV.php' method='post'>
                    <label>Table:</label>
                    <select name='table'>    
                        <option value='users'>Users</option>                
                        <option value='property'>Property</option>
                        <option value='rents'>Rents</option>
                        <option value='images'>Images</option>
                        <option value='tokens'>Tokens</option>
                    </select>
                    <label>Arquivo CSV:</label>
                    <input accept='.csv' type='file' class='custom-file-input' id='customFile' name='file'>
                    
                    <button class='search-btn transition' type='submit'>Enviar</button>
                </form>                
                <ul class='dark-text'>
                    <h3 class='dark-text'>O arquivo csv deve seguir o seguinte padrão:</h3>
                    <li>A primeira linha de conter os nomes das colunas</li>
                    <li>Deve possuir as mesmas colunas da tabela no banco</li>
                    <li>Colunas separadas por (,)</li>
                    <li>Mesmo numero de colunas em todas linhas</li>
                    <li>Se o texto conter (,) ele deve estar entre (\")</li>
                </ul>";
                break;
            default:

                break;
        }
        ?>
    </main>

    <?php include 'views-parts/footer.php';
    footer();
    ?>

    <script src="../js/sidebar.js"></script>
    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
</body>

</html>