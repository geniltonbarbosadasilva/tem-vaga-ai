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
  <header>
    <div class="navbar">
      <div class="logo transition" id="logo">
        <a href="home.php"><img src="../img/logo.png" alt="logo"></a>
      </div>

      <form autocomplete="off" class="form-search">
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

        <button onclick="openLink('result.html')" type="button" class="search-btn transition">Buscar</button>
      </form>

      <div class="menu">
        <ul>
          <li><a class="transition" onclick="document.getElementById('id-modal').style.display='block'">Entre</a></li>
          <li><a class="transition" href="">Seja um anfitrião</a></li>
        </ul>
      </div>
    </div>
    <!-- TELA DE LOGIN -->
    <div id="id-modal" class="modal">
      <div class="modal-content">
        <div class="modal-container">
          <div id="login" class="login">
            <form autocomplete="off">
              <img src="../img/user.png">
              <input type="text" name="email" placeholder="Email">
              <input type="password" name="password" placeholder="Password">
              <input id="checkbox" type="checkbox" name="conected" checked>
              <label for="checkbox">Mantanha-me Conectado</label>
              <button onclick="document.getElementById('id-modal').style.display='none'" class="search-btn transition"
                type="button">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div id="content-grid" class="grid-container">
    </div>
  </div>

  <footer>
    <p>Não importa para onde você vá, temos uma vaga para você!</p>
    <ul>
      <li>© 2020 Tem Vaga Aí, Inc. All rights reserved</li>
      <li><a href="#" class="fa fa-facebook transition"></a></li>
      <li><a href="#" class="fa fa-twitter transition"></a></li>
      <li><a href="#" class="fa fa-instagram transition"></a></li>
    </ul>
  </footer>
  <script src="../js/animation.js"></script>
  <script src="../js/app.js"></script>
  <script src="../js/slide.js"></script>
</body>

</html>