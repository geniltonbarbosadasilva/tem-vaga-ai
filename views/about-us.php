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

    ?>

    <main>

	
	<div class="grid-container">
            <h3 class="dark-text">
                Sistema desenvolvido pelos alunos:
				<ul>
					<li>Marcos Aurélio Duarte Souza - 5165 | Integral</li>
					<li>Genilton Barbosa - XXX | Integral</li>
					<li>Vinicius - XXX | Noturno</li>
				</ul> 
				Funcionalidades:
				<ol>
					<li>Cadastrar, editar e excluir usuários, imoveis</li>
					<li>Buscar vagas por cidade e data</li>
					<li>Formulário de Contato com anfitrião</li>
				</ol>
			</h3>

            <div class="item transition">
                <div class="form-search-home" >
                    <h1>Conheça sobre o sistema</h1>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/2VpnnZk68gA" frameborder="0" 
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   
                </div>
            </div>

        </div>
    </main>
    <?php include 'views-parts/footer.php';
    footer();
    ?>

    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
</body>

</html>