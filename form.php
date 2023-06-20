<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="form_styles.css">
    <title>Formulário de Currículo</title>
</head>
<body>
    <form action="submit.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="cargo" placeholder="Cargo" required>
        <textarea name="resumo" placeholder="Resumo" required></textarea>
        <input type="text" name="empresa" placeholder="Empresa" required>
        <input type="date" name="data_inicio" placeholder="Data de Início" required>
        <input type="date" name="data_fim" placeholder="Data de Término">
        <input type="text" name="titulo_cargo" placeholder="Título do Cargo" required>
        <textarea name="descricao_cargo" placeholder="Descrição do Cargo" required></textarea>
        <input type="checkbox" name="emprego_atual" value="1"> Emprego Atual
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
