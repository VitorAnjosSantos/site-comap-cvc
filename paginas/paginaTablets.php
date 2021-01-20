<?php 
session_start();
include('../objetos/navegacao2.php');
include('../objetos/conexao_usuario.php');

$sql = "SELECT * FROM tb_tablets";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Tablet</title>
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
                <h3 class="title has-text-black">Tablets</h3>
                <div class="box">
                    <div id="teste"></div>
                    <form id="formTablets" method="POST">
                        
                        <div class="row">
                                <div class="col checkbox">
                            </div>
                            <div class="col">
                                <h4>#</h4>
                            </div>
                            <div class="col">
                                <h4>Tablets</h4>                                  
                            </div>
                        </div>

                        <?php foreach($result as $values){?>

                            
                            <div class="row">

                                <div class="col checkbox">
                                    <input class="checkbox" name="tablet" id="tablet['<?php echo $values['id_tablet']?>']" type="radio" value="<?php echo $values['id_tablet'] ?>">
                                </div>
                                <div class="col">
                                    <h4><?php echo $values['id_tablet']; ?></h4>
                                </div>
                                <div class="col">
                                    <h4><?php echo $values['tablet']; ?></h4>     
                                </div>

                                </div>

                        <?php
                        }   
                        ?>

                        <div style="margin-bottom: 10px ">
                            <button class="button btn-primary" type="button" name="novoTablet" id="novoTablet" data-toggle="modal" data-target="#novoTabletMocal">
                            + Novo Tablet
                            </button>
                        </div>
                            
                        <div class="row" id="botoes">
                            
                        
                        </div>

                    </form>

                    <div class="modal fade" id="novoTabletMocal" role="dialog">
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
                                                    <?php
                                                    $sql = "SELECT * FROM tb_projetos";
                                                    $result = mysqli_query($conexao,$sql);
                                                    while($rows = mysqli_fetch_assoc($result)){
                                                        echo "<option value=".$rows["id_projeto"].">".$rows["nome"]."</option>";
                                                        
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
                                                        echo "<option value=".$rows["id_formulario"].">".$rows["nome"]."</option>";
                                                        
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select>


                                            </div>

                                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Criar</button>
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
        var checa = document.getElementsByName("tablet");
        var numElementos = checa.length;
        var editarTablet = document.getElementById("editarTablet");
        for(var x=0; x<numElementos; x++){
            checa[x].onclick = function(){
                // "input[name='projeto']:checked" conta os checkbox checados
                var cont = document.querySelectorAll("input[name='tablet']:checked").length;
                // ternário que verifica se há algum checado.
                // se não há, retorna 0 (false), logo desabilita o botão
                var lista = $("[name= tablet]")
                            .filter(':checked')           // filtra pelos checados
                            .map(function(idx, element) { // transforma a lista
                                return element.value;       // nesse exemplo, uma lista de valores
                            });
                var json = {id: lista[0]};
                var dados = json;
                
                $.ajax({
                url: '../objetos/botoesEditarTablets.php',
                type: 'post',
                datatype: 'json',
                data: dados,
                success: function(html){
                    /* var resposta = JSON.parse(JSON.stringify(retorna)); */
                    $("#botoes").append(html);
                    console.log(html);
                }
                });

            }
        }

        $(function(){
			$('#projetos').change(function(){
				if( $(this).val() ) {
                 $.getJSON('../objetos/filtrarPostos.php?search=',{projetos: $(this).val(), ajax: 'true'}, function(j){
                    if(j == 0){
                        $('#postos').html('<option value="">– Selecione o Posto... –</option>');
                    }else{

                    
                        var options = '<option value="">Selecione o Posto...</option>';
                        
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].posto + '">' + j[i].posto + '</option>';
                        }	
                    
                        $('#postos').html(options).show();
                                
                        
                    }
                 });
				} else {
					$('#postos').html('<option value="">– Selecione o Posto... –</option>');
				}
			});
		});

        $(function(){
			$('#postos').change(function(){
				if( $(this).val() ) {
					
					$.getJSON('../objetos/filtrar.php?search=',{postos: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Selecione o Sentido...</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].sentido + '</option>';
						}	
                  
						$('#sentidos').html(options).show();
						
					});
				} else {
					$('#sentidos').html('<option value="">– Selecione o Sentido... –</option>');
				}
			});
		});
       

    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>