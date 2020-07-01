<?php 
session_start();
include('../objetos/navegacao2.php');
include('../objetos/conexao_usuario.php');

$sql = "SELECT * FROM tb_projetos";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Projeto</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .checkbox{
        margin-top: 3px;
    }
</style>

<body>
    <section class="hero is-success is-fullheight">
            <div class="container has-text-centered">
                <div class="column is-6 is-offset-3">
                    <h3 class="title has-text-black">Projetos</h3>
                    <div class="box">
                    <div id="teste"></div>
                    <form id="formProjetos" method="POST">
                        
                        <div class="row">
                             <div class="col checkbox">
                            </div>
                            <div class="col">
                                <h4>#</h4>
                            </div>
                            <div class="col">
                                <h4>Projeto</h4>                                  
                            </div>
                        </div>

                        <?php foreach($result as $values){?>

                            
                            <div class="row">

                                <div class="col checkbox">
                                    <input class="checkbox" name="projeto" id="projeto['<?php $values['id_projeto']?>']" type="radio" value="<?php echo $values['id_projeto'] ?>">
                                </div>
                                <div class="col">
                                    <h4><?php echo $values['id_projeto']; ?></h4>
                                </div>
                                <div class="col">
                                    <h4><?php echo $values['nome']; ?></h4>     
                                </div>

                             </div>

                        <?php
                        }   
                        ?>

                        <div style="margin-bottom: 10px ">
                            <button class="button btn-primary" type="button" name="novoProjeto" id="novoProjeto" data-toggle="modal" data-target="#novoProjetoMocal">
                            + Novo Projeto
                            </button>
                        </div>
                            
                        <div class="row" id="botoes">
                            
                        
                        </div>

                    </form>

<div class="modal fade" id="novoProjetoMocal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"></h4>
            </div>
            <div class="container theme-showcase" role="main">
                
            <h3 class="title has-text-grey">Criar Novo Projeto</h3>

                <div class="box">
                    <form action="../objetos/novoProjeto.php" method="POST">
                        <div class="field">
                            <div class="control">
                                <input name="nome" class="input is-large" placeholder="Novo Projeto" autofocus="" type="text">
                            </div>
                        </div>

                        <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
    </section>

    <script>
        var checa = document.getElementsByName("projeto");
        var numElementos = checa.length;
        var editarNome = document.getElementById("editarNome");
        var editarPostos = document.getElementById("editarPostos");
        for(var x=0; x<numElementos; x++){
            checa[x].onclick = function(){
                // "input[name='projeto']:checked" conta os checkbox checados
                var cont = document.querySelectorAll("input[name='projeto']:checked").length;
                // ternário que verifica se há algum checado.
                // se não há, retorna 0 (false), logo desabilita o botão
                var lista = $("[name= projeto]")
                            .filter(':checked')           // filtra pelos checados
                            .map(function(idx, element) { // transforma a lista
                                return element.value;       // nesse exemplo, uma lista de valores
                            });
                var json = {id: lista[0]};
                var dados = json;
                $.ajax({
                url: '../objetos/modalEditarNomeProjeto.php',
                type: 'post',
                datatype: 'json',
                data: dados,
                success: function(retorna){
                    $("#botoes").append(retorna);
                }
                });

            }
        }

       

    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>