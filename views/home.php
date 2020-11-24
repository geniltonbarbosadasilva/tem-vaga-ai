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
    <?php
    include 'views-parts/header.php';
    include 'views-parts/slider.php';

    headerHome();

    slider([
        "../img/img-1.jpg",
        "../img/img-2.jpg",
        "../img/img-3.jpg"
    ]);
    ?>

    <div class="grid-container">
        <h3 class="dark-text">
            Acomode-se em um lugar novo. Descubra lugares perto de você para morar, trabalhar ou simplesmente relaxar.
        </h3>

        <div class="item transition">
            <form autocomplete="off" class="form-search-home" action="result.php">
                <h1>Para onde vamos hoje?</h1>
                <div class="dropdown">
                    <input id="search-local" type="text" name="fname" placeholder="Para onde?">
                    <div class="dropdown-content">
                        <a onclick="fillField(this)">Belo Horizonte</a>
                        <a onclick="fillField(this)">Montes Claros</a>
                        <a onclick="fillField(this)">Ouro Preto</a>
                        <a onclick="fillField(this)">Vitoria da Conquista</a>
                    </div>
                </div>
                <input type="number" name="fname" placeholder="quantas pessoas?">
                <input type="date" name="fname" placeholder="quando?">

                <button type="submit" class="search-btn transition">Buscar</button>
            </form>
        </div>

    </div>

    <div class="container">
        <h1 class="dark-text title">Parceiros</h1>
        <div class="grid-container">
            <div class="item-partner transition">
                <div class="card">
                    <img class="transition" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRkWfYh2f3Mp22VacWUn5nG4s3VWml0584ekg&usqp=CAU">
                </div>
            </div>
            <div class="item-partner transition">
                <div class="card">
                    <img class="transition" src="https://www.designevo.com/res/templates/thumb_small/blue-shield-and-banner-emblem.png">
                </div>
            </div>
            <div class="item-partner transition">
                <div class="card">
                    <img class="transition" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTJQt6Hy-Y2XXLPw15MRYN5kpqWEzUjwiXOZg&usqp=CAU">
                </div>
            </div>
            <div class="item-partner transition">
                <div class="card">
                    <img class="transition" src="data:image/jpeg;base64,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">
                </div>
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