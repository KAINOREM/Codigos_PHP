<html>
	<body>
		Listar:
		<form action='index.php' method='POST'>
			<input type='text' value='1' name='nome'>
			<input type='submit' value='Listar'>
		</form>
		
		<?php
        	if(isset($_POST['nome'])){
        		$hostname = "127.0.0.1";
        		$user = "root";
        		$password = "";
        		$database = "teste";
        		
        		$conexao = new mysqli($hostname,$user,$password,$database);
        
        		$sql="SELECT * FROM `teste`.`ordenar`;";
        
        		$resultado = $conexao->query($sql);
        		$dados = []; //Cria um array/vetor para armazenar os dados
        
        		// Armazena os dados em um array
        		while($row = mysqli_fetch_array($resultado)){
        			$dados[] = $row[4];  // Supondo que você quer ordenar a segunda coluna
        		}
        
        		// Ordena os dados pelo método SORT
        		sort($dados);
        		
        		/*RELEMBRANDO
        		Tipos Comuns de Algoritmos de Ordenação
                    Bubble Sort (Método da Bolha): Percorre a lista comparando elementos adjacentes e
					trocando-os se não estiverem na ordem desejada.
                    Selection Sort (Método da Seleção): Encontra o menor (ou maior) elemento da
					lista e o coloca na posição correta.
                    Insertion Sort (Método da Inserção): Constrói a lista final um item de cada
					vez, inserindo cada novo elemento na posição correta dentro da porção já ordenada da lista. 
                    Quick Sort: Usa a estratégia de "divisão e conquista", dividindo o problema de ordenar
					a lista em subproblemas menores até que todos estejam resolvidos. 
                    Merge Sort: Similar ao Quick Sort, também utiliza a técnica de "divisão e conquista",
					dividindo a lista em partes menores, ordenando-as em vetores paralelos e depois combinando
					as partes.*/
            
        		// Exibe os dados ordenados
        		echo '<hr>';
        		foreach($dados as $dado){
        			echo $dado;
        			echo '<br>';
        		}
        		//Até aqui
        		
        		$conexao -> close();
        	}
        ?>
		<form action='cadastrarBanco.php' method='POST'>
			<p>Modelo:</p>
			<input type='text' value='' name='modelo'>
			<br>
			<p>Ano:</p>
			<input type='text' value='' name='ano'>
			<br>
			<p>Placa:</p>
			<input type='text' value='' name='placa'>
			<br>
			<p>Dono:</p>
			<input type='text' value='' name='dono'>
			<br>
			<input type='submit' value='Listar'>
		</form>
		
	</body>
</html>