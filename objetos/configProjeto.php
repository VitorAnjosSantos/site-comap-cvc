<?php
session_start();

include("./conexao_usuario.php");

$id = $_SESSION['id'];
$rodovia = $_POST["rodovia"];
$posto = $_POST["posto"];
$km = $_POST["km"];
$sentido = $_POST["sentido"];
$dataInicio = $_POST["dataInicio"];
$dataFim = $_POST["dataFim"];

$array = ['dataInicio' => $dataInicio,'dataFim' => $dataFim,'posto' => $posto, 'rodovia' => $rodovia, 'km' => $km, 'sentido' => $sentido];

$res = array_map(null, $array["dataInicio"], $array["dataFim"], $array["posto"], $array["rodovia"], $array["km"], $array["sentido"]);

 $cont = 0;
 $postos= [];
 
 foreach ($res as $key => $value){
        $postos[] = $value;
        $dataInicio = $postos[$cont][0];
        $dataFim = $postos[$cont][1];
        $posto = $postos[$cont][2];
        $rodovia = $postos[$cont][3];
        $km = $postos[$cont][4];
        $sentido = $postos[$cont][5];

        $sql = "INSERT INTO tb_config_projeto (rodovia, km, posto, sentido, dataInicio, dataFim, tb_projetos_id_projeto) 
                    VALUES ('{$rodovia}', '{$km}', '{$posto}', '{$sentido}', '{$dataInicio}', '{$dataFim}',{$id})";
        $resultado = mysqli_query($conexao,$sql);
        $cont++;
 }
if($resultado){
    $_SESSION['sucessoPosto'] = true;
    
    if(isset($_SESSION['sucessoPosto'])):
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> Os postos foram criados corretamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        endif;
        unset($_SESSION['sucessoPosto']);
}


?>
