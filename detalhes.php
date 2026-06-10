<?php
session_start();

// CORREÇÃO: Caminho direto para o arquivo na mesma pasta
include("conexao.php");

// Proteção simples: se não estiver logado, manda para o login
if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Evita erros se o ID não for enviado por link
$id = mysqli_real_escape_string($conexao, $id);

$sql = "SELECT * FROM eventos WHERE id_evento = $id";
$resultado = mysqli_query($conexao, $sql);
$evento = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Evento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1><?php echo $evento['titulo']; ?></h1>
        <nav>
            <a href="index.php">Voltar para Home</a>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <img src="<?php echo $evento['imagem']; ?>" style="max-width: 100%; height: auto; border-radius: 8px;">
            <br><br>
            <p><strong>Descrição:</strong> <?php echo $evento['descricao']; ?></p>
            <br>
            <p>📍 <strong>Local:</strong> <?php echo $evento['local_evento']; ?></p>
            <p>📅 <strong>Data:</strong> <?php echo $evento['data_evento']; ?></p>
            <p>🎟️ <strong>Vagas Restantes:</strong> <?php echo $evento['vagas_disponiveis']; ?></p>
            <br><br>
            
            <a class="botao" href="reservas.php?id=<?php echo $evento['id_evento']; ?>">
                Confirmar Inscrição
            </a>
        </div>
    </div>

</body>
</html>