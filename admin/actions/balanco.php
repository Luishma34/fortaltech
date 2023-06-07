<?php

// Número total de vendas (com status concluido)
$result = $mysqli->query("SELECT COUNT(*) FROM vendas WHERE status = 'concluido'");
$total_vendas = $result->fetch_row()[0];

// Valor total de todas as vendas (com status concluido)
$result = $mysqli->query("SELECT SUM(valor_total) FROM vendas WHERE status = 'concluido'");
$valor_total_vendas = $result->fetch_row()[0];

// Número de vendas no ano atual (com status concluido)
$result = $mysqli->query("SELECT COUNT(*) FROM vendas WHERE status = 'concluido' AND YEAR(data_venda) = YEAR(CURDATE())");
$vendas_ano_atual = $result->fetch_row()[0];

// Valor total das vendas no ano atual (com status concluido)
$result = $mysqli->query("SELECT SUM(valor_total) FROM vendas WHERE status = 'concluido' AND YEAR(data_venda) = YEAR(CURDATE())");
$valor_vendas_ano_atual = $result->fetch_row()[0];

// Número de vendas no mês atual (com status concluido)
$result = $mysqli->query("SELECT COUNT(*) FROM vendas WHERE status = 'concluido' AND YEAR(data_venda) = YEAR(CURDATE()) AND MONTH(data_venda) = MONTH(CURDATE())");
$vendas_mes_atual = $result->fetch_row()[0];

// Valor total das vendas no mês atual (com status concluido)
$result = $mysqli->query("SELECT SUM(valor_total) FROM vendas WHERE status = 'concluido' AND YEAR(data_venda) = YEAR(CURDATE()) AND MONTH(data_venda) = MONTH(CURDATE())");
$valor_vendas_mes_atual = $result->fetch_row()[0];

$top_produtos = $mysqli->query("
    SELECT p.id_produto, p.nome, p.valor, COUNT(*) AS num_vendas
    FROM vendas v
    JOIN produtos p ON v.id_produto = p.id_produto
    WHERE v.status = 'concluido'
    GROUP BY p.id_produto
    ORDER BY num_vendas DESC
    LIMIT 5;
");

$top_clientes = $mysqli->query("
    SELECT c.id_cliente, c.nome, c.email, COUNT(*) AS num_compras
    FROM vendas v
    JOIN clientes c ON v.id_cliente = c.id_cliente
    WHERE v.status = 'concluido'
    GROUP BY c.id_cliente
    ORDER BY num_compras DESC
    LIMIT 5;
");

$vendas_6meses = $mysqli->query("
    SELECT
    DATE_FORMAT(data_venda, '%m/%Y') AS mes,
    COUNT(*) AS num_vendas,
    SUM(valor_total) AS valor_arrecadado
    FROM vendas
    WHERE data_venda >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
    AND status = 'concluido'
    GROUP BY mes
    ORDER BY data_venda DESC LIMIT 6;



");

?>

<h1 class="mb-3">Balanço Geral</h1>
<h2>Balanço de Arrecadação</h2>
<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Mês</th>
            <th>Ano</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>R$<?php echo number_format($valor_vendas_mes_atual, 2, ',', '.'); ?></td>
            <td>R$<?php echo number_format($valor_vendas_ano_atual, 2, ',', '.'); ?></td>
            <td>R$<?php echo number_format($valor_total_vendas, 2, ',', '.'); ?></td>
        </tr>
    </tbody>
</table>
<h2>Produtos Mais Vendidos</h2>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Vendas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $top_produtos->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id_produto'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . 'R$' . number_format($row['valor'], 2, ',', '.') . '</td>';
            echo '<td>' . $row['num_vendas'] . '</td>';
            echo '</tr>';
        } ?>
    </tbody>
</table>


<h2>Clientes com Mais Compras</h2>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Número de Compras</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $top_clientes->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id_cliente'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['num_compras'] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>


<h2>Balanço dos Últimos 6 Meses</h2>

<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Mês/Ano</th>
            <th>Número de Vendas</th>
            <th>Valor Arrecadado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $vendas_6meses->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['mes'] . '</td>';
            echo '<td>' . $row['num_vendas'] . '</td>';
            echo '<td>' . '<strong>R$' . number_format($row['valor_arrecadado'], 2, ',', '.') . '</td>';
            echo '</tr>';
        } ?>
    </tbody>
</table>