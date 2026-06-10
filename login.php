<?php
session_start();
include("config/conexao.php");

if(isset($_POST['entrar'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios
            WHERE email='$email'";

    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) > 0){

        $usuario = mysqli_fetch_assoc($resultado);

        if(password_verify($senha, $usuario['senha'])){

            $_SESSION['id_usuario'] =
                $usuario['id_usuario'];

            $_SESSION['nome'] =
                $usuario['nome'];

            $_SESSION['perfil'] =
                $usuario['perfil'];

            header("Location:index.php");
            exit;
        }
    }

    echo "Email ou senha inválidos.";
}
?>

<form method="POST">

    <h2>Login</h2>

    <input type="email"
           name="email"
           placeholder="Email">

    <br><br>

    <input type="password"
           name="senha"
           placeholder="Senha">

    <br><br>

    <button name="entrar">
        Entrar
    </button>

</form>