<?php
require_once("../action/Ong.php");
require_once("../database/conexao.php");
include("components/navbar.php");

$email = $_SESSION['email'];
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
  <title>Inicio</title>
  <link rel="stylesheet" href="../public/css/stylesin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body class="bg-custom">


<div class="ong-catalog">
  <?php foreach ($ongs as $ong): ?>
    <div class="ong-entry">
      <div class="ong-rectangle">
        <img src="<?php echo $ong['img']; ?>" alt="<?php echo $ong['nome']; ?>">
        <p><?php echo $ong['nome']; ?></p>
        <a href="ongs.php?id=<?php echo $ong['id']; ?>&nome=<?php echo urlencode($ong['nome']); ?>&img=<?php echo urlencode($ong['img']); ?>&email=<?php echo urlencode($ong['email']); ?>&telefone=<?php echo urlencode($ong['telefone']); ?>&endereco=<?php echo urlencode($ong['endereco']); ?>&site=<?php echo urlencode($ong['site']); ?>&descricao=<?php echo urlencode($ong['descricao']); ?>&missao=<?php echo urlencode($ong['missao']); ?>&area=<?php echo urlencode($ong['area']); ?>">Saiba Mais</a>

      </div>
    </div>
  <?php endforeach; ?>
</div>
</body>
</html>