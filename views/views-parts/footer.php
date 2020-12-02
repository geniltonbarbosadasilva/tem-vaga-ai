<?php

function footer()
{
    $date = date("Y");
    echo 
    "<footer>
        <p>Não importa para onde você vá, temos uma vaga para você!</p>
        <ul>
            <li>© $date Tem Vaga Aí, Inc. All rights reserved</li>
            <li><a href='#' class='fa fa-facebook transition'></a></li>
            <li><a href='#' class='fa fa-twitter transition'></a></li>
            <li><a href='#' class='fa fa-instagram transition'></a></li>
        </ul>
        <ul>
            <li><a href='about-us.php'>Sobre o sistema</a></li>
            <li><a href='home.php'>Início</a></li>
        </ul>		
    </footer>";
}

?>