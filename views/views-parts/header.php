<?php

function loginScreen()
{
    return
    "<!-- TELA DE LOGIN -->
    <div id='id-modal' class='modal'>
        <div class='modal-content'>
            <div class='modal-container'>
                <div id='login' class='login'>
                    <form autocomplete='off'>
                        <img src='../img/user.png'>
                        <input type='text' name='email' placeholder='Email'>
                        <input type='password' name='password' placeholder='Password'>
                        <input id='checkbox' type='checkbox' name='conected' checked>
                        <label for='checkbox'>Mantanha-me Conectado</label>
                        <button onclick='closeModal()' class='search-btn transition' type='button'>Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}

function headerHome()
{
    $loginScreen = loginScreen();
    echo 
    "<header>
        <div class='navbar'>
            <div class='logo transition' id='logo'>
                <a href='home.php'><img src='../img/logo.png' alt='logo'></a>
            </div>
            <div class='info'>
                <h3> Confira nossas politicas sobre o COVID-19</h3>
                <button class='button transition' type='button' onclick='info()'>Leia aqui</button>
            </div>
            <div class='menu'>
                <ul>
                    <li><a href='#' onclick='openModal()' class='transition'>Entre</a></li>
                    <li><a class='transition' href='control-panel.php'>Seja um anfitrião</a></li>
                </ul>
            </div>
        </div>
        $loginScreen 
    </header>";
}

function headerResult()
{
    $loginScreen = loginScreen();
    echo 
    "<header>
        <div class='navbar'>
        <div class='logo transition' id='logo'>
            <a href='home.php'><img src='../img/logo.png' alt='logo'></a>
        </div>

        <form autocomplete='off' class='form-search'>
            <div class='dropdown'>
            <input id='search-local' type='text' name='fname' placeholder='Para onde?'>
            <div class='dropdown-content'>
                <a onclick='fillField(this)'>Belo Horizonte</a>
                <a onclick='fillField(this)'>Montes Claros</a>
                <a onclick='fillField(this)'>Ouro Preto</a>
                <a onclick='fillField(this)'>Vitoria da Conquista</a>
            </div>
            </div>
            <input type='number' name='fname' placeholder='quantas pessoas?'>
            <input type='date' name='fname' placeholder='quando?'>

            <button onclick=\"openLink('result.php')\" type='button' class='search-btn transition'>Buscar</button>
        </form>

        <div class='menu'>
            <ul>
            <li><a class='transition' onclick='openModal()'>Entre</a></li>
                    <li><a class=' transition' href='control-panel.php'>Seja um anfitrião</a></li>
            </ul>
        </div>
        </div>
        $loginScreen
    </header>";
}

?>
