<?php
session_start();
require_once '../config/db.php';
require_once '../models/Usuario.php';

$erro = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    $db = DB::getConnection();
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha === $usuario['senha']) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos.";
    }
}
?>

<?php include '../views/login.php'; ?>
