<?php

require_once("../autoload.php");

function dropDown()
{
    $csv = CSV::getCSV(PROJECT_DIRECTORY . "CSV/citys.csv");
    $citys = "";

    foreach ($csv as $city) {
        $citys = $citys . "<a onclick='fillField(this)'>$city</a>";
    }

    return $citys;
}

function userScreen()
{
    return
    "<div id='id-user-modal' class='modal'>
        <div class='modal-content'>
            <div class='modal-container'>
                <div id='login' class='login'>
                    <form action='../app/logout.php' method='post'>
                        <img src='../img/user.png'>
                        <label id='name-user-modal'></label>
                        <br><br>
                        <button class='search-btn transition' type='submit'>Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}

function loginScreen()
{
    return
    "<!-- TELA DE LOGIN -->
    <div id='id-modal' class='modal'>
        <div class='modal-content'>
            <div class='modal-container'>
                <div id='login' class='login'>
                    <form action='../app/login.php' method='post' autocomplete='off'>
                        <img src='../img/user.png'>
                        <input type='text' name='email' placeholder='Email'>
                        <input type='password' name='password' placeholder='Password'>
                        <input id='checkbox' type='checkbox' name='conected' checked>
                        <label for='checkbox'>Mantanha-me Conectado</label>
                        <button class='search-btn transition' type='submit'>Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";
}

function headerHome()
{
    $loginScreen = loginScreen();
    $logout = userScreen();
    echo 
    "<header>
        <div class='navbar'>
            <div class='logo transition' id='logo'>
                <a href='home.php'><img src='../img/logo.png' alt='logo'></a>
            </div>
            <div class='info'>
                <h3> Confira nossas politicas sobre o COVID-19</h3>
                <button class='button transition' type='button' onclick='info()'>Leia aqui</button>
                <i class='transition fa fa-adjust' onclick='setTheme()'></i>
            </div>
            <div class='menu'>                
                <ul>                    
                    <li><a id='login-btn' href='#' class='transition'>Entre</a></li>
                    <li><a class='transition' href='control-panel.php'>Seja um anfitrião</a></li>
                </ul>
            </div>
        </div>
        $loginScreen 
        $logout
    </header>";
}

function headerResult()
{
    $loginScreen = loginScreen();
    $logout = userScreen();
    $dropDown = dropDown();
    echo 
    "<header>
        <div class='navbar'>
            <div class='logo transition' id='logo'>
                <a href='home.php'><img src='../img/logo.png' alt='logo'></a>
            </div>
            <div>                    
                <form autocomplete='off' class='form-search'  action='result.php' method='get'>
                    <div class='dropdown'>
                    <input id='search-local' type='text' name='where' placeholder='Para onde?'>
                    <div class='dropdown-content'>
                        $dropDown
                    </div>
                    </div>
                    <input type='number' name='number' placeholder='quantas pessoas?'>
                    <input type='date'   name='date'  placeholder='quando?'>

                    <button type='submit' class='search-btn transition'>Buscar</button>                    
                </form>                        
                <i class='transition fa fa-adjust' onclick='setTheme()'></i>
            </div>
            <div class='menu'>
                <ul>
                    <li><a id='login-btn' class='transition'>Entre</a></li>
                    <li><a class=' transition' href='control-panel.php'>Seja um anfitrião</a></li>
                </ul>                
            </div>
        </div>
        $loginScreen
        $logout
    </header>";
}

?>
