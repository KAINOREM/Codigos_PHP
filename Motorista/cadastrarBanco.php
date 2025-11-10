<html>	
    <body>
		<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "motorista";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$nomeUsuario = $conexao -> real_escape_string($_POST['nomeUsuario']);
				$idade = $conexao -> real_escape_string($_POST['idade']);
                $carteira = $conexao -> real_escape_string($_POST['carteira']);

				if (strtoupper($carteira) == 'SIM') {
					$sql = "INSERT INTO `motorista`.`pessoa`
								(`nome`, `idade`, `carteira`)
							VALUES
								('".$nomeUsuario."', '".$idade."', 'Sim');";

					$resultado = $conexao->query($sql);
					$conexao -> close();
					header('Location: index.php', true, 301);
				} Else If ((strtoupper($carteira) == 'NÃO') OR (strtoupper($carteira) == 'NAO')){
					$sql = "INSERT INTO `motorista`.`pessoa`
								(`nome`, `idade`, `carteira`)
							VALUES
								('".$nomeUsuario."', '".$idade."', 'Não');";

					$resultado = $conexao->query($sql);
					$conexao -> close();
					header('Location: index.php', true, 301);
				} Else {
					echo "Insira uma resposta válida";
					header('Location: cadastrar.php', true, 301);
				}
	
			}
		?>
	</body>
</html>