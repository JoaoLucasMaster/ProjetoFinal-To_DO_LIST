<?php

require_once("conecta_bd.php");

function checaCliente($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from cliente
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaClientes(){
    $conexao = conecta_bd();
    $clientes = array();
    $query = "select *
              from cliente
              order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($clientes, $dados);
    }
    return $clientes;

}

function buscaCliente($email){
    $conexao = conecta_bd();
    $query = "select *
              from cliente
              where email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraCliente($nome,$email,$senha,$endereco,$numero,$bairro,$cidade,$telefone,$status,$perfil,$data, $estado, $cep){

    $conexao = conecta_bd();
    $query = "Insert Into cliente(nome,email,senha,endereco,numero,bairro,cidade,telefone,status,perfil,data, estado, cep) 
    values('$nome','$email','$senha','$endereco','$numero','$bairro','$cidade','$telefone','$status','$perfil','$data', '$estado', '$cep')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function removeCliente($codigo){
    //fazer tratamento de erros para caso o cliente ainda esteja atrelado a uma ordem no banco de dados
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) AS total FROM ordem WHERE cod_cliente = '$codigo'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);
    $totalOrdens = $dados['total'];

    if ($totalOrdens > 0) {
        return 0;
    }
    $query = "delete from cliente where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function buscaClienteeditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from cliente
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;

}

function editarCliente($codigo,$status,$data){
    $conexao = conecta_bd();
    $query = "select *
              from cliente
              where cod='$codigo'";

    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update cliente
        set status = '$status', data = '$data'
        where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }

}

function clienteConsultaTarefaPrioridade($cod_usuario){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT * FROM task WHERE cliente_id = '$cod_usuario' AND priority = 1 and completed = 0;");
    
    // Executar a consulta
    $query->execute();
    
    // Obter o resultado da consulta
    $resultado = $query->get_result();
    
    // Contar o número de linhas retornadas
    $dados = $resultado->num_rows;

    // Fechar a consulta e a conexão
    $query->close();
    $conexao->close();

    // Retornar o contador
    return $dados;
}

function clienteConsultaTarefaNormal($cod_usuario){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT * FROM task WHERE cliente_id = '$cod_usuario' AND priority = 0 and completed = 0;");
    
    // Executar a consulta
    $query->execute();
    
    // Obter o resultado da consulta
    $resultado = $query->get_result();
    
    // Contar o número de linhas retornadas
    $dados = $resultado->num_rows;

    // Fechar a consulta e a conexão
    $query->close();
    $conexao->close();

    // Retornar o contador
    return $dados;
}

function clienteConsultaTarefaCompleta($cod_usuario){
    $conexao = conecta_bd();
    $query = $conexao->prepare("SELECT * FROM task WHERE cliente_id = '$cod_usuario' AND  completed = 1;");
    
    // Executar a consulta
    $query->execute();
    
    // Obter o resultado da consulta
    $resultado = $query->get_result();
    
    // Contar o número de linhas retornadas
    $dados = $resultado->num_rows;

    // Fechar a consulta e a conexão
    $query->close();
    $conexao->close();

    // Retornar o contador
    return $dados;
}



?>