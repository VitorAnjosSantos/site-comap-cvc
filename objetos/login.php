<?php
include("conexao.php");

if(empty($_POST["usuario"]) || empty($_POST["senha"])){
    header("Location: ../index.php");
    exit();
}

$usuario = mysqli_real_escape_string($conexao,$_POST["usuario"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);

$query = "";