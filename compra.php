<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="tela">
        <header>
            <?php require_once "template/nav.php";  ?>
        </header>
        <main>
            <div class="container">
                <form class="" method="post">
                    <div class=" mb-4">
                        <h2 class="h2 text-center">Compra</h2>
                    </div>
                    <div class="row mb-3">
                        <h4>Endereço</h4>
                        <?php
                        $idCliente = $_SESSION['id'];
                        $result = $mysqli->query("SELECT * FROM endereco WHERE id_cliente = $idCliente");
                        $endereco = array();
                        while ($row = $result->fetch_assoc()) {
                            $endereco[] = $row;
                        }
                        $primeiro = true;
                        ?>
                        <?php if (count($endereco) > 0) {
                            foreach ($endereco as $e) : ?>
                                <div class="border mb-2 p-3">
                                    <input type="radio" <?php if ($primeiro) {
                                                            echo "checked";
                                                            $primeiro = false;
                                                        } ?> name="endereco" id="endereco:<?php echo $e['id_endereco'] ?>" value="<?php echo $e['id_endereco']; ?>">
                                    <?php echo "<label for='endereco:" . $e['id_endereco'] . "'>" . $e['estado'] . " - " . $e['cidade'] . " - " . $e['rua'] . " - " . $e['bairro'] . " - " . $e['num_casa'] . " - " . $e['cep'] . "</label>"; ?>
                                </div>

                        <?php endforeach;
                        } ?>
                        <div class="border p-3">
                            <input type="radio" id="novo-endereco" name="endereco" value="novo">
                            <label for="novo-endereco"><i class="bi bi-plus-circle"></i> Cadastrar novo endereço</label>
                            <div class="collapse row p-2" id="formularioEndereco">
                                <h4>Novo Endereço</h4>
                                <div class="col">
                                    <label for="" class="row mb-2">Estado:</label>
                                    <label for="" class="row mb-2">Cidade:</label>
                                    <label for="" class="row mb-2">Rua:</label>
                                    <label for="" class="row mb-2">Bairro:</label>
                                    <label for="" class="row mb-2">Número da casa:</label>
                                    <label for="" class="row">CEP:</label>
                                </div>
                                <div class="col">
                                    <select name="estado" required class="form-select">
                                        <option value="">Selecione um estado</option>
                                        <option value="Acre">Acre</option>
                                        <option value="Alagoas">Alagoas</option>
                                        <option value="Amapá">Amapá</option>
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="Bahia">Bahia</option>
                                        <option value="Ceará">Ceará</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Espírito Santo">Espírito Santo</option>
                                        <option value="Goiás">Goiás</option>
                                        <option value="Maranhão">Maranhão</option>
                                        <option value="Mato Grosso">Mato Grosso</option>
                                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                        <option value="Minas Gerais">Minas Gerais</option>
                                        <option value="Pará">Pará</option>
                                        <option value="Paraíba">Paraíba</option>
                                        <option value="Paraná">Paraná</option>
                                        <option value="Pernambuco">Pernambuco</option>
                                        <option value="Piauí">Piauí</option>
                                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                        <option value="Rondônia">Rondônia</option>
                                        <option value="Roraima">Roraima</option>
                                        <option value="Santa Catarina">Santa Catarina</option>
                                        <option value="São Paulo">São Paulo</option>
                                        <option value="Sergipe">Sergipe</option>
                                        <option value="Tocantins">Tocantins</option>
                                    </select>

                                    <input type="text" id="cidade" class="row mb-2" required name="cidade">
                                    <input type="text" id="rua" class="row mb-2" required name="rua">
                                    <input type="text" id="bairro" class="row mb-2" required name="bairro">
                                    <input type="text" id="numCasa" class="row mb-2" required name="numCasa">
                                    <input type="text" id="cep" class="row" required name="cep">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <h4>Cartão de Crédito</h4>
                        <?php
                        $idCliente = $_SESSION['id'];
                        $result = $mysqli->query("SELECT * FROM cartao WHERE id_cliente = $idCliente");
                        $cartao = array();
                        while ($row = $result->fetch_assoc()) {
                            $cartao[] = $row;
                        }
                        $primeiroCartao = true;
                        ?>
                        <?php if (count($cartao) > 0) {
                            foreach ($cartao as $c) : ?>
                                <div class="border mb-2 p-3">
                                    <input type="radio" <?php if ($primeiroCartao) {
                                                            echo "checked";
                                                            $primeiroCartao = false;
                                                        } ?> name="cartao" id="cartao:<?php echo $c['id_cartao'] ?>" value="<?php echo $c['id_cartao']; ?>">
                                    <?php echo "<label for='cartao:" . $c['id_cartao'] . "'>" . $c['num_cartao'] . " - " . $c['nome_titular'] . " - " . $c['validade'] . " - " . $c['cvv'] . "</label>"; ?>
                                </div>

                        <?php endforeach;
                        } ?>
                        <div class="border p-3">
                            <input type="radio" id="novo-cartao" name="cartao" value="novo">
                            <label for="novo-cartao"><i class="bi bi-plus-circle"></i> Cadastrar novo Cartão</label>
                            <div class="collapse row p-2" id="formularioCartao">
                                <h4>Novo Cartão</h4>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="parcela">Parcelas</label>
                        </div>
                        <?php
                        $result = $mysqli->query("SELECT * FROM produtos WHERE id_produto = '" . $_GET['produto'] . "'");
                        $produto = $result->fetch_assoc();
                        ?>
                        <div class="col">
                            <select name="parcela" id="parcela">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?>x de R$<?php echo number_format($produto['valor'] / $i, 2, ',', '.'); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div id="alert"></div>
                    <button type="submit">Comprar</button>
                </form>
            </div>

        </main>
    </div>

    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $endereco = $mysqli->real_escape_string(trim($_POST['endereco']));
        $cartao = $mysqli->real_escape_string(trim($_POST['cartao']));
        $parcela = $mysqli->real_escape_string(trim($_POST['parcela']));

        if (empty($endereco) || empty($cartao) || empty($parcela)) {
            echo "<script>
                    var alert = document.getElementById('alert');
                    alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Preencha todos os campos!</div>`;
                </script>";
        } else {
            if ($endereco == 'novo') {
                $estado = $mysqli->real_escape_string(trim($_POST['estado']));
                $cidade = $mysqli->real_escape_string(trim($_POST['cidade']));
                $rua = $mysqli->real_escape_string(trim($_POST['rua']));
                $bairro = $mysqli->real_escape_string(trim($_POST['bairro']));
                $numCasa = $mysqli->real_escape_string(trim($_POST['numCasa']));
                $cep = $mysqli->real_escape_string(trim($_POST['cep']));

                if (empty($estado) || empty($cidade) || empty($rua) || empty($bairro) || empty($numCasa) || empty($cep)) {
                    echo "<script>
                            var alert = document.getElementById('alert');
                            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Preencha todos os campos!</div>`;
                        </script>";
                } else {

                    $mysqli->query("INSERT INTO endereco(id_cliente, estado, cidade, rua, bairro, num_casa, cep) VALUES ('" . $_SESSION['id'] . "', '$estado', '$cidade', '$rua', '$bairro', '$numCasa', '$cep')");

                    $endereco = $mysqli->insert_id;
                }
            }
            if ($cartao == 'novo') {
                $numCartao = $mysqli->real_escape_string(trim($_POST['numCartao']));
                $nomeTitular = $mysqli->real_escape_string(trim($_POST['nomeTitular']));
                $validade = $mysqli->real_escape_string(trim($_POST['validade']));
                $cvv = $mysqli->real_escape_string(trim($_POST['cvv']));

                if (empty($numCartao) || empty($nomeTitular) || empty($validade) || empty($cvv)) {
                    echo "<script>
                            var alert = document.getElementById('alert');
                            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Preencha todos os campos!</div>`;
                            </script>";
                } else {
                    $mysqli->query("INSERT INTO cartao(id_cliente, num_cartao, nome_titular, validade, cvv) VALUES ('" . $_SESSION['id'] . "', '$numCartao', '$nomeTitular', '$validade', '$cvv')");

                    $cartao = $mysqli->insert_id;
                }
            }

            $mysqli->query("INSERT INTO vendas(id_produto, id_cliente, id_cartao, id_endereco, quantidade, valor_unitario, valor_total, parcelas, status, data_venda, data_entrega) VALUES ('" . $_GET['produto'] . "','" . $_SESSION['id'] . "','$cartao','$endereco','1','" . $produto['valor'] . "','" . $produto['valor'] . "', $parcela,'pendente','" . date('Y-m-d') . "','" . date('Y-m-d', strtotime('+7 days')) . "')");

            $mysqli->query("UPDATE produtos SET estoque = estoque - 1 WHERE id_produto = '" . $_GET['produto'] . "'");
            echo "<script>alert('Compra realizada com sucesso!');
            window.location.href = 'http://localhost/ft/conta/pedidos.php';
            
            </script>";
        }
    }
    ?>

    <script>
        var enderecoFields = document.querySelectorAll('#formularioEndereco input, #formularioEndereco select');
        enderecoFields.forEach(function(field) {
            if (field.tagName === 'SELECT') {
                field.disabled = true;
                field.selectedIndex = 0;
            } else {
                field.disabled = true;
                field.value = '';
            }
        });


        var cartaoFields = document.querySelectorAll('#formularioCartao input');
        cartaoFields.forEach(function(field) {
            field.disabled = true;
            field.value = '';
        });

        function toggleEnderecoFields() {
            var enderecoFields = document.querySelector('#formularioEndereco');
            var enderecoChecked = document.querySelector('input[name="endereco"]:checked').value;
            var enderecoInputs = document.querySelectorAll('#formularioEndereco input, #formularioEndereco select');

            if (enderecoChecked === 'novo') {
                enderecoFields.classList.add('show');
                enderecoInputs.forEach(function(input) {
                    input.disabled = false;
                });
            } else {
                enderecoFields.classList.remove('show');
                enderecoInputs.forEach(function(input) {
                    input.disabled = true;
                    input.value = '';
                });
            }
        }


        function toggleCartaoFields() {
            var cartaoFields = document.querySelector('#formularioCartao');
            var cartaoChecked = document.querySelector('input[name="cartao"]:checked').value;
            var cartaoInputs = document.querySelectorAll('#formularioCartao input');
            if (cartaoChecked === 'novo') {
                cartaoFields.classList.add('show');
                cartaoInputs.forEach(function(input) {
                    input.disabled = false;
                    input.value = '';
                })
            } else {
                cartaoFields.classList.remove('show');
                cartaoInputs.forEach(function(input) {
                    input.disabled = true;
                    input.value = '';
                });
            }
        }


        document.querySelectorAll('input[name="endereco"]').forEach(function(radio) {
            radio.addEventListener('change', toggleEnderecoFields);
        });

        document.querySelectorAll('input[name="cartao"]').forEach(function(radio) {
            radio.addEventListener('change', toggleCartaoFields);
        });
    </script>

    <div class="container">
        <?php require_once "template/footer.php";  ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>