<?php
require_once 'conexao.php';

class Pessoa {
    private $nome;
    private $senha;
    private $email;

    public function __construct($nome, $senha, $email) {
        $this->nome = $nome;
        $this->senha = $senha;
        $this->email = $email;
    }

    // Metodo Cadastrar
    public function inserir(){
        try {
            $pdo = Conexao::getConexao();
            $sql = "INSERT INTO Cadastro (nome, senha, email) VALUES (:nome, :senha, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':nome' => $this->nome,
                ':senha' => $this->senha,
                ':email' => $this->email
            ]);

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Metodo Consultar Todos
    public static function listarTodos() {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT * FROM Cadastro";
            $stmt = $pdo->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public static function buscarPorId($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "SELECT * FROM Cadastro WHERE id = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public static function atualizar($id, $nome, $senha, $email) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "UPDATE Cadastro SET nome = :nome, senha = :senha, email = :email WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            return $stmt->execute([
                ':nome' => $nome,
                ':senha' => $senha,
                ':email' => $email,
                ':id' => $id
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function excluir($id) {
        try {
            $pdo = Conexao::getConexao();
            $sql = "DELETE FROM Cadastro WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>