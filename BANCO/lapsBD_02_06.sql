-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2016 às 17:20
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

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
  `validade` varchar(7) NOT NULL,
  `criacao` date NOT NULL,
  `codigo` int(3) NOT NULL,
  `nome_cliente` varchar(45) NOT NULL,
  `bandeira` varchar(15) NOT NULL,
  `id_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cartao`
--

INSERT INTO `cartao` (`id_cartao`, `numero`, `validade`, `criacao`, `codigo`, `nome_cliente`, `bandeira`, `id_conta`) VALUES
(1, 2147483647, '04/2018', '2016-04-06', 314, 'menino feliz', 'UVV', 3),
(33, 2147483647, '04/2018', '2016-04-11', 634, 'FELIPE DE OLIVEIRA VOGEL PENNA', 'UVV', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `id_endereco` int(10) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` int(10) DEFAULT NULL,
  `id_doc` int(10) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cel` int(9) DEFAULT NULL,
  `convite` int(1) DEFAULT '0',
  `cadastro` int(11) NOT NULL DEFAULT '0',
  `senha` varchar(8) DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `dt_solicitacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `id_endereco`, `cpf`, `rg`, `id_doc`, `email`, `cel`, `convite`, `cadastro`, `senha`, `tipo`, `dt_solicitacao`) VALUES
(1, 'FELIPE VOGEL', NULL, '11111111111', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 4, 'senha1', 1, '2016-03-23'),
(2, 'CONVITE 1', NULL, '11111111111', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 2, '123', 0, '2016-03-24'),
(3, 'CONVITE 2', NULL, '22222222222', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 2, NULL, 0, '2016-03-24'),
(4, 'CONVITE 3', NULL, '33333333333', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 1, NULL, 0, '2016-03-25'),
(5, 'TESTE1', NULL, '11111111111', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 3, NULL, 0, '2016-03-25'),
(6, 'usuario', NULL, '22222222222', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 4, 'senha2', 0, '2016-03-26'),
(7, 'TESTE3', NULL, '33333333333', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 1, NULL, 0, '2016-03-24'),
(8, 'CONVITE4', NULL, '44444444444', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 0, NULL, 0, '2016-03-26'),
(9, 'CONVITE5', NULL, '55555555555', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 3, NULL, 0, '2016-03-24'),
(10, 'TESTE4', NULL, '44444444444', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 1, NULL, 0, '2016-03-24'),
(11, 'CONVITE6', NULL, '66666666666', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 4, NULL, 0, '2016-03-25'),
(12, 'TESTE2', NULL, '22222222222', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 0, NULL, 0, '2016-04-01'),
(13, 'CONVITE7', NULL, '77777777777', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 0, NULL, 0, '2016-04-02'),
(14, 'TESTE5', NULL, '55555555555', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 0, NULL, 0, '2016-03-30'),
(15, 'TESTE6', NULL, '66666666666', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 0, NULL, 0, '2016-04-03'),
(17, 'TESTE7', NULL, '77777777777', NULL, NULL, 'feoli7@hotmail.com', NULL, 0, 2, NULL, 0, '2016-04-04'),
(18, 'CONVITE8', NULL, '88888888888', NULL, NULL, 'feoli7@hotmail.com', NULL, 1, 0, NULL, 0, '2016-04-04'),
(19, 'menino feliz', NULL, '22222222222', 2292522, NULL, 'lucsazevedo@gmail.com', 992322726, 0, 0, '123456', 0, '2016-04-05'),
(20, 'testecpf', NULL, '12909437701', NULL, NULL, 'aguiar.micael@gmail.com', NULL, 0, 2, NULL, 0, '2016-04-05'),
(22, 'FELIPE DE OLIVEIRA VOGEL PENNA', NULL, '12312312312', 2227465, NULL, 'feoli7@hotmail.com', 999148998, 0, 4, '12345678', 0, '2016-04-11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_cartao` int(11) NOT NULL,
  `parcelas` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `pago` int(11) NOT NULL DEFAULT '0',
  `id_loja` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id_compra`, `id_cartao`, `parcelas`, `valor`, `quantidade`, `pago`, `id_loja`, `data`) VALUES
(1, 33, '1/2', '45.50', 2, 0, 1, '2016-05-24 02:04:07'),
(2, 33, '2/2', '45.50', 2, 0, 1, '2016-06-24 02:04:07'),
(3, 33, '1', '1699.00', 1, 0, 1, '2016-04-24 12:54:07'),
(4, 33, '1/3', '399.00', 1, 0, 1, '2016-05-24 23:22:08'),
(5, 33, '2/3', '399.00', 1, 0, 1, '2016-06-24 23:22:08'),
(6, 33, '3/3', '399.00', 1, 0, 1, '2016-07-24 23:22:08'),
(7, 33, '1', '149.99', 1, 0, 1, '2016-03-24 23:47:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id_conta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `limite` varchar(20) NOT NULL,
  `renda` varchar(20) NOT NULL,
  `limitetotal` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `comentario` varchar(200) DEFAULT NULL,
  `limite_anterior` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id_conta`, `id_cliente`, `limite`, `renda`, `limitetotal`, `status`, `comentario`, `limite_anterior`) VALUES
