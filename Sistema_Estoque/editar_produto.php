<html>
    <head>
        <title>Sistema Bancário - Editar Produto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div>
            <h1>Editar Produto</h1>
            
            <div>
                <h2>Dados</h2>

                <?php
                    session_start();

                    $hostname = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $database = "escola_db";
                
                    $conexao = new mysqli($hostname, $user, $password, $database);

                    $IdProduto_Editar = $_POST['IdProduto_Editar'];

                    $sql = "SELECT * FROM `escola_db`.`estoque` Where `IdProduto` = ".$IdProduto_Editar.";";
                    

                    $resultado = $conexao->query($sql);
                        
                    while ($estoque = $resultado->fetch_assoc()) {

                        echo '<form method="post" action="EditarBanco_Produto.php" id="formCadastro" name="formCadastro"> 
                                    <div>
                                        <label for="Produto">Nome do Produto:</label>
                                        <input type="text" name="nome" id="nome" value="' . $estoque['Nome'] . '" required>
                                    </div>
                                    <div>
                                        <label for="cliente">Descrição:</label>
                                        <input type="text" name="descricao" id="descricao" value="' . $estoque['Descricao'] . '" required>
                                    </div>
                                    <div>
                                        <label for="Produto">Valor da Unidade:</label>
                                        <input type="number" min="0" name="valor_unitario" id="valor_unitario" value="' . $estoque['Valor_Unitario'] . '" required>
                                    </div>
                                    <div>
                                        <label for="cliente">Quantidade:</label>
                                        <input type="number" min="0" name="Quantidade" id="Quantidade" value="' . $estoque['Quantidade'] . '" required>
                                    </div>
                                    <div>
                                        <label for="Produto">Quantidade Mínima:</label>
                                        <input type="number" min="0" name="Quantidade_Minima" id="Quantidade_Minima" value="' . $estoque['Quantidade_Minima'] . '" required>
                                    </div>
                                    <input type="hidden" name="IdProduto" id="IdProduto" value="' . $estoque['IdProduto'] .'">
                                <button type="submit">Editar</button>
                            </form>';
                    }
                    
                    $conexao->close();
                ?>      
                <div class="container-center">
                    <a href="site_cadastrar_produto.php">← Voltar ao Painel</a>
                </div>
            </div>
        </div>
    </body>
</html>