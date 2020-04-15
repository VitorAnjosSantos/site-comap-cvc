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

            .label{
                color:black;
            };  
            /* onkeypress='return event.charCode >= 48 && event.charCode <= 57' */
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
                    
                    <div class='form-group0' id="div0">
                        <label class='label' id='0' autofocus='' type='text'>
                        <input class='posto[0]' name='posto[]' class='0' placeholder='Posto' autofocus='' type='text'>
                        <input class='rodovia[0]' name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>
                        <input class='km[0]' name='km[]' placeholder='Km' autofocus='' type='text'>
                        <input class='sentido[0]' name='sentido[]' placeholder='Sentido' autofocus='' type='text' > 
                        <input class='dataInicio[0]' name='dataInicio[]' placeholder='Data de Inicio' autofocus='' type='text' > 
                        <input class='dataFim[0]' name='dataFim[]' placeholder='Data Final' autofocus='' type='text' > 
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
            var cont = 0;
            
        $("#add-campo").click(function () {
            cont++;
           
            $("#formulario").append("<div class='form-group" + cont + "' id='div" + cont + "'><label class='label' id='"+ cont +"' autofocus='' type='text'><input class='posto["+ cont +"]' id='posto["+ cont +"]' name='posto[]' placeholder='Posto' autofocus='' type='text'> <input class='rodovia["+ cont +"]' id='rodovia["+ cont +"]' name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>  <input class='km["+ cont +"]' id='km["+ cont +"]' name='km[]'  placeholder='Km' autofocus='' type='text'>"+
            "  <input class='sentido["+ cont +"]' id='sentido["+ cont +"]' name='sentido[]' placeholder='Sentido' autofocus='' type='text'> <input class='dataInicio["+ cont +"]' id='dataInicio["+ cont +"]' name='dataInicio[]' placeholder='Data de Inicio' autofocus='' type='text' > <input class='dataFim["+ cont +"]' id='dataFim["+ cont +"]' name='dataFim[]' placeholder='Data Final' autofocus='' type='text' > <button type='button' id='campo" + cont + "' class='mais-campos'> + </button></label>   </div>"
            );
            
        });
        $('form').on('click', '.mais-campos', function () {
                var button_id = $(this).parents('div').attr("class");
                var div_id = $(this).parents('div').attr("id");
                var idNumero = $(this).parent().attr("id");

                var posto = $('.'+button_id).find('input').eq(0);
                var rodovia = $('.'+button_id).find('input').eq(1);
                var km = $('.'+button_id).find('input').eq(2);
                var dataInicio = $('.'+button_id).find('input').eq(4);
                var dataFim = $('.'+button_id).find('input').eq(5);
                alert(dataFim.val());

                if(posto.val() == '' || rodovia.val() == '' || km.val() == '' || dataInicio.val() == '' || dataFim.val() == ''){
                    alert("Preencha todos os campos corretamente");
                }else{
                var inputPosto = posto;
                $(inputPosto).val(posto.val());

                var inputRodovia = rodovia;
                $(inputRodovia).val(rodovia.val());

                var inputKm = km;
                $(inputKm).val(km.val());

                var inputDataInicio = dataInicio;
                $(inputDataInicio).val(dataInicio.val());

                var inputDataFim = dataFim;
                $(inputDataFim).val(dataFim.val());
                

                // alert(posto);
                $("." + button_id).append("<div style='padding-bottom: 10px'> <input value='"+inputPosto.val()+"' name='posto[]' placeholder='Posto' autofocus='' type='text' style='display: none'> <input value='"+inputRodovia.val()+"' style='display: none' name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>  <input value='"+inputKm.val()+"' style='display: none' name='km[]'  placeholder='Km' autofocus='' type='text'>"+
                " <input value='"+inputDataInicio.val()+"' name='dataInicio[]' placeholder='Data de Inicio' autofocus='' type='text' style='display: none'> <input style='display: none' value='"+inputDataFim.val()+"' name='dataFim[]' placeholder='Data Final' autofocus='' type='text' > <input name='sentido[]'  placeholder='Sentido' autofocus='' type='text' onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div>");           
                }
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