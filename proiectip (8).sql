-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 29, 2019 la 09:09 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiectip`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `alarma_detalii`
--

CREATE TABLE `alarma_detalii` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `detalii_alarma` varchar(255) NOT NULL,
  `timp_sesizare` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StatusAlarma` varchar(255) NOT NULL DEFAULT 'Nerezolvat',
  `dataRezolvare` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `alarma_detalii`
--

INSERT INTO `alarma_detalii` (`id`, `id_pacient`, `detalii_alarma`, `timp_sesizare`, `StatusAlarma`, `dataRezolvare`) VALUES
(1, 8, 'am reglat temperatura', '2019-05-28 11:01:49', 'Rezolvat', '2019-05-29 15:04:23'),
(2, 8, 'e prea umed', '2019-05-29 01:17:27', 'Rezolvat', '2019-05-29 15:04:25'),
(3, 8, 'are pulsu mare', '2019-05-29 01:17:55', 'Rezolvat', '2019-05-29 15:04:32'),
(4, 8, 'o uitat geamu deschis', '2019-05-29 10:40:58', 'Rezolvat', '2019-05-29 12:42:15'),
(5, 8, 'e prea umed', '2019-05-29 10:42:00', 'Rezolvat', '2019-05-29 15:02:26');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `alergii`
--

CREATE TABLE `alergii` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `tipAlergie` varchar(255) NOT NULL,
  `simptome` varchar(255) NOT NULL,
  `data_adaugarii` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `alergii`
--

INSERT INTO `alergii` (`id`, `id_pacient`, `tipAlergie`, `simptome`, `data_adaugarii`) VALUES
(1, 21, 'a', 'a', '2019-05-29 11:46:16'),
(2, 21, 't3', 's3', '2019-05-29 11:54:59');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `chat_medic_pacient`
--

CREATE TABLE `chat_medic_pacient` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `id_medic` int(11) NOT NULL,
  `mesaj` varchar(255) NOT NULL,
  `emitator` varchar(255) NOT NULL,
  `timp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `chat_supraveghetor_pacient`
--

CREATE TABLE `chat_supraveghetor_pacient` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `id_supraveghetor` int(11) NOT NULL,
  `mesaj` varchar(255) NOT NULL,
  `emitator` varchar(255) NOT NULL,
  `timp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `chat_supraveghetor_pacient`
--

INSERT INTO `chat_supraveghetor_pacient` (`id`, `id_pacient`, `id_supraveghetor`, `mesaj`, `emitator`, `timp`) VALUES
(27, 8, 4, 'asd', 'supraveghetor', '2019-05-28 11:56:56'),
(28, 8, 4, 'f', 'supraveghetor', '2019-05-28 11:57:00'),
(29, 8, 4, 's', 'supraveghetor', '2019-05-28 11:57:03'),
(30, 8, 4, 'asd', 'supraveghetor', '2019-05-28 15:38:32'),
(31, 8, 4, 'asf', 'supraveghetor', '2019-05-29 10:16:17'),
(32, 8, 4, 'dsa', 'supraveghetor', '2019-05-29 10:16:22'),
(33, 9, 22, 'asd', 'supraveghetor', '2019-05-29 12:43:19'),
(34, 8, 22, 'mesaj', 'supraveghetor', '2019-05-29 12:43:39'),
(35, 8, 22, 'mesaj', 'supraveghetor', '2019-05-29 18:43:52'),
(36, 8, 22, 'mesaj2', 'supraveghetor', '2019-05-29 18:44:03'),
(37, 8, 22, 'mesajpacient', 'pacient', '2019-05-29 18:45:28'),
(38, 8, 22, 'mesaj2pacient', 'pacient', '2019-05-29 18:46:12');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dateesp`
--

CREATE TABLE `dateesp` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `Puls` float NOT NULL,
  `Gaz` float NOT NULL,
  `Temperatura` float NOT NULL,
  `Umiditate` float NOT NULL,
  `Proximitate` tinyint(1) NOT NULL,
  `DataTimp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `dateesp`
--

