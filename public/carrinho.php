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
<?php include '../views/templates/header.php'; ?>
<h2>Meu Carrinho</h2>
<table border="1">
<tr><th>Produto</th><th>Preço</th><th>Quantidade</th><th>Total</th><th>Ações</th></tr>
<?php
$total = 0;
foreach ($itens as $item):
    $subtotal = $item['preco'] * $item['quantidade'];
    $total += $subtotal;
?>
<tr>
    <td><?= htmlspecialchars($item['nome']) ?></td>
    <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
    <td><?= $item['quantidade'] ?></td>
    <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
    <td><a href="remover_item.php?id=<?= $item['id'] ?>">Remover</a></td>
</tr>
<?php endforeach; ?>
</table>
<p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
<?php include '../views/templates/footer.php'; ?>