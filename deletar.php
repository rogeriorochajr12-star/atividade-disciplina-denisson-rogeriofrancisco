<?php
require_once 'pessoa.php';

$id = $_GET['id'] ?? null;
if ($id === null || !is_numeric($id)) {
    echo 'ID inválido.';
    exit;
}

if (Pessoa::excluir((int) $id)) {
    header('Location: Consulta.php');
    exit;
}

echo 'Erro ao excluir o cadastro.';
