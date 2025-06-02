<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'admin') {
    die("Acesso negado.");
}

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = DB::getConnection()->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: admin.php");
exit;
?>

