<?php
session_start();
include("./conexao_usuario.php");

$nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
$senha = mysqli_real_escape_string($conexao,$_POST["senha"]);
$projeto = $_POST["projetos"];
$teclado = $_POST["teclados"];
$id = $_POST["sentidos"];



$array = ['projetos' => $projeto, 'teclados' => $teclado,'sentidos' => $id];

$res = array_map(null, $array["projetos"], $array["teclados"], $array["sentidos"]);
$cont = 0;
$config= [];

foreach ($res as $key => $value){
    $config[] = $value;
    $projeto = $config[$cont][0];
    $teclado = $config[$cont][1];
    $id = $config[$cont][1];

    $query = "INSERT INTO tb_tablets (tablet,senha,tb_projetos_id_projeto,tb_formularios_id_formulario, tb_config_projetos_id_config) VALUES ('{$nome}',md5('{$senha}'),{$projeto},{$teclado},{$id})";
    $result = mysqli_query($conexao,$query);
    $cont++;
}
//echo var_dump($config);

/* $query = "INSERT INTO tb_tablets (tablet,senha,tb_projetos_id_projeto,tb_formularios_id_formulario, tb_config_projetos_id_config) VALUES ('{$nome}',md5('{$senha}'),{$projeto},{$teclado},{$id})";
$result = mysqli_query($conexao,$query); */

 if($result){
    $_SESSION['sucesso'] = true;
    header('Location: ../paginas/paginaTablets.php');
    exit();
}else{
    $_SESSION['erro'] = true;
    header('Location: ../paginas/paginaTablets.php');
    exit();
} 