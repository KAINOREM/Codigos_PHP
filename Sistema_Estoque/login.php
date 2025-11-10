<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hostname = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "escola_db";

    $conexao = new mysqli($hostname, $user, $password, $database);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);

    if (!empty($usuario) && !empty($senha)) {
        $sql = "SELECT * FROM funcionario WHERE Nome = '$usuario'";
        $resultado = $conexao->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $funcionario = $resultado->fetch_assoc();

            if (strtolower($senha) === strtolower($funcionario['Senha'])) {
                $_SESSION['Id'] = $funcionario['IdFuncionario'];
                $_SESSION['nome'] = $funcionario['Nome'];
                
                $conexao->close();
                header("Location: site.php");
                exit();
            } else {
                echo "<script>alert('Senha inválida!');</script>";
            }
        } else {
            echo "<script>alert('Usuário inválido!');</script>";
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos!');</script>";
    }

    $conexao->close();
}
?>

<html>
<head>
    <title>Busca Book - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <h2>Login</h2>

    <form method="post" action="login.php" id="formlogin" name="formlogin">
        <label>Nome:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Digite seu nome" required>

        <label>Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>