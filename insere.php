<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//verifica se existe conexão com bd, caso não tenta criar uma nova
$conexao = mysqli_connect("localhost", "francisco", "silvana00") //porta usuário, senha
or die("Erro ao conectar com o banco de dados"); //caso não consiga conectar mostra a mensagem de erro mostrada na conexão

$select_db = mysqli_select_db($conexao, "novo"); //seleciona o banco de dados

//Abaixo atribuídos os valores provenientes do formulário pelo método POST
$nome = $_POST['nome'];
$user = $_POST['user'];
$email = $_POST['email'];

$string_sql = "INSERT INTO pessoa (id, nome, user, email) VALUES (null, '$nome', '$user', '$email')"; //comando SQL para inserir

mysqli_query($conexao, $string_sql); //Realiza a consulta

if(mysqli_affected_rows($conexao) == 1){ //verifica se a consulta foi realizada com sucesso
    echo "<p>Dados inseridos com sucesso!</p>"; //mensagem de sucesso
    echo '<a href="index.php">Voltar</a>'; //link para voltar a página inicial
} else {
    echo "Erro, não foi possível inserir no banco de dados";
    
    mysqli_close($conexao); //fecha a conexão com o banco de dados
}
?>