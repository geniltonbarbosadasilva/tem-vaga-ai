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
    <?php include 'views-parts/header.php';
        headerResult();
    ?>

    <div class="sidebar animate-left" style="display:none" id="mySidebar">
        <a href="#" class="bar-item bar-button btn-close-bar" onclick="w3_close()">&#9776;</a>
        <a href="#" class="bar-item bar-button">Usuarios</a>
        <a href="#" class="bar-item bar-button">Alugueis</a>
        <a href="#" class="bar-item bar-button">imoveis</a>
        <a href="#" class="bar-item bar-button">Tokens</a>
    </div>

    <div id="openNav" class="closed-bar">
        <button class="bar-button" onclick="w3_open()">&#9776;</button>
    </div>

    <main>
        <button class="create-button transition"><a href="create-user.php">Novo +</a></button>        
        <?php
            include '../app/Users.php';

            if(array_key_exists("message", $_GET)){
                echo "<p id='message' class='transition message ". $_GET["type"] ." '>" . $_GET["message"] . "<p>";
            }   
            $users = new Users();
            $users->table();
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