INSERT INTO `dateesp` (`id`, `id_pacient`, `Puls`, `Gaz`, `Temperatura`, `Umiditate`, `Proximitate`, `DataTimp`) VALUES
(218, 8, 0, 0, 28, 53, 0, '2019-05-27 15:29:37'),
(219, 8, 0, 0, 28, 53, 0, '2019-05-27 15:29:47'),
(220, 8, 0, 0, 28, 53, 0, '2019-05-27 15:29:58'),
(221, 8, 220, 0, 39, 55, 1, '2019-05-27 15:30:08'),
(222, 8, 219, 0, 32, 58, 1, '2019-05-27 15:30:19'),
(223, 8, 219, 0, 33, 0, 0, '2019-05-27 15:30:30'),
(224, 8, 221, 0, 36, 0, 0, '2019-05-27 15:30:40'),
(225, 8, 222, 0, 31, 0, 0, '2019-05-27 15:30:51'),
(226, 8, 223, 0, 29, 0, 1, '2019-05-27 15:31:01'),
(227, 8, 223, 0, 30, 0, 1, '2019-05-27 15:31:12'),
(228, 8, 225, 0, 29, 0, 0, '2019-05-27 15:31:22'),
(229, 8, 227, 0, 30, 0, 0, '2019-05-27 15:31:33'),
(230, 8, 229, 0, 31, 49, 0, '2019-05-27 15:31:44'),
(231, 8, 230, 0, 31, 49, 0, '2019-05-27 15:31:54'),
(232, 8, 230, 0, 32, 50, 0, '2019-05-27 15:32:05'),
(233, 8, 232, 0, 29, 50, 1, '2019-05-27 15:32:15'),
(234, 8, 234, 0, 29, 50, 0, '2019-05-27 15:32:26'),
(235, 8, 234, 0, -7, 51, 0, '2019-05-27 15:32:37'),
(236, 8, 219, 0, 28, 0, 0, '2019-05-27 15:32:47'),
(237, 8, 218, 0, 33, 0, 0, '2019-05-27 15:32:58'),
(238, 8, 218, 0, 28, 51, 0, '2019-05-27 15:33:08'),
(239, 8, 215, 0, 28, 51, 0, '2019-05-27 15:33:19'),
(240, 8, 214, 0, 29, 0, 1, '2019-05-27 15:33:29'),
(241, 8, 214, 0, 34, 52, 1, '2019-05-27 15:33:40'),
(242, 8, 214, 0, 35, 52, 1, '2019-05-27 15:33:51'),
(243, 8, 214, 0, 28, 52, 0, '2019-05-27 15:34:01'),
(244, 8, 209, 0, 35, 52, 1, '2019-05-27 15:34:12'),
(245, 8, 209, 0, 28, 0, 0, '2019-05-27 15:34:22'),
(246, 8, 0, 0, 28, 52, 1, '2019-05-27 15:34:48'),
(247, 8, 0, 0, 28, 53, 0, '2019-05-27 15:34:59'),
(248, 8, 0, 0, 28, 53, 0, '2019-05-27 15:35:10'),
(249, 8, 0, 0, 28, 52, 0, '2019-05-27 15:35:20'),
(250, 8, 142, 0, 28, 0, 0, '2019-05-27 15:35:31'),
(251, 8, 145, 0, 28, 0, 1, '2019-05-27 15:35:41'),
(252, 8, 145, 0, 28, 53, 0, '2019-05-27 15:35:52'),
(253, 8, 151, 0, 28, 53, 0, '2019-05-27 15:36:03'),
(254, 8, 158, 0, 28, 0, 1, '2019-05-27 15:36:13'),
(255, 8, 165, 0, 36, 0, 0, '2019-05-27 15:36:24'),
(256, 8, 165, 0, 28, 53, 1, '2019-05-27 15:36:34'),
(257, 8, 173, 0, 28, 52, 0, '2019-05-27 15:36:45'),
(258, 8, 182, 0, 28, 52, 0, '2019-05-27 15:36:55'),
(259, 8, 192, 0, 28, 52, 0, '2019-05-27 15:37:06'),
(260, 8, 203, 0, 28, 52, 0, '2019-05-27 15:37:17'),
(261, 8, 203, 0, 28, 52, 0, '2019-05-27 15:37:27'),
(262, 8, 215, 0, 28, 0, 0, '2019-05-27 15:37:38'),
(263, 8, 229, 0, 28, 53, 0, '2019-05-27 15:37:49'),
(264, 8, 236, 0, 28, 0, 0, '2019-05-27 15:38:00'),
(265, 8, 236, 0, 28, 0, 1, '2019-05-27 15:38:13'),
(266, 8, 236, 0, 28, 52, 0, '2019-05-27 15:38:24'),
(267, 8, 236, 0, 28, 0, 0, '2019-05-27 15:38:35'),
(268, 8, 236, 0, 28, 52, 0, '2019-05-27 15:38:46'),
(269, 8, 234, 0, 28, 52, 0, '2019-05-27 15:38:57'),
(270, 8, 234, 0, 28, 52, 1, '2019-05-27 15:39:07'),
(271, 8, 234, 0, 28, 52, 1, '2019-05-27 15:39:18'),
(272, 8, 235, 0, 28, 0, 0, '2019-05-27 15:39:29'),
(273, 8, 234, 0, 28, 0, 0, '2019-05-27 15:39:40'),
(274, 8, 235, 0, 28, 0, 0, '2019-05-27 15:39:51'),
(275, 8, 235, 0, 28, 53, 0, '2019-05-27 15:40:01'),
(276, 8, 235, 0, 28, 52, 1, '2019-05-27 15:40:12'),
(277, 8, 235, 0, 28, 53, 1, '2019-05-27 15:40:23'),
(278, 8, 0, 0, 28, 53, 0, '2019-05-27 15:40:51'),
(279, 8, 0, 0, 28, 53, 0, '2019-05-27 15:41:01'),
(280, 8, 0, 0, 28, 53, 1, '2019-05-27 15:41:12'),
(281, 8, 0, 0, 28, 53, 0, '2019-05-27 15:41:23'),
(282, 8, 125, 0, 28, 53, 0, '2019-05-27 15:41:33'),
(283, 8, 125, 0, 28, 0, 0, '2019-05-27 15:41:44'),
(284, 8, 125, 0, 28, 53, 0, '2019-05-27 15:41:54'),
(285, 8, 121, 0, 28, 47, 0, '2019-05-27 15:42:05'),
(286, 8, 121, 0, 28, 0, 0, '2019-05-27 15:42:15'),
(287, 8, 121, 0, 28, 53, 1, '2019-05-27 15:42:26'),
(288, 8, 117, 0, 28, 53, 1, '2019-05-27 15:42:37'),
(289, 8, 117, 0, 36, 53, 0, '2019-05-27 15:42:47'),
(290, 8, 119, 0, 28, 53, 0, '2019-05-27 15:42:58'),
(291, 8, 119, 0, 36, 53, 0, '2019-05-27 15:43:09'),
(292, 8, 119, 0, 28, 53, 1, '2019-05-27 15:43:19'),
(293, 8, 119, 0, 28, 53, 0, '2019-05-27 15:43:30'),
(294, 8, 112, 0, 28, 53, 0, '2019-05-27 15:43:41'),
(295, 8, 112, 0, 28, 0, 0, '2019-05-27 15:43:51'),
(296, 8, 112, 0, 28, 53, 1, '2019-05-27 15:44:02'),
(297, 8, 112, 0, 36, 0, 1, '2019-05-27 15:44:12'),
(298, 8, 115, 0, 28, 54, 1, '2019-05-27 15:44:23'),
(299, 8, 115, 0, 37, 0, 0, '2019-05-27 15:44:33'),
(300, 8, 120, 0, 37, 54, 0, '2019-05-27 15:44:44'),
(301, 8, 126, 0, 28, 54, 0, '2019-05-27 15:44:55'),
(302, 8, 131, 0, 37, 0, 0, '2019-05-27 15:45:05'),
(303, 8, 131, 0, 28, 53, 0, '2019-05-27 15:45:16'),
(304, 8, 137, 0, 37, 53, 0, '2019-05-27 15:45:26'),
(305, 8, 151, 0, 37, 0, 0, '2019-05-27 15:45:37'),
(306, 8, 151, 0, 28, 53, 0, '2019-05-27 15:45:48'),
(307, 8, 160, 0, 28, 0, 0, '2019-05-27 15:45:58'),
(308, 8, 160, 0, 28, 53, 1, '2019-05-27 15:46:09'),
(309, 8, 156, 0, -7, 0, 1, '2019-05-27 15:46:19'),
(310, 8, 156, 0, 28, 0, 0, '2019-05-27 15:46:30'),
(311, 8, 156, 0, 28, 53, 0, '2019-05-27 15:46:40'),
(312, 8, 163, 0, 28, 0, 1, '2019-05-27 15:46:51'),
(313, 8, 163, 0, 28, 0, 1, '2019-05-27 15:47:02'),
(314, 8, 167, 0, 28, 53, 0, '2019-05-27 15:47:12'),
(315, 8, 167, 0, 28, 0, 0, '2019-05-27 15:47:23'),
(316, 8, 171, 0, 28, 22, 0, '2019-05-27 15:47:34'),
(317, 8, 171, 0, 28, 54, 0, '2019-05-27 15:47:44'),
(318, 8, 171, 0, 28, 53, 0, '2019-05-27 15:47:55'),
(319, 8, 171, 0, 28, 53, 0, '2019-05-27 15:48:05'),
(320, 8, 171, 0, 28, 53, 0, '2019-05-27 15:48:16'),
(321, 8, 148, 0, 28, 0, 0, '2019-05-27 15:48:27'),
(322, 8, 148, 0, 28, 53, 0, '2019-05-27 15:48:37'),
(323, 8, 142, 0, 37, 53, 0, '2019-05-27 15:48:48'),
(324, 8, 142, 0, 37, 53, 0, '2019-05-27 15:48:58'),
(325, 8, 142, 0, 28, 53, 0, '2019-05-27 15:49:09'),
(326, 8, 130, 0, 37, 53, 0, '2019-05-27 15:49:20'),
(327, 8, 130, 0, 28, 53, 1, '2019-05-27 15:49:30'),
(328, 8, 126, 0, 28, 53, 0, '2019-05-27 15:49:41'),
(329, 8, 126, 0, 28, 53, 0, '2019-05-27 15:49:51'),
(330, 8, 127, 0, 28, 0, 0, '2019-05-27 15:50:02'),
(331, 8, 127, 0, 28, 0, 0, '2019-05-27 15:50:13'),
(332, 8, 128, 0, 28, 0, 0, '2019-05-27 15:50:23'),
(333, 8, 128, 0, 27, 53, 0, '2019-05-27 15:50:34'),
(334, 8, 139, 0, 27, 0, 0, '2019-05-27 15:50:44'),
(335, 8, 139, 0, 27, 54, 0, '2019-05-27 15:50:55'),
(336, 8, 139, 0, 27, 54, 0, '2019-05-27 15:51:05'),
(337, 8, 139, 0, 27, 54, 0, '2019-05-27 15:51:16'),
(338, 8, 139, 0, 27, 54, 0, '2019-05-27 15:51:27'),
(339, 8, 139, 0, 27, 54, 0, '2019-05-27 15:51:37'),
(340, 8, 139, 0, 27, 54, 0, '2019-05-27 15:51:48'),
(341, 8, 114, 0, 27, 0, 0, '2019-05-27 15:51:58'),
(342, 8, 114, 0, 27, 54, 0, '2019-05-27 15:52:09'),
(343, 8, 114, 0, 27, 54, 0, '2019-05-27 15:52:20'),
(344, 8, 114, 0, 27, 54, 0, '2019-05-27 15:52:30'),
(345, 8, 114, 0, 27, 54, 0, '2019-05-27 15:52:41'),
(346, 8, 114, 0, 27, 54, 0, '2019-05-27 15:52:51'),
(347, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:02'),
(348, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:13'),
(349, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:23'),
(350, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:34'),
(351, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:44'),
(352, 8, 96, 0, 27, 54, 0, '2019-05-27 15:53:55'),
(353, 8, 96, 0, 27, 54, 0, '2019-05-27 15:54:06'),
(354, 8, 96, 0, 27, 54, 0, '2019-05-27 15:54:16'),
(355, 8, 78, 0, 27, 54, 0, '2019-05-27 15:54:27'),
(356, 8, 78, 0, 27, 54, 0, '2019-05-27 15:54:37'),
(357, 8, 78, 0, 27, 54, 0, '2019-05-27 15:54:48'),
(358, 8, 78, 0, 27, 54, 0, '2019-05-27 15:54:59'),
(359, 8, 78, 0, 27, 54, 0, '2019-05-27 15:55:10'),
(360, 8, 76, 0, 27, 0, 0, '2019-05-27 15:55:20'),
(361, 8, 76, 0, 27, 0, 0, '2019-05-27 15:55:31'),
(362, 8, 76, 0, 27, 54, 0, '2019-05-27 15:55:41'),
(363, 8, 76, 0, 27, 54, 0, '2019-05-27 15:55:52'),
(364, 8, 76, 0, 27, 54, 0, '2019-05-27 15:56:02'),
(365, 8, 76, 0, 27, 54, 0, '2019-05-27 15:56:13'),
(366, 8, 76, 0, 27, 54, 0, '2019-05-27 15:56:24'),
(367, 8, 67, 0, 37, 0, 0, '2019-05-27 15:56:34'),
(368, 8, 67, 0, 27, 0, 0, '2019-05-27 15:56:45'),
(369, 8, 67, 0, 27, 54, 1, '2019-05-27 15:56:55'),
(370, 8, 67, 0, 27, 54, 1, '2019-05-27 15:57:06'),
(371, 8, 66, 0, 37, 54, 1, '2019-05-27 15:57:17'),
(372, 8, 66, 0, 27, 54, 1, '2019-05-27 15:57:29'),
(373, 8, 66, 0, 27, 54, 0, '2019-05-27 15:57:40'),
(374, 8, 65, 0, 27, 54, 0, '2019-05-27 15:57:53'),
(375, 8, 65, 0, 37, 0, 0, '2019-05-27 15:58:03'),
(376, 8, 65, 0, 37, 54, 1, '2019-05-27 15:58:14'),
(377, 8, 66, 0, 27, 54, 1, '2019-05-27 15:58:25'),
(378, 8, 66, 0, 37, 0, 1, '2019-05-27 15:58:35'),
(379, 8, 66, 0, 27, 54, 1, '2019-05-27 15:58:46'),
(380, 8, 76, 0, -7, 0, 1, '2019-05-27 15:58:56'),
(381, 8, 86, 0, 27, 0, 0, '2019-05-27 15:59:07'),
(382, 8, 108, 0, 27, 54, 0, '2019-05-27 15:59:18'),
(383, 8, 108, 0, 38, 0, 0, '2019-05-27 15:59:28'),
(384, 8, 125, 0, 38, 54, 0, '2019-05-27 15:59:39'),
(385, 8, 163, 0, 27, 0, 1, '2019-05-27 15:59:49'),
(386, 8, 197, 0, 27, 55, 1, '2019-05-27 16:00:00'),
(387, 8, 197, 0, 27, 0, 0, '2019-05-27 16:00:11'),
(388, 8, 197, 0, 27, 54, 0, '2019-05-27 16:00:21'),
(389, 8, 197, 0, 27, 54, 0, '2019-05-27 16:00:32'),
(390, 8, 197, 0, 27, 54, 0, '2019-05-27 16:00:42'),
(391, 8, 197, 0, 27, 54, 0, '2019-05-27 16:00:53'),
(392, 8, 197, 0, 27, 54, 0, '2019-05-27 16:01:04'),
(393, 8, 197, 0, 27, 54, 0, '2019-05-27 16:01:14'),
(394, 8, 197, 0, 27, 55, 0, '2019-05-27 16:01:25'),
(395, 8, 197, 0, 27, 55, 0, '2019-05-27 16:01:35'),
(396, 8, 197, 0, 27, 55, 0, '2019-05-27 16:01:46'),
(397, 8, 197, 0, 27, 55, 0, '2019-05-27 16:01:57'),
(398, 8, 197, 0, 27, 55, 0, '2019-05-27 16:02:07'),
(399, 8, 0, 0, 27, 55, 0, '2019-05-27 16:02:18'),
(400, 8, 0, 0, 27, 55, 0, '2019-05-27 16:02:28'),
(401, 8, 0, 0, 27, 55, 0, '2019-05-27 16:02:39'),
(402, 8, 0, 0, 27, 55, 0, '2019-05-27 16:02:50'),
(403, 8, 135, 0, -7, 0, 0, '2019-05-27 16:03:00'),
(404, 8, 141, 0, 27, 0, 0, '2019-05-27 16:03:11'),
(405, 8, 146, 0, 27, 55, 0, '2019-05-27 16:03:21'),
(406, 8, 146, 0, 39, 55, 0, '2019-05-27 16:03:32'),
(407, 8, 153, 0, 27, 55, 0, '2019-05-27 16:03:43'),
(408, 8, 153, 0, 27, 55, 0, '2019-05-27 16:03:53'),
(409, 8, 153, 0, 27, 55, 0, '2019-05-27 16:04:04'),
(410, 8, 153, 0, 27, 55, 0, '2019-05-27 16:04:14'),
(411, 8, 153, 0, 27, 55, 0, '2019-05-27 16:04:25'),
(412, 8, 132, 0, -7, 0, 0, '2019-05-27 16:04:36'),
(413, 8, 132, 0, 27, 55, 0, '2019-05-27 16:04:46'),
(414, 8, 132, 0, 27, 55, 0, '2019-05-27 16:04:57'),
(415, 8, 132, 0, 27, 55, 0, '2019-05-27 16:05:07'),
(416, 8, 132, 0, 27, 55, 0, '2019-05-27 16:05:18'),
(417, 8, 132, 0, 27, 55, 0, '2019-05-27 16:05:29'),
(418, 8, 132, 0, 27, 55, 0, '2019-05-27 16:05:39'),
(419, 8, 132, 0, 27, 55, 0, '2019-05-27 16:05:50'),
(420, 8, 132, 0, 27, 55, 0, '2019-05-27 16:06:00'),
(421, 8, 132, 0, 27, 55, 0, '2019-05-27 16:06:11'),
(422, 8, 132, 0, 27, 55, 0, '2019-05-27 16:06:22'),
(423, 8, 132, 0, 27, 55, 0, '2019-05-27 16:06:32'),
(424, 8, 0, 0, 27, 55, 0, '2019-05-27 16:06:43'),
(425, 8, 0, 0, 27, 55, 0, '2019-05-27 16:06:54'),
(426, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:04'),
(427, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:15'),
(428, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:25'),
(429, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:36'),
(430, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:47'),
(431, 8, 0, 0, 27, 55, 0, '2019-05-27 16:07:57'),
(432, 8, 0, 0, 27, 55, 0, '2019-05-27 16:08:08'),
(433, 8, 0, 0, 27, 55, 0, '2019-05-27 16:08:18'),
(434, 8, 0, 0, 27, 55, 0, '2019-05-27 16:08:29'),
(435, 8, 0, 0, 27, 55, 0, '2019-05-27 16:08:40'),
(436, 8, 0, 0, 27, 55, 0, '2019-05-27 16:08:50'),
(437, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:01'),
(438, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:11'),
(439, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:22'),
(440, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:33'),
(441, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:43'),
(442, 8, 0, 0, 27, 55, 0, '2019-05-27 16:09:54'),
(443, 8, 0, 0, 27, 55, 0, '2019-05-27 16:10:04'),
(444, 8, 0, 0, 27, 55, 0, '2019-05-27 16:10:15'),
(445, 8, 0, 0, 27, 55, 0, '2019-05-27 16:10:26'),
(446, 8, 54, 0, 40, 0, 0, '2019-05-27 16:10:36'),
(447, 8, 54, 0, 27, 0, 0, '2019-05-27 16:10:47'),
(448, 8, 54, 0, 27, 55, 0, '2019-05-27 16:10:58'),
(449, 8, 56, 0, 27, 56, 0, '2019-05-27 16:11:08'),
(450, 8, 56, 0, 27, 56, 0, '2019-05-27 16:11:19'),
(451, 8, 56, 0, 27, 56, 0, '2019-05-27 16:11:29'),
(452, 8, 59, 0, 27, 56, 0, '2019-05-27 16:11:40'),
(453, 8, 59, 0, 40, 56, 0, '2019-05-27 16:11:51'),
(454, 8, 64, 0, 40, 0, 0, '2019-05-27 16:12:01'),
(455, 8, 71, 0, 27, 0, 0, '2019-05-27 16:12:12'),
(456, 8, 79, 0, 27, 0, 0, '2019-05-27 16:12:22'),
(457, 8, 89, 0, 27, 56, 0, '2019-05-27 16:12:33'),
(458, 8, 89, 0, 27, 56, 0, '2019-05-27 16:12:43'),
(459, 8, 102, 0, 27, 55, 0, '2019-05-27 16:12:54'),
(460, 8, 120, 0, 27, 55, 0, '2019-05-27 16:13:04'),
(461, 8, 144, 0, 27, 0, 0, '2019-05-27 16:13:15'),
(462, 8, 180, 0, -7, 0, 0, '2019-05-27 16:13:26'),
(463, 8, 180, 0, -7, 56, 0, '2019-05-27 16:13:36'),
(464, 8, 206, 0, 40, 56, 0, '2019-05-27 16:13:47'),
(465, 8, 227, 0, 27, 0, 0, '2019-05-27 16:13:57'),
(466, 8, 232, 0, 27, 0, 0, '2019-05-27 16:14:08'),
(467, 8, 232, 0, 27, 56, 0, '2019-05-27 16:14:18'),
(468, 8, 225, 0, 27, 56, 0, '2019-05-27 16:14:29'),
(469, 8, 225, 0, 40, -6, 0, '2019-05-27 16:14:40'),
(470, 8, 225, 0, 27, 0, 0, '2019-05-27 16:14:50'),
(471, 8, 225, 0, 40, 56, 0, '2019-05-27 16:15:01'),
(472, 8, 225, 0, 27, 56, 0, '2019-05-27 16:15:11'),
(473, 8, 225, 0, 40, 56, 0, '2019-05-27 16:15:22'),
(474, 8, 225, 0, 27, 0, 0, '2019-05-27 16:15:32'),
(475, 8, 227, 0, 27, 46, 0, '2019-05-27 16:15:43'),
(476, 8, 227, 0, 27, 0, 0, '2019-05-27 16:15:54'),
(477, 8, 226, 0, 27, 56, 0, '2019-05-27 16:16:04'),
(478, 8, 226, 0, 27, 55, 0, '2019-05-27 16:16:15'),
(479, 8, 229, 0, 27, 0, 0, '2019-05-27 16:16:25'),
(480, 8, 237, 0, 40, 56, 0, '2019-05-27 16:16:36'),
(481, 8, 237, 0, 27, 55, 0, '2019-05-27 16:16:46'),
(482, 8, 237, 0, 27, 0, 0, '2019-05-27 16:16:57'),
(483, 8, 237, 0, 40, 0, 0, '2019-05-27 16:17:08'),
(484, 8, 237, 0, 27, 0, 0, '2019-05-27 16:17:18'),
(485, 8, 237, 0, 27, 56, 0, '2019-05-27 16:17:29'),
(486, 8, 237, 0, 27, 56, 0, '2019-05-27 16:17:39'),
(487, 8, 236, 0, 27, 56, 0, '2019-05-27 16:17:50'),
(488, 8, 236, 0, 27, 56, 0, '2019-05-27 16:18:00'),
(489, 8, 236, 0, 27, 56, 0, '2019-05-27 16:18:11'),
(490, 8, 236, 0, 27, 56, 0, '2019-05-27 16:18:22'),
(491, 8, 236, 0, 27, 56, 0, '2019-05-27 16:18:32'),
(492, 8, 236, 0, 27, 56, 0, '2019-05-27 16:18:43'),
(493, 8, 236, 0, 27, 55, 0, '2019-05-27 16:18:53'),
(494, 8, 236, 0, 27, 55, 0, '2019-05-27 16:19:04'),
(495, 8, 0, 0, 26, 57, 0, '2019-05-27 16:27:22'),
(496, 8, 0, 0, 26, 57, 0, '2019-05-27 16:27:32'),
(497, 8, 0, 0, 26, 57, 0, '2019-05-27 16:27:43'),
(498, 8, 0, 0, 26, 57, 0, '2019-05-27 16:27:54'),
(499, 8, 0, 0, 26, 58, 0, '2019-05-27 16:28:04'),
(500, 8, 0, 0, 26, 58, 0, '2019-05-27 16:28:15'),
(501, 8, 0, 0, 26, 58, 0, '2019-05-27 16:28:25'),
(502, 8, 0, 0, 26, 58, 0, '2019-05-27 16:28:36'),
(503, 8, 0, 0, 26, 58, 0, '2019-05-27 16:28:47');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `ingrijitor_pacient`
--

CREATE TABLE `ingrijitor_pacient` (
  `id` int(11) NOT NULL,
  `id_ingrijitor` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `ingrijitor_pacient`
--

INSERT INTO `ingrijitor_pacient` (`id`, `id_ingrijitor`, `id_pacient`) VALUES
(1, 16, 8),
(2, 16, 8),
(3, 16, 9),
(4, 23, 8),
(5, 23, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `medic_pacient`
--

CREATE TABLE `medic_pacient` (
  `id` int(11) NOT NULL,
  `id_medic` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `medic_pacient`
--

INSERT INTO `medic_pacient` (`id`, `id_medic`, `id_pacient`) VALUES
(1, 17, 8),
(2, 17, 18),
(5, 17, 21);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `pacient_valori_senzori`
--

CREATE TABLE `pacient_valori_senzori` (
  `id_pacient` int(11) NOT NULL,
  `min_temperatura` int(11) NOT NULL DEFAULT '0',
  `max_temperatura` int(11) NOT NULL DEFAULT '40',
  `min_umiditate` int(11) NOT NULL DEFAULT '10',
  `max_umiditate` int(11) NOT NULL DEFAULT '70',
  `min_puls` int(11) NOT NULL DEFAULT '35',
  `max_puls` int(11) NOT NULL DEFAULT '200'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `pacient_valori_senzori`
--

INSERT INTO `pacient_valori_senzori` (`id_pacient`, `min_temperatura`, `max_temperatura`, `min_umiditate`, `max_umiditate`, `min_puls`, `max_puls`) VALUES
(8, 0, 0, 0, 0, 0, 1),
(18, 0, 40, 10, 70, 35, 200),
(21, 0, 40, 10, 70, 35, 200);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `parametrifiziologici`
--

CREATE TABLE `parametrifiziologici` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `Sistolic` float NOT NULL,
  `Diastolic` float NOT NULL,
  `Temperatura` float NOT NULL,
  `Glicemie` float NOT NULL,
  `Greutate` float NOT NULL,
  `dataInregistrarii` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `parametrifiziologici`
--

INSERT INTO `parametrifiziologici` (`id`, `id_pacient`, `Sistolic`, `Diastolic`, `Temperatura`, `Glicemie`, `Greutate`, `dataInregistrarii`) VALUES
(1, 8, 1, 2, 3, 4, 5, '2019-05-29 00:23:08'),
(2, 8, 6, 7, 8, 9, 10, '2019-05-29 00:30:17'),
(3, 21, 23, 23, 23, 23, 23, '2019-05-29 11:56:34'),
(4, 8, 2, 3, 4, 5, 6, '2019-05-29 13:06:51');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `schememedicatie`
--

CREATE TABLE `schememedicatie` (
  `id` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `schemaMedicatie` varchar(255) NOT NULL,
  `tratament` varchar(255) NOT NULL,
  `dataInregistrarii` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `schememedicatie`
--

INSERT INTO `schememedicatie` (`id`, `id_pacient`, `schemaMedicatie`, `tratament`, `dataInregistrarii`) VALUES
(5, 1, 'schema', 'tratament', '2019-05-09 13:06:08'),
(6, 9, 'schema1', 'tratament2', '2019-05-29 01:44:22'),
(7, 21, 'schema', 't', '2019-05-29 11:36:52'),
(8, 21, '1', '1', '2019-05-29 11:37:45'),
(9, 8, 'schema', 'tratament', '2019-05-29 18:29:27');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `supraveghetor_pacient`
--

CREATE TABLE `supraveghetor_pacient` (
  `id` int(11) NOT NULL,
  `id_supraveghetor` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `supraveghetor_pacient`
--

INSERT INTO `supraveghetor_pacient` (`id`, `id_supraveghetor`, `id_pacient`) VALUES
(1, 4, 8),
(2, 22, 8),
(3, 22, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizator`
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
-- Eliminarea datelor din tabel `utilizator`
--

INSERT INTO `utilizator` (`id`, `utilizator`, `parola`, `tip`, `nume`, `prenume`, `cnp`, `data_nasterii`, `sex`, `adresa`, `telefon`, `email`, `profesie`, `loc_munca`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin', 'admin', '1970611160031', '2019-05-08', 'masculin', 'adresa', '076', 'email', '', ''),
(3, 'medicu', 'medicp', 'medic', 'medicnume', 'medicprenume', 'mediccnp', '2019-05-14', 'feminin', 'adr', '123', 'asd@yahoo.com', '', ''),
(4, 's1', 's1', 'supraveghetor', 's1n', 's1p', '123', '2019-05-08', 'masculin', 'adrs', '1244', 'supra@yahoo.com', '', ''),
(8, 'pacient', '09d5f9e9c9c25dbbd44296a779f2219b', 'pacient', 's', 's', 's', '2019-05-08', 'masculin', 's', 's', 's', 's', 's'),
(9, 'p1', '8287458823facb8ff918dbfabcd22ccb', 'pacient', 'n', 'p', '123', '2019-05-21', 'masculin', 'romania dolj filiasi  bloc k5 ', '123', 'asd@yahoo.com', 'profesie', 'scoala vietii'),
(14, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'medic', '1', '1', '1', '2019-05-22', '1', '1 1 1  1', '1', '1', '1', '1'),
(16, 'ingrijitorusername', '8287458823facb8ff918dbfabcd22ccb', 'ingrijitor', 'ingrijitorn', 'ingrijitorp', '321', '2019-05-27', 'Masculin', 'tara judet oras  stradaNumar', '123', 'asd@yahoo.com', 'profesie', 'locMunca'),
(17, 'medic', '0d20326e6155cae6bb2b510bfc2cc01e', 'medic', 'n', 'p', '123', '2019-05-08', 'Masculin', 'r d o  s', '123', 'asd@yahoo.com', 'p', 'l'),
(18, 'p', '83878c91171338902e0fe0fb97a8c47a', 'pacient', 'p', 'p', '123', '2019-05-09', 'asd', 'd dd d  d', 'p', 'asd', 'd', 'd'),
(21, '12', 'c81e728d9d4c2f636f067f89cc14862c', 'pacient', '12', '2', '2', '2019-02-05', '2', '2222', '2', '2', '2', '2'),
(22, 'supraveghetor', '3125da50e2c25bc13ed3a0ab1303feae', 'supraveghetor', '1', '2', '4', '2019-05-15', '5', '7 8 9  1', '3', '6', '2', '3'),
(23, 'ingrijitor', 'f1ddc36b40cd542d647526238c4facc5', 'ingrijitor', '1', '2', '4', '2019-05-15', '5', '7 8 9  1', '3', '6', '2', '3');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `alarma_detalii`
--
ALTER TABLE `alarma_detalii`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `alergii`
--
ALTER TABLE `alergii`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `chat_medic_pacient`
--
ALTER TABLE `chat_medic_pacient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `chat_supraveghetor_pacient`
--
ALTER TABLE `chat_supraveghetor_pacient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `dateesp`
--
ALTER TABLE `dateesp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `ingrijitor_pacient`
--
ALTER TABLE `ingrijitor_pacient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `medic_pacient`
--
ALTER TABLE `medic_pacient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `pacient_valori_senzori`
--
ALTER TABLE `pacient_valori_senzori`
  ADD PRIMARY KEY (`id_pacient`);

--
-- Indexuri pentru tabele `parametrifiziologici`
--
ALTER TABLE `parametrifiziologici`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `schememedicatie`
--
ALTER TABLE `schememedicatie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `supraveghetor_pacient`
--
ALTER TABLE `supraveghetor_pacient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexuri pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `alarma_detalii`
--
ALTER TABLE `alarma_detalii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `alergii`
--
ALTER TABLE `alergii`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `chat_medic_pacient`
--
ALTER TABLE `chat_medic_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `chat_supraveghetor_pacient`
--
ALTER TABLE `chat_supraveghetor_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pentru tabele `dateesp`
--
ALTER TABLE `dateesp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;

--
-- AUTO_INCREMENT pentru tabele `ingrijitor_pacient`
--
ALTER TABLE `ingrijitor_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `medic_pacient`
--
ALTER TABLE `medic_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `parametrifiziologici`
--
ALTER TABLE `parametrifiziologici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `schememedicatie`
--
ALTER TABLE `schememedicatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `supraveghetor_pacient`
--
ALTER TABLE `supraveghetor_pacient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `alarma_detalii`
--
ALTER TABLE `alarma_detalii`
  ADD CONSTRAINT `alarma_detalii_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `alergii`
--
ALTER TABLE `alergii`
  ADD CONSTRAINT `alergii_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `chat_medic_pacient`
--
ALTER TABLE `chat_medic_pacient`
  ADD CONSTRAINT `chat_medic_pacient_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `chat_supraveghetor_pacient`
--
ALTER TABLE `chat_supraveghetor_pacient`
  ADD CONSTRAINT `chat_supraveghetor_pacient_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `dateesp`
--
ALTER TABLE `dateesp`
  ADD CONSTRAINT `dateesp_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `ingrijitor_pacient`
--
ALTER TABLE `ingrijitor_pacient`
  ADD CONSTRAINT `ingrijitor_pacient_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `medic_pacient`
--
ALTER TABLE `medic_pacient`
  ADD CONSTRAINT `medic_pacient_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `pacient_valori_senzori`
--
ALTER TABLE `pacient_valori_senzori`
  ADD CONSTRAINT `pacient_valori_senzori_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `parametrifiziologici`
--
ALTER TABLE `parametrifiziologici`
  ADD CONSTRAINT `parametrifiziologici_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `schememedicatie`
--
ALTER TABLE `schememedicatie`
  ADD CONSTRAINT `schememedicatie_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `supraveghetor_pacient`
--
ALTER TABLE `supraveghetor_pacient`
  ADD CONSTRAINT `supraveghetor_pacient_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `utilizator` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
