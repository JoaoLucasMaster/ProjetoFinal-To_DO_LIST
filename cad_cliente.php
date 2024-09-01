João_Lucas_N.D
joaolucas1157
Invisível



AO VIVO
Hakinha

Hakinha

João_Lucas_N.D
Mensagem direta

Hakinha
VULGO
Peugeot
Buscar

região
Automático









bate-papo do canal
30 de agosto de 2024
João_Lucas_N.D
 iniciou uma chamada que durou 2 horas.
 — 30/08/2024 22:34

Hakinha — 30/08/2024 22:49
-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------
Expandir
bdordemservico.sql
8 KB
[22:49]
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');


Expandir
message.txt
12 KB
[22:50]
<?php
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);

if ($description && $user_id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, user_id, priority) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sii", $description, $user_id, $priority);
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

João_Lucas_N.D — 30/08/2024 22:57
Quero que a div principal de tarefas, tenha duas colunas, uma na direita e outra na esquerda, separando as tarefas com prioridade e as sem prioridade, mas lembrese a proporção da div é você que vai decidir, para ficar correspondente ao restante da página:

<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');
Expandir
message.txt
13 KB

Hakinha — 30/08/2024 23:01
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');

unset($_SESSION['nome']);
unset($_SESSION['email']);
Expandir
message.txt
19 KB

Hakinha — 30/08/2024 23:36
<input type="date" name="data" value="2024-08-30"/>

João_Lucas_N.D — 30/08/2024 23:42
input[name="data"] {
            width: 40px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #eaeaea;
            background-color: #252839;
            color: #ffffff;
            font-size: 16px;
            -webkit-appearance: none;
            /* Remove estilos padrões do navegador */
            -moz-appearance: none;
            appearance: none;
        }
[23:46]
width: 150px;
31 de agosto de 2024

Hakinha — Ontem às 00:03
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');


Expandir
message.txt
15 KB
[00:04]
<?php
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$data = filter_input(INPUT_POST, 'data');

if ($description && $user_id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, user_id, priority, data) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siis", $description, $user_id, $priority, $data);
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

João_Lucas_N.D — Ontem às 00:19
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');


Expandir
message.txt
15 KB

Hakinha — Ontem às 00:32
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
[00:32]
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');


Expandir
message.txt
15 KB
João_Lucas_N.D
 iniciou uma chamada que durou 3 horas.
 — Ontem às 09:05

Hakinha — Ontem às 09:19
nao
[09:19]
me ouve
[09:19]
???
[09:19]
?
[09:19]
?
[09:19]
?
[09:19]
?
[09:19]
?

Hakinha — Ontem às 09:46
<?php

require_once("conecta_bd.php");

