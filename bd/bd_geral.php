<?php

require_once("conecta_bd.php");

function checaSeCliente($email) {
    $conexao = conecta_bd();
    
    $query = "select *
              from cliente
              where email='$email';";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    if ($dados == "") {
        return 0;
    } else {
        return 1;
    }


}

function checaSeUsuario($email) {
    $conexao = conecta_bd();
    
    $query = "select *
              from usuario
              where email='$email';";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);
    
    if ($dados == "") {
        return 0;
    } else {
        return 1;
    }


}


function checaSeTerceirizado($email) {
    $conexao = conecta_bd();
    
    $query = "select *
              from terceirizado
              where email='$email';";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);
    
    if ($dados == "") {
        return 0;
    } else {
        return 1;
    }


}


function alteraSenhaGeral($email, $senha) {
    $conexao = conecta_bd();
    $senhaMD5 = md5($senha);
    
    if (checaSeCliente($email) == 1) {
        $query = "update cliente
                  set senha='$senhaMD5'
                  where email='$email';";
    } elseif (checaSeUsuario($email) == 1) {
        $query = "update usuario
                  set senha='$senhaMD5'
                  where email='$email';";
    } elseif (checaSeTerceirizado($email) == 1) {
        $query = "update terceirizado
                  set senha='$senhaMD5'
                  where email='$email';";
    } else {
        return 0;
    }
    
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);
    
    return $dados;
}


?>