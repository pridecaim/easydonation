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

  <img src="../public/img/logonobg.png" alt="Imagem de fundo"
            style="width: 45px; height: auto; margin-right: 90px;">
<div class= "listrapix">
<p style="margin-left:600px; font-size: 25px; ">PIX</p>
</div>


<h1>Valor Selecionado:</h1>
  <p><?php echo $valorSelecionado; ?></p>

</body>
</html>