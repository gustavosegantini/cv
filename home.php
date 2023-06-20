<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redireciona para a página de login se o usuário não estiver logado
    exit();
}

require_once('../db_connection.php'); // Assume que db_connection.php está na pasta anterior

$usuario_id = $_SESSION['usuario_id'];

// Consulta o currículo do usuário
$stmt = $conn->prepare("SELECT * FROM Curriculos WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$tem_curriculo = $result->num_rows > 0;
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="home_styles.css">
    <title>Home</title>
</head>

<body>
    <h1>Bem-vindo ao sistema de currículos!</h1>

    <?php if ($tem_curriculo):
        $curriculo = $result->fetch_assoc();
        ?>
        <p>Você já possui um currículo. O que você gostaria de fazer?</p>
        <a href="form.php?id=<?php echo $curriculo['id']; ?>">Editar Currículo</a>
        <a href="excluir.php?id=<?php echo $curriculo['id']; ?>">Excluir Currículo</a>
    <?php else: ?>
        <p>Você ainda não possui um currículo. Crie um agora mesmo!</p>
        <a href="form.php">Criar Currículo</a>
    <?php endif; ?>
</body>

</html>