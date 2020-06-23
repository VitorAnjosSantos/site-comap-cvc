<?php 
session_start();

include_once("../objetos/conexao_usuario.php");


?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Botões do Formulario</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>

            .distancia{
                margin-bottom: 5px;
                margin-right: 10px;
            }

            span{
                display: flex;
                color:black;
            }
           
            /* onkeypress='return event.charCode >= 48 && event.charCode <= 57' */
    </style>
    
</head>

<body>
<section class="hero is-success is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class=" is-offset-4">
                    <h3 class="title has-text-grey">Botões do Formulario</h3>
                <div class="box">
                    <label class="has-text-black" id="msg"></label>
                    <form id="formularioCadastrar" method="POST">
                        <div id="formulario" class="container">
                            
                        <div class='form-group0' id="div0">
                            <div class="row">
                                <div class="col-sm">
                                    <span class='label' type='text'>Nome
                                    <input class='nome[0] input distancia' name='nome[]' class='0' placeholder='Nome/Botão' autofocus='' type='text'>
                                    </span>
                                </div>
                                <div class="col-sm">
                                    <span class='label' type='text'>Nome/Relatorio
                                    <input class='nomeRelatorio[0] input distancia' name='nomeRelatorio[]' placeholder='Nome/Relatorio' autofocus='' type='text' > 
                                    </span>
                                </div>
                                <div class="col-sm">
                                    <span class='label' type='text'>Qtd/Eixos
                                    <input class='qtdEixos[0] input distancia' name='qtdEixos[]' placeholder='Qtd/Eixos' autofocus='' type='text' >
                                    </span>
                                </div>
                                <div class="col-sm">
                                    <span class='label' type='text'>Qtd/Suspensos
                                    <input class='qtdSuspensos[0] input distancia' name='qtdSuspensos[]' placeholder='Qtd/Suspensos' autofocus='' type='text'>
                                    </span>
                                </div>
                                <div class="col-sm">
                                    <span class='label' type='text'>Seq/Tablet
                                    <input class='seqTablet[0] input distancia' name='seqTablet[]' placeholder='Seq/Tablet' autofocus='' type='text'>
                                    </span>
                                </div><div class="col-sm">
                                    <span class='label' type='text'>Seq/Relatorio
                                    <input class='seqRelatorio[0] input distancia' name='seqRelatorio[]' placeholder='Seq/Relatorio' autofocus='' type='text' >   
                                    </span>  
                                </div>
                            </div>                             
                        </div>                              
                        </div>
                        <div class="buttons is-centered" style="padding-top: 20px;">

                            <button class="button btn-primary" type="button" id="add-campo">+ Adicionar Botão </button>

                            <input type="button" class="button is-success" name="cadastrar" id="cadastrar" value="Cadastrar" ></inpu>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>      
</section>

    <script>
            //https://api.jquery.com/click/
            var cont = 0;
            
        $("#add-campo").click(function () {
            cont++;
           
            $("#formulario").append("<div class='form-group" + cont + "' id='div" + cont + "'>"+
                                        "<div class='row'>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Nome"+
                                                "<input class='nome["+ cont +"] input distancia' id='nome["+ cont +"]' name='nome[]' class='0' placeholder='Nome/Botão' autofocus='' type='text'>"+
                                                "</span>"+
                                            "</div>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Nome/Relatorio"+
                                                "<input class='nomeRelatorio["+ cont +"] input distancia' id='nomeRelatorio["+ cont +"]' name='nomeRelatorio[]' placeholder='Nome/Relatorio' autofocus='' type='text' >"+
                                                "</span>"+
                                            "</div>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Qtd/Eixos"+
                                                "<input class='qtdEixos["+ cont +"] input distancia' id='qtdEixos["+ cont +"]' name='qtdEixos[]' placeholder='Qtd/Eixos' autofocus='' type='text' >"+
                                                "</span>"+
                                            "</div>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Qtd/Suspensos"+
                                                "<input class='qtdSuspensos["+ cont +"] input distancia' id='qtdSuspensos["+ cont +"]' name='qtdSuspensos[]' placeholder='Qtd/Suspensos' autofocus='' type='text'>"+
                                                "</span>"+
                                            "</div>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Seq/Tablet"+
                                                "<input class='seqTablet["+ cont +"] input distancia' id='seqTablet["+ cont +"]' name='seqTablet[]' placeholder='Seq/Tablet' autofocus='' type='text'>"+
                                                "</span>"+
                                            "</div>"+
                                            "<div class='col-sm'>"+
                                                "<span class='label' type='text'>Seq/Relatorio"+
                                                "<input class='seqRelatorio["+ cont +"] input distancia' id='seqRelatorio["+ cont +"]' name='seqRelatorio[]' placeholder='Seq/Relatorio' autofocus='' type='text' >"+
                                                "</span>"+
                                            "</div>"+
                                        "</div>"+
                                    " </div>"
            );
            
        });

        $('#cadastrar').click(function(){
            var dados = $("#formularioCadastrar").serialize();
            $.post("../objetos/configFormulario.php", dados, function (retorna){
                $("#msg").html(retorna);
            });
        });

        /* $('form').on('click', '.mais-campos', function () {
                var button_id = $(this).parents('div').attr("class");
                var div_id = $(this).parents('div').attr("id");
                var idNumero = $(this).parent().attr("id");

                var posto = $('.'+button_id).find('input').eq(0);
                var rodovia = $('.'+button_id).find('input').eq(3);
                var km = $('.'+button_id).find('input').eq(4);
                var dataInicio = $('.'+button_id).find('input').eq(1);
                var dataFim = $('.'+button_id).find('input').eq(2);
                

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
                $("." + button_id).append( "<div style='float: right'> <input value='"+inputPosto.val()+"' name='posto[]' placeholder='Posto' autofocus='' type='text' style='display: none'>"+
                " <input value='"+inputRodovia.val()+"' style='display: none' name='rodovia[]' placeholder='Rodovía' autofocus='' type='text'>"+
                " <input value='"+inputKm.val()+"' style='display: none' name='km[]'  placeholder='Km' autofocus='' type='text'>"+
                " <input value='"+inputDataInicio.val()+"' name='dataInicio[]' placeholder='Data de Inicio' autofocus='' type='text' style='display: none'>"+
                " <input style='display: none' value='"+inputDataFim.val()+"' name='dataFim[]' placeholder='Data Final' autofocus='' type='text' >"+
                " <input class='input distancia' name='sentido[]' style='margin-bottom: 20px; margin-top: -5px; float: right'  placeholder='Sentido' autofocus='' type='text'></div>");           
                }
            }); */
        
       

        
            //https://api.jquery.com/append/
    </script>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>