-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 19:46:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reporter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `id_Expediente` varchar(20) DEFAULT NULL,
  `tipo_de_sujeto` varchar(20) NOT NULL,
  `identificador` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `miembros` int(20) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `edad` int(3) DEFAULT NULL,
  `cedula` varchar(20) NOT NULL,
  `estatus_de_solicitud` varchar(20) NOT NULL,
  `fecha_de_solicitud` date NOT NULL,
  `hectarea` decimal(10,2) DEFAULT NULL,
  `municipio` varchar(50) NOT NULL,
  `parroquia` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `id_de_inspeccion` int(20) DEFAULT NULL,
  `id_de_solicitud` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `id_Expediente`, `tipo_de_sujeto`, `identificador`, `nombre`, `miembros`, `genero`, `edad`, `cedula`, `estatus_de_solicitud`, `fecha_de_solicitud`, `hectarea`, `municipio`, `parroquia`, `estado`, `sede`, `id_de_inspeccion`, `id_de_solicitud`) VALUES
(81, 'EXP-001', 'Persona Natural', 'V-987654321', 'Juan Pérez', NULL, 'Masculino', 35, 'V-123456789', 'Activo', '2022-01-01', 10.50, 'Aragua', 'Maracay', 'Parroquia El Carmen', 'Sede Principal', 12345678, 87654321),
(82, 'EXP-002', 'Persona Jurídica', 'V-123456789', 'Alejandra Gómez', 2, 'Femenino', 40, 'V-987654321', 'Inactivo', '2022-02-01', 20.00, 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Secundaria', 23456789, 76543210),
(83, 'EXP-003', 'Grupo', 'V-222222222', 'Los Cañoneros', 3, 'Masculino', 30, 'V-111111111', 'Activo', '2022-03-01', 5.00, 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Terciaria', 34567890, 65432109),
(84, 'EXP-004', 'Persona Natural', 'V-333333333', 'Daniela Hernández', NULL, 'Femenino', 25, 'V-444444444', 'Inactivo', '2022-04-01', 15.00, 'Zulia', 'Maracaibo', 'Parroquia El Norte', 'Sede Cuaternaria', 45678901, 54321098),
(85, 'EXP-005', 'Persona Jurídica', 'V-444444444', 'Yusmairobis Díaz', 2, 'Masculino', 45, 'V-555555555', 'Activo', '2022-05-01', 25.00, 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Quintaria', 56789012, 43210987),
(86, 'EXP-006', 'Grupo', 'V-555555555', 'Los Adolescentes', 3, 'Femenino', 28, 'V-666666666', 'Inactivo', '2022-06-01', 10.00, 'Falcón', 'Punto Fijo', 'Parroquia El Este', 'Sede Sextaria', 67890123, 32109876),
(87, 'EXP-007', 'Persona Natural', 'V-666666666', 'Nefertitis García', NULL, 'Masculino', 32, 'V-777777777', 'Activo', '2022-07-01', 12.00, 'Yaracuy', 'San Felipe', 'Parroquia El Oeste', 'Sede Séptima', 78901234, 21098765),
(88, 'EXP-008', 'Persona Jurídica', 'V-777777777', 'Yaxilany Pérez', 2, 'Femenino', 38, 'V-888888888', 'Inactivo', '2022-08-01', 18.00, 'Cojedes', 'San Carlos', 'Parroquia El Norte', 'Sede Octava', 89012345, 10987654),
(89, 'EXP-009', 'Grupo', 'V-888888888', 'Los Amigos Invisibles', 3, 'Masculino', 29, 'V-999999999', 'Activo', '2022-09-01', 15.00, 'Guárico', 'San Juan de los Morros', 'Parroquia El Sur', 'Sede Novena', 90123456, 98765432),
(90, 'EXP-010', 'Persona Natural', 'V-999999999', 'María Rodríguez', NULL, 'Femenino', 42, 'V-000000000', 'Inactivo', '2022-10-01', 20.00, 'Aragua', 'Maracay', 'Parro quia El Carmen', 'Sede Décima', 1234567, 76543219),
(91, 'EXP-011', 'Persona Jurídica', 'V-111111111', 'Carlos López', 2, 'Masculino', 50, 'V-222222222', 'Activo', '2022-11-01', 30.00, 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Undécima', 12345678, 87654321),
(92, 'EXP-012', 'Grupo', 'V-222222222', 'Los Jóvenes', 3, 'Femenino', 26, 'V-333333333', 'Inactivo', '2022-12-01', 12.00, 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Duodécima', 23456789, 76543210),
(93, 'EXP-013', 'Persona Natural', 'V-333333333', 'Ana García', NULL, 'Femenino', 48, 'V-444444444', 'Activo', '2023-01-01', 25.00, 'Zulia', 'Maracaibo', 'Parroquia El Norte', 'Sede Decimotercera', 34567890, 65432109),
(94, 'EXP-014', 'Persona Jurídica', 'V-444444444', 'Juan Carlos', 2, 'Masculino', 55, 'V-555555555', 'Inactivo', '2023-02-01', 35.00, 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Decimocuarta', 45678901, 54321098),
(95, 'EXP-015', 'Grupo', 'V-555555555', 'Los Niños', 3, 'Masculino', 31, 'V-666666666', 'Activo', '2023-03-01', 20.00, 'Falcón', 'Punto Fijo', 'Parroquia El Este', 'Sede Decimoquinta', 56789012, 43210987),
(96, 'EXP-016', 'Persona Natural', 'V-666666666', 'María Elena', NULL, 'Femenino', 52, 'V-777777777', 'Inactivo', '2023-04-01', 30.00, 'Yaracuy', 'San Felipe', 'Parroquia El Oeste', 'Sede Decimosexta', 67890123, 32109876),
(97, 'EXP-017', 'Persona Jurídica', 'V-777777777', 'Luis Alberto', 2, 'Masculino', 58, 'V-888888888', 'Activo', '2023-05-01', 40.00, 'Cojedes', 'San Carlos', 'Parroquia El Norte', 'Sede Decimoséptima', 78901234, 21098765),
(98, 'EXP-018', 'Grupo', 'V-888888888', 'Los Ancianos', 3, 'Femenino', 34, 'V-999999999', 'Inactivo', '2023-06-01', 25.00, 'Guárico', 'San Juan de los Morros', 'Parroquia El Sur', 'Sede Decimoctava', 89012345, 10987654),
(99, 'EXP-019', 'Persona Natural', 'V-999999999', 'Carlos Eduardo', NULL, 'Masculino', 60, 'V-000000000', 'Activo', '2023-07-01', 45.00, 'Aragua', 'Maracay', 'Parroquia El Carmen', 'Sede Decimonovena', 90123456, 98765432),
(100, 'EXP-020', 'Persona Jurídica', 'V-111111111', 'María del Carmen', 2, 'Femenino', 62, 'V-222222222', 'Inactivo', '2023-08-01', 50.00, 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Vigésima', 1234567, 76543219),
(101, 'EXP-021', 'Grupo', 'V-222222222', 'Los Abuelos', 3, 'Masculino', 65, 'V-333333333', 'Activo', '2023-09-01', 55.00, 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Vigésimoprim era', 12345678, 87654321),
(102, 'EXP-022', 'Persona Natural', 'V-333333333', 'Juan José', NULL, 'Masculino', 68, 'V-444444444', 'Inactivo', '2023-10-01', 60.00, 'Zulia', 'Maracaibo', 'Parroquia El Norte', 'Sede Vigésimosegunda', 23456789, 76543210),
(103, 'EXP-023', 'Persona Jurídica', 'V-444444444', 'María Luisa', 2, 'Femenino', 70, 'V-555555555', 'Activo', '2023-11-01', 65.00, 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Vigésimotercera', 34567890, 65432109),
(104, 'EXP-024', 'Grupo', 'V-555555555', 'Los Jubilados', 3, 'Masculino', 72, 'V-666666666', 'Inactivo', '2023-12-01', 70.00, 'Falcón', 'Punto Fijo', 'Parroquia El Este', 'Sede Vigésimocuarta', 45678901, 54321098),
(105, 'EXP-025', 'Persona Natural', 'V-666666666', 'Ana María', NULL, 'Femenino', 75, 'V-777777777', 'Activo', '2024-01-01', 75.00, 'Yaracuy', 'San Felipe', 'Parroquia El Oeste', 'Sede Vigésimoquinta', 56789012, 43210987),
(106, 'EXP-026', 'Persona Jurídica', 'V-777777777', 'Juan Antonio', 2, 'Masculino', 78, 'V-888888888', 'Inactivo', '2024-02-01', 80.00, 'Cojedes', 'San Carlos', 'Parroquia El Norte', 'Sede Vigésimosexta', 67890123, 32109876),
(107, 'EXP-027', 'Grupo', 'V-888888888', 'Los Pensionados', 3, 'Femenino', 80, 'V-999999999', 'Activo', '2024-03-01', 85.00, 'Guárico', 'San Juan de los Morros', 'Parroquia El Sur', 'Sede Vigésimoséptima', 78901234, 21098765),
(108, 'EXP-028', 'Persona Natural', 'V-999999999', 'María Teresa', NULL, 'Femenino', 82, 'V-000000000', 'Inactivo', '2024-04-01', 90.00, 'Aragua', 'Maracay', 'Parroquia El Carmen', 'Sede Vigésimoctava', 89012345, 10987654),
(109, 'EXP-029', 'Persona Jurídica', 'V-111111111', 'Carlos Alberto', 2, 'Masculino', 85, 'V-222222222', 'Activo', '2024-05-01', 95.00, 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Vigésimonovena', 90123456, 98765432),
(110, 'EXP-030', 'Grupo', 'V-222222222', 'Los Jubilados', 3, 'Masculino', 88, 'V-333333333', 'Inactivo', '2024-06-01', 100.00, 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Trigésima', 1234567, 76543219),
(111, 'EXP-031', 'Persona Natural', 'V-333333333', 'Juan Carlos', NULL, 'Masculino', 90, 'V-444444444', 'Activo', '2024-07-01', 105.00, 'Zulia', 'Maracaibo', 'Parroquia El Norte', 'Sede Trigésimoprimera', 12345678, 87654321),
(112, 'EXP-032', 'Persona Jurídica', 'V-444444444', 'María Elena', 2, 'Femenino', 92, 'V-555555555', 'Inactivo', '2024-08-01', 110.00, 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Tr igésimosegunda', 23456789, 76543210),
(113, 'EXP-033', 'Grupo', 'V-555555555', 'Los Pensionados', 3, 'Masculino', 95, 'V-666666666', 'Activo', '2024-09-01', 115.00, 'Falcón', 'Punto Fijo', 'Parroquia El Este', 'Sede Trigésimotercera', 34567890, 65432109),
(114, 'EXP-034', 'Persona Natural', 'V-666666666', 'Ana María', NULL, 'Femenino', 97, 'V-777777777', 'Inactivo', '2024-10-01', 120.00, 'Yaracuy', 'San Felipe', 'Parroquia El Oeste', 'Sede Trigésimocuarta', 45678901, 54321098),
(115, 'EXP-035', 'Persona Jurídica', 'V-777777777', 'Juan Antonio', 2, 'Masculino', 100, 'V-888888888', 'Activo', '2024-11-01', 125.00, 'Cojedes', 'San Carlos', 'Parroquia El Norte', 'Sede Trigésimoquinta', 56789012, 43210987),
(116, 'EXP-036', 'Grupo', 'V-888888888', 'Los Jubilados', 3, 'Femenino', 102, 'V-999999999', 'Inactivo', '2024-12-01', 130.00, 'Guárico', 'San Juan de los Morros', 'Parroquia El Sur', 'Sede Trigésimosexta', 67890123, 32109876),
(117, 'EXP-037', 'Persona Natural', 'V-999999999', 'María Teresa', NULL, 'Femenino', 105, 'V-000000000', 'Activo', '2025-01-01', 135.00, 'Aragua', 'Maracay', 'Parroquia El Carmen', 'Sede Trigésimoséptima', 78901234, 21098765),
(118, 'EXP-038', 'Persona Jurídica', 'V-111111111', 'Carlos Alberto', 2, 'Masculino', 108, 'V-222222222', 'Inactivo', '2025-02-01', 140.00, 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Trigésimoctava', 89012345, 10987654),
(119, 'EXP-039', 'Grupo', 'V-222222222', 'Los Pensionados', 3, 'Masculino', 110, 'V-333333333', 'Activo', '2025-03-01', 145.00, 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Trigésimonovena', 90123456, 98765432);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`id`, `nombre`, `edad`, `cedula`, `sexo`, `telefono`, `cargo`, `avatar`) VALUES
(3, 'Any somosa', 23, '412421', 'Femenino', '432432432', 'Asistente', NULL),
(4, 'Urian', 31, '323232', 'Masculino', '432432432', 'Asistente', NULL),
(6, 'Abelado P', 39, '331232', 'Masculino', '23213213', 'Desarrollador', NULL),
(7, 'Camilo', 30, '444433', 'Masculino', '333434', 'Contador', NULL),
(9, 'Brenda Cataleya', 18, '111212', 'Masculino', '5565656', 'Desarrollador Web', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadas`
--

CREATE TABLE `trabajadas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_sujeto` varchar(255) DEFAULT NULL,
  `identificador` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `hectareas` decimal(10,2) DEFAULT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  `id_expediente` int(11) DEFAULT NULL,
  `id_punto_cuenta` int(11) DEFAULT NULL,
  `estatus_punto_cuenta` varchar(255) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `parroquia` varchar(255) DEFAULT NULL,
  `sede` varchar(255) DEFAULT NULL,
  `nro_expediente` varchar(255) DEFAULT NULL,
  `mes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajadas`
--

INSERT INTO `trabajadas` (`id`, `tipo_sujeto`, `identificador`, `nombre`, `telefono`, `sexo`, `edad`, `hectareas`, `id_solicitud`, `id_expediente`, `id_punto_cuenta`, `estatus_punto_cuenta`, `cedula`, `estado`, `municipio`, `parroquia`, `sede`, `nro_expediente`, `mes`) VALUES
(1, 'Persona Natural', '1234567890', 'Juan Pérez', '0212-1234567', 'Masculino', 35, 10.50, 1, 1, 1, 'Activo', 'V-987654321', 'Aragua', 'Maracay', 'Parroquia El Carmen', 'Sede Principal', 'EXP-001', 'Enero'),
(2, 'Persona Jurídica', '9876543210', 'Empresa XYZ', '0424-7654321', 'Femenino', 40, 20.00, 2, 2, 2, 'Inactivo', 'V-123456789', 'Miranda', 'Los Teques', 'Parroquia El Valle', 'Sede Secundaria', 'EXP-002', 'Febrero'),
(3, 'Grupo', '1111111111', 'Grupo ABC', '0414-9012345', 'Masculino', 30, 5.00, 3, 3, 3, 'Activo', 'V-222222222', 'Carabobo', 'Valencia', 'Parroquia El Centro', 'Sede Terciaria', 'EXP-003', 'Marzo'),
(4, 'Persona Natural', '2222222222', 'María García', '0416-1111111', 'Femenino', 25, 15.00, 4, 4, 4, 'Inactivo', 'V-333333333', 'Zulia', 'Maracaibo', 'Parroquia El Norte', 'Sede Cuaternaria', 'EXP-004', 'Abril'),
(5, 'Persona Jurídica', '3333333333', 'Empresa DEF', '0426-2222222', 'Masculino', 45, 25.00, 5, 5, 5, 'Activo', 'V-444444444', 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Quintaria', 'EXP-005', 'Mayo'),
(6, 'Grupo', '4444444444', 'Grupo DEF', '0212-3333333', 'Femenino', 28, 10.00, 6, 6, 6, 'Inactivo', 'V-555555555', 'Falcón', 'Punto Fijo', 'Parroquia El Este', 'Sede Sextaria', 'EXP-006', 'Junio'),
(7, 'Persona Natural', '5555555555', 'Carlos López', '0424-4444444', 'Masculino', 32, 12.00, 7, 7, 7, 'Activo', 'V-666666666', 'Yaracuy', 'San Felipe', 'Parroquia El Oeste', 'Sede Séptima', 'EXP-007', 'Julio'),
(8, 'Persona Jurídica', '6666666666', 'Empresa GHI', '0414-5555555', 'Femenino', 38, 18.00, 8, 8, 8, 'Inactivo', 'V-777777777', 'Cojedes', 'San Carlos', 'Parroquia El Norte', 'Sede Octava', 'EXP-008', 'Agosto'),
(9, 'Grupo', '7777777777', 'Grupo GHI', '0416-6666666', 'Masculino', 29, 15.00, 9, 9, 9, 'Activo', 'V-888888888', 'Guárico', 'San Juan de los Morros', 'Parroquia El Sur', 'Sede Novena', 'EXP-009', 'Septiembre'),
(10, 'Persona Natural', '8888888888', 'Ana Rodríguez', '0426-7777777', 'Femenino', 26, 10.00, 10, 10, 10, 'Inactivo', 'V-999999999', 'Apure', 'San Fernando de Apure', 'Parroquia El Este', 'Sede Décima', 'EXP-010', 'Octubre'),
(11, 'Persona Jurídica', '9999999999', 'Empresa JKL', '0212-8888888', 'Masculino', 31, 11.00, 11, 11, 11, 'Activo', 'V-1010101010', 'Amazonas', 'Puerto Ayacucho', 'Parroquia El Carmen', 'Sede Undécima', 'EXP-011', 'Noviembre'),
(12, 'Grupo', '1010101010', 'Grupo JKL', '0424-9999999', 'Femenino', 27, 12.00, 12, 12, 12, 'Inactivo', 'V-1111111111', 'Anzoátegui', 'Barcelona', 'Parroquia El Valle', 'Sede Duodécima', 'EXP-012', 'Diciembre'),
(13, 'Persona Natural', '1111111111', 'Pedro Gómez', '0414-1010101', 'Masculino', 33, 13.00, 13, 13, 13, 'Activo', 'V-1212121212', 'Bolívar', 'Ciudad Bolívar', 'Parroquia El Centro', 'Sede Tercera', 'EXP-013', 'Enero'),
(14, 'Persona Jurídica', '1212121212', 'Empresa MNO', '0416-1111111', 'Femenino', 36, 14.00, 14, 14, 14, 'Inactivo', 'V-1313131313', 'Monagas', 'Maturín', 'Parroquia El Norte', 'Sede Cuarta', 'EXP-014', 'Febrero'),
(15, 'Grupo', '1313131313', 'Grupo MNO', '0426-1212121', 'Masculino', 24, 16.00, 15, 15, 15, 'Activo', 'V-1414141414', 'Nueva Esparta', 'Porlamar', 'Parroquia El Sur', 'Sede Quinta', 'EXP-015', 'Marzo'),
(16, 'Persona Natural', '1414141414', 'María Hernández', '0212-1313131', 'Femenino', 39, 17.00, 16, 16, 16, 'Inactivo', 'V-1515151515', 'Portuguesa', 'Guanare', 'Parroquia El Este', 'Sede Sexta', 'EXP-016', 'Abril'),
(17, 'Persona Jurídica', '1515151515', 'Empresa PQR', '0424-1414141', 'Masculino', 42, 19.00, 17, 17, 17, 'Activo', 'V-1616161616', 'Sucre', 'Cumaná', 'Parroquia El Oeste', 'Sede Séptima', 'EXP-017', 'Mayo'),
(18, 'Grupo', '1616161616', 'Grupo PQR', '0414-1515151', 'Femenino', 30, 11.00, 18, 18, 18, 'Inactivo', 'V-1717171717', 'Táchira', 'San Cristóbal', 'Parroquia El Norte', 'Sede Octava', 'EXP-018', 'Junio'),
(19, 'Persona Natural', '1717171717', 'Carlos Díaz', '0416-1616161', 'Masculino', 34, 12.00, 19, 19, 19, 'Activo', 'V-1818181818', 'Trujillo', 'Trujillo', 'Parroquia El Sur', 'Sede Novena', 'EXP-019', 'Julio'),
(20, 'Persona Jurídica', '1818181818', 'Empresa STU', '0426-1717171', 'Femenino', 37, 13.00, 20, 20, 20, 'Inactivo', 'V-1919191919', 'Vargas', 'La Guaira', 'Parroquia El Este', 'Sede Décima', 'EXP-020', 'Agosto'),
(21, 'Grupo', '1919191919', 'Grupo STU', '0212-1818181', 'Masculino', 25, 14.00, 21, 21, 21, 'Activo', 'V-2020202020', 'Mérida', 'Mérida', 'Parroquia El Carmen', 'Sede Undécima', ' EXP-021', 'Septiembre'),
(22, 'Persona Natural', '2020202020', 'Ana Sánchez', '0424-1919191', 'Femenino', 29, 15.00, 22, 22, 22, 'Inactivo', 'V-2121212121', 'Distrito Capital', 'Caracas', 'Parroquia El Valle', 'Sede Duodécima', 'EXP-022', 'Octubre'),
(23, 'Persona Jurídica', '2121212121', 'Empresa VWX', '0414-2020202', 'Masculino', 32, 16.00, 23, 23, 23, 'Activo', 'V-2222222222', 'Aragua', 'Maracay', 'Parroquia El Centro', 'Sede Tercera', 'EXP-023', 'Noviembre'),
(24, 'Grupo', '2222222222', 'Grupo VWX', '0416-2121212', 'Femenino', 26, 17.00, 24, 24, 24, 'Inactivo', 'V-2323232323', 'Miranda', 'Los Teques', 'Parroquia El Norte', 'Sede Cuarta', 'EXP-024', 'Diciembre'),
(25, 'Persona Natural', '2323232323', 'Pedro Pérez', '0426-2222222', 'Masculino', 35, 18.00, 25, 25, 25, 'Activo', 'V-2424242424', 'Carabobo', 'Valencia', 'Parroquia El Sur', 'Sede Quinta', 'EXP-025', 'Enero'),
(26, 'Persona Jurídica', '2424242424', 'Empresa YZA', '0212-2323232', 'Femenino', 38, 19.00, 26, 26, 26, 'Inactivo', 'V-2525252525', 'Cojedes', 'San Carlos', 'Parroquia El Este', 'Sede Sexta', 'EXP-026', 'Febrero'),
(27, 'Grupo', '2525252525', 'Grupo YZA', '0424-2424242', 'Masculino', 31, 20.00, 27, 27, 27, 'Activo', 'V-2626262626', 'Falcón', 'Punto Fijo', 'Parroquia El Oeste', 'Sede Séptima', 'EXP-027', 'Marzo'),
(28, 'Persona Natural', '2626262626', 'María Gómez', '0414-2525252', 'Femenino', 33, 21.00, 28, 28, 28, 'Inactivo', 'V-2727272727', 'Guárico', 'San Juan de los Morros', 'Parroquia El Norte', 'Sede Octava', 'EXP-028', 'Abril'),
(29, 'Persona Jurídica', '2727272727', 'Empresa ABC', '0416-2626262', 'Masculino', 36, 22.00, 29, 29, 29, 'Activo', 'V-2828282828', 'Lara', 'Barquisimeto', 'Parroquia El Sur', 'Sede Novena', 'EXP-029', 'Mayo'),
(30, 'Grupo', '2828282828', 'Grupo ABC', '0426-2727272', 'Femenino', 29, 23.00, 30, 30, 30, 'Inactivo', 'V-2929292929', 'Yaracuy', 'San Felipe', 'Parroquia El Este', 'Sede Décima', 'EXP-030', 'Junio'),
(31, 'Persona Natural', '2929292929', 'Carlos López', '0212-2828282', 'Masculino', 32, 24.00, 31, 31, 31, 'Activo', 'V-3030303030', 'Zulia', 'Maracaibo', 'Parroquia El Carmen', 'Sede Undécima', 'EXP-031', 'Julio'),
(32, 'Persona Jurídica', '3030303030', 'Empresa DEF', '0424-2929292', 'Femenino', 35, 25.00, 32, 32, 32, 'Inactivo', 'V-3131313131', 'Apure', 'San Fernando de Apure', 'Parroquia El Valle', 'Sede Duodécima', 'EXP-032', 'Agosto'),
(33, 'Grupo', '3131313131', 'Grupo DEF', '0414-3030303', 'Masculino', 28, 26.00, 33, 33, 33, 'Activo', 'V-3232323232', 'Amazonas', 'Puerto Ayacucho', 'Parroquia El Norte', 'Sede Tercera', 'EXP-033', 'Septiembre'),
(34, 'Persona Natural', '3232323232', 'Ana Rodríguez', '0416-3131313', 'Femenino', 30, 27.00, 34, 34, 34, 'Inactivo', 'V-3333333333', 'Anzoátegui', 'Barcelona', 'Parroquia El Sur', 'Sede Cuarta', 'EXP-034', 'Octubre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `area` varchar(255) NOT NULL,
  `gerencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `cedula`, `usuario`, `contrasena`, `area`, `gerencia`) VALUES
(1, 'Samuel', 'Vegas', '30730167', 'vsamuelv', '1020304050', 'Desarrollo', 'Sistemas'),
(9, 'Jesus', 'Vegas', '4444', 'vjesusv', '1234', 'Desarrollo', 'Sistemas'),
(10, 'Jesus', 'Vegas', 'V-7430137', 'vjesusv', '123456', 'Desarrollo', 'Sistemas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadas`
--
ALTER TABLE `trabajadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajadas`
--
ALTER TABLE `trabajadas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
