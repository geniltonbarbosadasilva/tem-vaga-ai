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
</head>

<body>
    <?php include 'views-parts/header.php';
    headerResult();
    ?>
    <div class="container">
        <div class="content-view">
            <?php
            include 'views-parts/slider.php';

            slider();
            ?>
            <div class="item-view">
                <h1 class="dark-text title" id="title"></h1>
                <p class="green-text" id="price"></p>
                <p id="desc" class="text"></p>
                <p id="address" class="text"></p>
                <button class="search-btn transition" type="button">Fechar Negócio!</button>
            </div>

        </div>
    </div>

    <?php include 'views-parts/footer.php';
    footer();
    ?>
    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
</body>

</html>