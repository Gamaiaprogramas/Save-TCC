-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19/11/2024 às 00:35
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
-- Estrutura para tabela `caixinha_sonhos`
--

DROP TABLE IF EXISTS `caixinha_sonhos`;
CREATE TABLE IF NOT EXISTS `caixinha_sonhos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nome_meta` varchar(255) NOT NULL,
  `valor_meta` decimal(10,2) NOT NULL,
  `valor_atual` decimal(10,2) DEFAULT '0.00',
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `caixinha_sonhos`
--

INSERT INTO `caixinha_sonhos` (`id`, `user_id`, `nome_meta`, `valor_meta`, `valor_atual`, `data_criacao`) VALUES
(1, 3, 'Viagem', 1000.00, 3000.00, '2024-11-18 23:05:59'),
(2, 3, 'GATO', 123333.00, 99999999.99, '2024-11-18 23:07:31'),
(3, 3, '1000', 200.00, 2000.00, '2024-11-18 23:16:10'),
(4, 3, 'Guilherme', 12332.00, 101000.00, '2024-11-19 00:12:14');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `gastosfix`
--

INSERT INTO `gastosfix` (`Id_gastoFix`, `Nomes_gastos`, `Valores_gastos`, `Id_User`) VALUES
(1, '1231,1231,1231232,qweqweqweqe1,qweqeqweq', '31231,1,13123213,23131,3213131', 1),
(2, 'Gamaia,Analize', '123,231', 2),
(3, '123123,321131321', '12,32', 3);

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
  `valor_reserva` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`Id_Informacao`),
  UNIQUE KEY `Id_User` (`Id_User`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `informacao`
--

INSERT INTO `informacao` (`Id_Informacao`, `saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`, `status_divida`, `valor_reserva`) VALUES
(1, 1000.00, '123,gamaia,gamaia2,oi123,Gamaia', '1231,123,1232,1231,123', '3123128,321,3212,312,0', '312,1231,12312,31231,1', 1, 1, 'ativo', 0.00),
(2, 12323.00, 'Seila,adasdad,1,2,3,adassdada,Alisson', '123,1231,1,2,3,123,112222', '0,229,0,0,0,0,0', '23,12321,1,1,3,213,2', 2, 1, 'ativo', 0.00),
(3, 1000.00, 'fafajfaj1,eqeqwewq', '1231,12', '312,0', '13231,3', 3, 2, 'ativo', 4457.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `missoes`
--

DROP TABLE IF EXISTS `missoes`;
CREATE TABLE IF NOT EXISTS `missoes` (
  `id_missao` int NOT NULL AUTO_INCREMENT,
  `nivel` int NOT NULL,
  `descricao` text NOT NULL,
  `recompensa` varchar(50) NOT NULL,
  PRIMARY KEY (`id_missao`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `missoes`
--

INSERT INTO `missoes` (`id_missao`, `nivel`, `descricao`, `recompensa`) VALUES
(1, 1, 'Aprender a fazer um orçamento básico', 'Badge: Primeiro Orçamento'),
(2, 1, 'Pagar dívidas mais urgentes', '10 pontos'),
(3, 1, 'Criar uma lista de prioridades financeiras', '5 pontos'),
(4, 2, 'Fazer uma reserva de emergência', 'Badge: Começo da Reserva'),
(5, 2, 'Identificar 3 despesas desnecessárias e cortar gastos', '20 pontos'),
(6, 2, 'Guardar uma pequena quantia em poupança', '10 pontos'),
(7, 3, 'Investir 10% do valor reservado em uma aplicação de baixo risco', 'Badge: Investidor Iniciante'),
(8, 3, 'Criar um plano financeiro de longo prazo', '50 pontos'),
(9, 3, 'Aumentar a reserva de emergência para 3 meses de salário', 'Badge: Reserva Completa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `missoes_usuarios`
--

DROP TABLE IF EXISTS `missoes_usuarios`;
CREATE TABLE IF NOT EXISTS `missoes_usuarios` (
  `id_usuario` int NOT NULL,
  `id_missao` int NOT NULL,
  `progresso` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_missao`),
  KEY `id_missao` (`id_missao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recompensas`
--

DROP TABLE IF EXISTS `recompensas`;
CREATE TABLE IF NOT EXISTS `recompensas` (
  `id_recompensa` int NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  `criterio` text NOT NULL,
  PRIMARY KEY (`id_recompensa`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `recompensas`
--

INSERT INTO `recompensas` (`id_recompensa`, `descricao`, `criterio`) VALUES
(1, 'Badge: Primeiro Orçamento', 'Completar 1ª missão do Plano 1'),
(2, '10 pontos', 'Pagar uma dívida no Plano 1'),
(3, 'Badge: Começo da Reserva', 'Completar todas as missões do Plano 2'),
(4, '20 pontos', 'Identificar e cortar 3 despesas no Plano 2'),
(5, 'Badge: Investidor Iniciante', 'Completar 1ª missão do Plano 3'),
(6, 'Badge: Reserva Completa', 'Aumentar a reserva de emergência para 3 meses no Plano 3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recompensas_usuarios`
--

DROP TABLE IF EXISTS `recompensas_usuarios`;
CREATE TABLE IF NOT EXISTS `recompensas_usuarios` (
  `id_usuario` int NOT NULL,
  `id_recompensa` int NOT NULL,
  `data_desbloqueio` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`id_recompensa`),
  KEY `id_recompensa` (`id_recompensa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(3, 'Guilherme Marques Cardoso Dos Santos', 'teste123@gmail.com', '131.231.321-32', 'Masculino', '(11) 95812-4482', '0000-00-00', '123', 'https://api.dicebear.com/8.x/initials/svg?seed=Guilherme Marques Cardoso Dos Santos&backgroundColor=ff6d00\r\n            ', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int NOT NULL AUTO_INCREMENT,
  `nivel` int NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `perguntas` text,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`id_video`, `nivel`, `titulo`, `url`, `perguntas`) VALUES
(1, 1, 'Como criar um orçamento simples', 'https://www.youtube.com/watch?v=exemplo1', '[\"O que é orçamento?\",\"Por que é importante?\"]'),
(2, 1, 'Conceitos básicos sobre juros e dívidas', 'https://www.youtube.com/watch?v=exemplo2', '[\"O que é taxa de juros?\",\"Como calcular juros simples?\"]'),
(3, 2, 'Como fazer uma reserva de emergência', 'https://www.youtube.com/watch?v=exemplo3', '[\"O que é uma reserva de emergência?\",\"Quanto reservar?\"]'),
(4, 2, 'Como cortar despesas e otimizar orçamento', 'https://www.youtube.com/watch?v=exemplo4', '[\"Quais despesas cortar primeiro?\",\"Como identificar gastos supérfluos?\"]'),
(5, 3, 'Introdução aos investimentos de baixo risco', 'https://www.youtube.com/watch?v=exemplo5', '[\"O que é baixo risco?\",\"Quais investimentos são considerados seguros?\"]'),
(6, 3, 'Como criar um plano financeiro robusto', 'https://www.youtube.com/watch?v=exemplo6', '[\"Quais são os componentes de um plano financeiro?\",\"Como planejar para o longo prazo?\"]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos_usuarios`
--

DROP TABLE IF EXISTS `videos_usuarios`;
CREATE TABLE IF NOT EXISTS `videos_usuarios` (
  `id_usuario` int NOT NULL,
  `id_video` int NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_usuario`,`id_video`),
  KEY `id_video` (`id_video`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
