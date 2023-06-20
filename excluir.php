<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redireciona para a página de login se o usuário não estiver logado
    exit();
}

require_once('../db_connection.php'); // Assume que db_connection.php está na pasta anterior

$curriculo_id = $_GET['id'];

// Deleta o currículo
$stmt = $conn->prepare("DELETE FROM Curriculos WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $curriculo_id, $_SESSION['usuario_id']);
$stmt->execute();

header("Location: home.php"); // Redireciona de volta para a página inicial
?>
