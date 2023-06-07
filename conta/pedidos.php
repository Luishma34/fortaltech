<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
}
include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FortalTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/pedidos.css">
</head>

<body>
    <div class="tela">
        <header>
            <?php require_once "../template/nav.php";  ?>
        </header>
        <main>
            <ul class="nav justify-content-center mt-3 mb-3">
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

            <?php
            $status = isset($_GET['status']) ? $_GET['status'] : 'pendente';
            $result = $mysqli->query("SELECT * FROM vendas where id_cliente = " . $_SESSION["id"] . " AND status = '$status'");
            $pedido = array();
            while ($row = $result->fetch_assoc()) {
                $pedido[] = $row;
            }
            if (count($pedido) > 0) {  ?>
                <?php
                foreach ($pedido as $p) :
                    $result = $mysqli->query("SELECT * FROM produtos where id_produto = " . $p["id_produto"]);
                    $produto = $result->fetch_assoc();
                ?>
                    <div class="container mb-3">
                        <div class="pedido <?php echo ($p["status"] == 'cancelado' ? 'cancelado' : ($p["status"] == 'concluido' ? 'concluido' : '')) ?>">
                            <div class="pedido-header <?php echo ($p["status"] == 'cancelado' ? 'header-cancelado' : ($p["status"] == 'concluido' ? 'header-concluido' : 'header-pendente')) ?>">
                                <?php echo $produto["nome"]; ?>
                            </div>
                            <div class="pedido-body">
                                <div class="row">
                                    <div class="col-sm-<?php echo ($p["status"] == 'pendente' ? '4' : '6'); ?>">
                                        <p><strong>Quantidade:</strong> <?php echo $p["quantidade"]; ?></p>
                                        <p><strong>Valor:</strong> R$<?php echo number_format($p["valor_total"], 2, ',', '.'); ?></p>
                                        <p><strong>Parcelas:</strong> <?php echo $p["parcelas"]; ?>x de R$<?php echo number_format($p["valor_parcela"], 2, ',', '.'); ?></p>
                                    </div>
                                    <div class="col-sm-<?php echo ($p["status"] == 'pendente' ? '4' : '6'); ?>">
                                        <p><strong>Status:</strong> <span class="status-<?php echo $p["status"] ?>"><?php echo $p["status"]; ?></span></p>
                                        <p><strong>Data de compra:</strong> <?php echo date("d/m/Y", strtotime($p["data_venda"])); ?></p>
                                        <p><strong>Estimativa de entrega:</strong> <?php echo date("d/m/Y", strtotime($p["data_entrega"])); ?></p>
                                    </div>
                                    <?php if ($p["status"] == 'pendente') : ?>
                                        <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                            <form method="post" action="" class="d-flex flex-column align-items-center">
                                                <input type="hidden" name="id_venda" value="<?php echo $p["id_venda"]; ?>">
                                                <button type="submit" class="btn btn-danger mb-2" name="cancelar_pedido">Cancelar pedido</button>
                                                <button type="submit" class="btn btn-success" name="pedido_recebido">Pedido recebido</button>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php
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
            } else if (isset($_POST["pedido_recebido"])) {
                $idVenda = $_POST["id_venda"];
                if (isset($idVenda)) {
                    $mysqli->query("UPDATE vendas SET status = 'concluido' WHERE id_venda = " . $idVenda);
                    echo "<script>alert('Pedido entregue com sucesso!');</script>";
                    echo "<script>window.location.href = window.location.href;</script>";
                }
            }
            ?>
        </main>
    </div>
    <div class="container">
        <?php require_once "../template/footer.php";  ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/js.js"></script>
    <?php require_once "../template/modal_sair.php";  ?>
</body>

</html>