<?php
session_start();

// CORREÇÃO: Caminho direto para o arquivo na mesma pasta
include("conexao.php");

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$id = mysqli_real_escape_string($conexao, $id);

// Altera o status para cancelada
$sql = "UPDATE reservas SET status='CANCELADA' WHERE id_reserva = $id";
mysqli_query($conexao, $sql);

// Se tudo deu certo, a sua TRIGGER (trg_devolver_vaga) vai rodar sozinha lá no banco devolvendo o +1 para o evento!

// CORREÇÃO: Volta direto para a página de listagem de inscrições
header("Location: minhas_reservas.php");
exit;
?>