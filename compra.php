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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="tela">
        <header>
            <?php require_once "template/nav.php";  ?>
        </header>
        <main>
            <div class="container d-flex flex-column align-items-center justify-content-center">
                <form class="w-50" method="post">
                    <div class=" mb-4">
                        <h1 class="h2 mt-3 text-center">Compra</h1>
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

                                    <!-- Adicione o botão de exclusão aqui -->
                                    <button type="submit" name="excluir_endereco" id='btn-apagar' class='text-danger' class="mr-0" value="<?php echo $e['id_endereco']; ?>" class="ml-auto">Excluir</button>

                                                    </div>

                        <?php endforeach;
                        } ?>

                        <?php
                        if (isset($_POST['excluir_endereco'])) {
                            $id_endereco = $_POST['excluir_endereco'];
                            $mysqli->query("DELETE FROM vendas WHERE id_endereco = $id_endereco");
                            $mysqli->query("DELETE FROM endereco WHERE id_endereco = $id_endereco");
                            echo "<script> window.location.href = window.location.href; </script>";
                        }
                        
                        ?>
                        <div class="border p-3">
                            <input type="radio" id="novo-endereco" name="endereco" value="novo">
                            <label for="novo-endereco"><i class="bi bi-plus-circle mr-1"></i> Cadastrar novo endereço</label>
                            <div class="collapse row p-2" id="formularioEndereco">
                                <div class="form-group row mb-3">
                                    <label for="estado" class="col-sm-4 col-form-label text-right">Estado</label>
                                    <div class="col-sm-8">
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
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="cidade" class="col-sm-4 col-form-label text-right">Cidade</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cidade" id="cidade" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="rua" class="col-sm-4 col-form-label text-right">Rua</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="rua" id="rua" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="bairro" class="col-sm-4 col-form-label text-right">Bairro</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="bairro" id="bairro" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="numCasa" class="col-sm-4 col-form-label text-right">NÚmero da casa</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="numCasa" id="numCasa" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="cep" class="col-sm-4 col-form-label text-right">CEP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cep" id="cep" required>
                                    </div>
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
                                    <button type="submit" name="excluir_cartao" id='btn-apagar' class='text-danger' class="mr-0" value="<?php echo $c['id_cartao']; ?>" class="ml-auto">Excluir</button>
                                </div>

                        <?php endforeach;
                        } ?>

<?php
                        if (isset($_POST['excluir_cartao'])) {
                            $id_endereco = $_POST['excluir_cartao'];
                            $mysqli->query("DELETE FROM vendas WHERE id_cartao = $id_endereco");
                            $mysqli->query("DELETE FROM cartao WHERE id_cartao = $id_endereco");
                            echo "<script> window.location.href = window.location.href; </script>";
                        }
                        
                        ?>
                        <div class="border p-3">
                            <input type="radio" id="novo-cartao" name="cartao" value="novo">
                            <label for="novo-cartao"><i class="bi bi-plus-circle"></i> Cadastrar novo Cartão</label>
                            <div class="collapse row p-2" id="formularioCartao">
                                <div class="form-group row mb-3">
                                    <label for="numCartao" class="col-sm-4 col-form-label text-right">Número do Cartão</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="numCartao" id="numCartao" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="nomeTitular" class="col-sm-4 col-form-label text-right">Nome do Titular</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nomeTitular" id="nomeTitular" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="validade" class="col-sm-4 col-form-label text-right">Validade</label>
                                    <div class="col-sm-8 d-flex justify-content-around">
                                        <select class="form-select w-25" name="mes" id="mes" required>
                                            <option value="">Mês</option>
                                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                <option value="<?php echo sprintf("%02d", $i); ?>"><?php echo sprintf("%02d", $i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <select name="ano" class="form-select w-25" id="ano" required>
                                            <option value="">Ano</option>
                                            <?php for ($i = date('Y'); $i <= date('Y') + 20; $i++) : ?>
                                                <option value="<?php echo substr($i, -2); ?>"><?php echo substr($i, -2); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label for="cvv" class="col-sm-4 col-form-label text-right">CVV</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="cvv" id="cvv" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="parcela">Parcelas</label>
                        </div>
                        <?php
                        $result = $mysqli->query("SELECT * FROM produtos WHERE id_produto = '" . $_GET['produto'] . "'");
                        $produto = $result->fetch_assoc();
                        ?>
                        <div class="col">
                            <select name="parcela" id="parcela" class="form-select">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?>x de R$<?php echo number_format($produto['valor'] / $i, 2, ',', '.'); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">Valor Total</div>
                        <div class="col">R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">Estimativa de Entrega</div>
                        <div class="col"><?php echo date('Y-m-d', strtotime('+7 days')); ?></div>
                    </div>

                    <div id="alert"></div>
                    <div class="form-group row mb-3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-100 h-100" id="btn-comprar" style="font-weight: bold;">Comprar</button>
                        </div>
                    </div>


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
                $validadeMes = $mysqli->real_escape_string(trim($_POST['mes']));
                $validadeAno = $mysqli->real_escape_string(trim($_POST['ano']));
                $cvv = $mysqli->real_escape_string(trim($_POST['cvv']));

                if (empty($numCartao) || empty($nomeTitular) || empty($validadeMes) || empty($validadeAno) || empty($cvv)) {
                    echo "<script>
                            var alert = document.getElementById('alert');
                            alert.innerHTML = `<div class='text-danger h6 mb-3'><i class='bi bi-exclamation-circle'></i>Preencha todos os campos!</div>`;
                            </script>";
                } else {
                    $mysqli->query("INSERT INTO cartao(id_cliente, num_cartao, nome_titular, validade, cvv) VALUES ('" . $_SESSION['id'] . "', '$numCartao', '$nomeTitular', '$validadeMes/$validadeAno', '$cvv')");

                    $cartao = $mysqli->insert_id;
                }
            }

            $mysqli->query("INSERT INTO vendas(id_produto, id_cliente, id_cartao, id_endereco, quantidade, valor_parcela, valor_total, parcelas, status, data_venda, data_entrega) VALUES ('" . $_GET['produto'] . "','" . $_SESSION['id'] . "','$cartao','$endereco','1','" . $produto['valor'] / $parcela . "','" . $produto['valor'] . "', $parcela,'pendente','" . date('Y-m-d') . "','" . date('Y-m-d', strtotime('+7 days')) . "')");

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


        var cartaoFields = document.querySelectorAll('#formularioCartao input, #formularioCartao select');
        cartaoFields.forEach(function(field) {
            if (field.tagName === 'SELECT') {
                field.disabled = true;
                field.selectedIndex = 0;
            } else {
                field.disabled = true;
                field.value = '';
            }
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
            var cartaoInputs = document.querySelectorAll('#formularioCartao input, #formularioCartao select');

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
    <script src="js/js.js"></script>
    <?php require_once "template/modal_sair.php";  ?>
</body>

</html>