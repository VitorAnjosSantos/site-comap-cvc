 <?php
	session_start();
	include('./conexao_usuario.php');
	$id = $_GET['id'];
   	
	?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Gerar Planilha</title>
	<head>
	<body>
		<?php
	// Definimos o nome do arquivo que será exportado
	$arquivo = '';
	
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';	
	$html .= '<table border="1">';
		

	$sql = "SELECT * FROM tb_veiculos v 
			JOIN tb_usuarios u ON v.tb_usuarios_id_usuario = u.id_usuario
			JOIN tb_config_projeto c ON u.tb_config_projeto_id_projeto = c.id_config_projeto
			WHERE v.id_veiculo = {$id}";	

	$idDevice = '';

	$result = mysqli_query($conexao,$sql); 
	$resultadoDaConsulta = $result; 

	if ($resultadoDaConsulta) {
		
		// Gera arquivo CSV
		//$fp = fopen("planilha.csv", "w +"); // o "a" indica que o arquivo será sobrescrito sempre que esta função for executada.
		//$escreve = fwrite($fp, "Pesquisador,Supervisor,Latitude,Longitude,Data,Hora,");
		
		$data = '';
		$hora = '';
		$date = '';
		$time = '';
		$botao = '';
		$count = 0;
		$count2 = 0;
		$aux = [];
		$totalVertical = 0;
		$totalHorizontal = "<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><b>TOTAL</b></td>";
		$array = [];
		$auxTotal = [];
		$formulario = mysqli_fetch_assoc($resultadoDaConsulta);

		$query = "SELECT * FROM tb_botoes WHERE tb_formularios_id_formulario = {$formulario['tb_formularios_id_formulario']}";
		$resultQuery = mysqli_query($conexao,$query); 
		$resultadoQuery = $resultQuery; 

		$html .= '<td><b>PESQUISADOR</b></td>';
		$html .= '<td><b>SUPERVISOR</b></td>';
		$html .= '<td><b>POSTO</b></td>';
		$html .= '<td><b>SENTIDO</b></td>';
		$html .= '<td><b>RODOVIA</b></td>';
		$html .= '<td><b>KM</b></td>';
		$html .= '<td><b>LATITUDE</b></td>';
		$html .= '<td><b>LONGITUDE</b></td>';
		$html .= '<td><b>DATA</b></td>';
		$html .= '<td><b>HORA</b></td>';

		foreach($resultadoQuery as $value) 
			{
				//$escreve = fwrite($fp, "$value[nome_relatorio],");
				$html .= '<td><b>'.$value['nome_relatorio'].'</b></td>';
			}

		$html .= '<td><b>TOTAL</b></td>';
		$html .= '<td><b>TRANSITO</b></td>';
		$html .= '<td><b>SIGA E PARE</b></td>';
		$html .= '<td><b>CHUVA</b></td>';

		//$escreve = fwrite($fp, "TOTAL,TRANSITO,SIGA E PARE,CHUVA");		

		foreach($resultadoDaConsulta as $registro) 
			{ 	
				$contagem = json_decode($registro['contagem'], true);
				$teste = $contagem;			
				
				foreach($teste as $key ) 
				{
					
					if(isset($key['latitude']) && isset($key['longitude'])){
						unset($key['latitude'],$key['longitude'],$key['date'],$key['time']);
					}else{
						unset($key['date'],$key['time']);
						$contagem[$count]['latitude'] = "";
						$contagem[$count]['longitude'] = "";
					}
					
					$latitude = $contagem[$count]['latitude'];
					$longitude = $contagem[$count]['longitude'];
					$date = $contagem[$count]['date'];
					$time = $contagem[$count]['time'];

					$html .= '<tr>';
					$html .= '<td>'.$registro['pesquisador'].'</td>';
					$html .= '<td>'.$registro['supervisor'].'</td>';
					$html .= '<td>'.$registro['posto'].'</td>';
					$html .= '<td>'.$registro['sentido'].'</td>';
					$html .= '<td>'.$registro['rodovia'].'</td>';
					$html .= '<td>'.$registro['km'].'</td>';
					$html .= '<td>'.$latitude.'</td>';
					$html .= '<td>'.$longitude.'</td>';
					$html .= '<td>'.$date.'</td>';
					$html .= '<td>'.$time.'</td>';
					

					$aux = $key;
					unset($key['transito']);	
					unset($key['sigapare']);
					unset($key['chuva']);  

					foreach($key as $k => $v) 
					{

						$totalVertical = array_sum($key);
						$auxTotal[$k] = 0;
							
						//$escreve = fwrite($fp, "".$key[$k].",");
						$html .= '<td>'.$key[$k].'</td>';
						
						
					}
					$html .= '<td>'.$totalVertical.'</td>';
					$html .= '<td>'.$aux['transito'].'</td>';
					$html .= '<td>'.$aux['sigapare'].'</td>';
					$html .= '<td>'.$aux['chuva'].'</td>';

					$html .= '</tr>';
					//$escreve = fwrite($fp, "".$totalVertical.",".$aux['transito'].",".$aux['sigapare'].",".$aux['chuva']);
					/* echo($totalVertical);
					var_dump($key); */

					$array[$count] = $key;

					
					$count++;
				}

				foreach($array as $key) 
					{

						foreach($key as $k => $v) 
						{
							$auxTotal[$k] += $key[$k];
							
								
						}
						
					}

				foreach($auxTotal as $key) 
					{

						$totalHorizontal .= '<td>'.$key.'</td>';
						
					}
					$html .= '<td>'.$totalHorizontal.'</td>';
					$html .= "<td></td><td></td><td></td><td></td>";
	
				$dateCorrigida = str_replace("/","-", $date );
				$timeCorrigido = str_replace(":","-", $time );
				
				$data= $dateCorrigida;
				$hora = $timeCorrigido;

				$idDevice = $registro["idDevice"];
			}
			

			//$escreve = fwrite($fp, $totalHorizontal);
			//var_dump($auxTotal);
		// Exibe o vettor JSON
		
		//fclose($fp);

		// $date = substr($StringJson, 2 , 10);
		 $dia= "D:".DIRECTORY_SEPARATOR;
		// $horas= substr($StringJson, 16 , 8);
		  $arquivo .= $data. '_'.$hora.'_'.$idDevice.".xls";
		  

		}
		
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>