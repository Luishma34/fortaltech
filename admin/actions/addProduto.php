<?php

if (isset($_POST['submit'])) {
    $nome = trim($_POST['nome']);
    $estoque = trim($_POST['estoque']);
    $valor = trim($_POST['valor']);
    $detalhes_tec = trim($_POST['detalhes_tec']);
    $marca = trim($_POST['marca']);

    if (empty($nome) || empty($estoque) || empty($valor) || empty($detalhes_tec) || empty($marca)) {

        echo "<script>alert('Preencha todos os campos!');</script>";
    } else if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $img_ext = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

        if ($img_ext != 'jpg' && $img_ext != 'png' && $img_ext != 'jpeg' && $img_ext != 'webp') {

            echo "<script>alert('Extensão de imagem inválida');</script>";
        } else {
            $img_name = uniqid() . '.' . $img_ext;

            $move_img = move_uploaded_file($_FILES['img']['tmp_name'], '../img/' . $img_name);

            if ($move_img) {
                $query = "INSERT INTO produtos (nome, estoque, valor, detalhes_tec, marca, img_url)
                VALUES ('$nome', '$estoque', '$valor', '$detalhes_tec', '$marca', '$img_name')";
                $mysqli->query($query);

                echo "<script>alert('Produto adicionado com sucesso $nome!');</script>";
                echo "<script>window.location.href= window.location.href;</script>";
            } else {
                echo "<script>alert('A imagem não foi enviada');</script>";
            }
        }
    } else {
        echo "<script>alert('A imagem não foi enviada');</script>";
    }
}
?>

<h1 class="mt-5">Novo Produto</h1>
<form action="" method="POST" enctype="multipart/form-data" class="w-50 m-5">
    <div class="form-group row mb-3">
        <label for="nome" class="col-sm-4 col-form-label text-right">Nome:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="nome">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="estoque" class="col-sm-4 col-form-label text-right">Estoque:</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" name="estoque">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="valor" class="col-sm-4 col-form-label text-right">Valor:</label>
        <div class="col-sm-8">
            <input type="number" step=".01" class="form-control" name="valor">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="marca" class="col-sm-4 col-form-label text-right">Marca:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="marca">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="img" class="col-sm-4 col-form-label text-right">Imagem:</label>
        <div class="col-sm-8">
            <input type="file" class="form-control" name="img">
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="detalhes_tec" class="col-sm-4 col-form-label text-right">Detalhes Técnicos:</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="detalhes_tec"></textarea>
        </div>
    </div>


    <div class="form-group row mb-3">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-50 mt-3" name="submit">Adicionar</button>
        </div>
    </div>

</form>