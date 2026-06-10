<?php
// Configurações para conectar no MySQL Workbench
$host = "localhost";                     // Mantém localhost
$user = "root";                          // O usuário padrão do Workbench também é root
$pass = "Nog0610@";        // ⚠️ COLOQUE AQUI A SENHA QUE VOCÊ USA PARA ENTRAR NO WORKBENCH
$banco = "eventos_universitarios";       // Nome do banco que você criou pelo script

// Criando a conexão com o banco
$conexao = mysqli_connect($host, $user, $pass, $banco);

// Verifica se a conexão falhou para te avisar na tela
if (!$conexao) {
    die("Erro ao conectar ao MySQL Workbench: " . mysqli_connect_error());
}
?>