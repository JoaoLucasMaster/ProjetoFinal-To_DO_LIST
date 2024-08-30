<?php
require_once('../bd/conecta_bd.php');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); // Valida o ID como um inteiro

if ($id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "DELETE FROM task WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
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
?>
