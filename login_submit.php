<?php
session_start(); // Inicia a sessão

require_once('../db_connection.php'); // Assume que db_connection.php está na pasta anterior

$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta o usuário pelo e-mail
$stmt = $conn->prepare("SELECT * FROM Usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Email ou senha inválidos.");
}

$usuario = $result->fetch_assoc();

// Verifica a senha
if (!password_verify($senha, $usuario['senha'])) {
    die("Email ou senha inválidos.");
}

// Se tudo estiver correto, armazena o ID do usuário na sessão
$_SESSION['usuario_id'] = $usuario['id'];

echo "Login efetuado com sucesso!";

$stmt->close();
$conn->close();
?>
