<?php

$usuario = 'root';
$senha = 'analiviA1';
$database = 'blog_php';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
    die("falha ao conectar ao banco: " . $mysqli->error);
}
