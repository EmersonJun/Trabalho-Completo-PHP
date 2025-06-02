<?php 
    class Usuario {
    private $db;
    public function __construct() {
        $this->db = DB::getConnection();
    }
    public function cadastrar($nome, $email, $senha, $cpf, $dataNascimento) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $email, $hash, $cpf, $dataNascimento]);
    }
    public function autenticar($cpf, $dataNascimento) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE cpf = ? AND data_nascimento = ?");
        $stmt->execute([$cpf, $dataNascimento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>