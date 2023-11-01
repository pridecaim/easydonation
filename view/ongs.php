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
    <link rel="stylesheet" href="../public/scss/pictures.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body class="bg-custom">

    <div class="options">
        <div class="option active"
            style="--optionBackground:url(https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg);">
            <div class="shadow"></div>
            <div class="label">
                <div class="icon">
                    <i class="fas fa-walking"></i>
                </div>
                <div class="info">
                    <div class="main">Blonkisoaz</div>
                    <div class="sub">Omuke trughte a otufta</div>
                </div>
            </div>
        </div>
        <div class="option"
            style="--optionBackground:url(https://66.media.tumblr.com/8b69cdde47aa952e4176b4200052abf4/tumblr_o51p7mFFF21qho82wo1_1280.jpg);">
            <div class="shadow"></div>
            <div class="label">
                <div class="icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <div class="info">
                    <div class="main">Oretemauw</div>
                    <div class="sub">Omuke trughte a otufta</div>
                </div>
            </div>
        </div>
        <div class="option"
            style="--optionBackground:url(https://66.media.tumblr.com/5af3f8303456e376ceda1517553ba786/tumblr_o4986gakjh1qho82wo1_1280.jpg);">
            <div class="shadow"></div>
            <div class="label">
                <div class="icon">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="info">
                    <div class="main">Iteresuselle</div>
                    <div class="sub">Omuke trughte a otufta</div>
                </div>
            </div>
        </div>
        <div class="option"
            style="--optionBackground:url(https://66.media.tumblr.com/5516a22e0cdacaa85311ec3f8fd1e9ef/tumblr_o45jwvdsL11qho82wo1_1280.jpg);">
            <div class="shadow"></div>
            <div class="label">
                <div class="icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="info">
                    <div class="main">Idiefe</div>
                    <div class="sub">Omuke trughte a otufta</div>
                </div>
            </div>
        </div>
        <div class="option"
            style="--optionBackground:url(https://66.media.tumblr.com/f19901f50b79604839ca761cd6d74748/tumblr_o65rohhkQL1qho82wo1_1280.jpg);">
            <div class="shadow"></div>
            <div class="label">
                <div class="icon">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="info">
                    <div class="main">Inatethi</div>
                    <div class="sub">Omuke trughte a otufta</div>
                </div>
            </div>
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
            </a>
        </p>

        <p>Endereço:
            <?php echo ($endereco); ?>
        </p>
    </div>
    <form method="POST">
        <div class="background-square-gradient-right">
            <h3>
                Você pode fazer a diferença!
            </h3>
            <p>
                <?php echo ($missao); ?>
            </p>
            <p>Área de Atuação:
                <?php echo ($area); ?>
            </p>
            <button name="doar">Doar</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".option").click(function () {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });
    </script>
</body>

</html>