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
		<div class="container">
			<div id="content-grid" class="grid-container">
			<?php

			$properties = new Properties();
			$properties = $properties->all();
			$images = new Images();

			// echo "<pre>";
			// print_r($images->getImagesByOwnerId(10));
			// echo "</pre>";
			
			foreach ( $properties as $property ) {
				[					
					"id" => $id,
                	"title" => $title,
                	"price" => $price,
                	"description" => $description
				] = $property;
				$img = $images->getImagesByOwnerId($id);
				$img = ( !empty($img) && array_key_exists ( "src" , $img[0]) )? $img[0]["src"] : "";

				echo 
				"<div id='$id' class='item transition'>
        			<div class='card'>
            			<img src='../$img'>
            			<h1 class='dark-text'>$title</h1>
            			<p class='green-text'>$price</p>
            			<p class='card-text transition'>$description</p>
        			</div>
    			</div>";
			}

			?>

			</div>
		</div>
	</main>
	<?php include 'views-parts/footer.php';
	footer();
	?>
	<script src="../js/animation.js"></script>
	<!-- Preenche a pagina com JavaScript -->
	<!-- <script src="../js/app.js"></script>  -->
	<script src="../js/slide.js"></script>
</body>

</html>