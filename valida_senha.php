<?php
session_start();

if ((empty($_POST['email'])) OR (empty($_POST['senha']))){
    header("Location: esqueci_senha.php"); 
}
else{

	$email = $_POST["email"];
	$senha = $_POST["senha"];
    require_once("bd/bd_geral.php");
    $dados = alteraSenhaGeral($email, $senha);

	if($dados == 0) {
		$_SESSION['texto_erro_login'] = 'Email, Senha ou Perfil Inválido!';
	    header("Location:esqueci_senha.php");
	}else{
        $_SESSION['texto_erro_login'] = 'Senha alterada com sucesso!';
        header("Location:index.php");
    }
    
	die();
}


?>