<?php
session_start();
require_once '../config/db.php';
require_once '../models/Carrinho.php';

if (!isset($_SESSION['usuario'])) {
    die("Acesso negado.");
}

$id = $_GET['id'] ?? null;
if ($id) {
    $carrinho = new Carrinho();
    $carrinho->removerItem($id);
}
header("Location: carrinho.php");
exit;
?>
