<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("./conexao_usuario.php");


$postos = $_POST['postos'];
$sentidos = $_POST['sentidos'];
$teste = '';

$sql = "SELECT * FROM tb_veiculos v 
        JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
        JOIN tb_config_projeto c ON u.tb_config_projeto_id_projeto = c.id_config_projeto
        WHERE c.id_config_projeto = {$sentidos}";

$result = mysqli_query($conexao,$sql);

if($result){

    foreach($result as $value){
        $teste = $value['sentido'];
    }

    echo json_encode($teste);
    
}





?>