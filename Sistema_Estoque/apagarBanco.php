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
				$Produto = $conexao -> real_escape_string($_POST['idProduto_Apagar']);

				

				$sql = "UPDATE `escola_db`.`estoque`
						SET Ativo = '0'
						WHERE `IdProduto` = '".$Produto."';";
				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site_cadastrar_produto.php', true, 301);
			}
		?>
	</body>
</html>