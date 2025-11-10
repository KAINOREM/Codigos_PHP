<html>
    <head>
        <title>Busca Book - Cadastrar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <h1>Cadastrar Funcionário</h1>
        
        <h2>Dados</h2>
        
        <form method="post" action="cadastrarBanco_usuario.php">
            <label>Nome:</label>
            <input type="text" name="usuario" placeholder="Digite seu Nome" required><br><br>

            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite a Senha" required><br><br>
            
            <button type="submit">Cadastrar</button>
        </form>

        <br>
        <a href="index.php">Voltar</a>
    </body>
</html>