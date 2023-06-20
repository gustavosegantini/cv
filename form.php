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

        <div id="experiencias">
            <div class="experiencia">
                <input type="text" name="empresa[]" placeholder="Empresa" required>
                <input type="date" name="data_inicio[]" placeholder="Data de Início" required>
                <input type="date" name="data_fim[]" placeholder="Data de Término">
                <input type="text" name="titulo_cargo[]" placeholder="Título do Cargo" required>
                <textarea name="descricao_cargo[]" placeholder="Descrição do Cargo" required></textarea>
                <input type="checkbox" name="emprego_atual[]" value="1"> Emprego Atual
            </div>
        </div>

        <button type="button" id="add">Adicionar Cargo</button>
        <button type="submit">Enviar</button>
    </form>

    <script>
        document.getElementById('add').addEventListener('click', function() {
            var experiencias = document.getElementById('experiencias');
            var novaExperiencia = document.createElement('div');
            novaExperiencia.className = 'experiencia';
            novaExperiencia.innerHTML = `
                <input type="text" name="empresa[]" placeholder="Empresa" required>
                <input type="date" name="data_inicio[]" placeholder="Data de Início" required>
                <input type="date" name="data_fim[]" placeholder="Data de Término">
                <input type="text" name="titulo_cargo[]" placeholder="Título do Cargo" required>
                <textarea name="descricao_cargo[]" placeholder="Descrição do Cargo" required></textarea>
                <input type="checkbox" name="emprego_atual[]" value="1"> Emprego Atual
            `;
            experiencias.appendChild(novaExperiencia);
        });
    </script>
</body>
</html>
