<html>	
    <body>
		<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "futebol";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$nomeUsuario = $conexao -> real_escape_string($_POST['nomeUsuario']);
				$posicao = $conexao -> real_escape_string($_POST['posicao']);
                $camisa = $conexao -> real_escape_string($_POST['camisa']);
                $salario = $conexao -> real_escape_string($_POST['senha']);

				$sql = "INSERT INTO `futebol`.`jogador`
							(`nome`, `posicao`, `camisa`, `salario`)
						VALUES
							('".$nomeUsuario."', '".$posicao."', '".$camisa."', '".$senha."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>