-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 12:26 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectip-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alarma_detalii`
--

CREATE TABLE `alarma_detalii` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `detalii_alarma` varchar(255) NOT NULL,
  `timp_sesizare` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alarma_detalii`
--

INSERT INTO `alarma_detalii` (`id`, `id_pacient`, `detalii_alarma`, `timp_sesizare`) VALUES
(2, 15, 'dada', '2019-05-25 21:49:54'),
(3, 0, 'tetet', '2019-05-25 21:52:17'),
(4, 15, 'teteyyyy', '2019-05-25 21:52:30'),
(5, 15, 'b', '2019-05-25 21:52:49'),
(6, 2, 'df', '2019-05-25 22:06:18'),
(7, 15, 'Temperatura mare', '2019-05-26 20:16:14'),
(8, 2, 'fsfs', '2019-05-26 20:33:27'),
(9, 8, 'gsdgsdg', '2019-05-27 11:13:25'),
(10, 8, 'hsdhsdhdhdshds', '2019-05-27 11:14:52'),
(11, 8, 'hello', '2019-05-27 11:16:41'),
(12, 8, 'hi hu', '2019-05-27 11:25:06'),
(13, 8, 'a', '2019-05-27 11:30:20'),
(14, 8, 'hadhasdsa', '2019-05-27 11:31:30'),
(15, 8, 'a', '2019-05-27 11:35:23'),
(16, 8, 'alo', '2019-05-27 11:40:11'),
(17, 8, 'a', '2019-05-27 11:42:15'),
(18, 8, 'gaz', '2019-05-27 11:44:12'),
(19, 8, 'a', '2019-05-27 12:02:55'),
(20, 8, 'a', '2019-05-27 12:05:30'),
(21, 8, 'f', '2019-05-27 12:06:13'),
(22, 8, 'k', '2019-05-27 12:07:11'),
(23, 8, 'd', '2019-05-27 12:08:46'),
(24, 8, 'd', '2019-05-27 12:10:06'),
(25, 8, 'k', '2019-05-27 17:45:01'),
(26, 8, '', '2019-05-27 18:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `alergii`
--

CREATE TABLE `alergii` (
  `id` int(11) NOT NULL,
  `id_medic` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `tipAlergie` varchar(255) NOT NULL,
  `simptome` varchar(255) NOT NULL,
  `data_adaugarii` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alergii`
--

INSERT INTO `alergii` (`id`, `id_medic`, `id_pacient`, `tipAlergie`, `simptome`, `data_adaugarii`) VALUES
(1, 1, 1, 'tip', 'sim[ptome', '2019-05-09 13:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `chat_supraveghetor_pacient`
--

CREATE TABLE `chat_supraveghetor_pacient` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `id_supraveghetor` int(11) NOT NULL,
  `mesaj` varchar(255) NOT NULL,
  `emitator` varchar(255) NOT NULL,
  `timp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_supraveghetor_pacient`
--

INSERT INTO `chat_supraveghetor_pacient` (`id`, `id_pacient`, `id_supraveghetor`, `mesaj`, `emitator`, `timp`) VALUES
(4, 8, 4, 'hello', 'pacient', '2019-05-27 21:47:38'),
(10, 8, 4, 'hello', 'pacient', '2019-05-27 21:47:58'),
(12, 8, 4, 'dada', 'supraveghetor', '2019-05-27 21:46:29'),
(13, 8, 4, 'dada', 'supraveghetor', '2019-05-27 21:46:32'),
(14, 8, 4, 'dada', 'supraveghetor', '2019-05-27 21:46:34'),
(16, 8, 4, 'Salut', 'pacient', '2019-05-27 21:48:52'),
(26, 8, 4, 'affaf', 'supraveghetor', '2019-05-27 22:11:18'),
(27, 8, 4, 'dada', 'supraveghetor', '2019-05-27 22:11:20'),
(28, 8, 4, 'daada', 'supraveghetor', '2019-05-27 22:11:21'),
(29, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:23'),
(30, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:24'),
(31, 8, 4, 'dadad', 'supraveghetor', '2019-05-27 22:11:26'),
(32, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:28'),
(33, 8, 4, 'dada', 'supraveghetor', '2019-05-27 22:11:30'),
(34, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:32'),
(35, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:33'),
(36, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:35'),
(37, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:37'),
(38, 8, 4, 'dadada', 'supraveghetor', '2019-05-27 22:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `dateesp`
--

CREATE TABLE `dateesp` (
  `id` int(11) NOT NULL,
  `Puls` float NOT NULL,
  `Gaz` float NOT NULL,
  `Temperatura` float NOT NULL,
  `Umiditate` float NOT NULL,
  `Proximitate` tinyint(1) NOT NULL,
  `DataTimp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dateesp`
--

INSERT INTO `dateesp` (`id`, `Puls`, `Gaz`, `Temperatura`, `Umiditate`, `Proximitate`, `DataTimp`) VALUES
(1, 2, 2, 2, 2, 0, '2019-04-29 17:55:11'),
(2, 4, 4, 4, 4, 1, '2019-04-29 18:19:05'),
(1, 4, 4, 4, 4, 1, '2019-04-29 18:23:08'),
(2, 7, 7, 7, 7, 0, '2019-04-29 18:26:30'),
(2, 3, 4, 5, 6, 1, '2019-05-08 14:11:34'),
(15, 5, 6, 7, 8, 0, '2019-05-08 14:31:00'),
(15, 100, 1, 30, 40, 1, '2019-05-24 19:55:04'),
(10, 100, 1, 30, 40, 1, '2019-05-24 19:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `ingrijitor`
--

CREATE TABLE `ingrijitor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `numePrenume` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingrijitor`
--

INSERT INTO `ingrijitor` (`id`, `username`, `parola`, `numePrenume`) VALUES
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b', '2');

-- --------------------------------------------------------

--
-- Table structure for table `medic`
--

CREATE TABLE `medic` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medic`
--

INSERT INTO `medic` (`id`, `nume`, `prenume`, `username`, `parola`, `telefon`) VALUES
(1, 'nume1', 'prenume1', 'user1', '8287458823facb8ff918dbfabcd22ccb', '1170123123'),
(2, '1', '1', '2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `schememedicatie`
--

CREATE TABLE `schememedicatie` (
  `id` int(11) NOT NULL,
  `id_medic` int(13) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `schemaMedicatie` varchar(255) NOT NULL,
  `tratament` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schememedicatie`
--

INSERT INTO `schememedicatie` (`id`, `id_medic`, `id_pacient`, `schemaMedicatie`, `tratament`, `data`) VALUES
(5, 1, 1, 'schema', 'tratament', '2019-05-09 13:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `supraveghetor`
--

CREATE TABLE `supraveghetor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `numePrenume` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supraveghetor`
--

INSERT INTO `supraveghetor` (`id`, `username`, `parola`, `numePrenume`) VALUES
(2, 'user', '5f4dcc3b5aa765d61d8327deb882cf99', 'numeprenume1'),
(3, 'user1', '8287458823facb8ff918dbfabcd22ccb', 'numeprenume1'),
(4, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(5, 'alin', '8df03bca3f48d310f74fe6092af08c95', 'Alin Popescu');

-- --------------------------------------------------------

--
-- Table structure for table `supraveghetor_pacient`
--

CREATE TABLE `supraveghetor_pacient` (
  `id` int(11) NOT NULL,
  `id_supraveghetor` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supraveghetor_pacient`
--

INSERT INTO `supraveghetor_pacient` (`id`, `id_supraveghetor`, `id_pacient`) VALUES
(1, 4, 2),
(2, 4, 3),
(3, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `utilizator`
--

CREATE TABLE `utilizator` (
  `id` int(11) NOT NULL,
  `utilizator` varchar(255) NOT NULL,
  `parola` varchar(255) NOT NULL,
  `tip` varchar(30) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `cnp` varchar(20) NOT NULL,
  `data_nasterii` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `telefon` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profesie` varchar(255) NOT NULL,
  `loc_munca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizator`
--

INSERT INTO `utilizator` (`id`, `utilizator`, `parola`, `tip`, `nume`, `prenume`, `cnp`, `data_nasterii`, `sex`, `adresa`, `telefon`, `email`, `profesie`, `loc_munca`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin', 'admin', '1970611160031', '2019-05-08', 'masculin', 'adresa', '076', 'email', '', ''),
(2, 'utilizator', 'parola', 'pacient', 'nume', 'preunme', '186', '2016-08-19', 'masculin', 'adr', '3', '3', '', ''),
(4, 'supraveghetor', '3125da50e2c25bc13ed3a0ab1303feae', 'supraveghetor', 'Musk', 'Elon', '1232435535333123', '1987-12-08', 'masculin', 'Canada', '0785464642345', 'elonTask@yahoo.com', '', ''),
(8, 'pacient2', '3ef67192a114c70536603411eab3353b', 'pacient', 'Andrei', 'Pacientul', '1214224242', '1954-07-23', 'masculin', 'Ro TM Timisoara  234', '0806867', 'andrei_pacient@yahoo.com', 'Contabil', 'Pensionar'),
(11, 'a', '0cc175b9c0f1b6a831c399e269772661', 'pacient', 'a', 'a', 'a', '2019-06-13', 'a', 'a a a  a', 'a', 'a', 'a', 'a'),
(12, 'medic1', '6dc2efc65da042fc9b49c34bc0908393', 'medic', 'Ion', 'Popescu', '12314252525', '1985-08-22', 'Masculin', 'Romania Arad Arad  Strada Mare', '076868675', 'ion_popescu@gmail.com', 'Medic', 'Spitalul Clinic de Urgenta'),
(13, 'supraveghetor2', '11724557bdbe6b44e3a890f1554fd636', 'supraveghetor', 'Ana', 'Blandiana', '4353536363', '1981-10-05', 'feminin', 'Romania Bihor Oradea  Str Kay 2', '42525', 'ana_blanidana_08@yahoo.com', 'Asistenta', 'Spitatul Judetean'),
(14, 'ingrijitor1', 'ffb11d8aa4882adcea4ee3fdd4f4f6bc', 'ingrijitor', 'Mugurel', 'Bombonel', '12141525252', '1997-06-11', 'masculin', 'Romania Dolj Filiasi  Strada foamei', '07565353', 'mugurel_dinamo@yahoo.com', 'Liber profesionist', 'Ingrijitor batrani'),
(16, 'stelica', '1502cae32df4bd9600e04f5f55963e93', 'medic', 'stelica', 'stelica', 'wfw', '2019-07-31', 'fsfs', 'fsfs fsf fsf  fsf', 'iphone', 'fsfs', 'supraveghetor e', ''),
(17, 'stelica', '1502cae32df4bd9600e04f5f55963e93', 'medic', 'stelica', 'stelica', 'wfw', '2019-07-31', 'fsfs', 'fsfs fsf fsf  fsf', 'iphone', 'fsfs', 'supraveghetor e', ''),
(18, 'stelica', '1502cae32df4bd9600e04f5f55963e93', 'medic', 'stelica', 'stelica', 'wfw', '2019-07-31', 'fsfs', 'fsfs fsf fsf  fsf', 'iphone', 'fsfs', 'supraveghetor e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alarma_detalii`
--
ALTER TABLE `alarma_detalii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alergii`
--
ALTER TABLE `alergii`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_supraveghetor_pacient`
--
ALTER TABLE `chat_supraveghetor_pacient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateesp`
--
ALTER TABLE `dateesp`
  ADD PRIMARY KEY (`DataTimp`),
  ADD KEY `DataTimp` (`DataTimp`);

--
-- Indexes for table `ingrijitor`
--
ALTER TABLE `ingrijitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medic`
--
ALTER TABLE `medic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schememedicatie`
--
ALTER TABLE `schememedicatie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supraveghetor`
--
ALTER TABLE `supraveghetor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alarma_detalii`
--
ALTER TABLE `alarma_detalii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `alergii`
--
ALTER TABLE `alergii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_supraveghetor_pacient`
--
ALTER TABLE `chat_supraveghetor_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ingrijitor`
--
ALTER TABLE `ingrijitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medic`
--
ALTER TABLE `medic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schememedicatie`
--
ALTER TABLE `schememedicatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supraveghetor`
--
ALTER TABLE `supraveghetor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
