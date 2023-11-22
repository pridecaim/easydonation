<?php
if (isset($_GET['valor'])) {
  $valorSelecionado = $_GET['valor'];
} else {
  $valorSelecionado = "Nenhum valor selecionado"; // Valor padrão se nenhum valor for fornecido
}
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

<div class= "listrapix">
<img src="../public/img/pixlogobw.png" alt="pix" style="position: absolute; left: 38%; top: 10px; width: 40px; height: 40px;">
<p style="top: 100px; margin-left:600px; font-size: 25px; left: 50%;">PIX</p>
</div>

<p style="position: absolute; left: 85px; top: 150px; font-size: 25px; ">Pix</p>
<img src="../public/img/pixlogo.png" alt="pix" style="position: absolute; left: 35px; top: 170px; width: 40px; height: 40px;">

<p style="position: absolute; top: 195px; font-size: 25px; left: 35px;">Dados pessoais</p>

<p style= "position: absolute; left: 35px; top: 250px; font-size: 15px;">Nome completo</p>



<label for="nome completo">Nome completo</label>
<input type="text">

<label for="cpf">CPF</label>
<input type="number">



<div class= "retangulo">
<h1>Valor Selecionado:</h1>
  <p><?php echo $valorSelecionado; ?></p>

</body>
</html>