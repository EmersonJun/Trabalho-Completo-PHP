<?php
class Comentario {
    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function listarPorProduto($produto_id) {
        $stmt = $this->db->prepare("SELECT c.texto, u.nome FROM comentarios c JOIN usuarios u ON c.usuario_id = u.id WHERE c.produto_id = ?");
        $stmt->execute([$produto_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionar($produto_id, $usuario_id, $texto) {
        $stmt = $this->db->prepare("INSERT INTO comentarios (produto_id, usuario_id, texto) VALUES (?, ?, ?)");
        return $stmt->execute([$produto_id, $usuario_id, $texto]);
    }
}
?>
