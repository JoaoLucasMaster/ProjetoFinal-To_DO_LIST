<?php
require_once('../bd/conecta_bd.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT); // Valida o ID como um inteiro
$completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE); // Converte para booleano

if ($id !== null && $completed !== null) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "UPDATE task SET completed = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $completed, $id); // O tipo de 'completed' e 'id' é inteiro (0 ou 1 para booleanos)
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao preparar statement: ' . mysqli_error($conexao)]);
    }

    mysqli_close($conexao);
} else {
    echo json_encode(['success' => false]);
}

exit;
?>
