-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Out-2024 às 19:42
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

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
-- Estrutura da tabela `gastosfix`
--

DROP TABLE IF EXISTS `gastosfix`;
CREATE TABLE IF NOT EXISTS `gastosfix` (
  `Id_gastoFix` int NOT NULL AUTO_INCREMENT,
  `saldo` decimal(10,2) NOT NULL,
  `Nomes_gastos` text NOT NULL,
  `Valores_gastos` text NOT NULL,
  `Id_User` int DEFAULT NULL,
  `nivel` int DEFAULT NULL,
  PRIMARY KEY (`Id_gastoFix`),
  UNIQUE KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacao`
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
  PRIMARY KEY (`Id_Informacao`),
  UNIQUE KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `informacao`
--

INSERT INTO `informacao` (`Id_Informacao`, `saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) VALUES
(1, '0.00', '121312,1231231,1231,1231', '12312312,1231,12312,321', '12311312123,123,123', '123131,1231,123,12123', 2, 2),
(2, '1231312.00', 'asdad,Fasdada', '12,12212', '12,9999', '13,12', 3, NULL),
(3, '99999999.99', 'fsdfsfsdf,rwerwrwr,eeeeee', '2342342,2342,23423', '3243242,9999', '2342342,33242,23424', 4, 2),
(4, '1211212.00', 'gfdgg', '12', '1', '21', 15, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Banco de dados: `tech`
--
CREATE DATABASE IF NOT EXISTS `tech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tech`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `email` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nomeCompleto` varchar(60) NOT NULL,
  `data` date NOT NULL,
  `Cliente` int NOT NULL,
  PRIMARY KEY (`Cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Banco de dados: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `rm` char(5) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `nome_dos_pais` varchar(50) DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  `logradouro` enum('rua','avenida','praça') NOT NULL DEFAULT 'rua',
  `cep` char(8) NOT NULL,
  PRIMARY KEY (`rm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `cod_dep` int NOT NULL AUTO_INCREMENT,
  `descr` varchar(40) NOT NULL,
  `localiz` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_dep`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
