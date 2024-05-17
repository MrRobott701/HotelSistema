-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2024 a las 08:16:15
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_hotel2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `fecha_apertura` datetime DEFAULT NULL,
  `fecha_cierre` datetime DEFAULT NULL,
  `monto_apertura` double DEFAULT NULL,
  `monto_cierre` double DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `almacen` double NOT NULL DEFAULT '0',
  `parking` double NOT NULL DEFAULT '0',
  `resto` double NOT NULL DEFAULT '0',
  `turno` varchar(15) NOT NULL DEFAULT 'Tarde',
  `dolarhoy` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `fecha_apertura`, `fecha_cierre`, `monto_apertura`, `monto_cierre`, `estado`, `id_usuario`, `fecha_creada`, `almacen`, `parking`, `resto`, `turno`, `dolarhoy`) VALUES
(4, '2023-11-13 17:13:18', '2023-11-13 17:22:28', 0, 7000, 0, 1, '2023-11-13 15:13:20', 1000, 0, 0, 'Tarde', 0),
(5, '2023-11-13 17:23:10', '2023-12-13 14:43:11', 1000, 6000, 0, 1, '2023-11-13 15:23:20', 0, 0, 0, 'Tarde', 0),
(6, '2023-12-13 14:53:00', '2023-12-15 17:48:49', 100, 18310, 0, 1, '2023-12-13 17:53:06', 0, 0, 0, 'Noche', 17.28),
(7, '2024-02-01 16:51:47', NULL, 0, NULL, 0, 1, '2024-02-01 16:51:49', 0, 0, 0, 'MaÃ±ana', 17),
(8, '2024-03-21 00:36:48', '2024-03-21 14:19:43', 10000, 10000, 0, 1, '2024-03-21 00:36:54', 0, 0, 0, 'MaÃ±ana', 17),
(9, '2024-03-21 14:19:43', '2024-03-21 14:23:55', 0, 0, 0, 6, '2024-03-21 14:20:10', 0, 0, 0, 'MaÃ±ana', 17),
(10, '2024-03-21 14:45:28', '2024-03-21 16:57:51', 0, 12900, 0, 6, '2024-03-21 14:45:30', 0, 0, 0, 'MaÃ±ana', 17),
(11, '2024-03-21 16:57:51', '2024-03-21 17:01:11', 0, 0, 0, 6, '2024-03-21 16:57:53', 0, 0, 0, 'MaÃ±ana', 17),
(12, '2024-03-21 17:01:13', '2024-03-21 17:03:47', 5000, 5000, 0, 6, '2024-03-21 17:01:31', 0, 0, 0, 'Tarde', 16),
(13, '2024-03-21 17:25:19', '2024-03-21 17:31:34', 5000, 5000, 0, 6, '2024-03-21 17:26:01', 0, 0, 0, 'Tarde', 16),
(14, '2024-03-21 17:58:11', '2024-03-21 19:25:41', 0, 16900, 0, 6, '2024-03-21 17:58:30', 0, 0, 0, 'Tarde', 16),
(15, '2024-03-21 19:25:53', '2024-03-21 19:50:23', 5000, 9500, 0, 11, '2024-03-21 19:26:07', 0, 0, 0, 'Noche', 17),
(16, '2024-03-21 19:51:32', '2024-03-21 19:53:30', 5000, 5000, 0, 6, '2024-03-21 19:51:55', 0, 0, 0, 'Noche', 17),
(17, '2024-03-21 19:53:44', '2024-04-04 19:32:40', 5000, 79733, 0, 6, '2024-03-21 19:54:18', 0, 0, 0, 'Noche', 16),
(18, '2024-04-04 19:32:40', '2024-04-04 20:29:37', 0, 1309, 0, 6, '2024-04-04 19:32:49', 0, 0, 0, 'MaÃ±ana', 17),
(19, '2024-04-04 20:39:15', '2024-04-04 20:50:08', 0, 0, 0, 6, '2024-04-04 20:39:17', 0, 0, 0, 'MaÃ±ana', 17),
(20, '2024-04-04 20:50:08', '2024-04-04 20:59:54', 5000, 5101, 0, 6, '2024-04-04 20:50:13', 0, 0, 0, 'MaÃ±ana', 17),
(21, '2024-04-04 21:53:10', '2024-04-09 16:01:14', 0, 5200, 0, 6, '2024-04-04 21:53:12', 0, 0, 0, 'MaÃ±ana', 17),
(22, '2024-04-09 16:01:14', '2024-04-09 16:45:16', 0, 52234.5, 0, 6, '2024-04-09 16:01:16', 0, 0, 0, 'MaÃ±ana', 17),
(23, '2024-04-09 16:45:16', '2024-04-09 16:57:01', 5000, 18767, 0, 6, '2024-04-09 16:45:30', 0, 0, 0, 'Tarde', 16),
(24, '2024-04-09 16:57:01', '2024-04-10 00:21:39', 0, 1509, 0, 6, '2024-04-09 16:57:13', 0, 0, 0, 'MaÃ±ana', 17.5),
(25, '2024-04-10 13:23:02', NULL, 0, NULL, 0, 6, '2024-04-10 13:23:04', 0, 0, 0, 'MaÃ±ana', 17),
(26, '2024-04-18 02:46:04', '2024-04-23 19:12:17', 0, 67000, 0, 6, '2024-04-18 02:46:07', 0, 0, 0, 'MaÃ±ana', 17),
(27, '2024-04-23 19:12:39', NULL, 0, NULL, 0, 6, '2024-04-23 19:12:42', 0, 0, 0, 'MaÃ±ana', 17),
(28, '2024-04-25 15:10:48', NULL, 0, NULL, 1, 6, '2024-04-25 15:10:49', 0, 0, 0, 'MaÃ±ana', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `cant` int(11) NOT NULL DEFAULT '0',
  `precio` double NOT NULL DEFAULT '100',
  `detalle` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `imagen`, `fecha_creada`, `estado`, `cant`, `precio`, `detalle`) VALUES
