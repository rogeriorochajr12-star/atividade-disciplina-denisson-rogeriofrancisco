<?php
require_once 'pessoa.php';

$id = $_GET['id'] ?? null;
if ($id === null || !is_numeric($id)) {
    echo 'ID inválido.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $senha = trim($_POST['senha'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nome === '' || $senha === '' || $email === '') {
        echo 'Nome, senha e email são obrigatórios.';
        exit;
    }

    if (Pessoa::atualizar((int) $id, $nome, $senha, $email)) {
        header('Location: Consulta.php');
        exit;
    }

    echo 'Erro ao atualizar o cadastro.';
    exit;
}

$pessoa = Pessoa::buscarPorId((int) $id);
if (!$pessoa) {
    echo 'Cadastro não encontrado.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cadastro</title>
</head>
<body>
    <h3>Editar cadastro</h3>

    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars((string) $pessoa['nome']); ?>" required>

        <br><br>

        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha" value="<?php echo htmlspecialchars((string) $pessoa['senha']); ?>" required>

        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars((string) $pessoa['email']); ?>" required>

        <br><br>

        <button type="submit">Salvar alterações</button>
        <a href="Consulta.php">Cancelar</a>
    </form>
</body>
</html>
