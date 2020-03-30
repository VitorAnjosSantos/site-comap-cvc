<?php
session_start();
include("./conexao.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
$rodovia = mysqli_real_escape_string($conexao,$_POST["rodovia"]);
$km = mysqli_real_escape_string($conexao,$_POST["km"]);
$qtd_postos = mysqli_real_escape_string($conexao,$_POST["qtd_postos"]);

$query = "INSERT INTO tb_projetos(nome,rodovia,km,qtd_postos) VALUES('{$nome}','{$rodovia}','{$km}',{$qtd_postos})";
$result = mysqli_query($conexao,$query);

if($result){
    $_SESSION['sucesso'] = true;
    header('Location: ../paginas/paginaNovoProjeto.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: ../paginas/paginaNovoProjeto.php');
    exit();
}