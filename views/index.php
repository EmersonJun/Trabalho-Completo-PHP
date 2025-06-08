<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja Online</title>
    <?php include 'templates/header.php'; ?> <!-- Certifique-se de que este inclui o Bootstrap -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Produtos Disponíveis</h1>

        <?php if (!empty($produtos)): ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($produtos as $produto): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($produto['descricao']) ?></p>
                            </div>
                            <div class="card-footer">
                                <p class="text-primary fw-bold mb-2">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>

                                <?php if (isset($_SESSION['usuario'])): ?>
                                    <a href="produto.php?id=<?= $produto['id'] ?>" class="btn btn-outline-primary w-100">Ver Detalhes</a>
                                <?php else: ?>
                                    <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/login.php" class="btn btn-outline-secondary w-100">Faça login para ver detalhes</a>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-4">Nenhum produto disponível.</div>
        <?php endif; ?>
    </div>

    <?php include 'templates/footer.php'; ?>
</body>
</html>
