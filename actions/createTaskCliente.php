<?php

require_once('../valida_session.php');
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$cliente_id = $_SESSION['cod_usu'];
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$data = filter_input(INPUT_POST, 'data');

if (!isset($_SESSION['cod_usu'])) {
    die("Usuário não logado. Por favor, faça login novamente.");
} else {
    echo "ID do usuário logado: " . $_SESSION['cod_usu'];
}

if ($description && $cliente_id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, cliente_id, priority, data) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siis", $description, $cliente_id, $priority, $data);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar statement: " . mysqli_error($conexao);
        exit;
    }

    mysqli_close($conexao);

    header('Location: ../to_do_list.php');
    exit;
} else {
    header('Location: ../to_do_list.php');
    exit;
}