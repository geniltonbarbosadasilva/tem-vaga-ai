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
        <?php
        $id = "";
        $id_owner = "";
        $title = "";
        $price = "";
        $description = "";
        $address = "";
        $action = "../app/controller.php?operation=create&table=properties";

        if (array_key_exists("id", $_GET)) {
            $property = new Properties();
            [
                "id" => $id,
                "id_owner" => $id_owner,
                "title" => $title,
                "price" => $price,
                "description" => $description,
                "address" => $address
            ] = $property->getRecordById($_GET["id"]);
            $action = "../app/controller.php?id=$id&operation=update&table=properties";
        }
        ?>
        <form class="create-form" action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="id_owner">Proprietario:</label>
            <select name="id_owner" id="id_owner">
                <?php 
                    $users = new Users();                    
                    foreach ($users->all() as $user) {        
                        $selected = ( $id_owner == $user["id"] )? "selected" : "";
                        echo "<option value='". $user["id"] ."' $selected>". $user["name"] ."</option>";
                    }
                ?>
            </select>

            <label for="title">Titulo:</label>
            <input id="title" type="text" name="title" value="<?php echo $title ?>">

            <label for="price">Preço:</label>
            <input id="price" type="number" name="price" value="<?php echo $price ?>">

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" rows="5"><?php echo $description ?></textarea>

            <label for="address">Endereço:</label>
            <input id="address" type="text" name="address" value="<?php echo $address ?>">

            <label for="image-1">Imagens:</label>
            <div class="grid-container">
                <span>
                    <input type="file" name="image-1" id="selector-image-1" accept="image/*">
                    <img class="preview-img" id="preview-img-1">
                </span>
                <span>
                    <input type="file" name="image-2" id="selector-image-2" accept="image/*">
                    <img class="preview-img" id="preview-img-2">
                </span>
                <span>
                    <input type="file" name="image-3" id="selector-image-3" accept="image/*">
                    <img class="preview-img" id="preview-img-3">
                </span>
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
    <script src="../js/preview_img.js"></script>
</body>

</html>