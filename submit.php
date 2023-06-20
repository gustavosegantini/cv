<?php
require_once('../db_connection.php'); // assumindo que db_connection.php está na pasta anterior

// Preparar e vincular
$stmt = $conn->prepare("INSERT INTO Curriculos (nome, cargo, resumo, empresa, data_inicio, data_fim, titulo_cargo, descricao_cargo, emprego_atual) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssi", $nome, $cargo, $resumo, $empresa, $data_inicio, $data_fim, $titulo_cargo, $descricao_cargo, $emprego_atual);

// Definir parâmetros e executar
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$resumo = $_POST['resumo'];
$empresa = $_POST['empresa'];
$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];
$titulo_cargo = $_POST['titulo_cargo'];
$descricao_cargo = $_POST['descricao_cargo'];
$emprego_atual = isset($_POST['emprego_atual']) ? 1 : 0;
$stmt->execute();

echo "Currículo enviado com sucesso!";

$stmt->close();
$conn->close();
?>
