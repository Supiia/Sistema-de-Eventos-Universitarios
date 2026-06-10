<?php

session_start();

include("config/conexao.php");

$id = $_GET['id'];

$sql = "SELECT *
        FROM eventos
        WHERE id_evento = $id";

$resultado = mysqli_query($conexao,$sql);

$evento = mysqli_fetch_assoc($resultado);

?>

<h1>
<?php echo $evento['titulo']; ?>
</h1>

<img
src="<?php echo $evento['imagem']; ?>"
width="500">

<p>
<?php echo $evento['descricao']; ?>
</p>

<p>
Local:
<?php echo $evento['local_evento']; ?>
</p>

<p>
Data:
<?php echo $evento['data_evento']; ?>
</p>

<p>
Vagas:
<?php echo $evento['vagas_disponiveis']; ?>
</p>

<a href="reservas/reservar.php?id=
<?php echo $evento['id_evento']; ?>">
Inscrever-se
</a>