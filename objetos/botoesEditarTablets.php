<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
include('./conexao_usuario.php');
$sql = "SELECT * FROM tb_tablets";
$result = mysqli_query($conexao, $sql);
/* var_dump($_POST['id']); */

 echo json_encode('
 <div class="modal fade" id="modaleditarTablet" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel"></h4>
                    </div>
                    <div class="container theme-showcase" role="main">
                        
                    <h3 class="title has-text-grey">Criar Novo Tablet</h3>

                        <div class="box">
                            <form action="../objetos/novoTablet.php" method="POST">
                                <div class="field">
                                    <div class="control">
                                        <input name="nome" class="input is-large" placeholder="Novo Tablet" autofocus="" type="text">
                                    </div>
                                    
                                    <div class="control">
                                        <input name="senha" class="input is-large" type="password" placeholder="Senha do Tablet">
                                    </div>
                                
                                    <select name="projetos" id="projetos">
                                        <option value="">Selecione o Projeto...</option>
                                        
                                        $sql = "SELECT * FROM tb_projetos";
                                        $result = mysqli_query($conexao,$sql);
                                        while($rows = mysqli_fetch_assoc($result)){
                                        echo "<option value=.$rows["id_projeto"].>.$rows["nome"].</option>";
                                        }
                                        
                                        ?>
                                        
                                    </select>

                                    <select name="postos" id="postos">
                                        <option value="">Selecione o Posto...</option>                       
                                    </select>
                                    <select name="sentidos" id="sentidos">
                                        <option value="">Selecione o Sentido...</option>                       
                                    </select>

                                    <select name="teclados" id="teclados">
                                        <option value="">Selecione o Teclado...</option>
                                        <?php
                                        $sql = "SELECT * FROM tb_formularios";
                                        $result = mysqli_query($conexao,$sql);
                                        while($rows = mysqli_fetch_assoc($result)){
                                            echo "<option value=.$rows["id_formulario"].>.$rows["nome"].</option>";
                                            
                                        }
                                        
                                        ?>
                                        
                                    </select>


                                </div>
                                <input type="hidden" name="tablet['.$_POST['id'].']" name="tablet['.$_POST['id'].']">
                                <button type="submit" class="button is-block is-link is-large is-fullwidth">Criar</button>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col">

    <input  type="button" class="button btn-warning " name="editarTablet" id="editarTablet" value="Editar Tablet" data-toggle="modal" data-target="#modaleditarTablet"></input>
</div>                           
');


?>



