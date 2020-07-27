<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("./conexao_usuario.php");

$posto = $_REQUEST['postos'];
$arraySentido = [];

$result_sub_cat = "SELECT * FROM tb_config_projeto WHERE posto = '{$posto}' ORDER BY sentido";
$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
$rows = mysqli_num_rows($resultado_sub_cat);

if($rows > 0){
    while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
        $arraySentido[] = array(
            'id'	=> $row_sub_cat['id_config_projeto'],
            'sentido' => utf8_encode($row_sub_cat['sentido']),
        );
    }
}else{
    $arraySentido = 0;
}
echo(json_encode($arraySentido));

?>