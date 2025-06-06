<?php include 'templates/header.php'; ?>
<h2>Login</h2>

<?php if (!empty($erro)): ?>
    <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="login.php">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>

<?php include 'templates/footer.php'; ?>
