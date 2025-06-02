<?php
class Carrinho {
    private $db;

    public function __construct() {
        $this->db = DB::getConnection();
    }

    public function getCarrinhoId($usuario_id) {
        $stmt = $this->db->prepare("SELECT id FROM carrinhos WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) return $result['id'];

        $this->db->prepare("INSERT INTO carrinhos (usuario_id) VALUES (?)")->execute([$usuario_id]);
        return $this->db->lastInsertId();
    }

    public function adicionarItem($usuario_id, $produto_id, $quantidade = 1) {
        $carrinho_id = $this->getCarrinhoId($usuario_id);
        $stmt = $this->db->prepare("SELECT id FROM carrinho_itens WHERE carrinho_id = ? AND produto_id = ?");
        $stmt->execute([$carrinho_id, $produto_id]);

        if ($stmt->fetch()) {
            $this->db->prepare("UPDATE carrinho_itens SET quantidade = quantidade + ? WHERE carrinho_id = ? AND produto_id = ?")
                ->execute([$quantidade, $carrinho_id, $produto_id]);
        } else {
            $this->db->prepare("INSERT INTO carrinho_itens (carrinho_id, produto_id, quantidade) VALUES (?, ?, ?)")
                ->execute([$carrinho_id, $produto_id, $quantidade]);
        }
    }

    public function listarItens($usuario_id) {
        $carrinho_id = $this->getCarrinhoId($usuario_id);
        $stmt = $this->db->prepare("SELECT ci.id, p.nome, p.preco, ci.quantidade FROM carrinho_itens ci JOIN produtos p ON ci.produto_id = p.id WHERE ci.carrinho_id = ?");
        $stmt->execute([$carrinho_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removerItem($item_id) {
        $this->db->prepare("DELETE FROM carrinho_itens WHERE id = ?")->execute([$item_id]);
    }
}
?>