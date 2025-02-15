<?php
include 'db.php'; // Inclui a conexão com o banco de dados

if (isset($_POST['create'])) {
    // Coleta os dados do formulário
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $ano = mysqli_real_escape_string($conexao, $_POST['ano']);
    
    // Substitui a vírgula por ponto no preço
    $preco = str_replace(',', '.', mysqli_real_escape_string($conexao, $_POST['preco']));
    
    $disponivel = isset($_POST['disponivel']) ? 1 : 0; // Se o checkbox estiver marcado, disponibiliza o filme

    // Variável para a imagem
    $image = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Diretório de uploads
        $image = 'uploads/' . basename($_FILES['imagem']['name']);
        
        // Verifica se a pasta 'uploads' existe, se não, cria
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true); // Cria a pasta de uploads
        }

        // Move a imagem para o diretório de uploads
        move_uploaded_file($_FILES['imagem']['tmp_name'], $image);
    }

    // Se uma imagem foi carregada, inclui no SQL
    if ($image) {
        $sql = "INSERT INTO filmes (titulo, descricao, ano, preco, disponivel, imagem) 
                VALUES ('$titulo', '$descricao', '$ano', '$preco', '$disponivel', '$image')";
    } else {
        // Caso contrário, insere sem imagem
        $sql = "INSERT INTO filmes (titulo, descricao, ano, preco, disponivel) 
                VALUES ('$titulo', '$descricao', '$ano', '$preco', '$disponivel')";
    }

    // Executa a consulta
    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php"); // Redireciona para a página inicial após a inserção
        exit();
    } else {
        // Se ocorrer erro na inserção
        echo "Erro ao adicionar filme: " . $conexao->error;
    }
} else {
    echo "Nenhum dado foi enviado.";
}

$conexao->close(); // Fecha a conexão com o banco de dados
?>
