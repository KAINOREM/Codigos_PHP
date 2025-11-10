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
				$nome = $conexao -> real_escape_string($_POST['nome']);
				$descricao = $conexao -> real_escape_string($_POST['descricao']);
				$valor_unitario = $conexao -> real_escape_string($_POST['valor_unitario']);
				$Quantidade = $conexao -> real_escape_string($_POST['Quantidade']);
				$Quantidade_Minima = $conexao -> real_escape_string($_POST['Quantidade_Minima']);

				$sql = "INSERT INTO `escola_db`.`estoque` (`Nome`, `Descricao`, `Valor_Unitario`, `Quantidade`, `Quantidade_Minima`) 
						VALUES ('".$nome."', '".$descricao."', '".$valor_unitario."', '".$Quantidade."', '".$Quantidade_Minima."');";
				
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site_cadastrar_produto.php', true, 301);
			}
		?>
	</body>
</html>