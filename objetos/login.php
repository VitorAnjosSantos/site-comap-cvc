<?php
session_start();
include("conexao.php");

if(empty($_POST["usuario"]) || empty($_POST["senha"])){
    header('Location: ../paginas/paginaLogin.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao,$_POST["usuario"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);

$query = "SELECT usuario,senha FROM tb_login WHERE usuario='{$usuario}' and senha= md5('{$senha}')";
$result = mysqli_query($conexao,$query);

if($result){
    $_SESSION['sucessoLogin'] = true;
    header('Location: ../paginas/paginaAdministrador.php');
    exit();
}else{
    $_SESSION['erroLogin'] = true;
    header('Location: ../paginas/paginaLogin.php');
    exit();
}