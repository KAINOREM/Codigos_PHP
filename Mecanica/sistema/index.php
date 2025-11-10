<html>
    <head>
        <title>Entrar</title>

    </head>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	
    <body>
		<center>
		<a href="cadastrar_pessoa.php">Cadastrar</a>
	    </center>
		<div class="divLogin">
			<form method="post" action="verificaLogin.php" id="formlogin" name="formlogin" >
				<label>>Nome: </label>
				<input type="text" name="nomeUsuario" id="nomeUsuario" size="20"><br />
				
				<label>>Senha: </label>
				<input type="password" name="senha" id="senha" size="20">
				<br>
				<center>
					<input type="submit" value="LOGAR"  />
				</center>
			</form>
		</div>
    </body>
</html>