<?php
session_start();
include("conexao_usuario.php");

if(empty($_POST["usuario"]) || empty($_POST["senha"])){
    header('Location: ../paginas/paginaLogin.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao,$_POST["usuario"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);

$query = "SELECT usuario,senha FROM tb_login WHERE usuario='{$usuario}' and senha= md5('{$senha}')";
$result = mysqli_query($conexao,$query);

$num_rows = mysqli_num_rows($result);

if($num_rows > 0){
    $_SESSION['sucessoLogin'] = true;
    header('Location: ../paginas/home.php');
    exit();
}else{
    $_SESSION['erroLogin'] = true;
    header('Location: ../index.php');
    exit();
}