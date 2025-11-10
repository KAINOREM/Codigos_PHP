<html>
    <head>
        <title>Sistema Estoque - Movimentação</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div>
            <h1>Movimentação</h1>
            
            <div>
                <h2>Dados</h2>

                <?php
                    session_start();

                    $hostname = "127.0.0.1";
                    $user = "root";
                    $password = "";
                    $database = "escola_db";
                
                    $conexao = new mysqli($hostname, $user, $password, $database);

                    $IdProduto = $_POST['IdProduto'];


                        echo '<form method="post" action="transacaoBanco_Produto.php" id="formCadastro" name="formCadastro"> 
                                    <div>
                                        <label for="cliente">Quantidade movimentada:</label>
                                        <input type="number" name="Quantidade" id="Quantidade" required>
                                    </div>
                                    <input type="hidden" name="IdProduto" id="IdProduto" value="' . $IdProduto .'">
                                <button type="submit">Editar</button>
                            </form>';
                    
                    $conexao->close();
                ?>      
                <div>
                    <a href="site_gestao_estoque.php">← Voltar ao Painel</a>
                </div>
            </div>
        </div>
    </body>
</html>