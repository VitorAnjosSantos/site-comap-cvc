<?php
session_start();
include("./conexao_usuario.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);
$projeto = mysqli_real_escape_string($conexao,$_POST["projetos"]);
$teclado = mysqli_real_escape_string($conexao,$_POST["teclados"]);
$id = mysqli_real_escape_string($conexao,$_POST["sentidos"]);

$query = "INSERT INTO tb_tablets (tablet,senha,tb_projetos_id_projeto,tb_formularios_id_formulario, tb_config_projetos_id_config) VALUES ('{$nome}',md5('{$senha}'),{$projeto},{$teclado},{$id})";
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