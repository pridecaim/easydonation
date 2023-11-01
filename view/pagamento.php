<?php
session_start();
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



  <p style="margin-left:102px;">Finalizar Doação</p>
  <div class="listra">
  </div>

  <div class="payment-form">
    <p>Formas de pagamento</p>
    <form id="checkbox-round"></form>
    <div class="credit-box" style=" align-items: center;">
      <input type="checkbox" name="credito" id="credito" class="checkbox-round"><img src="../public/img/credit.jpg"
        alt="Imagem do cartão de crédito" style="width:125px; height: 80px;  margin-right: 10px;">
      Cartão de crédito<br>
      <span>Você será direcionado para a página <br>de adicionar um cartão.</span><br>
      <a href="">termos e condições</a><br>
    </div>

    <div class="pix-box" style="display: flex; align-items: center;">
      <input type="checkbox" name="PIX" id="PIX">
      <div style="display: flex; align-items: center;">
        <img src="../public/img/pix.jpg" alt="Imagem do PIX"
          style="width:125px; height: 50px;  margin-right: 10px;">PIX<br>
      </div>
    </div>

    <div class="boleto-box" style="display: flex; align-items: center;">
      <input type="checkbox" name="boleto" id="boleto">
      <div style="display: flex; align-items: center;">
        <img src="../public/img/boleto.jpg" alt="Imagem do boleto bancário"
          style="width: 125px; height: 45px; margin-right: 10px;">
        Boleto bancário
      </div>
    </div>
  </div>

  <div class="background-square-right">
    <?php
    echo "<img src='$ongImg' alt='Imagem da ONG'>";
    echo "<p>$ongNome</p>";
    ?>
    <div class="listra1">
    </div>
    <div class="listra2">
      <p>Ao clicar em “DOAR” abaixo, declaro que<br>tenho mais de 18 anos e que sou um usuário<br>autorizado desse
        método de pagamento, e que<br>concordo com os <a href="">termos e condições</a></p> <br>
    </div>
  </div>
  <script>
    var credito = document.getElementById('credito');
    var pix = document.getElementById('PIX');
    var boleto = document.getElementById('boleto');

    credito.addEventListener('change', function () {
      if (this.checked) {
        pix.checked = false;
        boleto.checked = false;
      }
    });

    pix.addEventListener('change', function () {
      if (this.checked) {
        credito.checked = false;
        boleto.checked = false;
      }
    });

    boleto.addEventListener('change', function () {
      if (this.checked) {
        credito.checked = false;
        pix.checked = false;
      }
    });

  </script>
</body>