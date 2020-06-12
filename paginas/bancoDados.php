<?php 
session_start();
include('../objetos/navegacao1.php');
include('../objetos/conexao_usuario.php');


$projeto = $_SESSION['projeto'];
/* unset($_SESSION['projeto']); */
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banco de Dados</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
   
</style>

<body>
    <section class="hero is-success is-fullheight">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey"></h3>
                    <div class="box">

                    <form id="filtro" method="POST">
                     <select name="postos" id="postos">
                        <option value="">Selecione...</option>
                        <?php
                           $sql = "SELECT DISTINCT posto FROM tb_config_projeto WHERE tb_projetos_id_projeto = {$projeto}";
                           $result = mysqli_query($conexao,$sql);
                           while($rows = mysqli_fetch_assoc($result)){
                              echo "<option value='".$rows['posto']."'>".$rows['posto']."</option>";
                              
                           }
                        
                        ?>
                        
                     </select>
                     <select name="sentidos" id="sentidos">
                        <option value="">Selecione...</option>                       
                     </select>

                     <input type="button" class="button is-success" name="filtrar" id="filtrar" value="Filtrar" ></inpu>

                     <span id="teste"></span>
                     </form>

                    </div>
                </div>
            </div>
    </section>
    
    <script type="text/javascript">
      $(function(){
			$('#postos').change(function(){
				if( $(this).val() ) {
					
					$.getJSON('../objetos/filtrar.php?search=',{postos: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Selecione...</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].sentido + '</option>';
						}	
                  
						$('#sentidos').html(options).show();
						
					});
				} else {
					$('#sentidos').html('<option value="">– Selecione... –</option>');
				}
			});
		});

      $('#filtrar').click(function(){
            event.preventDefault();
            var dados = $("#filtro").serialize();
           /*  $.post("../objetos/listar.php", dados, function (retorna){
               $('#teste').html(retorna);
            }); */
            $.ajax({
               url: '../objetos/listar.php',
               type: 'post',
               datatype: 'json',
               data: dados,
               success: function(retorna){
                  $('#teste').html(retorna);
                  console.log(retorna);
               }
            })
      });

	</script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>