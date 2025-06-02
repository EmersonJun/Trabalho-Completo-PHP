<?php 
    class ProdutoController {
        private $produtoModel;
        public function __construct() {
            $this->produtoModel = new Produto();
        }
        public function mostrarHome() {
            $produtos = $this->produtoModel->listarPublicos();
            include '../views/home.php';
        }

        public function mostrarDetalhes($id) {
            $produto = $this->produtoModel->buscarPorId($id);
            include '../views/produto.php';
        }
         public function listarProdutos() {
        return $this->produtoModel->getAll();
    }
    }
    
?>