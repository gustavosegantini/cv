<?php
require_once('../db_connection.php'); // assumindo que db_connection.php está na pasta anterior

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirm_senha = $_POST['confirm_senha'];

if ($senha !== $confirm_senha) {
    die("As senhas não correspondem.");
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO Usuarios (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha_hash);
$stmt->execute();

echo "Usuário registrado com sucesso!";

$stmt->close();
$conn->close();
?>
