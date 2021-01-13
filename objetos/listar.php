<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include("./conexao_usuario.php");


$sentidos = $_POST['sentidos'];
$dataCorrigida = "%";
$dataSelecionada = $_POST['datas'];
$nomeCompleto = [];
$count = 0;
$date = '';
$time = '';

if(!empty($dataSelecionada) && !empty($sentidos)){
    $dataCorrigida .= str_replace("-","/", $dataSelecionada );
    $dataCorrigida .= "%";
    /* echo $dataCorrigida; */

    $sql = "SELECT * FROM tb_veiculos v 
            JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
            JOIN tb_config_projeto c ON v.tb_config_projeto_id_posto_sentido = c.id_config_projeto
            WHERE c.id_config_projeto = {$sentidos} AND  v.contagem Like '{$dataCorrigida}'";

}elseif(!empty($dataSelecionada) ){
    $dataCorrigida .= str_replace("-","/", $dataSelecionada );
    $dataCorrigida .= "%";

    $sql = "SELECT * FROM tb_veiculos v 
        JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
        JOIN tb_config_projeto c ON u.tb_config_projeto_id_projeto = c.id_config_projeto
        WHERE v.contagem Like '{$dataCorrigida}'";
}else{

    $sql = "SELECT * FROM tb_veiculos v 
        JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
        JOIN tb_config_projeto c ON u.tb_config_projeto_id_projeto = c.id_config_projeto
        WHERE c.id_config_projeto = {$sentidos}";
}

$result = mysqli_query($conexao,$sql);

if($result){

    foreach($result as $value){
        $contagem = json_decode($value['contagem'], true);
        $teste = $contagem;			

        foreach($teste as $key ) 
        {
            
            unset($key['latitude'],$key['longitude'],$key['date'],$key['time']);

            $date = $contagem[0]['date'];
            $time = $contagem[0]['time'];

            $dateCorrigida = str_replace("/","-", $date );
            $timeCorrigido = str_replace(":","-", $time );
            
            $data = $dateCorrigida;
            $hora = $timeCorrigido;
            $idDevice = $value["idDevice"];
            $posto = $value["posto"];
            $sentido = $value["sentido"];

            $nome = $posto.'_'.$sentido.'_'.$data.'_'.$hora.'_'.$idDevice.".xls";
            $nomeCompleto[$count] = str_replace("/","-", $nome );
        }
        
        $count++;
    }
    

    echo json_encode($nomeCompleto);
    
} 





?>