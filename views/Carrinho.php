<?php include '../views/templates/header.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Meu Carrinho</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
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
                    <td>
                        <a href="remover_item.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm">Remover</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <p class="h5 mt-3"><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>

    <?php if (!empty($itens)) : ?>
        <div class="mt-3">
            <a href="comprar.php" class="btn btn-success">Comprar</a>
        </div>
    <?php endif; ?>
</div>

<?php include '../views/templates/footer.php'; ?>
