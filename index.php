
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastro</h1>

        <form action="insere.php" method="post">
            <label for="nome">Nome de usuário:</label>
            <input type="text" id="nome" name="nome" required>

            <br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" minlength="8" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <br><br>

            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
    </main>
</body>
</html>
