<?php
header('Content-Type: application/json');

if (isset($_POST['cep'])) {
    $cep = $_POST['cep'];
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $response = file_get_contents($url);

    if ($response === FALSE) {
        echo json_encode(['erro' => true]);
    } else {
        echo $response;
    }
} else {
    echo json_encode(['erro' => true]);
}
?>
