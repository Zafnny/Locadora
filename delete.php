<?php
include "db.php"; // Conectar ao banco de dados

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM filmes WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona para a página principal após a exclusão
    } else {
        echo "Erro ao excluir o filme: " . $conexao->error;
    }
}

$conexao->close();
?>
