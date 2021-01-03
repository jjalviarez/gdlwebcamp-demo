-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2020 at 12:33 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`) VALUES
(1, 'Seminario', 'fa-university'),
(2, 'Conferencias', 'fa-comments'),
(3, 'Talleres', 'fa-code');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`) VALUES
(2, 'Responsive Web Design', '2019-05-25', '10:00:00', 3, 1, 'taller_01'),
(3, 'Flexbox', '2019-05-25', '12:00:00', 3, 2, 'taller_02'),
(4, 'HTML5 y CSS3', '2019-05-25', '14:00:00', 3, 3, 'taller_03'),
(5, 'Drupal', '2019-05-25', '17:00:00', 3, 4, 'taller_04'),
(6, 'WordPress', '2019-05-25', '19:00:00', 3, 5, 'taller_05'),
(7, 'Como ser freelancer', '2019-05-25', '10:00:00', 2, 6, 'conf_01'),
(8, 'Tecnologías del Futuro', '2019-05-25', '17:00:00', 2, 1, 'conf_02'),
(9, 'Seguridad en la Web', '2019-05-25', '19:00:00', 2, 2, 'conf_03'),
(10, 'Diseño UI y UX para móviles', '2019-05-25', '10:00:00', 1, 6, 'sem_01'),
(11, 'AngularJS', '2019-05-26', '10:00:00', 3, 1, 'taller_06'),
(12, 'PHP y MySQL', '2019-05-26', '12:00:00', 3, 2, 'taller_07'),
(13, 'JavaScript Avanzado', '2019-05-26', '14:00:00', 3, 3, 'taller_08'),
(14, 'SEO en Google', '2019-05-26', '17:00:00', 3, 4, 'taller_09'),
(15, 'De Photoshop a HTML5 y CSS3', '2019-05-26', '19:00:00', 3, 5, 'taller_10'),
(16, 'PHP Intermedio y Avanzado', '2019-05-26', '21:00:00', 3, 6, 'taller_11'),
(17, 'Como crear una tienda online que venda millones en pocos día', '2019-05-26', '10:00:00', 2, 6, 'conf_04'),
(18, 'Los mejores lugares para encontrar trabajo', '2019-05-26', '17:00:00', 2, 1, 'conf_05'),
(19, 'Pasos para crear un negocio rentable ', '2019-05-26', '19:00:00', 2, 2, 'conf_06'),
(20, 'Aprende a Programar en una mañana', '2019-05-26', '10:00:00', 1, 3, 'sem_02'),
(21, 'Diseño UI y UX para móviles', '2019-05-26', '17:00:00', 1, 5, 'sem_03'),
(22, 'Laravel', '2019-05-27', '10:00:00', 3, 1, 'taller_12'),
(23, 'Crea tu propia API', '2019-05-27', '12:00:00', 3, 2, 'taller_13'),
(24, 'JavaScript y jQuery', '2019-05-27', '14:00:00', 3, 3, 'taller_14'),
(25, 'Creando Plantillas para WordPress', '2019-05-27', '17:00:00', 3, 4, 'taller_15'),
(26, 'Tiendas Virtuales en Magento', '2019-05-27', '19:00:00', 3, 5, 'taller_16'),
(27, 'Como hacer Marketing en línea', '2019-05-27', '10:00:00', 2, 6, 'conf_07'),
(28, '¿Con que lenguaje debo empezar?', '2019-05-27', '17:00:00', 2, 2, 'conf_08'),
(29, 'Frameworks y librerias Open Source', '2019-05-27', '19:00:00', 2, 3, 'conf_09'),
(30, 'Creando una App en Android en una mañana', '2019-05-27', '10:00:00', 1, 4, 'sem_04'),
(31, 'Creando una App en iOS en una tarde', '2019-05-27', '17:00:00', 1, 1, 'sem_05');

-- --------------------------------------------------------

--
-- Table structure for table `invitados`
--

CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitados`
--

INSERT INTO `invitados` (`invitado_id`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'invitado1.jpg'),
(2, 'Shari', 'Herrera', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'invitado2.jpg'),
(3, 'Gregorio', 'Sanchez', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'invitado3.jpg'),
(4, 'Susana', 'Rivera', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'invitado4.jpg'),
(5, 'Harild', 'Garcia', 'Aliquam sed nisl ante. Maecenas nec sem eget mauris hendrerit cursus. In maximus mi at purus scelerisque, vitae efficitur quam euismod.', 'invitado5.jpg'),
(6, 'Susan', 'Sanchez', 'Sed sit amet ligula lorem. Cras finibus nibh ut pretium faucibus. Aenean et malesuada turpis.', 'invitado6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regalos`
--

CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regalos`
--

INSERT INTO `regalos` (`ID_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Table structure for table `registrados`
--

CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv` (`id_inv`);

--
-- Indexes for table `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`invitado_id`);

--
-- Indexes for table `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`ID_regalo`);

--
-- Indexes for table `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`ID_Registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `invitados`
--
ALTER TABLE `invitados`
  MODIFY `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `regalos`
--
ALTER TABLE `regalos`
  MODIFY `ID_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registrados`
--
ALTER TABLE `registrados`
  MODIFY `ID_Registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`);

--
-- Constraints for table `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
