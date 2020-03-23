<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	<head>
	<body>
		<?php
           foreach(new DirectoryIterator("D:".DIRECTORY_SEPARATOR) as $fileInfo){
               if($fileInfo->isDot()) continue;

               $arquivoNome = $fileInfo->getFilename();

               $array = explode('_', $arquivoNome);

               $termo = $_POST["busca"];

               if (in_array($termo, $array)) {
                echo 'Tag encontrada';
                ?>
                <li>
                   <?php 
                        echo $arquivoNome;
                   ?>
                   <a href="<?php echo "./objetos/gerarDownload.php?file=".$arquivoNome;?>">Download</a>
               </li>
               <?php
              }

               
               
           } ?>   
	</body>
</html>