(2, 19, '0.00', '10000.00', '0.00', 0, NULL, '0.00'),
(3, 19, '0.00', '10000.00', '0.00', 0, NULL, '0.00'),
(5, 22, '19451.01', '3000.00', '5000.00', 0, 'ACEITO!!! SEJA BEM VINDO AO LAPS FELIPE!!!', '0.00');

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
(1, 0, '../img/3x4_001.bmp', '', ''),
(2, 19, 'localhost/LAPS/img/IMG-20150213-WA0001.jpg', 'localhost/LAPS/img/4.png', 'localhost/LAPS/img/2.png'),
(3, 19, 'localhost/LAPS/img/IMG-20150213-WA0001.jpg', 'localhost/LAPS/img/4.png', 'localhost/LAPS/img/2.png'),
(4, 21, 'localhost/LAPS/img/0002.jpg', 'localhost/LAPS/img/00001.jpg', 'localhost/LAPS/img/00002.jpg'),
(5, 22, 'localhost/LAPS/img/0002.jpg', 'localhost/LAPS/img/00001.jpg', 'localhost/LAPS/img/00002.jpg');

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
  `estado` varchar(2) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_cliente`, `rua`, `num`, `complemento`, `cep`, `cidade`, `estado`, `bairro`) VALUES
(19, 'Avenida Resplendor, ', 112, 'comp', 29101620, 'Vila Velha', 'Es', 'MaruÃ­pe'),
(21, 'Rua Jaime Duarte', 599, '403', 29101620, 'Vila Velha', 'ES', 'Itapoa'),
(22, 'Rua Jaime Duarte', 599, '403', 29101620, 'Vila Velha', 'ES', 'Itapoa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id_loja` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id_loja`, `nome`, `endereco`, `categoria`) VALUES
(1, 'Loja Online', 'R. Luís José, 21 - Boa Vista, Vila Velha - ES, 29102-920', 'Departamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte`
--

CREATE TABLE `suporte` (
  `id_msg` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `assunto` varchar(50) NOT NULL,
  `dt_msg` date NOT NULL,
  `mensagem` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `suporte`
--

INSERT INTO `suporte` (`id_msg`, `id_cliente`, `assunto`, `dt_msg`, `mensagem`) VALUES
(1, 22, 'TESTE DE SUPORTE', '2016-04-30', 'asdasd asda sada sd sad as dasdasd asdasdasd asdasd asdasdsa dsds a sd asd as asd sad asd asda sd asdasdasdasd asdasdas asd sdsd asd asdasdas sdas d asd asd sa asdsda sdddsdasd asdasd as asdasda'),
(2, 22, 'LIMITE DO CARTÃO', '2016-04-29', 'qwe qweqw eqwe q weqw eqw eq weq we qwe qweqw eqwe qqwew eq we q we qweqqwe qwe qwe qwewe wew qwe qwewe qweqweqwe wewe qwe weqweqwe qweqweq'),
(3, 22, 'SEGUNDA VIA', '2016-05-01', 'jkl jkl jkl jkljkljkl jkl k jkl jkl jkljljkljkl jkl jkljkl jkljkl jljklkljkljkl jkljkljkljkl jkjkjkl jkl jkljkjklj jkljkljkljkljkljkljklj'),
(4, 22, 'ROUBO DO CARTÃO', '2016-05-02', 'bvcvbcbv bvcbv v cbv cvbcb cvbc bc bvcb vcb vvbcb vcvb cbv cbvbv cb cb cbv cbvcbc bvcbvcbvcbvc vbc vbc bv bvc bvcbv cbvc bvc bc bbv cb cbcbv cvb cbv cvb cbv cbc bv cbc bv bc bc bvcbv cbvcb vcbv c bc bvc bvvb cvb bv cbv cbv vb cv cb cbv cvb cbvc bv bvcc c bvc vbc bvc bvc bcbv bvb cbv bv cvb cvb cvbc bvc bvb ccvb c vbcbv');

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
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

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
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id_loja`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `suporte`
--
ALTER TABLE `suporte`
  ADD PRIMARY KEY (`id_msg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id_cartao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `documentacao`
--
ALTER TABLE `documentacao`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
