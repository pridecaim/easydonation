<?php
// Inclua os arquivos necessários
require_once("../action/Ong.php");
require_once("../database/conexao.php");

// Crie uma instância da classe de conexão com o banco de dados
$database = new Conexao();
$db = $database->getConnection();

// Crie uma instância da classe Ong passando a conexão como argumento
$ong = new Ong($db);
// Verifique se o formulário de cadastro foi enviado (cadastrar)
if (isset($_POST['cadastrar'])) {
    // Obtenha os valores do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $site = $_POST['site'];
    $descricao = $_POST['descricao'];
    $missao = $_POST['missao'];
    $area = $_POST['area'];

    // Chame a função cadastrarong() da classe Ong com os dados do formulário e a imagem
    if ($ong->cadastrarong($_POST, $_FILES)) {
        echo "<script>alert('Ong cadastrada com sucesso!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Ong</title>
    <link rel="stylesheet" href="../public/css/stylecd.css">
    <link rel="icon" href="../public/img/logonobg.png" type="image/x-icon">
</head>

<body class="body-ong">
    <div class="container-ong" id="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="circle">
                <img id="ongImage" src="../public/img/user.png" alt="Imagem da ONG">
                <input type="file" name="img" id="imageInput" style="display: none;">
                <label for="imageInput"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;"></label>
            </div>
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" minlength="8" required>
            <input type="tel" name="telefone" placeholder="Telefone" required>
            <input type="text" name="endereco" placeholder="Endereço" required>
            <input type="text" name="site" placeholder="Site Oficial">
            <input type="text" name="descricao" placeholder="Fale um pouco sobre sua Ong" required>
            <input type="text" name="missao" placeholder="Fale sobre a missão da sua Ong" required>
            <select name="area" id="area" required>
                <option value="" disabled selected>Selecione a área de atuação</option>
                <option value="Saúde">Saúde</option>
                <option value="Educação">Educação</option>
                <option value="Direito dos Animais">Direito dos Animais</option>
                <option value="Meio ambiente">Meio Ambiente</option>
                <option value="Crianças carentes">Crianças Carentes</option>
                <option value="Assistência Social">Assistência Social</option>
                <option value="Desenvolvimento comunitário">Desenvolvimento Comunitário</option>
                <option value="Cultura e arte">Cultura e Arte</option>
                <option value="Acesso a água potável e saneamento">Acesso à Água potável e Saneamento</option>
            </select>

            <button name="cadastrar" id="cadastrar" href="cduser.php">Cadastrar</button>
            <a href="cduser.php">Voltar a tela de login</a>
        </form>
    </div>
    </div>

    <script>
        document.getElementById('imageInput').onchange = function (e) {
            var reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('ongImage').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        };
    </script>
</body>

</html>