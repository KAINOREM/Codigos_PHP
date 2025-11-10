-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2025 às 16:49
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
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordenar`
--

CREATE TABLE `ordenar` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `Ano_Lancamento` year(4) NOT NULL,
  `Placa` char(7) NOT NULL,
  `Dono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ordenar`
--

INSERT INTO `ordenar` (`id`, `modelo`, `Ano_Lancamento`, `Placa`, `Dono`) VALUES
(1, 'Onix', '2026', 'BRA1E19', 'Bandeclay'),
(2, 'Fastback', '2026', 'BRA2E19', 'Costa e Silva'),
(3, 'Maverick', '2026', 'BRA3E19', 'Top Gunn'),
(4, 'BMW', '2026', 'BRA1E19', 'Esnobe'),
(5, 'Mustang', '2023', 'BRA4E19', 'Carlinhos Maia');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ordenar`
--
ALTER TABLE `ordenar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ordenar`
--
ALTER TABLE `ordenar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
