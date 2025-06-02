<?php include 'templates/header.php'; ?>
<h2>Login</h2>

<?php if (!empty($erro)): ?>
    <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="POST" action="login.php">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <label>CPF: <input type="text" name="cpf" required></label><br>
    <label>Data de Nascimento: <input type="date" name="data_nascimento" required></label><br>
    <button type="submit">Entrar</button>
</form>

<p>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>

<?php include 'templates/footer.php'; ?>
