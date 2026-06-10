<?php
session_start();
include("conexao.php"); // Corrigido caminho

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];
$id_evento = $_GET['id'];

$sql = "INSERT INTO reservas (id_usuario, id_evento) VALUES ($id_usuario, $id_evento)";

// Executa e verifica se o MySQL aceitou ou se a TRIGGER barrou por falta de vagas
if(mysqli_query($conexao, $sql)){
    header("Location: index.php?sucesso=1");
} else {
    // Pega o erro customizado da sua trigger 'Evento lotado'
    $erro = mysqli_error($conexao);
    if(strpos($erro, 'Evento lotado') !== false){
        header("Location: index.php?erro=Desculpe, este evento já está lotado!");
    } else {
        header("Location: index.php?erro=Não foi possível realizar a inscrição.");
    }
}
exit;
?>