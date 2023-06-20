<?php
require_once('../db_connection.php'); // assumindo que db_connection.php está na pasta anterior

$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$resumo = $_POST['resumo'];

// Preparar a declaração SQL
$stmt = $conn->prepare("INSERT INTO Curriculos (nome, cargo, resumo, empresa, data_inicio, data_fim, titulo_cargo, descricao_cargo, emprego_atual, usuario_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssii", $nome, $cargo, $resumo, $empresa, $data_inicio, $data_fim, $titulo_cargo, $descricao_cargo, $emprego_atual, $usuario_id);


// Iterar por cada empresa preenchida
for ($i = 0; $i < count($_POST['empresa']); $i++) {
    $empresa = $_POST['empresa'][$i];
    $data_inicio = $_POST['data_inicio'][$i];
    $data_fim = $_POST['data_fim'][$i];
    $titulo_cargo = $_POST['titulo_cargo'][$i];
    $descricao_cargo = $_POST['descricao_cargo'][$i];
    $emprego_atual = isset($_POST['emprego_atual'][$i]) ? 1 : 0;

    // Executar a declaração SQL
    $stmt->execute();
}

echo "Currículo enviado com sucesso!";

$stmt->close();
$conn->close();
?>