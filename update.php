<?php
include "db.php"; // Conectar ao banco

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id = $id";
    $result = $conexao->query($sql);
    
    if ($result->num_rows > 0) {
        $filme = $result->fetch_assoc();
    } else {
        echo "Filme não encontrado!";
    }
} else {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Atualizar filme
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $disponivel = isset($_POST['disponivel']) ? 1 : 0;

    $image = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $image = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $image);
    }

    if ($image) {
        $sql = "UPDATE filmes SET titulo = '$titulo', descricao = '$descricao', ano = '$ano', 
                preco = '$preco', disponivel = '$disponivel', imagem = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE filmes SET titulo = '$titulo', descricao = '$descricao', ano = '$ano', 
                preco = '$preco', disponivel = '$disponivel' WHERE id = $id";
    }

    if ($conexao->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar filme: " . $conexao->error;
    }
}
?>

<div class="container">
    <h2>Atualizar Filme</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $filme['id']; ?>">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?php echo $filme['titulo']; ?>" required><br>

        <label for="descricao">Descrição</label>
        <textarea name="descricao" required><?php echo $filme['descricao']; ?></textarea><br>

        <label for="ano">Ano de Lançamento</label>
        <input type="text" name="ano" value="<?php echo $filme['ano']; ?>" required><br>

        <label for="preco">Preço</label>
        <input type="text" name="preco" value="<?php echo $filme['preco']; ?>" required><br>

        <label for="disponivel">Disponibilidade</label>
        <input type="checkbox" name="disponivel" value="1" <?php echo $filme['disponivel'] ? 'checked' : ''; ?>><br>

        <label for="imagem">Imagem</label>
        <input type="file" name="imagem" accept="image/*"><br>

        <button type="submit">Atualizar Filme</button>
    </form>
</div>
