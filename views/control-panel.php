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
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->

</head>

<body>
    <?php include 'views-parts/header.php';
    headerResult();
    ?>


    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
        <button class="w3-button w3-teal w3-xlarge" onclick="w3_close()">&#9776;</button>
        <a href="#" class="w3-bar-item w3-button">Link 1</a>
        <a href="#" class="w3-bar-item w3-button">Link 2</a>
        <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>

    <main>
        <div id="main">

            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
            </div>
            <div>
                <p>In this example, the sidebar is hidden (style="display:none")</p>
                <p>It is shown when you click on the menu icon in the top left corner.</p>
                <p>When it is opened, it shifts the page content to the right.</p>
                <p>We use JavaScript to add a 25% left margin to the div element with id="main" when this happens. The value "25%" matches the width of the sidebar.</p>
            </div>

        </div>


        <script>
            function w3_open() {
                document.getElementById("main").style.marginLeft = "15%";
                document.getElementById("mySidebar").style.width = "15%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("openNav").style.display = 'none';
            }

            function w3_close() {
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("openNav").style.display = "inline-block";
            }
        </script>

    </main>
    <?php include 'views-parts/footer.php';
    footer();
    ?>
    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
</body>

</html>