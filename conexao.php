<?php

$host = 'localhost';
$db = 'eventos_universitarios';
$user = 'root';
$pass = 'Senha12345@';

$conexao = mysqli_connect($host, $user, $pass, $db);

if (!$conexao) {
    die('Falha na conexão com o banco de dados: ' . mysqli_connect_error());
}
?>