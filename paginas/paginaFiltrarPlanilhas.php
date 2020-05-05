<?php
   include("../objetos/conexao_usuario.php");
?> 

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	<head>
	<body>
	<form action="./home.php" method="post">

		<select name="posto" id="posto">
			<?php
				$select = "SELECT DISTINCT posto FROM tb_usuarios";
				$sql = mysqli_query($conexao, $select);
				while($row= mysqli_fetch_assoc($sql) )
				{
				echo '<option value='.$row['posto'].'>'.$row['posto'].'</option>';
				}
			?>
		</select>

        <button type="submit">Buscar</button>
    </form>
	</body>
</html>