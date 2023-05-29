<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FortalTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="tela">
        <header>
            <?php require_once "template/nav.php";  ?>
        </header>
        <main>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link color-dark" href="?status=pendente">PENDENTES</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link color-dark">|</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-dark" href="?status=concluido">CONCLUÍDOS</a>
                </li>
                <li class="nav-item">
                    <span class="nav-link color-dark">|</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-dark" href="?status=cancelado">CANCELADOS</a>
                </li>
            </ul>
            <div class="container">
                <?php
                $status = isset($_GET['status']) ? $_GET['status'] : 'pendente';
                $mysqli->query("UPDATE vendas SET status = 'concluido' WHERE id_cliente = " . $_SESSION["id"] . " AND status = 'pendente' AND data_entrega <= NOW()");
                $result = $mysqli->query("SELECT * FROM vendas where id_cliente = " . $_SESSION["id"] . " AND status = '$status'");
                $pedido = array();
                while ($row = $result->fetch_assoc()) {
                    $pedido[] = $row;
                }
                if (count($pedido) > 0) {
                    foreach ($pedido as $p) :
                        echo '<div class="border mt-2 p-3' . ($p["status"] == 'cancelado' ? ' bg-danger' : ($p["status"] == 'concluido' ? ' bg-success' : '')) . '">';
                        $result = $mysqli->query("SELECT * FROM produtos where id_produto = " . $p["id_produto"]);
                        echo "quantidade: " . $p["quantidade"] . " - produto: " . $result->fetch_assoc()["nome"] . " - valor: R$" . number_format($p["valor_total"], 2, ',', '.') . " - status: " . $p["status"] . " - data de compra: " . $p["data_venda"] . " - Estimativa de entrega: " . $p["data_entrega"];
                        if ($p["status"] == 'pendente') {
                            echo '<form method="post" action="">';
                            echo '<input type="hidden" name="id_venda" value="' . $p["id_venda"] . '">';
                            echo '<button type="submit" name="cancelar_pedido">Cancelar pedido</button>';
                            echo '<button type="submit" name="pedido_recebido">Pedido recebido</button>';
                            echo '</form>';
                        }
                        echo "</div>";
                        echo "<br>";
                    endforeach;
                } else {
                    echo '<h2 class="text-center mt-5">Nenhuma registro encontrado!</h2>';
                }
                if (isset($_POST["cancelar_pedido"])) {
                    $idVenda = $_POST["id_venda"];
                    if (isset($idVenda)) {
                        $mysqli->query("UPDATE vendas SET status = 'cancelado' WHERE id_venda = " . $idVenda);
                        echo "<script>alert('Pedido cancelado com sucesso!');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    }
                }else if(isset($_POST["pedido_recebido"])){
                    $idVenda = $_POST["id_venda"];
                    if (isset($idVenda)) {
                        $mysqli->query("UPDATE vendas SET status = 'concluido' WHERE id_venda = " . $idVenda);
                        echo "<script>alert('Pedido entregue com sucesso!');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    }
                }
                ?>
            </div>
        </main>
    </div>
    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>