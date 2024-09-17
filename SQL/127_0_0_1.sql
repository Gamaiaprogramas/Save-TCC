-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Set-2024 às 20:51
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
-- Estrutura da tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `Id_user` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` int NOT NULL,
  `genero` varchar(40) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `nascto` date NOT NULL,
  `senha` varchar(40) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nivel` int NOT NULL,
  PRIMARY KEY (`Id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`Id_user`, `nome`, `email`, `cpf`, `genero`, `telefone`, `nascto`, `senha`, `foto`, `nivel`) VALUES
(1, 'Martha', 'martha@coi.com', 2147483647, 'opcao3', '1231231313', '2024-09-06', '202cb962ac59075b964b07152d234b70', '', 0),
(2, 'Gamaia123', 'julia.silva1272@etec.sp.gov.br', 123123131, 'opcao2', '11980896151', '2024-09-26', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Gamaia123', 0),
(3, 'Gamaia123', 'julia.silva1272@etec.sp.gov.brasd', 436, 'opcao2', '1231232132131', '2024-09-07', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Gamaia123', 0),
(4, 'Luis', 'eueu@gmail.com', 2147483647, 'opcao2', '11980896151', '2024-10-02', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Luis', 0),
(5, 'Guilherme', 'Gamaia213@gmail,com', 2147483647, 'opcao2', '11980896151', '2024-09-07', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=Guilherme&backgroundColor=ff6d00\r\n', 0),
(6, 'gustavo', 'fafafafaf@gmail.com', 2147483647, '', '11980896151', '2024-09-03', '202cb962ac59075b964b07152d234b70', 'https://api.dicebear.com/8.x/initials/svg?seed=gustavo&backgroundColor=ff6d00\r\n', 2);
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
