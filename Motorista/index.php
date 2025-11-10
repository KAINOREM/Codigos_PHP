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
			$database = "motorista";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `motorista`.`pessoa`;";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo "Nome: $row[1]";
                echo "<br>Idade: $row[2]";
                echo "<br>Tem Carteira? $row[3]";
                echo "<br>";
			}
			echo '<hr>';
			$conexao -> close();
		?>
    </body>
</html>