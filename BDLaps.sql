-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Mar-2016 às 07:00
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laps`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `id_cartao` int(11) NOT NULL,
  `numero` int(16) NOT NULL,
  `validade` date NOT NULL,
  `criacao` date NOT NULL,
  `codigo` int(3) NOT NULL,
  `nome_cliente` varchar(15) NOT NULL,
  `bandeira` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `id_endereco` int(10) DEFAULT NULL,
  `cpf` bigint(11) DEFAULT NULL,
  `rg` int(10) DEFAULT NULL,
  `id_doc` int(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cel` int(9) DEFAULT NULL,
  `convite` int(1) DEFAULT '0',
  `cadastro` int(11) NOT NULL DEFAULT '0',
  `senha` varchar(8) DEFAULT NULL,
  `dt_solicitacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `id_endereco`, `cpf`, `rg`, `id_doc`, `email`, `cel`, `convite`, `cadastro`, `senha`, `dt_solicitacao`) VALUES
(1, 'FELIPE VOGEL', NULL, 11111111111, NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 4, NULL, '2016-03-23'),
(2, 'CONVITE 1', NULL, 11111111111, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 0, NULL, '2016-03-24'),
(3, 'CONVITE 2', NULL, 22222222222, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 2, NULL, '2016-03-24'),
(4, 'CONVITE 3', NULL, 33333333333, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 1, NULL, '2016-03-25'),
(5, 'TESTE1', NULL, 11111111111, NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 3, NULL, '2016-03-25'),
(6, 'TESTE2', NULL, 22222222222, NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 4, NULL, '2016-03-26'),
(7, 'TESTE3', NULL, 33333333333, NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 1, NULL, '2016-03-24'),
(8, 'CONVITE4', NULL, 44444444444, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 2, NULL, '2016-03-26'),
(9, 'CONVITE5', NULL, 55555555555, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 3, NULL, '2016-03-24'),
(10, 'TESTE4', NULL, 44444444444, NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 0, NULL, '2016-03-24'),
(11, 'CONVITE6', NULL, 66666666666, NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 4, NULL, '2016-03-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id_conta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `limite` decimal(10,2) NOT NULL,
  `renda` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id_conta`, `id_cliente`, `limite`, `renda`, `saldo`, `status`) VALUES
(1, 0, '0.00', '100.00', '0.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentacao`
--

CREATE TABLE `documentacao` (
  `id_doc` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `doc_frente` varchar(50) NOT NULL,
  `doc_verso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `documentacao`
--

INSERT INTO `documentacao` (`id_doc`, `id_cliente`, `foto`, `doc_frente`, `doc_verso`) VALUES
(1, 0, '../img/3x4_001.bmp', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_cliente` int(11) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `num` int(10) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cep` int(10) DEFAULT NULL,
  `cidade` varchar(15) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`id_cartao`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id_conta`);

--
-- Indexes for table `documentacao`
--
ALTER TABLE `documentacao`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id_cartao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documentacao`
--
ALTER TABLE `documentacao`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
