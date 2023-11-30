<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: ../public/index.php");
  exit();
}
$email = $_SESSION['email'];
require_once("../action/Ong.php");
require_once("../database/conexao.php");

if (isset($_SESSION['ong_nome']) && isset($_SESSION['ong_img'])) {
  $ongNome = $_SESSION['ong_nome'];
  $ongImg = $_SESSION['ong_img'];
}
$db = new Conexao();
$conn = $db->getConnection();
$ong = new Ong($conn);

$ongs = $ong->buscarTodasOngs();

if (isset($_GET['valor'])) {
  $valorSelecionado = $_GET['valor'];
} else {
  $valorSelecionado = "Nenhum valor selecionado";
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finalizar doação</title>
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="icon" href="../public/img/logonobg.png" type="image/x-icon">
</head>

<body>

  <a href="javascript:history.back()">
    <img src="../public/img/back.png" alt="Imagem do voltar" style="width: 20px; height:30;">
  </a>
  <p style="margin-left:45px;">Finalizar Doação</p>
  <div class="listra">
  </div>

  <div class="payment-form">
    <p>Forma de pagamento</p>
    <form id="checkbox-round"></form>

    <div class="pix-box" style="display: flex; align-items: center;">
      <input type="checkbox" name="PIX" id="PIX">
      <div style="display: flex; align-items: center;">
        <img src="../public/img/pix.jpg" alt="Imagem do PIX"
          style="width:auto; height: 60px;  margin-right: 10px;">PIX<br>
      </div>
    </div>


  </div>
  </div>

  <div class="background-square-right">
    <?php
    echo "<img src='$ongImg' alt='Imagem da ONG'>";
    echo "<p>$ongNome</p>";
    ?>
    <div class="listra1">
      <p style="margin-bottom:3px;">Selecione o valor desejado:</p>
      <input type="radio" name="valor" id="R$10">
      <label for="R$10">R$10</label>

      <input type="radio" name="valor" id="R$20">
      <label for="R$20">R$20</label>

      <input type="radio" name="valor" id="R$50">
      <label for="R$50">R$50</label>

    </div>

    <div class="listra2">
    </div>
    <p>Ao clicar em “DOAR” abaixo, declaro que<br>tenho mais de 18 anos e que sou um usuário<br>autorizado desse
      método de pagamento, e que<br>concordo com os <a href="aboutus.php#term">termos e condições</a></p> <br>
      <a href="#" id="doarButton">
      <button name="doar">Doar</button>
    </a>



  </div>
  <?php include("components/footer.php") ?>

  <script>
    
    var pix = document.getElementById('PIX');
    

    pix.addEventListener('change', function () {
      if (this.checked) {
        credito.checked = false;
        boleto.checked = false;
      }
    });

    const radios = document.querySelectorAll('input[type="radio"]');

    radios.forEach(radio => {
      radio.addEventListener('click', () => {
        radios.forEach(otherRadio => {
          if (otherRadio !== radio) {
            otherRadio.checked = false;
          }
        });
      });
    });


  document.getElementById('doarButton').addEventListener('click', function () {
    var selectedRadio = document.querySelector('input[type="radio"]:checked');
    
    if (selectedRadio) {
      var valorSelecionado = selectedRadio.id;
      window.location.href = 'pix.php?valor=' + encodeURIComponent(valorSelecionado);
    } else {
      alert('Por favor, selecione um valor antes de doar.');
    }
  });
</script>

</body>
</html>