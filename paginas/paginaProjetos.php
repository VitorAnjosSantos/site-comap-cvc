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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .checkbox{
        padding: 0px;
    }
</style>

<body>
    <section class="hero is-success is-fullheight">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Projetos</h3>
                    <div class="box">

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
                                    <input class="checkbox" type="checkbox" value="<?php $values['id_projeto'] ?>">
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
                        <input type="button" class="button btn-primary" name="novoProjeto" id="novoProjeto" value="+ Novo Projeto" ></inpu>
                        </div>
                            
                        <div class="row">
                            <div class="col" style="display: flex">
                                <input type="button" class="button btn-warning " name="editarNome" id="editarNome" value="Editar Nome" ></input>
                            </div>
                            <div class="col" style="display: flex">
                                <input type="button" class="button btn-warning " name="editarPostos" id="editarPostos" value="Editar Postos" ></input>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
    </section>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>