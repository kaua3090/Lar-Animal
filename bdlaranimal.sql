-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2026 at 04:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdlaranimal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbanimal`
--

CREATE TABLE `tbanimal` (
  `idAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(50) DEFAULT NULL,
  `statusAnimal` varchar(20) NOT NULL,
  `idadeAnimal` int(11) DEFAULT NULL,
  `coloracaoAnimal` varchar(50) NOT NULL,
  `idSexoAnimal` int(11) NOT NULL,
  `idEspecieAnimal` int(11) NOT NULL,
  `idRacaAnimal` int(11) NOT NULL,
  `idPorteAnimal` int(11) NOT NULL,
  `idOng` int(11) NOT NULL,
  `fotoAnimal` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbanimal`
--

INSERT INTO `tbanimal` (`idAnimal`, `nomeAnimal`, `statusAnimal`, `idadeAnimal`, `coloracaoAnimal`, `idSexoAnimal`, `idEspecieAnimal`, `idRacaAnimal`, `idPorteAnimal`, `idOng`, `fotoAnimal`) VALUES
(1, 'Chico', 'adotado', 1, 'Preto', 1, 2, 10, 1, 2, 'gato.jpg'),
(2, 'Caramelo', 'não adotado', 3, 'Branco', 1, 1, 13, 3, 2, 'dog1.jpg'),
(3, 'Husky', 'adotado', 4, 'Pardo', 1, 1, 14, 2, 2, 'dog2.jpg'),
(4, 'William', 'não adotado', 5, 'Preto', 1, 1, 15, 3, 2, 'dog3.jpg'),
(6, 'Lenny', 'não adotado', 6, 'Parda', 1, 1, 45, 1, 2, 'dog5.jpg'),
(7, 'DongZao', 'adotado', 2, 'Parda', 1, 1, 14, 1, 6, 'd.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(150) NOT NULL,
  `cpfCliente` char(14) NOT NULL,
  `rgCliente` char(12) NOT NULL,
  `cepCliente` varchar(9) NOT NULL,
  `estadoCliente` varchar(30) NOT NULL,
  `cidadeCliente` varchar(50) NOT NULL,
  `bairroCliente` varchar(100) NOT NULL,
  `ruaCliente` varchar(100) NOT NULL,
  `numCliente` varchar(10) NOT NULL,
  `complementoCliente` varchar(10) NOT NULL,
  `emailCliente` varchar(150) NOT NULL,
  `senhaCliente` varchar(120) NOT NULL,
  `telefoneCliente` varchar(30) NOT NULL,
  `fotoCliente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `rgCliente`, `cepCliente`, `estadoCliente`, `cidadeCliente`, `bairroCliente`, `ruaCliente`, `numCliente`, `complementoCliente`, `emailCliente`, `senhaCliente`, `telefoneCliente`, `fotoCliente`) VALUES
