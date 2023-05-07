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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
            <?php
            $sql_query = $mysqli->query('SELECT * FROM `produtos`') or die("Falha na execução do código SQL: " . $mysqli->error);

            $produtos = array();
            while ($row = $sql_query->fetch_assoc()) {
                $produtos[] = $row;
            }

            $mysqli->close();
            ?>
            <?php foreach ($produtos as $produto) : ?>
                <div class="card m-2" style="width: 15rem;">
                    <div class="img"><img src="<?php echo "img/" . $produto['img_url']; ?>" class="card-img-top" alt="<?php echo $produto['nome']; ?>"></div>
                    <li>
                        <hr class="divider">
                    </li>
                    <div class="card-body">
                        <h5 class="card-title">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></h5>
                        <p class="card-text"><?php echo $produto['nome']; ?></p>
                       
                        <a href="produto.php?produto=<?php echo $produto['id_produto']; ?>" class="btn btn-primary w-100 mt-2" id="btn-card">Comprar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>