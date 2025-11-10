<html>	
    <body>
		<?php
		session_start();
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "escola_db";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$usuario = $conexao -> real_escape_string($_POST['usuario']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql = "INSERT INTO `escola_db`.`funcionario`
							(`nome`, `senha`)
						VALUES
							('".$usuario."', '".$senha."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site.php', true, 301);
			}
		?>
	</body>
</html>