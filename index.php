<?php
session_start();

if(!isset($_SESSION['id_usuario'])){
    header("Location: login.php");
    exit;
}

include("config/conexao.php");
?>

<h1>Sistema de Eventos Universitários</h1>

<p>
Bem-vindo,
<?php echo $_SESSION['nome']; ?>
</p>

<a href="eventos/listar.php">Eventos</a>

|

<a href="reservas/minhas_reservas.php">
Minhas Inscrições
</a>

|

<a href="logout.php">Sair</a>

<hr>

<?php

$sql = "SELECT *
        FROM eventos
        WHERE destaque = 1
        LIMIT 1";

$resultado = mysqli_query($conexao,$sql);

if($evento = mysqli_fetch_assoc($resultado)){
?>

<h2>Evento em Destaque</h2>

<img
src="<?php echo $evento['imagem']; ?>"
width="500">

<h3>
<?php echo $evento['titulo']; ?>
</h3>

<p>
<?php echo $evento['descricao']; ?>
</p>

<a href="detalhes.php?id=<?php
echo $evento['id_evento']; ?>">
Ver Detalhes
</a>

<?php } ?>