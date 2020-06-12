<?php
session_start();

if(empty($_POST['projeto'])){
    $_SESSION['erro'] = true;
    header('Location: ../paginas/selecionarProjeto.php');
    exit();
}else{
    $_SESSION['projeto'] = $_POST['projeto'];
    header('Location: ../paginas/bancoDados.php');
    exit();
}



?>