<?php

session_start();

if($_SESSION['perfil'] != 'ADMIN'){

    die("Acesso negado");

}
?>

<h1>Painel Administrativo</h1>

<a href="../eventos/cadastrar.php">
Novo Evento
</a>

<br><br>

<a href="../usuarios/listar.php">
Gerenciar Usuários
</a>z