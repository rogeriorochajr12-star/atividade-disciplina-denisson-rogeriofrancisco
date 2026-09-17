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
            $sql = "INSERT INTO pessoa (nome, senha, email) VALUES (:nome, :senha, :email)";
            $stmt = $pdo->prepare($sql);

            $stmt->execute ( [
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
                $sql = "SELECT * FROM pessoa";
                $stmt = $pdo->query($sql);


                // Retorna um array com todos os registros
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return [];
            }
    }
}
?>