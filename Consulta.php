<?php
require_once 'pessoa.php';
$pessoas = Pessoa::listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pessoas</title>
</head>
<body>
    <h3>Lista de pessoas cadastradas</h3>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nome</th>
                <th>senha</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pessoas)) : ?>
                <?php foreach ($pessoas as $pessoa) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars((string) $pessoa['id']); ?></td>
                        <td><?php echo htmlspecialchars((string) $pessoa['nome']); ?></td>
                        <td><?php echo htmlspecialchars((string) $pessoa['senha']); ?></td>
                        <td><?php echo htmlspecialchars((string) $pessoa['email']); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo (int) $pessoa['id']; ?>">Editar</a>
                            |
                            <a href="deletar.php?id=<?php echo (int) $pessoa['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4">Nenhuma pessoa cadastrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>