(1, 'Jorge', '1111111111111', '111111111111', '01310000 ', 'Mato Grosso do Sul', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '', 'jorge@flamengo.com', 'flamengo123', '3333333333333', 'j1.png'),
(2, 'Pedro', '111111111111', '222222222222', '01310000 ', 'Sergipe', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '111', '', 'craque@neto.com', 'craqueneto', '1111111111111', 'Screenshot 2026-05-16 at 12-51-20 imagem ong at DuckDuckGo.png'),
(4, 'Melissa', '11111111111111', '111111111111', '01310000 ', 'Distrito Federal', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '1111111111', 'melina@live.com', '$2y$10$5O0D70KEhstQZwWvApAbAup0yux4UhKHWew.5xbZVE4cEFuHZitEa', '11111111111111', 'canva-foto-de-perfil-de-instagram-profesional-circular-rosa-VoWahMVeqoQ-3630667258.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbespecieanimal`
--

CREATE TABLE `tbespecieanimal` (
  `idEspecieAnimal` int(11) NOT NULL,
  `descEspecie` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbespecieanimal`
--

INSERT INTO `tbespecieanimal` (`idEspecieAnimal`, `descEspecie`) VALUES
(1, 'Cachorro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Table structure for table `tbfotoanimal`
--

CREATE TABLE `tbfotoanimal` (
  `idFotoAnimal` int(11) NOT NULL,
  `fotoAnimal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbong`
--

CREATE TABLE `tbong` (
  `idOng` int(11) NOT NULL,
  `nomeOng` varchar(50) NOT NULL,
  `cepOng` varchar(10) NOT NULL,
  `estadoOng` varchar(150) NOT NULL,
  `cidadeOng` varchar(150) NOT NULL,
  `bairroOng` varchar(150) NOT NULL,
  `logradouroOng` varchar(150) NOT NULL,
  `numOng` varchar(6) NOT NULL,
  `complementoOng` varchar(30) NOT NULL,
  `loginOng` varchar(150) NOT NULL,
  `senhaOng` varchar(60) NOT NULL,
  `telefoneOng` varchar(30) NOT NULL,
  `fotoOng` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbong`
--

INSERT INTO `tbong` (`idOng`, `nomeOng`, `cepOng`, `estadoOng`, `cidadeOng`, `bairroOng`, `logradouroOng`, `numOng`, `complementoOng`, `loginOng`, `senhaOng`, `telefoneOng`, `fotoOng`) VALUES
(2, 'teste2', '01310200 ', 'São Paulo', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '', 'senac@senac.com', 'teste12345', '111111111111111', 'Screenshot 2026-05-16 at 12-51-20 imagem ong at DuckDuckGo.png'),
(4, 'Lenny', '01310200 ', 'São Paulo', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '11', 'teste@live.com', '$2y$10$F4v2EBfcrR6UUkAmtLygSuJ/Ql529isdOUKRpfc8U.I2V0E19a99S', '111111111', '{1844C768-DEAB-44A1-9EBF-1B6F068CEF13}.png'),
(5, 'Mike', '01310200 ', 'São Paulo', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '11111111', 'testezin@live.com', '$2y$10$rFKYx6OJMiyiuPylb.9e7uTQcn7Yn8blUrznGyTZiBqxArMk3FfRm', '11111111111', '{1844C768-DEAB-44A1-9EBF-1B6F068CEF13}.png'),
(6, 'Logan', '01310200 ', 'Sergipe', 'São Paulo', 'Bela Vista', 'Avenida Paulista', '11', '', 'flamengo@flamengo.com', 'senac123', '111111111111', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbporteanimal`
--

CREATE TABLE `tbporteanimal` (
  `idPorteAnimal` int(11) NOT NULL,
  `nomePorteAnimal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbporteanimal`
--

INSERT INTO `tbporteanimal` (`idPorteAnimal`, `nomePorteAnimal`) VALUES
(1, 'Pequeno'),
(2, 'Médio'),
(3, 'Grande');

-- --------------------------------------------------------

--
-- Table structure for table `tbracaanimal`
--

CREATE TABLE `tbracaanimal` (
  `idRacaAnimal` int(11) NOT NULL,
  `nomeRacaAnimal` varchar(50) NOT NULL,
  `idEspecieAnimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbracaanimal`
--

INSERT INTO `tbracaanimal` (`idRacaAnimal`, `nomeRacaAnimal`, `idEspecieAnimal`) VALUES
(1, 'Afegão', 1),
(2, 'Affenpinscher', 1),
(3, 'Airedale Terrier', 1),
(4, 'Akita Americano', 1),
(5, 'Akita Japonês', 1),
(6, 'Alano Espanhol', 1),
(7, 'American Staffordshire Terrier', 1),
(8, 'American Water Spaniel', 1),
(9, 'Barbet', 1),
(10, 'Basenji', 1),
(11, 'Basset Azul da Gasconha', 1),
(12, 'Basset Fulvo da Bretanha', 1),
(13, 'Basset Hound', 1),
(14, 'Beagle', 1),
(15, 'Beagle Harrier', 1),
(16, 'Bearded Collie', 1),
(17, 'Bedlington Terrier', 1),
(18, 'Bernese Mountain Dog', 1),
(19, 'Bichon Bolonhês', 1),
(20, 'Bichon Havanês', 1),
(21, 'Bichon Frisé', 1),
(22, 'Bichon Maltês', 1),
(23, 'Bloodhound', 1),
(24, 'Boiadeiro Australiano', 1),
(25, 'Boiadeiro Bernês', 1),
(26, 'Border Collie', 1),
(27, 'Border Terrier', 1),
(28, 'Borzoi', 1),
(29, 'Boston Terrier', 1),
(30, 'Boxer', 1),
(31, 'Bull Terrier', 1),
(32, 'Bulldog Inglês', 1),
(33, 'Bulldog Francês', 1),
(34, 'Bulmastife', 1),
(35, 'Cairn Terrier', 1),
(36, 'Cane Corso', 1),
(37, 'Cão de Água Português', 1),
(38, 'Cão de Crista Chinês', 1),
(39, 'Cão de Montanha dos Pirinéus', 1),
(40, 'Cão lobo checoslovaco', 1),
(41, 'Cão da Groenlândia', 1),
(42, 'Poodle', 1),
(43, 'Cavalier King Charles Spaniel', 1),
(44, 'Chesapeake Bay Retriever', 1),
(45, 'Chihuahua', 1),
(46, 'Chow Chow', 1),
(47, 'Cirneco do Etna', 1),
(48, 'Cocker Spaniel Americano', 1),
(49, 'Cocker Spaniel Inglês', 1),
(50, 'Collie', 1),
(51, 'Coton de Tuléar', 1),
(52, 'Dachshund', 1),
(53, 'Dálmata', 1),
(54, 'Dandie Dinmont Terrier', 1),
(55, 'Doberman', 1),
(56, 'Dogue Alemão', 1),
(57, 'Dogue Argentino', 1),
(58, 'Dogue Canário', 1),
(59, 'Dogue de Bordeaux', 1),
(60, 'Elkhound Norueguês', 1),
(61, 'Fila Brasileiro', 1),
(62, 'Fox Terrier (Pêlo Duro)', 1),
(63, 'Fox Terrier (Pêlo Liso)', 1),
(64, 'Foxhound Inglês', 1),
(65, 'Galgo Escocês', 1),
(66, 'Galgo Irlandês', 1),
(67, 'Golden Retriever', 1),
(68, 'Gos d’Atura', 1),
(69, 'Grande Boiadeiro Suiço', 1),
(70, 'Galgo Inglês', 1),
(71, 'Grifo da Bélgica', 1),
(72, 'Husky Siberiano', 1),
(73, 'Jack Russel Terrier', 1),
(74, 'King Charles', 1),
(75, 'Komondor', 1),
(76, 'Kuvasz(null, \', 1),', 1),
(77, 'Labradoodle', 1),
(78, 'Labrador Retriever', 1),
(79, 'Laika', 1),
(80, 'Lakeland Terrier', 1),
(81, 'Leonberger', 1),
(82, 'Lhasa Apso', 1),
(83, 'Malamute-do-Alasca', 1),
(84, 'Maltês', 1),
(85, 'Mastife', 1),
(86, 'Mastin dos Pirenéus', 1),
(87, 'Mastin do Tibete', 1),
(88, 'Mastin Espanhol', 1),
(89, 'Mastín Napolitano', 1),
(90, 'Norfolk Terrier', 1),
(91, 'Norwich Terrier', 1),
(92, 'Old English Sheepdog (Bobtail)', 1),
(93, 'Papillon', 1),
(94, 'Pastor Alemão', 1),
(95, 'Pastor Australiano', 1),
(96, 'Pastor Belga', 1),
(97, 'Pastor de Brie', 1),
(98, 'Pastor dos Pirenéus de Cara Rosa', 1),
(99, 'Pequeno Cão Leão', 1),
(100, 'Pequinês', 1),
(101, 'Perdigueiro', 1),
(102, 'Pinscher miniatura', 1),
(103, 'Pitbull', 1),
(104, 'Podengo', 1),
(105, 'Poodle', 1),
(106, 'Pointer', 1),
(107, 'Pug', 1),
(108, 'Rhodesian Ridgeback', 1),
(109, 'Rottweiler', 1),
(110, 'Rough Collie', 1),
(111, 'Sabueso Espanhol', 1),
(112, 'Sabueso Italiano', 1),
(113, 'Saluki', 1),
(114, 'Samoieda', 1),
(115, 'São Bernardo', 1),
(116, 'Sem Raça Definida (SRD)', 1),
(117, 'Scottish Terrier', 1),
(118, 'Setter Irlandés', 1),
(119, 'Shar-Pei', 1),
(120, 'Shiba Inu', 1),
(121, 'Shih Tzu', 1),
(122, 'SilKy Terrier', 1),
(123, 'Skye Terrier', 1),
(124, 'Smooth Collie', 1),
(125, 'Spitz Alemão', 1),
(126, 'Spitz Lobo', 1),
(127, 'Spitz Gigante', 1),
(128, 'Spitz Médio', 1),
(129, 'Spitz Pequeno', 1),
(130, 'Lulu da Pomerânia', 1),
(131, 'Staffordshire Bull Terrier', 1),
(132, 'Tamaskan', 1),
(133, 'Teckel', 1),
(134, 'Terra Nova', 1),
(135, 'Terrier Australiano', 1),
(136, 'Terrier Escocês', 1),
(137, 'Terrier Irlandês', 1),
(138, 'Terrier Japonês', 1),
(139, 'Terrier Negro Russo', 1),
(140, 'Terrier Norfolk', 1),
(141, 'Terrier Norwich', 1),
(142, 'Terrier Tibetano', 1),
(143, 'Tosa', 1),
(144, 'Weimaraner', 1),
(145, 'Welsh Corgi (Cardigan)', 1),
(146, 'Welsh Corgi (Pembroke)', 1),
(147, 'West Highland White Terrier', 1),
(148, 'Whippet', 1),
(149, 'Xoloitzcuintli', 1),
(150, 'Yorkshire Terrier', 1),
(151, 'Abissínio', 2),
(152, 'Angorá', 2),
(153, 'Ashera', 2),
(154, 'Balinês', 2),
(155, 'Bengal', 2),
(156, 'Bobtail americano', 2),
(157, 'Bobtail japonês', 2),
(158, 'Bombay', 2),
(159, 'Burmês', 2),
(160, 'Burmês vermelho', 2),
(161, 'Chartreux', 2),
(162, 'Colorpoint de Pêlo Curto', 2),
(163, 'Cornish Rex', 2),
(164, 'Curl Americano', 2),
(165, 'Devon Rex', 2),
(166, 'Himalaio', 2),
(167, 'Jaguatirica', 2),
(168, 'Javanês', 2),
(169, 'Korat', 2),
(170, 'LaPerm', 2),
(171, 'Maine Coon', 2),
(172, 'Manx', 2),
(173, 'Cymric', 2),
(174, 'Mau Egípcio', 2),
(175, 'Mist Australiano', 2),
(176, 'Munchkin', 2),
(177, 'Norueguês da Floresta', 2),
(178, 'Pelo curto americano', 2),
(179, 'Pelo curto brasileiro', 2),
(180, 'Pelo curto europeu', 2),
(181, 'Pelo curto inglês', 2),
(182, 'Persa', 2),
(183, 'Pixie-bob', 2),
(184, 'Ragdoll', 2),
(185, 'Ocicat', 2),
(186, 'Russo Azul', 2),
(187, 'Sagrado da Birmânia', 2),
(188, 'Savannah', 2),
(189, 'Scottish Fold', 2),
(190, 'Selkirk Rex', 2),
(191, 'Siamês', 2),
(192, 'Siberiano', 2),
(193, 'Singapura', 2),
(194, 'Somali', 2),
(195, 'Sphynx', 2),
(196, 'Thai', 2),
(197, 'Tonquinês', 2),
(198, 'Toyger', 2),
(199, 'Usuri', 2),
(200, 'Sem raça definida (SRD)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbregistroadocao`
--

CREATE TABLE `tbregistroadocao` (
  `idRegistroAdocao` int(11) NOT NULL,
  `statusRegistro` varchar(20) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbsexoanimal`
--

CREATE TABLE `tbsexoanimal` (
  `idSexoAnimal` int(11) NOT NULL,
  `sexoAnimal` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbsexoanimal`
--

INSERT INTO `tbsexoanimal` (`idSexoAnimal`, `sexoAnimal`) VALUES
(1, 'Macho'),
(2, 'Fêmea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`idAnimal`),
  ADD KEY `idSexoAnimal` (`idSexoAnimal`),
  ADD KEY `idEspecieAnimal` (`idEspecieAnimal`),
  ADD KEY `idRacaAnimal` (`idRacaAnimal`),
  ADD KEY `idPorteAnimal` (`idPorteAnimal`),
  ADD KEY `idOng` (`idOng`);

--
-- Indexes for table `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `tbespecieanimal`
--
ALTER TABLE `tbespecieanimal`
  ADD PRIMARY KEY (`idEspecieAnimal`);

--
-- Indexes for table `tbfotoanimal`
--
ALTER TABLE `tbfotoanimal`
  ADD PRIMARY KEY (`idFotoAnimal`);

--
-- Indexes for table `tbong`
--
ALTER TABLE `tbong`
  ADD PRIMARY KEY (`idOng`);

--
-- Indexes for table `tbporteanimal`
--
ALTER TABLE `tbporteanimal`
  ADD PRIMARY KEY (`idPorteAnimal`);

--
-- Indexes for table `tbracaanimal`
--
ALTER TABLE `tbracaanimal`
  ADD PRIMARY KEY (`idRacaAnimal`),
  ADD KEY `idEspecieAnimal` (`idEspecieAnimal`);

--
-- Indexes for table `tbregistroadocao`
--
ALTER TABLE `tbregistroadocao`
  ADD PRIMARY KEY (`idRegistroAdocao`),
  ADD KEY `fk_idAnimal` (`idAnimal`),
  ADD KEY `fk_idCliente` (`idCliente`);

--
-- Indexes for table `tbsexoanimal`
--
ALTER TABLE `tbsexoanimal`
  ADD PRIMARY KEY (`idSexoAnimal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbespecieanimal`
--
ALTER TABLE `tbespecieanimal`
  MODIFY `idEspecieAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbfotoanimal`
--
ALTER TABLE `tbfotoanimal`
  MODIFY `idFotoAnimal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbong`
--
ALTER TABLE `tbong`
  MODIFY `idOng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbporteanimal`
--
ALTER TABLE `tbporteanimal`
  MODIFY `idPorteAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbracaanimal`
--
ALTER TABLE `tbracaanimal`
  MODIFY `idRacaAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tbregistroadocao`
--
ALTER TABLE `tbregistroadocao`
  MODIFY `idRegistroAdocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbsexoanimal`
--
ALTER TABLE `tbsexoanimal`
  MODIFY `idSexoAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`idSexoAnimal`) REFERENCES `tbsexoanimal` (`idSexoAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`idEspecieAnimal`) REFERENCES `tbespecieanimal` (`idEspecieAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_3` FOREIGN KEY (`idRacaAnimal`) REFERENCES `tbracaanimal` (`idRacaAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_4` FOREIGN KEY (`idPorteAnimal`) REFERENCES `tbporteanimal` (`idPorteAnimal`),
  ADD CONSTRAINT `tbanimal_ibfk_5` FOREIGN KEY (`idOng`) REFERENCES `tbong` (`idOng`);

--
-- Constraints for table `tbracaanimal`
--
ALTER TABLE `tbracaanimal`
  ADD CONSTRAINT `tbracaanimal_ibfk_1` FOREIGN KEY (`idEspecieAnimal`) REFERENCES `tbespecieanimal` (`idEspecieAnimal`);

--
-- Constraints for table `tbregistroadocao`
--
ALTER TABLE `tbregistroadocao`
  ADD CONSTRAINT `tbregistroadocao_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`),
  ADD CONSTRAINT `tbregistroadocao_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `tbanimal` (`idAnimal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
