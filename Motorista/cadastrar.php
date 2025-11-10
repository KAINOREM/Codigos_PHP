<html>
    <head>
        <title>.: Meu lindo site :.</title>
    
		<style>
			.imagemLogo{
				width:8%;
				height:12%;
			}
			
			.tituloSite{
				position:absolute;
				top:22px;
				font-size:44px;
				text-shadow:2px 2px #ff0000;
			}
		</style>
	</head>
	
    <body>
		<form method="post" action="cadastrarBanco.php" id="formlogin" name="formlogin" >
			<label>Nome: </label>
			<input type="text" name="nomeUsuario" id="nomeUsuario" size="20"><br/>
		
			<label>Idade: </label>
			<input type="text" name="idade" id="idade" size="20">
			<br>

            <label>Tem Carteira: </label>
			<input type="text" name="carteira" id="carteira" size="20">
			<br>
			<center>
				<input type="submit" value="CADASTRAR"  />
			</center>
		</form>
	</body>
</html>