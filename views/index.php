<!DOCTYPE html>
<html>
<head>
    <?php include 'templates/header.php'; ?>
    <title>Loja Online</title>
</head>
<body>
    <h1>Produtos Disponíveis</h1>

    <?php if (!empty($produtos)): ?>
        <ul>
            <?php foreach ($produtos as $produto): ?>
                <li>
                    <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                    <p><?= htmlspecialchars($produto['descricao']) ?></p>
                    <p><strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum produto disponível.</p>
    <?php endif; ?>
</body>
</html>
