<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}
include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FortalTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div id="sidebar" class="col">
        <a class="navbar-brand d-flex" id="logo1" href="/ft/index.php">Fortal<div id="logo2">Tech</div></a>

        <?php $action = isset($_GET['action']) ? filter_input(INPUT_GET, 'action') : 'balanco'; ?>

        <ul class="nav flex-column ">
            <li class="nav-item">
                <a class="nav-link <?php echo ($action == 'balanco' ? 'active' : ''); ?>" href="?action=balanco">Balanço</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($action == 'produtos' ? 'active' : ''); ?>" href="?action=produtos">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($action == 'addProduto' ? 'active' : ''); ?>" href="?action=addProduto">Adicionar Produto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo ($action == 'clientes' ? 'active' : ''); ?>" href="?action=clientes">Clientes</a>
            </li>
            <li class="nav-item">
                <a style="cursor: pointer;" class="nav-link" data-bs-toggle="modal" data-bs-target="#sair">Sair</a>
            </li>
        </ul>
    </div>

    <div id="content" class="d-flex flex-column justify-content-center align-items-center  text-center" >
        <?php require_once "actions/$action.php";  ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/js.js"></script>
    <?php require_once "../template/modal_sair.php";  ?>
</body>

</html>