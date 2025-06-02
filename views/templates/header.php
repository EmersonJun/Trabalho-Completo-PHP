<!DOCTYPE html>
<html>
<head>
    <title>Loja Online</title>
</head>
<body>
<nav>
    <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/index.php">Início</a>
    <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/sobre.php">Sobre</a>

    <?php if (isset($_SESSION['usuario'])): ?>
        <?php if ($_SESSION['usuario']['tipo'] === 'admin'): ?>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/admin.php">Painel Admin</a>
        <?php endif; ?>
        <?php if ($_SESSION['usuario']['tipo'] === 'cliente'): ?>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/carrinho.php">Carrinho</a>
        <?php endif; ?>
        <a href="/TrabalhoF2-PHPPHP/TrabalhoF-PHP-main/public/logout.php">Sair</a>
    <?php else: ?>
        <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/login.php">Login</a>
        <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/cadastro.php">Cadastro</a>
    <?php endif; ?>
</nav>
<hr>
