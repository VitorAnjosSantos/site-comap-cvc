<?php

include("./conexao_usuario.php");

$rodovia = $_POST["rodovia"];
$posto = $_POST["posto"];
$km = $_POST["km"];
$sentido = $_POST["sentido"];

foreach($posto as $values){
    echo $values;
}





?>
