<?php

session_start();

include("../config/conexao.php");

$id_usuario =
$_SESSION['id_usuario'];

$id_evento =
$_GET['id'];

$sql = "INSERT INTO reservas
(id_usuario,id_evento)

VALUES

($id_usuario,$id_evento)";

mysqli_query($conexao,$sql);

header("Location:minhas_reservas.php");