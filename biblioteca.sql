-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 16:58
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `autor` text NOT NULL,
  `secao` text NOT NULL,
  `codigo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `autor`, `secao`, `codigo`) VALUES
(1, 'viva a vida', 'kauã', 'terror', '256200'),
(2, 'Até o verão terminar', 'Collen Hoover', 'Romance', '123457'),
(3, 'O lado feio do amor', 'Collen Hoover', 'Romance', '123458'),
(4, 'O Diário de um Livreiro ', 'Shaun Bythell', 'Romance', '123459'),
(5, 'Se não fosse por você ', 'Laura Amorim', 'Romance', '123460'),
(6, 'Amor em Roma ', 'Sarah Adams', 'Romance', '123461'),
(7, 'Eu e esse meu coração ', 'C. C. Hunter', 'Romance', '123462'),
(8, 'Todo esse tempo ', 'Laura Amorim', 'Romance', '123463'),
(9, 'A cinco passos de você ', 'Rachael Lippincott', 'Romance', '123464'),
(10, 'A culpa é das estrelas', 'Não sei', 'Romance', '202310'),
(11, 'morango', 'morango', 'terror', '326315'),
(12, 'morango', 'Kauã Silva', 'Romance', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `livro` varchar(255) NOT NULL,
  `data_emprestimo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `nome`, `livro`, `data_emprestimo`) VALUES
(2, 'Maria Eduarda ', 'eu voce e ela', '2023-12-13'),
(3, 'Todas as suas (im)perfeições', 'eu voce e ela', '2023-11-24'),
(4, 'Maria Eduarda ', 'Todas as suas (im)perfeições', '2023-11-16'),
(5, 'Maria Eduarda ', 'O pequeno principe', '2023-12-01'),
(6, 'Maria Eduarda ', 'Todas as suas (im)perfeições', '2023-12-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(255) NOT NULL,
  `nomeusuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `niveis_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nomecompleto`, `nomeusuario`, `email`, `senha`, `endereco`, `cep`, `niveis_permissao`) VALUES
(7, 'Maria Eduarda Akiyama de Campos', 'ma.camposz', 'duda.akiyama@gmail.com', '171222', 'Rua marechal costa e silva', '19700-13', 1),
(17, 'Kauã', 'kaua2', 'kaua60033@gmail.com', '2020', 'Rua marechal costa e silva', '19700-13', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
