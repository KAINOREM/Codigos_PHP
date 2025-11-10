<html>
    <body>
		
		<?php
			// iniciar uma sessão
			session_start();
			
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "mecanica";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$nomeUsuario = $conexao -> real_escape_string($_POST['nomeUsuario']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql="SELECT * FROM `pessoa`
					WHERE `nome` = '".$nomeUsuario."'
					AND `senha` = '".$senha."';";

				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['idPessoa'] = $row[0];
					$_SESSION['nome'] = $row[1];
					$_SESSION['cargo'] = $row[3];
					$conexao -> close();
					
					header('Location: site.php', true, 301);
					exit();
				} else {
					
					$conexao -> close();
					header('Location: index.php', true, 301);
				}
			}
		?>
	</body>
</html>