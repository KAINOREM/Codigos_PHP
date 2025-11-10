<html>
    <head>
        <title>Sistema Estoque - Gestão de Estoque</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <?php
        session_start();

        $hostname = "127.0.0.1";
        $user = "root";
        $password = "";
        $database = "escola_db";
    
        $conexao = new mysqli($hostname, $user, $password, $database);
        echo '<div>
                <form method="post" action="buscarBanco.php">
                    <input type="text" name="busca" id="busca" placeholder="Buscar Produto" required>
                </form>
              </div>';

        $sql = "SELECT * FROM `escola_db`.`estoque` Where `Ativo` = 1;";

        $resultado = $conexao->query($sql);

        $produtos = [];
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $produtos[] = $linha;
            }
        }

        // Passo 2: aplicar Bubble Sort no campo 'Nome'
        $n = count($produtos);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strcasecmp($produtos[$j]['Nome'], $produtos[$j + 1]['Nome']) > 0) {
                    $temp = $produtos[$j];
                    $produtos[$j] = $produtos[$j + 1];
                    $produtos[$j + 1] = $temp;
                }
            }
        }
        
        foreach ($produtos as $estoque) {

            echo '<span>' . $estoque['Nome'] . '</span><br>';
            echo '<span>' . $estoque['Descricao'] . '</span><br>';
            echo '<span>Valor Unitário: R$' . $estoque['Valor_Unitario'] . '</span><br>';
            echo '<span>Quantidade: ' . $estoque['Quantidade'] . '</span><br>';
            echo '<span>Quantidade Mínima: ' . $estoque['Quantidade_Minima'] . '</span><br>';

            echo '<form method="POST" action="transacao.php">';
            echo '<input type="hidden" name="IdProduto" value="' . $estoque['IdProduto'] . '">';
            echo '<button type="submit">Movimentação</button></form>';

            echo '<form method="POST" action="apagarBanco.php">';
            echo '<input type="hidden" name="idProduto_Apagar" value="' . $estoque['IdProduto'] . '">';
            echo '<button type="submit">Apagar</button></form>';
            
            echo '<br><br>';
        }

        echo '<h1>Cadastrar um novo Produto</h1>
            <form method="post" action="CadastrarBanco_Produto.php" id="formCadastro" name="formCadastro" onsubmit="return verificarInformacoes()"> 
                <div>
                    <label for="Produto">Nome do Produto:</label>
                    <input type="text" name="nome" id="nome" required>
                </div>
                <div>
                    <label for="cliente">Descrição:</label>
                    <input type="text" name="descricao" id="descricao"required>
                </div>
                <div>
                    <label for="Produto">Valor da Unidade:</label>
                    <input type="number" min="0" name="valor_unitario" id="valor_unitario"required>
                </div>
                <div>
                    <label for="cliente">Quantidade:</label>
                    <input type="number" min="0" name="Quantidade" id="Quantidade"required>
                </div>
                <div>
                    <label for="Produto">Quantidade Mínima:</label>
                    <input type="number" min="0" name="Quantidade_Minima" id="Quantidade_Minima"required>
                </div>
            <button type="submit">Cadastrar</button>
        </form>';
               
        $conexao->close();
        ?>
        <div>
            <a href="site.php">Retornar</a>
        </div>
    </body>
</html>
