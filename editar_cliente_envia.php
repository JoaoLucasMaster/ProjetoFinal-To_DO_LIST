<?php
require_once("valida_session.php");
require_once ("bd/bd_cliente.php");

$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarCliente($codigo, $nome, $email, $endereco, $numero, $bairro, $cidade, $telefone, $status);

if ($dados == 1){
    $_SESSION['texto_sucesso'] = 'Os dados do cliente foram alterados no sistema.';
    header ("Location:cliente.php");
}else{
    $_SESSION['texto_erro'] = 'Os dados do cliente não foram alterados no sistema!';
    header ("Location:cliente.php");
}


?>