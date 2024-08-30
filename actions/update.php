<?php
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$id = filter_input(INPUT_POST, 'id');

if ($description && $id){
    $conexao = conecta_bd();

    $sql = "UPDATE task SET description = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $description, $id);
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
