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
    <main>
        <br>
        <div id="tela-inicial" class="">
                <div class="row carousel-row">
    <div class="col carousel">
        <div id="demo" class="carousel slide w-100" data-ride="carousel">
            <div class="carousel-inner center-block">
                <div class="carousel-item active">
                    <img src="img/2.jpg" alt="" class="img-carousel">
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpg" alt="" class="img-carousel">
                </div>
                <div class="carousel-item">
                    <img src="img/4.jpg" alt="" class="img-carousel">
                </div>
            </div>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
</div>


        </div>
        <div id="produtos" class="pt-3">
            <div class="prt">
                <div class="conteiner">
                    <h4 class="caixa pb-0 mb-0 h4" id="">COMPRE JÁ</h4>
                    <a href="produtos.php">VER MAIS</a>
                </div>
                <div id="listar-produtos">
                    <div class="d-flex flex-wrap m-0">
                    <?php
                    $sql_query = $mysqli->query('SELECT * FROM `produtos` limit 4') or die("Falha na execução do código SQL: " . $mysqli->error);

                    while ($row = $sql_query->fetch_assoc()) {
                        $produtos[] = $row;
                    }

                    $mysqli->close();
                    ?>
                    <?php foreach ($produtos as $produto) : ?>
                        <div class="card m-2">
                            <div class="img"><img src="<?php echo "img/" . $produto['img_url']; ?>" class="card-img-top" alt="<?php echo $produto['nome']; ?>"></div>
                            <li>
                                <hr class="divider">
                            </li>
                            <div class="card-body">
                                <div> 
                                    <h5 class="card-title">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></h5>
                                    <p class="card-text nome-produto"><?php echo $produto['nome']; ?></p>
                                </div>
                            </div>
                            <a href="produto.php?produto=<?php echo $produto['id_produto']; ?>" class="btn btn-primary w-100 mt-2" id="btn-card">Comprar</a>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </main>
    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/js.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- <style type="text/css"> -->
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>