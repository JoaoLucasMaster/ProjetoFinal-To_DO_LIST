<?php

require_once("conecta_bd.php");

function listaOrdem(){
    $conexao = conecta_bd();
    $ordens = array();
    $query = "SELECT 
    os.cod AS ordem_cod,
    c.nome AS nome_cliente,
    t.nome AS nome_terceirizado,
    s.nome AS nome_servico,
    os.data_servico,
    os.status
FROM 
    ordem os
JOIN 
    cliente c ON os.cod_cliente = c.cod
JOIN 
    terceirizado t ON os.cod_terceirizado = t.cod
JOIN 
    servico s ON os.cod_servico = s.cod;";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($ordens, $dados);
    }
    return $ordens;

}



function buscaOrdemadd()
{
    $conexao = conecta_bd();

    $query = "Select
           c.nome AS nome_cliente,
           t.nome AS nome_terceirizada,
           s.nome AS nome_servico,
           s.valor AS valor_servico, 
           o.data_servico AS data_servico,
           o.status AS status
           From ordem o, servico s, cliente c, terceirizado t where o.cod_cliente = c.cod AND o.cod_servico = s.cod AND o.cod_terceirizado = t.cod order by o.cod DESC LIMIT 1";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);


    return $dados;
}


function cadastraOrdem($cod_cliente,$cod_terceirizado,$cod_servico,$data_servico,$status,$data){

    $conexao = conecta_bd();
    $query = "Insert Into ordem(cod_cliente,cod_terceirizado,cod_servico,data_servico,status,data) 
    values('$cod_cliente','$cod_terceirizado','$cod_servico','$data_servico','$status','$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function removeOrdem($codigo){
    
    $conexao = conecta_bd();
    $query = "delete from ordem where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function editarOrdem($codigo, $cod_terceirizado, $data_servico, $status, $data)
{
    $conexao = conecta_bd();
    $query = "SELECT * 
              FROM ordem
              WHERE cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    if ($dados == 1) {
        $query = "UPDATE  ordem
                SET cod_terceirizado = '$cod_terceirizado', data_servico = '$data_servico', status = '$status', data = '$data'
                WHERE cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }
}


function buscaOrdemeditar($codigo){
    $conexao = conecta_bd();
    $query = "Select 
    o.cod AS cod,
    c.nome AS nome_cliente,
    t.nome AS nome_terceirizada,
    s.nome AS nome_servico,
    o.data_servico AS data_servico,
    o.status AS status,
    t.cod AS cod_terceirizado
    From ordem o,servico s, cliente c, terceirizado t 
    Where o.cod_cliente = c.cod AND 
          o.cod_servico = s.cod AND 
          o.cod_terceirizado = t.cod AND
          o.cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;


}

function consultaStatusUsuario($status) {
    // Conectar ao banco de dados
    $conexao = conecta_bd();

    // Preparar a consulta SQL para evitar SQL Injection
    $query = $conexao->prepare("SELECT * FROM ordem WHERE status = ?");
    $query->bind_param("s", $status);

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


function consultaStatusCliente($cod_usuario,$status){
    $conexao = conecta_bd();
    $query = "select count(*) AS total from ordem where status = '$status' and cod_cliente = '$cod_usuario'";

    $resultado = mysqli_query($conexao, $query);
    $total = mysqli_fetch_array($resultado);

    return $total;

}


function consultaStatusTerceirizado($cod_usuario,$status){
    $conexao = conecta_bd();
    $query = "select count(*) AS total from ordem where status = '$status' and cod_terceirizado = '$cod_usuario'";

    $resultado = mysqli_query($conexao, $query);
    $total = mysqli_fetch_array($resultado);

    return $total;


}


?>