function listaOrdem(){
    $conexao = conecta_bd();
Expandir
message.txt
7 KB
[09:47]
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
[09:47]
<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_ordem.php");
?>
Expandir
message.txt
6 KB

João_Lucas_N.D — Ontem às 09:55
Alou

João_Lucas_N.D — Ontem às 10:11
[PHP]

;;;;;;;;;;;;;;;;;;;
; About php.ini   ;
;;;;;;;;;;;;;;;;;;;
; PHP's initialization file, generally called php.ini, is responsible for... (26 KB restante(s))
Expandir
message.txt
76 KB
[10:15]

php.rar
23.24 MB

João_Lucas_N.D — Ontem às 10:47
ALTER TABLE task 
ADD COLUMN cliente_id INT(11) NOT NULL AFTER user_id,
ADD CONSTRAINT fk_cliente_task FOREIGN KEY (cliente_id) REFERENCES cliente (cod) ON UPDATE RESTRICT ON DELETE CASCADE;

Hakinha — Ontem às 10:49
/* Erro SQL (1452): Cannot add or update a child row: a foreign key constraint fails (ordemservico.#sql-9a4_40, CONSTRAINT fk_cliente_task FOREIGN KEY (cliente_id) REFERENCES cliente (cod) ON DELETE CASCADE) */



[10:53]
é



[10:53]
o wo mic esta dando a bunda



[10:53]
e agr



[10:53]
como faz???



[10:53]
nao



[10:54]
o problema n é discord



[10:54]
o problema é o app que eu uso



[10:54]
eu testei



[10:54]
aqui



[10:54]
o app que eu uso de microfone no celular



1 de setembro de 2024
João_Lucas_N.D
 iniciou uma chamada que durou 2 horas.
 — Hoje às 15:39




Hakinha — Hoje às 16:11
<!-- criar função php para alterar a action deste form para "actions/createTaskCliente.php" APENAS SE estiver um cliente sendo selecionado no elemento "option" -->




Hakinha — Hoje às 17:12
todolist
<?php
require_once('./bd/conecta_bd.php');
require_once('valida_session.php');


Expandir
message.txt
18 KB



[17:13]
create aqui embaixo



[17:13]
<?php
require_once('../valida_session.php');
require_once('../bd/conecta_bd.php');

$cliente_id = $_SESSION['cod_usu'];
$description = filter_input(INPUT_POST, 'description');
$user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$data = filter_input(INPUT_POST, 'data');



if ($_SESSION['perfil'] == 1) {

if ($description && $user_id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, user_id, priority, data) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siis", $description, $user_id, $priority, $data);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar statement: " . mysqli_error($conexao);
        exit;
    }

    mysqli_close($conexao);

    header('Location: ../to_do_list.php');
    exit;
} if ($description && $cliente_id) {
    $cliente_id = filter_input(INPUT_POST, 'cliente_id', FILTER_VALIDATE_INT);
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, cliente_id, priority, data) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siis", $description, $cliente_id, $priority, $data);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar statement: " . mysqli_error($conexao);
        exit;
    }

    mysqli_close($conexao);

    header('Location: ../to_do_list.php');
    exit;


}else {
   //crie um aviso para a página html para o usuario, alertando-o que ele precisa atribuir uma tarefa a alguém

    echo "<script>alert('Você precisa atribuir uma tarefa a alguém.');</script>";

    header('Location: ../to_do_list.php');
    exit;

}
}



[17:13]
---->  createTaskCliente.php



[17:13]
<?php

require_once('../valida_session.php');
require_once('../bd/conecta_bd.php');

$description = filter_input(INPUT_POST, 'description');
$cliente_id = $_SESSION['cod_usu'];
$priority = filter_input(INPUT_POST, 'priority', FILTER_VALIDATE_INT);
$data = filter_input(INPUT_POST, 'data');

if (!isset($_SESSION['cod_usu'])) {
    die("Usuário não logado. Por favor, faça login novamente.");
} else {
    echo "ID do usuário logado: " . $_SESSION['cod_usu'];
}

if ($description && $cliente_id) {
    $conexao = conecta_bd();

    // Prepare e executa a query
    $sql = "INSERT INTO task (description, cliente_id, priority, data) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "siis", $description, $cliente_id, $priority, $data);
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



[17:19]

ProjetoFinal 2.0.zip
6.46 MB




Hakinha — Hoje às 17:21
-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para ordemservico
DROP DATABASE IF EXISTS `ordemservico`;
CREATE DATABASE IF NOT EXISTS `ordemservico` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ordemservico`;

-- Copiando estrutura para tabela ordemservico.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.cliente: ~2 rows (aproximadamente)
INSERT INTO `cliente` (`cod`, `nome`, `email`, `senha`, `endereco`, `numero`, `bairro`, `cidade`, `telefone`, `status`, `perfil`, `data`) VALUES
(4, 'Danilo Alves Alvarenga', 'danilo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', '(35) 99984-9594', 1, 2, 22),
(5, 'Mariany Alves', 'mary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Avenida Dolores Silva', '335', 'Centro', 'Aguanil', '(35) 99984-9594', 1, 2, 22);

-- Copiando estrutura para tabela ordemservico.ordem
DROP TABLE IF EXISTS `ordem`;
CREATE TABLE IF NOT EXISTS `ordem` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `cod_terceirizado` int(11) NOT NULL,
  `cod_servico` int(11) NOT NULL,
  `data_servico` date NOT NULL,
  `status` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `foreign_key_cod_cliente` (`cod_cliente`),
  KEY `foreign_key_cod_servico` (`cod_servico`),
  KEY `foreign_key_cod_terceirizado` (`cod_terceirizado`),
  CONSTRAINT `foreign_key_cod_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod`),
  CONSTRAINT `foreign_key_cod_servico` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod`),
  CONSTRAINT `foreign_key_cod_terceirizado` FOREIGN KEY (`cod_terceirizado`) REFERENCES `terceirizado` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.ordem: ~5 rows (aproximadamente)
