<html>	
    <body>
		<?php
		session_start();
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sistema_bancario";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$IdProduto = $conexao -> real_escape_string($_POST['IdProduto']);
				$nome = $conexao -> real_escape_string($_POST['nome']);
				$descricao = $conexao -> real_escape_string($_POST['descricao']);
				$valor_unitario = $conexao -> real_escape_string($_POST['valor_unitario']);
				$Quantidade = $conexao -> real_escape_string($_POST['Quantidade']);
				$Quantidade_Minima = $conexao -> real_escape_string($_POST['Quantidade_Minima']);

				$sql = "UPDATE `escola_db`.`estoque`
						SET `nome` = '".$nome."', `descricao` = '".$descricao."', `valor_unitario` = '".$valor_unitario."', `Quantidade` = '".$Quantidade."', `Quantidade_Minima` = '".$Quantidade_Minima."'
						WHERE `IdProduto` = '".$IdProduto."';";
				
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site_cadastrar_produto.php', true, 301);
			}
		?>
	</body>
</html>