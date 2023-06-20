<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="register_styles.css">
    <title>Registro de Usuário</title>
</head>
<body>
    <form action="register_submit.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="password" name="confirm_senha" placeholder="Confirme a Senha" required>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
