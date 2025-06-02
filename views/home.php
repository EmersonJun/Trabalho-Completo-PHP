<?php include 'templates/header.php'; ?>
<h1>Produtos em Destaque</h1>
<ul>
<?php foreach ($produtos as $produto): ?>
    <li>
        <a href="produto.php?id=<?= $produto['id'] ?>">
            <?= htmlspecialchars($produto['nome']) ?> - R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>

<?php include 'templates/footer.php'; ?>
