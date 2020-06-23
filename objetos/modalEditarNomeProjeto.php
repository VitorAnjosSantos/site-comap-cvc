<?php
session_start();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

/* var_dump($_POST['id']); */
 echo json_encode('<div class="modal fade" id="editarNomeProjeto" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"></h4>
            </div>
            <div class="container theme-showcase" role="main">
                
            <h3 class="title has-text-grey">Editar Nome do Projeto</h3>

                <div class="box">
                    <form action="../objetos/editarNomeProjeto.php" method="POST">
                        <div class="field">
                            <div class="control">
                                <input name="nome" class="input is-large" placeholder="Novo Projeto" autofocus="" type="text">
                                <input type="hidden" name="projeto['.$_POST['id'].']" name="projeto['.$_POST['id'].']">
                            </div>
                        </div>

                        <button type="submit" class="button is-block is-link is-large is-fullwidth">Editar</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col" style="display: float-left">
    <input  type="button" class="button btn-warning " name="editarNome" id="editarNome" value="Editar Nome" data-toggle="modal" data-target="#editarNomeProjeto"></input>
</div>                           
<div class="col" style="display: float-right">
    <input type="button" class="button btn-warning " name="editarPostos" id="editarPostos" value="Editar Postos" ></input>
</div>');


?>



