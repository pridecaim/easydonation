<?php
session_start();
require_once("../action/Usuario.php");
require_once("../database/conexao.php");


$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <link rel="stylesheet" href="../public/css/stylesin.css">
  <link rel="icon" href="../public/img/logonobg.png" type="image/x-icon">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    #menu {
      width: 250px;
      height: 70%;
      top: 0;
      left: 100px;
      background: linear-gradient(333.98deg, #FF774B -2.35%, #EC5571 43.77%, #D83396 75.18%, #8918BE 94.95%);
      padding-top: 20px;
      transition: 0.5s;
      border-radius: 20px;

    }

    #menu a {
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
      transition: 0.3s;
      padding: 15px;
      color: #f1f1f1;
    }

    #menu a:hover {
      color: #bbb;
    }

    #main {
      transition: margin-left 0.5s;
      padding: 16px;
    }

    .circle {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      left: -55px;
      margin: 0 auto;
      position: relative;
      cursor: pointer;
    }

    #userImage {
      width: 100%;
      border-radius: 50%;
      height: auto;
      display: block;
      object-fit: cover;
    }

    #imageInput {
      display: none;
    }

    #menu a {
      display: flex;
      flex-direction: row;
    }

    #menu img {
      width: 40px;
      height: auto;
      margin: 5px;
      margin-top: -10px;
    }
  </style>
</head>

<body class="bg-custom">
  <div class="background-square-gradient-left">
    <div id="menu">
      <a href="../public/index.php"> <img src="../public/img/logonobg.png" alt="Imagem de fundo">Início</a>

      <a href="#"> <img src="../public/img/perfil.png" alt="Imagem de fundo"> Perfil</a>

      <a href="#"><img src="../public/img/config.png" alt="Imagem de fundo">Configurações</a>


      <a href="#"> <img src="../public/img/help.png" alt="Imagem de fundo">Ajuda</a>


      <a href="logout.php"><img src="../public/img/logout.png" alt="Imagem de fundo">Sair</a>
    </div>
  </div>

  <!-- Segundo quadrado à direita -->
  <div class="background-square-gradient-right-tall">
    <div class="container-atualizar">
      <div class="circle" id="imageContainer">
        <img id="userImage" src="../public/img/whiteuser.png" alt="Imagem do Usuário">
        <input type="file" name="img" id="imageInput" style="display: none;">
        <label for="imageInput"
          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;"></label>
      </div>
      <label for="nome">Nome</label>
      <input type="text" name="nome" placeholder="<?php echo $_SESSION['nome']; ?>">
      <label for="email">E-mail</label>
      <input type="email" name="email" placeholder="<?php echo $_SESSION['email']; ?>">
      <label for="senha">Senha</label>
      <input type="password" name="senha" placeholder="Insira sua senha para atualizar" required>

      <button name="atualizar">ATUALIZAR</button>
    </div>
  </div>
  <script>
    document.getElementById('imageInput').onchange = function (e) {
      var reader = new FileReader();
      reader.onload = function (event) {
        document.getElementById('userImage').src = event.target.result; // Atualiza a imagem
      };
      reader.readAsDataURL(e.target.files[0]);
    };
  </script>
</body>

</html>