<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FortalTech</title>
</head>

<body>
  <style>
    body {
      background: #192231;
    }

    .container {
      background-image: url("https://cicapcapacitacion.com/wp-content/uploads/2021/02/Cicap-producto-7.png");
      background-size: 100%;
      padding: 5%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      /*O primeiro 50 é referente ao X(horizontal) e o segundo 50 é referente Y(vertical), como se fosse um raio */
    }

    #input {
      padding: 20px;
      width: 400px;
    }

    #btn {
      display: flex;
      flex-direction: row;
      justify-content: center;
      padding: 10px;
      width: 200px;

    }
  </style>
  <div class="princ">
    <div class="container">
      <form action="cadastro.php" method="post">
        <input id="input" type="text" name="name" placeholder="Nome" required><br><br>
        <input id="input" type="email" name="email" placeholder="Email" required><br><br>
        <input id="input" type="password" name="password" placeholder="Senha" required><br><br>
        <input id="input" type="tel" name="tel" placeholder="Telefone" required><br><br>
        <input id="btn" type="submit" value="Enviar"><br><br>
      </form>
    </div>
  </div>
</body>

</html>