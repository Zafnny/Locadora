<?php include('header.php'); ?>
<?php include('db.php'); ?>

<div>
    <h2>Filmes Cadastrados</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Disponível</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM filmes"; // Seleciona todos os filmes cadastrados

            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['titulo'] . "</td>";
                    echo "<td>" . $row['descricao'] . "</td>";
                    echo "<td>" . $row['ano'] . "</td>";
                    echo "<td>" . $row['preco'] . "</td>";
                    echo "<td>" . ($row['disponivel'] ? 'Sim' : 'Não') . "</td>";
                    echo "<td><img src='" . $row['imagem'] . "' alt='" . $row['titulo'] . "' style='width: 100px; height: auto;'></td>";
                    echo "<td><a href='update.php?id=" . $row['id'] . "'>Editar</a> | 
                    <a href='delete.php?id=" . $row['id'] . "'>Excluir</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Nenhum filme foi encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$conexao->close();
include('footer.php');
?>
