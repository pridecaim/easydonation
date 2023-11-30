<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  exit();
}
$email = $_SESSION['email'];
require_once("../action/Ong.php");
require_once("../database/conexao.php");

$db = new Conexao();
$conn = $db->getConnection();
$ong = new Ong($conn);

$ongs = $ong->buscarTodasOngs();

$valorSelecionado = isset($_GET['valor']) ? urldecode($_GET['valor']) : "Nenhum valor selecionado";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pix</title>
  <link rel="stylesheet" href="../public/css/style.css">
  <link rel="icon" href="../public/img/logonobg.png" type="image/x-icon">
</head>

<body class="bodypix">

  <a href="javascript:history.back()">
    <img src="../public/img/back.png" alt="Imagem do voltar" style="width: 20px; height:30;">
  </a>

  <img src="../public/img/logonobg.png" alt="Imagem de fundo" class="imglogo">

  <div class="listrapix">
    <img src="../public/img/pixlogobw.png" alt="pix"
      style="position: absolute; left: 38%; top: 6px; width: 40px; height: 40px;">
    <p style="top: 100px; margin-left:600px; font-size: 25px; left: 50%;">PIX</p>
  </div>

  <p style="position: absolute; left: 85px; margin-top: 140px; font-size: 25px; ">Pix</p>
  <img src="../public/img/pixlogo.png" alt="pix"
    style="position: absolute; left: 35px; top: 140px; width: 40px; height: 40px;">

  <p style="position: absolute; top: 175px; font-size: 25px; left: 35px;">Dados pessoais</p>

  <div class="dados-pessoais" style="position: absolute; top: 275px; left: 35px;">

    <label for="nomeCompleto" style="position: absolute; top: -25px; ">Nome completo</label>
    <input type="text" id="nomeCompleto" name="nomeCompleto" style="margin-right: 50px; width: 288px; height: 35px;">

    <label for="cpf" style="position: absolute; top: -25px;">CPF</label>
    <input type="number"  style="margin-right: 50px; width: 288px; height: 35px;">
  </div>

  <div class="retangulo">
    <p style=" font-size: 25px; text-align: center; margin: 25px; color: red;">Finalize o pagamento utilizando Pix!</p>

    <div class="qrcode">
      <p style="font-size: 15px; text-align: center;  line-height: 1;">Você pode usar a câmera do seu celular para ler o
      </p>
      <p style="font-size: 15px; text-align: center;  line-height: 1;">QR Code ou Copiar o código e pagar no seu </p>
      <p style="font-size: 15px; text-align: center; line-height: 1;">aplicativo de seu banco:</p>
    </div>


    <div class="cod">
      <p style="margin-left: 20px; font-size: 13px; color: #404040;">Código da Transação:</p>
    </div>

    <div class="info" style="margin-left: 20px;">
      <p style="margin-left: 20px; font-size: 13px; color: #404040">Você esta apoiando a ONG:</p>
      <?php foreach ($ongs as $ong): ?>
        <p style="margin-left: 65px;">
          <?php echo $ong['nome']; ?>
        </p>
        <div class="ong-entry">
          <div class="ong-rectangle">
            <img src="<?php echo $ong['img']; ?>" alt="<?php echo $ong['nome']; ?>">
          </div>
        </div>
      <?php endforeach; ?>

      <p style="margin-left: 20px; font-size: 13px; padding-top: 15px; color: #404040;">Forma de pagamento:</p>
      <img src="../public/img/pixlogobw.png" alt="pix"
        style="position: absolute; left: 20px; top: 115px; width: 25px; height: 25px;">
      <p style="margin-left: 50px; font-size: 13px; padding-top: -10px; line-height: 1;">PIX</p>
      <p style="margin-left: 20px; font-size: 13px; padding-top: 10px; line-height: 1; color: #404040;">Tempo de processamento</p>
      <p style="margin-left: 20px; font-size: 13px; padding-top: 10px; line-height: 1;">Em média 10 segundos</p>
    </div>

    <div class="total">
      <p style="margin-left: 20px; font-size: 13px;">
        <?php echo "Total a pagar: " . $valorSelecionado; ?>
      </p>
    </div>


</body>

</html>