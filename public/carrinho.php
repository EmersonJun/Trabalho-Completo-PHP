<?php
session_start();
require_once '../config/db.php';
require_once '../models/Carrinho.php';

if (!isset($_SESSION['usuario'])) {
    die("Faça login para acessar seu carrinho.");
}

$carrinho = new Carrinho();
$itens = $carrinho->listarItens($_SESSION['usuario']['id']);
?>

<?php include '../views/Carrinho.php'; ?>