<?php
session_start();
require_once '../config/db.php';
require_once '../models/Produto.php';
require_once '../controllers/ProdutoController.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    die("Acesso negado.");
}

$controller = new ProdutoController();
$produtos = $controller->listarProdutos();

include '../views/admin.php';
?>


