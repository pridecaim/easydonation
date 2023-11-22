<?php
include_once('../database/conexao.php');
$db = new Conexao();

class Ong
{
    private $conn;
    private $table_name = "ongs";
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrarong($postValue, $fileValue)
    {
        $img = $fileValue['img'];
        $nome = $postValue['nome'];
        $email = $postValue['email'];
        $senha = $postValue['senha'];
        $telefone = $postValue['telefone'];
        $endereco = $postValue['endereco'];
        $site = $postValue['site'];
        $descricao = $postValue['descricao'];
        $missao = $postValue['missao'];
        $area = $postValue['area'];
        // ...
        $galeria = $fileValue['galeria'];
        $caminho_arquivo = ''; // Inicialize a variável para a imagem principal
        $caminhos_imagens = array(); // Inicialize a variável para a galeria de imagens

        if (isset($img)) {
            $arquivo = $img;
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $ex_permitidos = array('jpg', 'jpeg', 'png', 'gif', 'webp');

            if (in_array(strtolower($extensao), $ex_permitidos)) {
                $caminho_arquivo = '../public/img/' . time() . '.' . $extensao;
                move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);
            } else {
                die('Você não pode fazer upload desse tipo de arquivo');
            }
        }

        $caminhos_galeria = array(); // Inicialize a variável para a galeria de imagens

        if (!empty($galeria)) {
            foreach ($galeria['tmp_name'] as $key => $tmp_name) {
                $nome_imagem = $galeria['name'][$key];
                $extensao = pathinfo($nome_imagem, PATHINFO_EXTENSION);

                // Verifique se a extensão é permitida
                $ex_permitidos = array('jpg', 'jpeg', 'png', 'gif', 'webp');
                if (in_array(strtolower($extensao), $ex_permitidos)) {
                    $caminho_galeria = '../public/img/' . time() . '_' . $nome_imagem;
                    move_uploaded_file($tmp_name, $caminho_galeria);
                    $caminhos_galeria[] = $caminho_galeria; // Adicione o caminho da imagem à lista
                } else {
                    die('Você não pode fazer upload desse tipo de arquivo');
                }
            }
        }

        $emailExistente = $this->verificarEmailExistente($email);
        $nomeExistente = $this->verificarNomeExistente($nome);

        if ($emailExistente || $nomeExistente) {
            echo "<script>alert('Email e/ou nome já cadastrados')</script>";
            return array('result' => false, 'caminhos_imagens' => $caminhos_imagens);
        }

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO " . $this->table_name . " (img, nome, email, senha, telefone, endereco, site, descricao, missao, area, galeria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $caminho_arquivo); // Caminho da imagem principal
        $stmt->bindValue(2, $nome);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $senhaCriptografada);
        $stmt->bindValue(5, $telefone);
        $stmt->bindValue(6, $endereco);
        $stmt->bindValue(7, $site);
        $stmt->bindValue(8, $descricao);
        $stmt->bindValue(9, $missao);
        $stmt->bindValue(10, $area);
        $stmt->bindValue(11, implode(';', $caminhos_galeria)); // Caminho da galeria de imagens
        $result = $stmt->execute();

        return array('result' => $result, 'caminhos_imagens' => $caminhos_imagens);
    }

    private function verificarEmailExistente($email)
    {
        $sql = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE email=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
    private function verificarNomeExistente($nome)
    {
        $sql = "SELECT COUNT(*) FROM " . $this->table_name . " WHERE nome=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function logar($email, $senha)
    {
        $sql = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $ong = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($senha, $ong['senha'])) {
                return true;
            }
        }
        return false;
    }

    public function buscarTodasOngs()
    {
        try {
            $sql = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return array(); // Retorna um array vazio em caso de erro
        }
    }
    public function getNome($email)
    {
        $query = "SELECT nome FROM " . $this->table_name . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['nome'];
        } else {
            return false;
        }
    }

    public function getOngId($id) {
        $query = "SELECT * FROM ". $this->table_name." WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([$id]);
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
}

?>