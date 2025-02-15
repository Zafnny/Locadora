<?php
$host = 'localhost'; // Endereço do servidor
$user = 'root';           // Usuário do MySQL
$password = '';           // Senha do MySQL
$dbname = 'Locadora_filmes'; // Nome do banco de dados

// Criação da conexão
$conexao = new mysqli($host, $user, $password, $dbname);

// Verificação de erro na conexão
if ($conexao->connect_error) {
    die("Falha na Conexão: " . $conexao->connect_error);
}
?>
