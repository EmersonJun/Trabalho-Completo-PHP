<?php include 'templates/header.php'; ?>
<h2>Cadastro de Usuário</h2>

<?php if (!empty($erro)): ?>
    <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>
<?php if (!empty($sucesso)): ?>
    <p style="color: green;"><?= htmlspecialchars($sucesso) ?></p>
<?php endif; ?>

<form method="POST" action="cadastro.php">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($token) ?>">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Senha: <input type="password" name="senha" required></label><br>
    <label>CPF: <input type="text" name="cpf" required></label><br>
    <label>Data de Nascimento: <input type="date" name="data_nascimento" required></label><br>
    <button type="submit">Cadastrar</button>
</form>

<p>Já tem conta? <a href="login.php">Faça login aqui</a></p>

<?php include 'templates/footer.php'; ?>
