<?php
session_start();
require_once '../config/db.php';
require_once '../models/Carrinho.php';

if (!isset($_SESSION['usuario'])) {
    die("Faça login para adicionar ao carrinho.");
}

$produto_id = $_GET['id'] ?? null;
if ($produto_id) {
    $carrinho = new Carrinho();
    $carrinho->adicionarItem($_SESSION['usuario']['id'], $produto_id);
    header("Location: carrinho.php");
    exit;
}
?>

