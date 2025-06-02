<?php include 'templates/header.php'; ?>
<h2>Painel do Administrador</h2>
<a href="produto_novo.php">Adicionar Produto</a>
<table border="1">
<tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
<?php foreach ($produtos as $produto): ?>
    <tr>
        <td><?= $produto['id'] ?></td>
        <td><?= htmlspecialchars($produto['nome']) ?></td>
        <td>
            <a href="produto_editar.php?id=<?= $produto['id'] ?>">Editar</a> |
            <a href="produto_remover.php?id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza?')">Remover</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<?php include 'templates/footer.php'; ?>