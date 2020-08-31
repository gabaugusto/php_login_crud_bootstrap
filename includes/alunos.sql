-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2020 at 11:39 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exemplo`
--

-- --------------------------------------------------------

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(11) NOT NULL,
  `cpf` char(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `fone` char(14) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alunos`
--

INSERT INTO `alunos` (`id`, `status`, `cpf`, `nome`, `email`, `password`, `fone`, `data_nascimento`) VALUES
(5, '2', '05896332104', 'Karla Dantas', 'k@dantas.com', 'carrots', '55119875252201', '2020-05-25'),
(6, '1', '88754215936', 'Jaime Sato', 'adobe@be.com', 'limes', '551198765873', '2020-05-25'),
(38, '2', '85696375342', 'Carlos Santos ', 'car.santos@obol.com', 'melancia', '551389638541', '1982-02-25'),
(37, '1', '2455869630', 'Gabriel Teixeira Azevedo', 'gab.text@gmail.com', '123456', '5511875349621', '1971-03-05'),
(40, '2', '53698574156', '', 'a@b.com', 'abacaxi', '5511 42369875', '1980-12-25'),
(39, '2', '53698574156', '', 'a@b.com', 'abacaxi', '5511 42369875', '1980-12-25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
