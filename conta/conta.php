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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="tela">
        <header>
            <?php require_once "../template/nav.php";  ?>
        </header>
        <div class="tela">
            <main class="tela-conta">
                <?php
                $result = $mysqli->query("SELECT * FROM clientes WHERE id_cliente = " . $_SESSION['id'] . "");
                $cliente = $result->fetch_assoc(); ?>

                <div class="container">
                    <form class="row" method="post">
                        <div class="row mb-4">
                            <h2 class="h2 text-center">Conta</h2>
                        </div>
                        <div class="col">
                            <label for="" class="row">Nome:</label>
                            <label for="" class="row">Email:</label>
                            <label for="" class="row">Confirmar senha:</label>
                            <label for="" class="row">Nova senha(opcional):</label>
                        </div>
                        <div class="col">
                            <input type="text" id="nome" value="<?php echo $cliente['nome']  ?>" class="row" required name="nome">
                            <input type="text" id="email" value="<?php echo $cliente['email']  ?>" class="row" required name="email">
                            <input type="password" id="senha" class="row" required name="senha">
                            <input type="password" id="nova_senha" class="row" name="nova_senha">

                        </div>
                        <div id="alert"></div>
                        <button type="submit" name="excluir_conta">Excluir Conta</button>
                        <button type="submit" name="atualizar_conta">Atualizar Conta</button>
                    </form>
                </div>
            </main>
        </div>
        <?php
        if (isset($_POST['excluir_conta']) || isset($_POST['atualizar_conta'])) {
            $email = $mysqli->real_escape_string(trim($_POST['email']));
            $nome = $mysqli->real_escape_string(trim($_POST['nome']));
            $senha = $mysqli->real_escape_string(trim($_POST['senha']));
            $novaSenha = $mysqli->real_escape_string(trim($_POST['nova_senha']));

            $result = $mysqli->query("SELECT * FROM clientes WHERE id_cliente = " . $_SESSION['id'] . "");
            $cliente = $result->fetch_assoc();

            if (!empty($senha) && $senha == $cliente['senha']) {
                if (isset($_POST['excluir_conta'])) {
                    $mysqli->query("DELETE FROM clientes WHERE id_cliente = " . $_SESSION['id'] . "");
                    echo "<script>
                    alert('Conta excluída com sucesso!');
                    window.location.href = 'http://localhost/ft/sair.php';
                </script>";
                } else if (isset($_POST['atualizar_conta'])) {
                    if (!empty($senha) && !empty($nome) && !empty($email)) {
                        $result = $mysqli->query("SELECT * FROM clientes WHERE email = '$email' AND id_cliente != " . $_SESSION['id'] . "");
                        if ($result->num_rows == 0) {
                            if (!empty($novaSenha)) {
                                $mysqli->query("UPDATE clientes SET nome = '$nome', email = '$email', senha = '$novaSenha' WHERE id_cliente = " . $_SESSION['id'] . "");
                                echo "<script>
                                var alert = document.getElementById('alert');
                                alert.innerHTML = `<div class='text-success h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados atualizados com sucesso!</div>`;
                                document.getElementById('email').value = '$email';
                                document.getElementById('nome').value = '$nome';
                                document.getElementById('senha').value = '';
                                document.getElementById('nova_senha').value = '';
                            </script>";
                            } else {
                                $mysqli->query("UPDATE clientes SET nome = '$nome', email = '$email' WHERE id_cliente = " . $_SESSION['id'] . "");
                                echo "<script>
                                var alert = document.getElementById('alert');
                                alert.innerHTML = `<div class='text-success h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados atualizados com sucesso!</div>`;
                                document.getElementById('email').value = '$email';
                                document.getElementById('nome').value = '$nome';
                                document.getElementById('senha').value = '';
                                document.getElementById('nova_senha').value = '';
                            </script>";
                            }
                        } else {
                            echo "<script>
                            var alert = document.getElementById('alert');
                            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados inválidos!</div>`;
                        </script>";
                        }
                    } else {
                        echo "<script>
                        var alert = document.getElementById('alert');
                        alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Dados inválidos!</div>`;
                    </script>";
                    }
                }
            } else {
                echo "<script>
                var alert = document.getElementById('alert');
                alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Senha atual inválida!</div>`;
            </script>";
            }
        }

        ?>
    </div>

    <div class="container">
        <?php require_once "../template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js.js"></script>
    <?php require_once "../template/modal_sair.php";  ?>
</body>

</html>