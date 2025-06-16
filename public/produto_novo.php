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
<?php include '../views/produtoNovo.php'; ?>
