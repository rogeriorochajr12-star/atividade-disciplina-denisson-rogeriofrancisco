<?php
class Conexao {
    private static $conexao = null;
    private static $user = "francisco";
    private static $pass = "silvana00";

    public static function getConexao() {
        if (!isset(self::$conexao)) {
            try {
                self::$conexao = new PDO("mysql:host=localhost;dbname=novo_e_belo", self::$user, self::$pass);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro ao conectar com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }
}
?>