<?php include 'templates/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Produtos em Destaque</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php foreach ($produtos as $produto): ?>
            <div class="col">
                <div class="card h-100">
                    

                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                        <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                        <a href="produto.php?id=<?= $produto['id'] ?>" class="btn btn-primary">Ver Produto</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
