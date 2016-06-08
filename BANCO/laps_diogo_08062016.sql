-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2016 às 22:05
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
(1, 2147483, '04/2018', '2016-04-06', 314, 'FELIPE VOGEL', 'UVV', 1),
(2, 2147483647, '04/2018', '2016-04-11', 634, 'DIOGO', 'UVV', 2);

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
(1, 'Admin', 1, '11111111111', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 4, 'senha1', 1, '2016-03-23'),
(2, 'Diogo', 2, '22222222222', 1234567, NULL, 'diogodinizcosme@gmail.com', 997355441, 1, 4, 'senha2', 0, '2016-03-25'),
(3, '3333', 3, '33333333333', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 1, 4, 'senha3', 0, '2016-03-26'),
(4, 'CONVITE5', 4, '55555555555', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 1, 3, '123', 0, '2016-03-24'),
(5, 'TESTE4', 5, '44444444444', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 3, '123', 0, '2016-03-24'),
(6, 'CONVITE6', 1, '66666666666', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 1, 4, '123', 0, '2016-03-25'),
(7, 'TESTE7', 2, '77777777777', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 2, '0', 0, '2016-04-04'),
(8, 'testecpf', 3, '12909437701', 1234567, NULL, 'mymiuus@yahoo.com.br', 912345678, 0, 2, '123', 0, '2016-04-05'),
(9, '999', 4, '12312312312', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 4, '12345678', 0, '2016-04-11'),
(10, 'Alais Casimira Salino', 5, '12345678900', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 3, 'alais', 0, '2016-06-07'),
(11, 'Alais Casimira Salino', 1, '12345678900', 1234567, NULL, 'alaiscs@gmail.com', 912345678, 0, 1, NULL, 0, '2016-06-07');

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
(1, 2, '1/2', '45.50', 2, 0, 1, '2016-05-24 02:04:07'),
(2, 2, '2/2', '45.50', 2, 0, 2, '2016-06-24 02:04:07'),
(3, 2, '1', '1699.00', 1, 0, 1, '2016-04-24 12:54:07'),
(4, 2, '1/3', '399.00', 1, 0, 2, '2016-05-24 23:22:08'),
(5, 2, '2/3', '399.00', 1, 0, 1, '2016-06-24 23:22:08'),
(6, 2, '3/3', '399.00', 1, 0, 2, '2016-07-24 23:22:08'),
(7, 2, '1', '149.99', 1, 0, 1, '2016-03-24 23:47:41'),
(8, 2, '1', '39.99', 1, 0, 2, '2016-06-06 21:38:25'),
(9, 2, '1/3', '39.99', 1, 0, 1, '2016-06-06 21:39:11'),
(10, 2, '2/3', '39.99', 1, 0, 2, '2016-07-06 21:39:11'),
(11, 2, '1', '119.99', 1, 0, 2, '2016-06-08 16:40:39'),
(12, 2, '1', '22.90', 1, 0, 3, '2016-06-08 16:42:02'),
(13, 2, '1', '35.90', 1, 0, 4, '2016-06-08 17:22:34');

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
(1, 1, '8000.00', '3000.00', '8000.00', 0, 'Comentario', '0.00'),
(2, 2, '7821.21', '10000.00', '8000.00', 0, 'ddddd', '0.00');

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
(1, 1, '../img/Chrysanthemum.jpg', '../img/Desert.jpg', '../img/Hydrangeas.jpg'),
(2, 2, 'localhost/LAPS/img/IMG-20150213-WA0001.jpg', 'localhost/LAPS/img/4.png', 'localhost/LAPS/img/2.png'),
(3, 3, 'localhost/LAPS/img/IMG-20150213-WA0001.jpg', 'localhost/LAPS/img/4.png', 'localhost/LAPS/img/2.png'),
(4, 4, 'localhost/LAPS/img/0002.jpg', 'localhost/LAPS/img/00001.jpg', 'localhost/LAPS/img/00002.jpg'),
(5, 5, 'localhost/LAPS/img/0002.jpg', 'localhost/LAPS/img/00001.jpg', 'localhost/LAPS/img/00002.jpg'),
(6, 6, 'localhost/LAPS/img/brainstorm.jpg', 'localhost/LAPS/img/brainstorm.jpg', 'localhost/LAPS/img/brainstorm.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
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

INSERT INTO `endereco` (`id_endereco`, `id_cliente`, `rua`, `num`, `complemento`, `cep`, `cidade`, `estado`, `bairro`) VALUES
(1, 1, 'Avenida Resplendor, ', 11, 'comp', 29101620, 'Vila Velha', 'Es', 'MaruÃ­pe'),
(2, 2, 'Alvarenga Peixoto', 152, 'casa', 2910640, 'Vila Velha', 'ES', 'Cristovao Colombo'),
(3, 3, 'Rua Jose do Carmo', 4027, 'MMMM', 29126552, 'Vila Velha', 'Es', 'MM'),
(4, 4, 'Rua Alvarenga Peixot', 152, 'casa', 29106440, 'Vila Velha', 'ES', 'Cirstovao Colombo'),
(5, 5, 'Rua Jaime Duarte', 599, '403', 29101620, 'Vila Velha', 'ES', 'Itapoa');

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
(1, 'Loja Online', 'R. Luis Jose, 21 - Boa Vista, Vila Velha - ES, 29102-920', 'Departamento'),
(2, 'Centauro', 'Av. Luciano das Neves, 99 - Centro, Vila Velha - ES, 29102-444', 'Esportes'),
(3, 'Subway', 'R. Piaui, 5550 - Gloria, Vila Velha - ES, 29100-000', 'Restaurante'),
(4, 'Perim', 'R. Jose, 21 - Itapua, Vila Velha - ES, 29102-920', 'Alimentacao'),
(5, 'Bella Donna', 'Av. Luciano das Neves, 2.418, Vila Velha – ES, 29.107-900', 'Vestuario');

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
(1, 1, 'TESTE DE SUPORTE', '2016-04-30', 'asdasd asda sada sd sad as dasdasd asdasdasd asdasd asdasdsa dsds a sd asd as asd sad asd asda sd asdasdasdasd asdasdas asd sdsd asd asdasdas sdas d asd asd sa asdsda sdddsdasd asdasd as asdasda'),
(2, 1, 'LIMITE DO CARTÃO', '2016-04-29', 'qwe qweqw eqwe q weqw eqw eq weq we qwe qweqw eqwe qqwew eq we q we qweqqwe qwe qwe qwewe wew qwe qwewe qweqweqwe wewe qwe weqweqwe qweqweq'),
(3, 1, 'SEGUNDA VIA', '2016-05-01', 'jkl jkl jkl jkljkljkl jkl k jkl jkl jkljljkljkl jkl jkljkl jkljkl jljklkljkljkl jkljkljkljkl jkjkjkl jkl jkljkjklj jkljkljkljkljkljkljklj'),
(4, 1, 'ROUBO DO CARTÃO', '2016-05-02', 'bvcvbcbv bvcbv v cbv cvbcb cvbc bc bvcb vcb vvbcb vcvb cbv cbvbv cb cb cbv cbvcbc bvcbvcbvcbvc vbc vbc bv bvc bvcbv cbvc bvc bc bbv cb cbcbv cvb cbv cvb cbv cbc bv cbc bv bc bc bvcbv cbvcb vcbv c bc bvc bvvb cvb bv cbv cbv vb cv cb cbv cvb cbvc bv bvcc c bvc vbc bvc bvc bcbv bvb cbv bv cvb cvb cvbc bvc bvb ccvb c vbcbv'),
(5, 1, 'teste', '2016-06-02', 'sadfghjkl'),
(6, 1, 'teste', '2016-06-02', 'sadfghjkl'),
(7, 1, 'teste55', '2016-06-02', 'asdfghjklÃ§'),
(8, 1, 'sdfghjkl', '2016-06-02', 'dcfvgbhjmk,l.Ã§;/'),
(9, 1, 'sdfghjkl', '2016-06-02', 'dcfvgbhjmk,l.Ã§;/');

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
  ADD PRIMARY KEY (`id_endereco`),
  ADD UNIQUE KEY `id_endereco` (`id_endereco`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `documentacao`
--
ALTER TABLE `documentacao`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suporte`
--
ALTER TABLE `suporte`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
