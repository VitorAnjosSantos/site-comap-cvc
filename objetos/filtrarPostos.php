<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("./conexao_usuario.php");

$projeto = $_REQUEST['projetos'];
$arrayPosto = [];
/* $arrayPosto[] = 0;	 */

$result_sub_cat = "SELECT DISTINCT * FROM tb_config_projeto WHERE tb_projetos_id_projeto = {$projeto} GROUP BY posto";
$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
$rows = mysqli_num_rows($resultado_sub_cat);

if($rows > 0){
    while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
        $arrayPosto[] = array(
            'id'	=> $row_sub_cat['id_config_projeto'],
            'posto' => utf8_encode($row_sub_cat['posto']),
        );
    }
}else{
    $arrayPosto = 0;
}

/* 
if($arrayPosto == 0){
    echo(json_encode($arrayPosto));
}else{ */
echo(json_encode($arrayPosto));

?>