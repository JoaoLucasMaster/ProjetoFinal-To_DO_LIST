<?php
session_start();
$nome = $_POST["nome"];
$senha = md5($_POST["senha"]);
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$status = $_POST["status"];
$perfil = 3;
$data=date("y/m/d");
$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];

require_once ("bd/bd_terceirizado.php");
$dados = buscaTerceirizado($email);

if($dados != 0){
	$_SESSION['texto_erro'] = 'Este email já existe cadastrado no sistema!';
	$_SESSION['nome'] = $nome;
	$_SESSION['email'] = $email;
	$_SESSION['telefone'] = $telefone;
	header ("Location:cad_terceirizado.php");
}else{

	$dados = cadastraTerceirizado($nome,$email,$telefone,$senha,$status,$perfil,$data, $cep, $logradouro, $bairro, $cidade, $estado);

	if($dados == 1){
		$_SESSION['texto_sucesso'] = 'Dados adicionados com sucesso.';
		unset($_SESSION['texto_erro']);
		unset ($_SESSION['nome']);
		unset ($_SESSION['email']);
		unset ($_SESSION['senha']);
		unset ($_SESSION['telefone']);
		unset ($_SESSION['cep']);
		unset ($_SESSION['logradouro']);
		unset ($_SESSION['bairro']);
		unset ($_SESSION['cidade']);
		unset ($_SESSION['estado']);
		header ("Location:terceirizado.php");
	}else{
		$_SESSION['texto_erro'] = 'O dados não foram adicionados no sistema!';
		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		$_SESSION['telefone'] = $telefone;
		$_SESSION['cep'] = $cep;
		$_SESSION['logradouro'] = $logradouro;
		$_SESSION['bairro'] = $bairro;
		$_SESSION['cidade'] = $cidade;
		$_SESSION['estado'] = $estado;
		header ("Location:cad_terceirizado.php");
	}
}

?>