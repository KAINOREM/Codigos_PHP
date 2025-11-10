<html>	
    <body>
		<?php
		session_start();
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "teste";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$modelo = $conexao -> real_escape_string($_POST['modelo']);
                $placa = $conexao -> real_escape_string($_POST['placa']);
                $ano = $conexao -> real_escape_string($_POST['ano']);
                $dono = $conexao -> real_escape_string($_POST['dono']);

				$sql = "INSERT INTO `teste`.`ordenar`
							(`modelo`, `Ano_Lancamento`, `Placa`, `Dono`)
						VALUES
							('".$modelo."', '".$ano."', '".$placa."', '".$dono."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>