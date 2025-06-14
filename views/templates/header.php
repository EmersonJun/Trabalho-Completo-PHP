<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Loja Online</title>
</head>
<body>
<nav>
    
    

    <?php
    $base = "/TRABALHOF-PHP-MAIN/public";
    ?>

    <?php if (isset($_SESSION['usuario'])): ?>
        <?php if ($_SESSION['usuario']['tipo'] === 'admin'): ?>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/index.php">Comprar</a>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/admin.php">Painel Admin</a>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/sobre.php">Sobre</a>
        <?php endif; ?>
        <?php if ($_SESSION['usuario']['tipo'] === 'cliente'): ?>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/index.php">Comprar</a>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/carrinho.php">Carrinho</a>
            <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/sobre.php">Sobre</a>
        <?php endif; ?>
        <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/logout.php">Sair</a>
    <?php else: ?>
        <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/login.php">Login</a>
        <a href="/TrabalhoF2-PHP/TrabalhoF-PHP-main/public/cadastro.php">Cadastro</a>
    <?php endif; ?>
</nav>
<hr>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        nav {
            background-color:rgb(27, 28, 29);
            padding: 10px 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color:rgb(59, 61, 63);
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 0;
        }
    </style>