INSERT INTO `ordem` (`cod`, `cod_cliente`, `cod_terceirizado`, `cod_servico`, `data_servico`, `status`, `data`) VALUES
(10, 5, 8, 5, '2022-07-16', 2, '2022-07-15'),
(11, 4, 7, 4, '2022-07-17', 1, '2022-07-14'),
(12, 5, 8, 5, '2022-07-21', 3, '2022-07-15'),
(13, 4, 7, 4, '2022-07-19', 1, '2022-07-15'),
(14, 5, 8, 5, '2024-07-25', 1, '2024-07-25');

-- Copiando estrutura para tabela ordemservico.servico
DROP TABLE IF EXISTS `servico`;
CREATE TABLE IF NOT EXISTS `servico` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.servico: ~2 rows (aproximadamente)
INSERT INTO `servico` (`cod`, `nome`, `valor`, `data`) VALUES
(4, 'Lavar Carro', 50, '2022-07-14'),
(5, 'Limpar Piscina', 80, '2022-07-14');

-- Copiando estrutura para tabela ordemservico.task
DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `priority` tinyint(1) DEFAULT 0,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_task` (`user_id`),
  KEY `fk_cliente_task` (`cliente_id`),
... (63 linhas)
Recolher
bdordemservico.sql
9 KB



João_Lucas_N.D
 iniciou uma chamada.
 — Hoje às 19:06




Hakinha — Hoje às 19:23
<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_ordem.php");
require_once ("bd/bd_cliente.php");
Expandir
message.txt
6 KB



[19:23]
<?php

require_once("conecta_bd.php");

function checaCliente($email, $senha) {
    $conexao = conecta_bd();
Expandir
message.txt
5 KB




Hakinha — Hoje às 19:49

<?php
require_once('valida_session.php');
require_once('header.php'); 
require_once('sidebar.php'); 
require_once ("bd/bd_cliente.php");
Expandir
message.txt
5 KB



[19:50]
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



[19:50]
<?php

require_once("conecta_bd.php");

function checaCliente($email, $senha) {
    $conexao = conecta_bd();
Expandir
message.txt
5 KB



NOVO

Hakinha — Hoje às 20:01
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



function cadastraCliente($nome,$email,$senha,$endereco,$numero,$bairro,$cidade,$telefone,$status,$perfil,$data){

    $conexao = conecta_bd();
    $query = "Insert Into cliente(nome,email,senha,endereco,numero,bairro,cidade,telefone,status,perfil,data) 
    values('$nome','$email','$senha','$endereco','$numero','$bairro','$cidade','$telefone','$status','$perfil','$data')";

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

function editarCliente($codigo, $nome, $email, $endereco, $numero, $bairro, $cidade, $telefone, $status){
    $conexao = conecta_bd();
    $query = "update cliente
              set nome = '$nome', email = '$email', endereco = '$endereco', numero = '$numero', bairro = '$bairro', cidade = '$cidade', telefone = '$telefone', status = '$status'
              where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
... (73 linhas)
Recolher
message.txt
5 KB



[20:02]
<?php
require_once('valida_session.php');
require_once('header.php');
require_once('sidebar.php');
?>
Expandir
message.txt
9 KB




Conversar em @Hakinha
﻿




 para selecionar

<?php
require_once('valida_session.php');
require_once('header.php');
require_once('sidebar.php');
?>

<!-- Main Content -->
<div id="content">

    <?php require_once('navbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="m-0 font-weight-bold text-primary" id="title">ADICIONAR CLIENTE</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['texto_erro'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?= $_SESSION['texto_erro'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['texto_erro']); endif; ?>

                <?php if (isset($_SESSION['texto_sucesso'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i>&nbsp;&nbsp;<?= $_SESSION['texto_sucesso'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php unset($_SESSION['texto_sucesso']); endif; ?>

                <form class="user" action="cad_cliente_envia.php" method="post">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Nome Completo </label>
                            <input type="text" class="form-control form-control-user" id="nome" name="nome" value="<?php if (!empty($_SESSION['nome'])) { echo $_SESSION['nome'];} ?>" placeholder="Nome Completo" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Email </label>
                            <input type="email" class="form-control form-control-user" id="email" name="email" value="<?php if (!empty($_SESSION['email'])) { echo $_SESSION['email'];} ?>" placeholder="Endereço de Email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Senha </label>
                            <input type="password" class="form-control form-control-user" id="senha" name="senha" placeholder="Senha" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Confirmar Senha </label>
                            <input type="password" class="form-control form-control-user" id="confirma_senha" name="confirma_senha" placeholder="Confirmar Senha" oninput="validatepassword(this)" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Telefone - Ex.: (11) 91234-1234 </label>
                            <input type="tel" class="form-control form-control-user" id="telefone" name="telefone" placeholder="(xx)xxxxx-xxxx" value="<?php if (!empty($_SESSION['telefone'])) { echo $_SESSION['telefone'];} ?>" maxlength="15" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Situação </label>
                            <select class="form-control" id="status" name="status" required>
                                <option value=""> </option>
                                <option value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label> CEP </label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-user" id="cep" name="cep" value="<?php if (!empty($_SESSION['cep'])) { echo $_SESSION['cep'];} ?>" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary" id="buscaCepBtn">Buscar CEP</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Endereço </label>
                            <input type="text" class="form-control form-control-user" id="endereco" name="endereco" value="<?php if (!empty($_SESSION['endereco'])) { echo $_SESSION['endereco'];} ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Número </label>
                            <input type="number" class="form-control form-control-user" id="numero" name="numero" value="<?php if (!empty($_SESSION['numero'])) { echo $_SESSION['numero'];} ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label> Bairro </label>
                            <input type="text" class="form-control form-control-user" id="bairro" name="bairro" value="<?php if (!empty($_SESSION['bairro'])) { echo $_SESSION['bairro'];} ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label> Cidade </label>
                            <input type="text" class="form-control form-control-user" id="cidade" name="cidade" value="<?php if (!empty($_SESSION['cidade'])) { echo $_SESSION['cidade'];} ?>" required>
                        </div>
                    </div>

                    <div class="card-footer text-muted" id="btn-form">
                        <div class="text-right">
                            <a title="Voltar" href="cliente.php"><button type="button" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>&nbsp;Voltar</button></a>
                            <a title="Adicionar"><button type="submit" name="updatebtn" class="btn btn-primary updatebtn"><i class="fas fa-fw fa-user">&nbsp;</i>Adicionar</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
require_once('footer.php');
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#buscaCepBtn').click(function() {
            var cep = $('#cep').val().replace(/\D/g, '');
            if (cep != "") {
                $.post('buscaCep.php', { cep: cep }, function(dados) {
                    if (!dados.erro) {
                        if (dados.logradouro) {
                            $('#endereco').val(dados.logradouro);
                        }
                        if (dados.bairro) {
                            $('#bairro').val(dados.bairro);
                        }
                        if (dados.localidade) {
                            $('#cidade').val(dados.localidade);
                        }
                        if (dados.uf) {
                            $('#estado').val(dados.uf);
                        }
                    } else {
                        alert('CEP não encontrado.');
                    }
                }, 'json').fail(function() {
                    alert('Erro ao buscar o CEP.');
                });
            } else {
                alert('Formato de CEP inválido.');
            }
        });
    });
</script>

</body>
</html>
message.txt
9 KB