-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2023 a las 20:03:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbhospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` varchar(45) NOT NULL,
  `id_doctor` int(3) NOT NULL,
  `id_paciente` int(5) NOT NULL,
  `fecha_consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `id_doctor`, `id_paciente`, `fecha_consulta`) VALUES
('1', 9, 1, '2020-08-30'),
('10', 1, 1, '2022-09-15'),
('2', 22, 2, '2021-03-25'),
('3', 35, 4, '2023-02-23'),
('4', 9, 7, '2023-01-15'),
('5', 9, 8, '2022-12-04'),
('6', 8, 24, '2022-12-03'),
('7', 1, 25, '2022-11-29'),
('8', 1, 26, '2022-12-15'),
('9', 1, 25, '2023-02-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cp_poblacion`
--

CREATE TABLE `cp_poblacion` (
  `codigo_postal` varchar(5) NOT NULL,
  `poblacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cp_poblacion`
--

INSERT INTO `cp_poblacion` (`codigo_postal`, `poblacion`) VALUES
('46001', 'Valencia'),
('46002', 'Valencia'),
('46200', 'Paiporta'),
('46210', 'Picanya'),
('46460', 'Silla'),
('46469', 'Beniparrell'),
('46470', 'Albal'),
('46470', 'Catarroja'),
('46470', 'Massanassa'),
('46900', 'Torrent'),
('46901', 'Torrent'),
('46970', 'Alaquas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id_diagnostico` int(5) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `consulta_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id_diagnostico`, `descripcion`, `consulta_id`) VALUES
(1, 'Alergia a los ácaros', '1'),
(2, 'Alergia a la humedad', '2'),
(3, 'Alergia a los frutos secos', '3'),
(4, 'Alergia al polen', '4'),
(5, 'Alergia al pelo de gato', '5'),
(6, 'Alergia al ciprés', '10'),
(7, 'Neumonía leve', '6'),
(8, 'Neumonía grave', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `genero` varchar(8) NOT NULL,
  `especialidad` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `nombre`, `apellido1`, `apellido2`, `genero`, `especialidad`) VALUES
(1, 'Amparo', 'Domingo', 'Hernández', 'mujer', 'neumología'),
(2, 'Sara', 'Martínez', 'Alberola', 'mujer', 'cardiología'),
(3, 'Juan', 'Ibáñez', 'Martí', 'hombre', 'dermatología'),
(4, 'Carmen', 'Romeu', 'Rosaleny', 'mujer', 'endocrinología'),
(5, 'Sergio', 'Zaragozá', 'Horcajuelo', 'hombre', 'neurología'),
(6, 'Ariel', 'del Pozo', 'Ribes', 'hombre', 'medicina interna'),
(7, 'Arón', 'Sánchez', 'Palomares', 'hombre', 'geriatría'),
(8, 'Carles', 'Escribá', 'Santamans', 'hombre', 'anestesiología'),
(9, 'Alexis', 'Llopis', 'Prats', 'hombre', 'alergología'),
(10, 'Pedro', 'Montiel', 'Regal', 'hombre', 'reumatología'),
(11, 'Leonor', 'Rodrigo', 'Ramón', 'mujer', 'toxicología'),
(12, 'Daniel', 'Ortuño', 'Carrasco', 'hombre', 'pediatría'),
(13, 'Diego', 'Alcahut', 'Benavent', 'hombre', 'nutriología'),
(14, 'Lorena', 'Dies', 'Ivanets', 'mujer', 'medicina familiar'),
(15, 'Emilio', 'Ardila', 'Javaloyas', 'hombre', 'cardiología'),
(16, 'Erik', 'Pla', 'Fernández', 'hombre', 'dermatología'),
(17, 'María', 'Sanchis', 'Pérez', 'mujer', 'endocrinología'),
(18, 'Esmeralda', 'Sahuquillo', 'Torrent', 'mujer', 'neurología'),
(19, 'Guzmán', 'Girbés', 'Plá', 'hombre', 'medicina forense'),
(20, 'Imma', 'Ramírez', 'Cebolla', 'mujer', 'geriatría'),
(21, 'Francisco', 'Zaragozá', 'Girbés', 'hombre', 'anestesiología'),
(22, 'Joel', 'Murcia', 'Richart', 'hombre', 'alergología'),
(23, 'Miguel', 'Pastor', 'Castells', 'hombre', 'reumatología'),
(24, 'Eva', 'Boluda', 'Rodríguez', 'mujer', 'toxicología'),
(25, 'Dolores', 'Vázquez', 'Cebriá', 'mujer', 'pediatría'),
(26, 'Julio', 'Adam', 'Mulet', 'hombre', 'nutriología'),
(27, 'Julia', 'Dávila', 'Roig', 'mujer', 'medicina familiar'),
(28, 'Peisen', 'Dong', NULL, 'hombre', 'cardiología'),
(29, 'Pablo', 'Rivero', 'Puigcerver', 'hombre', 'dermatología'),
(30, 'Rubén', 'Doménech', 'Aranda', 'hombre', 'endocrinología'),
(31, 'Xavier', 'Yuncal', 'Aliques', 'hombre', 'neurología'),
(32, 'Telmo', 'Romero', 'Maíques', 'hombre', 'oncología médica'),
(33, 'Víctor', 'Gelida', 'Bover', 'hombre', 'oncología radioterápica'),
(34, 'Yann', 'Yuncal', 'Lacuesta', 'hombre', 'oncología radioterápica'),
(35, 'Mónica', 'Visent', 'Aranda', 'mujer', 'alergología'),
(36, 'Isabel', 'Montejano', 'Doménech', 'mujer', 'reumatología'),
(37, 'Leonardo', 'Alcañiz', 'Murcia', 'hombre', 'toxicología'),
(38, 'Emilia', 'Abella', 'González', 'mujer', 'pediatría'),
(39, 'Bernardo', 'Baeza', 'Calatayud', 'hombre', 'nutriología'),
(40, 'Abelardo', 'Martínez', 'Gómez', 'hombre', 'medicina familiar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nombre`) VALUES
(1, 'Ebastel Forte Flash'),
(2, 'Zithromax');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento_sintoma`
--

CREATE TABLE `medicamento_sintoma` (
  `id_sintoma` int(5) NOT NULL,
  `id_medicamento` int(5) NOT NULL,
  `dosis_diaria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamento_sintoma`
--

INSERT INTO `medicamento_sintoma` (`id_sintoma`, `id_medicamento`, `dosis_diaria`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 2, 3),
(8, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `genero` varchar(8) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `cod_via` int(5) NOT NULL,
  `cod_post` varchar(5) NOT NULL,
  `telf_contacto` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `apellido1`, `apellido2`, `genero`, `f_nacimiento`, `cod_via`, `cod_post`, `telf_contacto`) VALUES
(1, 'Mónico', 'Naranjo', 'Álvarez', 'mujer', '2000-02-29', 1, '46200', '630697643'),
(2, 'Carlos', 'Naranjo', 'Álvarez', 'hombre', '2000-02-29', 1, '46200', '670441572'),
(3, 'Alberto', 'Revert', 'Domingo', 'hombre', '2010-08-19', 2, '46200', '645267895'),
(4, 'Sara', 'Sánchez', 'Alberola', 'mujer', '1980-02-29', 3, '46200', '630697643'),
(5, 'Elvira', 'Mayordomo', 'Casal', 'mujer', '1978-02-28', 4, '46970', '630697643'),
(6, 'Manuel', 'Carrasco', 'Turizo', 'hombre', '1984-10-29', 5, '46970', '630697643'),
(7, 'Javier', 'Rosaleny', 'Lluesa', 'hombre', '1997-03-25', 6, '46460', '630697643'),
(8, 'Pedro', 'Rosaleny', 'Lluesa', 'hombre', '1997-03-25', 6, '46460', '630697643'),
(9, 'Ernesto', 'Martínez', 'Samper', 'hombre', '1998-09-18', 7, '46210', '630697643'),
(10, 'Isaac', 'Martínez', 'Samper', 'hombre', '2000-05-23', 7, '46210', '630697643'),
(11, 'Jose Manuel', 'Seda', 'Parada', 'hombre', '2000-07-12', 8, '46210', '630697643'),
(12, 'Isabel', 'Espuig', 'Álvarez ', 'mujer', '2007-04-12', 9, '46900', '673897236'),
(13, 'Irene', 'Espuig', 'Álvarez', 'mujer', '2011-07-21', 9, '46900', '673897236'),
(14, 'Verónica', 'Espuig', 'Álvarez', 'mujer', '2013-01-10', 9, '46900', '673897236'),
(15, 'Juan', 'García', 'López', 'hombre', '1990-05-12', 14, '46901', '962345678'),
(16, 'María', 'Martínez', 'González', 'mujer', '1985-08-22', 14, '46901', '911234567'),
(17, 'Pedro', 'Hernández', 'Pérez', 'hombre', '1995-11-30', 15, '46900', '963456789'),
(18, 'Lucía', 'Sánchez', 'Ruiz', 'mujer', '1982-03-18', 16, '46900', '964567890'),
(19, 'Antonio', 'Gómez', 'Sánchez', 'hombre', '1978-06-02', 17, '46900', '965678901'),
(20, 'Carmen', 'García', 'Hernández', 'mujer', '1992-09-14', 18, '46469', '966789012'),
(21, 'Javier', 'Martín', 'Moreno', 'hombre', '1980-12-26', 19, '46469', '967890123'),
(22, 'Laura', 'Pérez', 'González', 'mujer', '1998-01-08', 20, '46469', '968901234'),
(23, 'Manuel', 'Rodríguez', 'Hernández', 'hombre', '1975-04-22', 21, '46001', '969012345'),
(24, 'Marta', 'González', 'Sánchez', 'mujer', '1988-07-04', 22, '46002', '960123456'),
(25, 'Diego', 'Sánchez', 'Gómez', 'hombre', '1991-10-16', 23, '46002', '961234567'),
(26, 'Sara', 'Hernández', 'Pérez', 'mujer', '1984-01-28', 24, '46001', '912345678'),
(27, 'Pablo', 'García', 'Ruiz', 'hombre', '1979-05-11', 25, '46001', '963456789'),
(28, 'Elena', 'Martínez', 'Hernández', 'mujer', '1993-08-23', 26, '46002', '964567890'),
(29, 'Jorge', 'Pérez', 'González', 'hombre', '1974-09-11', 26, '46002', '640986754');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_medicamento_tratamiento`
--

CREATE TABLE `paciente_medicamento_tratamiento` (
  `id_paciente` int(5) NOT NULL,
  `id_medicamento` int(5) NOT NULL,
  `dosis_diaria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente_medicamento_tratamiento`
--

INSERT INTO `paciente_medicamento_tratamiento` (`id_paciente`, `id_medicamento`, `dosis_diaria`) VALUES
(1, 1, 1),
(2, 1, 1),
(4, 1, 1),
(7, 1, 1),
(8, 1, 1),
(10, 1, 1),
(24, 2, 3),
(25, 2, 3),
(26, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sintoma`
--

CREATE TABLE `sintoma` (
  `id_sintoma` int(5) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_diagnostico` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sintoma`
--

INSERT INTO `sintoma` (`id_sintoma`, `descripcion`, `id_diagnostico`) VALUES
(1, 'Moqueo', 1),
(2, 'Ronchas en la piel', 2),
(3, 'Estornudos', 3),
(4, 'Picor de ojos', 4),
(5, 'Moqueo', 5),
(6, 'Rinitis', 6),
(7, 'Molestia al respirar', 7),
(8, 'Ahogo', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `via`
--

CREATE TABLE `via` (
  `cod_via` int(5) NOT NULL,
  `tipo_via` varchar(30) NOT NULL,
  `nom_via` varchar(100) NOT NULL,
  `numero` int(4) NOT NULL,
  `puerta` varchar(4) NOT NULL,
  `escalera` varchar(10) DEFAULT NULL,
  `portal` varchar(10) DEFAULT NULL,
  `piso` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `via`
--

INSERT INTO `via` (`cod_via`, `tipo_via`, `nom_via`, `numero`, `puerta`, `escalera`, `portal`, `piso`) VALUES
(1, 'Calle', 'Sant Roc', 44, '2', NULL, NULL, NULL),
(2, 'Calle', 'Catarroja', 32, '7', NULL, NULL, NULL),
(3, 'Avenida', 'Alicante', 102, '10', NULL, NULL, NULL),
(4, 'Avenida', 'del Mediterráneo', 144, '12', NULL, NULL, NULL),
(5, 'Calle', '8 de marzo', 7, '22', NULL, NULL, NULL),
(6, 'Calle', 'Sénia', 38, '31', NULL, NULL, NULL),
(7, 'Rambla', 'de la Independencia', 37, '7', NULL, NULL, NULL),
(8, 'Paseo', 'de Gracia', 22, '9', NULL, NULL, NULL),
(9, 'Ronda', 'Norte', 15, '22', NULL, NULL, NULL),
(10, 'Paseo', 'de la Alameda', 24, '8', NULL, NULL, NULL),
(11, 'Calle', 'del Río Arcos', 8, '2', NULL, NULL, NULL),
(12, 'Calle', 'Andrés Mancebo', 16, '12', NULL, NULL, NULL),
(13, 'Avenida', 'del Pueto', 41, '7', NULL, NULL, NULL),
(14, 'Avenida', 'de la Paz', 22, '7', NULL, NULL, NULL),
(15, 'Calle', 'San Juan', 18, '10', NULL, NULL, NULL),
(16, 'Plaza', 'de España', 16, '1', NULL, NULL, NULL),
(17, 'Calle', 'Alcalá', 9, '20', NULL, NULL, NULL),
(18, 'Paseo', 'del Prado', 2, '8', NULL, NULL, NULL),
(19, 'Calle', 'Gran Vía', 8, '15', NULL, NULL, NULL),
(20, 'Avenida', 'de América', 14, '12', NULL, NULL, NULL),
(21, 'Calle', 'Princesa', 22, '25', NULL, NULL, NULL),
(22, 'Calle', 'Almagro', 7, '30', NULL, NULL, NULL),
(23, 'Calle', 'Velázquez', 10, '35', NULL, NULL, NULL),
(24, 'Avenida', 'de los Reyes Católicos', 13, '40', NULL, NULL, NULL),
(25, 'Calle', 'Fuencarral', 1, '45', NULL, NULL, NULL),
(26, 'Calle', 'Mayor', 24, '50', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `Fk_consulta_doctor` (`id_doctor`),
  ADD KEY `Fk_consulta_paciente` (`id_paciente`);

--
-- Indices de la tabla `cp_poblacion`
--
ALTER TABLE `cp_poblacion`
  ADD PRIMARY KEY (`codigo_postal`,`poblacion`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`),
  ADD KEY `Fk_diagnostico_consulta` (`consulta_id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD UNIQUE KEY `Uk_doctor_nom` (`nombre`,`apellido1`,`apellido2`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `medicamento_sintoma`
--
ALTER TABLE `medicamento_sintoma`
  ADD PRIMARY KEY (`id_sintoma`,`id_medicamento`),
  ADD KEY `Fk_medicsint_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `Uk_paciente_nom` (`nombre`,`apellido1`,`apellido2`),
  ADD KEY `Fk_paciente_via` (`cod_via`),
  ADD KEY `Fk_paciente_cp_poblacion` (`cod_post`);

--
-- Indices de la tabla `paciente_medicamento_tratamiento`
--
ALTER TABLE `paciente_medicamento_tratamiento`
  ADD PRIMARY KEY (`id_paciente`,`id_medicamento`),
  ADD KEY `Fk_pacmedtrat_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `sintoma`
--
ALTER TABLE `sintoma`
  ADD PRIMARY KEY (`id_sintoma`),
  ADD KEY `Fk_sintoma_diagnostico` (`id_diagnostico`);

--
-- Indices de la tabla `via`
--
ALTER TABLE `via`
  ADD PRIMARY KEY (`cod_via`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `Fk_consulta_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`),
  ADD CONSTRAINT `Fk_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `Fk_diagnostico_consulta` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id_consulta`);

--
-- Filtros para la tabla `medicamento_sintoma`
--
ALTER TABLE `medicamento_sintoma`
  ADD CONSTRAINT `Fk_medicsint_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id_medicamento`),
  ADD CONSTRAINT `Fk_medicsint_sintoma` FOREIGN KEY (`id_sintoma`) REFERENCES `sintoma` (`id_sintoma`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `Fk_paciente_cp_poblacion` FOREIGN KEY (`cod_post`) REFERENCES `cp_poblacion` (`codigo_postal`),
  ADD CONSTRAINT `Fk_paciente_via` FOREIGN KEY (`cod_via`) REFERENCES `via` (`cod_via`);

--
-- Filtros para la tabla `paciente_medicamento_tratamiento`
--
ALTER TABLE `paciente_medicamento_tratamiento`
  ADD CONSTRAINT `Fk_pacmedtrat_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id_medicamento`),
  ADD CONSTRAINT `Fk_pacmedtrat_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `sintoma`
--
ALTER TABLE `sintoma`
  ADD CONSTRAINT `Fk_sintoma_diagnostico` FOREIGN KEY (`id_diagnostico`) REFERENCES `diagnostico` (`id_diagnostico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
