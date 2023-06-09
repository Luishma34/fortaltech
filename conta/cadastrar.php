<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['id'])) {
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
</head>

<body>
    <header>
        <?php require_once "../template/nav.php";  ?>
    </header>
    <div class="conta">
        <div id="form" class="container p-10">
            <form class="container" method="POST">
                <h2 class="text-center mb-3" id="logo2">Bem-vindo!</h2>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" id="nome" placeholder="Nome" name="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control rounded-3" id="email" placeholder="name@example.com" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <label for="email">E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" id="senha" placeholder="Password" name="senha" required minlength="6">
                    <label for="senha">Senha</label>
                </div>
                <div id="alert"></div>
                <input class="w-100 mb-2 rounded-3 btn btn-primary btn-lg" id="btn-form" type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
    <div class="container">
        <?php require_once "../template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/js.js"></script>
    <?php require_once "../template/modal_sair.php";  ?>
</body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = $mysqli->real_escape_string($_POST['email']);
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    if (empty(trim($nome)) || empty(trim($email)) || empty(trim($senha))) {
        echo "<script>
        var alert = document.getElementById('alert')
        alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados inválidos!</div>`
    </script>";
    } else {
        $result = $mysqli->query("SELECT * FROM clientes WHERE email = '$email'");

        if ($result->num_rows > 0) {
            echo "<script>
            var alert = document.getElementById('alert')
            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados inválidos!</div>`
        </script>";
        } else {
            if ($mysqli->query("INSERT INTO clientes (nome, email, senha) VALUES ('$nome', '$email', '$senha')") === TRUE) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $query = $mysqli->query("SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha' LIMIT 1");
                $dados = $query->fetch_assoc();
                $_SESSION['id'] = $dados['id_cliente'];
                echo $_SESSION['id_client'];
                echo "<script>window.location.href = 'http://localhost/ft/index.php';</script>";
            } else {
                echo "<script>
                var alert = document.getElementById('alert')
                alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Erro ao cadastrar o usuário: " + $mysqli->error + "!</div>`
            </script>";
            }
        }
    }
}
?>

</html>