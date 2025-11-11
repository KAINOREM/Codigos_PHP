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
				$IdProduto = (int)$conexao -> real_escape_string($_POST['IdProduto']);
				$Quantidade = (int)$conexao -> real_escape_string($_POST['Quantidade']);
				$Data = (int)$conexao -> real_escape_string($_POST['Data']);

				$sql = "SELECT Quantidade,Quantidade_Minima FROM `escola_db`.`estoque` WHERE IdProduto = '".$IdProduto."';";
				$resultado = $conexao->query($sql);
				
				$quantidade_atual = 0;
				if ($resultado && $resultado->num_rows > 0) {
					$row = $resultado->fetch_assoc();
					$quantidade_atual = (int)$row['Quantidade'];
				}
				
				$total = $quantidade_atual + $Quantidade;

				$sql = "UPDATE `escola_db`.`estoque`
						SET `Quantidade` = '".$total."'
						WHERE `IdProduto` = '".$IdProduto."';";
				
				$resultado = $conexao->query($sql);

				$tipo = 0;
				if($Quantidade > 0){
					$tipo = 1; // Entrada
				}else {
					$tipo = 2; // Saida
				};

				$quantidade_absoluta = $Quantidade;
				if($Quantidade < 0){
					$quantidade_absoluta = $Quantidade * -1;
				}

				$sql = "INSERT INTO `escola_db`.`transacao` (`IdProduto`, `IdFuncionario`, `Data_Transacao`, `tipo`, `Quantidade`) 
						VALUES ('".$IdProduto."', '" . (int)$_SESSION['Id'] . "' , '".$Data."','".$tipo."', '".$quantidade_absoluta."');"; /*1 = Entrada 2 = Saida*/
				
				$resultado = $conexao->query($sql);

				if($total < (int)$row['Quantidade_Minima']){
					echo '<script>
						alert("Atenção! O estoque deste produto está abaixo da quantidade mínima definida.");
						window.location.href = "site_gestao_Estoque.php";
					</script>';
				} else {
					header('Location: site_gestao_estoque.php', true, 301);
				}
				exit();
			}
		?>
	</body>
</html>