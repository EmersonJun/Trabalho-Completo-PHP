<?php
require_once 'config/db.php';
require_once 'models/Produto.php';
require_once 'controllers/ProdutoController.php';

// Cria o controller e busca os produtos
require_once 'models/Dsb.php';
Dsb::getConnection();
$produtoController = new ProdutoController();
$produtos = $produtoController->listarProdutos();

// Inclui a view e envia os produtos
include 'views/index.php'; 
?>