<?php
session_start();

include_once("../objetos/conexao_usuario.php");

$id = $_SESSION['id'];

$result = "SELECT * FROM tb_config_projeto v 
			JOIN tb_projetos u
			ON v.tb_projetos_id_projeto = u.id_projeto
			WHERE u.id_projeto = {$id};";
			
$resultado = mysqli_query($conexao, $result);



?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modal</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Listar Cursos</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome do Projeto</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_cursos = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $rows_cursos['id_config_projeto']; ?></td>
									<td><?php echo $rows_cursos['rodovia']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>