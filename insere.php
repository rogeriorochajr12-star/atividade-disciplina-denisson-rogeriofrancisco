<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'pessoa.php';

$nome = $_POST['nome'] ?? '';
$senha = $_POST['senha'] ?? '';
$email = $_POST['email'] ?? '';

if ($nome === '' || $senha === '' || $email === '') {
    echo 'Erro: nome, senha e email são obrigatórios.';
    exit;
}

$pessoa = new Pessoa($nome, $senha, $email);

if ($pessoa->inserir()) {
    echo '<p>Dados inseridos com sucesso!</p>';
    echo '<a href="index.php">Voltar</a>';
} else {
    echo 'Erro, não foi possível inserir no banco de dados';
}
?>