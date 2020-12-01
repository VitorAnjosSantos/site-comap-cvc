
<?php
session_start();

include("./conexao_usuario.php");

$id = $_SESSION['id'];
$nome = $_POST["nome"];
$nomeRelatorio = $_POST["nomeRelatorio"];
$qtdEixos = $_POST["qtdEixos"];
$qtdSuspensos = $_POST["qtdSuspensos"];
$seqTablet = $_POST["seqTablet"];
$seqRelatorio = $_POST["seqRelatorio"];
$cores = $_POST["cores"];

$array = ['nome' => $nome, 'nomeRelatorio' => $nomeRelatorio,'qtdEixos' => $qtdEixos, 'qtdSuspensos' => $qtdSuspensos, 'seqTablet' => $seqTablet,'seqRelatorio' => $seqRelatorio,'cores' => $cores];

$res = array_map(null, $array["nome"], $array["nomeRelatorio"], $array["qtdEixos"], $array["qtdSuspensos"], $array["seqTablet"], $array["seqRelatorio"], $array["cores"]);


 $cont = 0;
 $botoes= [];
 
 foreach ($res as $key => $value){
        $botoes[] = $value;
        $nome = $botoes[$cont][0];
        $nomeRelatorio = $botoes[$cont][1];
        $qtdEixos = $botoes[$cont][2];
        $qtdSuspensos = $botoes[$cont][3];
        $seqTablet = $botoes[$cont][4];
        $seqRelatorio = $botoes[$cont][5];
        $cores = $botoes[$cont][6];
        //var_dump($cores);
        $sql = "INSERT INTO tb_botoes (nome_botao,nome_relatorio,qtd_eixos,qtd_suspensos,seq_tablet,seq_relatorio,cor,tb_formularios_id_formulario) 
                    VALUES ('{$nome}', '{$nomeRelatorio}', '{$qtdEixos}', '{$qtdSuspensos}', '{$seqTablet}', '{$seqRelatorio}','{$cores}',{$id})";
        $resultado = mysqli_query($conexao,$sql);
        $cont++;
 }

if($resultado){
    $_SESSION['sucessoPosto'] = true;
    
    $query = "SELECT * FROM tb_botoes b 
    INNER JOIN tb_formularios f
    ON b.tb_formularios_id_formulario = f.id_formulario
    WHERE f.id_formulario = {$id};";

    $result = mysqli_query($conexao, $query);  
    $nomeFormulario = mysqli_fetch_assoc($result);
    ?>
     <!-- Inicio Modal -->
    <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel"></h4>
                </div>
                <div class="container theme-showcase" role="main">
                    <div class="page-header">
                        <h1 style="text-align: left">Formulario <?php echo $nomeFormulario['nome']; ?></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Nome/Relatorio</th>
                                        <th>Qtd/Eixos</th>
                                        <th>Qtd/Suspensos</th>
                                        <th>Seq/Tablet</th>
                                        <th>Seq/Relatorio</th>
                                        <th>Cor/Botão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($result as $values){ ?>
                                        <tr>
                                            <td><?php echo $values['id_botao']; ?></td>
                                            <td><?php echo $values['nome_botao']; ?></td>
                                            <td><?php echo $values['nome_relatorio']; ?></td>
                                            <td><?php echo $values['qtd_eixos']; ?></td>
                                            <td><?php echo $values['qtd_suspensos']; ?></td>
                                            <td><?php echo $values['seq_tablet']; ?></td>
                                            <td><?php echo $values['seq_relatorio']; ?></td>
                                            <td><?php echo $values['cor']; ?></td>
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
            <strong>Sucesso!</strong> Os botões foram criados corretamente.
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
