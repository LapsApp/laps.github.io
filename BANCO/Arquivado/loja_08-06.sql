-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2016 às 17:59
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `id_loja` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`id_loja`, `nome`, `endereco`, `categoria`) VALUES
(1, 'Loja Online', 'R. Luís José, 21 - Boa Vista, Vila Velha - ES, 29102-920', 'Departamento'),
(2, 'Casas Bahia', 'R. Maranhão, 5550 - Centro, Vila Velha - ES, 29100-000', 'Decoracao'),
(3, 'Subway', 'R. Piaui, 5550 - Glória, Vila Velha - ES, 29100-000', 'Restaurante'),
(4, 'Perim', 'R. José, 21 - Itapua, Vila Velha - ES, 29102-920', 'Alimentacao'),
(5, 'Bella Donna', 'Av. Luciano das Neves, 2.418, Vila Velha – ES, 29.107-900', 'Vestuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `id_loja` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `addcar` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `id_loja`, `nome`, `estoque`, `valor`, `categoria`, `foto`, `addcar`) VALUES
(1, 1, 'IPHONE 6 - 16GB', 10, '2879,10', 'TECNOLOGIA', 'tec_001.jpg', 0),
(2, 1, 'IPOD NANO 8 - 16GB', 10, '1061,10', 'TECNOLOGIA', 'tec_002.jpg', 0),
(3, 1, 'CARREGADOR APPLE USB', 22, '242,10', 'TECNOLOGIA', 'tec_003.jpg', 0),
(4, 1, 'TECLADO + MOUSE SEM FIO', 16, '710,10', 'TECNOLOGIA', 'tec_004.jpg', 0),
(5, 1, 'GAME OF THRONES', 8, '165,00', 'LIVRARIA', 'liv_001.jpg', 0),
(6, 1, 'BELA GIL COZINHA', 15, '29,90', 'LIVRARIA', 'liv_002.jpg', 0),
(7, 1, 'VADE MECUM 2016', 15, '143,20', 'LIVRARIA', 'liv_003.jpg', 0),
(8, 1, 'SISTEMAS DE INFORMAÇÃO', 9, '140,40', 'LIVRARIA', 'liv_004.jpg', 0),
(9, 1, 'STAR WARS', 5, '35,90', 'LIVRARIA', 'liv_005.jpg', 0),
(10, 1, 'AUDITORIA DE SISTEMAS', 4, '73,80', 'LIVRARIA', 'liv_006.jpg', 0),
(11, 1, 'SIG 5º EDIÇÃO', 6, '76,50', 'LIVRARIA', 'liv_007.jpg', 0),
(12, 1, 'DIREITO DIGITAL', 9, '45,50', 'LIVRARIA', 'liv_008.jpg', 0),
(13, 1, 'GALAXY TAB E 7"', 5, '849,00', 'TECNOLOGIA', 'tec_005.jpg', 0),
(14, 1, 'GALAXY GRAN DUOS', 5, '899,00', 'TECNOLOGIA', 'tec_006.jpg', 0),
(15, 1, 'GALAXY SIII DUOS', 9, '999,00', 'TECNOLOGIA', 'tec_007.jpg', 0),
(16, 1, 'GEAR VR', 4, '799,00', 'TECNOLOGIA', 'tec_008.jpg', 0),
(17, 1, 'PARQUE AQUÁTICO', 100, '60,00', 'LAZER', 'laz_001.jpg', 0),
(18, 1, 'CINEMA 3D', 50, '20,00', 'LAZER', 'laz_002.jpg', 0),
(19, 1, 'PASSEIO DE ESCUNA', 30, '30,00', 'LAZER', 'laz_003.jpg', 0),
(20, 1, 'PARQUE DE DIVERSÃO', 30, '40,00', 'LAZER', 'laz_004.jpg', 0),
(21, 1, 'FOGÃO ITATIAIA', 5, '459,00', 'ELETRODOMESTICO', 'ele_001.jpg', 0),
(22, 1, 'MICROONDAS', 7, '429,00', 'ELETRODOMESTICO', 'ele_002.jpg', 0),
(23, 1, 'AR CONDICIONADO', 4, '1699,00', 'ELETRODOMESTICO', 'ele_003.jpg', 0),
(24, 1, 'LAVADORA BRASTEMP 9KG', 4, '1349,00', 'ELETRODOMESTICO', 'ele_004.jpg', 0),
(25, 1, 'CLIMATIZADOR CONSUL', 7, '399,00', 'ELETRODOMESTICO', 'ele_005.jpg', 0),
(26, 1, 'FORNO DE EMBUTIR', 3, '1299,00', 'ELETRODOMESTICO', 'ele_006.jpg', 0),
(27, 1, 'COOLER MULTILASER 7LTRS', 5, '269,99', 'ELETRODOMESTICO', 'ele_007.jpg', 0),
(28, 1, 'ESPREMEDOR INDUSTRIAL', 6, '178,90', 'ELETRODOMESTICO', 'ele_008.jpg', 0),
(29, 1, 'VIZZANO', 12, '119,96', 'CALCADO', 'cal_001.jpg', 0),
(30, 1, 'SAPATÊNIS', 12, '219,96', 'CALCADO', 'cal_002.jpg', 0),
(31, 1, 'SANDÁLIA CRYSALIS', 15, '79,96', 'CALCADO', 'cal_003.jpg', 0),
(32, 1, 'SANDÁLIA SPIDERMAN', 8, '69,96', 'CALCADO', 'cal_004.jpg', 0),
(33, 1, 'SAPATO PEGADA', 10, '199,96', 'CALCADO', 'cal_005.jpg', 0),
(34, 1, 'CHINELO COLORIDO', 20, '39,99', 'CALCADO', 'cal_006.jpg', 1),
(35, 1, 'SANDÁLIA', 8, '129,99', 'CALCADO', 'cal_007.jpg', 0),
(36, 1, 'ANKLE BOOT', 6, '149,99', 'CALCADO', 'cal_008.jpg', 1),
(37, 1, 'BOLA 8 PRÓ PENALTY', 24, '139,90', 'ESPORTE', 'esp_001.jpg', 0),
(38, 1, 'PRANCHA SURF', 5, '599,00', 'ESPORTE', 'esp_002.jpg', 0),
(39, 1, 'KIT TÊNIS', 10, '179,99', 'ESPORTE', 'esp_003.jpg', 0),
(40, 1, 'HALTERES 20KG', 7, '349,99', 'ESPORTE', 'esp_004.jpg', 0),
(41, 1, 'LONGBOARD', 5, '219,99', 'ESPORTE', 'esp_005.jpg', 0),
(42, 1, 'PRANCHA NATAÇÃO', 21, 'R$34,90', 'ESPORTE', 'esp_006.jpg', 0),
(43, 1, 'BICICLETA CALOI 26''', 4, '689,99', 'ESPORTE', 'esp_007.jpg', 0),
(44, 1, 'SACO DE PANCADA 70CM', 6, '119,99', 'ESPORTE', 'esp_008.jpg', 0),
(45, 1, 'CALÇA SKINNY', 16, 'R$99,99', 'VESTUARIO', 'ves_001.jpg', 0),
(46, 1, 'CALÇA FLARE', 12, 'R$149,99', 'VESTUARIO', 'ves_002.jpg', 0),
(47, 1, 'CAMISETA INFANTIL', 15, 'R$35,99', 'VESTUARIO', 'ves_003.jpg', 0),
(48, 1, 'JAQUETA DE COURO', 5, 'R$279,90', 'VESTUARIO', 'ves_004.jpg', 0),
(49, 1, 'CAMISA POLO', 15, '35,90', 'VESTUARIO', 'ves_005.jpg', 0),
(50, 1, 'KIT BODYS', 17, '169,90', 'VESTUARIO', 'ves_006.jpg', 0),
(51, 1, 'BERMUDA MASCULINA', 8, 'R$79,90', 'VESTUARIO', 'ves_007.jpg', 0),
(52, 1, 'SAIA FEMININA', 12, 'R$29,90', 'VESTUARIO', 'ves_008.jpg', 0),
(53, 1, 'PIZZA VÁRIOS SABORES', 100, '39,90', 'ALIMENTACAO', 'ali_001.jpg', 0),
(54, 1, 'BIG BOBS', 100, '19,90', 'ALIMENTACAO', 'ali_002.jpg', 0),
(55, 1, 'BIG MAC', 100, '22,90', 'ALIMENTACAO', 'ali_003.jpg', 0),
(56, 1, 'FILET MIGNON 230GR', 100, '57,50', 'ALIMENTACAO', 'ali_004.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`id_loja`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `id_loja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
