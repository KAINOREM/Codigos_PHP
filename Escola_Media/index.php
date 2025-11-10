<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header class="cabecalho">
        <div class="container">
            <h1 class="titulo-principal sem-margem">Meu Site</h1>
        </div>
    </header>

    <main class="container">
        <section class="secao">
            <h2 class="titulo-secundario">Bem-vindo</h2>
            
            <form method="POST" action="cadastrarBanco.php">
            <div class="grupo-form card">
                <label class="rotulo" for="nome">Nome completo</label>
                <input type="text" name="nome" class="campo">

                <label class="rotulo" for="nome">Primeira Nota</label>
                <input type="text" name="nota1" class="campo">

                <label class="rotulo" for="nome">Segunda Nota</label>
                <input type="text" name="nota2" class="campo">

                <label class="rotulo" for="nome">Terceira Nota</label>
                <input type="text" name="nota3" class="campo">

                <label class="rotulo" for="nome">Quarta Nota</label>
                <input type="text" name="nota4" class="campo">

                <label class="rotulo" for="nome">Professor</label>
                <input type="text" name="professor" class="campo">

                <label class="rotulo" for="nome">Matéria</label>
                <input type="text" name="materia" class="campo">
            </div>

            <div class="centralizado">
                <button type="submit" class="botao">Cadastrar</button>
            </div>
        </form>
        <div id="resultados-alunos">
        </div>
        </section>
        <div class="centralizado">
                <button onclick="ordemNome()" class="botao">Ordenar por Nome</button>
        </div>
        <br>
        <div class="centralizado">
                <button onclick="ordemMateria()" class="botao">Ordenar por Materia</button>
        </div>
    </main>
    
    <script>
        function ordemNome() {
        fetch('ordenar_nome.php?ordenar_por=nome')
            .then(response => response.text())
            .then(data => {
                // Insere o HTML retornado pelo PHP na div de resultados
                document.getElementById('resultados-alunos').innerHTML = data;
            })
            .catch(error => {
                console.error('Erro ao buscar dados:', error);
                document.getElementById('resultados-alunos').innerHTML = 'Não foi possível carregar os dados.';
            });
        }

        function ordemMateria() {
        fetch('ordenar_materia.php?ordenar_por=materia')
            .then(response => response.text())
            .then(data => {
                // Insere o HTML retornado pelo PHP na div de resultados
                document.getElementById('resultados-alunos').innerHTML = data;
            })
            .catch(error => {
                console.error('Erro ao buscar dados:', error);
                document.getElementById('resultados-alunos').innerHTML = 'Não foi possível carregar os dados.';
            });
        }


    </script>

</body>
</html>