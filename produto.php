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
        <main id="tela-produto">
            <div class="container">
                <div class="row">
                    <?php
                    $id_produto = $_GET['produto'];
                    $result = $mysqli->query("SELECT * FROM produtos WHERE id_produto = '$id_produto'");
                    if ($result->num_rows != 1) {
                        echo "<div class='col-12 text-center'><h2>Produto não encontrado!</h2></div>";
                    } else {
                        $produto = $result->fetch_assoc();
                    ?>
                        <div class="col-md-6 mt-4 mb-4 img-produto-container">
                            <img src="<?php echo "img/" . $produto['img_url']; ?>" alt="<?php echo $produto['nome']; ?>" class="img-produto">
                        </div>
                        <div class="col-md-6 mt-4 dados">
                            <h2><?php echo $produto['nome']; ?></h2>
                            <p class="valor"><strong></strong> R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
                            <p class="estoque"><?php echo $produto['estoque']; ?> unidades restantes</p>
                             
                            <?php
                            if (isset($_SESSION['id'])) {
                            ?><a class="btn w-100 mt-1" id="btn-comprar" href="compra.php?produto=<?php echo $id_produto; ?>" role="button"><strong>Comprar</strong></a> <?php
                                                                                        } else {
                                                                                            ?>
                                <a href="conta/entrar.php" class="btn w-100 mt-1" id="btn-comprar">Entre em sua conta</a>
                                <p>*você precisa ter uma conta e estar logado para comprar</p>
                            <?php } ?>


                        </div>
                        <hr>
                        <div class="row">
                        <p class="marca"><strong>Marca:</strong> <?php echo $produto['marca']; ?></p>
                            <p class="detalhes"><strong>Detalhes técnicos:</strong></p>
                            <p class="detalhes mb-2"><?php echo $produto['detalhes_tec']; ?></p>
                        </div>
                    <?php } ?>
                </div>
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