<?php
    require_once("valida_session.php");
    require_once ("bd/bd_cliente.php");

    $codigo = $_GET['cod'];

    if( $_SESSION['cod_usu'] != $codigo){

    $dados = removeCliente($codigo);

    if($dados == 0){
        $_SESSION['texto_erro'] = 'Não é possível excluir o usuário, pois ele está atrelado a uma tarefa!';
        header ("Location:cliente.php");
    }else{
        $_SESSION['texto_sucesso'] = 'Os dados do usuário foram excluidos do sistema.';
        header ("Location:cliente.php");
    }
}else{
    $_SESSION['texto_erro'] = 'O usuário não pode ser excluído do sistema, pois está logado!';
        header ("Location:cliente.php");

}

?>