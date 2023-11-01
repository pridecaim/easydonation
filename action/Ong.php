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
        } else {
            $caminho_arquivo = ''; // Se nenhum arquivo foi enviado, defina o caminho como vazio
        }
        $emailExistente = $this->verificarEmailExistente($email);
        $nomeExistente = $this->verificarNomeExistente($nome);
        if ($emailExistente || $nomeExistente) {
            echo "<script>alert('Email e/ou nome já cadastrados')</script>";
            return false;
        }
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO " . $this->table_name . " (img, nome, email, senha, telefone, endereco, site, descricao, missao, area) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $caminho_arquivo);
        $stmt->bindValue(2, $nome);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $senhaCriptografada);
        $stmt->bindValue(5, $telefone);
        $stmt->bindValue(6, $endereco);
        $stmt->bindValue(7, $site);
        $stmt->bindValue(8, $descricao);
        $stmt->bindValue(9, $missao);
        $stmt->bindValue(10, $area);
        $result = $stmt->execute();
        return $result;
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
        $query = "SELECT nome FROM ". $this->table_name ." WHERE email = ?";
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

}

?>