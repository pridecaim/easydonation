<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajuda</title>
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

<body>
  <div class="background-square-gradient-left">
    <div id="menu">
      <a href="../public/index.php"> <img src="../public/img/logonobg.png" alt="Imagem de fundo">Início</a>

      <a href="perfil.php"> <img src="../public/img/perfil.png" alt="Imagem de fundo"> Perfil</a>

      <a href="ajuda.php"> <img src="../public/img/help.png" alt="Imagem de fundo">Ajuda</a>

      <?php if (isset($_SESSION['email'])): ?>
        <a href="logout.php"><img src="../public/img/logout.png" alt="Imagem de fundo">Sair</a>
      <?php else: ?>
        <a href="logout.php"><img src="../public/img/login.png">Entrar</a>
      <?php endif; ?>
    </div>
  </div>


  <div class="background-help">
    <div class="container-help">
      <h3>Como você prefere falar com a gente?</h3>
      <div class="contact-info">
        <div>
          <img width="30" height="30" src="https://img.icons8.com/ios/50/phone--v1.png" alt="phone--v1" />
          <h4>Telefone</h4>
          <small>Você pode ligar a qualquer hora!</small><br>
          <a href="tel:41997766653">(41)997766653</a>
          <a href="tel:41996984247">(41)996984247</a>
        </div>
        <div>
          <img width="30" height="30" src="https://img.icons8.com/ios/50/new-post--v1.png" alt="new-post--v1" />
          <h4>E-mail</h4>
          <small>Tem alguma dúvida?</small><br>
          <a href="mailto:easy.donation@outlook.com">easy.donation@outlook.com</a>
        </div>
      </div>
      <div class="termos">
        <a href="aboutus.php#term">Termos e condições</a>
      </div>
    </div>
  </div>
</body>

</html>