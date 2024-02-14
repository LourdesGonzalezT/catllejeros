-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2024 a las 13:14:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catllejeros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`adminId`, `adminName`, `adminEmail`, `adminPassword`) VALUES
(2, 'Lourdes', 'pruebaLourdes@prueba.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cats`
--

CREATE TABLE `cats` (
  `catId` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL,
  `age` varchar(50) NOT NULL,
  `sex` enum('macho','hembra') NOT NULL,
  `aboutCat` varchar(800) NOT NULL,
  `image1_path` varchar(100) NOT NULL DEFAULT 'images\\imgDefault\\randonCat.jpg',
  `image2_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cats`
--

INSERT INTO `cats` (`catId`, `catName`, `age`, `sex`, `aboutCat`, `image1_path`, `image2_path`) VALUES
(7, 'Rocky editado', '3 años', '', '¡Conoce a nuestro Rocky en busca de un hogar amoroso!\r\nDescubre la increíble transformación de este gatito callejero en un amigo leal y cariñoso. Después de rescatarlo de las duras calles, lo cuidamos con amor y ahora está listo para encontrar un hogar donde pueda ser amado y apreciado. ¿Estás listo para darle una segunda oportunidad? ¡Adóptalo hoy y sé parte de su historia de amor!\r\n\r\n', 'images/catsImages/7-cat6.jpg', 'images/catsImages/7-cat2.jpg'),
(8, 'gatito sin foto', '1 mes', '', 'esta gatita la estoy creando sin poner ninguna foto', 'images/catsImages/8-cat2.jpg', 'images/catsImages/8-cat3.webp'),
(9, 'editado PPP', '1 año', 'hembra', 'gatito que creo solo con una foto, a ver que pasa', 'images/catsImages/9-catRegister.jpg', 'images/catsImages/9-cat7.jpg'),
(10, 'gato 9febrero', '8 meses', '', 'estoy creando este gato solo con una imagen y a ver que pasa y ahora lo edito y le meto otra foto y cambio la primera que metí.', 'images/catsImages/10-cat7.jpg', 'images/catsImages/10-cat8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventAddress` varchar(300) NOT NULL,
  `eventDescription` varchar(1000) NOT NULL,
  `eventImage_path` varchar(100) NOT NULL DEFAULT 'images\\imgDefault\\eventCat.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventDate`, `eventAddress`, `eventDescription`, `eventImage_path`) VALUES
(11, 'Gato-thon de 24 Horas', '2024-03-02', 'Recinto Ferial, Parla', 'Desafía a la comunidad a participar en un \"Gato-thon de 24 Horas\", un evento de recaudación de fondos que dura todo el día. Durante este maratón benéfico, los participantes pueden comprometerse a realizar actividades relacionadas con gatos durante 24 horas seguidas. Esto podría incluir actividades como leer libros sobre gatos, ver películas de gatos, hacer manualidades de bricolaje para gatos y hasta pasar tiempo en un refugio de gatos callejeros ayudando con las tareas diarias. Los participantes pueden buscar patrocinadores para cada hora que completen y los fondos recaudados se destinarán a la protectora de gatos callejeros.', 'images/eventsImages/11-cats-playing2.jpg'),
(12, 'mñl', '2024-02-15', 'en un lugar', 'kjñlkjkj', 'images\\imgDefault\\eventCat.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `reportId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `reportDate` date NOT NULL,
  `information` varchar(1000) NOT NULL,
  `reportImage_path` varchar(100) NOT NULL DEFAULT 'images\\imgDefault\\newsCats.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reports`
--

INSERT INTO `reports` (`reportId`, `title`, `reportDate`, `information`, `reportImage_path`) VALUES
(5, 'Colonia rescatada', '2024-02-05', 'Hemos conseguido rescatar una colonia que estaba en peligro por las bajas temperaturas', 'images/reportsImages/5-colonia2.jpg'),
(6, 'Rescatado gatito', '2024-01-31', 'Hemos conseguido rescatar a un gato que estaba subido en un tejado y llevaba allí tres días maullando.', 'images\\imgDefault\\newsCats.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indices de la tabla `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`catId`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cats`
--
ALTER TABLE `cats`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
