-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 01:41:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `horarios_db`
--
CREATE DATABASE IF NOT EXISTS `horarios_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `horarios_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id_acciones` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_acciones`, `nombre`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Eliminar Usuario', 'A', '2023-03-01 16:08:12', 2),
(2, 'Actualizar Usuario', 'A', '2023-03-01 16:08:12', 3),
(3, 'Consultar Usuario', 'A', '2023-03-01 16:08:12', 2),
(4, 'Insertar Usuario', 'A', '2023-03-01 16:08:12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignatura` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `Codigo` smallint(2) NOT NULL,
  `tipo_requerido` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre`, `Codigo`, `tipo_requerido`, `estado`, `usuario_crea`, `fecha_crea`) VALUES
(1, 'Matematicas', 38, 79, 'A', 5, '2023-05-11 23:18:17'),
(2, 'Programacion', 43, 80, 'A', 5, '2023-05-11 23:18:40'),
(3, 'Sociales ', 36, 79, 'A', 5, '2023-05-11 23:18:51'),
(4, 'Fisica', 38, 79, 'A', 5, '2023-05-11 23:19:45'),
(5, 'Astro fisica', 35, 80, 'A', 5, '2023-05-11 23:19:58'),
(6, 'Junior de Barranquil', 40, 80, 'A', 5, '2023-05-11 23:20:15'),
(7, 'POO', 43, 80, 'A', 5, '2023-05-12 04:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_profesores`
--

CREATE TABLE `asignatura_profesores` (
  `id_asignatura_profesor` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `id_grado_asignatura` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignatura_profesores`
--

INSERT INTO `asignatura_profesores` (`id_asignatura_profesor`, `id_usuario`, `id_grado_asignatura`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 4, 1, '2023-04-19 02:39:00', 5, 'A'),
(2, 3, 2, '2023-04-19 03:32:38', 5, 'A'),
(3, 4, 3, '2023-05-09 13:48:16', 6, 'A'),
(4, 13, 1, '2023-05-10 21:09:20', 5, 'A'),
(5, 4, 3, '2023-05-11 21:49:01', 3, 'A'),
(6, 16, 1, '2023-05-12 03:38:04', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `tipo` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nombre`, `descripcion`, `tipo`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Dim 1', 'Descripcion random', 80, 'A', '2023-05-11 22:58:47', 5),
(2, 'Laboratorio', 'Aula especializada para realizar actividades químicas supervisadas', 80, 'A', '2023-05-11 22:58:53', 5),
(3, 'Aula 05', 'Aula Ubicada en el segundo piso al fondo :)', 79, 'A', '2023-05-12 04:05:13', 5);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `detalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `detalle` (
`id_encabezado` smallint(2)
,`periodo` year(4)
,`inicio_jornada` smallint(2)
,`fin_jornada` smallint(2)
,`grado` varchar(30)
,`jornada` varchar(50)
,`id_horario_det` smallint(2)
,`asignatura` varchar(20)
,`aula` varchar(20)
,`hora_inicio` smallint(2)
,`duracion` char(1)
,`profesor` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_prof`
--

CREATE TABLE `disponibilidad_prof` (
  `id_disponibilidad_prof` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `dia` smallint(2) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `disponibilidad_prof`
--

INSERT INTO `disponibilidad_prof` (`id_disponibilidad_prof`, `id_usuario`, `dia`, `hora_inicio`, `hora_fin`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 4, 8, '06:30:00', '08:30:00', '2023-04-19 02:44:15', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id_email` smallint(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prioridad` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` smallint(2) NOT NULL,
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id_email`, `email`, `prioridad`, `estado`, `fecha_crea`, `id_usuario`, `usuario_crea`) VALUES
(1, 'sffsfg@ddg', 7, 'A', '2023-04-26 20:58:18', 11, 11),
(2, 'belzera22@gmail.com', 6, 'A', '2023-05-05 07:12:00', 13, 5),
(3, 'belzera22@gmail.com', 6, 'A', '2023-05-05 07:12:00', 13, 5),
(4, 'belzera22@gmail.scom', 6, 'A', '2023-05-05 07:19:02', 14, 5),
(5, 'belzera227@gmail.com', 6, 'A', '2023-05-05 03:57:46', 3, 5),
(6, 'a@gmail.com', 6, 'A', '2023-05-09 17:39:48', 6, 6),
(7, 'aasa@gmail.com', 7, 'A', '2023-05-09 20:14:28', 5, 5),
(9, 'adsd@gmail.com', 6, 'A', '2023-05-12 03:37:58', 16, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `id_grado` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `id_usuario`, `id_grado`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 2, 1, '2023-04-18 23:33:02', 5, 'A'),
(2, 10, 1, '2023-05-09 15:27:19', 5, 'A'),
(3, 11, 1, '2023-05-09 15:27:24', 5, 'A'),
(4, 12, 1, '2023-04-28 19:05:51', 6, 'A'),
(5, 7, 1, '2023-05-10 21:09:10', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franjas_horarias`
--

CREATE TABLE `franjas_horarias` (
  `id_franja_horaria` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `franjas_horarias`
--

INSERT INTO `franjas_horarias` (`id_franja_horaria`, `estado`, `usuario_crea`, `fecha_crea`, `hora_inicio`, `hora_fin`, `dia`) VALUES
(1, 'A', 5, '2023-05-09 15:16:22', '06:30:00', '07:30:00', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` smallint(2) NOT NULL,
  `alias` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `alias`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, '9-A', 'A', '2023-04-28 13:43:05', 5),
(2, '9-B', 'A', '2023-04-28 19:09:47', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_asignatura`
--

CREATE TABLE `grados_asignatura` (
  `id_grado_asignatura` smallint(2) NOT NULL,
  `id_grado` smallint(2) NOT NULL,
  `id_asignatura` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `horas_semanales` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados_asignatura`
--

INSERT INTO `grados_asignatura` (`id_grado_asignatura`, `id_grado`, `id_asignatura`, `fecha_crea`, `usuario_crea`, `estado`, `horas_semanales`) VALUES
(1, 1, 1, '2023-05-10 13:46:57', 5, 'A', '2'),
(2, 1, 2, '2023-05-10 13:46:59', 5, 'A', '6'),
(3, 2, 4, '2023-05-10 13:47:01', 7, 'A', '8'),
(4, 1, 4, '2023-05-12 03:26:31', 5, 'A', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_encabezado` smallint(2) DEFAULT NULL,
  `periodo` year(4) DEFAULT NULL,
  `grado` varchar(30) DEFAULT NULL,
  `jornada` varchar(50) DEFAULT NULL,
  `id_horario_det` smallint(2) DEFAULT NULL,
  `asignatura` varchar(20) DEFAULT NULL,
  `aula` varchar(20) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `profesor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_enc`
--

CREATE TABLE `horarios_enc` (
  `id_horarios_enc` smallint(2) NOT NULL,
  `id_grado` smallint(2) NOT NULL,
  `periodo_año` year(4) NOT NULL,
  `jornada` smallint(2) NOT NULL,
  `duracion_hora` smallint(2) NOT NULL,
  `inicio` smallint(2) NOT NULL,
  `fin` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios_enc`
--

INSERT INTO `horarios_enc` (`id_horarios_enc`, `id_grado`, `periodo_año`, `jornada`, `duracion_hora`, `inicio`, `fin`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 1, '2023', 20, 13, 47, 47, 'A', '2023-05-11 20:57:36', 5),
(7, 2, '2025', 20, 12, 48, 68, 'A', '2023-05-11 21:20:15', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_det`
--

CREATE TABLE `horario_det` (
  `id_horario_det` smallint(2) NOT NULL,
  `id_grado_asignatura` smallint(2) NOT NULL,
  `id_aula` smallint(2) NOT NULL,
  `id_horario_enc` smallint(2) NOT NULL,
  `profesor` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `hora_inicio` smallint(2) NOT NULL,
  `duracion` char(1) NOT NULL,
  `dia` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_det`
--

INSERT INTO `horario_det` (`id_horario_det`, `id_grado_asignatura`, `id_aula`, `id_horario_enc`, `profesor`, `fecha_crea`, `usuario_crea`, `estado`, `hora_inicio`, `duracion`, `dia`) VALUES
(1, 1, 1, 1, 4, '2023-05-11 21:59:27', 5, 'A', 47, '1', 8),
(2, 2, 1, 1, 5, '2023-05-11 21:59:31', 5, 'A', 47, '2', 9),
(3, 2, 1, 7, 5, '2023-05-11 21:59:36', 5, 'A', 47, '2', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_det`
--

CREATE TABLE `parametro_det` (
  `id_parametro_det` smallint(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `resumen` varchar(10) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `id_enc` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parametro_det`
--

INSERT INTO `parametro_det` (`id_parametro_det`, `nombre`, `resumen`, `estado`, `fecha_crea`, `usuario_crea`, `id_enc`) VALUES
(1, 'Tarjeta de Identidad', 'TI', 'A', '2023-03-01 15:14:02', 2, 1),
(2, 'Cedula de Ciudadania', 'CC', 'A', '2023-03-01 15:14:53', 2, 1),
(3, 'Cedula de Extranjeria', 'CE', 'A', '2023-03-01 15:15:48', 2, 1),
(4, 'Pasaporte', 'PP', 'A', '2023-03-01 15:17:49', 2, 1),
(5, 'Permiso de Permanencia', 'PPT', 'A', '2023-03-01 15:17:49', 2, 1),
(6, 'Principal', 'PR', 'A', '2023-03-01 15:31:34', 3, 2),
(7, 'Secundario', 'SG', 'A', '2023-03-01 15:31:47', 2, 2),
(8, 'Lunes', 'lun', 'A', '2023-03-01 15:47:32', 2, 4),
(9, 'Martes', 'mar', 'A', '2023-03-01 15:47:32', 3, 4),
(10, 'Miercoles', 'mier', 'A', '2023-03-01 15:48:46', 2, 4),
(11, 'Jueves', 'jue', 'A', '2023-03-01 15:48:46', 2, 4),
(12, 'Viernes', 'vier', 'A', '2023-03-01 15:48:46', 2, 4),
(13, 'Sabado', 'sab', 'A', '2023-03-01 15:48:46', 2, 4),
(14, 'Bloque A', 'bloq-a', 'A', '2023-03-01 15:52:40', 3, 5),
(15, 'Bloque B', 'bloq-b', 'A', '2023-03-01 15:52:46', 2, 5),
(16, 'Bloque C', 'bloq-c', 'A', '2023-03-01 15:52:50', 3, 5),
(17, 'Bloque D', 'bloq-d', 'A', '2023-03-01 15:52:53', 2, 5),
(18, 'Sede Norte', 'sn', 'A', '2023-03-01 15:54:00', 3, 6),
(19, 'Sede Sur', 'ss', 'A', '2023-03-01 15:54:00', 2, 6),
(20, 'Mañana', 'am', 'A', '2023-03-01 15:54:45', 2, 7),
(21, 'Tarde', 'pm', 'A', '2023-03-01 15:54:45', 3, 7),
(22, 'Fijo', 'F', 'A', '2023-05-05 01:09:10', 5, 3),
(23, 'Celular', 'Cel', 'A', '2023-05-05 01:09:10', 5, 3),
(35, 'Ciencias Naturales y Educacion Ambiental', '01', 'A', '2023-05-08 18:23:51', 5, 9),
(36, 'Ciencias Sociales, Geografi, Constitucion politica', '02', 'A', '2023-05-08 18:23:51', 5, 9),
(37, 'Educacion Artistica', '03', 'A', '2023-05-08 18:23:51', 5, 9),
(38, 'Matematicas', '08', 'A', '2023-05-08 18:23:51', 5, 9),
(39, 'Educacion Etica y en Valores Humanos', '04', 'A', '2023-05-08 18:23:51', 5, 9),
(40, 'Educacion fisica Recreacion y Deportes', '05', 'A', '2023-05-08 18:23:51', 5, 9),
(41, 'Educacion Religiosa', '06', 'A', '2023-05-08 18:23:51', 5, 9),
(42, 'Humanidades Lengua Castellana e Idiomas', '07', 'A', '2023-05-08 18:23:51', 5, 9),
(43, 'Tecnologia e Informatica', '09', 'A', '2023-05-08 18:23:51', 5, 9),
(44, 'Formacion ciudadana', '10', 'A', '2023-05-08 18:23:51', 6, 9),
(45, 'Emprendimiento y empresario', '11', 'A', '2023-05-08 18:23:51', 5, 9),
(46, '06:30:00', 'hr-6-3', 'A', '2023-05-11 14:14:39', 5, 13),
(47, '07:30:00', 'hr-7-3', 'A', '2023-05-11 14:14:39', 4, 13),
(48, '08:30:00', 'hr-8-3', 'A', '2023-05-11 14:14:39', 5, 13),
(49, '09:30:00', 'hr-8-3', 'A', '2023-05-11 14:14:39', 5, 13),
(50, '10:00:00', 'hr-10-3', 'A', '2023-05-11 15:30:34', 5, 13),
(51, '10:30:00', 'hr-11-3', 'A', '2023-05-11 15:31:09', 5, 13),
(52, '11:30:00', 'hr-12-3', 'A', '2023-05-11 15:31:41', 5, 13),
(53, '12:30:00', 'hr-13-3', 'A', '2023-05-11 15:32:14', 5, 13),
(54, '13:30:00', 'hr-14-3', 'A', '2023-05-11 15:35:47', 5, 13),
(55, '14:30:00', 'hr-15-3', 'A', '2023-05-11 15:36:05', 5, 13),
(56, '15:30:00', 'hr-16-3', 'A', '2023-05-11 15:36:43', 5, 13),
(57, '16:30:00', 'hr-17-3', 'A', '2023-05-11 15:36:59', 5, 13),
(58, '17:00:00', 'hr-18-3', 'A', '2023-05-11 15:38:36', 5, 13),
(60, '06:30:00', 'hr-6-3', 'A', '2023-05-11 19:14:39', 5, 12),
(61, '07:15:00', 'hr-7-15', 'A', '2023-05-11 19:14:39', 4, 12),
(62, '08:00:00', 'hr-8', 'A', '2023-05-11 19:14:39', 5, 12),
(63, '08:45:00', 'hr-8-45', 'A', '2023-05-11 19:14:39', 5, 12),
(64, '9:30:00', 'hr-9-3', 'A', '2023-05-11 19:14:39', 5, 12),
(65, '10:00:00', 'hr-10', 'A', '2023-05-11 19:14:39', 5, 12),
(66, '10:45:00', 'hr-11-45', 'A', '2023-05-11 19:14:39', 5, 12),
(67, '11:30:00', 'hr-11-3', 'A', '2023-05-11 19:14:39', 5, 12),
(68, '12:00:00', 'hr-12-15', 'A', '2023-05-11 19:14:39', 5, 12),
(69, '13:00:00', 'hr-13', 'A', '2023-05-11 19:14:39', 5, 12),
(70, '13:45:00', 'hr-13-45', 'A', '2023-05-11 19:14:39', 5, 12),
(71, '14:30:00', 'hr-14-3', 'A', '2023-05-11 19:14:39', 5, 12),
(72, '15:15:00', 'hr-15-15', 'A', '2023-05-11 19:14:39', 5, 12),
(73, '16:00:00', 'hr-16', 'A', '2023-05-11 19:14:39', 5, 12),
(74, '16:30:00', 'hr-16-3', 'A', '2023-05-11 19:14:39', 5, 12),
(75, '17:15:00', 'hr-17-3', 'A', '2023-05-11 19:14:39', 5, 12),
(76, '18:00:00', 'hr-18-15', 'A', '2023-05-11 19:14:39', 5, 12),
(77, '18:45:00', 'hr-18-45', 'A', '2023-05-11 19:14:39', 5, 12),
(78, '18:00:00', 'hr-18', 'A', '2023-05-11 15:41:26', 5, 13),
(79, 'Aula Ordinaria', 'AO', 'A', '2023-05-11 22:56:45', 5, 14),
(80, 'Aula Especial', 'AE', 'A', '2023-05-11 22:56:45', 5, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_enc`
--

CREATE TABLE `parametro_enc` (
  `id_enc` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parametro_enc`
--

INSERT INTO `parametro_enc` (`id_enc`, `nombre`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'N° Documento', 'A', '2023-03-01 15:11:38', 2),
(2, 'Prioridad', 'A', '2023-03-01 15:27:28', 2),
(3, 'Tipo de Telefono', 'A', '2023-03-01 15:43:05', 3),
(4, 'Dias', 'A', '2023-03-01 15:45:32', 2),
(5, 'Bloque', 'A', '2023-03-01 15:45:32', 3),
(6, 'Sede', 'A', '2023-03-01 15:46:02', 2),
(7, 'Jornada', 'A', '2023-03-01 15:46:02', 3),
(9, 'Area', 'A', '2023-05-10 13:18:07', 5),
(12, 'Franja_45_Min', 'A', '2023-05-11 13:59:18', 5),
(13, 'Franja_60_Min', 'A', '2023-05-11 13:59:18', 5),
(14, 'Tipo Aula', 'A', '2023-05-11 22:54:38', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` smallint(2) NOT NULL,
  `id_rol` smallint(2) NOT NULL,
  `id_accion` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `id_rol`, `id_accion`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 1, 1, '2023-05-10 21:06:32', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Super Administrador', '', 'A', '2023-05-09 15:15:20', 5),
(2, 'Administrador', '', 'A', '2023-03-01 15:25:28', 2),
(3, 'Estudiante', '', 'A', '2023-03-01 15:25:28', 2),
(4, 'Profesor', '', 'A', '2023-03-01 15:25:36', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id_telefono` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `numero` char(15) NOT NULL,
  `tipo` smallint(2) NOT NULL,
  `prioridad` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id_telefono`, `id_usuario`, `numero`, `tipo`, `prioridad`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 6, '3012484', 22, 6, 'A', '2023-05-09 17:39:48', 6),
(2, 3, 'a@gmail.com', 22, 6, 'E', '2023-05-09 14:26:23', 5),
(3, 3, 'b@gmail.com', 22, 6, 'E', '2023-05-09 14:28:07', 5),
(4, 3, 'z@gmail.com', 22, 6, 'E', '2023-05-09 14:28:38', 5),
(5, 3, 'aw@gmail.com', 22, 6, 'E', '2023-05-09 14:39:50', 5),
(6, 3, '302121455', 22, 6, 'A', '2023-05-09 20:13:52', 5),
(7, 5, '30244154', 22, 6, 'A', '2023-05-09 20:14:28', 5),
(8, 15, '3045334401', 23, 6, 'A', '2023-05-10 18:50:13', 5),
(9, 3, '321123', 22, 7, 'A', '2023-05-11 17:10:18', 5),
(10, 16, '302151214', 22, 6, 'A', '2023-05-12 03:37:58', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(2) NOT NULL,
  `nombre_corto` varchar(30) NOT NULL,
  `n_documento` varchar(15) NOT NULL,
  `nombre_p` varchar(20) NOT NULL,
  `nombre_s` varchar(20) NOT NULL,
  `apellido_p` varchar(20) NOT NULL,
  `apellido_s` varchar(20) NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `id_rol` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `tipo_documento` smallint(2) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_corto`, `n_documento`, `nombre_p`, `nombre_s`, `apellido_p`, `apellido_s`, `contraseña`, `id_rol`, `estado`, `fecha_crea`, `usuario_crea`, `tipo_documento`, `direccion`) VALUES
(2, 'Bazuk0', '1043663815', 'Daniel', 'Andres', 'Sanchez', 'Castro', 'daniel123', 1, 'E', '2023-04-18 22:49:28', 1, 2, 'cra17b #68c23'),
(3, 'Belzera', '1044606928', 'Darell', 'Orlando', 'Estren', 'Escorcia', 'daniel123', 1, 'A', '2023-05-05 03:58:31', 5, 2, 'Circular #57D ##49 - 47'),
(4, 'Socie', '1042241687', 'Santiago', 'Franchesco', 'Lobelo', 'Orozco', 'santy123', 4, 'A', '2023-04-25 16:28:03', 6, 2, 'Calle 45K #85A - 96'),
(5, 'Root', '1234', 'root', 'root', 'root', 'root', '$2y$10$OHIbghN0jnRl69yCYcSeTeXJHCsE20NyJvaVzLz5rey7QERwFZ4oC', 1, 'A', '2023-05-09 15:14:27', 5, 2, 'Carrera 12 #21 - 21'),
(6, 'daniel.exe', '1043663815', 'Daniel', 'Andres', 'Sanchez', 'Castro', '$2y$10$0MllpTzQIIHtbK/CeX9tl.6Ym2vI2Ay3KfR58EBwoEKLMGqN9TXi6', 1, 'A', '2023-05-09 12:36:51', 6, 2, 'Carrera 17B #68C - 23'),
(7, 'pepe.prueba', '1243569', 'prueba', 'prueba', 'prueba', 'prueba', '$2y$10$jR0UeFeMbPg9xB5bXcixDe3loKnRqPMrCkIhY0XU87/PRz1iMTHgS', 3, 'A', '2023-05-09 14:50:40', 6, 1, ''),
(8, 'prueba', '00000000000', 'prueba', 'prueba', 'prueba', 'prueba', '$2y$10$TOxV6TE5bkGBZ8hPrtBqEOGzGTaDykIk4UvDU7ebLhF.gqWDSnhVC', 3, 'A', '2023-05-09 14:48:25', 6, 2, 'Carrera 1111 #1111 - 1111'),
(9, 'prueba', '1000000', 'dsad', 'dsad', 'dsad', 'dsad', '$2y$10$gHQ6lte0CfG9MwN45nlL0eg0U9TzoGykinYV7M1BWovVZKyQiUu0y', 3, 'A', '2023-05-09 14:46:10', 6, 2, 'Carrera 17B #69 - 23'),
(10, 'prueba.estudian', '1143659723', 'Benito', 'Adidas', 'Valenciaga', 'Nike', '$2y$10$Epv0.LbHbpCq05XCwNWhOebehwxXo31DRv0JFQZMyoQYbtrLVhojW', 3, 'A', '2023-05-09 15:27:19', 5, 1, 'Autopista 45H #78B - 75'),
(11, 'padilla.exe', '1044606953', 'Juan', 'David', 'Padilla', 'Salcedo', '$2y$10$ufXV6GqJpDuF9j/qz8xBFeDND4FaOi54BbZhcX4lHjD/dDhrY2qZS', 3, 'A', '2023-05-09 15:27:24', 5, 1, 'Autopista 78A #45 - 95'),
(12, 'prueba.daniel', '00000000', 'prueba', 'prueba', 'prueba', 'prueba', '$2y$10$4feQNN.y1QORbuKOf2xA1u22Eqj/adnjLSnRq8pBAUM.8uIZjmW3S', 3, 'A', '2023-04-28 19:05:51', 6, 1, 'Carrera 45A #755 - 32'),
(13, 'profesor.prueba', '444444444', 'prueba', 'prueba', 'prueba', 'prueba', '$2y$10$877S1FRBY1fVZFBBNy//PuVhayhVerK1guCxnHBKUml2oxs9hiRxe', 4, 'A', '2023-05-05 01:47:31', 5, 2, 'Avenida 85 #455 - 89'),
(14, '', '541441', 'a', 'a', 'a', 'a', '$2y$10$LBaLnOb.JY0iQP8GAry6qu7XoKJQg2C37mplhABiW3ZPKe.q.99fe', 1, 'A', '2023-05-05 07:19:02', 5, 2, 'Kilometro A #A - A'),
(15, '', '1048064782', 'Camilo', 'Andres', 'Castillo ', 'Pineda', '$2y$10$cjDx28TCh1rAB14j9GbTYul/aUcJ1HDo.thOZWBvlA1NY2AyPcJN2', 1, 'A', '2023-05-10 18:50:12', 5, 2, 'Calle 40 #17D - 14'),
(16, '', '123456456', 'Profe', 'Profe', 'Profe', 'Profe', '$2y$10$Xbvu8rOAUVRP/en1ApdxbucI2OG9NF/iybA94VHjszmH1WbaGrJIu', 4, 'A', '2023-05-12 03:37:58', 5, 2, 'Carrera 1 #1 - 1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_param_det`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_param_det` (
`id_parametro_det` smallint(2)
,`nombre` varchar(50)
,`resumen` varchar(10)
,`estado` char(1)
,`fecha_crea` timestamp
,`usuario_crea` smallint(2)
,`id_enc` smallint(2)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `detalle`
--
DROP TABLE IF EXISTS `detalle`;

CREATE VIEW `detalle`  AS SELECT `horarios_enc`.`id_horarios_enc` AS `id_encabezado`, `horarios_enc`.`periodo_año` AS `periodo`, `horarios_enc`.`inicio` AS `inicio_jornada`, `horarios_enc`.`fin` AS `fin_jornada`, `grados`.`alias` AS `grado`, `parametro_det`.`nombre` AS `jornada`, `horario_det`.`id_horario_det` AS `id_horario_det`, `asignaturas`.`nombre` AS `asignatura`, `aulas`.`nombre` AS `aula`, `horario_det`.`hora_inicio` AS `hora_inicio`, `horario_det`.`duracion` AS `duracion`, `usuarios`.`nombre_p` AS `profesor` FROM ((((((((`horarios_enc` join `grados` on(`horarios_enc`.`id_grado` = `grados`.`id_grado`)) join `parametro_det` on(`horarios_enc`.`jornada` = `parametro_det`.`id_parametro_det`)) join `horario_det` on(`horarios_enc`.`id_horarios_enc` = `horario_det`.`id_horario_enc`)) join `grados_asignatura` on(`horario_det`.`id_grado_asignatura` = `grados_asignatura`.`id_grado_asignatura`)) join `asignaturas` on(`grados_asignatura`.`id_grado_asignatura` = `asignaturas`.`id_asignatura`)) join `aulas` on(`horario_det`.`id_aula` = `aulas`.`id_aula`)) join `asignatura_profesores` on(`grados_asignatura`.`id_grado_asignatura` = `asignatura_profesores`.`id_grado_asignatura`)) join `usuarios` on(`horario_det`.`profesor` = `usuarios`.`id_usuario`)) WHERE `horarios_enc`.`estado` = 'A' AND `horarios_enc`.`id_horarios_enc` = `horario_det`.`id_horario_enc` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_param_det`
--
DROP TABLE IF EXISTS `vw_param_det`;

CREATE VIEW `vw_param_det`  AS SELECT `parametro_det`.`id_parametro_det` AS `id_parametro_det`, `parametro_det`.`nombre` AS `nombre`, `parametro_det`.`resumen` AS `resumen`, `parametro_det`.`estado` AS `estado`, `parametro_det`.`fecha_crea` AS `fecha_crea`, `parametro_det`.`usuario_crea` AS `usuario_crea`, `parametro_det`.`id_enc` AS `id_enc` FROM `parametro_det` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_acciones`),
  ADD KEY `crea_accion` (`usuario_crea`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `crea_asignatura` (`usuario_crea`),
  ADD KEY `tipo_aula_req` (`tipo_requerido`),
  ADD KEY `Area_codigo` (`Codigo`);

--
-- Indices de la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  ADD PRIMARY KEY (`id_asignatura_profesor`),
  ADD KEY `gradoasig_asigprofesor` (`id_grado_asignatura`),
  ADD KEY `usuarios_asigprofesor` (`id_usuario`),
  ADD KEY `creado_asigprof` (`usuario_crea`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `creadol_aula` (`usuario_crea`),
  ADD KEY `tipo_aula` (`tipo`);

--
-- Indices de la tabla `disponibilidad_prof`
--
ALTER TABLE `disponibilidad_prof`
  ADD PRIMARY KEY (`id_disponibilidad_prof`),
  ADD KEY `usucrea_disponibilidad` (`usuario_crea`),
  ADD KEY `usuario_dispo` (`id_usuario`),
  ADD KEY `dia_dispo` (`dia`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `usuario_email` (`id_usuario`),
  ADD KEY `creador_email` (`usuario_crea`),
  ADD KEY `det_email` (`prioridad`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `usuario_estu` (`id_usuario`),
  ADD KEY `creadorusu_estudiante` (`usuario_crea`),
  ADD KEY `grado_estudiante` (`id_grado`);

--
-- Indices de la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  ADD PRIMARY KEY (`id_franja_horaria`),
  ADD KEY `usuariocrea_franjah` (`usuario_crea`),
  ADD KEY `dia_franja` (`dia`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `usu_grado` (`usuario_crea`);

--
-- Indices de la tabla `grados_asignatura`
--
ALTER TABLE `grados_asignatura`
  ADD PRIMARY KEY (`id_grado_asignatura`),
  ADD KEY `crador_gradosasignatura` (`usuario_crea`),
  ADD KEY `grado_gradoasig` (`id_grado`),
  ADD KEY `asig_gradoasig` (`id_asignatura`);

--
-- Indices de la tabla `horarios_enc`
--
ALTER TABLE `horarios_enc`
  ADD PRIMARY KEY (`id_horarios_enc`),
  ADD KEY `creador_horario` (`usuario_crea`),
  ADD KEY `jornada_enc` (`jornada`),
  ADD KEY `horario_grado` (`id_grado`),
  ADD KEY `duracion_hora` (`duracion_hora`),
  ADD KEY `hora_inicio` (`inicio`),
  ADD KEY `hora_fin` (`fin`);

--
-- Indices de la tabla `horario_det`
--
ALTER TABLE `horario_det`
  ADD PRIMARY KEY (`id_horario_det`),
  ADD KEY `aula_horario` (`id_aula`),
  ADD KEY `gradoa_horario` (`id_grado_asignatura`),
  ADD KEY `horarioenc_horario` (`id_horario_enc`),
  ADD KEY `cread_horariodet` (`usuario_crea`),
  ADD KEY `horario_profesor` (`profesor`),
  ADD KEY `hora_inicioD` (`hora_inicio`),
  ADD KEY `dia_param` (`dia`);

--
-- Indices de la tabla `parametro_det`
--
ALTER TABLE `parametro_det`
  ADD PRIMARY KEY (`id_parametro_det`),
  ADD KEY `enc_det` (`id_enc`),
  ADD KEY `creador_parametro` (`usuario_crea`);

--
-- Indices de la tabla `parametro_enc`
--
ALTER TABLE `parametro_enc`
  ADD PRIMARY KEY (`id_enc`),
  ADD KEY `crea_parametro` (`usuario_crea`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `rol_permiso` (`id_rol`),
  ADD KEY `accion_permiso` (`id_accion`),
  ADD KEY `creador_permiso` (`usuario_crea`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD KEY `crea_rol` (`usuario_crea`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id_telefono`),
  ADD KEY `det_telefono` (`prioridad`),
  ADD KEY `creador_telefono` (`usuario_crea`),
  ADD KEY `usuarios_telefonos` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `creador_usuario` (`usuario_crea`),
  ADD KEY `rol_usuario` (`id_rol`),
  ADD KEY `tipodoc_usuario` (`tipo_documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id_acciones` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asignatura` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  MODIFY `id_asignatura_profesor` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `disponibilidad_prof`
--
ALTER TABLE `disponibilidad_prof`
  MODIFY `id_disponibilidad_prof` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id_email` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  MODIFY `id_franja_horaria` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grados_asignatura`
--
ALTER TABLE `grados_asignatura`
  MODIFY `id_grado_asignatura` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horarios_enc`
--
ALTER TABLE `horarios_enc`
  MODIFY `id_horarios_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horario_det`
--
ALTER TABLE `horario_det`
  MODIFY `id_horario_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `parametro_det`
--
ALTER TABLE `parametro_det`
  MODIFY `id_parametro_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `parametro_enc`
--
ALTER TABLE `parametro_enc`
  MODIFY `id_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD CONSTRAINT `crea_accion` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `Area_codigo` FOREIGN KEY (`Codigo`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `crea_asignatura` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `tipo_aula_req` FOREIGN KEY (`tipo_requerido`) REFERENCES `parametro_det` (`id_parametro_det`);

--
-- Filtros para la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  ADD CONSTRAINT `creado_asigprof` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `gradoasig_asigprofesor` FOREIGN KEY (`id_grado_asignatura`) REFERENCES `grados_asignatura` (`id_grado_asignatura`),
  ADD CONSTRAINT `usuarios_asigprofesor` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `creadol_aula` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `tipo_aula` FOREIGN KEY (`tipo`) REFERENCES `parametro_det` (`id_parametro_det`);

--
-- Filtros para la tabla `disponibilidad_prof`
--
ALTER TABLE `disponibilidad_prof`
  ADD CONSTRAINT `dia_dispo` FOREIGN KEY (`dia`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `usuario_dispo` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `usucrea_disponibilidad` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `creador_email` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `det_email` FOREIGN KEY (`prioridad`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `usuario_email` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `creadorusu_estudiante` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `grado_estudiante` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `usuario_estu` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  ADD CONSTRAINT `dia_franja` FOREIGN KEY (`dia`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `usuariocrea_franjah` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `usu_grado` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `grados_asignatura`
--
ALTER TABLE `grados_asignatura`
  ADD CONSTRAINT `asig_gradoasig` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`),
  ADD CONSTRAINT `crador_gradosasignatura` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `grado_gradoasig` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`);

--
-- Filtros para la tabla `horarios_enc`
--
ALTER TABLE `horarios_enc`
  ADD CONSTRAINT `creador_horario` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `duracion_hora` FOREIGN KEY (`duracion_hora`) REFERENCES `parametro_enc` (`id_enc`),
  ADD CONSTRAINT `hora_fin` FOREIGN KEY (`fin`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `hora_inicio` FOREIGN KEY (`inicio`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `horario_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `jornada_enc` FOREIGN KEY (`jornada`) REFERENCES `parametro_det` (`id_parametro_det`);

--
-- Filtros para la tabla `horario_det`
--
ALTER TABLE `horario_det`
  ADD CONSTRAINT `aula_horario` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`),
  ADD CONSTRAINT `cread_horariodet` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `dia_param` FOREIGN KEY (`dia`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `gradoa_horario` FOREIGN KEY (`id_grado_asignatura`) REFERENCES `grados_asignatura` (`id_grado_asignatura`),
  ADD CONSTRAINT `hora_inicioD` FOREIGN KEY (`hora_inicio`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `horario_profesor` FOREIGN KEY (`profesor`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `horarioenc_horario` FOREIGN KEY (`id_horario_enc`) REFERENCES `horarios_enc` (`id_horarios_enc`);

--
-- Filtros para la tabla `parametro_det`
--
ALTER TABLE `parametro_det`
  ADD CONSTRAINT `creador_parametro` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `enc_det` FOREIGN KEY (`id_enc`) REFERENCES `parametro_enc` (`id_enc`);

--
-- Filtros para la tabla `parametro_enc`
--
ALTER TABLE `parametro_enc`
  ADD CONSTRAINT `crea_parametro` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `accion_permiso` FOREIGN KEY (`id_accion`) REFERENCES `acciones` (`id_acciones`),
  ADD CONSTRAINT `creador_permiso` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `rol_permiso` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `crea_rol` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `creador_telefono` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `det_telefono` FOREIGN KEY (`prioridad`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `usuarios_telefonos` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol_usuario` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `tipodoc_usuario` FOREIGN KEY (`tipo_documento`) REFERENCES `parametro_det` (`id_parametro_det`);
COMMIT;
