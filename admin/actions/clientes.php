<?php
$query = "SELECT clientes.id_cliente, clientes.nome, clientes.email, IFNULL(COUNT(vendas.id_venda), 0) AS num_vendas FROM clientes LEFT JOIN vendas ON clientes.id_cliente = vendas.id_cliente AND vendas.status = 'concluido' WHERE clientes.email != 'admin@admin.com'
GROUP BY clientes.id_cliente;
";
$result = $mysqli->query($query);
?>
<h1>Clientes</h1>

<table class="table table-striped table-hover">
    <thead class='table-dark'>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Número de Compras</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_cliente'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['num_vendas'] . "</td>";
            echo "<td><form method='post' action=''><input type='hidden' name='id_cliente' value='" . $row['id_cliente'] . "'><input type='submit' id='btn-apagar' class='text-danger' name='apagar' value='Apagar'></form></td>";
            echo "</tr>";
        }?>
        </tbody>
        </table>
        <?php
        if (isset($_POST['apagar'])) {
            $id_cliente = $_POST['id_cliente'];
            $mysqli->query("DELETE FROM vendas  WHERE id_cliente = '$id_cliente'");
            $mysqli->query("DELETE FROM endereco WHERE id_cliente = '$id_cliente'");
            $mysqli->query("DELETE FROM cartao WHERE id_cliente = '$id_cliente'");
            $mysqli->query("DELETE FROM clientes WHERE id_cliente = '$id_cliente'");
            echo "<script>window.location.href = window.location.href;</script>";
        }
        ?>