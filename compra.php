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
            <div class="container">
                <form class="row" method="post">
                    <div class="row mb-3">
                        <div class="row mb-4">
                            <h2 class="h2 text-center">Compra</h2>
                        </div>
                        <h4>Endereço</h4>
                        <div class="col">
                            <label for="" class="row mb-2">Estado:</label>
                            <label for="" class="row mb-2">Cidade:</label>
                            <label for="" class="row mb-2">Rua:</label>
                            <label for="" class="row mb-2">Bairro:</label>
                            <label for="" class="row">Número da casa:</label>
                            <label for="" class="row">CEP:</label>

                        </div>
                        <div class="col">
                            <input type="text" id="estado" class="row mb-2" required name="estado">
                            <input type="text" id="cidade" class="row mb-2" required name="cidade">
                            <input type="text" id="rua" class="row mb-2" required name="rua">
                            <input type="text" id="bairro" class="row mb-2" required name="bairro">
                            <input type="text" id="numCasa" class="row" required name="numCasa">
                            <input type="text" id="cep" class="row" required name="cep">
                        </div>
                    </div>
                    <div class="row">
                        <h4>Cartão de Crédito</h4>
                        <div class="col">

                            <label for="" class="row mb-2">Número do cartão:</label>
                            <label for="" class="row mb-2">Nome do titular:</label>
                            <label for="" class="row mb-2">Validade:</label>
                            <label for="" class="row">CVV:</label>

                        </div>
                        <div class="col">
                            <input type="text" id="numCartao" class="row mb-2" required name="numCartao">
                            <input type="text" id="nomeTitular" class="row mb-2" required name="nomeTitular">
                            <input type="text" id="validade" class="row mb-2" required name="validade">
                            <input type="text" id="cvv" class="row" name="cvv" minlength="3" maxlength="3" required>
                        </div>
                    </div>

                    <div id="alert"></div>
                    <button type="submit">Comprar</button>
                </form>
            
            </div>
        </main>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $estado = $mysqli->real_escape_string(trim($_POST['estado']));
        $cidade = $mysqli->real_escape_string(trim($_POST['cidade']));
        $rua = $mysqli->real_escape_string(trim($_POST['rua']));
        $bairro = $mysqli->real_escape_string(trim($_POST['bairro']));
        $numCasa = $mysqli->real_escape_string(trim($_POST['numCasa']));
        $cep = $mysqli->real_escape_string(trim($_POST['cep']));
        $numCartao = $mysqli->real_escape_string(trim($_POST['numCartao']));
        $nomeTitular = $mysqli->real_escape_string(trim($_POST['nomeTitular']));
        $validade = $mysqli->real_escape_string(trim($_POST['validade']));
        $cvv = $mysqli->real_escape_string(trim($_POST['cvv']));

        if (empty($estado) || empty($cidade) || empty($rua) || empty($bairro) || empty($numCasa) || empty($numCartao) || empty($nomeTitular) || empty($validade) || empty($cvv)) {
            echo "<script>
            var alert = document.getElementById('alert');
            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Preencha todos os campos!</div>`;
            </scrip>";
        } else {

            $result  = $mysqli->query("SELECT * FROM produtos WHERE id_produto = '" . $_GET['produto'] . "'");

            $produto = $result->fetch_assoc();

            $mysqli->query("INSERT INTO endereco(id_cliente, estado, cidade, rua, bairro, num_casa, cep) VALUES ('" . $_SESSION['id'] . "', '$estado', '$cidade', '$rua', '$bairro', '$numCasa', '$cep')");

            $mysqli->query("INSERT INTO cartao(id_cliente, num_cartao, nome_titular, validade, cvv) VALUES ('" . $_SESSION['id'] . "', '$numCartao', '$nomeTitular', '$validade', '$cvv')");
            
            $mysqli->query("INSERT INTO vendas(id_produto, id_cliente, quantidade, valor_unitario, valor_total, status, data_venda, data_entrega) VALUES ('" . $_GET['produto'] . "','" . $_SESSION['id'] . "',1,'" . $produto['valor'] . "','" . $produto['valor'] . "','Pendente','" . date('Y-m-d') . "','" . date('Y-m-d', strtotime('+7 days')) . "')");
            $mysqli->query("UPDATE produtos SET estoque = estoque - 1 WHERE id_produto = '" . $_GET['produto'] . "'");
            echo "<script>
            var alert = document.getElementById('alert');
            alert.innerHTML = `<div class='text-success h6 mb-3'><i class='bi bi-exclamation-circle'></i>Compra realizada com sucesso!</div>`;
            </script>";
        }
    }
    ?>
    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>