(1, 'SIMPLE', '42.png', '2019-08-27 21:34:05', 0, 0, 100, NULL),
(2, 'TRIPLE', 'sencilla_1.jpg', '2023-08-04 19:01:13', 1, 1, 100, '2 camas imperiales y uno matrimonial'),
(3, 'DOBLE', 'doble.jpg', '2024-02-01 16:52:49', 1, 1, 100, NULL),
(4, 'SENCILLA', 'sencilla.jpg', '2024-02-01 16:52:53', 1, 1, 100, NULL),
(5, 'SWITE', 'swite.jpg', '2024-02-01 16:52:58', 1, 1, 100, NULL),
(6, 'CUADRUPLE', 'cuadruple.jpg', '2024-02-01 16:53:05', 1, 1, 100, NULL),
(7, 'Swite Plus+', 'swite_1.jpg', '2024-03-21 17:53:18', 0, 1, 100, NULL),
(8, 'Swite Plus+', 'swite_2.jpg', '2024-03-21 17:55:04', 1, 1, 100, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_p`
--

CREATE TABLE `categoria_p` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_p`
--

INSERT INTO `categoria_p` (`id`, `nombre`, `estado`, `fecha_creada`) VALUES
(1, 'KIOSKO', 1, '2019-11-27 00:35:19'),
(2, 'COCINA', 1, '2019-11-27 02:51:45'),
(3, 'LAVADERO', 1, '2019-11-27 03:32:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_proceso`
--

CREATE TABLE `cliente_proceso` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `sesion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente_proceso`
--

INSERT INTO `cliente_proceso` (`id`, `id_cliente`, `id_proceso`, `sesion`) VALUES
(4, 18, 17, 'hecv1ibt4lbtaf9fa7bd2i4rd4'),
(5, 19, 18, 'hecv1ibt4lbtaf9fa7bd2i4rd4'),
(6, 22, 21, 'ftfpnorro6bb9gofollhj7u360'),
(7, 23, 23, 'ftfpnorro6bb9gofollhj7u360'),
(8, 24, 24, 'ftfpnorro6bb9gofollhj7u360'),
(9, 33, 34, 'i0c6s1hskibvsqa1aenb0a8mo5'),
(10, 34, 35, 'i0c6s1hskibvsqa1aenb0a8mo5'),
(11, 35, 36, 'abhs50vropijnt8lpfh8ppd604'),
(12, 36, 37, 'abhs50vropijnt8lpfh8ppd604'),
(13, 37, 38, 'pbn9111tne4o4plk7odfjaa9g5'),
(14, 38, 39, 'pbn9111tne4o4plk7odfjaa9g5'),
(15, 39, 40, 'pbn9111tne4o4plk7odfjaa9g5'),
(16, 40, 41, 'pbn9111tne4o4plk7odfjaa9g5'),
(17, 41, 42, 'pbn9111tne4o4plk7odfjaa9g5'),
(18, 42, 43, '5447romannq1ogq2u2uq4p4333'),
(19, 43, 44, '5447romannq1ogq2u2uq4p4333'),
(20, 44, 45, '5447romannq1ogq2u2uq4p4333'),
(21, 45, 35, 'kgi9rm4shdpu7gsrn3645pd2k2'),
(22, 47, 40, 'i90g0ubtlp8u9gcv807lmt9po0'),
(23, 52, 54, 'i90g0ubtlp8u9gcv807lmt9po0'),
(24, 53, 55, 'i90g0ubtlp8u9gcv807lmt9po0'),
(25, 54, 56, 'i90g0ubtlp8u9gcv807lmt9po0'),
(26, 55, 57, 'i90g0ubtlp8u9gcv807lmt9po0'),
(27, 56, 58, 'i90g0ubtlp8u9gcv807lmt9po0'),
(28, 57, 59, 'i90g0ubtlp8u9gcv807lmt9po0'),
(29, 58, 60, 'i90g0ubtlp8u9gcv807lmt9po0'),
(30, 59, 61, 'i90g0ubtlp8u9gcv807lmt9po0'),
(31, 60, 62, 'i90g0ubtlp8u9gcv807lmt9po0'),
(32, 61, 63, 'i90g0ubtlp8u9gcv807lmt9po0'),
(33, 62, 64, 'i90g0ubtlp8u9gcv807lmt9po0'),
(34, 63, 65, 'i90g0ubtlp8u9gcv807lmt9po0'),
(35, 64, 67, 'i90g0ubtlp8u9gcv807lmt9po0'),
(36, 65, 69, 'i90g0ubtlp8u9gcv807lmt9po0'),
(37, 66, 70, 'i90g0ubtlp8u9gcv807lmt9po0'),
(38, 67, 71, 'i90g0ubtlp8u9gcv807lmt9po0'),
(39, 68, 76, 'i90g0ubtlp8u9gcv807lmt9po0'),
(40, 69, 77, 'i90g0ubtlp8u9gcv807lmt9po0'),
(41, 70, 78, 'i90g0ubtlp8u9gcv807lmt9po0'),
(42, 71, 79, 'i90g0ubtlp8u9gcv807lmt9po0'),
(43, 72, 90, 'i90g0ubtlp8u9gcv807lmt9po0'),
(44, 73, 91, 'i90g0ubtlp8u9gcv807lmt9po0'),
(45, 74, 92, 'i90g0ubtlp8u9gcv807lmt9po0'),
(46, 75, 93, 'i90g0ubtlp8u9gcv807lmt9po0'),
(47, 76, 94, 'i90g0ubtlp8u9gcv807lmt9po0'),
(48, 77, 95, 'i90g0ubtlp8u9gcv807lmt9po0'),
(49, 79, 97, 'bgioek2qip1jmkg8a1g3vgl6p6'),
(50, 81, 99, 'bgioek2qip1jmkg8a1g3vgl6p6'),
(51, 83, 101, 'bgioek2qip1jmkg8a1g3vgl6p6'),
(52, 85, 104, 'vq27oqvj7v1tb6nujkouuod5v0'),
(53, 86, 105, 'vq27oqvj7v1tb6nujkouuod5v0'),
(54, 87, 106, 'vq27oqvj7v1tb6nujkouuod5v0'),
(55, 88, 107, 'vq27oqvj7v1tb6nujkouuod5v0'),
(56, 89, 108, 'vq27oqvj7v1tb6nujkouuod5v0'),
(57, 90, 109, 'vq27oqvj7v1tb6nujkouuod5v0'),
(58, 92, 110, '12s6g2mg0se9sss9b8837udsb7'),
(59, 94, 111, '12s6g2mg0se9sss9b8837udsb7'),
(60, 95, 112, '12s6g2mg0se9sss9b8837udsb7'),
(61, 96, 113, '12s6g2mg0se9sss9b8837udsb7'),
(62, 99, 116, '12s6g2mg0se9sss9b8837udsb7'),
(63, 100, 117, '12s6g2mg0se9sss9b8837udsb7'),
(64, 102, 119, '12s6g2mg0se9sss9b8837udsb7'),
(65, 103, 120, '12s6g2mg0se9sss9b8837udsb7'),
(66, 104, 121, '6mboaf0votbcdiijmrnk1com90'),
(67, 105, 122, '6mboaf0votbcdiijmrnk1com90'),
(68, 106, 123, 'b05i3f01a2ttf8bictp9mem2l1'),
(69, 108, 125, 'b05i3f01a2ttf8bictp9mem2l1'),
(70, 109, 126, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(71, 110, 127, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(72, 111, 128, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(73, 112, 129, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(74, 113, 130, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(75, 114, 131, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(76, 115, 132, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(77, 116, 133, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(78, 117, 134, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(79, 118, 135, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(80, 119, 136, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(81, 120, 137, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(82, 121, 138, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(83, 122, 139, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(84, 123, 140, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(85, 124, 141, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(86, 125, 142, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(87, 126, 143, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(88, 127, 144, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(89, 128, 145, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(90, 129, 146, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(91, 130, 147, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(92, 131, 148, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(93, 132, 149, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(94, 133, 150, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(95, 134, 151, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(96, 135, 152, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(97, 136, 153, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(98, 137, 154, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(99, 138, 155, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(100, 139, 156, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(101, 140, 157, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(102, 141, 158, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(103, 142, 159, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(104, 143, 160, 'pp2v0mnt4v5j6vkn1eo64t0dj3'),
(105, 144, 161, 'c5ile2gh7hov66a43bhponrek2'),
(106, 145, 162, 'c5ile2gh7hov66a43bhponrek2'),
(107, 146, 163, 'c5ile2gh7hov66a43bhponrek2'),
(108, 147, 164, '422mh6g409ioge9o8q61bkbc47'),
(109, 148, 165, '422mh6g409ioge9o8q61bkbc47'),
(110, 149, 166, '422mh6g409ioge9o8q61bkbc47'),
(111, 150, 167, '422mh6g409ioge9o8q61bkbc47'),
(112, 151, 168, '422mh6g409ioge9o8q61bkbc47'),
(113, 152, 169, '422mh6g409ioge9o8q61bkbc47'),
(114, 153, 170, '422mh6g409ioge9o8q61bkbc47'),
(115, 154, 171, '422mh6g409ioge9o8q61bkbc47'),
(116, 155, 172, '422mh6g409ioge9o8q61bkbc47'),
(117, 156, 173, '422mh6g409ioge9o8q61bkbc47'),
(118, 157, 174, '422mh6g409ioge9o8q61bkbc47'),
(119, 158, 175, '422mh6g409ioge9o8q61bkbc47'),
(120, 159, 176, '422mh6g409ioge9o8q61bkbc47'),
(121, 160, 177, '422mh6g409ioge9o8q61bkbc47'),
(122, 161, 178, '422mh6g409ioge9o8q61bkbc47'),
(123, 175, 214, '4m5kh921ps9seekfaeq9uo4130'),
(124, 189, 264, 'f5kauph4faqhg8grs9uf9j4m65'),
(125, 211, 401, '3m2k3f36vvcme4kh2rph6v4p07'),
(126, 215, 405, 'uaffdrmsb2bi0i6vc73np4cg06'),
(127, 219, 411, 'uaffdrmsb2bi0i6vc73np4cg06'),
(128, 220, 412, '8uaieuduufodioeslp70ph53f1'),
(129, 221, 413, '8uaieuduufodioeslp70ph53f1'),
(130, 222, 414, '8uaieuduufodioeslp70ph53f1'),
(131, 223, 415, 'rb2vo8qnt5mjf2bvbq8o2n1v05'),
(132, 225, 417, 'rb2vo8qnt5mjf2bvbq8o2n1v05'),
(133, 226, 418, 'rb2vo8qnt5mjf2bvbq8o2n1v05'),
(134, 227, 420, 'jc1fd6aam0gcoroidan24a5bc3'),
(135, 229, 422, '0tkr4cb6i9rgb5pblbpmj18gv2'),
(136, 231, 424, 'dag9iukdrf6scr43jalktsmug5'),
(137, 232, 425, 'dag9iukdrf6scr43jalktsmug5'),
(138, 233, 426, 'dag9iukdrf6scr43jalktsmug5'),
(139, 234, 427, 'dag9iukdrf6scr43jalktsmug5'),
(140, 235, 428, 'dag9iukdrf6scr43jalktsmug5'),
(141, 237, 430, 'i36abb1fgvq8h8tht8t2prkuo2'),
(142, 238, 431, 'i36abb1fgvq8h8tht8t2prkuo2'),
(143, 239, 432, 'i36abb1fgvq8h8tht8t2prkuo2'),
(144, 240, 433, 'i36abb1fgvq8h8tht8t2prkuo2'),
(145, 241, 434, 'i36abb1fgvq8h8tht8t2prkuo2'),
(146, 242, 435, 'i36abb1fgvq8h8tht8t2prkuo2'),
(147, 243, 436, 'i36abb1fgvq8h8tht8t2prkuo2'),
(148, 244, 437, 'i36abb1fgvq8h8tht8t2prkuo2'),
(149, 246, 439, 'kaqnsir2pqs770kchqou26hes5'),
(150, 248, 441, 'kaqnsir2pqs770kchqou26hes5'),
(151, 252, 447, 'kaqnsir2pqs770kchqou26hes5'),
(152, 256, 453, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(153, 257, 454, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(154, 259, 456, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(155, 260, 457, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(156, 261, 458, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(157, 262, 459, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(158, 263, 460, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(159, 264, 461, '48e0h05o3q2d7kc6qoj7ov4ff1'),
(160, 265, 463, '48e0h05o3q2d7kc6qoj7ov4ff1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisionista`
--

CREATE TABLE `comisionista` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `porcentaje` float NOT NULL DEFAULT '10',
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `rnc` varchar(25) DEFAULT NULL,
  `registro_empresarial` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `iva` float NOT NULL DEFAULT '18',
  `web` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `logo_load` text,
  `logo_header` text,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `direccion`, `estado`, `telefono`, `fax`, `rnc`, `registro_empresarial`, `ciudad`, `logo`, `iva`, `web`, `email`, `logo_load`, `logo_header`, `favicon`) VALUES
(1, 'Hotel', 'Blvd. Lazaro Cardenas #785, Fracc. Playitas', 'California', '018005758', 'NULL', 'NULL', 'NULL', 'Mexico', '11_2_1.png', 0, NULL, NULL, 'logo.jpg', 'logo_header_1.jpg', 'favicon.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `documento` varchar(12) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `error`
--

CREATE TABLE `error` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `accion` varchar(255) DEFAULT NULL,
  `razon` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `error`
--

INSERT INTO `error` (`id`, `nombre`, `accion`, `razon`, `fecha`, `hora`, `estado`) VALUES
(1, 'cambio', 'Se modifico la tarifa de 10000 a 15000 /Hab 102 / T0000002', 'por fiestas', '2023-12-13', '16:03:32', 1),
(2, 'admin', 'Se anulo una noche de $10000 / Hab 104 / T0000006', '78', '2024-02-07', '22:05:11', 1),
(3, 'admin', 'Se anulo una noche de $100 / Hab 102 / T0000007', '78', '2024-02-07', '22:31:19', 1),
(4, 'admin', 'Se anulo un cobro por $854.2 de AJUSTE', '78', '2024-02-12', '13:27:54', 1),
(5, 'admin', 'Se anulo un cobro por $254.87 de PRUEBA AJUSTE', '78', '2024-02-12', '13:28:06', 1),
(6, 'Admin', 'Se modifico la tarifa de 1500 a 1000 /Hab 103 / T0000038', 'Descuento por festividad', '2024-03-21', '18:10:05', 1),
(7, 'admin', 'Se modifico la tarifa de 1500 a 1000 /Hab 103 / T0000039', 'prueba', '2024-03-21', '18:23:30', 1),
(8, 'Admin', 'Se modifico la tarifa de 1750 a 1500 /Hab 104 / T0000043', 'Promocion', '2024-03-21', '19:41:26', 1),
(9, 'Admin', 'Se cambio el nombre de JOSE RODRIGO a Maria Teresa Hab 104 / T0000043', 'Actualizacion', '2024-03-21', '19:42:57', 1),
(10, 'admin', 'Se modifico la tarifa de 2000 a 1000 /Hab 209 / T0000044', 'prueba', '2024-03-21', '20:02:10', 1),
(11, 'admin', 'Se modifico la tarifa de 1300 a 1300.01 /Hab 102 / T0000045', 'prueba', '2024-03-22', '11:34:43', 1),
(12, 'ADMIN', 'Se anulo un registro de Hab 300 / T0000053', 'PRUEBA', '2024-04-04', '16:30:25', 1),
(13, 'ADMIN', 'Se anulÃ³ un pago por $500 / Hab 300 / T0000064', 'PRUEBA', '2024-04-04', '23:06:37', 1),
(14, 'ADMIN', 'Se modifico la tarifa de 1300 a 1300 /Hab 101 / T00000104', 'PRUEBA', '2024-04-17', '13:30:52', 1),
(15, 'ADMIN', 'Se anulo una noche de $3000 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '17:20:44', 1),
(16, 'ADMIN', 'Se anulo una noche de $1000 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '17:24:03', 1),
(17, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:32:13', 1),
(18, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:35:48', 1),
(19, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:35:52', 1),
(20, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:35:56', 1),
(21, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:36:01', 1),
(22, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:36:06', 1),
(23, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '17:36:11', 1),
(24, 'ADMIN', 'Se anulo una noche de $4500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:05:11', 1),
(25, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:06:31', 1),
(26, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:06:38', 1),
(27, 'ADMIN', 'Se anulo una noche de $4500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:07:20', 1),
(28, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:12:06', 1),
(29, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:12:13', 1),
(30, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:12:18', 1),
(31, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:13:38', 1),
(32, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:17:07', 1),
(33, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:17:16', 1),
(34, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:17:21', 1),
(35, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:22:52', 1),
(36, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:22:59', 1),
(37, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:23:04', 1),
(38, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:23:08', 1),
(39, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:48:52', 1),
(40, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:06', 1),
(41, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:14', 1),
(42, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:20', 1),
(43, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:25', 1),
(44, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:29', 1),
(45, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:35', 1),
(46, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:40', 1),
(47, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:46', 1),
(48, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:50', 1),
(49, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:55', 1),
(50, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '18:49:59', 1),
(51, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:50:03', 1),
(52, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:50:15', 1),
(53, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '18:50:20', 1),
(54, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:06:23', 1),
(55, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:06:37', 1),
(56, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:06:44', 1),
(57, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:06:52', 1),
(58, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:06:58', 1),
(59, 'ADMIN', 'Se anulo una noche de $1500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:07:03', 1),
(60, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:13', 1),
(61, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:37', 1),
(62, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:42', 1),
(63, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:47', 1),
(64, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:51', 1),
(65, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:08:57', 1),
(66, 'ADMIN', 'Se anulo un cobro por $0 de ', 'PRUEBA', '2024-04-17', '19:09:01', 1),
(67, 'ADMIN', 'Se anulo una noche de $4500 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:10:28', 1),
(68, 'ADMIN', 'Se anulo una noche de $3000 / Hab 202 / T00000106', 'PRUEBA', '2024-04-17', '19:10:44', 1),
(69, 'ADMIN', 'Se modifico la tarifa de $ / Hab. ', 'PRUEBA', '2024-04-17', '20:03:16', 0),
(70, 'ADMIN', 'Se anulo una noche de $7500 / Hab 202 / T00000107', 'PRUEBA', '2024-04-17', '19:58:59', 1),
(71, 'ADMIN', 'Se anulo un registro de Hab 202 / T00000107', 'PRUEBA', '2024-04-18', '01:36:50', 1),
(72, 'ADMIN', 'Se anulo un registro de Hab 206 / T00000108', 'PRUEBA', '2024-04-18', '02:36:21', 1),
(73, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000108', 'PRUEBA', '2024-04-18', '02:47:09', 1),
(74, 'ADMIN', 'Se anulo un registro de Hab 101 / T00000109', 'PRUEBA', '2024-04-18', '03:02:17', 1),
(75, 'ADMIN', 'Se modifico la tarifa de $ / Hab. ', 'PRUEBA', '2024-04-18', '13:21:11', 0),
(76, 'ADMIN', 'Se anulo una noche de $2600 / Hab 102 / T00000110', 'PRUEBA', '2024-04-18', '13:24:24', 1),
(77, 'ADMIN', 'Se anulÃ³ un pago por $2600 / Hab 102 / T00000110', 'PRUEBA', '2024-04-18', '13:24:43', 1),
(78, 'ytrewrtyu', 'Se modifico la tarifa de $ / Hab. ', 'trewrtyui', '2024-04-18', '13:32:56', 0),
(79, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000110', 'PRUEBA', '2024-04-18', '14:44:32', 1),
(80, 'ADMIN', 'Se cambio el nombre de JORGE IVAN PEREZ HERNANDEZ a JORGE IVAN PEREZ HERNANDEZ HOLA MUNDO CRUEL Y FRIOO Hab 203 / T00000114', 'ADS', '2024-04-22', '17:55:52', 1),
(81, 'ADMIN', 'Se anulo un registro de Hab 202 / T00000116', 'PRUEBA', '2024-04-24', '02:00:07', 1),
(82, 'ADMIN', 'Se anulo un registro de Hab 203 / T00000114', 'PRUEBA', '2024-04-24', '02:00:16', 1),
(83, 'ADMIN', 'Se anulo un registro de Hab 202 / T00000117', 'PRUEBA', '2024-04-24', '02:01:14', 1),
(84, 'ADMIN', 'Se anulo un registro de Hab 106 / T00000120', 'PRUEBA', '2024-04-24', '05:54:38', 1),
(85, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000121', 'PRUEBA', '2024-04-24', '05:59:29', 1),
(86, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000122', 'PRUEBA', '2024-04-24', '06:01:22', 1),
(87, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000123', 'PRUEBA', '2024-04-24', '06:05:32', 1),
(88, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000124', 'PRUEBA', '2024-04-24', '06:06:02', 1),
(89, 'ADMIN', 'Se anulo un registro de Hab 102 / T00000125', 'PRUEBA', '2024-04-24', '06:07:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esperado`
--

CREATE TABLE `esperado` (
  `id` int(11) NOT NULL,
  `mes` varchar(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extra`
--

CREATE TABLE `extra` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `area` varchar(40) DEFAULT NULL,
  `especifico` varchar(40) DEFAULT NULL,
  `glosa` varchar(255) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(65) NOT NULL,
  `detalle1` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `imagen`, `titulo`, `detalle1`, `estado`, `fecha_creada`) VALUES
(1, 'gallery1_1.jpg', 'BaÃ±o privado', 'habitaciones', 1, NULL),
(2, 'gallery2.jpg', 'Desayuno', 'habitaciones', 1, NULL),
(3, 'gallery3.jpg', 'Confort', 'habitaciones', 1, NULL),
(4, 'gallery4.jpg', 'Servicio a la habitaciÃ³n', 'habitaciones', 1, NULL),
(5, 'gallery5.jpg', 'Privacidad', 'habitaciones', 1, NULL),
(6, 'gallery6.jpg', 'Comodidad', 'habitaciones', 1, NULL),
(7, 'gallery7.jpg', 'Aire libre', 'aire', 1, NULL),
(8, 'gallery8.jpg', 'Limpieza', 'otros', 1, NULL),
(9, 'gallery9.jpg', 'HabitaciÃ³n', 'habitaciones', 1, NULL),
(10, 'gallery10.jpg', 'Aire libre', 'aire', 1, NULL),
(11, 'gallery11.jpg', 'Arte', 'otros', 1, NULL),
(12, 'gallery12.jpg', 'Adaptable', 'habitaciones', 1, NULL),
(13, 'blog-post1.jpg', '10 CONSEJOS PARA VIAJAR EN VACACIONES', 'Un examen de como el clima politico y econÃ³mico actual esta afectando a la industria de la salud mental...', 2, '2022-10-08 17:34:39'),
(14, 'blog-post6.jpg', 'CORRIENDO SOBRE LA ARENA', 'Un examen de como el clima politico y econÃ³mico actual esta afectando a la industria de la salud mental...', 2, '2022-10-08 17:41:28'),
(15, 'blog-post5.jpg', 'DESAYUNO CON CAFE', 'Un examen de como el clima politico y econÃ³mico actual esta afectando a la industria de la salud mental...', 2, '2022-10-08 17:42:38'),
(16, 'staff1.jpg', 'MARIA OCHOA', '10 de 10, habitaciones limpias, sus establecimientos modernos y acogedores. La recepcionista muy atenta y amable.', 3, '2022-10-08 18:44:14'),
(17, 'staff2.jpg', 'RUBEN HUGO', '10 de 10, habitaciones limpias, sus establecimientos modernos y acogedores. La recepcionista muy atenta y amable.', 3, '2022-10-08 18:47:24'),
(18, 'staff3.jpg', 'ESTEFANO DIAZ', '10 de 10, habitaciones limpias, sus establecimientos modernos y acogedores. La recepcionista muy atenta y amable.', 3, '2022-10-08 18:47:49'),
(19, 'staff4.jpg', 'GABRIELA SANTOS', '10 de 10, habitaciones limpias, sus establecimientos modernos y acogedores. La recepcionista muy atenta y amable.', 3, '2022-10-08 18:48:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_tipopago` int(11) DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `modulo` varchar(65) DEFAULT NULL,
  `categoria` varchar(65) DEFAULT NULL,
  `Cancelled` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gasto`
--

INSERT INTO `gasto` (`id`, `descripcion`, `precio`, `id_usuario`, `fecha`, `hora`, `id_caja`, `fecha_creacion`, `estado`, `id_tipopago`, `id_proceso`, `modulo`, `categoria`, `Cancelled`) VALUES
(1, 'nignuno', 12000, 1, '2023-12-15', '19:33:55', 0, '2023-12-15 22:34:06', 3, 1, NULL, 'Hotel', 'Sobrante', 0),
(2, 'null', 500, 1, '2023-12-15', '19:34:09', 0, '2023-12-15 22:34:19', 1, 1, NULL, 'Hotel', 'Gastos de mantenimiento', 0),
(3, 'CAJA', 2000, 1, '2024-02-07', '16:14:56', 7, '2024-02-07 17:09:39', 3, 1, 34, NULL, NULL, 1),
(4, 'ggg', 100, 1, '2024-02-07', '22:27:50', 7, '2024-02-07 22:27:56', 3, 1, 35, NULL, NULL, 1),
(5, 'LLL', 200, 1, '2024-02-07', '22:47:48', 7, '2024-02-07 22:48:53', 3, 1, 35, NULL, NULL, 1),
(6, 'AJUSTE', -200, 1, '2024-02-08', '23:17:35', 7, '2024-02-08 23:17:52', 3, 1, 36, NULL, NULL, 1),
(7, 'PRUEBA DE CARGO', 800, 1, '2024-02-08', '23:19:01', 7, '2024-02-08 23:20:07', 3, 1, 36, NULL, NULL, 1),
(8, 'AJUSTE', -2000, 1, '2024-02-08', '23:21:59', 7, '2024-02-08 23:22:03', 3, 1, 37, NULL, NULL, 1),
(11, 'AJUSTE', -587.2, 1, '2024-02-12', '13:29:08', 7, '2024-02-12 13:29:11', 3, 1, 39, NULL, NULL, 1),
(12, 'AJUSTE', 587.36, 1, '2024-02-12', '13:34:15', 7, '2024-02-12 13:34:18', 3, 1, 40, NULL, NULL, 1),
(13, 'AJUSTE', -9485.26, 1, '2024-02-12', '13:42:28', 7, '2024-02-12 13:42:34', 3, 1, 41, NULL, NULL, 1),
(14, 'PRUEBA', 30248.54, 1, '2024-02-12', '13:42:51', 7, '2024-02-12 13:43:09', 3, 1, 41, NULL, NULL, 1),
(15, 'AJUSTE', -8547.26, 1, '2024-02-12', '13:54:06', 7, '2024-02-12 13:54:08', 3, 1, 42, NULL, NULL, 1),
(16, 'AJUSTE', -8974.36, 1, '2024-02-13', '17:01:39', 7, '2024-02-13 17:01:42', 3, 1, 43, NULL, NULL, 1),
(17, 'pago', 10000, 1, '2024-02-13', '17:18:48', 7, '2024-02-13 17:19:44', 3, 1, 43, NULL, NULL, 1),
(18, 'j', 10000, 1, '2024-02-13', '17:19:44', 7, '2024-02-13 17:20:10', 3, 1, 43, NULL, NULL, 1),
(19, 'AJUSTE', -24876.6, 1, '2024-02-13', '17:24:15', NULL, '2024-02-13 17:24:17', 3, 1, 44, NULL, NULL, 1),
(20, 'AJUSTE', -24789.63, 1, '2024-02-13', '17:26:27', NULL, '2024-02-13 17:26:44', 3, 1, 45, NULL, NULL, 1),
(21, 'AJUSTE', -200, 6, '2024-03-21', '15:09:31', 10, '2024-03-21 15:09:36', 3, 2, 104, NULL, NULL, 1),
(22, 'AJUSTE', -1500, 6, '2024-03-21', '16:44:28', 10, '2024-03-21 16:44:31', 3, 2, 109, NULL, NULL, 1),
(23, 'prueb', 50, 6, '2024-03-21', '16:44:31', 10, '2024-03-21 16:44:48', 3, 2, 109, NULL, NULL, 1),
(24, 'toallas', 150, 6, '2024-03-21', '16:47:26', 10, '2024-03-21 16:47:36', 3, 2, 109, NULL, NULL, 1),
(25, 'AJUSTE', -200, 6, '2024-03-21', '18:15:48', 14, '2024-03-21 18:15:51', 3, 2, 110, NULL, NULL, 1),
(26, 'AJUSTE', -500, 6, '2024-03-21', '18:26:24', 14, '2024-03-21 18:26:43', 3, 2, 111, NULL, NULL, 1),
(27, 'Toallas', 200, 6, '2024-03-21', '18:26:43', 14, '2024-03-21 18:27:32', 3, 2, 111, NULL, NULL, 1),
(28, 'prueba', 500, 6, '2024-03-21', '18:55:27', 14, '2024-03-21 18:56:50', 3, 2, 116, NULL, NULL, 1),
(29, 'Venta de Gorras', 800, 6, '2024-03-21', '19:20:14', 14, '2024-03-21 19:20:39', 3, 1, NULL, 'Hotel', 'Otros', 0),
(30, 'Adelanto de nomina para America', 1000, 6, '2024-03-21', '19:20:45', 14, '2024-03-21 19:21:04', 1, 1, NULL, 'Hotel', 'Adelantos', 0),
(31, 'AJUSTE', -500, 6, '2024-03-21', '20:04:10', 17, '2024-03-21 20:04:16', 3, 2, 119, NULL, NULL, 1),
(32, 'Toalla', 200, 6, '2024-03-21', '20:04:16', 17, '2024-03-21 20:05:12', 3, 2, 119, NULL, NULL, 1),
(33, 'Ventas', 500, 6, '2024-03-21', '20:09:37', 17, '2024-03-21 20:09:47', 3, 1, NULL, 'Hotel', 'Otros', 0),
(34, 'Focos', 200, 6, '2024-03-21', '20:09:50', 17, '2024-03-21 20:09:59', 1, 1, NULL, 'Hotel', 'Gastos de mantenimiento', 0),
(35, 'pago', 100.99, 6, '2024-03-22', '11:35:04', 17, '2024-03-22 11:36:18', 3, 1, 120, NULL, NULL, 1),
(36, 'TOALLA', 50, 6, '2024-04-04', '20:50:17', 21, '2024-04-04 20:50:25', 3, 6, 162, NULL, NULL, 1),
(37, 'toalla', 50, 6, '2024-04-04', '20:54:23', 21, '2024-04-04 20:54:48', 3, 6, 162, NULL, NULL, 1),
(38, 'TOALLA', 500, 6, '2024-04-04', '22:21:30', 21, '2024-04-04 22:21:37', 3, 1, 163, NULL, NULL, 1),
(39, 'FOCO', 500, 6, '2024-04-04', '23:05:10', 21, '2024-04-04 23:05:43', 3, 6, 162, NULL, NULL, 1),
(40, 'FOCO', 500, 6, '2024-04-04', '23:06:01', 25, '2024-04-04 23:06:26', 3, 1, 140, NULL, NULL, 1),
(41, 'Prueba', 500, 6, '2024-04-09', '16:00:19', 25, '2024-04-09 16:00:31', 3, 7, 164, NULL, NULL, 1),
(42, '', 0, 6, '2024-04-17', '03:57:19', 25, '2024-04-17 03:57:25', 3, 1, 264, NULL, NULL, 1),
(43, '', 0, 6, '2024-04-17', '03:57:25', 25, '2024-04-17 03:57:41', 3, 1, 264, NULL, NULL, 1),
(44, '', 0, 6, '2024-04-17', '03:57:41', 25, '2024-04-17 03:58:04', 3, 1, 264, NULL, NULL, 1),
(45, '', 0, 6, '2024-04-17', '03:58:04', 25, '2024-04-17 03:58:28', 3, 1, 264, NULL, NULL, 1),
(46, '', 0, 6, '2024-04-17', '04:00:55', 25, '2024-04-17 04:01:06', 3, 1, 264, NULL, NULL, 1),
(47, 'AJUSTE', -87, 6, '2024-04-17', '13:54:58', 25, '2024-04-17 13:55:01', 3, 7, 178, NULL, NULL, 1),
(74, '', 0, 6, '2024-04-17', '19:10:49', 26, '2024-04-17 19:11:10', 3, 1, 405, NULL, NULL, 1),
(75, '', 0, 6, '2024-04-17', '19:11:11', 26, '2024-04-17 19:11:22', 3, 1, 405, NULL, NULL, 1),
(76, 'PRUEBA', 1, 6, '2024-04-17', '22:48:16', NULL, '2024-04-17 22:48:38', 3, 1, 411, NULL, NULL, 1),
(77, 'prueba', 1, 6, '2024-04-17', '23:33:31', NULL, '2024-04-17 23:33:45', 3, 1, 411, NULL, NULL, 1),
(78, 'prueba', 1, 6, '2024-04-17', '23:34:40', NULL, '2024-04-17 23:36:26', 3, 1, 411, NULL, NULL, 1),
(79, 'cargo', 5, 6, '2024-04-18', '00:08:44', NULL, '2024-04-18 00:08:54', 3, 1, 411, NULL, NULL, 1),
(80, 'AJUSTE', -1000, 6, '2024-04-18', '02:36:08', NULL, '2024-04-18 02:36:11', 3, 1, 412, NULL, NULL, 1),
(81, 'Prueba CARGO', 1200, 6, '2024-05-02', '23:09:45', NULL, '2024-05-02 23:09:54', 3, 1, 463, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `capacidad` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL,
  `id_nivel` int(11) NOT NULL DEFAULT '0',
  `limpieza` int(11) NOT NULL DEFAULT '1',
  `tipo_hab` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`, `estado`, `capacidad`, `fecha_creada`, `id_nivel`, `limpieza`, `tipo_hab`) VALUES
(1, '100', 'Cama con buro y cocina integral', 0, 4, 4, 1, '2024-03-12 21:52:52', 1, 0, 2),
(2, '101', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-12 21:57:49', 1, 0, 1),
(3, '102', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-12 21:57:58', 1, 0, 1),
(4, '103', 'Dos camas, un armario y tocador', 0, 3, 3, 1, '2024-03-12 21:58:09', 1, 0, 1),
(5, '104', 'Dos camas, un armario y tocador', 0, 3, 2, 1, '2024-03-19 13:45:07', 1, 0, 1),
(6, '105', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-19 13:45:15', 1, 0, 1),
(7, '106', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-19 13:45:23', 1, 0, 1),
(8, '200', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-19 13:45:34', 2, 0, 1),
(9, '201', 'Dos camas, un armario y tocador', 0, 3, 1, 1, '2024-03-19 13:45:41', 2, 0, 2),
(10, '210', 'Dos camas, un armario y tocador', 0, 3, 2, 1, '2024-03-19 13:45:49', 2, 0, 2),
(11, '202', 'Dos camas, un armario y tocador', 0, 3, 2, 1, '2024-03-19 13:46:00', 2, 0, 2),
(12, '203', 'Dos camas, un armario y tocador', 0, 3, 3, 1, '2024-03-19 13:46:32', 2, 0, 2),
(13, '204', 'Cama con buro y cocina integral', 0, 4, 1, 1, '2024-03-19 13:46:41', 2, 0, 2),
(14, '205', 'Dos camas, un armario y tocador', 0, 3, 2, 1, '2024-03-19 13:46:50', 2, 0, 2),
(15, '206', 'Dos camas, un armario y tocador', 0, 3, 2, 1, '2024-03-19 13:46:59', 2, 0, 2),
(16, '207', 'Cama con buro y cocina integral', 0, 4, 2, 1, '2024-03-19 13:47:07', 2, 0, 1),
(17, '208', 'Cama King Size con jacuzzi y tocador', 0, 5, 2, 1, '2024-03-19 13:47:21', 2, 0, 2),
(18, '209', 'Tres camas individuales, dos roperos y un tocador', 0, 2, 2, 1, '2024-03-19 13:47:32', 2, 0, 2),
(19, '300', 'Cuatro camas individuales, dos roperos y un tocador', 0, 6, 1, 1, '2024-03-19 13:47:43', 3, 0, 1),
(20, '301', 'Cama King Size con jacuzzi y tocador', 0, 5, 1, 1, '2024-03-19 13:47:56', 3, 0, 2),
(21, '302', 'Cuatro camas individuales, dos roperos y un tocador', 0, 6, 1, 1, '2024-03-19 13:48:17', 3, 0, 2),
(22, '303', 'Cama con buro y cocina integral', 0, 4, 1, 1, '2024-03-21 14:00:22', 3, 0, 1),
(23, '405', 'Cuatro camas individuales con 2 roperos', 0, 4, 1, 1, '2024-03-21 17:30:17', 3, 0, 1),
(24, '406', 'Cuatro camas individuales con 2 roperos', 0, 8, 2, 1, '2024-03-21 17:57:35', 3, 0, 1),
(25, '406', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:05:27', 2, 0, 1),
(26, '407', 'TGDFSX', 0, 2, 2, 1, '2024-04-04 17:05:37', 3, 0, 1),
(27, '408', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:05:47', 1, 0, 1),
(28, '409', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:05:55', 1, 0, 2),
(29, '410', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:06:06', 2, 0, 1),
(30, '401', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:06:23', 2, 0, 1),
(31, '412', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:06:48', 2, 0, 1),
(32, '413', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:06:57', 1, 0, 1),
(33, '414', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:07:08', 2, 0, 1),
(34, '415', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:07:22', 2, 0, 1),
(35, '505', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:12:58', 1, 0, 1),
(36, '506', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:13:07', 1, 0, 1),
(37, '508', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:13:18', 1, 0, 1),
(38, '509', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:14:10', 1, 0, 1),
(39, '505', 'TGDFSX', 0, 2, 1, 1, '2024-04-04 17:14:22', 2, 0, 1),
(40, '520', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:14:35', 1, 0, 1),
(41, '501', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:14:51', 1, 0, 1),
(42, '502', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:15:05', 1, 0, 1),
(43, '521', 'TGDFSX', 0, 3, 1, 1, '2024-04-04 17:15:20', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_mantenimiento`
--

CREATE TABLE `historial_mantenimiento` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `detalle` text,
  `fecha` date NOT NULL,
  `costo` float NOT NULL DEFAULT '0',
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial_mantenimiento`
--

INSERT INTO `historial_mantenimiento` (`id`, `id_habitacion`, `detalle`, `fecha`, `costo`, `fecha_fin`) VALUES
(1, 7, 'Espejo Roto', '2024-03-21', 800, '2024-04-04 16:23:38'),
(2, 20, 'PRUEBA', '2024-04-09', 0, '2024-04-18 02:11:06'),
(3, 2, 'uygfd', '2024-04-18', 0, '2024-04-18 02:11:51'),
(4, 1, 'kjhgft', '2024-04-18', 0, '2024-04-18 03:06:17'),
(5, 1, 'QAWTYGU', '2024-04-18', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `detalle1` varchar(160) DEFAULT NULL,
  `detalle2` text,
  `detalle3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id`, `imagen`, `titulo`, `detalle1`, `detalle2`, `detalle3`) VALUES
(1, 'logo_2.png', 'HOLTE Y RESTAURANTE DON JUAN', 'HOTEL DON JUAN UN LUGAR PERFECTO PARA DESCANZAR', 'HOLTE DON JUAN Y RESTAURANTE DON JUAN, SOMO UNA EMPRESA\r\nDETALLE 2', 'DETALLE TRES UNFORMACION. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `observacion` text,
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventary_bed`
--

CREATE TABLE `inventary_bed` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `bed_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `descripcion` text,
  `id_proveedor` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_limpieza`
--

CREATE TABLE `libro_limpieza` (
  `id` int(11) NOT NULL,
  `id_tiempo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `posi` int(11) NOT NULL DEFAULT '1',
  `orden` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro_limpieza`
--

INSERT INTO `libro_limpieza` (`id`, `id_tiempo`, `id_usuario`, `tipo`, `id_habitacion`, `fecha`, `estado`, `posi`, `orden`) VALUES
(8, 1, 4, 'R', 1, '2021-03-09', 0, 1, 1),
(9, 2, 4, 'L', 2, '2021-03-09', 0, 1, 1),
(21, 1, 3, 'L', 2, '2021-05-24', 2, 1, 1),
(22, 2, 3, 'L', 3, '2021-05-24', 2, 1, 1),
(23, 3, 3, 'L', 1, '2021-05-24', 2, 1, 1),
(24, 4, 3, 'L', 2, '2021-05-24', 0, 1, 1),
(25, 1, 3, 'L', 3, '2021-05-25', 2, 1, 1),
(30, 1, 3, 'L', 1, '2021-05-26', 0, 1, 1),
(31, 45, 2, 'A', 3, '0000-00-00', 0, 4, 1),
(32, 3, 2, 'L', 3, '2023-12-15', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `nombre`, `fecha_creada`) VALUES
(1, '1er piso', '2019-08-27 21:34:52'),
(2, '2do piso', '2019-08-27 21:36:11'),
(3, '3er piso', '2019-08-27 22:03:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagodetalleqr`
--

CREATE TABLE `pagodetalleqr` (
  `id` int(11) NOT NULL,
  `monto` double NOT NULL,
  `id_pagoqr` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `fecha_creada` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosqr`
--

CREATE TABLE `pagosqr` (
  `id` int(11) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `detalle` text,
  `logo` varchar(255) NOT NULL,
  `qr` varchar(255) NOT NULL,
  `limite` double NOT NULL DEFAULT '500',
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagosqr`
--

INSERT INTO `pagosqr` (`id`, `nombre`, `detalle`, `logo`, `qr`, `limite`, `estado`) VALUES
(1, 'YAPE', 'Debe escanear el cÃ³digo QR, haga click en continuar la adjuntar la captura de pantalla (es el Ãºnico comprobante de pago) y podrÃ¡ completar su reserva.', 'yape.png', 'qryape.jpg', 500, 1),
(2, 'PLIN', 'Debe escanear el cÃ³digo QR, haga click en continuar la adjuntar la captura de pantalla (es el Ãºnico comprobante de pago) y podrÃ¡ completar su reserva.', 'plin.png', 'images.png', 500, 1),
(3, 'jkk', 'jlk', 'NULL', 'NULL', 900, 0),
(4, 'asd', 'adad', 'GA9.jpg', 'ga5.jpg', 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `tipo_documento` int(11) DEFAULT NULL,
  `documento` varchar(12) DEFAULT NULL,
  `giro` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `tipo` int(11) DEFAULT '1',
  `vip` int(11) NOT NULL DEFAULT '0',
  `contador` int(11) NOT NULL DEFAULT '0',
  `limite` int(11) NOT NULL DEFAULT '7',
  `nacionalidad` varchar(25) DEFAULT NULL,
  `estado_civil` varchar(12) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `medio_transporte` varchar(65) DEFAULT NULL,
  `destino` varchar(55) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `celular` varchar(25) DEFAULT NULL,
  `pago` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `alergia` varchar(655) DEFAULT NULL,
  `num_reserva` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `tipo_documento`, `documento`, `giro`, `nombre`, `fecha_nac`, `razon_social`, `direccion`, `fecha_creada`, `tipo`, `vip`, `contador`, `limite`, `nacionalidad`, `estado_civil`, `ocupacion`, `medio_transporte`, `destino`, `motivo`, `telefono`, `celular`, `pago`, `estado`, `alergia`, `num_reserva`) VALUES
(91, 1, 'UUUUUUU', 'NULL', 'JOSE RODRIGO', '0000-00-00', NULL, 'jose.087@gmail.com', '2024-03-21 18:03:50', 1, 0, 0, 7, 'Nissan Versa Rojo 2019', '98416519', NULL, 'NULL', NULL, 'Cliente Frecuente', NULL, NULL, 0, 1, NULL, ''),
(92, 2, 'EIUDFHSDNI8U', '', 'Marco Antonio Torres Ojeda', NULL, NULL, 'marco9783462@gmail.com', '2024-03-21 18:13:39', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(93, 2, '978HFIEUHC9', 'NULL', 'Jose Maria Morelos', '0000-00-00', NULL, 'jose.03487@gmail.com', '2024-03-21 18:18:25', 1, 0, 0, 7, 'Honda Rojo 2016', '984162189', NULL, 'NULL', NULL, '', NULL, NULL, 0, 1, NULL, ''),
(94, 1, 'UUUUUUU', '', 'JOSE RODRIGO', NULL, NULL, 'jose.087@gmail.com', '2024-03-21 18:26:17', 1, 0, 0, 7, 'Nissan Versa Rojo 2019', '98416519', 'NULL', 'NULL', 'NULL', 'Cliente Frecuente', NULL, NULL, 0, 1, NULL, ''),
(95, 1, 'UBCE87G', '', 'MIGUEL ALEMAN DOMINGUEZ', NULL, NULL, 'miguel23@gmail.com', '2024-03-21 18:33:32', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9812978', '1', 'NULL', '-', 'Cliente Nuevo', NULL, NULL, 0, 1, NULL, ''),
(96, 1, 'UBCE87G', '', 'MIGUEL ALEMAN DOMINGUEZ', NULL, NULL, 'miguel23@gmail.com', '2024-03-21 18:42:16', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9812978', '1', 'NULL', '-', 'Cliente Nuevo', NULL, NULL, 0, 1, NULL, ''),
(97, 1, '786jhrtgdf4', NULL, 'Lupita Montes', NULL, NULL, 'lup3297@gmail.com', '2024-03-21 18:50:42', 1, 0, 0, 7, NULL, '9781565', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0198'),
(98, 1, '97Y32HDU9U', NULL, 'JOSE RODRIGO', NULL, NULL, 'jose.087@gmail.com', '2024-03-21 18:53:05', 1, 0, 0, 7, NULL, '98151897', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0117'),
(99, 1, '786jhrtgdf4', '', 'Lupita Montes', NULL, NULL, 'lup3297@gmail.com', '2024-03-21 18:55:19', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9781565', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(100, 1, 'UUUUUUU', '', 'Maria Teresa', NULL, NULL, 'jose.087@gmail.com', '2024-03-21 19:41:51', 1, 0, 0, 7, 'Nissan Versa Rojo 2019', '98416519', 'NULL', 'NULL', 'NULL', 'Cliente Frecuente', NULL, NULL, 0, 1, NULL, ''),
(101, 2, '7HFBUINVCE', NULL, 'Carlos Daniel', NULL, NULL, 'dani@gmail.com', '2024-03-21 20:00:08', 1, 0, 0, 7, NULL, '8587151', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0381'),
(102, 1, '7HFBUINVCE', '', 'Carlos Daniel', NULL, NULL, 'dani@gmail.com', '2024-03-21 20:03:57', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '8587151', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(103, 1, 'UBCE87G', '', 'MIGUEL ALEMAN DOMINGUEZ', NULL, NULL, 'miguel23@gmail.com', '2024-03-22 11:34:50', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9812978', '1', 'NULL', '-', 'Cliente Nuevo', NULL, NULL, 0, 1, NULL, ''),
(104, 1, 'UBCE87G', '', 'MIGUEL ALEMAN DOMINGUEZ', NULL, NULL, 'miguel23@gmail.com', '2024-03-22 12:43:47', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9812978', '1', 'NULL', '-', 'Cliente Nuevo', NULL, NULL, 0, 1, NULL, ''),
(105, 1, '978HFIEUHC9', '', 'Jose Maria Morelos', NULL, NULL, 'jose.03487@gmail.com', '2024-03-22 12:46:07', 1, 0, 0, 7, 'Honda Rojo 2016', '984162189', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(106, 1, 'UBCE87G', '', 'MIGUEL ALEMAN DOMINGUEZ', NULL, NULL, 'miguel23@gmail.com', '2024-03-22 22:48:35', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9812978', '1', 'NULL', '-', 'Cliente Nuevo', NULL, NULL, 0, 1, NULL, ''),
(107, 1, '675RTHGFVER5', NULL, 'Eduardo Canceco Rivera', NULL, NULL, 'edu3497@gmail.com', '2024-03-22 23:14:17', 1, 0, 0, 7, NULL, '98159787', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0792'),
(108, 1, '675RTHGFVER5', '', 'Eduardo Canceco Rivera', NULL, NULL, 'edu3497@gmail.com', '2024-03-22 23:16:33', 1, 0, 0, 7, 'NULL', '98159787', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(109, 1, 'PEHYFYUF', '', 'ODFGCHJK', NULL, NULL, 'NULL', '2024-04-04 16:22:30', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(110, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-04-04 16:22:41', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, 'C-0833'),
(111, 1, 'HFCJBK', '', 'BJHB KJ', NULL, NULL, 'NULL', '2024-04-04 16:22:54', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(112, 1, 'CVZXBNM', '', 'HXGFCHM', NULL, NULL, 'NULL', '2024-04-04 16:23:03', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(113, 1, 'PIUKGCGJHVBN', '', 'FD BN', NULL, NULL, 'NULL', '2024-04-04 16:23:14', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(114, 1, 'CVZXBNM', '', 'JGDZX', NULL, NULL, 'NULL', '2024-04-04 16:23:28', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(115, 1, 'HFCJBK', '', 'FGDFXCVBNM,', NULL, NULL, 'NULL', '2024-04-04 16:23:45', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(116, 1, 'CVZXBNM', '', 'RTEFDSA', NULL, NULL, 'NULL', '2024-04-04 16:23:57', 1, 0, 0, 7, 'NULL', 'RTEF', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(117, 1, 'UYTRGDS', '', 'UYJTRGFD', NULL, NULL, 'NULL', '2024-04-04 16:24:05', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(118, 3, 'HGFDSA', '', 'GFDS', NULL, NULL, 'NULL', '2024-04-04 16:24:14', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(119, 1, 'HFCJBK', '', 'HGBRFVDCSA', NULL, NULL, 'NULL', '2024-04-04 16:24:23', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(120, 2, 'HFCJBK', '', 'TRVECW', NULL, NULL, 'NULL', '2024-04-04 16:24:40', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(121, 1, 'HFCJBK', '', 'TRBEDWS', NULL, NULL, 'NULL', '2024-04-04 16:25:03', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(122, 1, 'HFCJBK', '', 'GVRECW', NULL, NULL, 'NULL', '2024-04-04 16:25:09', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(123, 1, 'HFCJBK', '', ';LKJMHGBFVCD', NULL, NULL, 'NULL', '2024-04-04 16:42:59', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(124, 1, 'HFCJBK', '', 'OPUMNBVC', NULL, NULL, 'NULL', '2024-04-04 17:08:13', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(125, 1, 'UJTGRED', '', 'RTEW', NULL, NULL, 'NULL', '2024-04-04 17:08:22', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(126, 1, 'HFCJBK', '', 'NYTGRWQ', NULL, NULL, 'NULL', '2024-04-04 17:08:33', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(127, 1, 'UYTGREDW', '', 'YHGTRFD', NULL, NULL, 'NULL', '2024-04-04 17:08:40', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(128, 1, 'UJYGTRWQ', '', 'UJYHTGRFED', NULL, NULL, 'NULL', '2024-04-04 17:08:49', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(129, 1, 'HFCJBKUYHGTR', '', 'YTRGD', NULL, NULL, 'NULL', '2024-04-04 17:09:00', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(130, 1, 'YUNTREW', '', 'YTGREW', NULL, NULL, 'NULL', '2024-04-04 17:09:10', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(131, 1, 'UJYHGTREW', '', 'YUJHTGREW', NULL, NULL, 'NULL', '2024-04-04 17:09:20', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(132, 1, 'UJYHGTRFDW', '', 'YHGTRFEDW', NULL, NULL, 'NULL', '2024-04-04 17:09:29', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(133, 1, 'H5G4RFED', '', 'HY5GTRFEDWQ', NULL, NULL, 'NULL', '2024-04-04 17:09:38', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(134, 1, 'YHGT4RFEDWQ', '', '6YGT4RF', NULL, NULL, 'NULL', '2024-04-04 17:09:46', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(135, 1, 'HFCJBKYF', '', 'DNM,', NULL, NULL, 'NULL', '2024-04-04 17:15:44', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(136, 1, 'DRGHBNM', '', 'RDFGHJBNM,.', NULL, NULL, 'NULL', '2024-04-04 17:15:59', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(137, 1, 'RDFGKLM,', '', 'DFKML,', NULL, NULL, 'NULL', '2024-04-04 17:16:26', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(138, 1, 'SFHBJM,.', '', 'RDFGHBJM,./', NULL, NULL, 'NULL', '2024-04-04 17:16:40', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(139, 1, 'IUDFHIUD', '', 'IUGDFHIUSDJ', NULL, NULL, 'NULL', '2024-04-04 17:16:53', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(140, 1, 'THGRFEDWSA', '', 'TYRGED', NULL, NULL, 'NULL', '2024-04-04 17:17:02', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(141, 1, 'SDFGHBNM,.', '', 'FGCVBNM,.', NULL, NULL, 'NULL', '2024-04-04 17:17:15', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(142, 1, '[P\'OURE', '', 'OPIUYJ', NULL, NULL, 'NULL', '2024-04-04 17:17:26', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(143, 1, ';/L.JHMFD', '', 'K,JMHNGBFVD', NULL, NULL, 'NULL', '2024-04-04 17:17:34', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(144, 1, 'HFCJBK', '', 'o9luyjgrfedws', NULL, NULL, 'NULL', '2024-04-04 19:24:46', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(145, 1, 'HFCJBK', '', 'ygrfds', NULL, NULL, 'NULL', '2024-04-04 20:26:08', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(146, 1, 'jhm vc', '', 'JORGE PEREZ', NULL, NULL, 'NULL', '2024-04-04 22:21:27', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(147, 1, 'HFCJBK', '', 'POIGFS', NULL, NULL, 'NULL', '2024-04-09 15:46:45', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(148, 1, 'HFCJBK', '', 'PJGBFVC', NULL, NULL, 'NULL', '2024-04-09 15:47:50', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(149, 1, 'UUUUUUU', '', 'JOSE RODRIGO', NULL, NULL, 'jose.087@gmail.com', '2024-04-09 16:01:42', 1, 0, 0, 7, 'Nissan Versa Rojo 2019', '98416519', 'NULL', 'NULL', 'NULL', 'Cliente Frecuente', NULL, NULL, 0, 1, NULL, ''),
(150, 1, '675RTHGFVER5', '', 'Eduardo Canceco Rivera', NULL, NULL, 'edu3497@gmail.com', '2024-04-09 16:02:07', 1, 0, 0, 7, 'NULL', '98159787', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(151, 1, '7HFBUINVCE', '', 'Carlos Daniel', NULL, NULL, 'dani@gmail.com', '2024-04-09 16:02:42', 1, 0, 0, 7, 'NULL', '8587151', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(152, 1, 'EIUDFHSDNI8U', '', 'Marco Antonio Torres Ojeda', NULL, NULL, 'marco9783462@gmail.com', '2024-04-09 16:03:17', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(153, 1, 'EIUDFHSDNI8U', '', 'Marco Antonio Torres Ojeda', NULL, NULL, 'marco9783462@gmail.com', '2024-04-09 16:04:06', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(154, 1, '978HFIEUHC9', '', 'Jose Maria Morelos', NULL, NULL, 'jose.03487@gmail.com', '2024-04-09 16:04:56', 1, 0, 0, 7, 'Honda Rojo 2016', '984162189', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(155, 1, 'gfvdsa', '', 'manuel', NULL, NULL, 'NULL', '2024-04-09 16:22:09', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(156, 1, 'EIUDFHSDNI8U', '', 'Marco Antonio Torres Ojeda', NULL, NULL, 'marco9783462@gmail.com', '2024-04-09 16:45:52', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(157, 1, '7HFBUINVCE', '', 'Carlos Daniel', NULL, NULL, 'dani@gmail.com', '2024-04-09 16:46:14', 1, 0, 0, 7, 'NULL', '8587151', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(158, 1, '675RTHGFVER5', '', 'Eduardo Canceco Rivera', NULL, NULL, 'edu3497@gmail.com', '2024-04-09 16:47:03', 1, 0, 0, 7, 'NULL', '98159787', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(159, 1, '978HFIEUHC9', '', 'Jose Maria Morelos', NULL, NULL, 'jose.03487@gmail.com', '2024-04-09 16:48:32', 1, 0, 0, 7, 'Honda Rojo 2016', '984162189', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(160, 1, 'EIUDFHSDNI8U', '', 'Marco Antonio Torres Ojeda', NULL, NULL, 'marco9783462@gmail.com', '2024-04-09 16:49:21', 1, 0, 0, 7, 'Chevrolet Rojo 2015', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(161, 1, 'gfvdsa', '', 'manuel', NULL, NULL, 'NULL', '2024-04-09 16:51:45', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(162, 2, 'IYBDSUYGCB', NULL, 'PRUEBA ADMIN', NULL, NULL, 'ADMIN', '2024-04-09 21:17:53', 1, 0, 0, 7, NULL, 'ADMIN', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0405'),
(163, 1, 'OIHVKJDN', NULL, 'PRUEBA ADMIN 2', NULL, NULL, 'ADMIN2', '2024-04-09 21:24:30', 1, 0, 0, 7, NULL, 'ADMIN2', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0460'),
(164, 1, 'qwjhcdnqio ', NULL, 'ljehrfiodvn', NULL, NULL, 'hjrngfd', '2024-04-09 21:41:58', 1, 0, 0, 7, NULL, ';krehg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0647'),
(165, 1, 'wiuhfjksdb', NULL, 'piufh', NULL, NULL, 'iduf', '2024-04-09 21:42:29', 1, 0, 0, 7, NULL, 'iufh', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0959'),
(166, 1, 'iuyjgfdsa', NULL, 'oiuygrfd', NULL, NULL, 'NULL', '2024-04-09 21:42:52', 1, 0, 0, 7, NULL, 'iujygfd', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0966'),
(167, 1, 'aaaaaaaaaaaa', NULL, 'AAAAAAAAAAAAAAAAAA', NULL, NULL, 'AAAAAAAAAA', '2024-04-09 21:44:55', 1, 0, 0, 7, NULL, 'AAAAAAAAAA', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0925'),
(168, 1, 'aaaaaaaaaaaa', NULL, 'AAAAAAAAAAAAAAAAAA', NULL, NULL, 'AAAAAAAAAA', '2024-04-09 21:44:55', 1, 0, 0, 7, NULL, 'AAAAAAAAAA', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0925'),
(169, 1, 'aaaaaaaaaaaa', NULL, 'AAAAAAAAAAAAAAAAAA', NULL, NULL, 'AAAAAAAAAA', '2024-04-09 21:44:55', 1, 0, 0, 7, NULL, 'AAAAAAAAAA', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0925'),
(170, 1, 'WWWWWWWWWWWW', NULL, 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:46:33', 1, 0, 0, 7, NULL, 'WWWWWWWWWWW', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0619'),
(171, 1, 'WWWWWWWWWWWW', NULL, 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:46:33', 1, 0, 0, 7, NULL, 'WWWWWWWWWWW', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0619'),
(172, 1, 'WWWWWWWWWWWW', NULL, 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:46:33', 1, 0, 0, 7, NULL, 'WWWWWWWWWWW', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0619'),
(173, 1, 'WWWWWWWWWWWW', NULL, 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:46:33', 1, 0, 0, 7, NULL, 'WWWWWWWWWWW', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0619'),
(174, 1, 'WWWWWWWWWWWW', NULL, 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:46:33', 1, 0, 0, 7, NULL, 'WWWWWWWWWWW', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0619'),
(175, 1, 'WWWWWWWWWWWW', '', 'WWWWWWWWWWWWWWWW', NULL, NULL, 'WWWWWWWWWWW', '2024-04-09 21:49:37', 1, 0, 0, 7, 'NULL', 'WWWWWWWWWWW', '1', 'NULL', '-', '2', NULL, NULL, 0, 1, NULL, ''),
(176, 1, 'UYNTRD H45', NULL, 'FFFFFFFFFFFFFF', NULL, NULL, 'NULL', '2024-04-09 22:18:49', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0130'),
(177, 1, 'iujyhgfvdsx', NULL, 'OOOOOOOOOOO', NULL, NULL, 'NULL', '2024-04-09 22:57:32', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0543'),
(178, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:37', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(179, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:37', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(180, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:37', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(181, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:38', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(182, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:38', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(183, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:38', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(184, 1, 'tttttttttttt', NULL, 'tttttttttttttttttttt', NULL, NULL, 'tttttttttttttttt', '2024-04-10 01:00:38', 1, 0, 0, 7, NULL, 'tttttttttttt', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0749'),
(185, 1, 'iuygfdsaerty', NULL, 'HHHHHHHHHHHHHHHHHH', NULL, NULL, 'marco9783462@gmail.com', '2024-04-10 13:01:07', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0602'),
(186, 1, 'iuygfdsaerty', NULL, 'HHHHHHHHHHHHHHHHHH', NULL, NULL, 'marco9783462@gmail.com', '2024-04-10 13:01:07', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0602'),
(187, 1, 'iuygfdsaerty', NULL, 'HHHHHHHHHHHHHHHHHH', NULL, NULL, 'marco9783462@gmail.com', '2024-04-10 13:01:07', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0602'),
(188, 1, 'iuygfdsaerty', NULL, 'HHHHHHHHHHHHHHHHHH', NULL, NULL, 'marco9783462@gmail.com', '2024-04-10 13:01:07', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0602'),
(189, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-04-16 11:50:46', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'TGDFSX', NULL, NULL, 0, 1, NULL, ''),
(190, 2, 'YGFHDFGH', NULL, 'ADMIN', NULL, NULL, 'marco9783462@gmail.com', '2024-04-16 12:38:31', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0262'),
(191, 1, '', NULL, '', NULL, NULL, 'NULL', '2024-04-16 13:30:00', 1, 0, 0, 7, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, ''),
(192, 1, 'KJHFDSFHJK', NULL, 'UHGFDCDFGH', NULL, NULL, 'NULL', '2024-04-16 13:30:46', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0815'),
(193, 1, 'dnmmnbvc', NULL, 'sdfghjkljhgf', NULL, NULL, 'edu3497@gmail.com', '2024-04-16 14:23:44', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0917'),
(194, 1, 'asdfghjkl;bz', NULL, 'JONAS', NULL, NULL, 'edu3497@gmail.com', '2024-04-16 14:24:36', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0491'),
(195, 1, 'SDFGHJKHGBFD', NULL, 'JONAS', NULL, NULL, 'jose.03487@gmail.com', '2024-04-16 14:25:10', 1, 0, 0, 7, NULL, 'RKL;JHGFDS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0435'),
(196, 1, 'TYUKL;\'?.', NULL, 'JONAS', NULL, NULL, 'jose.03487@gmail.com', '2024-04-16 14:26:23', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0879'),
(197, 1, 'ASDFGBVDSRTY', NULL, 'KJHVCXZXDFGHJKL', NULL, NULL, 'jose.087@gmail.com', '2024-04-16 14:37:15', 1, 0, 0, 7, NULL, 'DSAS', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0698'),
(198, 1, 'JHGFDSFGHJKL', NULL, 'JOAKIN', NULL, NULL, 'jose.03487@gmail.com', '2024-04-16 15:13:55', 1, 0, 0, 7, NULL, '53635635', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0659'),
(199, 1, 'ADFJUHOKL;KJ', NULL, 'JOAKIN2', NULL, NULL, 'jose.087@gmail.com', '2024-04-16 15:14:50', 1, 0, 0, 7, NULL, '4532546345', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0837'),
(200, 1, 'DFGHJKJHGDSA', NULL, 'JOAKIN4', NULL, NULL, 'dani@gmail.com', '2024-04-16 15:48:02', 1, 0, 0, 7, NULL, '8652340', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0238'),
(201, 1, 'SEDRF;\';LKJH', NULL, 'JOAKIN5', NULL, NULL, 'edu3497@gmail.com', '2024-04-16 15:48:39', 1, 0, 0, 7, NULL, '896532', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0166'),
(202, 1, 'EFRTYUKL;KJH', NULL, 'JOAKIN6', NULL, NULL, 'edu3497@gmail.com', '2024-04-16 15:49:20', 1, 0, 0, 7, NULL, '986532', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0474'),
(203, 1, 'DFGHJK.,JHGF', NULL, 'JOAKIN10', NULL, NULL, 'dani@gmail.com', '2024-04-16 16:03:48', 1, 0, 0, 7, NULL, '987451', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0599'),
(204, 1, '0OIUYTREWQ', NULL, 'ADMIN', NULL, NULL, 'jose.03487@gmail.com', '2024-04-16 17:35:33', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0699'),
(205, 1, 'ujhgfdsfghjk', NULL, 'JOAKIN16', NULL, NULL, 'marco9783462@gmail.com', '2024-04-16 17:43:38', 1, 0, 0, 7, NULL, 'sdfghjk', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0826'),
(206, 1, 'ujhgfdsfghjk', NULL, 'JOAKIN16', NULL, NULL, 'marco9783462@gmail.com', '2024-04-16 17:43:38', 1, 0, 0, 7, NULL, 'sdfghjk', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0826'),
(207, 1, 'ujhgfdsfghjk', NULL, 'JOAKIN16', NULL, NULL, 'marco9783462@gmail.com', '2024-04-16 17:43:38', 1, 0, 0, 7, NULL, 'sdfghjk', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0826'),
(208, 1, 'KJHFDCGBHJNM', NULL, 'ADMIN', NULL, NULL, 'jose.03487@gmail.com', '2024-04-16 21:07:06', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0632'),
(209, 1, 'SDFGHJKHGFDS', NULL, 'JOAKIN3', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 01:37:48', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0581'),
(210, 1, 'GFDFGHJHGFDG', NULL, 'JOSE GUZMAN', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 01:57:56', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0141'),
(211, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-04-17 13:50:47', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'TGDFSX', NULL, NULL, 0, 1, NULL, ''),
(212, 1, 'UGFDSRTYUL;K', NULL, 'JOAKIN3', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 14:33:44', 1, 0, 0, 7, NULL, 'ASDFTGHJKJHG', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0839'),
(213, 1, 'UYAFHJKLRET', NULL, 'JOAKIN 3312', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 16:02:03', 1, 0, 0, 7, NULL, '98465495', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0443'),
(214, 1, 'DFGHJKHGFDSA', NULL, 'JOSE HERNESTO ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 16:34:41', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0669'),
(215, 1, 'DFGHJKHGFDSA', '', 'JOSE HERNESTO ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 16:34:55', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(216, 1, 'EJKLJHGFDSAS', NULL, 'OIUJYHGFDSFGYUJ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 16:53:48', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0472'),
(217, 1, 'ertfyjkljhgf', NULL, 'opiuygtrfd', NULL, NULL, 'poiuyjg', '2024-04-17 19:02:14', 1, 0, 0, 7, NULL, 'poyujngtrvf', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0566'),
(218, 1, 'erjklkjhgfds', NULL, 'uiopiuytrertyuiop', NULL, NULL, 'jose.03487@gmail.com', '2024-04-17 19:53:35', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0815'),
(219, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-04-17 19:57:09', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'TGDFSX', NULL, NULL, 0, 1, NULL, ''),
(220, 1, 'JKHGFDGHJK', '', 'JOSE URTADO', NULL, NULL, 'jose.03487@gmail.com', '2024-04-18 02:35:39', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(221, 1, 'HJGFDSDFGHJK', '', 'IVAN PRUEBA', NULL, NULL, 'jose.03487@gmail.com', '2024-04-18 02:46:49', 1, 0, 0, 7, 'NULL', '98159787', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(222, 1, 'L;KJHGFDS;L', '', ';LKJHGF', NULL, NULL, 'NULL', '2024-04-18 03:02:17', 1, 0, 0, 7, 'NULL', 'OI', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(223, 1, 'WERTYKJHGFDS', '', 'JORGE PRUEBA', NULL, NULL, 'NULL', '2024-04-18 13:20:49', 1, 0, 0, 7, 'NULL', '945615487', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(224, 1, 'WERTYUIKLJUY', NULL, 'ADMIN', NULL, NULL, 'jose.03487@gmail.com', '2024-04-18 14:36:15', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0698'),
(225, 1, 'ertyuiytrew', '', 'TERESA MENDEZ', NULL, NULL, 'NULL', '2024-04-18 14:44:32', 1, 0, 0, 7, 'NULL', '98+6532.', '1', 'NULL', '-', 'ertyuiytrewrtyu', NULL, NULL, 0, 1, NULL, ''),
(226, 1, 'ASDFGHJKL', '', 'SDFGHJK', NULL, NULL, 'NULL', '2024-04-18 14:55:06', 1, 0, 0, 7, 'NULL', 'ASDFGHJK', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(227, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-04-21 03:17:08', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(228, 1, 'wertfghbfds', NULL, 'JORGE IVAN PEREZ HERNANDEZ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-22 17:50:37', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0417'),
(229, 1, 'wertfghbfds', '', 'JORGE IVAN PEREZ HERNANDEZ HOLA MUNDO CRUEL Y FRIOO', NULL, NULL, 'jose.03487@gmail.com', '2024-04-22 17:50:53', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(230, 1, 'IUWEGFCSDB', NULL, 'JOSE HERNANDEZ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-23 19:13:14', 1, 0, 0, 7, NULL, '9846512', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0803'),
(231, 1, 'TREWEDFGHGFD', '', 'JOSE RODRIGO ARECHIGA GAMBOA', NULL, NULL, 'jose.03487@gmail.com', '2024-04-24 01:57:39', 1, 0, 0, 7, 'NULL', '798465123', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(232, 1, 'HFCJBK', '', 'JOAKIN3', NULL, NULL, 'jose.03487@gmail.com', '2024-04-24 02:00:07', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(233, 1, 'JHGFDS', '', 'MJHGFD', NULL, NULL, 'NULL', '2024-04-24 02:01:14', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(234, 1, 'HFCJBK', '', 'hgfds', NULL, NULL, 'NULL', '2024-04-24 02:31:59', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(235, 1, 'jhgfds', '', 'hygrfeds', NULL, NULL, 'NULL', '2024-04-24 02:34:42', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(236, 1, 'RHMJNHGFDS', NULL, 'SDFGHJGFD', NULL, NULL, 'NULL', '2024-04-24 05:05:34', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0463'),
(237, 1, 'DFGHJGFDS', '', 'AKIRA TOI', NULL, NULL, 'NULL', '2024-04-24 05:54:37', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(238, 1, 'werghjhgfds', '', 'jhgfds', NULL, NULL, 'NULL', '2024-04-24 05:59:27', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(239, 1, 'HFCJBK', '', 'sdfghnm', NULL, NULL, 'NULL', '2024-04-24 06:01:16', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(240, 1, 'werthj', '', 'asdfghnm', NULL, NULL, 'NULL', '2024-04-24 06:05:32', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(241, 1, 'sdfghjngfd', '', 'edrfghfd', NULL, NULL, 'NULL', '2024-04-24 06:06:00', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(242, 1, 'wertgh', '', 'sdfgh', NULL, NULL, 'NULL', '2024-04-24 06:07:15', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(243, 1, 'wesdfghj', '', 'sdfghjm,', NULL, NULL, 'NULL', '2024-04-24 06:13:07', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(244, 1, 'IUWEGFCSDB', '', 'JOSE HERNANDEZ', NULL, NULL, 'jose.03487@gmail.com', '2024-04-24 06:14:04', 1, 0, 0, 7, 'NULL', '9846512', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(245, 1, 'esdrfghujkhg', NULL, 'kjhgfd', NULL, NULL, 'jose.03487@gmail.com', '2024-04-29 18:39:27', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0211'),
(246, 1, 'UYAFHJKLRET', '', 'JOAKIN 3312', NULL, NULL, 'jose.03487@gmail.com', '2024-04-29 18:58:04', 1, 0, 0, 7, 'NULL', '98465495', '1', 'NULL', '-', 'TGDFSX', NULL, NULL, 0, 1, NULL, ''),
(247, 1, 'wertyjkl', NULL, '34e5ruiop', NULL, NULL, 'jose.03487@gmail.com', '2024-04-29 18:59:57', 1, 0, 0, 7, NULL, '4356', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0448'),
(248, 1, 'wertyjkl', '', '34e5ruiop', NULL, NULL, 'jose.03487@gmail.com', '2024-04-29 19:00:05', 1, 0, 0, 7, 'NULL', '4356', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(249, 1, 'SDFGHJGF', NULL, 'KLJHGF', NULL, NULL, 'NULL', '2024-04-29 20:09:02', 1, 0, 0, 7, NULL, 'LKJHG', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0670'),
(250, 1, 'IUYTR', NULL, 'OIUYT', NULL, NULL, 'NULL', '2024-04-29 20:09:28', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0558'),
(251, 1, 'dghjk', NULL, 'asdftgyhj', NULL, NULL, 'NULL', '2024-04-29 21:17:28', 1, 0, 0, 7, NULL, 'dsfghj', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0381'),
(252, 1, 'dghjk', '', 'asdftgyhj', NULL, NULL, 'NULL', '2024-04-29 21:17:36', 1, 0, 0, 7, 'NULL', 'dsfghj', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(253, 1, 'sadfghj', NULL, 'erftgyhuj', NULL, NULL, 'jose.03487@gmail.com', '2024-04-29 21:21:18', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0879'),
(254, 1, 'asdfghj', NULL, 'sdfghj', NULL, NULL, 'NULL', '2024-04-29 23:43:19', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0871'),
(255, 1, 'ERTYUIOP', NULL, 'WERTYUIO', NULL, NULL, 'NULL', '2024-04-29 23:44:53', 1, 0, 0, 7, NULL, 'QWERTYU', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0679'),
(256, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-05-02 14:23:16', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(257, 1, 'sadfghj', '', 'erftgyhuj', NULL, NULL, 'jose.03487@gmail.com', '2024-05-02 14:32:21', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(258, 1, 'PRUEBA', NULL, 'PRUEBAA', NULL, NULL, 'jose.03487@gmail.com', '2024-05-02 15:24:52', 1, 0, 0, 7, NULL, '9841651', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 'C-0347'),
(259, 1, 'PRUEBA', '', 'PRUEBAA', NULL, NULL, 'jose.03487@gmail.com', '2024-05-02 15:25:20', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(260, 1, 'HFCJBK', '', 'SDFHB', NULL, NULL, 'NULL', '2024-05-02 20:58:46', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(261, 1, 'srdtfgyh', '', 'wertyu', NULL, NULL, 'NULL', '2024-05-02 21:09:50', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(262, 1, 'ASDFGHJ', '', 'EWRTYUI', NULL, NULL, 'NULL', '2024-05-02 21:16:05', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(263, 1, 'HFCJBK', '', 'efgh', NULL, NULL, 'NULL', '2024-05-02 21:21:33', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(264, 1, 'WERTYUI', '', 'AWERTYU', NULL, NULL, 'NULL', '2024-05-02 22:46:43', 1, 0, 0, 7, 'NULL', '9841651', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, ''),
(265, 1, 'HFCJBK', '', 'Jose Alfredo', NULL, NULL, 'NULL', '2024-05-02 23:09:04', 1, 0, 0, 7, 'NULL', 'NULL', '1', 'NULL', '-', 'NULL', NULL, NULL, 0, 1, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id` int(11) NOT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `precio` double NOT NULL DEFAULT '0',
  `cant_noche` float NOT NULL DEFAULT '1',
  `dinero_dejado` double NOT NULL DEFAULT '0',
  `id_tipo_pago` int(11) DEFAULT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `id_usuario` int(11) DEFAULT NULL,
  `cant_personas` double DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_creada` datetime DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `observacion` varchar(255) DEFAULT NULL,
  `pagado` int(11) NOT NULL DEFAULT '1',
  `nro_operacion` varchar(25) DEFAULT NULL,
  `nro_folio` varchar(25) NOT NULL DEFAULT '-',
  `extra` float NOT NULL DEFAULT '0',
  `tarjeta_e` varchar(25) NOT NULL DEFAULT 'Entregada',
  `comprobante` varchar(65) NOT NULL DEFAULT 'no',
  `credito` int(11) NOT NULL DEFAULT '0',
  `reserva` int(11) NOT NULL DEFAULT '0',
  `id_tipo_comprobante` int(11) DEFAULT NULL,
  `id_comisionista` int(11) DEFAULT NULL,
  `tipo_servicio` int(11) NOT NULL DEFAULT '1',
  `moneda` varchar(30) NOT NULL DEFAULT 'MXN',
  `descuento` float NOT NULL DEFAULT '0',
  `mensual` int(11) NOT NULL DEFAULT '0',
  `pasajero` varchar(255) DEFAULT NULL,
  `finalizado_por` varchar(65) NOT NULL DEFAULT 'admin',
  `total_v` double DEFAULT NULL,
  `deuda` double DEFAULT NULL,
  `id_limpieza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id`, `id_habitacion`, `id_tarifa`, `id_cliente`, `precio`, `cant_noche`, `dinero_dejado`, `id_tipo_pago`, `fecha_entrada`, `fecha_salida`, `total`, `id_usuario`, `cant_personas`, `id_caja`, `estado`, `fecha_creada`, `cantidad`, `observacion`, `pagado`, `nro_operacion`, `nro_folio`, `extra`, `tarjeta_e`, `comprobante`, `credito`, `reserva`, `id_tipo_comprobante`, `id_comisionista`, `tipo_servicio`, `moneda`, `descuento`, `mensual`, `pasajero`, `finalizado_por`, `total_v`, `deuda`, `id_limpieza`) VALUES
(26, 0, NULL, 26, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-03 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 16:52:08', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(28, 0, NULL, 27, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-04 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 17:05:41', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(29, 0, NULL, 28, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-05 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 17:06:17', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(30, 0, NULL, 29, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-04 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 17:06:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(31, 0, NULL, 30, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-04 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 17:06:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(32, 0, NULL, 31, 0, 1, 0, 1, '2024-02-01 12:00:00', '2024-02-06 12:00:00', 0, 1, 1, NULL, 3, '2024-02-01 17:06:57', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(33, 1, NULL, 26, 0, 1, 0, 1, '2024-03-12 12:00:00', '2024-03-16 12:00:00', 0, 1, 1, NULL, 5, '2024-03-12 21:53:06', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(35, 1, 4, 45, 10000, 6, 0, 1, '2024-03-12 22:01:00', '2024-03-18 14:05:00', 80300, 1, 1, 7, 1, '2024-03-12 22:03:01', 1, 'Turismo', 1, NULL, 'T0000001', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 80300, 80300, 2),
(36, 2, NULL, 26, 0, 1, 0, 1, '2024-03-16 12:00:00', '2024-03-18 12:00:00', 0, 1, 1, NULL, 5, '2024-03-12 23:26:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(37, 2, NULL, 46, 0, 6, 0, 1, '2024-03-15 12:00:00', '2024-03-21 12:00:00', 0, 1, 1, NULL, 5, '2024-03-12 23:26:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 28000, 28000, NULL),
(40, 2, 5, 47, 2000, 1, 0, 1, '2024-03-19 13:41:00', '2024-03-20 13:42:43', 12587.36, 1, 1, 7, 1, '2024-03-19 13:42:01', 1, 'Turismo', 1, NULL, 'T0000002', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 12587.4, 12587.36, NULL),
(41, 4, NULL, 26, 0, 1, 0, 1, '2024-03-19 12:00:00', '2024-03-26 12:00:00', 0, 1, 1, NULL, 5, '2024-03-19 13:48:54', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(54, 3, 4, 52, 10000, 1, 0, 1, '2024-03-19 13:52:00', '2024-03-20 14:02:44', 10000, 1, 1, 7, 1, '2024-03-19 13:52:11', 1, 'Turismo', 1, NULL, 'T0000003', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(55, 4, 4, 53, 10000, 1, 0, 1, '2024-03-19 13:52:00', '2024-03-20 14:02:52', 10000, 1, 1, 7, 1, '2024-03-19 13:52:24', 1, 'Turismo', 1, NULL, 'T0000004', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(56, 5, 4, 54, 10000, 1, 0, 1, '2024-03-19 13:52:00', '2024-03-20 14:02:58', 10000, 1, 1, 7, 1, '2024-03-19 13:52:35', 1, 'Turismo', 1, NULL, 'T0000005', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(57, 8, 4, 55, 10000, 1, 0, 1, '2024-03-19 13:52:00', '2024-03-20 14:03:41', 10000, 1, 1, 7, 1, '2024-03-19 13:52:59', 1, 'Turismo', 1, NULL, 'T0000006', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(58, 6, 4, 56, 10000, 1, 0, 1, '2024-03-19 13:53:00', '2024-03-20 14:03:09', 10000, 1, 1, 7, 1, '2024-03-19 13:53:35', 1, 'Turismo', 1, NULL, 'T0000007', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(59, 7, 4, 57, 10000, 1, 0, 1, '2024-03-19 13:53:00', '2024-03-20 14:03:25', 10000, 1, 1, 7, 1, '2024-03-19 13:53:47', 1, 'Turismo', 1, NULL, 'T0000008', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(60, 10, 4, 58, 10000, 4, 0, 1, '2024-03-19 13:54:00', '2024-03-23 14:03:48', 40000, 1, 1, 7, 1, '2024-03-19 13:54:10', 1, 'Turismo', 1, NULL, 'T0000009', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 40000, 40000, 2),
(61, 11, 4, 59, 10000, 5, 0, 1, '2024-03-19 13:54:00', '2024-03-24 14:04:02', 50000, 1, 1, 7, 1, '2024-03-19 13:54:30', 1, 'Turismo', 1, NULL, 'T00000010', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 50000, 50000, 2),
(62, 12, 4, 60, 10000, 2, 0, 1, '2024-03-19 13:54:00', '2024-03-21 14:04:20', 20000, 1, 1, 7, 1, '2024-03-19 13:54:52', 1, 'Turismo', 1, NULL, 'T0000011', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 20000, 20000, NULL),
(63, 13, 4, 61, 10000, 4, 0, 1, '2024-03-19 13:55:00', '2024-03-23 14:04:33', 40000, 1, 1, 7, 1, '2024-03-19 13:55:12', 1, 'Turismo', 1, NULL, 'T0000012', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 40000, 40000, NULL),
(64, 14, 5, 62, 2000, 1, 0, 1, '2024-03-19 13:55:00', '2024-03-20 14:04:41', 2000, 1, 1, 7, 1, '2024-03-19 13:55:22', 1, 'Turismo', 1, NULL, 'T0000013', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, NULL),
(65, 1, 4, 63, 10000, 1, 0, 1, '2024-03-16 14:06:00', '2024-03-17 15:56:27', 10000, 1, 1, 7, 1, '2024-03-19 14:06:09', 1, 'Turismo', 1, NULL, 'T0000014', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(67, 9, 4, 64, 10000, 3, 0, 1, '2024-03-19 14:08:00', '2024-03-22 13:26:59', 30000, 1, 1, 7, 1, '2024-03-19 14:08:38', 1, 'Turismo', 1, NULL, 'T0000015', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 30000, 30000, 2),
(69, 17, 7, 65, 2000, 1, 0, 1, '2024-03-19 14:09:00', '2024-03-20 13:27:28', 2000, 1, 1, 7, 1, '2024-03-19 14:09:56', 1, 'Turismo', 1, NULL, 'T0000016', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(70, 15, 5, 66, 2000, 1, 0, 1, '2024-03-19 14:10:00', '2024-03-20 00:08:55', 2000, 1, 1, 7, 1, '2024-03-19 14:10:10', 1, 'Turismo', 1, NULL, 'T0000017', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(71, 16, 6, 67, 2000, 1, 0, 1, '2024-03-19 14:10:00', '2024-03-20 13:27:21', 2000, 1, 1, 7, 1, '2024-03-19 14:10:19', 1, 'Turismo', 1, NULL, 'T0000018', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(76, 18, 4, 68, 10000, 1, 0, 1, '2024-03-19 14:11:00', '2024-03-20 13:27:37', 10000, 1, 1, 7, 1, '2024-03-19 14:11:24', 1, 'Turismo', 1, NULL, 'T0000019', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(77, 19, 5, 69, 2000, 1, 0, 1, '2024-03-19 14:11:00', '2024-03-20 13:28:12', 2000, 1, 1, 7, 1, '2024-03-19 14:11:35', 1, 'Turismo', 1, NULL, 'T0000020', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(78, 20, 7, 70, 2000, 1, 0, 1, '2024-03-19 14:11:00', '2024-03-20 13:28:02', 2000, 1, 1, 7, 1, '2024-03-19 14:11:45', 1, 'Turismo', 1, NULL, 'T0000021', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 1),
(79, 21, 8, 71, 2000, 1, 0, 1, '2024-03-19 14:12:00', '2024-03-20 13:27:52', 2000, 1, 1, 7, 1, '2024-03-19 14:12:26', 1, 'Turismo', 1, NULL, 'T0000022', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(86, 8, NULL, 26, 0, 1, 0, 1, '2024-03-22 12:00:00', '2024-03-26 12:00:00', 0, 1, 1, NULL, 5, '2024-03-19 14:15:19', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(87, 10, NULL, 26, 0, 1, 0, 1, '2024-03-24 12:00:00', '2024-03-27 12:00:00', 0, 1, 1, NULL, 5, '2024-03-19 14:15:28', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(88, 11, NULL, 26, 0, 1, 0, 1, '2024-03-25 12:00:00', '2024-03-28 12:00:00', 0, 1, 1, NULL, 5, '2024-03-19 14:15:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(89, 12, NULL, 26, 0, 1, 0, 1, '2024-03-24 12:00:00', '2024-03-27 12:00:00', 0, 1, 1, NULL, 5, '2024-03-19 14:15:43', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(90, 2, 5, 72, 2000, 1, 0, 1, '2024-03-22 14:15:00', '2024-03-23 13:27:06', 2000, 1, 1, 7, 1, '2024-03-19 14:15:51', 1, 'Turismo', 1, NULL, 'T0000023', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 2),
(91, 3, 4, 73, 10000, 1, 0, 1, '2024-03-22 14:15:00', '2024-03-23 13:26:38', 10000, 1, 1, 7, 1, '2024-03-19 14:16:04', 1, 'Turismo', 1, NULL, 'T0000024', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(92, 4, 4, 74, 10000, 1, 0, 1, '2024-03-22 14:16:00', '2024-03-23 13:26:29', 10000, 1, 1, 7, 1, '2024-03-19 14:16:32', 1, 'Turismo', 1, NULL, 'T0000025', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(93, 5, 4, 75, 10000, 1, 0, 1, '2024-03-22 14:16:00', '2024-03-23 13:26:52', 10000, 1, 1, 7, 1, '2024-03-19 14:16:47', 1, 'Turismo', 1, NULL, 'T0000026', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 5),
(94, 6, 4, 76, 10000, 1, 0, 1, '2024-03-22 14:16:00', '2024-03-23 13:26:45', 10000, 1, 1, 7, 1, '2024-03-19 14:17:00', 1, 'Turismo', 1, NULL, 'T0000027', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(95, 7, 4, 77, 10000, 1, 0, 1, '2024-03-22 14:17:00', '2024-03-23 13:27:13', 10000, 1, 1, 7, 1, '2024-03-19 14:17:12', 1, 'Turismo', 1, NULL, 'T0000028', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 10000, 10000, 2),
(97, 14, 5, 79, 2000, 4, 0, 1, '2024-03-21 15:17:00', '2024-03-25 13:27:45', 8000, 1, 1, 7, 1, '2024-03-20 15:18:07', 1, 'Turismo', 1, NULL, 'T0000029', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 8000, 8000, 2),
(99, 1, 4, 81, 10000, 7, 0, 1, '2024-03-19 15:55:00', '2024-03-26 15:58:01', 80000, 1, 1, 7, 1, '2024-03-20 15:56:03', 1, '-', 1, NULL, 'T0000030', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 80000, 80000, NULL),
(101, 1, 4, 83, 10000, 3, 0, 1, '2024-03-20 15:59:00', '2024-03-23 13:26:18', 30000, 1, 1, 7, 1, '2024-03-20 15:59:21', 1, 'Turismo', 1, NULL, 'T0000031', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 30000, 30000, 5),
(102, 15, NULL, 26, 0, 1, 0, 1, '2024-03-21 12:00:00', '2024-03-24 12:00:00', 0, 1, 1, NULL, 5, '2024-03-21 00:08:29', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(103, 2, NULL, 84, 0, 1, 0, 1, '2024-03-21 12:00:00', '2024-03-24 12:00:00', 0, 6, 1, NULL, 5, '2024-03-21 14:17:40', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(104, 1, 5, 85, 1500, 2, 0, 2, '2024-03-21 14:45:00', '2024-03-23 16:52:38', 2800, 6, 1, 10, 1, '2024-03-21 15:09:28', 1, 'Turismo', 1, NULL, 'T0000032', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, 'Elvia Oralia Hernandez Olvera, Carlos Daniel Perez Hernandez', 'Admin', 2800, 2800, NULL),
(105, 2, 4, 86, 1300, 3, 0, 2, '2024-03-21 15:31:00', '2024-03-24 16:51:56', 3900, 6, 1, 10, 1, '2024-03-21 15:32:14', 1, 'Turismo', 1, NULL, 'T0000033', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3900, 3900, NULL),
(106, 3, 5, 87, 1500, 2, 0, 2, '2024-03-21 15:46:00', '2024-03-23 16:52:02', 3000, 6, 1, 10, 1, '2024-03-21 15:47:35', 1, 'Turismo', 1, '', 'T0000034', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3000, 3000, NULL),
(107, 4, 6, 88, 1500, 1, 0, 2, '2024-03-21 16:02:00', '2024-03-22 16:52:31', 1500, 6, 1, 10, 1, '2024-03-21 16:02:48', 1, 'Turismo', 1, '', 'T0000035', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(108, 5, 6, 89, 1500, 1, 0, 2, '2024-03-21 16:06:00', '2024-03-22 16:52:20', 1500, 6, 1, 10, 1, '2024-03-21 16:06:21', 1, 'Turismo', 1, 'TC-4599', 'T0000036', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(109, 9, 6, 90, 1500, 1, 0, 2, '2024-03-21 16:30:00', '2024-03-22 16:52:52', 200, 6, 1, 10, 1, '2024-03-21 16:44:15', 1, 'Turismo', 1, 'TC-4587', 'T0000037', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 200, 200, NULL),
(110, 4, 6, 92, 1000, 3, 0, 2, '2024-03-21 18:07:00', '2024-03-24 18:16:11', 2800, 6, 1, 14, 1, '2024-03-21 18:13:39', 1, 'Turismo', 1, '8957', 'T0000038', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, 'Maria Antonienta', 'Admin', 2800, 2800, NULL),
(111, 4, 6, 94, 1000, 3, 0, 2, '2024-03-21 18:21:00', '2024-03-24 18:28:20', 2700, 6, 1, 14, 1, '2024-03-21 18:26:17', 1, 'Turismo', 1, '9556', 'T0000039', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2700, 2700, NULL),
(112, 2, 4, 95, 1300, 1, 0, 1, '2024-03-21 18:32:00', '2024-03-22 16:37:53', 1300, 6, 1, 14, 1, '2024-03-21 18:33:32', 1, 'Turismo', 1, '', 'T0000040', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, 11),
(113, 6, 4, 96, 1300, 3, 0, 1, '2024-03-21 18:41:00', '2024-03-24 16:38:54', 3900, 6, 1, 14, 1, '2024-03-21 18:42:16', 1, 'Turismo', 1, '', 'T0000041', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3900, 3900, 6),
(115, 16, NULL, 98, 0, 1, 0, 1, '2024-03-21 18:52:00', '2024-03-27 18:52:00', 0, 6, 1, NULL, 4, '2024-03-21 18:53:05', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(116, 8, 5, 99, 1500, 4, 0, 2, '2024-03-21 18:53:00', '2024-03-25 18:57:23', 6500, 6, 1, 14, 1, '2024-03-21 18:55:19', 1, 'Turismo', 1, '9556', 'T0000042', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 6500, 6500, NULL),
(117, 5, 7, 100, 1500, 3, 0, 1, '2024-03-21 19:39:00', '2024-03-24 16:38:41', 4500, 6, 1, 15, 1, '2024-03-21 19:41:51', 1, 'Turismo', 1, '', 'T0000043', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 4500, 4500, 11),
(119, 18, 8, 102, 1000, 7, 0, 2, '2024-03-21 20:00:00', '2024-03-28 20:05:38', 6700, 6, 1, 17, 1, '2024-03-21 20:03:57', 1, 'Turismo', 1, '9556', 'T0000044', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, 'Maria Antonienta', 'Admin', 6700, 6700, NULL),
(120, 3, 4, 103, 1300.01, 1, 0, 1, '2024-03-22 11:34:00', '2024-03-23 16:38:22', 1401, 6, 1, 17, 1, '2024-03-22 11:34:50', 1, 'Turismo', 1, '', 'T0000045', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1401, 1401, 11),
(121, 9, 6, 104, 1500, 1, 0, 2, '2024-03-22 12:43:00', '2024-03-23 16:39:27', 1500, 6, 1, 17, 1, '2024-03-22 12:43:47', 1, 'Turismo', 1, 'TC-3879', 'T0000046', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(122, 1, 4, 105, 1300, 1, 0, 2, '2024-03-22 12:45:00', '2024-03-23 16:37:45', 1300, 6, 1, 17, 1, '2024-03-22 12:46:07', 1, 'Turismo', 1, 'TD-5874', 'T0000047', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, 11),
(123, 10, 6, 106, 1500, 2, 0, 1, '2024-03-22 22:48:00', '2024-03-24 16:39:21', 3000, 6, 1, 17, 1, '2024-03-22 22:48:35', 1, 'Turismo', 1, '', 'T0000048', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3000, 3000, 11),
(125, 12, 6, 108, 1500, 1, 0, 1, '2024-03-22 23:16:00', '2024-03-23 16:39:14', 1500, 6, 1, 17, 1, '2024-03-22 23:16:33', 1, 'Turismo', 1, '', 'T0000049', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 6),
(126, 15, 6, 109, 1500, 1, 0, 1, '2024-04-04 16:22:00', '2024-04-05 16:40:38', 1500, 6, 1, 17, 1, '2024-04-04 16:22:30', 1, 'Turismo', 1, '', 'T0000050', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(127, 16, 4, 110, 1300, 1, 0, 1, '2024-04-04 16:22:00', '2024-04-05 16:40:51', 1300, 6, 1, 17, 1, '2024-04-04 16:22:41', 1, 'Turismo', 1, '', 'T0000051', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, NULL),
(128, 17, 10, 111, 2500, 1, 0, 1, '2024-04-04 16:22:00', '2024-04-05 16:41:05', 2500, 6, 1, 17, 1, '2024-04-04 16:22:54', 1, 'Turismo', 1, '', 'T0000052', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2500, 2500, NULL),
(129, 19, 9, 112, 2200, 1, 0, 1, '2024-04-04 16:22:00', '2024-04-05 00:00:00', 0, 6, 1, 17, 5, '2024-04-04 16:23:03', 1, 'Turismo', 1, '', 'T0000053', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 0, 2200, NULL),
(130, 18, 8, 113, 2000, 1, 0, 1, '2024-04-04 16:23:00', '2024-04-05 16:39:41', 2000, 6, 1, 17, 1, '2024-04-04 16:23:14', 1, 'Turismo', 1, '', 'T0000054', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, NULL),
(131, 13, 4, 114, 1300, 1, 0, 1, '2024-04-04 16:23:00', '2024-04-05 16:40:11', 1300, 6, 1, 17, 1, '2024-04-04 16:23:28', 1, 'Turismo', 1, '', 'T0000055', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, NULL),
(132, 7, 5, 115, 1500, 1, 0, 1, '2024-04-04 16:23:00', '2024-04-05 16:39:54', 1500, 6, 1, 17, 1, '2024-04-04 16:23:45', 1, 'Turismo', 1, '', 'T0000056', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(133, 14, 7, 116, 1750, 1, 0, 1, '2024-04-04 16:23:00', '2024-04-05 16:40:24', 1750, 6, 1, 17, 1, '2024-04-04 16:23:57', 1, 'Turismo', 1, '', 'T0000057', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1750, 1750, NULL),
(134, 20, 10, 117, 2500, 1, 0, 1, '2024-04-04 16:23:00', '2024-04-05 16:42:01', 2500, 6, 1, 17, 1, '2024-04-04 16:24:05', 1, 'Turismo', 1, '', 'T0000058', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2500, 2500, NULL),
(135, 21, 9, 118, 2200, 1, 0, 1, '2024-04-04 16:24:00', '2024-04-05 16:41:48', 2200, 6, 1, 17, 1, '2024-04-04 16:24:14', 1, 'Turismo', 1, '', 'T0000059', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2200, 2200, NULL),
(136, 22, 5, 119, 1500, 1, 0, 1, '2024-04-04 16:24:00', '2024-04-05 16:41:33', 1500, 6, 1, 17, 1, '2024-04-04 16:24:23', 1, 'Turismo', 1, '', 'T0000060', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(137, 23, 4, 120, 1300, 1, 0, 1, '2024-04-04 16:24:00', '2024-04-05 16:41:19', 1300, 6, 1, 17, 1, '2024-04-04 16:24:40', 1, 'Turismo', 1, '', 'T0000061', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, NULL),
(138, 4, 6, 121, 1500, 1, 0, 1, '2024-04-04 16:24:00', '2024-04-05 16:38:34', 1500, 6, 1, 17, 1, '2024-04-04 16:25:03', 1, 'Turismo', 1, '', 'T0000062', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 6),
(139, 11, 6, 122, 1500, 1, 0, 1, '2024-04-04 16:25:00', '2024-04-05 16:39:07', 1500, 6, 1, 17, 1, '2024-04-04 16:25:09', 1, 'Turismo', 1, '', 'T0000063', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(140, 19, 9, 123, 2200, 1, 0, 1, '2024-04-04 16:42:00', '2024-04-05 13:56:20', 2700, 6, 1, 17, 1, '2024-04-04 16:42:59', 1, 'Turismo', 1, '', 'T0000064', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2700, 2700, 13),
(141, 24, 14, 124, 1000, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:56:48', 1000, 6, 1, 17, 1, '2024-04-04 17:08:13', 1, 'Turismo', 1, '', 'T0000065', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1000, 1000, 6),
(142, 25, 6, 125, 1500, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:57:00', 1500, 6, 1, 17, 1, '2024-04-04 17:08:22', 1, 'Turismo', 1, '', 'T0000066', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 12),
(143, 26, 8, 126, 2000, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:57:07', 2000, 6, 1, 17, 1, '2024-04-04 17:08:33', 1, 'Turismo', 1, '', 'T0000067', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 12),
(144, 27, 6, 127, 1500, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:57:15', 1500, 6, 1, 17, 1, '2024-04-04 17:08:40', 1, 'Turismo', 1, '', 'T0000068', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(145, 28, 7, 128, 1750, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:57:26', 1750, 6, 1, 17, 1, '2024-04-04 17:08:49', 1, 'Turismo', 1, '', 'T0000069', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1750, 1750, 11),
(146, 29, 8, 129, 2000, 1, 0, 1, '2024-04-04 17:08:00', '2024-04-05 13:57:33', 2000, 6, 1, 17, 1, '2024-04-04 17:09:00', 1, 'Turismo', 1, '', 'T0000070', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 12),
(147, 30, 8, 130, 2000, 1, 0, 1, '2024-04-04 17:09:00', '2024-04-05 15:56:14', 2000, 6, 1, 17, 1, '2024-04-04 17:09:10', 1, 'Turismo', 1, '', 'T0000071', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 12),
(148, 31, 8, 131, 2000, 1, 0, 1, '2024-04-04 17:09:00', '2024-04-05 15:56:35', 2000, 6, 1, 17, 1, '2024-04-04 17:09:20', 1, 'Turismo', 1, '', 'T0000072', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 6),
(149, 32, 11, 132, 2800, 1, 0, 1, '2024-04-04 17:09:00', '2024-04-05 15:56:45', 2800, 6, 1, 17, 1, '2024-04-04 17:09:29', 1, 'Turismo', 1, '', 'T0000073', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2800, 2800, 12),
(150, 33, 6, 133, 1500, 1, 0, 1, '2024-04-04 17:09:00', '2024-04-05 15:56:52', 1500, 6, 1, 17, 1, '2024-04-04 17:09:38', 1, 'Turismo', 1, '', 'T0000074', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 13),
(151, 34, 6, 134, 1500, 1, 0, 1, '2024-04-04 17:09:00', '2024-04-05 15:57:00', 1500, 6, 1, 17, 1, '2024-04-04 17:09:46', 1, 'Turismo', 1, '', 'T0000075', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(152, 35, 6, 135, 1500, 1, 0, 1, '2024-04-04 17:15:00', '2024-04-05 15:57:07', 1500, 6, 1, 17, 1, '2024-04-04 17:15:44', 1, 'Turismo', 1, '', 'T0000076', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 12),
(153, 36, 6, 136, 1500, 1, 0, 1, '2024-04-04 17:15:00', '2024-04-05 15:56:26', 1500, 6, 1, 17, 1, '2024-04-04 17:15:59', 1, 'Turismo', 1, '', 'T0000077', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(154, 37, 6, 137, 1500, 1, 0, 1, '2024-04-04 17:16:00', '2024-04-05 15:57:15', 1500, 6, 1, 17, 1, '2024-04-04 17:16:26', 1, 'Turismo', 1, '', 'T0000078', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(155, 38, 8, 138, 2000, 1, 0, 1, '2024-04-04 17:16:00', '2024-04-05 15:57:38', 2000, 6, 1, 17, 1, '2024-04-04 17:16:40', 1, 'Turismo', 1, '', 'T0000079', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 11),
(156, 39, 8, 139, 2000, 1, 0, 1, '2024-04-04 17:16:00', '2024-04-05 15:57:46', 2000, 6, 1, 17, 1, '2024-04-04 17:16:53', 1, 'Turismo', 1, '', 'T0000080', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, 11),
(157, 40, 6, 140, 1500, 1, 0, 1, '2024-04-04 17:16:00', '2024-04-05 15:57:53', 1500, 6, 1, 17, 1, '2024-04-04 17:17:02', 1, 'Turismo', 1, '', 'T0000081', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 6),
(158, 41, 6, 141, 1500, 1, 0, 1, '2024-04-04 17:17:00', '2024-04-05 15:58:01', 1500, 6, 1, 17, 1, '2024-04-04 17:17:15', 1, 'Turismo', 1, '', 'T0000082', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 11),
(159, 42, 7, 142, 1750, 1, 0, 1, '2024-04-04 17:17:00', '2024-04-05 15:58:08', 1750, 6, 1, 17, 1, '2024-04-04 17:17:26', 1, 'Turismo', 1, '', 'T0000083', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1750, 1750, 6),
(160, 43, 6, 143, 1500, 1, 0, 1, '2024-04-04 17:17:00', '2024-04-05 15:58:15', 1500, 6, 1, 17, 1, '2024-04-04 17:17:34', 1, 'Turismo', 1, '', 'T0000084', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, 6),
(161, 1, 4, 144, 1300, 1, 0, 6, '2024-04-04 19:23:00', '2024-04-05 19:25:26', 1300, 6, 1, 17, 1, '2024-04-04 19:24:46', 1, 'Turismo', 1, '-', 'T0000085', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 82, 1300, NULL),
(162, 1, 4, 145, 1300, 1, 0, 6, '2024-04-04 20:25:00', '2024-04-05 23:05:56', 1900, 6, 1, 18, 1, '2024-04-04 20:26:08', 1, 'Turismo', 1, '-', 'T0000086', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 230, 1900, NULL),
(163, 2, 5, 146, 1500, 1, 0, 1, '2024-04-04 22:21:00', '2024-04-05 22:21:45', 2000, 6, 1, 21, 1, '2024-04-04 22:21:27', 1, 'Turismo', 1, '', 'T0000087', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2000, 2000, NULL),
(164, 1, 4, 147, 1300, 1, 0, 7, '2024-04-09 15:45:00', '2024-04-10 10:43:26', 1800, 6, 1, 21, 1, '2024-04-09 15:46:45', 1, 'Turismo', 1, 'TC-EPDIA', 'T0000088', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1800, 1800, NULL),
(165, 2, 4, 148, 1300, 1, 0, 2, '2024-04-09 15:47:00', '2024-04-10 13:53:22', 1300, 6, 1, 21, 1, '2024-04-09 15:47:50', 1, 'Turismo', 1, 'TC-TARJETA', 'T0000089', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, NULL),
(166, 3, 4, 149, 1300, 2, 0, 1, '2024-04-09 16:01:00', '2024-04-11 13:53:32', 2600, 6, 1, 22, 1, '2024-04-09 16:01:42', 1, 'Turismo', 1, '', 'T0000090', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 2600, 2600, NULL),
(167, 4, 6, 150, 1500, 2, 0, 2, '2024-04-09 16:01:00', '2024-04-11 13:53:43', 3000, 6, 1, 22, 1, '2024-04-09 16:02:07', 1, 'Turismo', 1, 'TC-5984', 'T0000091', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3000, 3000, NULL),
(168, 5, 7, 151, 1750, 3, 0, 2, '2024-04-09 16:02:00', '2024-04-12 13:51:18', 5250, 6, 1, 22, 1, '2024-04-09 16:02:42', 1, 'Turismo', 1, 'TD-8745', 'T0000092', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 5250, 5250, NULL),
(169, 6, 5, 152, 1500, 3, 0, 3, '2024-04-09 16:02:00', '2024-04-12 13:54:00', 4500, 6, 1, 22, 1, '2024-04-09 16:03:17', 1, 'Turismo', 1, '-', 'T0000093', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 4500, 4500, NULL),
(170, 7, 5, 153, 1500, 1, 0, 7, '2024-04-09 16:03:00', '2024-04-10 13:54:16', 1500, 6, 1, 22, 1, '2024-04-09 16:04:06', 1, 'Turismo', 1, 'TC-2458', 'T0000094', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(171, 8, 5, 154, 1500, 3, 0, 6, '2024-04-09 16:04:00', '2024-04-12 13:55:11', 4500, 6, 1, 22, 1, '2024-04-09 16:04:56', 1, 'Turismo', 1, '', 'T0000095', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 265, 4500, NULL),
(172, 9, 6, 155, 1500, 4, 0, 7, '2024-04-09 16:07:00', '2024-04-13 13:54:52', 6000, 6, 1, 22, 1, '2024-04-09 16:22:09', 1, 'Turismo', 1, 'TD-8745', 'T0000096', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 30879.5, 6000, NULL),
(173, 10, 6, 156, 1500, 2, 0, 1, '2024-04-09 16:45:00', '2024-04-11 13:55:41', 3000, 6, 1, 23, 1, '2024-04-09 16:45:52', 1, 'Turismo', 1, '', 'T0000097', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3000, 3000, NULL),
(174, 11, 7, 157, 1750, 1, 0, 2, '2024-04-09 16:45:00', '2024-04-10 13:55:51', 1750, 6, 1, 23, 1, '2024-04-09 16:46:14', 1, 'Turismo', 1, 'TD-8745', 'T0000098', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1750, 1750, NULL),
(175, 12, 13, 158, 900, 1, 0, 2, '2024-04-09 16:46:00', '2024-04-10 13:55:58', 900, 6, 1, 23, 1, '2024-04-09 16:47:03', 1, 'Turismo', 1, 'TC-7458', 'T0000099', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 900, 900, NULL),
(176, 13, 4, 159, 1300, 4, 0, 3, '2024-04-09 16:47:00', '2024-04-13 13:54:09', 5200, 6, 1, 23, 1, '2024-04-09 16:48:32', 1, 'Turismo', 1, 'Jose Morelos', 'T00000100', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 5200, 5200, NULL),
(177, 14, 6, 160, 1500, 1, 0, 6, '2024-04-09 16:48:00', '2024-04-10 13:55:19', 1500, 6, 1, 23, 1, '2024-04-09 16:49:21', 1, 'Turismo', 1, 'Tipo de Cambio: $16.00', 'T00000101', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 94, 1500, NULL),
(178, 16, 5, 161, 1500, 1, 0, 7, '2024-04-09 16:49:00', '2024-04-10 13:55:03', 1413, 6, 1, 23, 1, '2024-04-09 16:51:45', 1, 'Turismo', 1, 'TC-5984', 'T00000102', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1413, 1413, NULL),
(179, 30, NULL, 92, 0, 1, 0, 1, '2024-04-09 21:09:00', '2024-04-13 21:09:00', 0, 6, 1, NULL, 5, '2024-04-09 21:10:01', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(180, 1, NULL, 92, 0, 1, 0, 1, '2024-04-09 21:13:00', '2024-04-13 21:13:00', 0, 6, 1, NULL, 5, '2024-04-09 21:13:30', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(181, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:17:00', '2024-04-13 21:17:00', 0, 6, 1, NULL, 5, '2024-04-09 21:17:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(182, 1, NULL, 162, 0, 1, 0, 1, '2024-04-09 21:17:00', '2024-04-13 21:17:00', 0, 6, 1, NULL, 5, '2024-04-09 21:17:53', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(183, 1, NULL, 163, 0, 1, 0, 1, '2024-04-09 21:24:00', '2024-04-13 21:24:00', 0, 6, 1, NULL, 5, '2024-04-09 21:24:30', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(184, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:24', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(185, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:25', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(186, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(187, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(188, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(189, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(190, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:28', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(191, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:28', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(192, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:28', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(193, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 21:30:00', '2024-04-13 21:30:00', 0, 6, 1, NULL, 5, '2024-04-09 21:30:29', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(194, 1, NULL, 164, 0, 1, 0, 1, '2024-04-09 21:41:00', '2024-04-13 21:41:00', 0, 6, 1, NULL, 5, '2024-04-09 21:41:58', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(195, 2, NULL, 165, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:42:29', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(196, 2, NULL, 166, 0, 1, 0, 1, '2024-04-09 21:41:00', '2024-04-13 21:41:00', 0, 6, 1, NULL, 5, '2024-04-09 21:42:52', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(197, 3, NULL, 167, 0, 1, 3, 1, '2024-04-09 21:44:00', '2024-04-13 21:44:00', 0, 6, 1, NULL, 3, '2024-04-09 21:44:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(198, 2, NULL, 168, 0, 1, 3, 1, '2024-04-09 21:44:00', '2024-04-13 21:44:00', 0, 6, 1, NULL, 5, '2024-04-09 21:44:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(199, 4, NULL, 169, 0, 1, 3, 1, '2024-04-09 21:44:00', '2024-04-13 21:44:00', 0, 6, 1, NULL, 3, '2024-04-09 21:44:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(200, 2, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(201, 4, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(202, 3, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(203, 11, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(204, 16, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(205, 9, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(206, 18, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(207, 25, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(208, 27, NULL, 92, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-09 21:45:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(209, 5, NULL, 170, 0, 1, 0, 1, '2024-04-09 21:44:00', '2024-04-18 21:44:00', 0, 6, 1, NULL, 5, '2024-04-09 21:46:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(210, 10, NULL, 171, 0, 1, 0, 1, '2024-04-09 21:44:00', '2024-04-18 21:44:00', 0, 6, 1, NULL, 5, '2024-04-09 21:46:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(211, 7, NULL, 172, 0, 1, 0, 1, '2024-04-09 21:44:00', '2024-04-18 21:44:00', 0, 6, 1, NULL, 5, '2024-04-09 21:46:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(212, 3, NULL, 173, 0, 1, 0, 1, '2024-04-09 21:44:00', '2024-04-18 21:44:00', 0, 6, 1, NULL, 5, '2024-04-09 21:46:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(214, 1, 4, 175, 1300, 9, 0, 1, '2024-04-09 21:47:00', '2024-04-18 10:44:30', 11700, 6, 1, 24, 1, '2024-04-09 21:49:37', 1, 'Turismo', 1, '', 'T00000103', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 11700, 11700, NULL),
(215, 2, NULL, 110, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-16 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:17:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(216, 1, NULL, 110, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-16 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:17:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(217, 4, NULL, 110, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-16 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:17:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(218, 1, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(219, 2, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(220, 4, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(221, 3, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(222, 6, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(223, 5, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 5, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(224, 7, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(225, 8, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(226, 9, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(227, 10, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(228, 11, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(229, 12, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(230, 13, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(231, 14, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(232, 15, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(233, 16, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(234, 17, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(235, 18, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(236, 19, NULL, 176, 0, 1, 0, 1, '2024-04-09 22:17:00', '2024-04-12 22:17:00', 0, 6, 1, NULL, 3, '2024-04-09 22:18:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(237, 2, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(238, 1, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(239, 3, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(240, 5, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(241, 4, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(242, 6, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(243, 7, NULL, 177, 0, 1, 0, 1, '2024-04-09 22:57:00', '2024-04-15 22:57:00', 0, 6, 1, NULL, 5, '2024-04-09 22:57:32', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(244, 32, NULL, 178, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(245, 34, NULL, 179, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(246, 35, NULL, 180, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(247, 37, NULL, 181, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(248, 42, NULL, 182, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(249, 38, NULL, 183, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(250, 43, NULL, 184, 0, 1, 0, 1, '2024-04-10 01:00:00', '2024-04-18 01:00:00', 0, 6, 1, NULL, 5, '2024-04-10 01:00:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(251, 1, NULL, 185, 0, 1, 0, 1, '2024-04-10 13:00:00', '2024-04-17 13:00:00', 0, 6, 1, NULL, 5, '2024-04-10 13:01:07', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(252, 2, NULL, 186, 0, 1, 0, 1, '2024-04-10 13:00:00', '2024-04-17 13:00:00', 0, 6, 1, NULL, 5, '2024-04-10 13:01:07', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(253, 3, NULL, 187, 0, 1, 0, 1, '2024-04-10 13:00:00', '2024-04-17 13:00:00', 0, 6, 1, NULL, 5, '2024-04-10 13:01:07', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(254, 5, NULL, 188, 0, 1, 0, 1, '2024-04-10 13:00:00', '2024-04-17 13:00:00', 0, 6, 1, NULL, 5, '2024-04-10 13:01:07', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(255, 1, NULL, 92, 0, 1, 0, 1, '2024-04-10 13:01:00', '2024-04-17 13:01:00', 0, 6, 1, NULL, 5, '2024-04-10 13:02:57', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(256, 2, NULL, 92, 0, 1, 0, 1, '2024-04-10 13:01:00', '2024-04-17 13:01:00', 0, 6, 1, NULL, 5, '2024-04-10 13:02:57', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(257, 3, NULL, 92, 0, 1, 0, 1, '2024-04-10 13:01:00', '2024-04-17 13:01:00', 0, 6, 1, NULL, 5, '2024-04-10 13:02:57', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(258, 1, NULL, 110, 0, 1, 0, 1, '2024-04-10 13:04:00', '2024-04-12 13:04:00', 0, 6, 1, NULL, 5, '2024-04-10 13:04:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(259, 2, NULL, 110, 0, 1, 0, 1, '2024-04-10 13:04:00', '2024-04-12 13:04:00', 0, 6, 1, NULL, 3, '2024-04-10 13:04:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(260, 3, NULL, 110, 0, 1, 0, 1, '2024-04-10 13:04:00', '2024-04-12 13:04:00', 0, 6, 1, NULL, 5, '2024-04-10 13:04:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(261, 4, NULL, 110, 0, 1, 0, 1, '2024-04-10 13:04:00', '2024-04-12 13:04:00', 0, 6, 1, NULL, 5, '2024-04-10 13:04:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(262, 5, NULL, 110, 0, 1, 0, 1, '2024-04-10 13:04:00', '2024-04-12 13:04:00', 0, 6, 1, NULL, 5, '2024-04-10 13:04:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(264, 2, 4, 189, 1300, 19, 0, 1, '2024-04-16 11:50:00', '2024-05-05 15:59:16', 24700, 6, 1, 25, 1, '2024-04-16 11:50:46', 1, 'Turismo', 1, '', 'T00000104', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 24700, 24700, NULL),
(265, 3, NULL, 92, 0, 1, 0, 1, '2024-04-16 11:51:00', '2024-04-20 11:51:00', 0, 6, 1, NULL, 5, '2024-04-16 11:51:44', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(266, 2, NULL, 110, 0, 1, 0, 1, '2024-04-19 12:17:00', '2024-04-23 12:17:00', 0, 6, 1, NULL, 5, '2024-04-16 12:17:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(267, 2, NULL, 190, 0, 1, 0, 1, '2024-04-19 12:38:00', '2024-04-23 12:38:00', 0, 6, 1, NULL, 5, '2024-04-16 12:38:31', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(268, 1, NULL, 110, 0, 1, 0, 1, '2024-04-17 13:11:00', '2024-04-20 13:11:00', 0, 6, 1, NULL, 5, '2024-04-16 13:30:00', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(269, 4, NULL, 110, 0, 1, 0, 1, '2024-04-17 13:11:00', '2024-04-20 13:11:00', 0, 6, 1, NULL, 5, '2024-04-16 13:30:00', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(270, 2, NULL, 110, 0, 3, 0, 1, '2024-04-23 13:11:00', '2024-04-26 13:11:00', 0, 6, 1, NULL, 5, '2024-04-16 13:30:00', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 0, 0, NULL),
(271, 3, NULL, 110, 0, 1, 0, 1, '2024-04-17 13:11:00', '2024-04-20 13:11:00', 0, 6, 1, NULL, 5, '2024-04-16 13:30:00', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(272, 2, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 13:30:00', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(273, 2, NULL, 192, 0, 1, 0, 1, '2024-04-16 13:30:00', '2024-04-18 13:30:00', 0, 6, 1, NULL, 5, '2024-04-16 13:30:46', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL);
INSERT INTO `proceso` (`id`, `id_habitacion`, `id_tarifa`, `id_cliente`, `precio`, `cant_noche`, `dinero_dejado`, `id_tipo_pago`, `fecha_entrada`, `fecha_salida`, `total`, `id_usuario`, `cant_personas`, `id_caja`, `estado`, `fecha_creada`, `cantidad`, `observacion`, `pagado`, `nro_operacion`, `nro_folio`, `extra`, `tarjeta_e`, `comprobante`, `credito`, `reserva`, `id_tipo_comprobante`, `id_comisionista`, `tipo_servicio`, `moneda`, `descuento`, `mensual`, `pasajero`, `finalizado_por`, `total_v`, `deuda`, `id_limpieza`) VALUES
(274, 6, NULL, 110, 0, 1, 0, 1, '2024-04-16 14:04:00', '2024-04-16 14:04:00', 0, 6, 1, NULL, 3, '2024-04-16 14:05:01', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(275, 4, NULL, 110, 0, 1, 0, 1, '2024-04-16 14:04:00', '2024-04-16 14:04:00', 0, 6, 1, NULL, 3, '2024-04-16 14:05:01', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 0, 0, NULL),
(276, 6, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 14:05:01', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(277, 4, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 14:05:01', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(278, 0, NULL, 193, 0, 1, 0, 1, '2024-04-17 14:23:00', '2024-04-18 14:23:00', 0, 6, 1, NULL, 3, '2024-04-16 14:23:44', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(279, 0, NULL, 194, 0, 1, 0, 1, '2024-04-17 14:24:00', '2024-04-19 14:24:00', 0, 6, 1, NULL, 3, '2024-04-16 14:24:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(280, 0, NULL, 195, 0, 1, 0, 1, '2024-04-17 14:24:00', '2024-04-23 14:24:00', 0, 6, 1, NULL, 3, '2024-04-16 14:25:10', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(281, 4, NULL, 196, 0, 1, 0, 1, '2024-04-16 14:26:00', '2024-04-18 14:26:00', 0, 6, 1, NULL, 5, '2024-04-16 14:26:23', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(282, 5, NULL, 196, 0, 1, 0, 1, '2024-04-16 14:26:00', '2024-04-18 14:26:00', 0, 6, 1, NULL, 5, '2024-04-16 14:26:23', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(283, 5, NULL, 197, 0, 1, 0, 1, '2024-04-16 14:37:00', '2024-04-19 14:37:00', 0, 6, 1, NULL, 5, '2024-04-16 14:37:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(284, 4, NULL, 92, 0, 1, 0, 1, '2024-04-16 15:12:00', '2024-04-18 15:12:00', 0, 6, 1, NULL, 5, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(285, 6, NULL, 92, 0, 1, 0, 1, '2024-04-16 15:12:00', '2024-04-18 15:12:00', 0, 6, 1, NULL, 5, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(286, 5, NULL, 92, 0, 1, 0, 1, '2024-04-16 15:12:00', '2024-04-18 15:12:00', 0, 6, 1, NULL, 5, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(287, 5, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(288, 4, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(289, 6, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 15:12:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(290, 7, NULL, 198, 0, 1, 0, 1, '2024-04-16 15:13:00', '2024-04-19 15:13:00', 0, 6, 1, NULL, 5, '2024-04-16 15:13:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(291, 5, NULL, 199, 0, 1, 0, 1, '2024-04-18 15:14:00', '2024-04-19 15:14:00', 0, 6, 1, NULL, 5, '2024-04-16 15:14:50', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(292, 5, NULL, 200, 0, 1, 0, 1, '2024-04-16 15:47:00', '2024-04-18 15:47:00', 0, 6, 1, NULL, 5, '2024-04-16 15:48:02', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(293, 8, NULL, 201, 0, 1, 0, 1, '2024-04-16 15:48:00', '2024-04-20 15:48:00', 0, 6, 1, NULL, 5, '2024-04-16 15:48:39', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(294, 7, NULL, 202, 0, 1, 0, 1, '2024-04-17 15:49:00', '2024-04-20 15:49:00', 0, 6, 1, NULL, 5, '2024-04-16 15:49:20', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(295, 8, NULL, 203, 0, 1, 0, 1, '2024-04-16 16:03:00', '2024-04-18 16:03:00', 0, 6, 1, NULL, 5, '2024-04-16 16:03:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(296, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(297, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(298, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(299, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(300, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(301, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(302, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(303, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(304, 8, NULL, 204, 0, 3, 0, 1, '2024-04-20 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 0, 0, NULL),
(305, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(306, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(307, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(308, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(309, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(310, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(311, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(312, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(313, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(314, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(315, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:36', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(316, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(317, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(318, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(319, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(320, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(321, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(322, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(323, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(324, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(325, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:35:37', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(326, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(327, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(328, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(329, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(330, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(331, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(332, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(333, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(334, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(335, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:13', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(336, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(337, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(338, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(339, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(340, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(341, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(342, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(343, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(344, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(345, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(346, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(347, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-05-10 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(348, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(349, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(350, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(351, 9, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(352, 6, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(353, 7, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(354, 8, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(355, 5, NULL, 204, 0, 1, 0, 1, '2024-04-19 17:34:00', '2024-04-23 17:34:00', 0, 6, 1, NULL, 5, '2024-04-16 17:38:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(356, 12, NULL, 92, 0, 7, 0, 1, '2024-04-19 17:40:00', '2024-04-26 17:40:00', 0, 6, 1, NULL, 5, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 0, 0, NULL),
(357, 11, NULL, 92, 0, 1, 0, 1, '2024-04-19 17:40:00', '2024-04-23 17:40:00', 0, 6, 1, NULL, 5, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(358, 10, NULL, 92, 0, 1, 0, 1, '2024-04-19 17:40:00', '2024-04-23 17:40:00', 0, 6, 1, NULL, 5, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(359, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(360, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(361, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(362, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(363, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(364, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(365, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(366, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(367, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(368, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(369, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(370, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(371, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(372, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(373, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:42:42', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(374, 11, NULL, 205, 0, 1, 0, 1, '2024-04-23 17:43:00', '2024-04-26 17:43:00', 0, 6, 1, NULL, 5, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(375, 12, NULL, 206, 0, 1, 0, 1, '2024-04-23 17:43:00', '2024-04-26 17:43:00', 0, 6, 1, NULL, 5, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(376, 10, NULL, 207, 0, 1, 0, 1, '2024-04-23 17:43:00', '2024-04-26 17:43:00', 0, 6, 1, NULL, 5, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(377, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(378, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(379, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(380, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(381, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(382, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-16 17:43:38', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(383, 16, NULL, 92, 0, 1, 0, 1, '2024-04-21 20:40:00', '2024-04-24 20:40:00', 0, 6, 1, NULL, 5, '2024-04-16 20:40:55', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(384, 17, NULL, 110, 0, 1, 0, 1, '2024-04-21 12:00:00', '2024-04-25 12:00:00', 0, 6, 1, NULL, 5, '2024-04-16 21:06:23', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(385, 19, NULL, 208, 0, 1, 0, 1, '2024-04-21 21:07:00', '2024-04-25 21:07:00', 0, 6, 1, NULL, 5, '2024-04-16 21:07:06', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(386, 21, NULL, 110, 0, 1, 0, 1, '2024-04-21 12:00:00', '2024-04-24 12:00:00', 0, 6, 1, NULL, 5, '2024-04-16 21:32:17', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(387, 21, NULL, 110, 0, 1, 0, 1, '2024-04-24 12:00:00', '2024-04-27 12:00:00', 0, 6, 1, NULL, 5, '2024-04-16 21:32:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(388, 21, NULL, 110, 0, 1, 0, 1, '2024-04-27 12:00:00', '2024-04-30 12:00:00', 0, 6, 1, NULL, 5, '2024-04-16 21:32:51', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(389, 11, NULL, 209, 0, 1, 0, 1, '2024-04-20 01:37:00', '2024-04-23 01:37:00', 0, 6, 1, NULL, 5, '2024-04-17 01:37:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(390, 10, NULL, 209, 0, 1, 0, 1, '2024-04-20 01:37:00', '2024-04-23 01:37:00', 0, 6, 1, NULL, 5, '2024-04-17 01:37:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(391, 12, NULL, 209, 0, 1, 0, 1, '2024-04-20 01:37:00', '2024-04-23 01:37:00', 0, 6, 1, NULL, 5, '2024-04-17 01:37:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(392, 10, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-17 01:37:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(393, 12, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-17 01:37:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(394, 11, NULL, 191, 0, 1, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 6, 1, NULL, 3, '2024-04-17 01:37:49', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(395, 13, NULL, 110, 0, 1, 0, 1, '2024-04-21 12:00:00', '2024-04-25 12:00:00', 0, 6, 1, NULL, 5, '2024-04-17 01:50:31', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(396, 2, NULL, 210, 0, 1, 0, 1, '2024-04-19 01:57:00', '2024-04-23 01:57:00', 0, 6, 1, NULL, 5, '2024-04-17 01:57:56', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(397, 2, NULL, 110, 0, 1, 0, 1, '2024-04-21 12:00:00', '2024-04-26 12:00:00', 0, 6, 1, NULL, 5, '2024-04-17 03:59:08', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(398, 2, NULL, 110, 0, 1, 0, 1, '2024-04-21 03:59:00', '2024-04-27 03:59:00', 0, 6, 1, NULL, 5, '2024-04-17 03:59:26', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(399, 2, NULL, 110, 0, 6, 0, 1, '2024-04-21 03:59:00', '2024-05-11 03:59:00', 0, 6, 1, NULL, 5, '2024-04-17 03:59:44', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', 0, 0, NULL),
(401, 5, 6, 211, 1500, 2, 0, 1, '2024-04-17 13:50:00', '2024-04-19 15:59:37', 3000, 6, 1, 25, 1, '2024-04-17 13:50:47', 1, 'Turismo', 1, '', 'T00000105', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 3000, 3000, NULL),
(402, 2, NULL, 212, 0, 1, 0, 1, '2024-05-04 14:33:00', '2024-05-11 14:33:00', 0, 6, 1, NULL, 5, '2024-04-17 14:33:44', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(405, 10, 6, 215, 1500, 44, 0, 1, '2024-04-22 16:34:00', '2024-06-05 03:07:11', 67500, 6, 1, 25, 1, '2024-04-17 16:34:55', 1, 'Turismo', 1, '', 'T00000106', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 67500, 67500, NULL),
(406, 10, NULL, 110, 0, 1, 0, 1, '2024-04-29 16:52:00', '2024-05-03 16:52:00', 0, 6, 1, NULL, 5, '2024-04-17 16:53:03', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(407, 10, NULL, 216, 0, 1, 0, 1, '2024-04-29 16:53:00', '2024-05-03 16:53:00', 0, 6, 1, NULL, 5, '2024-04-17 16:53:48', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(408, 10, NULL, 217, 0, 1, 0, 1, '2024-05-12 19:02:00', '2024-05-20 19:02:00', 0, 6, 1, NULL, 5, '2024-04-17 19:02:14', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(409, 10, NULL, 218, 0, 1, 0, 1, '2024-06-05 19:53:00', '2024-06-17 19:53:00', 0, 6, 1, NULL, 3, '2024-04-17 19:53:35', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(411, 11, 6, 219, 1500, 2, 0, 1, '2024-04-21 19:57:00', '2024-04-23 12:00:00', 0, 6, 1, 25, 5, '2024-04-17 19:57:09', 1, 'Turismo', 1, '', 'T00000107', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 3008, 3008, NULL),
(413, 3, 4, 221, 1300, 3, 0, 1, '2024-04-18 02:46:00', '2024-04-21 00:00:00', 0, 6, 1, 26, 5, '2024-04-18 02:46:49', 1, 'Turismo', 1, '', 'T00000108', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 3900, 3900, NULL),
(414, 2, 5, 222, 1500, 1, 0, 1, '2024-04-18 03:02:00', '2024-04-19 00:00:00', 0, 6, 1, 26, 5, '2024-04-18 03:02:17', 1, 'Turismo', 1, '', 'T00000109', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(415, 3, 4, 223, 1300, 3, 0, 1, '2024-04-18 13:20:00', '2024-04-21 12:00:00', 0, 6, 1, 26, 5, '2024-04-18 13:20:49', 1, 'Turismo', 1, '', 'T00000110', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1302, 1302, NULL),
(416, 6, NULL, 224, 0, 1, 0, 1, '2024-04-18 12:00:00', '2024-04-22 12:00:00', 0, 6, 1, NULL, 3, '2024-04-18 14:36:15', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(417, 5, 6, 225, 1500, 1, 0, 1, '2024-04-18 14:44:00', '2024-04-19 00:00:00', 0, 6, 1, 26, 0, '2024-04-18 14:44:32', 1, 'Turismo', 1, '', 'T00000111', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1200, 1500, NULL),
(418, 7, 4, 226, 1300, 1, 0, 1, '2024-04-18 14:54:00', '2024-04-19 14:55:12', 1300, 6, 1, 26, 1, '2024-04-18 14:55:06', 1, 'Turismo', 1, '', 'T00000112', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1300, 1300, NULL),
(420, 4, 6, 227, 1500, 1, 0, 1, '2024-04-21 03:17:00', '2024-04-22 14:38:06', 1500, 6, 1, 26, 1, '2024-04-21 03:17:08', 1, 'Turismo', 1, '', 'T00000113', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(422, 12, 6, 229, 1500, 1, 0, 1, '2024-04-22 17:50:00', '2024-04-23 12:00:00', 0, 6, 1, 26, 5, '2024-04-22 17:50:53', 1, 'Turismo', 1, '', 'T00000114', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(424, 2, 4, 231, 1300, 3, 0, 1, '2024-04-24 12:00:00', '2024-04-27 12:00:00', 0, 6, 1, 27, 0, '2024-04-24 01:57:39', 1, 'Turismo', 1, '', 'T00000115', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 3900, 3900, NULL),
(425, 11, 6, 232, 1500, 1, 0, 1, '2024-04-24 01:59:00', '2024-04-25 02:00:00', 0, 6, 1, 27, 5, '2024-04-24 02:00:07', 1, 'Turismo', 1, '', 'T00000116', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(426, 11, 6, 233, 1500, 1, 0, 1, '2024-04-24 02:01:00', '2024-04-25 02:01:00', 0, 6, 1, 27, 5, '2024-04-24 02:01:14', 1, 'Turismo', 1, '', 'T00000117', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(427, 11, 6, 234, 1500, 2, 0, 1, '2024-04-24 02:31:00', '2024-04-26 12:00:00', 0, 6, 1, 27, 0, '2024-04-24 02:31:59', 1, 'Turismo', 1, '', 'T00000118', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 3000, NULL),
(428, 11, 6, 235, 1500, 1, 0, 1, '2024-04-24 02:34:00', '2024-04-25 02:34:00', 0, 6, 1, 27, 0, '2024-04-24 02:34:42', 1, 'Turismo', 1, '', 'T00000119', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(429, 3, NULL, 236, 0, 1, 0, 1, '2024-04-26 12:00:00', '2024-05-02 12:00:00', 0, 6, 1, NULL, 5, '2024-04-24 05:05:34', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(430, 7, 4, 237, 1300, 1, 0, 1, '2024-04-24 05:54:00', '2024-04-25 12:07:00', 0, 6, 1, 27, 5, '2024-04-24 05:54:37', 1, 'Turismo', 1, '', 'T00000120', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(431, 3, 4, 238, 1300, 1, 0, 1, '2024-04-24 05:58:00', '2024-04-25 13:59:00', 0, 6, 1, 27, 5, '2024-04-24 05:59:27', 1, 'Turismo', 1, '', 'T00000121', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(432, 3, 4, 239, 1300, 1, 0, 1, '2024-04-24 06:00:00', '2024-04-25 12:01:00', 0, 6, 1, 27, 5, '2024-04-24 06:01:16', 1, 'Turismo', 1, '', 'T00000122', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1300, NULL),
(433, 3, 4, 240, 1300, 1, 0, 1, '2024-04-24 06:04:00', '2024-04-25 06:04:00', 0, 6, 1, 27, 5, '2024-04-24 06:05:32', 1, 'Turismo', 1, '', 'T00000123', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(434, 3, 4, 241, 1300, 1, 0, 1, '2024-04-24 06:05:00', '2024-04-25 06:05:00', 0, 6, 1, 27, 5, '2024-04-24 06:06:00', 1, 'Turismo', 1, '', 'T00000124', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(435, 3, 4, 242, 1300, 1, 0, 1, '2024-04-24 06:07:00', '2024-04-25 06:07:00', 0, 6, 1, 27, 5, '2024-04-24 06:07:15', 1, 'Turismo', 1, '', 'T00000125', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(436, 3, 4, 243, 1300, 1, 0, 1, '2024-04-24 06:12:00', '2024-04-25 11:59:00', 0, 6, 1, 27, 0, '2024-04-24 06:13:07', 1, 'Turismo', 1, '', 'T00000126', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(437, 7, 4, 244, 1300, 4, 0, 1, '2024-04-25 06:13:00', '2024-04-29 19:13:00', 0, 6, 1, 27, 0, '2024-04-24 06:14:04', 1, 'Turismo', 1, '', 'T00000127', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 5200, 5200, NULL),
(438, 7, NULL, 245, 0, 1, 0, 1, '2024-04-30 12:00:00', '2024-05-04 12:00:00', 0, 6, 1, NULL, 3, '2024-04-29 18:39:27', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(439, 11, 6, 246, 1500, 1, 0, 1, '2024-04-29 18:57:00', '2024-04-30 12:00:00', 0, 6, 1, 28, 0, '2024-04-29 18:58:04', 1, 'Turismo', 1, '', 'T00000128', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(441, 12, 6, 248, 1500, 1, 0, 1, '2024-04-29 18:59:00', '2024-04-30 19:16:43', 1500, 6, 1, 28, 1, '2024-04-29 19:00:05', 1, 'Turismo', 1, '', 'T00000129', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'Admin', 1500, 1500, NULL),
(442, 12, NULL, 249, 0, 1, 0, 1, '2024-05-01 12:00:00', '2024-05-04 12:00:00', 0, 6, 1, NULL, 0, '2024-04-29 20:09:02', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(443, 13, NULL, 250, 0, 1, 0, 1, '2024-05-01 12:00:00', '2024-05-04 12:00:00', 0, 6, 1, NULL, 0, '2024-04-29 20:09:28', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(447, 16, 4, 252, 1300, 1, 0, 1, '2024-04-29 21:17:00', '2024-04-30 12:00:00', 0, 6, 1, 28, 0, '2024-04-29 21:17:36', 1, 'Turismo', 1, '', 'T00000130', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 0, 1300, NULL),
(449, 18, NULL, 110, 0, 1, 500, 1, '2024-04-29 12:00:00', '2024-05-02 12:00:00', 0, 6, 1, NULL, 5, '2024-04-29 21:21:33', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(450, 13, NULL, 254, 0, 1, 0, 1, '2024-05-05 12:00:00', '2024-05-08 12:00:00', 0, 6, 1, NULL, 3, '2024-04-29 23:43:19', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(451, 15, NULL, 255, 0, 1, 0, 1, '2024-05-05 12:00:00', '2024-05-09 12:00:00', 0, 6, 1, NULL, 5, '2024-04-29 23:44:53', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(452, 20, NULL, 110, 0, 1, 0, 1, '2024-04-30 12:00:00', '2024-05-03 12:00:00', 0, 6, 1, NULL, 5, '2024-04-30 01:01:07', 1, '-', 1, NULL, '-', 0, 'Entregada', 'no', 0, 1, NULL, NULL, 1, 'MXN', 0, 0, NULL, 'admin', NULL, NULL, NULL),
(453, 15, 6, 256, 1500, 3, 0, 1, '2024-05-02 14:22:00', '2024-05-05 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 14:23:16', 1, 'Turismo', 1, '', 'T00000131', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 4500, NULL),
(454, 17, 10, 257, 2500, 12, 0, 1, '2024-05-02 14:32:00', '2024-05-14 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 14:32:21', 1, 'Turismo', 1, '', 'T00000132', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 22500, 30000, NULL),
(456, 24, 14, 259, 1000, 6, 0, 2, '2024-05-02 15:24:00', '2024-05-08 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 15:25:20', 1, 'Turismo', 1, 'TD-8712', 'T00000133', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 5000, 6000, NULL),
(457, 14, 6, 260, 1500, 3, 0, 2, '2024-05-02 20:58:00', '2024-05-05 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 20:58:46', 1, 'Turismo', 1, '', 'T00000134', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 4500, 4500, NULL),
(458, 18, 8, 261, 2000, 1, 0, 2, '2024-05-02 21:09:00', '2024-05-03 21:09:00', 0, 6, 1, 28, 0, '2024-05-02 21:09:50', 1, 'Turismo', 1, '', 'T00000135', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 2000, 2000, NULL),
(459, 8, 4, 262, 1300, 1, 0, 2, '2024-05-02 21:15:00', '2024-05-03 21:16:00', 0, 6, 1, 28, 0, '2024-05-02 21:16:05', 1, 'Turismo', 1, '', 'T00000136', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1300, 1300, NULL),
(460, 10, 6, 263, 1500, 1, 0, 2, '2024-05-02 21:21:00', '2024-05-03 00:00:00', 0, 6, 1, 28, 0, '2024-05-02 21:21:33', 1, 'Turismo', 1, '', 'T00000137', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 1500, 1500, NULL),
(461, 6, 4, 264, 1300, 8, 0, 2, '2024-05-02 22:46:00', '2024-05-10 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 22:46:43', 1, 'Turismo', 1, '', 'T00000138', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 10400, 10400, NULL),
(463, 26, 8, 265, 2000, 4, 0, 2, '2024-05-02 23:08:00', '2024-05-06 12:00:00', 0, 6, 1, 28, 0, '2024-05-02 23:09:04', 1, 'Turismo', 1, '', 'T00000139', 0, 'Entregada', '1', 1, 0, NULL, 0, 1, 'MXN', 0, 0, '', 'admin', 9200, 9200, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_pago`
--

CREATE TABLE `proceso_pago` (
  `id` int(11) NOT NULL,
  `monto` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `nro_operacion` varchar(25) DEFAULT NULL,
  `id_tipopago` int(11) DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `aval` varchar(255) DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `pagado` int(11) NOT NULL DEFAULT '1',
  `noche` int(11) NOT NULL DEFAULT '1',
  `banco` varchar(65) DEFAULT '1',
  `operacion` varchar(65) DEFAULT NULL,
  `mbanco` double NOT NULL DEFAULT '0',
  `malimentacion` double NOT NULL DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  `terminacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso_pago`
--

INSERT INTO `proceso_pago` (`id`, `monto`, `total`, `nro_operacion`, `id_tipopago`, `id_proceso`, `id_caja`, `fecha_creada`, `aval`, `cantidad`, `fecha_entrada`, `fecha_salida`, `pagado`, `noche`, `banco`, `operacion`, `mbanco`, `malimentacion`, `id_user`, `terminacion`) VALUES
(25, 5000, 10000, '1', 1, 17, 4, '2023-11-13 15:21:12', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '25', 5000, 0, 1, NULL),
(26, 1000, 0, '0', 2, 17, 4, '2023-11-13 15:22:01', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '26', 1000, 0, 1, NULL),
(27, 5000, 10000, '1', 1, 18, 5, '2023-11-13 15:24:33', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '27', 5000, 0, 1, NULL),
(28, 10, 10, '1', 1, 19, 6, '2023-12-13 18:09:16', 'BOL23', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(29, 0, 0, '1', 2, 20, 6, '2023-12-13 18:38:36', 'nn', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(30, 0, 15000, '1', 1, 18, 6, '2023-12-13 19:03:42', NULL, 1, '2023-11-14 17:23:52', '2023-11-16 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(31, 100, 10000, '1', 6, 21, 6, '2023-12-15 16:54:29', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '31', 100, 0, 1, NULL),
(32, 0, 0, '1', 2, 22, 6, '2023-12-15 17:19:43', '1 cama KING', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(33, 4000, 0, '0', 1, 17, 6, '2023-12-15 18:31:13', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '33', 4000, 0, 1, NULL),
(34, 4000, 10000, '1', 1, 23, 6, '2023-12-15 18:38:26', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '34', 4000, 0, 1, NULL),
(35, 6000, 0, '0', 1, 23, 6, '2023-12-15 18:38:42', 'null', 1, NULL, NULL, 1, 1, '1', '35', 6000, 0, 1, NULL),
(36, 4000, 10000, '1', 1, 24, 6, '2023-12-15 19:53:46', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '36', 4000, 0, 2, NULL),
(37, 0, 0, '1', 2, 25, 6, '2023-12-15 20:25:20', 'nn', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 2, NULL),
(38, 100, 0, '0', 6, 21, 6, '2023-12-15 20:38:49', '203/1996/ROX', 1, NULL, NULL, 1, 1, '1', '38', 100, 0, 2, NULL),
(39, 0, 0, '1', 1, 26, 7, '2024-02-01 16:52:08', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(40, 388.24, 0, '0', 6, 21, 7, '2024-02-01 16:53:41', '388.24', 1, NULL, NULL, 1, 1, '1', '40', 388.24, 0, 1, NULL),
(41, 6000, 0, '0', 1, 24, 7, '2024-02-01 16:54:08', '6000', 1, NULL, NULL, 1, 1, '1', '41', 6000, 0, 1, NULL),
(42, 0, 0, '1', 1, 27, 7, '2024-02-01 17:00:29', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(43, 0, 0, '1', 1, 28, 7, '2024-02-01 17:05:41', 'DW', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(44, 0, 0, '1', 1, 29, 7, '2024-02-01 17:06:17', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(45, 0, 0, '1', 1, 30, 7, '2024-02-01 17:06:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(46, 0, 0, '1', 1, 31, 7, '2024-02-01 17:06:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(47, 0, 0, '1', 1, 32, 7, '2024-02-01 17:06:57', 'N BD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(48, 0, 0, '1', 1, 33, 7, '2024-02-01 17:07:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(49, 0, 0, '1', NULL, 33, 7, '2024-02-07 16:09:49', NULL, 1, '2024-02-03 12:00:00', '2024-02-04 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(50, 0, 0, '1', NULL, 33, 7, '2024-02-07 16:10:03', NULL, 1, '2024-02-09 12:00:00', '2024-02-10 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(51, 0, 0, '1', NULL, 33, 7, '2024-02-07 16:10:05', NULL, 1, '2024-02-08 12:00:00', '2024-02-09 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(53, 20000, 10000, '1', 1, 34, 7, '2024-02-07 16:14:49', '-', 2, NULL, NULL, 1, 1, '1', '53', 20000, 0, 1, NULL),
(54, 0, 100, '1', 1, 34, 7, '2024-02-07 17:20:33', NULL, 1, '2024-02-09 12:00:00', '2024-02-18 12:00:00', 1, 2, '1', NULL, 0, 0, 1, NULL),
(55, 0, 10000, '1', 1, 34, 7, '2024-02-07 22:05:03', NULL, 1, '2024-02-18 12:00:00', '2024-02-19 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(57, 12900, 0, '0', 1, 34, 7, '2024-02-07 22:26:45', 'pago', 1, NULL, NULL, 1, 1, '1', '57', 12900, 0, 1, NULL),
(58, 20000, 10000, '1', 1, 35, 7, '2024-02-07 22:27:47', '-', 2, NULL, NULL, 1, 1, '1', '58', 20000, 0, 1, NULL),
(60, 700, 0, '0', 1, 35, 7, '2024-02-07 22:29:40', 'pago', 1, NULL, NULL, 1, 1, '1', '60', 700, 0, 1, NULL),
(61, 19800, 10000, '1', 1, 36, 7, '2024-02-08 23:17:32', '-', 2, NULL, NULL, 1, 1, '1', '61', 19800, 0, 1, NULL),
(62, 600, 0, '0', 1, 36, 7, '2024-02-08 23:20:17', 'pago', 1, NULL, NULL, 1, 1, '1', '62', 600, 0, 1, NULL),
(63, 200, 0, '0', 1, 36, 7, '2024-02-08 23:20:26', 'pago', 1, NULL, NULL, 1, 1, '1', '63', 200, 0, 1, NULL),
(64, 28000, 10000, '1', 1, 37, 7, '2024-02-08 23:21:56', '-', 3, NULL, NULL, 1, 1, '1', '64', 28000, 0, 1, NULL),
(65, 10854, 10000, '1', 1, 38, 7, '2024-02-12 13:26:17', '-', 1, NULL, NULL, 1, 1, '1', '65', 10854, 0, 1, NULL),
(66, 255.07, 0, '0', 1, 38, 7, '2024-02-12 13:27:06', 'pago', 1, NULL, NULL, 1, 1, '1', '66', 255.07, 0, 1, NULL),
(67, 9412.8, 10000, '1', 1, 39, 7, '2024-02-12 13:29:04', '-', 1, NULL, NULL, 1, 1, '1', '67', 9412.8, 0, 1, NULL),
(68, 10587.4, 10000, '1', 1, 40, 7, '2024-02-12 13:34:03', '-', 1, NULL, NULL, 1, 1, '1', '68', 10587.36, 0, 1, NULL),
(69, 514.74, 10000, '1', 1, 41, 7, '2024-02-12 13:42:25', '-', 1, NULL, NULL, 1, 1, '1', '69', 514.74, 0, 1, NULL),
(70, 1452.74, 10000, '1', 1, 42, 7, '2024-02-12 13:54:03', '-', 1, NULL, NULL, 1, 1, '1', '70', 1452.74, 0, 1, NULL),
(71, 1025.64, 10000, '1', 1, 43, 7, '2024-02-13 17:01:35', '-', 1, NULL, NULL, 1, 1, '1', '71', 1025.64, 0, 1, NULL),
(72, 5123.38, 10000, '1', 1, 44, 7, '2024-02-13 17:24:11', 'NINGUNA', 3, NULL, NULL, 1, 1, '1', '72', 5123.38, 0, 1, NULL),
(73, 0.02, 0, '0', 1, 44, 7, '2024-02-13 17:24:28', 'pago', 1, NULL, NULL, 1, 1, '1', '73', 0.02, 0, 1, NULL),
(74, 5210.37, 10000, '1', 1, 45, 7, '2024-02-13 17:26:22', '-', 3, NULL, NULL, 1, 1, '1', '74', 5210.37, 0, 1, NULL),
(75, 20000, 0, '0', 1, 43, 7, '2024-02-14 11:19:42', 'pago', 1, NULL, NULL, 1, 1, '1', '75', 20000, 0, 1, NULL),
(76, 30248.5, 0, '0', 1, 41, 7, '2024-02-20 18:03:15', 'pago', 1, NULL, NULL, 1, 1, '1', '76', 30248.54, 0, 1, NULL),
(77, 1, 0, '0', 1, 41, 7, '2024-02-20 18:03:30', 'pago', 1, NULL, NULL, 1, 1, '1', '77', 1, 0, 1, NULL),
(78, 0, 0, '1', 1, 33, 7, '2024-03-12 21:53:06', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(79, 0, 0, '1', 1, 34, 7, '2024-03-12 21:58:55', '-', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(80, 0, 0, '1', NULL, 34, 7, '2024-03-12 21:59:38', NULL, 3, '2024-03-16 21:58:00', '2024-03-19 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(81, 3000, 10000, '1', 1, 35, 7, '2024-03-12 22:03:01', 'prueba de dias', 3, NULL, NULL, 1, 1, '1', '81', 3000, 0, 1, NULL),
(82, 0, 0, '1', NULL, 34, 7, '2024-03-12 22:06:02', NULL, 1, '2024-03-17 21:58:00', '2024-03-18 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(83, 0, 0, '1', NULL, 34, 7, '2024-03-12 22:06:06', NULL, 1, '2024-03-16 21:58:00', '2024-03-17 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(84, 0, 0, '1', NULL, 34, 7, '2024-03-12 23:26:00', NULL, 1, '2024-03-17 21:58:00', '2024-03-18 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(85, 0, 0, '1', 1, 36, 7, '2024-03-12 23:26:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(86, 0, 0, '1', 1, 37, 7, '2024-03-12 23:26:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(87, 0, 0, '1', NULL, 37, 7, '2024-03-12 23:27:06', NULL, 2, '2024-03-19 12:00:00', '2024-03-21 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(88, 0, 0, '1', NULL, 37, 7, '2024-03-12 23:27:10', NULL, 3, '2024-03-18 12:00:00', '2024-03-21 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(89, 0, 0, '1', NULL, 37, 7, '2024-03-12 23:27:21', NULL, 1, '2024-03-21 12:00:00', '2024-03-22 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(90, 0, 0, '1', NULL, 37, 7, '2024-03-12 23:27:23', NULL, 1, '2024-03-21 12:00:00', '2024-03-22 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(91, 0, 0, '1', NULL, 34, 7, '2024-03-12 23:44:25', NULL, 1, '2024-03-22 21:58:00', '2024-03-23 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(92, 0, 0, '1', NULL, 34, 7, '2024-03-13 00:41:40', NULL, 1, '2024-03-20 21:58:00', '2024-03-21 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(93, 0, 0, '1', 1, 38, 7, '2024-03-13 21:40:14', 'YHGFD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(94, 0, 10000, '1', 1, 35, 7, '2024-03-13 21:40:31', NULL, 1, '2024-03-15 22:02:00', '2024-03-16 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(95, 0, 10000, '1', 1, 35, 7, '2024-03-13 21:41:36', NULL, 1, '2024-03-16 12:00:00', '2024-03-18 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(96, 0, 0, '1', NULL, 38, 7, '2024-03-13 21:57:43', NULL, 1, '2024-03-19 12:00:00', '2024-03-20 12:00:00', 0, 1, '1', NULL, 0, 0, 1, NULL),
(100, 2000, 2000, '1', 1, 40, 7, '2024-03-19 13:42:01', '-', 1, NULL, NULL, 1, 1, '1', '100', 2000, 0, 1, NULL),
(101, 0, 0, '1', 1, 41, 7, '2024-03-19 13:48:54', '-', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(114, 10000, 10000, '1', 1, 54, 7, '2024-03-19 13:52:11', '-', 1, NULL, NULL, 1, 1, '1', '114', 10000, 0, 1, NULL),
(115, 10000, 10000, '1', 1, 55, 7, '2024-03-19 13:52:24', '-', 1, NULL, NULL, 1, 1, '1', '115', 10000, 0, 1, NULL),
(116, 10000, 10000, '1', 1, 56, 7, '2024-03-19 13:52:35', '-', 1, NULL, NULL, 1, 1, '1', '116', 10000, 0, 1, NULL),
(117, 2000, 10000, '1', 1, 57, 7, '2024-03-19 13:52:59', '-', 1, NULL, NULL, 1, 1, '1', '117', 2000, 0, 1, NULL),
(118, 10000, 10000, '1', 1, 58, 7, '2024-03-19 13:53:35', '-', 1, NULL, NULL, 1, 1, '1', '118', 10000, 0, 1, NULL),
(119, 2000, 10000, '1', 1, 59, 7, '2024-03-19 13:53:47', '-', 1, NULL, NULL, 1, 1, '1', '119', 2000, 0, 1, NULL),
(120, 40000, 10000, '1', 1, 60, 7, '2024-03-19 13:54:10', '-', 4, NULL, NULL, 1, 1, '1', '120', 40000, 0, 1, NULL),
(121, 10000, 10000, '1', 1, 61, 7, '2024-03-19 13:54:30', '-', 5, NULL, NULL, 1, 1, '1', '121', 10000, 0, 1, NULL),
(122, 2000, 10000, '1', 1, 62, 7, '2024-03-19 13:54:52', '-', 2, NULL, NULL, 1, 1, '1', '122', 2000, 0, 1, NULL),
(123, 2000, 10000, '1', 1, 63, 7, '2024-03-19 13:55:12', '-', 4, NULL, NULL, 1, 1, '1', '123', 2000, 0, 1, NULL),
(124, 2000, 2000, '1', 1, 64, 7, '2024-03-19 13:55:22', '-', 1, NULL, NULL, 1, 1, '1', '124', 2000, 0, 1, NULL),
(125, 8000, 0, '0', 1, 59, 7, '2024-03-19 14:03:23', 'pago', 1, NULL, NULL, 1, 1, '1', '125', 8000, 0, 1, NULL),
(126, 8000, 0, '0', 1, 57, 7, '2024-03-19 14:03:38', 'pago', 1, NULL, NULL, 1, 1, '1', '126', 8000, 0, 1, NULL),
(127, 40000, 0, '0', 1, 61, 7, '2024-03-19 14:04:00', 'pago', 1, NULL, NULL, 1, 1, '1', '127', 40000, 0, 1, NULL),
(128, 18000, 0, '0', 1, 62, 7, '2024-03-19 14:04:18', 'pago', 1, NULL, NULL, 1, 1, '1', '128', 18000, 0, 1, NULL),
(129, 38000, 0, '0', 1, 63, 7, '2024-03-19 14:04:31', 'pago', 1, NULL, NULL, 1, 1, '1', '129', 38000, 0, 1, NULL),
(130, 56600, 0, '0', 1, 35, 7, '2024-03-19 14:04:58', 'pago', 1, NULL, NULL, 1, 1, '1', '130', 56600, 0, 1, NULL),
(131, 10000, 10000, '1', 1, 65, 7, '2024-03-19 14:06:09', '-', 1, NULL, NULL, 1, 1, '1', '131', 10000, 0, 1, NULL),
(133, 30000, 10000, '1', 1, 67, 7, '2024-03-19 14:08:38', '-', 3, NULL, NULL, 1, 1, '1', '133', 30000, 0, 1, NULL),
(135, 2000, 2000, '1', 1, 69, 7, '2024-03-19 14:09:56', '-', 1, NULL, NULL, 1, 1, '1', '135', 2000, 0, 1, NULL),
(136, 2000, 2000, '1', 1, 70, 7, '2024-03-19 14:10:10', '-', 1, NULL, NULL, 1, 1, '1', '136', 2000, 0, 1, NULL),
(137, 2000, 2000, '1', 1, 71, 7, '2024-03-19 14:10:19', '-', 1, NULL, NULL, 1, 1, '1', '137', 2000, 0, 1, NULL),
(142, 10000, 10000, '1', 1, 76, 7, '2024-03-19 14:11:24', '-', 1, NULL, NULL, 1, 1, '1', '142', 10000, 0, 1, NULL),
(143, 2000, 2000, '1', 1, 77, 7, '2024-03-19 14:11:35', '-', 1, NULL, NULL, 1, 1, '1', '143', 2000, 0, 1, NULL),
(144, 2000, 2000, '1', 1, 78, 7, '2024-03-19 14:11:45', '-', 1, NULL, NULL, 1, 1, '1', '144', 2000, 0, 1, NULL),
(145, 2000, 2000, '1', 1, 79, 7, '2024-03-19 14:12:26', '-', 1, NULL, NULL, 1, 1, '1', '145', 2000, 0, 1, NULL),
(152, 0, 0, '1', 1, 86, 7, '2024-03-19 14:15:19', 'YHGFD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(153, 0, 0, '1', 1, 87, 7, '2024-03-19 14:15:28', 'YHGFD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(154, 0, 0, '1', 1, 88, 7, '2024-03-19 14:15:36', 'GFD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(155, 0, 0, '1', 1, 89, 7, '2024-03-19 14:15:43', 'YHGFD', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(156, 2000, 2000, '1', 1, 90, 7, '2024-03-19 14:15:51', '-', 1, NULL, NULL, 1, 1, '1', '156', 2000, 0, 1, NULL),
(157, 10000, 10000, '1', 1, 91, 7, '2024-03-19 14:16:04', '-', 1, NULL, NULL, 1, 1, '1', '157', 10000, 0, 1, NULL),
(158, 10000, 10000, '1', 1, 92, 7, '2024-03-19 14:16:32', '-', 1, NULL, NULL, 1, 1, '1', '158', 10000, 0, 1, NULL),
(159, 10000, 10000, '1', 1, 93, 7, '2024-03-19 14:16:47', '-', 1, NULL, NULL, 1, 1, '1', '159', 10000, 0, 1, NULL),
(160, 10000, 10000, '1', 1, 94, 7, '2024-03-19 14:17:00', '-', 1, NULL, NULL, 1, 1, '1', '160', 10000, 0, 1, NULL),
(161, 10000, 10000, '1', 1, 95, 7, '2024-03-19 14:17:12', '-', 1, NULL, NULL, 1, 1, '1', '161', 10000, 0, 1, NULL),
(163, 8000, 2000, '1', 1, 97, 7, '2024-03-20 15:18:07', '-', 4, NULL, NULL, 1, 1, '1', '163', 8000, 0, 1, NULL),
(165, 30000, 10000, '1', 1, 99, 7, '2024-03-20 15:56:03', '-', 3, NULL, NULL, 1, 1, '1', '165', 30000, 0, 1, NULL),
(166, 0, 10000, '1', 1, 99, 7, '2024-03-20 15:56:40', NULL, 1, '2024-03-23 12:00:00', '2024-03-24 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(167, 0, 10000, '1', 1, 99, 7, '2024-03-20 15:57:24', NULL, 1, '2024-03-22 12:00:00', '2024-03-24 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(168, 0, 10000, '1', 1, 99, 7, '2024-03-20 15:57:34', NULL, 1, '2024-03-22 12:00:00', '2024-03-24 12:00:00', 1, 1, '1', NULL, 0, 0, 1, NULL),
(169, 50000, 0, '0', 1, 99, 7, '2024-03-20 15:57:58', 'pago', 1, NULL, NULL, 1, 1, '1', '169', 50000, 0, 1, NULL),
(170, 0, 0, '1', 1, 100, 7, '2024-03-20 15:58:57', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(172, 30000, 10000, '1', 1, 101, 7, '2024-03-20 15:59:21', '-', 3, NULL, NULL, 1, 1, '1', '172', 30000, 0, 1, NULL),
(173, 0, 0, '1', 1, 102, 7, '2024-03-21 00:08:29', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 1, NULL),
(174, 0, 0, '1', 1, 103, 8, '2024-03-21 14:17:40', 'cliente frecuente', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(175, 2800, 1500, '1', 2, 104, 10, '2024-03-21 15:09:28', '-', 2, NULL, NULL, 1, 1, '1', '175', 2800, 0, 6, NULL),
(176, 3900, 1300, '1', 2, 105, 10, '2024-03-21 15:32:14', '-', 3, NULL, NULL, 1, 1, '1', '176', 3900, 0, 6, NULL),
(177, 3000, 1500, '1', 2, 106, 10, '2024-03-21 15:47:35', '-', 2, NULL, NULL, 1, 1, '1', '177', 3000, 0, 6, NULL),
(178, 1500, 1500, '1', 2, 107, 10, '2024-03-21 16:02:48', '-', 1, NULL, NULL, 1, 1, '1', '178', 1500, 0, 6, NULL),
(179, 150, 1500, '1', 2, 108, 10, '2024-03-21 16:06:21', '-', 1, NULL, NULL, 1, 1, '1', '179', 150, 0, 6, NULL),
(180, 0, 1500, '1', 2, 109, 10, '2024-03-21 16:44:15', '-', 1, NULL, NULL, 1, 1, '1', '180', 0, 0, 6, NULL),
(181, 50, 0, '0', 1, 109, 10, '2024-03-21 16:44:59', 'pago', 1, NULL, NULL, 1, 1, '1', '181', 50, 0, 6, NULL),
(182, 1350, 0, '0', 1, 108, 10, '2024-03-21 16:52:17', 'pago', 1, NULL, NULL, 1, 1, '1', '182', 1350, 0, 6, NULL),
(183, 150, 0, '0', 1, 109, 10, '2024-03-21 16:52:50', 'pago', 1, NULL, NULL, 1, 1, '1', '183', 150, 0, 6, NULL),
(184, 200, 1000, '1', 2, 110, 14, '2024-03-21 18:13:39', '-', 3, NULL, NULL, 1, 1, '1', '184', 200, 0, 6, NULL),
(185, 2600, 0, '0', 1, 110, 14, '2024-03-21 18:16:08', 'pago', 1, NULL, NULL, 1, 1, '1', '185', 2600, 0, 6, NULL),
(186, 2500, 1000, '1', 2, 111, 14, '2024-03-21 18:26:17', '-', 3, NULL, NULL, 1, 1, '1', '186', 2500, 0, 6, NULL),
(187, 200, 0, '0', 1, 111, 14, '2024-03-21 18:27:57', 'pago', 1, NULL, NULL, 1, 1, '1', '187', 200, 0, 6, NULL),
(188, 1300, 1300, '1', 1, 112, 14, '2024-03-21 18:33:32', '-', 1, NULL, NULL, 1, 1, '1', '188', 1300, 0, 6, NULL),
(189, 3800, 1300, '1', 1, 113, 14, '2024-03-21 18:42:16', '-', 3, NULL, NULL, 1, 1, '1', '189', 3800, 0, 6, NULL),
(191, 0, 0, '1', 1, 115, 17, '2024-03-21 18:53:05', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(192, 6000, 1500, '1', 2, 116, 14, '2024-03-21 18:55:19', '-', 4, NULL, NULL, 1, 1, '1', '192', 6000, 0, 6, NULL),
(193, 500, 0, '0', 1, 116, 14, '2024-03-21 18:57:09', 'pago', 1, NULL, NULL, 1, 1, '1', '193', 500, 0, 6, NULL),
(194, 4500, 1500, '1', 1, 117, 15, '2024-03-21 19:41:51', '-', 3, NULL, NULL, 1, 1, '1', '194', 4500, 0, 6, NULL),
(196, 6500, 1000, '1', 2, 119, 17, '2024-03-21 20:03:57', '-', 7, NULL, NULL, 1, 1, '1', '196', 6500, 0, 6, NULL),
(197, 200, 0, '0', 1, 119, 17, '2024-03-21 20:05:32', 'pago', 1, NULL, NULL, 1, 1, '1', '197', 200, 0, 6, NULL),
(198, 1300, 1300.01, '1', 1, 120, 17, '2024-03-22 11:34:50', '-', 1, NULL, NULL, 1, 1, '1', '198', 1300, 0, 6, NULL),
(199, 100.99, 0, '0', 1, 120, 17, '2024-03-22 11:43:37', 'pago', 1, NULL, NULL, 1, 1, '1', '199', 100.99, 0, 6, NULL),
(200, 1500, 1500, '1', 2, 121, 17, '2024-03-22 12:43:47', '-', 1, NULL, NULL, 1, 1, '1', '200', 1500, 0, 6, NULL),
(201, 1300, 1300, '1', 2, 122, 17, '2024-03-22 12:46:07', '-', 1, NULL, NULL, 1, 1, '1', '201', 1300, 0, 6, NULL),
(202, 3000, 1500, '1', 1, 123, 17, '2024-03-22 22:48:35', '-', 2, NULL, NULL, 1, 1, '1', '202', 3000, 0, 6, NULL),
(204, 1500, 1500, '1', 1, 125, 17, '2024-03-22 23:16:33', '-', 1, NULL, NULL, 1, 1, '1', '204', 1500, 0, 6, NULL),
(205, 0, 1500, '1', 1, 126, 17, '2024-04-04 16:22:30', '-', 1, NULL, NULL, 1, 1, '1', '205', 0, 0, 6, NULL),
(206, 0, 1300, '1', 1, 127, 17, '2024-04-04 16:22:41', '-', 1, NULL, NULL, 1, 1, '1', '206', 0, 0, 6, NULL),
(207, 654, 2500, '1', 1, 128, 17, '2024-04-04 16:22:54', '-', 1, NULL, NULL, 1, 1, '1', '207', 654, 0, 6, NULL),
(208, 0, 2200, '1', 1, 129, 17, '2024-04-04 16:23:03', '-', 1, NULL, NULL, 1, 1, '1', '208', 0, 0, 6, NULL),
(209, 654, 2000, '1', 1, 130, 17, '2024-04-04 16:23:14', '-', 1, NULL, NULL, 1, 1, '1', '209', 654, 0, 6, NULL),
(210, 0, 1300, '1', 1, 131, 17, '2024-04-04 16:23:28', '-', 1, NULL, NULL, 1, 1, '1', '210', 0, 0, 6, NULL),
(211, 654, 1500, '1', 1, 132, 17, '2024-04-04 16:23:45', '-', 1, NULL, NULL, 1, 1, '1', '211', 654, 0, 6, NULL),
(212, 0, 1750, '1', 1, 133, 17, '2024-04-04 16:23:57', '-', 1, NULL, NULL, 1, 1, '1', '212', 0, 0, 6, NULL),
(213, 5, 2500, '1', 1, 134, 17, '2024-04-04 16:24:05', '-', 1, NULL, NULL, 1, 1, '1', '213', 5, 0, 6, NULL),
(214, 3, 2200, '1', 1, 135, 17, '2024-04-04 16:24:14', '-', 1, NULL, NULL, 1, 1, '1', '214', 3, 0, 6, NULL),
(215, 4, 1500, '1', 1, 136, 17, '2024-04-04 16:24:23', '-', 1, NULL, NULL, 1, 1, '1', '215', 4, 0, 6, NULL),
(216, 32, 1300, '1', 1, 137, 17, '2024-04-04 16:24:40', '-', 1, NULL, NULL, 1, 1, '1', '216', 32, 0, 6, NULL),
(217, 3, 1500, '1', 1, 138, 17, '2024-04-04 16:25:03', '-', 1, NULL, NULL, 1, 1, '1', '217', 3, 0, 6, NULL),
(218, 3, 1500, '1', 1, 139, 17, '2024-04-04 16:25:09', '-', 1, NULL, NULL, 1, 1, '1', '218', 3, 0, 6, NULL),
(219, 0.01, 0, '0', 1, 120, 17, '2024-04-04 16:38:19', 'PAGO', 1, NULL, NULL, 1, 1, '1', '219', 0.01, 0, 6, NULL),
(220, 1497, 0, '0', 1, 138, 17, '2024-04-04 16:38:32', 'PAGO', 1, NULL, NULL, 1, 1, '1', '220', 1497, 0, 6, NULL),
(221, 100, 0, '0', 1, 113, 17, '2024-04-04 16:38:52', 'PAGO', 1, NULL, NULL, 1, 1, '1', '221', 100, 0, 6, NULL),
(222, 1497, 0, '0', 1, 139, 17, '2024-04-04 16:39:05', 'PAGO', 1, NULL, NULL, 1, 1, '1', '222', 1497, 0, 6, NULL),
(223, 1346, 0, '0', 1, 130, 17, '2024-04-04 16:39:39', 'PAGO', 1, NULL, NULL, 1, 1, '1', '223', 1346, 0, 6, NULL),
(224, 846, 0, '0', 1, 132, 17, '2024-04-04 16:39:51', 'PAGO', 1, NULL, NULL, 1, 1, '1', '224', 846, 0, 6, NULL),
(225, 1300, 0, '0', 1, 131, 17, '2024-04-04 16:40:04', 'PAGO', 1, NULL, NULL, 1, 1, '1', '225', 1300, 0, 6, NULL),
(226, 1750, 0, '0', 1, 133, 17, '2024-04-04 16:40:22', 'PAGO', 1, NULL, NULL, 1, 1, '1', '226', 1750, 0, 6, NULL),
(227, 1500, 0, '0', 1, 126, 17, '2024-04-04 16:40:35', 'PAGO', 1, NULL, NULL, 1, 1, '1', '227', 1500, 0, 6, NULL),
(228, 1300, 0, '0', 1, 127, 17, '2024-04-04 16:40:48', 'PAGO', 1, NULL, NULL, 1, 1, '1', '228', 1300, 0, 6, NULL),
(229, 1846, 0, '0', 1, 128, 17, '2024-04-04 16:41:03', 'PAGO', 1, NULL, NULL, 1, 1, '1', '229', 1846, 0, 6, NULL),
(230, 1268, 0, '0', 1, 137, 17, '2024-04-04 16:41:16', 'PAGO', 1, NULL, NULL, 1, 1, '1', '230', 1268, 0, 6, NULL),
(231, 1496, 0, '0', 1, 136, 17, '2024-04-04 16:41:30', 'PAGO', 1, NULL, NULL, 1, 1, '1', '231', 1496, 0, 6, NULL),
(232, 2197, 0, '0', 1, 135, 17, '2024-04-04 16:41:46', 'PAGO', 1, NULL, NULL, 1, 1, '1', '232', 2197, 0, 6, NULL),
(233, 2495, 0, '0', 1, 134, 17, '2024-04-04 16:41:59', 'PAGO', 1, NULL, NULL, 1, 1, '1', '233', 2495, 0, 6, NULL),
(234, 2200, 2200, '1', 1, 140, 17, '2024-04-04 16:42:59', '-', 1, NULL, NULL, 1, 1, '1', '234', 2200, 0, 6, NULL),
(235, 1000, 1000, '1', 1, 141, 17, '2024-04-04 17:08:13', '-', 1, NULL, NULL, 1, 1, '1', '235', 1000, 0, 6, NULL),
(236, 1500, 1500, '1', 1, 142, 17, '2024-04-04 17:08:22', '-', 1, NULL, NULL, 1, 1, '1', '236', 1500, 0, 6, NULL),
(237, 2000, 2000, '1', 1, 143, 17, '2024-04-04 17:08:33', '-', 1, NULL, NULL, 1, 1, '1', '237', 2000, 0, 6, NULL),
(238, 1500, 1500, '1', 1, 144, 17, '2024-04-04 17:08:40', '-', 1, NULL, NULL, 1, 1, '1', '238', 1500, 0, 6, NULL),
(239, 1750, 1750, '1', 1, 145, 17, '2024-04-04 17:08:49', '-', 1, NULL, NULL, 1, 1, '1', '239', 1750, 0, 6, NULL),
(240, 2000, 2000, '1', 1, 146, 17, '2024-04-04 17:09:00', '-', 1, NULL, NULL, 1, 1, '1', '240', 2000, 0, 6, NULL),
(241, 2000, 2000, '1', 1, 147, 17, '2024-04-04 17:09:10', '-', 1, NULL, NULL, 1, 1, '1', '241', 2000, 0, 6, NULL),
(242, 2000, 2000, '1', 1, 148, 17, '2024-04-04 17:09:20', '-', 1, NULL, NULL, 1, 1, '1', '242', 2000, 0, 6, NULL),
(243, 2800, 2800, '1', 1, 149, 17, '2024-04-04 17:09:29', '-', 1, NULL, NULL, 1, 1, '1', '243', 2800, 0, 6, NULL),
(244, 1500, 1500, '1', 1, 150, 17, '2024-04-04 17:09:38', '-', 1, NULL, NULL, 1, 1, '1', '244', 1500, 0, 6, NULL),
(245, 1500, 1500, '1', 1, 151, 17, '2024-04-04 17:09:46', '-', 1, NULL, NULL, 1, 1, '1', '245', 1500, 0, 6, NULL),
(246, 1500, 1500, '1', 1, 152, 17, '2024-04-04 17:15:44', '-', 1, NULL, NULL, 1, 1, '1', '246', 1500, 0, 6, NULL),
(247, 1500, 1500, '1', 1, 153, 17, '2024-04-04 17:15:59', '-', 1, NULL, NULL, 1, 1, '1', '247', 1500, 0, 6, NULL),
(248, 1500, 1500, '1', 1, 154, 17, '2024-04-04 17:16:26', '-', 1, NULL, NULL, 1, 1, '1', '248', 1500, 0, 6, NULL),
(249, 2000, 2000, '1', 1, 155, 17, '2024-04-04 17:16:40', '-', 1, NULL, NULL, 1, 1, '1', '249', 2000, 0, 6, NULL),
(250, 2000, 2000, '1', 1, 156, 17, '2024-04-04 17:16:53', '-', 1, NULL, NULL, 1, 1, '1', '250', 2000, 0, 6, NULL),
(251, 1500, 1500, '1', 1, 157, 17, '2024-04-04 17:17:02', '-', 1, NULL, NULL, 1, 1, '1', '251', 1500, 0, 6, NULL),
(252, 1500, 1500, '1', 1, 158, 17, '2024-04-04 17:17:15', '-', 1, NULL, NULL, 1, 1, '1', '252', 1500, 0, 6, NULL),
(253, 1750, 1750, '1', 1, 159, 17, '2024-04-04 17:17:26', '-', 1, NULL, NULL, 1, 1, '1', '253', 1750, 0, 6, NULL),
(254, 1500, 1500, '1', 1, 160, 17, '2024-04-04 17:17:34', '-', 1, NULL, NULL, 1, 1, '1', '254', 1500, 0, 6, NULL),
(255, 82, 1300, '1', 6, 161, 17, '2024-04-04 19:24:46', '-', 1, NULL, NULL, 1, 1, '1', '255', 82, 0, 6, NULL),
(256, 77, 1300, '1', 6, 162, 18, '2024-04-04 20:26:08', '-', 1, NULL, NULL, 1, 1, '1', '256', 77, 0, 6, NULL),
(257, 50, 0, '0', 1, 162, 20, '2024-04-04 20:53:35', 'PAGO', 1, NULL, NULL, 1, 1, '1', '257', 50, 0, 6, NULL),
(258, 3, 0, '0', 6, 162, 20, '2024-04-04 20:56:20', 'PAGO', 1, NULL, NULL, 1, 1, '1', '258', 3, 0, 6, NULL),
(259, 1500, 1500, '1', 1, 163, 21, '2024-04-04 22:21:27', '-', 1, NULL, NULL, 1, 1, '1', '259', 1500, 0, 6, NULL),
(260, 500, 0, '0', 1, 163, 21, '2024-04-04 22:21:43', 'PAGO', 1, NULL, NULL, 1, 1, '1', '260', 500, 0, 6, NULL),
(261, 100, 0, '0', 1, 162, 21, '2024-04-04 23:03:37', 'PAGO', 1, NULL, NULL, 1, 1, '1', '261', 100, 0, 6, NULL),
(262, 1300, 1300, '1', 7, 164, 21, '2024-04-09 15:46:45', '-', 1, NULL, NULL, 1, 1, '1', '262', 1300, 0, 6, NULL),
(263, 1300, 1300, '1', 2, 165, 21, '2024-04-09 15:47:50', '-', 1, NULL, NULL, 1, 1, '1', '263', 1300, 0, 6, NULL),
(264, 500, 0, '0', 3, 164, 21, '2024-04-09 16:00:46', 'PAGO', 1, NULL, NULL, 1, 1, 'NULL', '264', 500, 0, 6, NULL),
(265, 2600, 1300, '1', 1, 166, 22, '2024-04-09 16:01:42', '-', 2, NULL, NULL, 1, 1, '1', '265', 2600, 0, 6, NULL),
(266, 3000, 1500, '1', 2, 167, 22, '2024-04-09 16:02:07', '-', 2, NULL, NULL, 1, 1, '1', '266', 3000, 0, 6, NULL),
(267, 5250, 1750, '1', 2, 168, 22, '2024-04-09 16:02:42', '-', 3, NULL, NULL, 1, 1, '1', '267', 5250, 0, 6, NULL),
(268, 4500, 1500, '1', 3, 169, 22, '2024-04-09 16:03:17', '-', 3, NULL, NULL, 1, 1, '1', '268', 4500, 0, 6, NULL),
(269, 1500, 1500, '1', 7, 170, 22, '2024-04-09 16:04:06', '-', 1, NULL, NULL, 1, 1, '1', '269', 1500, 0, 6, NULL),
(270, 265, 1500, '1', 6, 171, 22, '2024-04-09 16:04:56', '-', 3, NULL, NULL, 1, 1, '1', '270', 265, 0, 6, NULL),
(271, 20000, 1500, '1', 7, 172, 22, '2024-04-09 16:22:09', '-', 4, NULL, NULL, 1, 1, '1', '271', 20000, 0, 6, NULL),
(272, 10879.5, 0, '0', 1, 172, 22, '2024-04-09 16:23:07', 'PAGO', 1, NULL, NULL, 1, 1, '1', '272', 10879.54, 0, 6, NULL),
(273, 3000, 1500, '1', 1, 173, 23, '2024-04-09 16:45:52', '-', 2, NULL, NULL, 1, 1, '1', '273', 3000, 0, 6, NULL),
(274, 1750, 1750, '1', 2, 174, 23, '2024-04-09 16:46:14', '-', 1, NULL, NULL, 1, 1, '1', '274', 1750, 0, 6, NULL),
(275, 900, 900, '1', 2, 175, 23, '2024-04-09 16:47:03', '-', 1, NULL, NULL, 1, 1, '1', '275', 900, 0, 6, NULL),
(276, 5200, 1300, '1', 3, 176, 23, '2024-04-09 16:48:32', '-', 4, NULL, NULL, 1, 1, '1', '276', 5200, 0, 6, NULL),
(277, 94, 1500, '1', 6, 177, 23, '2024-04-09 16:49:21', '-', 1, NULL, NULL, 1, 1, '1', '277', 94, 0, 6, NULL),
(278, 1413, 1500, '1', 7, 178, 23, '2024-04-09 16:51:45', '-', 1, NULL, NULL, 1, 1, '1', '278', 1413, 0, 6, NULL),
(279, 0, 0, '1', 1, 179, 24, '2024-04-09 21:10:01', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(280, 0, 0, '1', 1, 180, 24, '2024-04-09 21:13:30', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(281, 0, 0, '1', 1, 181, 24, '2024-04-09 21:17:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(282, 0, 0, '1', 1, 182, 24, '2024-04-09 21:17:53', 'ADMIN', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(283, 0, 0, '1', 1, 183, 24, '2024-04-09 21:24:30', 'ADMIN2', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(284, 0, 0, '1', 1, 184, 24, '2024-04-09 21:30:24', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(285, 0, 0, '1', 1, 185, 24, '2024-04-09 21:30:25', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(286, 0, 0, '1', 1, 186, 24, '2024-04-09 21:30:26', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(287, 0, 0, '1', 1, 187, 24, '2024-04-09 21:30:26', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(288, 0, 0, '1', 1, 188, 24, '2024-04-09 21:30:26', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(289, 0, 0, '1', 1, 189, 24, '2024-04-09 21:30:26', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(290, 0, 0, '1', 1, 190, 24, '2024-04-09 21:30:28', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(291, 0, 0, '1', 1, 191, 24, '2024-04-09 21:30:28', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(292, 0, 0, '1', 1, 192, 24, '2024-04-09 21:30:28', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(293, 0, 0, '1', 1, 193, 24, '2024-04-09 21:30:29', 'GRUP', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(294, 0, 0, '1', 1, 194, 24, '2024-04-09 21:41:58', ';dhfg', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(295, 0, 0, '1', 1, 195, 24, '2024-04-09 21:42:29', 'iuf', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(296, 0, 0, '1', 1, 196, 24, '2024-04-09 21:42:52', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(297, 3, 3, '1', 1, 197, 24, '2024-04-09 21:44:55', 'AAAAAAA', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(298, 3, 3, '1', 1, 198, 24, '2024-04-09 21:44:55', 'AAAAAAA', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(299, 3, 3, '1', 1, 199, 24, '2024-04-09 21:44:55', 'AAAAAAA', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(300, 0, 0, '1', 1, 200, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(301, 0, 0, '1', 1, 201, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(302, 0, 0, '1', 1, 202, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(303, 0, 0, '1', 1, 203, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(304, 0, 0, '1', 1, 204, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(305, 0, 0, '1', 1, 205, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(306, 0, 0, '1', 1, 206, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(307, 0, 0, '1', 1, 207, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(308, 0, 0, '1', 1, 208, 24, '2024-04-09 21:45:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(309, 0, 0, '1', 1, 209, 24, '2024-04-09 21:46:33', '2', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(310, 0, 0, '1', 1, 210, 24, '2024-04-09 21:46:33', '2', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(311, 0, 0, '1', 1, 211, 24, '2024-04-09 21:46:33', '2', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(312, 0, 0, '1', 1, 212, 24, '2024-04-09 21:46:33', '2', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(314, 1500, 1300, '1', 1, 214, 24, '2024-04-09 21:49:37', '-', 9, NULL, NULL, 1, 1, '1', '314', 1500, 0, 6, NULL),
(315, 0, 0, '1', 1, 215, 24, '2024-04-09 22:17:55', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(316, 0, 0, '1', 1, 216, 24, '2024-04-09 22:17:55', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(317, 0, 0, '1', 1, 217, 24, '2024-04-09 22:17:55', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(318, 0, 0, '1', 1, 218, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(319, 0, 0, '1', 1, 219, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(320, 0, 0, '1', 1, 220, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(321, 0, 0, '1', 1, 221, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(322, 0, 0, '1', 1, 222, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(323, 0, 0, '1', 1, 223, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(324, 0, 0, '1', 1, 224, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(325, 0, 0, '1', 1, 225, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(326, 0, 0, '1', 1, 226, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(327, 0, 0, '1', 1, 227, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(328, 0, 0, '1', 1, 228, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(329, 0, 0, '1', 1, 229, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(330, 0, 0, '1', 1, 230, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(331, 0, 0, '1', 1, 231, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(332, 0, 0, '1', 1, 232, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(333, 0, 0, '1', 1, 233, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(334, 0, 0, '1', 1, 234, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(335, 0, 0, '1', 1, 235, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(336, 0, 0, '1', 1, 236, 24, '2024-04-09 22:18:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(337, 0, 0, '1', 1, 237, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(338, 0, 0, '1', 1, 238, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(339, 0, 0, '1', 1, 239, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(340, 0, 0, '1', 1, 240, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(341, 0, 0, '1', 1, 241, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(342, 0, 0, '1', 1, 242, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(343, 0, 0, '1', 1, 243, 24, '2024-04-09 22:57:32', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(344, 0, 0, '1', 1, 244, 0, '2024-04-10 01:00:37', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(345, 0, 0, '1', 1, 245, 0, '2024-04-10 01:00:37', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(346, 0, 0, '1', 1, 246, 0, '2024-04-10 01:00:37', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(347, 0, 0, '1', 1, 247, 0, '2024-04-10 01:00:38', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(348, 0, 0, '1', 1, 248, 0, '2024-04-10 01:00:38', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(349, 0, 0, '1', 1, 249, 0, '2024-04-10 01:00:38', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(350, 0, 0, '1', 1, 250, 0, '2024-04-10 01:00:38', 'tttttttttttttttttttttttt', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(351, 0, 0, '1', 1, 251, 0, '2024-04-10 13:01:07', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(352, 0, 0, '1', 1, 252, 0, '2024-04-10 13:01:07', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(353, 0, 0, '1', 1, 253, 0, '2024-04-10 13:01:07', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(354, 0, 0, '1', 1, 254, 0, '2024-04-10 13:01:07', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(355, 0, 0, '1', 1, 255, 0, '2024-04-10 13:02:57', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(356, 0, 0, '1', 1, 256, 0, '2024-04-10 13:02:57', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(357, 0, 0, '1', 1, 257, 0, '2024-04-10 13:02:57', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(358, 0, 0, '1', 1, 258, 0, '2024-04-10 13:04:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(359, 0, 0, '1', 1, 259, 0, '2024-04-10 13:04:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(360, 0, 0, '1', 1, 260, 0, '2024-04-10 13:04:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(361, 0, 0, '1', 1, 261, 0, '2024-04-10 13:04:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(362, 0, 0, '1', 1, 262, 0, '2024-04-10 13:04:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(363, 10200, 0, '0', 1, 214, 25, '2024-04-16 10:44:22', 'PAGO', 1, NULL, NULL, 1, 1, '1', '363', 10200, 0, 6, NULL),
(365, 3900, 1300, '1', 1, 264, 25, '2024-04-16 11:50:46', '-', 3, NULL, NULL, 1, 1, '1', '365', 3900, 0, 6, NULL),
(366, 0, 0, '1', 1, 265, 25, '2024-04-16 11:51:44', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(367, 0, 0, '1', 1, 266, 25, '2024-04-16 12:17:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(368, 0, 0, '1', 1, 267, 25, '2024-04-16 12:38:31', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(369, 0, 0, '1', 1, 268, 25, '2024-04-16 13:30:00', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(370, 0, 0, '1', 1, 269, 25, '2024-04-16 13:30:00', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(371, 0, 0, '1', 1, 270, 25, '2024-04-16 13:30:00', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(372, 0, 0, '1', 1, 271, 25, '2024-04-16 13:30:00', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(373, 0, 0, '1', 1, 272, 25, '2024-04-16 13:30:00', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(374, 0, 0, '1', 1, 273, 25, '2024-04-16 13:30:46', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(375, 0, 0, '1', 1, 274, 25, '2024-04-16 14:05:01', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(376, 0, 0, '1', 1, 275, 25, '2024-04-16 14:05:01', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(377, 0, 0, '1', 1, 276, 25, '2024-04-16 14:05:01', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(378, 0, 0, '1', 1, 277, 25, '2024-04-16 14:05:01', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(379, 0, 0, '1', 1, 278, 25, '2024-04-16 14:23:44', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(380, 0, 0, '1', 1, 279, 25, '2024-04-16 14:24:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(381, 0, 0, '1', 1, 280, 25, '2024-04-16 14:25:10', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(382, 0, 0, '1', 1, 281, 25, '2024-04-16 14:26:23', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(383, 0, 0, '1', 1, 282, 25, '2024-04-16 14:26:23', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(384, 0, 0, '1', 1, 283, 25, '2024-04-16 14:37:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(385, 0, 0, '1', 1, 284, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(386, 0, 0, '1', 1, 285, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(387, 0, 0, '1', 1, 286, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(388, 0, 0, '1', 1, 287, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(389, 0, 0, '1', 1, 288, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(390, 0, 0, '1', 1, 289, 25, '2024-04-16 15:12:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(391, 0, 0, '1', 1, 290, 25, '2024-04-16 15:13:55', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(392, 0, 0, '1', 1, 291, 25, '2024-04-16 15:14:50', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(393, 0, 0, '1', 1, 292, 25, '2024-04-16 15:48:02', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(394, 0, 0, '1', 1, 293, 25, '2024-04-16 15:48:39', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(395, 0, 0, '1', 1, 294, 25, '2024-04-16 15:49:20', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(396, 0, 0, '1', 1, 295, 25, '2024-04-16 16:03:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(397, 0, 0, '1', 1, 296, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(398, 0, 0, '1', 1, 297, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(399, 0, 0, '1', 1, 298, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(400, 0, 0, '1', 1, 299, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(401, 0, 0, '1', 1, 300, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(402, 0, 0, '1', 1, 301, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(403, 0, 0, '1', 1, 302, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(404, 0, 0, '1', 1, 303, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(405, 0, 0, '1', 1, 304, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(406, 0, 0, '1', 1, 305, 25, '2024-04-16 17:35:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(407, 0, 0, '1', 1, 306, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(408, 0, 0, '1', 1, 307, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(409, 0, 0, '1', 1, 308, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(410, 0, 0, '1', 1, 309, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(411, 0, 0, '1', 1, 310, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(412, 0, 0, '1', 1, 311, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(413, 0, 0, '1', 1, 312, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(414, 0, 0, '1', 1, 313, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(415, 0, 0, '1', 1, 314, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(416, 0, 0, '1', 1, 315, 25, '2024-04-16 17:35:36', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(417, 0, 0, '1', 1, 316, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(418, 0, 0, '1', 1, 317, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(419, 0, 0, '1', 1, 318, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(420, 0, 0, '1', 1, 319, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(421, 0, 0, '1', 1, 320, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(422, 0, 0, '1', 1, 321, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(423, 0, 0, '1', 1, 322, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(424, 0, 0, '1', 1, 323, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(425, 0, 0, '1', 1, 324, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(426, 0, 0, '1', 1, 325, 25, '2024-04-16 17:35:37', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(427, 0, 0, '1', 1, 326, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(428, 0, 0, '1', 1, 327, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(429, 0, 0, '1', 1, 328, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(430, 0, 0, '1', 1, 329, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(431, 0, 0, '1', 1, 330, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(432, 0, 0, '1', 1, 331, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(433, 0, 0, '1', 1, 332, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(434, 0, 0, '1', 1, 333, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(435, 0, 0, '1', 1, 334, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(436, 0, 0, '1', 1, 335, 25, '2024-04-16 17:36:13', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(437, 0, 0, '1', 1, 336, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(438, 0, 0, '1', 1, 337, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(439, 0, 0, '1', 1, 338, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(440, 0, 0, '1', 1, 339, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(441, 0, 0, '1', 1, 340, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(442, 0, 0, '1', 1, 341, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(443, 0, 0, '1', 1, 342, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(444, 0, 0, '1', 1, 343, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(445, 0, 0, '1', 1, 344, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(446, 0, 0, '1', 1, 345, 25, '2024-04-16 17:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(447, 0, 0, '1', 1, 346, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(448, 0, 0, '1', 1, 347, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(449, 0, 0, '1', 1, 348, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(450, 0, 0, '1', 1, 349, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(451, 0, 0, '1', 1, 350, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(452, 0, 0, '1', 1, 351, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(453, 0, 0, '1', 1, 352, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(454, 0, 0, '1', 1, 353, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(455, 0, 0, '1', 1, 354, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(456, 0, 0, '1', 1, 355, 25, '2024-04-16 17:38:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(457, 0, 0, '1', 1, 356, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(458, 0, 0, '1', 1, 357, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(459, 0, 0, '1', 1, 358, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(460, 0, 0, '1', 1, 359, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(461, 0, 0, '1', 1, 360, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(462, 0, 0, '1', 1, 361, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(463, 0, 0, '1', 1, 362, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(464, 0, 0, '1', 1, 363, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(465, 0, 0, '1', 1, 364, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(466, 0, 0, '1', 1, 365, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(467, 0, 0, '1', 1, 366, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(468, 0, 0, '1', 1, 367, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(469, 0, 0, '1', 1, 368, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(470, 0, 0, '1', 1, 369, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(471, 0, 0, '1', 1, 370, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(472, 0, 0, '1', 1, 371, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(473, 0, 0, '1', 1, 372, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(474, 0, 0, '1', 1, 373, 25, '2024-04-16 17:42:42', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(475, 0, 0, '1', 1, 374, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(476, 0, 0, '1', 1, 375, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(477, 0, 0, '1', 1, 376, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(478, 0, 0, '1', 1, 377, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(479, 0, 0, '1', 1, 378, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(480, 0, 0, '1', 1, 379, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(481, 0, 0, '1', 1, 380, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(482, 0, 0, '1', 1, 381, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(483, 0, 0, '1', 1, 382, 25, '2024-04-16 17:43:38', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(484, 0, 0, '1', 1, 383, 25, '2024-04-16 20:40:55', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(485, 0, 0, '1', 1, 384, 25, '2024-04-16 21:06:23', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(486, 0, 0, '1', 1, 385, 25, '2024-04-16 21:07:06', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(487, 0, 0, '1', 1, 386, 25, '2024-04-16 21:32:17', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(488, 0, 0, '1', 1, 387, 25, '2024-04-16 21:32:26', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(489, 0, 0, '1', 1, 388, 25, '2024-04-16 21:32:51', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(490, 0, 0, '1', NULL, 270, 25, '2024-04-16 21:39:52', NULL, 2, '2024-04-20 13:11:00', '2024-04-22 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(491, 0, 0, '1', NULL, 356, 25, '2024-04-16 23:29:38', NULL, 6, '2024-04-23 17:40:00', '2024-04-29 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(492, 0, 0, '1', NULL, 304, 25, '2024-04-17 01:29:47', NULL, 2, '2024-04-23 17:34:00', '2024-04-25 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(493, 0, 0, '1', NULL, 304, 25, '2024-04-17 01:29:58', NULL, 1, '2024-04-23 17:34:00', '2024-04-24 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(494, 0, 0, '1', 1, 389, 25, '2024-04-17 01:37:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(495, 0, 0, '1', 1, 390, 25, '2024-04-17 01:37:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(496, 0, 0, '1', 1, 391, 25, '2024-04-17 01:37:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(497, 0, 0, '1', 1, 392, 25, '2024-04-17 01:37:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(498, 0, 0, '1', 1, 393, 25, '2024-04-17 01:37:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(499, 0, 0, '1', 1, 394, 25, '2024-04-17 01:37:49', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(500, 0, 0, '1', NULL, 304, 25, '2024-04-17 01:38:18', NULL, 1, '2024-04-22 17:34:00', '2024-04-23 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(501, 0, 0, '1', 1, 395, 25, '2024-04-17 01:50:31', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(502, 0, 0, '1', 1, 396, 25, '2024-04-17 01:57:56', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(503, 0, 1300, '1', 1, 264, 25, '2024-04-17 03:34:54', NULL, 1, '2024-04-19 11:12:00', '2024-04-21 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(504, 0, 0, '1', 1, 397, 25, '2024-04-17 03:59:08', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(505, 0, 0, '1', 1, 398, 25, '2024-04-17 03:59:26', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(506, 0, 0, '1', 1, 399, 25, '2024-04-17 03:59:44', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(507, 0, 0, '1', 1, 399, 25, '2024-04-17 12:18:25', 'TGDFSX', 5, '2024-04-25 03:59:00', '2024-04-30 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(508, 0, 1300, '1', 1, 264, 25, '2024-04-17 12:24:12', NULL, 1, '2024-04-21 12:00:00', '2024-04-23 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(509, 0, 1300, '1', 1, 264, 25, '2024-04-17 13:39:06', NULL, 1, '2024-04-23 12:00:00', '2024-04-25 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(510, 0, 1300, '1', 1, 264, 25, '2024-04-17 13:39:17', NULL, 1, '2024-04-25 12:00:00', '2024-04-27 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(511, 0, 1300, '1', 1, 264, 25, '2024-04-17 13:42:20', NULL, 1, '2024-04-27 12:00:00', '2024-04-29 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(512, 0, 1300, '1', 1, 264, 25, '2024-04-17 13:48:10', NULL, 1, '2024-04-29 12:00:00', '2024-04-30 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(513, 0, 1300, '1', 1, 264, 25, '2024-04-17 13:48:41', NULL, 1, '2024-04-30 12:00:00', '2024-05-01 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(515, 1500, 1500, '1', 1, 401, 25, '2024-04-17 13:50:47', '-', 1, NULL, NULL, 1, 1, '1', '515', 1500, 0, 6, NULL),
(516, 0, 1500, '1', 1, 401, 25, '2024-04-17 13:52:13', NULL, 1, '2024-04-18 13:50:00', '2024-04-19 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL);
INSERT INTO `proceso_pago` (`id`, `monto`, `total`, `nro_operacion`, `id_tipopago`, `id_proceso`, `id_caja`, `fecha_creada`, `aval`, `cantidad`, `fecha_entrada`, `fecha_salida`, `pagado`, `noche`, `banco`, `operacion`, `mbanco`, `malimentacion`, `id_user`, `terminacion`) VALUES
(517, 500, 0, '0', 1, 140, 25, '2024-04-17 13:56:18', 'PAGO', 1, NULL, NULL, 1, 1, '1', '517', 500, 0, 6, NULL),
(518, 0, 1300, '1', 1, 264, 25, '2024-04-17 14:20:28', NULL, 1, '2024-05-01 12:00:00', '2024-05-02 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(519, 0, 1300, '1', 1, 264, 25, '2024-04-17 14:22:59', NULL, 1, '2024-05-02 12:00:00', '2024-05-03 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(520, 0, 1300, '1', 1, 264, 25, '2024-04-17 14:23:22', NULL, 1, '2024-05-03 12:00:00', '2024-05-04 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(521, 0, 0, '1', 1, 402, 25, '2024-04-17 14:33:44', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(522, 0, 1300, '1', 1, 264, 25, '2024-04-17 15:04:11', NULL, 1, '2024-05-04 12:00:00', '2024-05-05 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(523, 20800, 0, '0', 1, 264, 25, '2024-04-17 15:59:13', 'PAGO', 1, NULL, NULL, 1, 1, '1', '523', 20800, 0, 6, NULL),
(524, 1500, 0, '0', 1, 401, 25, '2024-04-17 15:59:33', 'PAGO', 1, NULL, NULL, 1, 1, '1', '524', 1500, 0, 6, NULL),
(527, 6000, 1500, '1', 1, 405, 25, '2024-04-17 16:34:55', '-', 4, NULL, NULL, 1, 1, '1', '527', 6000, 0, 6, NULL),
(529, 0, 0, '1', 1, 406, 25, '2024-04-17 16:53:03', 'TGDFSX', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(530, 0, 0, '1', 1, 407, 25, '2024-04-17 16:53:48', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(549, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:24:56', NULL, 1, '2024-04-28 12:00:00', '2024-04-29 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(550, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:25:59', NULL, 1, '2024-04-29 12:00:00', '2024-04-30 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(551, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:31:45', NULL, 1, '2024-04-29 12:00:00', '2024-04-30 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(552, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:33:04', NULL, 1, '2024-04-29 12:00:00', '2024-04-30 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(553, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:33:11', NULL, 1, '2024-05-02 12:00:00', '2024-05-03 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(554, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:33:39', NULL, 1, '2024-05-02 12:00:00', '2024-05-03 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(559, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:50:40', NULL, 1, '2024-05-05 12:00:00', '2024-05-06 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(560, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:52:29', NULL, 1, '2024-05-06 12:00:00', '2024-05-07 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(561, 0, 1500, '1', 1, 405, 25, '2024-04-17 18:52:38', NULL, 1, '2024-05-07 12:00:00', '2024-05-08 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(562, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:01:41', NULL, 1, '2024-05-08 12:00:00', '2024-05-09 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(563, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:01:46', NULL, 1, '2024-05-09 12:00:00', '2024-05-10 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(564, 0, 0, '1', 1, 408, 25, '2024-04-17 19:02:14', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(570, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:11:37', NULL, 1, '2024-05-07 12:00:00', '2024-05-09 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(571, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:17:57', NULL, 1, '2024-05-09 12:00:00', '2024-05-10 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(572, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:20:39', NULL, 1, '2024-05-10 12:00:00', '2024-05-11 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(573, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:25:14', NULL, 1, '2024-05-11 12:00:00', '2024-05-12 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(574, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:26:41', NULL, 1, '2024-05-12 12:00:00', '2024-05-13 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(575, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:26:53', NULL, 1, '2024-05-13 12:00:00', '2024-05-14 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(576, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:30:44', NULL, 1, '2024-05-14 12:00:00', '2024-05-15 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(577, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:32:08', NULL, 1, '2024-05-15 12:00:00', '2024-05-16 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(578, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:32:31', NULL, 1, '2024-05-15 12:00:00', '2024-05-16 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(579, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:36:03', NULL, 1, '2024-05-17 12:00:00', '2024-05-18 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(580, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:36:49', NULL, 1, '2024-05-18 12:00:00', '2024-05-19 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(581, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:41:00', NULL, 1, '2024-05-19 12:00:00', '2024-05-20 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(582, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:41:46', NULL, 1, '2024-05-20 12:00:00', '2024-05-21 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(583, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:44:00', NULL, 1, '2024-05-21 12:00:00', '2024-05-22 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(584, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:46:28', NULL, 1, '2024-05-22 12:00:00', '2024-05-23 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(585, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:46:38', NULL, 1, '2024-05-22 12:00:00', '2024-05-23 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(586, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:46:43', NULL, 1, '2024-05-24 12:00:00', '2024-05-25 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(587, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:50:45', NULL, 1, '2024-05-25 12:00:00', '2024-05-26 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(588, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:50:58', NULL, 1, '2024-05-25 12:00:00', '2024-05-26 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(589, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:51:15', NULL, 1, '2024-05-26 12:00:00', '2024-05-27 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(590, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:51:52', NULL, 1, '2024-05-27 12:00:00', '2024-05-28 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(591, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:52:06', NULL, 1, '2024-05-27 12:00:00', '2024-05-28 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(592, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:52:24', NULL, 1, '2024-05-29 12:00:00', '2024-06-01 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(593, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:52:48', NULL, 1, '2024-06-01 12:00:00', '2024-06-03 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(594, 0, 0, '1', 1, 409, 25, '2024-04-17 19:53:35', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(595, 0, 1500, '1', 1, 405, 25, '2024-04-17 19:53:53', NULL, 1, '2024-06-03 12:00:00', '2024-06-05 12:00:00', 1, 1, '1', NULL, 0, 0, 6, NULL),
(597, 1500, 1500, '1', 1, 411, 25, '2024-04-17 19:57:09', '-', 1, NULL, NULL, 1, 1, '1', '597', 1500, 0, 6, NULL),
(599, 1, 0, '0', 1, 411, 25, '2024-04-17 22:48:45', 'PAGO', 1, NULL, NULL, 1, 1, '1', '599', 1, 0, 6, NULL),
(600, 1, 0, '0', 1, 411, 25, '2024-04-17 23:33:51', 'PAGO', 1, NULL, NULL, 1, 1, '1', '600', 1, 0, 6, NULL),
(601, 1, 0, '0', 1, 411, 25, '2024-04-18 00:00:13', 'PAGO', 1, NULL, NULL, 1, 1, '1', '601', 1, 0, 6, NULL),
(602, 5, 0, '0', 1, 411, 25, '2024-04-18 00:15:42', 'PAGO', 1, NULL, NULL, 1, 1, '1', '602', 5, 0, 6, NULL),
(603, 0, 1500, '1', NULL, 411, 25, '2024-04-18 00:18:46', NULL, 1, '2024-04-22 12:00:00', '2024-04-23 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(604, 1500, 0, '0', 1, 411, 25, '2024-04-18 01:32:44', 'PAGO', 1, NULL, NULL, 1, 1, '1', '604', 1500, 0, 6, NULL),
(605, 5000, 1500, '1', 1, 412, 25, '2024-04-18 02:35:39', 'PAGO', 4, NULL, NULL, 1, 1, '1', '605', 5000, 0, 6, NULL),
(606, 0, 0, '1', 1, 413, 26, '2024-04-18 02:46:49', '-', 3, NULL, NULL, 1, 1, '1', '606', 3900, 0, 6, NULL),
(607, 0, 0, '1', 1, 414, 26, '2024-04-18 03:02:17', '-', 1, NULL, NULL, 1, 1, '1', '607', 1500, 0, 6, NULL),
(608, 61500, 0, '0', 1, 405, 26, '2024-04-18 03:07:08', '61500', 1, NULL, NULL, 1, 1, '1', '608', 61500, 0, 6, NULL),
(609, 0, 0, '1', 1, 415, 26, '2024-04-18 13:20:49', '-', 1, NULL, NULL, 1, 1, '1', '609', 1300, 0, 6, NULL),
(612, 0, 0, '1', NULL, 415, 26, '2024-04-18 13:33:08', NULL, 2, '2024-04-19 12:00:00', '2024-04-21 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(613, 0, 0, '1', 1, 416, 26, '2024-04-18 14:36:15', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(614, 0, 0, '0', 1, 415, 26, '2024-04-18 14:40:38', 'PAGO', 1, NULL, NULL, 1, 1, '1', '614', 2, 0, 6, NULL),
(615, 1200, 1500, '1', 1, 417, 26, '2024-04-18 14:44:32', '-', 1, NULL, NULL, 1, 1, '1', '615', 1200, 0, 6, NULL),
(616, 1300, 1300, '1', 1, 418, 26, '2024-04-18 14:55:06', '-', 1, NULL, NULL, 1, 1, '1', '616', 1300, 0, 6, NULL),
(618, 1500, 1500, '1', 1, 420, 26, '2024-04-21 03:17:08', '-', 1, NULL, NULL, 1, 1, '1', '618', 1500, 0, 6, NULL),
(620, 0, 0, '1', 1, 422, 26, '2024-04-22 17:50:53', '-', 1, NULL, NULL, 1, 1, '1', '620', 1500, 0, 6, NULL),
(621, 500, 0, '1', 1, 423, 27, '2024-04-23 19:13:14', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(622, 3900, 1300, '1', 1, 424, 27, '2024-04-24 01:57:39', '-', 3, NULL, NULL, 1, 1, '1', '622', 3900, 0, 6, NULL),
(623, 0, 0, '1', 1, 425, 27, '2024-04-24 02:00:07', '-', 1, NULL, NULL, 1, 1, '1', '623', 1500, 0, 6, NULL),
(624, 0, 0, '1', 1, 426, 27, '2024-04-24 02:01:14', '-', 1, NULL, NULL, 1, 1, '1', '624', 1500, 0, 6, NULL),
(625, 1500, 1500, '1', 1, 427, 27, '2024-04-24 02:31:59', '-', 1, NULL, NULL, 1, 1, '1', '625', 1500, 0, 6, NULL),
(626, 1500, 1500, '1', 1, 428, 27, '2024-04-24 02:34:42', '-', 1, NULL, NULL, 1, 1, '1', '626', 1500, 0, 6, NULL),
(628, 0, 0, '1', 1, 429, 27, '2024-04-24 05:05:34', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(629, 0, 0, '1', 1, 430, 27, '2024-04-24 05:54:37', '-', 1, NULL, NULL, 1, 1, '1', '629', 1300, 0, 6, NULL),
(630, 0, 0, '1', 1, 431, 27, '2024-04-24 05:59:27', '-', 1, NULL, NULL, 1, 1, '1', '630', 1300, 0, 6, NULL),
(631, 0, 0, '1', 1, 432, 27, '2024-04-24 06:01:16', '-', 1, NULL, NULL, 1, 1, '1', '631', 1500, 0, 6, NULL),
(632, 0, 0, '1', 1, 433, 27, '2024-04-24 06:05:32', '-', 1, NULL, NULL, 1, 1, '1', '632', 1300, 0, 6, NULL),
(633, 0, 0, '1', 1, 434, 27, '2024-04-24 06:06:00', '-', 1, NULL, NULL, 1, 1, '1', '633', 1300, 0, 6, NULL),
(634, 0, 0, '1', 1, 435, 27, '2024-04-24 06:07:15', '-', 1, NULL, NULL, 1, 1, '1', '634', 1300, 0, 6, NULL),
(635, 1300, 1300, '1', 1, 436, 27, '2024-04-24 06:13:07', '-', 1, NULL, NULL, 1, 1, '1', '635', 1300, 0, 6, NULL),
(636, 5200, 1300, '1', 1, 437, 27, '2024-04-24 06:14:04', '-', 4, NULL, NULL, 1, 1, '1', '636', 5200, 0, 6, NULL),
(637, 0, 0, '1', 1, 438, 28, '2024-04-29 18:39:27', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(638, 1500, 1500, '1', 1, 439, 28, '2024-04-29 18:58:04', '-', 1, NULL, NULL, 1, 1, '1', '638', 1500, 0, 6, NULL),
(640, 0, 1500, '1', 1, 441, 28, '2024-04-29 19:00:05', '-', 1, NULL, NULL, 1, 1, '1', '640', 0, 0, 6, NULL),
(641, 1500, 0, '0', 1, 441, 28, '2024-04-29 19:16:40', 'PAGO', 1, NULL, NULL, 1, 1, '1', '641', 1500, 0, 6, NULL),
(642, 0, 0, '1', 1, 442, 28, '2024-04-29 20:09:02', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(643, 0, 0, '1', 1, 443, 28, '2024-04-29 20:09:28', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(647, 0, 1300, '1', 1, 447, 28, '2024-04-29 21:17:36', '-', 1, NULL, NULL, 1, 1, '1', '647', 0, 0, 6, NULL),
(649, 500, 500, '1', 1, 449, 28, '2024-04-29 21:21:33', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(650, 0, 0, '1', 1, 450, 28, '2024-04-29 23:43:19', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(651, 0, 0, '1', 1, 451, 28, '2024-04-29 23:44:53', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(652, 0, 0, '1', 1, 452, 28, '2024-04-30 01:01:07', '', 1, NULL, NULL, 1, 1, '1', NULL, 0, 0, 6, NULL),
(653, 1500, 1500, '1', 1, 453, 28, '2024-05-02 14:23:16', '-', 3, NULL, NULL, 1, 1, '1', '653', 1500, 0, 6, NULL),
(654, 22500, 2500, '1', 1, 454, 28, '2024-05-02 14:32:21', '-', 9, NULL, NULL, 1, 1, '1', '654', 22500, 0, 6, NULL),
(655, 0, 2500, '1', NULL, 454, 28, '2024-05-02 14:32:57', NULL, 3, '2024-05-11 12:00:00', '2024-05-14 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(656, 0, 1500, '1', NULL, 427, 28, '2024-05-02 15:19:19', NULL, 1, '2024-04-25 00:00:00', '2024-04-26 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(658, 3000, 1000, '1', 2, 456, 28, '2024-05-02 15:25:20', '-', 3, NULL, NULL, 1, 1, '1', '658', 3000, 0, 6, NULL),
(659, 0, 1000, '1', NULL, 456, 28, '2024-05-02 15:25:38', NULL, 2, '2024-05-05 12:00:00', '2024-05-07 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(660, 2000, 0, '0', 2, 456, 28, '2024-05-02 15:25:55', 'PAGO', 1, NULL, NULL, 1, 1, '1', '660', 2000, 0, 6, NULL),
(661, 0, 1000, '1', NULL, 456, 28, '2024-05-02 20:36:26', NULL, 1, '2024-05-07 12:00:00', '2024-05-08 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(662, 4500, 1500, '1', 2, 457, 28, '2024-05-02 20:58:46', '-', 3, NULL, NULL, 1, 1, '1', '662', 4500, 0, 6, ''),
(663, 2000, 2000, '1', 2, 458, 28, '2024-05-02 21:09:50', '-', 1, NULL, NULL, 1, 1, '1', '663', 2000, 0, 6, ''),
(664, 1300, 1300, '1', 2, 459, 28, '2024-05-02 21:16:05', '-', 1, NULL, NULL, 1, 1, '1', '664', 1300, 0, 6, ''),
(665, 1500, 1500, '1', 2, 460, 28, '2024-05-02 21:21:33', '-', 1, NULL, NULL, 1, 1, '1', '665', 1500, 0, 6, 'TC-785y7tr'),
(666, 1500, 1300, '1', 2, 461, 28, '2024-05-02 22:46:43', '-', 1, NULL, NULL, 1, 1, '1', '666', 1500, 0, 6, 'TF-87984'),
(667, 0, 1300, '1', NULL, 461, 28, '2024-05-02 22:47:01', NULL, 2, '2024-05-03 22:46:00', '2024-05-05 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(668, 2400, 0, '0', 2, 461, 28, '2024-05-02 22:47:28', 'PAGO', 1, NULL, NULL, 1, 1, '1', '668', 2400, 0, 6, NULL),
(669, 0, 1300, '1', NULL, 461, 28, '2024-05-02 22:49:32', NULL, 2, '2024-05-05 12:00:00', '2024-05-07 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(670, 2600, 0, '0', 2, 461, 28, '2024-05-02 22:55:34', 'PAGO', 1, NULL, NULL, 1, 1, '1', '670', 2600, 0, 6, ''),
(671, 0, 1300, '1', NULL, 461, 28, '2024-05-02 22:56:36', NULL, 1, '2024-05-07 12:00:00', '2024-05-08 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(672, 1300, 0, '0', 2, 461, 28, '2024-05-02 22:57:06', 'PAGO', 1, NULL, NULL, 1, 1, '1', '672', 1300, 0, 6, 'TF-123'),
(673, 0, 1300, '1', NULL, 461, 28, '2024-05-02 22:57:24', NULL, 1, '2024-05-08 12:00:00', '2024-05-09 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(674, 1300, 0, '0', 3, 461, 28, '2024-05-02 22:57:35', 'PAGO', 1, NULL, NULL, 1, 1, '1', '674', 1300, 0, 6, 'DEP'),
(675, 0, 1300, '1', NULL, 461, 28, '2024-05-02 22:57:53', NULL, 1, '2024-05-09 12:00:00', '2024-05-10 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(676, 1300, 0, '0', 1, 461, 28, '2024-05-02 22:58:02', 'PAGO', 1, NULL, NULL, 1, 1, '1', '676', 1300, 0, 6, ''),
(678, 4000, 2000, '1', 2, 463, 28, '2024-05-02 23:09:04', '-', 2, NULL, NULL, 1, 1, '1', '678', 4000, 0, 6, 'TC-8796'),
(679, 0, 2000, '1', NULL, 463, 28, '2024-05-02 23:09:24', NULL, 2, '2024-05-04 12:00:00', '2024-05-06 12:00:00', 0, 1, '1', NULL, 0, 0, 6, NULL),
(680, 4000, 0, '0', 2, 463, 28, '2024-05-02 23:09:45', 'PAGO', 1, NULL, NULL, 1, 1, '1', '680', 4000, 0, 6, 'TD-1247'),
(681, 1200, 0, '0', 1, 463, 28, '2024-05-02 23:10:05', 'PAGO', 1, NULL, NULL, 1, 1, '1', '681', 1200, 0, 6, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_pago_comision`
--

CREATE TABLE `proceso_pago_comision` (
  `id` int(11) NOT NULL,
  `id_comisionista` int(11) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_sueldo`
--

CREATE TABLE `proceso_sueldo` (
  `id` int(11) NOT NULL,
  `id_sueldo` int(11) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `tipo` int(11) NOT NULL DEFAULT '1',
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_venta`
--

CREATE TABLE `proceso_venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_operacion` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1',
  `fecha_creada` datetime DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipopago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `precio_compra` double DEFAULT NULL,
  `precio_venta` double DEFAULT NULL,
  `stock` double NOT NULL DEFAULT '0',
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `proveedor` varchar(255) DEFAULT NULL,
  `id_categoriap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `id_habitacion` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `adulto` int(11) NOT NULL DEFAULT '1',
  `nino` int(11) NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `cant_noche` int(11) DEFAULT NULL,
  `estado` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'NO_ENVIADO',
  `detalle` text COLLATE utf8mb4_unicode_ci,
  `fecha_creada` datetime DEFAULT NULL,
  `idpagopaypal` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hab` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `fecha_entrada`, `fecha_salida`, `id_habitacion`, `id_cliente`, `adulto`, `nino`, `total`, `cant_noche`, `estado`, `detalle`, `fecha_creada`, `idpagopaypal`, `id_hab`) VALUES
(2, '2023-08-15 00:00:00', '2023-08-18 00:00:00', 2, 10, 2, 0, 0, 1, '0', 'asd', '2023-08-07 20:27:42', NULL, 0),
(3, '2023-08-07 00:00:00', '2023-08-12 00:00:00', 2, 11, 2, 0, 0, 1, 'SIN_PAGO', 'asdd', '2023-08-07 20:30:27', 'NULL', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(65) NOT NULL,
  `detalle1` text NOT NULL,
  `detalle2` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `imagen`, `titulo`, `detalle1`, `detalle2`) VALUES
(1, 'desayuno.jpg', 'Desayuno', 'Ofrecemos exquisitos desayunos regionales en nuestro amplio salÃ³n con seguridad y calidad.', 'flaticon-tray-1'),
(2, 'servicio.jpg', 'Servicio a la habitaciÃ³n', 'Brindamos servicio a la habitaciÃ³n para mejor experiencia en nuestro San Lazaro.', 'flaticon-nature'),
(3, 'wifi.jpg', 'Wifi de alta cobertura', 'WI-FI de alta cobertura gratuito para todos nuestros HuÃ©spedes.', 'fa fa-wifi'),
(4, 'tv.jpg', 'TV LED de 42 con cable', 'Tenemos televisiÃ³n de 32 y 42 pulgadas, segÃºn la habitaciÃ³n de preferencia.', 'fa fa-tv'),
(5, 'ga1.jpg', 'a', 'a', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sh_reserva`
--

CREATE TABLE `sh_reserva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sh_reserva`
--

INSERT INTO `sh_reserva` (`id`, `nombre`, `tipo`, `estado`) VALUES
(1, 'ADMIN', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `detalle1` varchar(65) NOT NULL,
  `detalle2` varchar(65) NOT NULL,
  `detalle3` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `imagen`, `titulo`, `detalle1`, `detalle2`, `detalle3`) VALUES
(1, 'slider2.jpg', 'BIENVENIDO A HOTEL <br> CASA BLANCA', 'Habitaciones modernas y suites espaciosas', 'Wi-Fi gratis y televisiÃ³n por cable', 'Habitaciones perfectas y espaciosas'),
(2, 'slider3.jpg', 'DISFRUTA TUS<br> VACACIONES', 'Habitaciones modernas y suites espaciosas', 'Wi-Fi gratis y televisiÃ³n por cable', 'Habitaciones perfectas y espaciosas'),
(3, 'slider1.jpg', 'NUEVAS EXPERIENCIAS', 'Habitaciones modernas y suites espaciosas', 'Wi-Fi gratis y televisiÃ³n por cable', 'Habitaciones perfectas y espaciosas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE `sueldo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `dia_pago` int(11) NOT NULL DEFAULT '1',
  `fecha_comienzo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `precio` float NOT NULL DEFAULT '100',
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`id`, `nombre`, `estado`, `precio`, `id_categoria`) VALUES
(4, 'Entre semana', 1, 1300, 4),
(5, 'Finde semana', 1, 1500, 4),
(6, 'Entre semana', 1, 1500, 3),
(7, 'Fin de semana', 1, 1750, 3),
(8, 'Entre semana', 1, 2000, 2),
(9, 'Entre semana', 1, 2200, 6),
(10, 'Entre semana', 1, 2500, 5),
(11, 'Semana Santa', 1, 2800, 2),
(12, '4 horas', 1, 800, 4),
(13, '4 horas', 1, 900, 3),
(14, 'ADMIN', 1, 1000, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa_habitacion`
--

CREATE TABLE `tarifa_habitacion` (
  `id` int(11) NOT NULL,
  `id_tarifa` int(11) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo`
--

CREATE TABLE `tiempo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiempo`
--

INSERT INTO `tiempo` (`id`, `nombre`) VALUES
(1, '08:00     08:15'),
(2, '08:15     08:30'),
(3, '08:30     08:45'),
(4, '08:45     09:00'),
(5, '09:00      09:15'),
(6, '09:15 09:30'),
(7, '09:30 09:45'),
(8, '09:45 10:00'),
(9, '10:00 10:15'),
(10, '10:15 10:30'),
(11, '10:30 10:45'),
(12, '10:45 11:00'),
(13, '11:00 11:15'),
(14, '11:15 11:30'),
(15, '11:30 11:45'),
(16, '11:45 12:00'),
(17, '12:00 12:15'),
(18, '12:15 12:30'),
(19, '12:30 12:45'),
(20, '12:45 13:00'),
(21, '13:00 13:15'),
(22, '13:15 13:30'),
(23, '13:30 13:45'),
(24, '13:45 14:00'),
(25, '14:00 14:15'),
(26, '14:15 14:30'),
(27, '14:30 14:45'),
(28, '14:45 15:00'),
(29, '15:00 15:15'),
(30, '15:15 15:30'),
(31, '15:30 15:45'),
(32, '15:45 16:00'),
(33, '16:00 16:15'),
(34, '16:15 16:30'),
(35, '16:30 16:45'),
(36, '16:45 17:00'),
(37, '17:00 17:15'),
(38, '17:15 17:30'),
(39, '17:30 17:45'),
(40, '17:45 18:00'),
(41, '18:00 18:15'),
(42, '18:15 18:30'),
(43, '18:30 18:45'),
(44, '18:45 19:00'),
(45, '19:00 19:15'),
(46, '19:15 19:30'),
(47, '19:30 19:45'),
(48, '19:45 20:00'),
(49, '20:00 20:15'),
(50, '20:15 20:30'),
(51, '20:30 20:45'),
(52, '20:45 21:00'),
(53, '21:00 21:15'),
(54, '21:15 21:30'),
(55, '21:30 21:45'),
(56, '21:45 22:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_comprobante`
--

INSERT INTO `tipo_comprobante` (`id`, `nombre`, `estado`) VALUES
(1, 'TICKET', 1),
(2, 'BOLETA', 1),
(3, 'FACTURA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `fecha_creada`) VALUES
(1, 'DNI', '2018-02-15 08:23:24'),
(2, 'PASAPORTE', '2018-02-15 09:24:24'),
(3, 'CARNET EXTRANJERIA', '2019-05-16 00:00:00'),
(4, 'RUC', '2019-05-16 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id`, `nombre`, `fecha_creada`, `estado`) VALUES
(1, 'EFECTIVO', '2018-02-15 09:25:24', 1),
(2, 'TARJETA DE DEBITO / CREDITO', '2018-02-15 09:25:24', 1),
(3, 'DEPOSITO', '2018-08-22 00:00:00', 1),
(4, 'CREDITO', '2019-04-30 00:00:00', 0),
(5, 'EFECTIVO Y TARJETA', NULL, 1),
(6, 'DOLARES', NULL, 1),
(7, 'EXPIDIA', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiraje`
--

CREATE TABLE `tiraje` (
  `id` int(11) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `nro_res_f` varchar(255) DEFAULT NULL,
  `nro_res` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  `al` int(11) NOT NULL DEFAULT '100',
  `utilizado` int(11) NOT NULL DEFAULT '0',
  `fecha_creada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiraje`
--

INSERT INTO `tiraje` (`id`, `id_comprobante`, `fecha`, `nro_res_f`, `nro_res`, `serie`, `del`, `al`, `utilizado`, `fecha_creada`) VALUES
(1, 1, '2019-06-25', '2019-1-17884545', '2019-1-111144414', '15UN88000022222', 0, 2000, 0, '2019-06-26 18:15:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_tmp` int(11) DEFAULT NULL,
  `precio_tmp` double DEFAULT NULL,
  `sessionn_id` varchar(255) DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `rol` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `pago` int(11) NOT NULL DEFAULT '0',
  `reserva` int(11) NOT NULL DEFAULT '1',
  `recepcion` int(11) NOT NULL DEFAULT '1',
  `factura` int(11) NOT NULL DEFAULT '1',
  `credito` int(11) NOT NULL DEFAULT '1',
  `punto_venta` int(11) NOT NULL DEFAULT '1',
  `inventario` int(11) NOT NULL DEFAULT '1',
  `caja` int(11) NOT NULL DEFAULT '1',
  `egreso` int(11) NOT NULL DEFAULT '1',
  `configuracion` int(11) NOT NULL DEFAULT '1',
  `cliente` int(11) NOT NULL DEFAULT '1',
  `reporte` int(11) NOT NULL DEFAULT '1',
  `administracion` int(11) NOT NULL DEFAULT '1',
  `servicio` int(11) NOT NULL DEFAULT '1',
  `pago_personal` int(11) NOT NULL DEFAULT '1',
  `kiosko` int(11) NOT NULL DEFAULT '1',
  `cocina` int(11) NOT NULL DEFAULT '1',
  `lavadero` int(11) NOT NULL DEFAULT '1',
  `limpieza` int(11) NOT NULL DEFAULT '1',
  `mantenimiento` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `image`, `is_active`, `is_admin`, `estado`, `rol`, `created_at`, `pago`, `reserva`, `recepcion`, `factura`, `credito`, `punto_venta`, `inventario`, `caja`, `egreso`, `configuracion`, `cliente`, `reporte`, `administracion`, `servicio`, `pago_personal`, `kiosko`, `cocina`, `lavadero`, `limpieza`, `mantenimiento`) VALUES
(6, 'Admin', 'Admin', 'admin', 'adminvortex89@gmail.com', '91751a9032c65341410bd10cab3d933c385cfc6a', NULL, 1, 1, 1, 1, '2024-03-21 14:10:09', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(11, 'Jose Aguistin', 'Perez Hernandez', 'Jose', 'jose987@gmail.com', '9ac12565eab96123a16c8b7fe7c1cb7fa81d9931', NULL, 1, 1, 1, 1, '2024-03-21 17:43:40', 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1),
(12, 'America', 'Lara', 'America', 'America976@gmail.com', 'e8af7027afda5fb68d98818506a1c5829d526905', NULL, 1, 3, 1, 1, '2024-03-21 17:43:58', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1),
(13, 'Luisa', 'Guzman', 'Luisa', 'lis389@gmail.com', '729a7ba269a7747325b90a2585e2911f584d4c64', NULL, 1, 3, 1, 1, '2024-03-21 19:01:16', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_tipo_comprobante` int(11) DEFAULT NULL,
  `nro_comprobante` varchar(25) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_tipo_pago` int(11) DEFAULT NULL,
  `tipo_operacion` int(11) NOT NULL DEFAULT '1',
  `total` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_caja` int(11) DEFAULT NULL,
  `fecha_creada` datetime DEFAULT NULL,
  `nro_casillero` varchar(25) DEFAULT NULL,
  `nombre_cliente` varchar(65) DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT '1',
  `nro_credito` int(11) NOT NULL DEFAULT '0',
  `credito` int(11) NOT NULL DEFAULT '0',
  `efectivo` float NOT NULL DEFAULT '0',
  `tarjeta` float NOT NULL DEFAULT '0',
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_p`
--
ALTER TABLE `categoria_p`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_proceso`
--
ALTER TABLE `cliente_proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comisionista`
--
ALTER TABLE `comisionista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `esperado`
--
ALTER TABLE `esperado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `extra`
--
ALTER TABLE `extra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_mantenimiento`
--
ALTER TABLE `historial_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventary_bed`
--
ALTER TABLE `inventary_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro_limpieza`
--
ALTER TABLE `libro_limpieza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagodetalleqr`
--
ALTER TABLE `pagodetalleqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagosqr`
--
ALTER TABLE `pagosqr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_pago`
--
ALTER TABLE `proceso_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_pago_comision`
--
ALTER TABLE `proceso_pago_comision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_sueldo`
--
ALTER TABLE `proceso_sueldo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_venta`
--
ALTER TABLE `proceso_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sh_reserva`
--
ALTER TABLE `sh_reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sueldo`
--
ALTER TABLE `sueldo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifa_habitacion`
--
ALTER TABLE `tarifa_habitacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiraje`
--
ALTER TABLE `tiraje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categoria_p`
--
ALTER TABLE `categoria_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente_proceso`
--
ALTER TABLE `cliente_proceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `comisionista`
--
ALTER TABLE `comisionista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `error`
--
ALTER TABLE `error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `esperado`
--
ALTER TABLE `esperado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `extra`
--
ALTER TABLE `extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `historial_mantenimiento`
--
ALTER TABLE `historial_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventary_bed`
--
ALTER TABLE `inventary_bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libro_limpieza`
--
ALTER TABLE `libro_limpieza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagodetalleqr`
--
ALTER TABLE `pagodetalleqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagosqr`
--
ALTER TABLE `pagosqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT de la tabla `proceso_pago`
--
ALTER TABLE `proceso_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;

--
-- AUTO_INCREMENT de la tabla `proceso_pago_comision`
--
ALTER TABLE `proceso_pago_comision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso_sueldo`
--
ALTER TABLE `proceso_sueldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso_venta`
--
ALTER TABLE `proceso_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sh_reserva`
--
ALTER TABLE `sh_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sueldo`
--
ALTER TABLE `sueldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tarifa_habitacion`
--
ALTER TABLE `tarifa_habitacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tiraje`
--
ALTER TABLE `tiraje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
