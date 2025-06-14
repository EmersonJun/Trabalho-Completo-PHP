<?php
require_once '../config/db.php';
require_once '../models/Produto.php';
require_once '../models/Comentario.php';
require_once '../controllers/ProdutoController.php';
session_start();

$id = $_GET['id'] ?? null;

$produtoModel = new Produto();
$comentarioModel = new Comentario();

$produto = $produtoModel->buscarPorId($id);
$comentarios = $comentarioModel->listarPorProduto($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['usuario'])) {
    $texto = trim($_POST['texto']);
    if ($texto) {
        $comentarioModel->adicionar($id, $_SESSION['usuario']['id'], $texto);
        header("Location: produto.php?id=" . $id);
        exit;
    }
}
?>

<?php include '../views/produto.php'; ?>