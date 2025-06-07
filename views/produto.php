<?php include 'templates/header.php'; ?>

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h1>
            <p class="card-text"><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
            <p class="h5 text-success">Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>

            <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['tipo'] === 'cliente'): ?>
                <a href="adicionar_carrinho.php?id=<?= $produto['id'] ?>" class="btn btn-primary mt-3">
                    🛒 Adicionar ao Carrinho
                </a>
            <?php else: ?>
                <p class="text-muted mt-3"><em>Faça login como cliente para comprar este produto.</em></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="mb-4">
        <h3>Comentários</h3>
        <?php if (!empty($comentarios)): ?>
            <ul class="list-group mb-3">
                <?php foreach ($comentarios as $c): ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($c['nome']) ?>:</strong>
                        <br>
                        <?= nl2br(htmlspecialchars($c['texto'])) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted">Ainda não há comentários.</p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['usuario'])): ?>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Deixe seu comentário</label>
                        <textarea name="texto" id="comentario" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Comentar</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p class="text-muted">Faça login para comentar.</p>
    <?php endif; ?>
</div>

<?php include 'templates/footer.php'; ?>
