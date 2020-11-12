-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Abr-2019 às 14:31
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portariabandeirante`
--
CREATE DATABASE IF NOT EXISTS `portariabandeirante` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portariabandeirante`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chaves`
--

DROP TABLE IF EXISTS `chaves`;
CREATE TABLE IF NOT EXISTS `chaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `chaves`
--

TRUNCATE TABLE `chaves`;
--
-- Extraindo dados da tabela `chaves`
--

INSERT DELAYED INTO `chaves` (`id`, `cod`, `local`, `status`) VALUES
(1, 'CPD', 'CENTRO PROCESSAMENTO DADOS', 'A'),
(2, 'EST', 'PORTA PRINCIPAL ESCRITORIO', 'A'),
(3, 'FAT', 'FATURAMENTO', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `params` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabela de Groupos de Permissões';

--
-- Truncate table before insert `groups`
--

TRUNCATE TABLE `groups`;
--
-- Extraindo dados da tabela `groups`
--

INSERT DELAYED INTO `groups` (`id`, `name`, `params`) VALUES
(1, 'DESENVOLVEDOR', '1,2,3,4,5,6,8,9,10,11,12,13'),
(2, 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='Tabela de Permissões';

--
-- Truncate table before insert `permissions`
--

TRUNCATE TABLE `permissions`;
--
-- Extraindo dados da tabela `permissions`
--

INSERT DELAYED INTO `permissions` (`id`, `name`) VALUES
(1, 'permissao_view'),
(2, 'permissao_add'),
(3, 'permissao_addgroup'),
(4, 'usuario_view'),
(5, 'veiculos_view'),
(6, 'veiculos_add'),
(8, 'veiculos_edit'),
(9, 'veiculos_del'),
(10, 'chaves_view'),
(11, 'chaves_add'),
(12, 'chaves_edit'),
(13, 'records_view');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `cpf` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `turno` varchar(45) DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de Usuarios';

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Extraindo dados da tabela `users`
--

INSERT DELAYED INTO `users` (`cpf`, `name`, `turno`, `id_group`) VALUES
('123456789-1', 'TESTE', 'TESTE', 2),
('44313271856', 'Marcos Sousa', 'adm', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `motorista` varchar(100) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `empresa` varchar(150) NOT NULL,
  `status` varchar(1) DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `veiculos`
--

TRUNCATE TABLE `veiculos`;
--
-- Extraindo dados da tabela `veiculos`
--

INSERT DELAYED INTO `veiculos` (`id`, `tipo`, `motorista`, `placa`, `empresa`, `status`) VALUES
(1, 'CARRO', 'MARCOS SOUSA', 'HJN4686', 'IND BANDEIRANTE', 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
