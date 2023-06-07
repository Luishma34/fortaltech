<?php
$id_produto = $_POST['id_produto'];
$result = $mysqli->query("SELECT * FROM produtos WHERE id_produto = $id_produto");
$produto = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $nome = trim($_POST['nome']);
    $estoque = trim($_POST['estoque']);
    $valor = trim($_POST['valor']);
    $detalhes_tec = trim($_POST['detalhes_tec']);
    $marca = trim($_POST['marca']);

    if (empty($nome) || empty($estoque) || empty($valor) || empty($detalhes_tec) || empty($marca)) {

        echo "<script>alert('Preencha todos os campos!');</script>";
    } else if (isset($_POST['atualizar_imagem']) && $_POST['atualizar_imagem'] == 'sim') {
        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
            $img_ext = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

            if ($img_ext != 'jpg' && $img_ext != 'png' && $img_ext != 'jpeg') {

                echo "<script>alert('Extensão de imagem inválida');</script>";
            } else {
                $img_name = uniqid() . '.' . $img_ext;

                $move_img = move_uploaded_file($_FILES['img']['tmp_name'], '../img/' . $img_name);

                if ($move_img) {
                    $query = "UPDATE produtos SET nome = '$nome', estoque = '$estoque', valor = '$valor', detalhes_tec = '$detalhes_tec', marca = '$marca', img_url = '$img_name' WHERE id_produto = $id_produto";
                    $mysqli->query($query);

                    echo "<script>alert('Produto atualizado com sucesso $nome!');</script>";
                    echo "<script>window.location.href = 'http://localhost/ft/admin/admin.php?action=produtos';</script>";
                } else {
                    echo "<script>alert('A imagem não foi enviada');</script>";
                }
            }
        } else {
            echo "<script>alert('A imagem não foi enviada');</script>";
        }
    } else {
        $query = "UPDATE produtos SET nome = '$nome', estoque = '$estoque', valor = '$valor', detalhes_tec = '$detalhes_tec', marca = '$marca' WHERE id_produto = $id_produto";
        $mysqli->query($query);
        echo "<script>window.location.href = 'http://localhost/ft/admin/admin.php?action=produtos';</script>";
    }
}
?>


<h1 class="mt-4">Alterar Produto</h1>
<form action="" method="POST" enctype="multipart/form-data" class="mt-4 w-50">
    <input type='hidden' name='id_produto' value='<?php echo $_POST['id_produto']; ?>'>

    <div class="form-group row mb-3">
        <label for="nome" class="col-sm-4 col-form-label text-right">Nome:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="nome" value="<?php echo $produto['nome']; ?>">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="estoque" class="col-sm-4 col-form-label text-right">Estoque:</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="estoque" value="<?php echo $produto['estoque']; ?>">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="valor" class="col-sm-4 col-form-label text-right">Valor:</label>
        <div class="col-sm-8">
            <input type="number" step=".01" class="form-control" name="valor" value="<?php echo $produto['valor']; ?>">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="marca" class="col-sm-4 col-form-label text-right">Marca:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="marca" value="<?php echo $produto['marca']; ?>">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="detalhes_tec" class="col-sm-4 col-form-label text-right">Detalhes Técnicos:</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="detalhes_tec"><?php echo $produto['detalhes_tec']; ?></textarea>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="img" class="col-sm-4 col-form-label text-right">Imagem:</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="img">
        </div>
    </div>

    <div class="form-group row mb-3">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="atualizar_imagem" value="sim" checked>
                <label class="form-check-label" for="atualizar_imagem">Atualizar imagem</label>
            </div>
        </div>
    </div>
    

    <div class="form-group row mb-3">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-50 mt-3" name="submit">Atualizar</button>
        </div>
</form>