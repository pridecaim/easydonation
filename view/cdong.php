<?php
require_once("../action/Ong.php");
require_once("../database/conexao.php");
$database = new Conexao();
$db = $database->getConnection();
$ong = new Ong($db);

if (isset($_POST['cadastrar'])) {
    $caminhos_imagens = $ong->cadastrarong($_POST, $_FILES);
    if ($caminhos_imagens['result'] !== false) {
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
            <input type="text" name="missao" placeholder="Diga alguns motivos para doar para a sua Ong" required>
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

            <input type="file" name="galeria[]" id="galeriaInput" style="display: none; color: blue;" required multiple>
            <label id="galeriaLabel" for="galeriaInput">Enviar Galeria de Imagens</label><br>

            <button name="cadastrar" id="cadastrar">Cadastrar</button>
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

        document.getElementById('galeriaInput').onchange = function (e) {
            var input = e.target;
            var label = document.getElementById('galeriaLabel');

            if (input.files && input.files.length > 0) {
                label.innerHTML = "Imagens enviadas";
            }
        };

        <?php
        if (isset($caminhos_imagens) && $caminhos_imagens['result']) {
            echo "alert('Ong cadastrada com sucesso!');";
            echo "window.location.href = 'cduser.php';"; 
        }
        ?>
    </script>

</body>

</html>