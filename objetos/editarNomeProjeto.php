<?php
session_start();
include("./conexao_usuario.php");

$projetoArray = array_keys($_POST["projeto"]);
$nome = $_POST["nome"];
$projeto = $projetoArray[0];
$query = "UPDATE tb_projetos SET nome = '{$nome}'
          WHERE id_projeto = {$projeto}";
$result = mysqli_query($conexao,$query);

if($result){
    $_SESSION['sucesso'] = true;
    header('Location: ../paginas/paginaProjetos.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: ../paginas/paginaProjetos.php');
    exit();
} 