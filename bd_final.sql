-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
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
DELETE FROM `cliente`;
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

-- Copiando dados para a tabela ordemservico.ordem: ~4 rows (aproximadamente)
DELETE FROM `ordem`;
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
DELETE FROM `servico`;
INSERT INTO `servico` (`cod`, `nome`, `valor`, `data`) VALUES
	(4, 'Lavar Carro', 50, '2022-07-14'),
	(5, 'Limpar Piscina', 80, '2022-07-14');

-- Copiando estrutura para tabela ordemservico.task
DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_task` (`user_id`),
  CONSTRAINT `fk_user_task` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`cod`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.task: ~2 rows (aproximadamente)
DELETE FROM `task`;
INSERT INTO `task` (`id`, `description`, `completed`, `user_id`) VALUES
	(10, 'Boca aberta', 0, 30),
	(11, 'Teste Kuka', 0, 25);

-- Copiando estrutura para tabela ordemservico.terceirizado
DROP TABLE IF EXISTS `terceirizado`;
CREATE TABLE IF NOT EXISTS `terceirizado` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.terceirizado: ~2 rows (aproximadamente)
DELETE FROM `terceirizado`;
INSERT INTO `terceirizado` (`cod`, `nome`, `email`, `telefone`, `senha`, `status`, `perfil`, `data`) VALUES
	(7, 'Dalyla Alvarenga ', 'dalylalvarenga@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', 1, 3, '2022-07-15'),
	(8, 'Maria Aparecida', 'maria@gmail.com', '(35) 99984-9594', 'e10adc3949ba59abbe56e057f20f883e', 1, 3, '2022-07-14');

-- Copiando estrutura para tabela ordemservico.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perfil` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `data` date NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela ordemservico.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`cod`, `nome`, `senha`, `email`, `perfil`, `status`, `data`, `cep`, `logradouro`, `bairro`, `cidade`, `estado`) VALUES
	(25, 'kuka', 'e10adc3949ba59abbe56e057f20f883e', 'kuka@gmail.com', 1, 1, '2024-08-12', '', '', '', '', ''),
	(30, 'Joao Pedro', 'e10adc3949ba59abbe56e057f20f883e', 'Pejo@gmail.com.br', 1, 1, '2024-08-30', '37750-000', 'Teste', 'Centro', 'Machado', 'MG');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
