<?php

include("../config/conexao.php");

$id = $_GET['id'];

$sql = "UPDATE reservas

        SET status='CANCELADA'

        WHERE id_reserva = $id";

mysqli_query($conexao,$sql);

header("Location:minhas_reservas.php");