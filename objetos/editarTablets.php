<?php
session_start();
include("./conexao_usuario.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);
$projeto = mysqli_real_escape_string($conexao,$_POST["projetos"]);
$teclado = mysqli_real_escape_string($conexao,$_POST["teclados"]);
$id = mysqli_real_escape_string($conexao,$_POST["sentidos"]);
$tablet = mysqli_real_escape_string($conexao,key($_POST["tablet"]));


$query = "UPDATE tb_tablets SET tablet = '{$nome}',
                                senha = md5('{$senha}'),
                                tb_projetos_id_projeto = {$projeto},
                                tb_formularios_id_formulario = {$teclado}, 
                                tb_config_projetos_id_config = {$id}
                            WHERE id_tablet = {$tablet}";

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