-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/07/2024 às 16:55
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dstcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `nome`
--

CREATE TABLE `nome` (
  `idd` int(11) NOT NULL,
  `nomed` varchar(30) DEFAULT NULL,
  `depoimento` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `nome`
--

INSERT INTO `nome` (`idd`, `nomed`, `depoimento`) VALUES
(1, 'dominique', 'dedfrgvtrvggrtgv4rv4rvcr'),
(2, 'dominique', 'dedfrgvtrvggrtgv4rv4rvcr'),
(3, 'dominique', 'dedfrgvtrvggrtgv4rv4rvcr'),
(4, 'dominique', ''),
(5, 'dominique', ''),
(6, 'dominique', ''),
(7, 'dominique', ''),
(8, 'dominique', ''),
(9, 'dominique', ''),
(10, 'dominique', ''),
(11, 'dominique', ''),
(12, 'dominique', ''),
(13, 'dominique', ''),
(14, 'dominique', ''),
(15, 'dominique', ''),
(16, 'dominique', ''),
(17, 'dominique', ''),
(18, 'dominique', ''),
(19, 'dominique', ''),
(20, 'dominique', 'silva'),
(21, 'dominique', 'silva'),
(22, 'dominique', 'silva'),
(23, 'dominique', 'silva'),
(24, 'dominique', 'silva'),
(25, 'dominique', 'silva'),
(26, 'dominique', 'silva'),
(27, 'dominique', 'silva'),
(28, 'dominique', 'silva'),
(29, 'dominique', 'silva'),
(30, 'dominique', 'silva'),
(31, 'dominique', 'silva');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `nome`
--
ALTER TABLE `nome`
  ADD PRIMARY KEY (`idd`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `nome`
--
ALTER TABLE `nome`
  MODIFY `idd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
