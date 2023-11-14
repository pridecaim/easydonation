<?php
session_start();
require_once("../action/Ong.php");
require_once("../database/conexao.php");
include("components/navbar.php");

$img = $_GET['img'];
$nome = $_GET['nome'];
$telefone = $_GET['telefone'];
$endereco = $_GET['endereco'];
$site = $_GET['site'];
$descricao = $_GET['descricao'];
$missao = $_GET['missao'];
$area = $_GET['area'];
$caminhos_galeria = array(); // Inicialize a variável para a galeria de imagens

if (isset($_GET['galeria'])) {
    $galeria_decodificada = urldecode($_GET['galeria']);
    $caminhos_galeria = explode(';', $galeria_decodificada);
}



$db = new Conexao();
$conn = $db->getConnection();
$ong = new Ong($conn);

$ongs = $ong->buscarTodasOngs();

if (isset($_POST['doar'])) {
    // Armazene os dados da ONG na sessão
    $_SESSION['ong_nome'] = $nome;
    $_SESSION['ong_img'] = $img;
    header("Location: pagamento.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo ($nome) ?>
    </title>
    <link rel="stylesheet" href="../public/css/stylesin.css">
    <link rel="stylesheet" href="../public/scss/pictures.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body class="bg-custom">

    <div class="image-gallery">
        <h3>Galeria de Imagens</h3>
        <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                if (isset($caminhos_galeria) && !empty($caminhos_galeria)) {
                    foreach ($caminhos_galeria as $index => $imagem) {
                        $activeClass = ($index === 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $activeClass . '">';
                        echo '<img src="' . $imagem . '" class="d-block w-100" alt="Imagem da galeria ' . ($index + 1) . '">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próxima</span>
            </button>
        </div>
    </div>
    <div class="background-square-gradient">
        <h3>
            <?php echo ($nome); ?>
        </h3>
        <p>Descrição:
            <?php echo ($descricao); ?>
        </p>
        <p>Telefone:
            <?php echo ($telefone); ?>
        </p>
        <p>Site: <a href="<?php echo $site; ?>" target="_blank">
                <?php echo $site; ?>
            </a></p>
        <p>Endereço:
            <?php echo ($endereco); ?>
        </p>
    </div>

    <form method="POST">
        <div class="background-square-gradient-right">
            <h3>Você pode fazer a diferença!</h3>
            <p>
                <?php echo ($missao); ?>
            </p>
            <p>Área de Atuação:
                <?php echo ($area); ?>
            </p>
            <button name="doar">Doar</button>
        </div>
    </form>
</body>

</html>