<?php
session_start();
include("./conexao_usuario.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);
$projeto = mysqli_real_escape_string($conexao,$_POST["projetos"]);


$query = "INSERT INTO tb_tablets (tablet,senha,tb_projetos_id_projeto) VALUES ('{$nome}',md5('{$senha}'),{$projeto})";
$result = mysqli_query($conexao,$query);

if($result){
    $_SESSION['sucesso'] = true;
    header('Location: ../paginas/paginaTablets.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: ../paginas/paginaTablets.php');
    exit();
}