<html>
    <head>
        <title>Meu simples site...</title>

    </head>

	<style>
		.divLogin{
			border: 1px solid #969696;
			width: 15%;
			position: absolute;
			right: 3%;
		}
	</style>
	
    <body>
        <center>
		<a href="cadastrar.php">Cadastrar</a>
	    </center>
        <?php
        $hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "futebol";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `futebol`.`jogador`;";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo "Nome do Jogador: $row[1]";
                echo "<br>Posição: $row[2]";
                echo "<br>Camisa: $row[3]";
                echo "<br>Salário: R$$row[4],00";
                echo "<br>";
			}
			echo '<hr>';
			$conexao -> close();
		?>

        <center>
		<a href="buscar.php">Buscar jogador</a>
	    </center>
    </body>
</html>