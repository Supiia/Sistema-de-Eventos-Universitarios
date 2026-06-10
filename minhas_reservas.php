<?php

session_start();

include("../config/conexao.php");

$id_usuario =
$_SESSION['id_usuario'];

$sql = "SELECT
        r.id_reserva,
        r.status,
        e.titulo

        FROM reservas r

        JOIN eventos e
        ON e.id_evento = r.id_evento

        WHERE r.id_usuario =
        $id_usuario";

$resultado =
mysqli_query($conexao,$sql);

?>

<h2>Minhas Inscrições</h2>

<?php

while($linha =
mysqli_fetch_assoc($resultado)){
?>

<p>

<strong>

<?php echo $linha['titulo']; ?>

</strong>

-

<?php echo $linha['status']; ?>

<?php
if($linha['status'] == 'ATIVA'){
?>

<a href="cancelar.php?id=
<?php echo $linha['id_reserva']; ?>">
Cancelar
</a>

<?php } ?>

</p>

<?php } ?>