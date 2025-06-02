<?php 
class Produto {
    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function listarPublicos() {
        $stmt = $this->db->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $descricao, $preco, $imagem, $criado_por, $categoria_id) {
        $stmt = $this->db->prepare("INSERT INTO produtos (nome, descricao, preco, imagem, criado_por, categoria_id) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $descricao, $preco, $imagem, $criado_por, $categoria_id]);
    }
}
?>
