-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Abr-2016 às 03:26
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
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `loja` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `addcar` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome`, `estoque`, `valor`, `categoria`, `loja`, `foto`, `addcar`) VALUES
(1, 'IPHONE 6 - 16GB', 10, '2879,10', 'TECNOLOGIA', 'DIGITALTECH', 'tec_001.jpg', 0),
(2, 'IPOD NANO 8 - 16GB', 10, '1061,10', 'TECNOLOGIA', 'DIGITALTECH', 'tec_002.jpg', 0),
(3, 'CARREGADOR APPLE USB', 22, '242,10', 'TECNOLOGIA', 'DIGITALTECH', 'tec_003.jpg', 0),
(4, 'TECLADO + MOUSE SEM FIO', 16, '710,10', 'TECNOLOGIA', 'DIGITALTECH', 'tec_004.jpg', 0),
(5, 'GAME OF THRONES', 8, '165,00', 'LIVRARIA', 'SARAIVA', 'liv_001.jpg', 0),
(6, 'BELA GIL COZINHA', 15, '29,90', 'LIVRARIA', 'SARAIVA', 'liv_002.jpg', 0),
(7, 'VADE MECUM 2016', 15, '143,20', 'LIVRARIA', 'SARAIVA', 'liv_003.jpg', 0),
(8, 'SISTEMAS DE INFORMAÇÃO', 9, '140,40', 'LIVRARIA', 'SARAIVA', 'liv_004.jpg', 0),
(9, 'STAR WARS', 5, '35,90', 'LIVRARIA', 'SARAIVA', 'liv_005.jpg', 0),
(10, 'AUDITORIA DE SISTEMAS', 4, '73,80', 'LIVRARIA', 'SARAIVA', 'liv_006.jpg', 0),
(11, 'SIG 5º EDIÇÃO', 6, '76,50', 'LIVRARIA', 'SARAIVA', 'liv_007.jpg', 0),
(12, 'DIREITO DIGITAL', 9, '45,50', 'LIVRARIA', 'SARAIVA', 'liv_008.jpg', 0),
(13, 'GALAXY TAB E 7"', 5, '849,00', 'TECNOLOGIA', 'DIGITALTECH', 'tec_005.jpg', 0),
(14, 'GALAXY GRAN DUOS', 5, '899,00', 'TECNOLOGIA', 'DIGITALTECH', 'tec_006.jpg', 0),
(15, 'GALAXY SIII DUOS', 9, '999,00', 'TECNOLOGIA', 'DIGITALTECH', 'tec_007.jpg', 0),
(16, 'GEAR VR', 4, '799,00', 'TECNOLOGIA', 'DIGITALTECH', 'tec_008.jpg', 0),
(17, 'PARQUE AQUÁTICO', 100, '60,00', 'LAZER', 'AQUAMANIA', 'laz_001.jpg', 0),
(18, 'CINEMA 3D', 50, '20,00', 'LAZER', 'CINEMARK', 'laz_002.jpg', 0),
(19, 'PASSEIO DE ESCUNA', 30, '30,00', 'LAZER', 'CORES DO MAR', 'laz_003.jpg', 0),
(20, 'PARQUE DE DIVERSÃO', 30, '40,00', 'LAZER', 'PLAY CITY', 'laz_004.jpg', 0),
(21, 'FOGÃO ITATIAIA', 5, '459,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_001.jpg', 0),
(22, 'MICROONDAS', 7, '429,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_002.jpg', 0),
(23, 'AR CONDICIONADO', 4, '1699,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_003.jpg', 0),
(24, 'LAVADORA BRASTEMP 9KG', 4, '1349,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_004.jpg', 0),
(25, 'CLIMATIZADOR CONSUL', 7, '399,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_005.jpg', 0),
(26, 'FORNO DE EMBUTIR', 3, '1299,00', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_006.jpg', 0),
(27, 'COOLER MULTILASER 7LTRS', 5, '269,99', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_007.jpg', 0),
(28, 'ESPREMEDOR INDUSTRIAL', 6, '178,90', 'ELETRODOMESTICO', 'ELETROCITY', 'ele_008.jpg', 0),
(29, 'VIZZANO', 12, '119,96', 'CALCADO', 'ITAPOA', 'cal_001.jpg', 0),
(30, 'SAPATÊNIS', 12, '219,96', 'CALCADO', 'ITAPOA', 'cal_002.jpg', 0),
(31, 'SANDÁLIA CRYSALIS', 15, '79,96', 'CALCADO', 'ITAPOA', 'cal_003.jpg', 0),
(32, 'SANDÁLIA SPIDERMAN', 8, '69,96', 'CALCADO', 'ITAPOA', 'cal_004.jpg', 0),
(33, 'SAPATO PEGADA', 10, '199,96', 'CALCADO', 'ITAPOA', 'cal_005.jpg', 0),
(34, 'CHINELO COLORIDO', 20, '39,99', 'CALCADO', 'ITAPOA', 'cal_006.jpg', 0),
(35, 'SANDÁLIA', 8, '129,99', 'CALCADO', 'ITAPOA', 'cal_007.jpg', 0),
(36, 'ANKLE BOOT', 6, '149,99', 'CALCADO', 'ITAPOA', 'cal_008.jpg', 0),
(37, 'BOLA 8 PRÓ PENALTY', 24, '139,90', 'ESPORTE', 'DECATHLON', 'esp_001.jpg', 0),
(38, 'PRANCHA SURF', 5, '599,00', 'ESPORTE', 'DECATHLON', 'esp_002.jpg', 0),
(39, 'KIT TÊNIS', 10, '179,99', 'ESPORTE', 'DECATHLON', 'esp_003.jpg', 0),
(40, 'HALTERES 20KG', 7, '349,99', 'ESPORTE', 'DECATHLON', 'esp_004.jpg', 0),
(41, 'LONGBOARD', 5, '219,99', 'ESPORTE', 'DECATHLON', 'esp_005.jpg', 0),
(42, 'PRANCHA NATAÇÃO', 21, 'R$34,90', 'ESPORTE', 'DECATHLON', 'esp_006.jpg', 0),
(43, 'BICICLETA CALOI 26''', 4, '689,99', 'ESPORTE', 'DECATHLON', 'esp_007.jpg', 0),
(44, 'SACO DE PANCADA 70CM', 6, '119,99', 'ESPORTE', 'DECATHLON', 'esp_008.jpg', 0),
(45, 'CALÇA SKINNY', 16, 'R$99,99', 'VESTUARIO', 'RIACHUELO', 'ves_001.jpg', 0),
(46, 'CALÇA FLARE', 12, 'R$149,99', 'VESTUARIO', 'RIACHUELO', 'ves_002.jpg', 0),
(47, 'CAMISETA INFANTIL', 15, 'R$35,99', 'VESTUARIO', 'RIACHUELO', 'ves_003.jpg', 0),
(48, 'JAQUETA DE COURO', 5, 'R$279,90', 'VESTUARIO', 'RIACHUELO', 'ves_004.jpg', 0),
(49, 'CAMISA POLO', 15, '35,90', 'VESTUARIO', 'RIACHUELO', 'ves_005.jpg', 0),
(50, 'KIT BODYS', 17, '169,90', 'VESTUARIO', 'RIACHUELO', 'ves_006.jpg', 0),
(51, 'BERMUDA MASCULINA', 8, 'R$79,90', 'VESTUARIO', 'RIACHUELO', 'ves_007.jpg', 0),
(52, 'SAIA FEMININA', 12, 'R$29,90', 'VESTUARIO', 'RIACHUELO', 'ves_008.jpg', 0),
(53, 'PIZZA VÁRIOS SABORES', 100, '39,90', 'ALIMENTACAO', 'MISTERPIZZA', 'ali_001.jpg', 0),
(54, 'BIG BOBS', 100, '19,90', 'ALIMENTACAO', 'BOBS', 'ali_002.jpg', 0),
(55, 'BIG MAC', 100, '22,90', 'ALIMENTACAO', 'MC DONALD''S', 'ali_003.jpg', 0),
(56, 'FILET MIGNON 230GR', 100, '57,50', 'ALIMENTACAO', 'OUTBACK', 'ali_004.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
