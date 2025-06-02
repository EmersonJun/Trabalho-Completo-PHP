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

<?php include '../views/templates/header.php'; ?>
<h1><?= htmlspecialchars($produto['nome']) ?></h1>
<p><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
<p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>

<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo'] === 'cliente'): ?>
    <a href="adicionar_carrinho.php?id=<?= $produto['id'] ?>">🛒 Adicionar ao Carrinho</a>
<?php else: ?>
    <p><em>Faça login como cliente para comprar este produto.</em></p>
<?php endif; ?>

<h3>Comentários</h3>
<ul>
<?php foreach ($comentarios as $c): ?>
    <li><strong><?= htmlspecialchars($c['nome']) ?>:</strong> <?= nl2br(htmlspecialchars($c['texto'])) ?></li>
<?php endforeach; ?>
</ul>

<?php if (isset($_SESSION['usuario'])): ?>
<form method="POST">
    <textarea name="texto" required></textarea><br>
    <button type="submit">Comentar</button>
</form>
<?php else: ?>
<p>Faça login para comentar.</p>
<?php endif; ?>
<?php include '../views/templates/footer.php'; ?>
