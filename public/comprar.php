<?php
session_start();
require_once '../config/db.php';
require_once '../models/Carrinho.php';

if (!isset($_SESSION['usuario'])) {
    die("Acesso negado.");
}

$carrinho = new Carrinho();
$carrinho->limparCarrinho($_SESSION['usuario']['id']);

$mensagem = "Compra realizada com sucesso!";
?>

<?php include '../views/templates/header.php'; ?>
<h2><?= htmlspecialchars($mensagem) ?></h2>
<a href="index.php">Voltar à Loja</a>
<?php include '../views/templates/footer.php'; ?>
