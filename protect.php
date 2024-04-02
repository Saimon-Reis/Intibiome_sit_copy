<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['email'])){
    die("você não esta logado a pagina. <p><a href=\"index.php\">Entrar</a></p>");
}

?>