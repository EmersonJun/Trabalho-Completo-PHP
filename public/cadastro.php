<?php
require_once '../config/db.php';
require_once '../models/Usuario.php';
session_start();

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];

    if (!$nome || !$email || !$senha || !$cpf || !$data_nascimento) {
        $erro = "Todos os campos são obrigatórios.";
    } else {
        $db = DB::getConnection();
        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento) VALUES (?, ?, ?, ?, ?)");
        $sucesso = $stmt->execute([$nome, $email, $senha, $cpf, $data_nascimento]);

        if ($sucesso) {
            $sucesso = "Usuário cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar.";
        }
    }
}
?>
<?php include '../views/templates/header.php'; ?>
<h2>Cadastro</h2>
<?php if ($erro): ?><p style="color:red;"><?= $erro ?></p><?php endif; ?>
<?php if ($sucesso): ?><p style="color:green;"><?= $sucesso ?></p><?php endif; ?>

<form method="POST">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <label>CPF: <input type="text" name="cpf" required></label><br>
    <label>Data de Nascimento: <input type="date" name="data_nascimento" required></label><br>
    <button type="submit">Cadastrar</button>
</form>
<p>Já tem conta? <a href="login.php">Faça login aqui</a></p>
<?php include '../views/templates/footer.php'; ?>
