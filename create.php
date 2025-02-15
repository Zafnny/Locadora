<?php
include 'header.php'; // Inclui o cabeçalho, se necessário
include 'db.php'; // Conecta ao banco de dados
?>

<div class="container">
    <h2>Adicionar Filme</h2>
    <form action="process.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" required><br>

        <label for="descricao">Descrição</label>
        <textarea name="descricao" required></textarea><br>

        <label for="ano">Ano de Lançamento</label>
        <input type="text" name="ano" required><br>

        <label for="preco">Preço</label>
        <input type="text" name="preco" required><br>

        <!-- Disponibilidade -->
        <div class="form-group-disponivel">
            <label for="disponivel">Disponibilidade</label>
            <input type="checkbox" name="disponivel" value="1"><br>
        </div>

        <!-- Imagem -->
        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" accept="image/*"><br>
        </div>

        <button type="submit" name="create">Adicionar Filme</button>
    </form>
</div>

<?php
include 'footer.php'; // Inclui o rodapé, se necessário
?>
