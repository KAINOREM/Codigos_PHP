<html>
    <head>
        <title>Sistema Estoque</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <?php
        session_start();

        if (empty($_SESSION['Id'])) {
            header('Location: index.php');
            exit();
        } else {
            echo '<div>
                    <div>
                        <center>
                        <span>Bem Vindo, ' . $_SESSION['nome'] . '</span>
                        </center>
                    </div>
                </div>';
        }

        $hostname = "127.0.0.1";
        $user = "root";
        $password = "";
        $database = "escola_db";
    
        $conexao = new mysqli($hostname, $user, $password, $database);
        
        $conexao->close();
        ?>
        
        <div>
            <a href="site_cadastrar_Produto.php">Cadastro de Produto</a>
        </div>
        <div>
            <a href="site_gestao_estoque.php">Gestão de Estoque</a>
        </div>
        <div>
            <a href="historico_transacoes.php">Histórico</a>
        </div>
        <div>
            <a href="index.php">Retornar</a>
        </div>
    </body>
</html>
