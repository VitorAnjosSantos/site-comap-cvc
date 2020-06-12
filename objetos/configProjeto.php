
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

$array = ['rodovia' => $rodovia, 'km' => $km,'posto' => $posto, 'sentido' => $sentido, 'dataInicio' => $dataInicio,'dataFim' => $dataFim];

$res = array_map(null, $array["rodovia"], $array["km"], $array["posto"], $array["sentido"], $array["dataInicio"], $array["dataFim"]);

 $cont = 0;
 $postos= [];
 
 foreach ($res as $key => $value){
        $postos[] = $value;
        $rodovia = $postos[$cont][0];
        $km = $postos[$cont][1];
        $posto = $postos[$cont][2];
        $sentido = $postos[$cont][3];
        $dataInicio = $postos[$cont][4];
        $dataFim = $postos[$cont][5];

        $sql = "INSERT INTO tb_config_projeto (rodovia, km, posto, sentido, dataInicio, dataFim, tb_projetos_id_projeto) 
                    VALUES ('{$rodovia}', '{$km}', '{$posto}', '{$sentido}', '{$dataInicio}', '{$dataFim}',{$id})";
        $resultado = mysqli_query($conexao,$sql);
        $cont++;
 }
if($resultado){
    $_SESSION['sucessoPosto'] = true;
    
    $result = "SELECT * FROM tb_config_projeto v 
    INNER JOIN tb_projetos u
    ON v.tb_projetos_id_projeto = u.id_projeto
    WHERE u.id_projeto = {$id};";

    $resultado2 = mysqli_query($conexao, $result);  
    $nomeProjeto = mysqli_fetch_assoc($resultado2);
    ?>
     <!-- Inicio Modal -->
    <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center" id="myModalLabel"></h4>
                            </div>
                            <div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1 style="text-align: left">Projeto <?php echo $nomeProjeto['nome']; ?></h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
                                <th>Posto</th>
                                <th>Rodovia</th>
								<th>Km</th>
								<th>Sentido</th>
								<th>Data Inicial</th>
								<th>Data Final</th>
							</tr>
						</thead>
						<tbody>
                            
                                <?php foreach($resultado2 as $values){ ?>
                                    <tr>
                                        <td><?php echo $values['id_config_projeto']; ?></td>
                                        <td><?php echo $values['posto']; ?></td>
                                        <td><?php echo $values['rodovia']; ?></td>
                                        <td><?php echo $values['km']; ?></td>
                                        <td><?php echo $values['sentido']; ?></td>
                                        <td><?php echo $values['dataInicio']; ?></td>
                                        <td><?php echo $values['dataFim']; ?></td>
                                    </tr>
                                <?php } ?>
                            
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal -->
                
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> Os postos foram criados corretamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-footer">
            </div>
            <div>
            <button class="button btn-primary" type="button" data-toggle="modal" data-target="#myModal<?php echo $id; ?>">
                Visualizar dados cadastrados
            </button>
            </div>
        </div>
       
<?php  
}


?>
