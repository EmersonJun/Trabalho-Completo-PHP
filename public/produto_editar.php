<?php
session_start();
require_once '../config/db.php';
require_once '../models/Produto.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    die("Acesso negado.");
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: admin.php");
    exit;
}

$stmt = DB::getConnection()->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto_atual = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto_atual) {
    header("Location: admin.php");
    exit;
}

$categorias = DB::getConnection()->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $categoria_id = $_POST['categoria_id'];

    try {
        $stmt = DB::getConnection()->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, categoria_id = ? WHERE id = ?");
        if ($stmt->execute([$nome, $descricao, $preco, $categoria_id, $id])) {
            $sucesso = "Produto atualizado com sucesso!";
            $produto_atual['nome'] = $nome;
            $produto_atual['descricao'] = $descricao;
            $produto_atual['preco'] = $preco;
            $produto_atual['categoria_id'] = $categoria_id;
        } else {
            $erro = "Erro ao atualizar produto.";
        }
    } catch (PDOException $e) {
        $erro = "Erro ao atualizar produto: " . $e->getMessage();
    }
}
?>

<?php include '../views/editar.php'; ?>