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
            $name = "";
            $email = "";
            $password = "";
            $action = "../app/controller.php?operation=create&table=users";
            if(array_key_exists("id", $_GET)){
                $user = new Users();
                [ 
                    "id" => $id,
                    "name" => $name, 
                    "email" => $email,
                    "password" => $password
                ] = $user->getRecordById($_GET["id"]);
                $action = "../app/controller.php?id=$id&operation=update&table=users";
            }   
        ?>
        <form id="form-user" class="create-form" action="<?php echo $action ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="name">Nome:</label>
            <label id="error-name" for="name" class="error"></label>
            <input id="name" type="text" name="name" value="<?php echo $name ?>">
            
            <label for="email">E-mail:</label>
            <label id="error-email" for="email" class="error"></label>
            <input id="email" type="text" name="email" value="<?php echo $email ?>">

            <label for="password">Senha:</label>
            <label id="error-password" for="password" class="error"></label>
            <input id="password" type="password" name="password" value="<?php echo $password ?>">

            <button class='search-btn transition' type="button" onclick="submitFormUser()">Enviar</button>
        </form>
    </main>

    <?php include 'views-parts/footer.php';
        footer();
    ?>

    <script src="../js/animation.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/slide.js"></script>
    <script src="../js/validation.js"></script>
</body>

</html>