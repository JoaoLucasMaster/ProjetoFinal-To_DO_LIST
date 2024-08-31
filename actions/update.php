<?php
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$data = filter_input(INPUT_POST, 'data');

if ($description && $id && $data){
    $conexao = conecta_bd();

    $sql = "UPDATE task SET description = ?, data = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssi", $description, $data, $id);
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