<?php

// Consulta SQL para listar os produtos
$query = "SELECT p.id_produto, p.nome, p.estoque, p.valor, p.marca,
COUNT(v.id_venda) AS num_vendas
FROM produtos p
LEFT JOIN vendas v
ON p.id_produto = v.id_produto AND v.status = 'concluido'
GROUP BY p.id_produto
";
$result = $mysqli->query($query);
?>

<h1>Produtos</h1>
<table class="table table-striped table-hover">
    <thead class='table-dark'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Estoque</th>
            <th>Valor</th>
            <th>Marca</th>
            <th>Apagar</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td style='color:#007bff;'><?php echo $row['id_produto']; ?></td>
                <td style='color:#007bff;'><?php echo $row['nome']; ?></td>
                <td style='color:#007bff;'><?php echo $row['estoque']; ?></td>
                <td style='color:#007bff;'>R$<?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                <td style='color:#007bff;'><?php echo $row['marca']; ?></td>

                <td>
                    <form method='post' action='' class="d-flex"><input type='hidden' name='id_produto' value='<?php echo $row['id_produto'] ?>'>
                        <input type='submit' id='btn-apagar' class='text-danger' name='apagar' value='Apagar'>
                    </form>
                </td>
                <td>
                <form method='post' action='?action=editProduto' class=""><input type='hidden' name='id_produto' value='<?php echo $row['id_produto'] ?>'>

                        <input type="submit" name="editar" value="Editar" id="btn-editar" style="color:#007bff"  >
                    </form>
                </td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php
if (isset($_POST['apagar'])) {
    $id_produto = $_POST['id_produto'];

    $mysqli->query("DELETE FROM vendas WHERE id_produto = '$id_produto'");

    $produto = $mysqli->query("SELECT * FROM produtos WHERE id_produto = '$id_produto'");
    $produto = $produto->fetch_assoc();
    $img = $produto['img_url'];
    unlink('../img/' . $img);

    $mysqli->query("DELETE FROM produtos WHERE id_produto = '$id_produto'");
    echo "<script>window.location.href = window.location.href;</script>";
}
?>