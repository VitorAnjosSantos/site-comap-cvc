<?php 
session_start();
include('../objetos/navegacao2.php');
include('../objetos/conexao_usuario.php');

$sql = "SELECT * FROM tb_projetos";
$result = mysqli_query($conexao, $sql);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selecione um projeto</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
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
                    <h3 class="title has-text-black">Selecione um projeto</h3>
                    <?php
                        if(isset($_SESSION['erro'])):
                            
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Atenção!</strong> Selecione um projeto!.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                        endif;
                        unset($_SESSION['erro']);
                    ?>
                    <div class="box">
                        <form action="../objetos/validaSelecao.php" method="post">
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
                                       <input class="checkbox" name="projeto" type="radio" value="<?php echo $values['id_projeto'] ?>">
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
                              <input type="submit" class="button btn-primary" name="novoProjeto" id="novoProjeto" value="Selecionar Projeto">
                           </div>
                           
                        </form> 
                    </div>
                </div>
            </div>
    </section>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>