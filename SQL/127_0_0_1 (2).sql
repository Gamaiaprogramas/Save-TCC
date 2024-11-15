-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/11/2024 às 00:04
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `save`
--
CREATE DATABASE IF NOT EXISTS `save` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `save`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `gastosfix`
--

DROP TABLE IF EXISTS `gastosfix`;
CREATE TABLE IF NOT EXISTS `gastosfix` (
  `Id_gastoFix` int NOT NULL AUTO_INCREMENT,
  `Nomes_gastos` text NOT NULL,
  `Valores_gastos` text NOT NULL,
  `Id_User` int DEFAULT NULL,
  PRIMARY KEY (`Id_gastoFix`),
  UNIQUE KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `gastosfix`
--

INSERT INTO `gastosfix` (`Id_gastoFix`, `Nomes_gastos`, `Valores_gastos`, `Id_User`) VALUES
(1, '1231,1231,1231232,qweqweqweqe1,qweqeqweq', '31231,1,13123213,23131,3213131', 1),
(2, 'Gamaia,Analize', '123,231', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacao`
--

DROP TABLE IF EXISTS `informacao`;
CREATE TABLE IF NOT EXISTS `informacao` (
  `Id_Informacao` int NOT NULL AUTO_INCREMENT,
  `saldo` decimal(10,2) NOT NULL,
  `Nomes_Dividas` text NOT NULL,
  `Valores_Dividas` text NOT NULL,
  `Tempo_Dividas` text NOT NULL,
  `Juros_Dividas` text NOT NULL,
  `Id_User` int DEFAULT NULL,
  `nivel` int DEFAULT NULL,
  `status_divida` varchar(10) DEFAULT 'ativo',
  PRIMARY KEY (`Id_Informacao`),
  UNIQUE KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `informacao`
--

INSERT INTO `informacao` (`Id_Informacao`, `saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`, `status_divida`) VALUES
(1, 1000.00, '123,gamaia,gamaia2,oi123,Gamaia', '1231,123,1232,1231,123', '3123128,321,3212,312,0', '312,1231,12312,31231,1', 1, 1, 'ativo'),
(2, 1000.00, 'Seila,adasdad,1,2,3,adassdada,Alisson', '123,1231,1,2,3,123,112222', '0,229,0,0,0,0,0', '23,12321,1,1,3,213,2', 2, 1, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `Id_user` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `genero` varchar(40) NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nascto` date NOT NULL,
  `senha` varchar(40) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `registro`
--

INSERT INTO `registro` (`Id_user`, `nome`, `email`, `cpf`, `genero`, `telefone`, `nascto`, `senha`, `foto`, `nivel`) VALUES
(1, 'Teste', 'teste@teste.com', '111.111.111-11', 'Masculino', '(00) 00000-0000', '2024-10-28', '123', '../clientes/fotosClientes/Teste.jpg', 2),
(2, 'Guilherme Teste Marques', 'teste1@gamail.com', '123.131.313-23', 'Masculino', '(12) 31323-3123', '2024-11-01', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Guilherme Teste Marques&backgroundColor=ff6d00\r\n            ', 2),
(3, 'Guilherme Marques Cardoso Dos Santos', 'teste123@gmail.com', '131.231.321-32', 'Masculino', '(11) 95812-4482', '2024-11-08', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Guilherme Marques Cardoso Dos Santos&backgroundColor=ff6d00\r\n            ', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
