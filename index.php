<?php
require_once 'config/db.php';
require_once 'models/Produto.php';
require_once 'controllers/ProdutoController.php';

$produtoController = new ProdutoController();
$produtos = $produtoController->listarProdutos();

include 'views/index.php'; 
?>