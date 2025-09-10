-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jul-2024 às 15:36
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mural_upload`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `imgNome` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `local` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registros`
--

INSERT INTO `registros` (`id`, `imgNome`, `path`, `data_upload`, `nome`, `local`, `data`) VALUES
(1, '2024-05-07t231315z-1738628517-rc2rl7ac7zmg-rtrmadp-3-brazil-rains.jpg', 'registros/6695116f331a1.jpg', '2024-07-15 09:09:19', 'Wesley Santos/Reuters', 'Aeroporto Internacional Salgado Filho', '2024-05-07'),
(2, 'asi20240515056.jpg', 'registros/669511bb901f9.jpg', '2024-07-15 09:10:35', 'GILMAR', 'Casa de Cultura Mario Quintana', '2024-05-14'),
(3, '2024-05-06t164821z-1189007613-rc2zk7a1huyr-rtrmadp-3-brazil-rains.jpg', 'registros/669512b2b9454.jpg', '2024-07-15 09:14:42', 'Amanda Perobelli/Reuters', 'Arena do GrÃªmio', '2024-05-06'),
(4, 'ruagramadoperto.jpg', 'registros/6695136099a88.jpg', '2024-07-15 09:17:36', 'Halder Ramos', 'Gramado, Rua Henrique Bertoluci', '2024-05-13'),
(5, 'bc265670-0c54-11ef-82e8-cd354766a224.jpg.jpg', 'registros/669673c544d95.jpg', '2024-07-16 10:21:09', 'RENAN MATTOS/REUTERS', 'Canoas', '2024-05-04'),
(6, '1000043532.jpg', 'registros/6697b01fe9760.jpg', '2024-07-17 08:50:56', 'Ana Paula', 'Canoas, Mathias Velho', '2024-05-11'),
(7, 'vista-da-estacao-de-trem-urbano-da-transurb-mercado-publico-em-porto-alegre-rs-que-permanece-sem-pre', 'registros/6698f9dc1c052.jpg', '2024-07-18 08:17:48', 'Gilmar Alves/ASI', 'EstaÃ§Ã£o Transurb, Mercado PÃºblico', '2024-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
