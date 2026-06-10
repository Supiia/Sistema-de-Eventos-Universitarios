<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

include("conexao.php"); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUVIR - UFRA EXPOAGRO 2026</title>
    
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

    <header>
        <h1>RUVIR</h1>
        <p>Olá, <strong style="color:#ffffff;"><?php echo $_SESSION['nome']; ?></strong> (<?php echo $_SESSION['perfil']; ?>)</p>
        <nav>
            <a href="index.php">Eventos</a>
            <a href="minhas_reservas.php">Minhas Inscrições</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>

    <div class="container">

        <?php if(isset($_GET['sucesso'])) echo "<div class='card' style='background:#043927; border-color:#ff6b00; color:#ffffff; padding:20px !important; margin-bottom:20px; border-radius:12px;'>🎉 Reserva confirmada com sucesso! Vaga garantida.</div>"; ?>
        <?php if(isset($_GET['erro'])) echo "<div class='card' style='background:#3b0c11; border-color:#ef4444; color:#ffffff; padding:20px !important; margin-bottom:20px; border-radius:12px;'>⚠️ Erro: ".htmlspecialchars($_GET['erro'])."</div>"; ?>

        <?php
        // Evento em Destaque (UFRA EXPOAGRO)
        $sql = "SELECT * FROM eventos WHERE destaque = 1 LIMIT 1";
        $resultado = mysqli_query($conexao, $sql);

        if($evento = mysqli_fetch_assoc($resultado)){
        ?>
            <div class="card destaque">
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #073e28; padding-bottom: 15px;">
                    <h2 style="margin-bottom: 0; font-size: 20px; color: #ff6b00;">✨ EVENTO EM DESTAQUE</h2>
                    <span style="background: #ff6b00; color: #fff; padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 700;">UFRA 2026</span>
                </div>
                <img src="<?php echo $evento['imagem']; ?>" alt="Banner UFRA EXPOAGRO" style="max-height: 380px;">
                <div>
                    <h2 style="font-size: 32px !important; margin-bottom: 10px;"><?php echo $evento['titulo']; ?></h2>
                    <p style="font-size: 17px; margin-bottom: 20px; color: #cbd5e1;"><?php echo $evento['descricao']; ?></p>
                    <p style="font-size: 15px; margin-bottom: 20px;">📍 <strong>Local:</strong> <?php echo $evento['local_evento']; ?> | 🎟️ <strong>Vagas Restantes:</strong> <?php echo $evento['vagas_disponiveis']; ?></p>
                    <a class="botao" href="detalhes.php?id=<?php echo $evento['id_evento']; ?>" style="max-width: 250px;">Garantir Ingresso</a>
                </div>
            </div>
        <?php } ?>

        <br>
        <h2>Vem aí</h2>
        
        <div class="grid-eventos">
            <?php
            $sql_todos = "SELECT * FROM eventos ORDER BY data_evento ASC";
            $res_todos = mysqli_query($conexao, $sql_todos);

            while($ev = mysqli_fetch_assoc($res_todos)){
            ?>
                <div class="card">
                    <img src="<?php echo $ev['imagem']; ?>" alt="Poster do Evento">
                    <div class="card-body">
                        <div>
                            <h3><?php echo $ev['titulo']; ?></h3>
                            <p style="font-size: 14px; margin: 4px 0;">📍 <?php echo $ev['local_evento']; ?></p>
                            <p style="font-size: 14px; margin-bottom: 15px; font-weight: 600; color: #ff6b00;">🎟️ Vagas: <?php echo $ev['vagas_disponiveis']; ?></p>
                        </div>
                        <a class="botao" href="detalhes.php?id=<?php echo $ev['id_evento']; ?>">Saber mais</a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <footer>
        RUVIR • Universidade Federal Rural da Amazônia © 2026
    </footer>

</body>
</html>