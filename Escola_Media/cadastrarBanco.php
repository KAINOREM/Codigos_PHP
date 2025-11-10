<html>	
    <body>
		<?php
		session_start();
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "escola";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$nome = $conexao -> real_escape_string($_POST['nome']);
                $nota1 = $conexao -> real_escape_string($_POST['nota1']);
                $nota2 = $conexao -> real_escape_string($_POST['nota2']);
                $nota3 = $conexao -> real_escape_string($_POST['nota3']);
				$nota4 = $conexao -> real_escape_string($_POST['nota4']);
                $professor = $conexao -> real_escape_string($_POST['professor']);
                $materia = $conexao -> real_escape_string($_POST['materia']);
				$media = ($_POST['nota1'] + $_POST['nota2'] + $_POST['nota3'] + $_POST['nota4']) / 4;
				$status;
				if ($media >= 7) {
					$status = 'Aprovado';
				} else {
					$status = 'Reprovado';
				};

				$sql = "INSERT INTO `escola`.`aluno`
							(`nome`, `Nota_1`, `Nota_2`, `Nota_3`, `Nota_4`, `Media`, `Status`, `Professor`, `Materia`)
						VALUES
							('".$nome."', '".$nota1."', '".$nota2."', '".$nota3."', '".$nota4."', '".$media."', '".$status."', '".$professor."', '".$materia."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>