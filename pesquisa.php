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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?php require_once "template/nav.php";  ?>
    </header>
    <main id="tela-produtos">
        <div class="todosprodutos">
            <div class="d-flex flex-wrap mt-2 mb-2">
                <?php
                if (isset($_GET['produto'])) {
                    $sql_query = $mysqli->query("SELECT * FROM produtos WHERE nome LIKE '%" . $_GET['produto'] . "%'");
                    $produtos = array();
                    while ($row = $sql_query->fetch_assoc()) {
                        $produtos[] = $row;
                    }

                    $mysqli->close();
                ?>
                    <?php
                    if (count($produtos) > 0) {
                        foreach ($produtos as $produto) : ?>
                            <div class="card m-2" style="width: 15rem;">
                                <div class="img"><img src="<?php echo "img/" . $produto['img_url']; ?>" class="card-img-top" alt="<?php echo $produto['nome']; ?>"></div>
                                <li>
                                    <hr class="divider">
                                </li>
                                <div class="card-body">
                                    <h5 class="card-title">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></h5>
                                    <p class="card-text nome-produto"><?php echo $produto['nome']; ?></p>


                                </div>
                                <a href="produto.php?produto=<?php echo $produto['id_produto']; ?>" class="btn btn-primary w-100 mt-2" id="btn-card">Comprar</a>
                            </div>
                    <?php endforeach;
                    } else {
                        echo '<h2 class="text-center mt-5">Nenhum Produto Encontrado!</h2>';
                    }                    ?>
                <?php
                } else {
                    echo '<h2 class="text-center mt-5">Nenhum Produto Encontrado!</h2>';
                }
                ?>
            </div>
        </div>
    </main>
    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>