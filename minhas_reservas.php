<?php
session_start();

// CORREÇÃO: Caminho direto para o arquivo na mesma pasta
include("conexao.php");

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT r.id_reserva, r.status, e.titulo 
        FROM reservas r 
        JOIN eventos e ON e.id_evento = r.id_evento 
        WHERE r.id_usuario = $id_usuario";

$resultado = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minhas Inscrições</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Minhas Inscrições</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>

    <div class="container">
        <h2>Seus Ingressos Reservados:</h2>
        <br>

        <?php if(mysqli_num_rows($resultado) == 0) { ?>
            <p>Você ainda não reservou nenhum evento.</p>
        <?php } ?>

        <?php while($linha = mysqli_fetch_assoc($resultado)){ ?>
            <div class="card" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <strong>🎉 Evento: <?php echo $linha['titulo']; ?></strong><br>
                    <span>Status: <?php echo $linha['status']; ?></span>
                </div>
                
                <?php if($linha['status'] == 'ATIVA'){ ?>
                    <a class="botao" style="background: #dc3545;" href="cancelar_reservas.php?id=<?php echo $linha['id_reserva']; ?>" onclick="return confirm('Tem certeza que deseja cancelar essa reserva?')">
                        Cancelar Vaga
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>

</body>
</html>