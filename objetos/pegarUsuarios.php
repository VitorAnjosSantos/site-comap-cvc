<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("./conexao_usuario.php");
$posto = $_POST['postos'];;
$sentido = $_POST['sentidos'];

$sql = "SELECT tb_usuarios_id_usuario FROM tb_veiculos v 
        JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
        JOIN tb_config_projeto c ON u.tb_config_projeto_id_projeto = c.id_config_projeto
        WHERE c.posto = '{$posto}' AND c.id_config_projeto = {$sentido};";

$result = mysqli_query($conexao,$sql);

foreach($result as $value){
    echo json_encode($value);

    
}

?>
            