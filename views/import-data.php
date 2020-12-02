<?php require_once("../autoload.php"); ?>

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

    <main>
   
        <form class="create-form" enctype="multipart/form-data" action="processa_csv.php" method="post">
            <div>
				<input type="file" class="custom-file-input" id="customFile" name="file">
			</div>
            <button class='search-btn transition' type="submit">Enviar</button>
        </form>
    </main>

    <?php include 'views-parts/footer.php';
        footer();
    ?>

    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
</body>

</html>