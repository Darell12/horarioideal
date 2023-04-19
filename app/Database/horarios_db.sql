-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2023 a las 06:30:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
  `horas_semanales` char(15) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `usuario_crea` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre`, `horas_semanales`, `estado`, `usuario_crea`, `fecha_crea`) VALUES
(1, 'Matematicas', '6', 'A', 5, '2023-04-19 01:08:56'),
(2, 'Programacion', '10', 'A', 5, '2023-04-19 03:30:03');

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
(2, 3, 2, '2023-04-19 03:32:38', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` smallint(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `bloque` smallint(2) NOT NULL,
  `sede` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id_aula`, `nombre`, `descripcion`, `bloque`, `sede`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 'Dim 1', 'Descripcion random', 14, 18, 'A', '2023-04-19 02:42:42', 5);

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
(1, 2, 1, '2023-04-18 23:33:02', 5, 'A');

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
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `franjas_horarias`
--

INSERT INTO `franjas_horarias` (`id_franja_horaria`, `estado`, `usuario_crea`, `fecha_crea`, `hora_inicio`, `hora_fin`) VALUES
(1, 'A', 5, '2023-04-19 01:13:41', '06:30:00', '07:30:00');

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
(1, '9-A', 'A', '2023-04-18 23:32:40', 5);

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
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grados_asignatura`
--

INSERT INTO `grados_asignatura` (`id_grado_asignatura`, `id_grado`, `id_asignatura`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 1, 1, '2023-04-19 01:09:46', 5, 'A'),
(2, 1, 2, '2023-04-19 03:31:35', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `horario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `horario` (
`id_encabezado` smallint(2)
,`periodo` year(4)
,`grado` varchar(30)
,`jornada` varchar(50)
,`id_horario_det` smallint(2)
,`asignatura` varchar(20)
,`aula` varchar(20)
,`hora_inicio` time
,`hora_fin` time
,`profesor` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_enc`
--

CREATE TABLE `horarios_enc` (
  `id_horarios_enc` smallint(2) NOT NULL,
  `id_usuario` smallint(2) NOT NULL,
  `id_grado` smallint(2) NOT NULL,
  `periodo_año` year(4) NOT NULL,
  `jornada` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios_enc`
--

INSERT INTO `horarios_enc` (`id_horarios_enc`, `id_usuario`, `id_grado`, `periodo_año`, `jornada`, `estado`, `fecha_crea`, `usuario_crea`) VALUES
(1, 4, 1, '2023', 20, 'A', '2023-04-19 02:48:30', 5);

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
  `id_franja_horaria` smallint(2) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_crea` smallint(2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_det`
--

INSERT INTO `horario_det` (`id_horario_det`, `id_grado_asignatura`, `id_aula`, `id_horario_enc`, `profesor`, `id_franja_horaria`, `fecha_crea`, `usuario_crea`, `estado`) VALUES
(1, 1, 1, 1, 4, 1, '2023-04-19 03:28:36', 5, 'A'),
(2, 2, 1, 1, 5, 1, '2023-04-19 03:33:14', 5, 'A');

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
(21, 'Tarde', 'pm', 'A', '2023-03-01 15:54:45', 3, 7);

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
(7, 'Jornada', 'A', '2023-03-01 15:46:02', 3);

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
(1, 'Super Administrador', '', 'A', '2023-03-01 15:24:58', 2),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(2) NOT NULL,
  `nombre_corto` varchar(15) NOT NULL,
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
(3, 'Belzera', '1044606928', 'Darell', 'Orlando', 'Estren', 'Escorcia', 'daniel123', 1, 'A', '2023-03-01 15:40:03', 1, 2, 'cra48A #57D-49'),
(4, 'Socie', '1042241687', 'Santiago', 'Franchesco', 'Lobelo', 'Orozco', 'santy123', 4, 'A', '2023-04-19 03:28:05', 2, 2, 'calle11G #1B-88'),
(5, 'Root', '1234', 'root', 'root', 'root', 'root', '$2y$10$OHIbghN0jnRl69yCYcSeTeXJHCsE20NyJvaVzLz5rey7QERwFZ4oC', 1, 'A', '2023-04-19 04:04:00', 2, 2, 'root');

-- --------------------------------------------------------

--
-- Estructura para la vista `horario`
--
DROP TABLE IF EXISTS `horario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `horario`  AS SELECT `horarios_enc`.`id_horarios_enc` AS `id_encabezado`, `horarios_enc`.`periodo_año` AS `periodo`, `grados`.`alias` AS `grado`, `parametro_det`.`nombre` AS `jornada`, `horario_det`.`id_horario_det` AS `id_horario_det`, `asignaturas`.`nombre` AS `asignatura`, `aula`.`nombre` AS `aula`, `franjas_horarias`.`hora_inicio` AS `hora_inicio`, `franjas_horarias`.`hora_fin` AS `hora_fin`, `usuarios`.`nombre_corto` AS `profesor` FROM ((((((((`horarios_enc` join `grados` on(`horarios_enc`.`id_grado` = `grados`.`id_grado`)) join `parametro_det` on(`horarios_enc`.`jornada` = `parametro_det`.`id_parametro_det`)) join `horario_det` on(`horarios_enc`.`id_horarios_enc` = `horario_det`.`id_horario_enc`)) join `usuarios` on(`horario_det`.`profesor` = `usuarios`.`id_usuario`)) join `grados_asignatura` on(`horario_det`.`id_grado_asignatura` = `grados_asignatura`.`id_grado_asignatura`)) join `asignaturas` on(`grados_asignatura`.`id_grado_asignatura` = `asignaturas`.`id_asignatura`)) join `aula` on(`horario_det`.`id_aula` = `aula`.`id_aula`)) join `franjas_horarias` on(`horario_det`.`id_franja_horaria` = `franjas_horarias`.`id_franja_horaria`)) WHERE `horarios_enc`.`estado` = 'A' AND `horarios_enc`.`id_horarios_enc` = `horario_det`.`id_horario_enc` ;

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
  ADD KEY `crea_asignatura` (`usuario_crea`);

--
-- Indices de la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  ADD PRIMARY KEY (`id_asignatura_profesor`),
  ADD KEY `gradoasig_asigprofesor` (`id_grado_asignatura`),
  ADD KEY `usuarios_asigprofesor` (`id_usuario`),
  ADD KEY `creado_asigprof` (`usuario_crea`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `creadol_aula` (`usuario_crea`),
  ADD KEY `bloque_aula` (`bloque`),
  ADD KEY `sede_aula` (`sede`);

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
  ADD KEY `usuariocrea_franjah` (`usuario_crea`);

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
  ADD KEY `usuarios_enc` (`id_usuario`),
  ADD KEY `creador_horario` (`usuario_crea`),
  ADD KEY `jornada_enc` (`jornada`),
  ADD KEY `horario_grado` (`id_grado`);

--
-- Indices de la tabla `horario_det`
--
ALTER TABLE `horario_det`
  ADD PRIMARY KEY (`id_horario_det`),
  ADD KEY `aula_horario` (`id_aula`),
  ADD KEY `fh_horario` (`id_franja_horaria`),
  ADD KEY `gradoa_horario` (`id_grado_asignatura`),
  ADD KEY `horarioenc_horario` (`id_horario_enc`),
  ADD KEY `cread_horariodet` (`usuario_crea`),
  ADD KEY `horario_profesor` (`profesor`);

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
  MODIFY `id_asignatura` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  MODIFY `id_asignatura_profesor` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `disponibilidad_prof`
--
ALTER TABLE `disponibilidad_prof`
  MODIFY `id_disponibilidad_prof` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id_email` smallint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `franjas_horarias`
--
ALTER TABLE `franjas_horarias`
  MODIFY `id_franja_horaria` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grados_asignatura`
--
ALTER TABLE `grados_asignatura`
  MODIFY `id_grado_asignatura` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarios_enc`
--
ALTER TABLE `horarios_enc`
  MODIFY `id_horarios_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario_det`
--
ALTER TABLE `horario_det`
  MODIFY `id_horario_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `parametro_det`
--
ALTER TABLE `parametro_det`
  MODIFY `id_parametro_det` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `parametro_enc`
--
ALTER TABLE `parametro_enc`
  MODIFY `id_enc` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` smallint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id_telefono` smallint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `crea_asignatura` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `asignatura_profesores`
--
ALTER TABLE `asignatura_profesores`
  ADD CONSTRAINT `creado_asigprof` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `gradoasig_asigprofesor` FOREIGN KEY (`id_grado_asignatura`) REFERENCES `grados_asignatura` (`id_grado_asignatura`),
  ADD CONSTRAINT `usuarios_asigprofesor` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `bloque_aula` FOREIGN KEY (`bloque`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `creadol_aula` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `sede_aula` FOREIGN KEY (`sede`) REFERENCES `parametro_det` (`id_parametro_det`);

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
  ADD CONSTRAINT `horario_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `jornada_enc` FOREIGN KEY (`jornada`) REFERENCES `parametro_det` (`id_parametro_det`),
  ADD CONSTRAINT `usuarios_enc` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `horario_det`
--
ALTER TABLE `horario_det`
  ADD CONSTRAINT `aula_horario` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`),
  ADD CONSTRAINT `cread_horariodet` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `fh_horario` FOREIGN KEY (`id_franja_horaria`) REFERENCES `franjas_horarias` (`id_franja_horaria`),
  ADD CONSTRAINT `gradoa_horario` FOREIGN KEY (`id_grado_asignatura`) REFERENCES `grados_asignatura` (`id_grado_asignatura`),
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
