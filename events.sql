-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2018 às 00:14
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `color` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Reuni''ao', '#40e0d0', '2017-12-23 08:21:24', '2017-12-24 13:37:46'),
(2, 'Plestra', '#40e0d0', '2017-12-27 12:00:00', '2017-12-28 20:00:00'),
(3, 'auditoria', '#ffc266', '2017-12-01 00:00:00', '2017-12-02 00:00:00'),
(4, 'Aula', '#cc00ff', '2017-12-13 05:00:00', '2017-12-15 22:00:00'),
(5, 'Congresso', '#0066ff', '2017-12-18 10:00:00', '2017-12-20 09:00:00'),
(6, 'Prova', '#9999ff', '2017-12-01 07:00:00', '2017-12-01 17:00:00'),
(7, 'Reunão', '', '2017-12-01 06:00:00', '2017-12-01 10:00:00'),
(8, 'Evento', '#ff0000', '0000-00-00 00:00:00', '2017-11-29 11:00:00'),
(9, 'evento3', '#ff0000', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'portugues', '#ff0000', '2017-12-15 00:00:00', '2017-12-16 05:00:00'),
(11, 'Auditoria', '#cc00ff', '2017-12-25 00:00:00', '2017-12-25 00:00:00'),
(12, 'teste3', '#00ff00', '2017-11-30 00:00:00', '2017-12-01 00:00:00'),
(13, 'prova', '#FFD700', '2017-12-30 00:00:00', '2017-12-30 00:00:00'),
(14, 'prova', '#1a75ff', '2017-12-30 00:00:00', '2017-12-30 00:00:00'),
(15, 'RevisÃ£o', '#ff0000', '2017-12-23 00:00:00', '2017-12-24 00:00:00'),
(16, 'Enquete', '#00ff00', '2017-12-29 00:00:00', '2017-12-29 10:00:00'),
(17, 'Folga', '#cc00ff', '2017-12-29 13:00:00', '2017-12-29 15:00:00'),
(18, 'tet', '#ff0000', '2018-01-02 00:00:00', '2018-01-03 00:00:00'),
(19, 'Curso', '#1a75ff', '2018-01-02 00:00:00', '2018-01-04 00:00:00'),
(20, 'Prova', '#ff0000', '2017-12-30 00:00:00', '2017-12-31 00:00:00'),
(21, 'Teste de UBE', '#cc00ff', '2017-12-30 00:00:00', '2017-12-31 00:00:00'),
(22, 'corrida', '#00ff00', '2017-12-30 00:00:00', '2017-12-31 00:00:00'),
(23, 'Auditoria', '#FFD700', '2017-12-30 00:00:00', '2017-12-31 00:00:00'),
(24, 'ferias', '#00ff00', '2017-12-31 00:00:00', '2018-01-01 00:00:00'),
(25, 'test4', '#00ff00', '2017-12-29 16:00:00', '2017-12-29 19:00:00'),
(26, 'sera?', '#ff0000', '2017-12-06 00:00:00', '0000-00-00 00:00:00'),
(27, 'sera2?', '#ff0000', '2017-12-26 08:00:00', '2017-12-26 10:00:00'),
(28, 'Ferias', '#00ff00', '2018-01-15 00:00:00', '0000-00-00 00:00:00'),
(29, 'ferias', '#ff0000', '2018-01-15 03:00:00', '2018-02-14 12:00:00'),
(30, 'Turismo', '#FFD700', '2018-01-07 00:00:00', '2018-01-13 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
