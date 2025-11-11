<html>
    <head>
        <title>Sistema Estoque - Histórico de Transações</title>
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

        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }

        $sql = "SELECT 
                    Est.nome AS Nome_Produto,
                    Fnc.Nome AS Nome_Funcionario,
                    Tr.Data_Transacao,
                    CASE 
                        WHEN Tr.tipo = 1 THEN 'Entrada' 
                        WHEN Tr.tipo = 2 THEN 'Saída' 
                        ELSE 'Desconhecido' 
                    END AS Tipo_Transacao,
                    Tr.Quantidade
                FROM 
                    Transacao Tr
                LEFT JOIN Funcionario Fnc ON Fnc.IdFuncionario = Tr.IdFuncionario
                LEFT JOIN Estoque Est ON Est.IdProduto = Tr.IdProduto
                ORDER BY Tr.Data_Transacao DESC";

        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
            while ($Historico = $resultado->fetch_assoc()) {
                //Htmlspecialchars para evitar XSS
                echo '<span>Produto: ' . htmlspecialchars($Historico['Nome_Produto']) . '</span><br>';
                echo '<span>Funcionario: ' . htmlspecialchars($Historico['Nome_Funcionario']) . '</span><br>';
                echo '<span>Tipo: ' . $Historico['Tipo_Transacao'] . '</span><br>';
                echo '<span>Quantidade: ' . htmlspecialchars($Historico['Quantidade']) . '</span><br>';
                echo '<span>Data: ' . htmlspecialchars($Historico['Data_Transacao']) . '</span><br><br>';
            }
        } else {
            echo "Nenhuma transação encontrada.";
        }

        $conexao->close();
        ?>

        <div>
            <a href="site.php">Retornar</a>
        </div>
    </body> 
</html>