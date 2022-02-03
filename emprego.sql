-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/02/2022 às 06:10
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `emprego`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `nivel`) VALUES
(1, 'João Ribeiro', 'josercdm25@gmail.com', '123123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `membros`
--

INSERT INTO `membros` (`id`, `name`, `email`, `pass`, `data`, `status`) VALUES
(2, 'Jose Roberto carlos', 'josercdm@gmail.com', '$2y$10$0QhBSl5bpmK9TYkVU3cKE.aXXlu69nVfSIlAiK3mQRIrTVtDF/jV6', '2022-02-02 21:42:00', 0),
(4, 'Juliana Dos Santos Batista Damascena', 'batistadamascena30@gmail.com', '$2y$10$I6HfFYJ4k78Xl6kLYH2.UOfcYaci5IXnHwSF3YJ40zamq0YwSC/pG', '2022-02-03 02:41:08', 0),
(5, 'Eduardo Batista Damascena', 'mintolenda@gmail.com', '$2y$10$dPk0dkCLCq7GkbauxU.lAO3Ax/wh42byKQvclEqfJvgJXtfreVYca', '2022-02-03 03:05:40', 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
