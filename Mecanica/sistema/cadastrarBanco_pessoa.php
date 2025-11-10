<html>	
    <body>
		<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "mecanica";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$nomeUsuario = $conexao -> real_escape_string($_POST['nomeUsuario']);
				$senha = $conexao -> real_escape_string($_POST['senha']);
                $cargo = $conexao -> real_escape_string($_POST['cargo']);

				$sql = "INSERT INTO `mecanica`.`pessoa`
							(`nome`, `senha`, `cargo`)
						VALUES
							('".$nomeUsuario."', '".$senha."', '".$cargo."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>