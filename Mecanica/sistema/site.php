<html>
    <head>
        <title>Site</title>

    </head>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	
    <body>
		<?php
		session_start();

			if (empty($_SESSION['idPessoa'])){
				// Logado??? Não?? Tchau, bb.
				header('Location: sair.php');
				exit();
			} else {
				echo '<table>
					<tr>
						<td width=50%>
							<center>
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							<br>
							<span class="corBranca">Cargo: '.$_SESSION['cargo'].'</span>
							</center>
						</td>
					</tr>
				</table>';
			}
        $hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "mecanica";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `mecanica`.`pecas`;";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo "Peça: $row[1]";
                echo "<br>Quantidade: $row[2]";
                echo "<br>Valor Unitário: R$$row[3]";
                echo "<br>";
			}
			echo '<hr>';
			$conexao -> close();
		?>
		<center>
		<a href="cadastrar_peca.php">Cadastrar Peça</a>
	    </center>
        <center>
		<a href="buscar.php">Buscar Peça</a>
	    </center>
		<center>
		<a href="index.php">Voltar</a>
	    </center>
    </body>
</html>