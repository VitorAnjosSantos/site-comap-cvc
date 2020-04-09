<?php 
session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
            .form-group{
                padding: 5px;
            }

            .label{
                color:black;
            };  

    </style>
    
</head>

<body>
    <section class="hero is-success is-fullheight">
    <div class="hero-body">

        <div class="container has-text-centered">
          
            <h3 class="title has-text-grey">Configurações do Projeto</h3>
            <label class="has-text-black" id="msg"></label>
            <form id="formularioCadastrar" method="POST">
                <div id="formulario">
                <button style="margin-bottom: 20px" class="button is-link" type="button" id="add-campo">+ Adicionar Posto </button>
                    
                    <div class='form-group1' id="div1">
                        <label class='label' id='1' autofocus='' type='text'>P1 
                        <input value='1' name='posto[]' placeholder='Km' autofocus='' type='text' style='display: none'>
                        <input name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>
                        <input name='km[]' placeholder='Km' autofocus='' type='text'>
                        <input name='sentido[]' placeholder='Sentido' autofocus='' type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
                        <button type='button' id="campo1" class='mais-campos'> + </button>
                    </div>
                                      
                </div>
                    <div class="buttons has-addons is-centered" style="padding-top: 20px;">

                    <input type="button" class="button is-link" name="cadastrar" id="cadastrar" value="Cadastrar"></inpu>
                </div>

            </form>
            </div>

        </div>
    </section>

    <script>
            //https://api.jquery.com/click/
            var cont = 1;
        $("#add-campo").click(function () {
            cont++;
           
            $("#formulario").append("<div class='form-group" + cont + "' id='div" + cont + "'><label class='label' id='"+ cont +"' autofocus='' type='text'>P" + cont + " <input value='"+ cont +"' name='posto[]' placeholder='Km' autofocus='' type='text' style='display: none'> <input name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>  <input name='km[]'  placeholder='Km' autofocus='' type='text'>"+
            "  <input name='sentido[]' placeholder='Sentido' autofocus='' type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'> <button type='button' id='campo" + cont + "' class='mais-campos'> + </button></label>   </div>"
            );
            

        });
        $('form').on('click', '.mais-campos', function () {
                var button_id = $(this).parents('div').attr("class");
                var posto = $(this).parent().attr("id");
                alert(posto);
                $("." + button_id).append("<input value='"+ posto +"' name='posto[]' placeholder='Km' autofocus='' type='text' style='display: none'> <input name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>  <input name='km[]'  placeholder='Km' autofocus='' type='text'>"+
                "  <input name='sentido[]'  placeholder='Sentido' autofocus='' type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'>");
            });
        
        $('#cadastrar').click(function(){
            var dados = $("#formularioCadastrar").serialize();
            $.post("../objetos/configProjeto.php", dados, function (retorna){
                $("#msg").html(retorna);
            });
        });

        
            //https://api.jquery.com/append/
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>