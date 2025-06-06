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
<?php include '../views/cadastro.php'; ?>
