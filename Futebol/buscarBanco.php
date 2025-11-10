<?php
        $hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "futebol";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

            $nome = $conexao -> real_escape_string($_POST['nomejogador']);

			$sql="SELECT * FROM `futebol`.`jogador`
                    WHERE `nome` LIKE '%".$nome."%';";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo "Nome do Jogador: $row[1]";
                echo "<br>Posição: $row[2]";
                echo "<br>Camisa: $row[3]";
                echo "<br>Salário: R$$row[4],00";
                echo "<br>";
			}
			$conexao -> close();
		?>

        <center>
		<a href="index.php">Voltar</a>
	    </center>