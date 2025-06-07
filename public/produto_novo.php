<?php
session_start();
require_once '../config/db.php';
require_once '../models/Produto.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    die("Acesso negado.");
}

$categorias = DB::getConnection()->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];

    $produto = new Produto();
    if ($produto->criar($nome, $descricao, $preco, $_SESSION['usuario']['id'], $categoria_id)) {
        header("Location: admin.php");
        exit;
    } else {
        $erro = "Erro ao adicionar produto.";
    }
}
?>
<?php include '../views/templates/header.php'; ?>
<h2>Novo Produto</h2>
<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>
<form method="POST">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Descrição: <textarea name="descricao"></textarea></label><br>
    <label>Preço: <input type="number" step="0.01" name="preco" required></label><br>
    <label>Categoria: 
        <select name="categoria_id">
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <button type="submit">Salvar</button>
</form>
<?php include '../views/templates/footer.php'; ?>
