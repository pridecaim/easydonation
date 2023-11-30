<?php
session_start();
require_once("../action/Ong.php");
require_once("../database/conexao.php");
include("../view/components/navbar.php");

$db = new Conexao();
$conn = $db->getConnection();
$ong = new Ong($conn);

$ongs = $ong->buscarTodasOngs();

// Inicializa a variável de resultados da pesquisa
$searchResults = [];

// Verifica se a pesquisa foi realizada
if (isset($_GET['q'])) {
    // Obtém o termo de pesquisa
    $searchTerm = $_GET['q'];

    // Substitua isso pela chamada real à função de pesquisa do seu banco de dados
    // Aqui estou assumindo que você tem uma função de pesquisa na classe Ong
    $searchResults = $ong->searchOngs($searchTerm);
}
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
    <div class="container">
        <!-- Lista de ONGs ou resultados da pesquisa -->
        <div class="ong-catalog">
            <?php
            if (empty($searchResults)) {
                foreach ($ongs as $ong):
                    ?>
                    <div class="ong-entry">
                        <div class="ong-rectangle">
                            <img src="<?php echo $ong['img']; ?>" alt="<?php echo $ong['nome']; ?>">
                            <p>
                                <?php echo $ong['nome']; ?>
                            </p>
                            <a href="../view/ongs.php?id=<?php echo $ong['id']; ?>">Saiba Mais</a>
                        </div>
                    </div>
                    <?php
                endforeach;
            } else {
                // Exibe resultados da pesquisa
                foreach ($searchResults as $ong):
                    ?>
                    <div class="ong-entry">
                        <div class="ong-rectangle">
                            <img src="<?php echo $ong['img']; ?>" alt="<?php echo $ong['nome']; ?>">
                            <p>
                                <?php echo $ong['nome']; ?>
                            </p>
                            <a href="../view/ongs.php?id=<?php echo $ong['id']; ?>">Saiba Mais</a>
                        </div>
                    </div>
                    <?php
                endforeach;
            }
            ?>
        </div>
    </div>
</body>

</html>