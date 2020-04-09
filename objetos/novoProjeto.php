<?php
session_start();
include("./conexao_usuario.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);

$query = "INSERT INTO tb_projetos(nome) VALUES('{$nome}')";
$result = mysqli_query($conexao,$query);

if($result){
    $id = mysqli_insert_id($conexao); 
    $_POST["id"] = $id;
    $_SESSION['sucesso'] = true;
    header('Location: ../paginas/criarConfiProjeto.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: ../paginas/paginaNovoProjeto.php');
    exit();
}