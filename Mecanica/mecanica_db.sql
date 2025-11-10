-- Host: 127.0.0.1
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE mecanica_db;
USE mecanica_db;

CREATE TABLE `pecas` (
  `idPeca` int(11) NOT NULL,
  `peca` varchar(120) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pecas` (`idPeca`, `peca`, `quantidade`, `preco`) VALUES
(1, 'Oléo do Hiago', 50, 20.00),
(2, 'Motor', 10, 10000.00),
(3, 'Pneu', 159, 438.00),
(4, 'balança dianteira', 5, 820.00);


CREATE TABLE `pessoa` (
  `idpessoa` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `cargo` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `pessoa` (`idpessoa`, `nome`, `senha`, `cargo`) VALUES
(1, 'Gustavo', '1234', 'Dbo'),
(2, 'Gabriela', 'Gabi', 'Estagiária'),
(3, 'a', 'a', 'a');


ALTER TABLE `pecas`
  ADD PRIMARY KEY (`idPeca`);


ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idpessoa`);

ALTER TABLE `pecas`
  MODIFY `idPeca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `pessoa`
  MODIFY `idpessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;