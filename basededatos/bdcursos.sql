-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2016 a las 22:40:07
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdcursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno`
--

CREATE TABLE `Alumno` (
  `idAlumno` int(4) NOT NULL,
  `nombreCompletoAlumno` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoAlumno` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correoAlumno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(350) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aula`
--

CREATE TABLE `Aula` (
  `idAula` int(4) NOT NULL,
  `aula` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Aula`
--

INSERT INTO `Aula` (`idAula`, `aula`) VALUES
(1, 'AULA-101'),
(2, 'AULA-102'),
(3, 'AULA-103'),
(4, 'AULA-104'),
(5, 'AULA-201'),
(6, 'AULA-202');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Curso`
--

CREATE TABLE `Curso` (
  `idCurso` int(4) NOT NULL,
  `nombreCurso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `costo` double(10,3) NOT NULL,
  `horario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaTermino` date NOT NULL,
  `idProfesor` int(4) NOT NULL,
  `idAula` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Curso`
--

INSERT INTO `Curso` (`idCurso`, `nombreCurso`, `costo`, `horario`, `fechaInicio`, `fechaTermino`, `idProfesor`, `idAula`) VALUES
(1, 'HTML5 y CSS3', 1000.330, '7:00-10:00', '2016-07-18', '2016-07-29', 1, 6),
(2, 'Java', 1300.340, '10:00-13:00', '2016-07-18', '2016-07-29', 2, 5),
(3, 'Arduino', 1500.450, '13:00-16:00', '2016-07-18', '2016-07-29', 3, 4),
(4, 'PHP y MySQL', 1600.930, '16:00-19:00', '2016-07-18', '2016-07-29', 4, 1),
(5, 'Python', 1200.430, '7:00-10:00', '2016-07-18', '2016-07-29', 5, 2),
(6, 'C#', 1400.340, '13:00-16:00', '2016-07-18', '2016-07-29', 6, 3),
(7, 'JavaScript', 1000.330, '19:00-22:00', '2016-07-18', '2016-07-29', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripcion`
--

CREATE TABLE `Inscripcion` (
  `idInscripcion` int(5) NOT NULL,
  `idAlumno` int(4) NOT NULL,
  `idCurso` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor`
--

CREATE TABLE `Profesor` (
  `idProfesor` int(4) NOT NULL,
  `nombreCompletoProfesor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoProfesor` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correoProfesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Profesor`
--

INSERT INTO `Profesor` (`idProfesor`, `nombreCompletoProfesor`, `telefonoProfesor`, `correoProfesor`) VALUES
(1, 'Alfredo Corona Cabrera', '55-21-34-56-78', 'alfredo@hotmail.com'),
(2, 'Francisco Javier Alonso Gómez', '55-11-23-56-89', 'francisco_1@gmail.com'),
(3, 'Arturo Alonzo Cañibe', '55-45-78-22-55', 'artur@yahoo.com.mx'),
(4, 'Javier Alpízar Hernander', '57-89-23-56', 'alpizar@gmail.com'),
(5, 'Nestor Alvarez Martínez', '55-26-89-43-23', 'nest@hotmail.com'),
(6, 'Pedro García Mendoza ', '55-27-44-53-56', 'pedro@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `Aula`
--
ALTER TABLE `Aula`
  ADD PRIMARY KEY (`idAula`);

--
-- Indices de la tabla `Curso`
--
ALTER TABLE `Curso`
  ADD PRIMARY KEY (`idCurso`),
  ADD KEY `idProfesor` (`idProfesor`),
  ADD KEY `idAula` (`idAula`);

--
-- Indices de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  ADD PRIMARY KEY (`idInscripcion`),
  ADD KEY `idAlumno` (`idAlumno`),
  ADD KEY `idCurso` (`idCurso`);

--
-- Indices de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  MODIFY `idAlumno` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Aula`
--
ALTER TABLE `Aula`
  MODIFY `idAula` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `Curso`
--
ALTER TABLE `Curso`
  MODIFY `idCurso` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  MODIFY `idInscripcion` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Profesor`
--
ALTER TABLE `Profesor`
  MODIFY `idProfesor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Curso`
--
ALTER TABLE `Curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `Profesor` (`idProfesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`idAula`) REFERENCES `Aula` (`idAula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Inscripcion`
--
ALTER TABLE `Inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `Alumno` (`idAlumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`idCurso`) REFERENCES `Curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
