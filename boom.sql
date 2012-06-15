-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2012 a las 07:08:20
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `boom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE IF NOT EXISTS `albumes` (
  `id_album` varchar(25) NOT NULL,
  `id_usuario` varchar(25) NOT NULL,
  `nombre_album` varchar(50) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id_album`, `id_usuario`, `nombre_album`, `fecha_creacion`) VALUES
('4fda5d947de2c', '4fcf7b0ad7a71', 'casa', '2012-06-14'),
('4fda5da03d094', '4fcf7b0ad7a71', 'mesa', '2012-06-14'),
('4fda755a7a123', '4fcf7b0ad7a71', 'cosa', '2012-06-14'),
('4fda7bbe94c62', '4fcf7b0ad7a71', 'ALFONSO', '2012-06-14'),
('4fda7bda0f426', '4fcf7b0ad7a71', 'sdad', '2012-06-14'),
('4fda7bddc65d7', '4fcf7b0ad7a71', 'zxcxzcvczxc', '2012-06-14'),
('4fda7be26ea08', '4fcf7b0ad7a71', 'fsadff', '2012-06-14'),
('4fda7be62625c', '4fcf7b0ad7a71', 'asdasdfgfdas', '2012-06-14'),
('4fda7cec94c62', '4fcf7b0ad7a71', 'jaja', '2012-06-14'),
('4fda8a5a4c4b6', '4fd9199fe1115', 'VERANO', '2012-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistad`
--

CREATE TABLE IF NOT EXISTS `amistad` (
  `usuario1` varchar(25) NOT NULL,
  `usuario2` varchar(25) NOT NULL,
  `amigos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `amistad`
--

INSERT INTO `amistad` (`usuario1`, `usuario2`, `amigos`) VALUES
('4fd7563e1f778', '4fcf7b0ad7a71', 1),
('4fd7563e1f778', '4fcf7c1ee9fd3', 0),
('4fcf7b0ad7a71', '4fcfd20f03d0c', 1),
('4fd7563e1f778', '4fcfd20f03d0c', 1),
('4fcf7b0ad7a71', '4fcfb8a51ab42', 0),
('4fcf7b0ad7a71', '4fcf7c1ee9fd3', 1),
('4fd9199fe1115', '4fd7563e1f778', 1),
('4fcf7b0ad7a71', '4fd9199fe1115', 1),
('4fcf7b0ad7a71', '4fda784649e3e', 0),
('4fcfd20f03d0c', '4fcf7c1ee9fd3', 0),
('4fcf7b0ad7a71', '4fda77dfaf7a1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` varchar(25) NOT NULL,
  `id_usuario` varchar(25) NOT NULL,
  `id_publicacion` varchar(25) NOT NULL,
  `texto_comentario` text NOT NULL,
  `fecha_comentario` date NOT NULL,
  `hora_comentario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_publicacion`, `texto_comentario`, `fecha_comentario`, `hora_comentario`) VALUES
('4fd92fd100002', '4fd7563e1f778', '4fd7e2ae0f427', 'asdsadasedasdsad', '2012-06-13', '19:26:57'),
('4fda80b38d250', '4fcf7b0ad7a71', '4fd916282219e', 'sdasadrasd', '2012-06-14', '19:24:19'),
('4fda854ca4085', '4fcf7b0ad7a71', '4fda852ee8b27', 'dasdsad', '2012-06-14', '19:43:56'),
('4fdade716c5ef', '4fcf7b0ad7a71', '4fdade24cd988', 'HOLA!', '2012-06-15', '07:04:17'),
('4fdadebaa41cd', '4fcf7b0ad7a71', '4fdade24cd988', 'ESTA ES UNA PRUEBA', '2012-06-15', '07:05:30'),
('4fdadf1d8b2ab', '4fcf7b0ad7a71', '4fdadef872247', 'KSDKASC AKL CKA SCLKA SKLDCASKMC ', '2012-06-15', '07:07:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` varchar(25) NOT NULL,
  `id_album` varchar(25) NOT NULL,
  `nombre_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `id_album`, `nombre_foto`) VALUES
('4fda5d947de2c', '4fda5d947de2c', 'asdsad.jpg'),
('4fda5d947de2asdc', '4fda5d947de2c', 'asdasdsada.jpg'),
('asfasdsadsad', '4fda5d947de2c', 'adasdsad.jpg'),
('asdasd', '4fda5d947de2c', 'asdasdasd'),
('4fda757a31978', '4fda755a7a123', '4fda757a319af.png'),
('4fda759481b34', '4fda755a7a123', '4fda759481b6a.png'),
('4fda7a374c4b6', '4fda755a7a123', '4fda7a374c4e9.jpg'),
('4fda7a4ca7d8f', '4fda755a7a123', '4fda7a4ca7dc5.jpg'),
('4fda7f64b71b2', '4fda755a7a123', '4fda7f64b71e6.jpg'),
('4fda8123e8b27', '4fda7cec94c62', '4fda8123e8b5f.jpg'),
('4fda8a6189547', '4fda8a5a4c4b6', '4fda8a618957c.jpg'),
('4fda8a693d093', '4fda8a5a4c4b6', '4fda8a693d0ca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `id_usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `id_usuario`, `nombre_grupo`) VALUES
('4fdac59895dc6', '4fcf7b0ad7a71', 'mamama'),
('4fdac82fd7c38', '4fcf7b0ad7a71', 'Instuto Tecnológico Super'),
('4fdac869258a1', '4fcf7b0ad7a71', 'Ingeniería en Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustos`
--

CREATE TABLE IF NOT EXISTS `gustos` (
  `id_publicacion` varchar(25) NOT NULL,
  `id_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `gustos`
--

INSERT INTO `gustos` (`id_publicacion`, `id_usuario`) VALUES
('4fcfde30b71b3', '4fcf7b0ad7a71'),
('4fd756b66f051', '4fd7563e1f778'),
('4fcfde30b71b3', '4fd7563e1f778'),
('4fcfde30b71b3', '4fcfd20f03d0c'),
('4fd78b25ac6a2', '4fd7563e1f778'),
('4fd78b25ac6a2', '4fcf7b0ad7a71'),
('4fd79faa540ae', '4fcf7b0ad7a71'),
('4fd79dadca734', '4fcf7b0ad7a71'),
('4fd79fa26e462', '4fcf7b0ad7a71'),
('4fd7d24fbaebc', '4fcf7b0ad7a71'),
('4fcfd1d053ec9', '4fcf7b0ad7a71'),
('4fd7e2ba90f58', '4fcf7b0ad7a71'),
('4fd7e2ae0f427', '4fcf7b0ad7a71'),
('4fda852ee8b27', '4fcf7b0ad7a71'),
('4fda852ee8b27', '4fd9199fe1115'),
('4fdadb2b2547c', '4fcf7b0ad7a71'),
('4fda858a7a122', '4fcf7b0ad7a71'),
('4fdade24cd988', '4fcf7b0ad7a71');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` varchar(25) NOT NULL,
  `id_usuario` varchar(25) NOT NULL,
  `muro` varchar(25) NOT NULL,
  `texto_publicacion` text NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `hora_publicacion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `id_usuario`, `muro`, `texto_publicacion`, `fecha_publicacion`, `hora_publicacion`) VALUES
('4fd7e2ae0f427', '4fcf7b0ad7a71', '4fd7563e1f778', 'Holoa', '2012-06-12', '19:45:34'),
('4fd7e2ba90f58', '4fcf7b0ad7a71', '4fcf7b0ad7a71', 'Este es un mensaje!', '2012-06-12', '19:45:46'),
('4fd916282219e', '4fcf7b0ad7a71', '4fcf7b0ad7a71', 'Hola este es un mensaje de prueba', '2012-06-13', '17:37:28'),
('4fd9163681b34', '4fcf7b0ad7a71', '4fcf7c1ee9fd3', 'Sugey te estoy publicando algo !!', '2012-06-13', '17:37:42'),
('4fd919d390f59', '4fd7563e1f778', '4fd9199fe1115', ':D', '2012-06-13', '17:53:07'),
('4fda77f57641a', '4fda77dfaf7a1', '4fda77dfaf7a1', 'asdas', '2012-06-14', '18:47:01'),
('4fda80b8c28ce', '4fcf7b0ad7a71', '4fcf7b0ad7a71', 'szdcxzzxczxcz', '2012-06-14', '19:24:24'),
('4fda82570f357', '4fcfd20f03d0c', '4fcfd20f03d0c', 'hola', '2012-06-15', '00:31:19'),
('4fda852ee8b27', '4fd9199fe1115', '4fd9199fe1115', 'Mi publicacion!!', '2012-06-14', '19:43:26'),
('4fda858a7a122', '4fcf7b0ad7a71', '4fcf7b0ad7a71', 'asdasdsad', '2012-06-14', '19:44:58'),
('4fdadb2b2547c', '4fcf7b0ad7a71', '4fdac869258a1', 'Hola', '2012-06-15', '06:50:19'),
('4fdaddc4708a6', '4fcf7b0ad7a71', '4fdac82fd7c38', 'hola grupo!!', '2012-06-15', '07:01:24'),
('4fdade24cd988', '4fcf7b0ad7a71', '4fdac82fd7c38', 'eSTA ES UNA NUEVA PUBLICACION', '2012-06-15', '07:03:00'),
('4fdadef872247', '4fcf7b0ad7a71', '4fdac82fd7c38', '--------------------------ADASDSAD\r\n', '2012-06-15', '07:06:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `futbol` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `politica` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estudio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `foto`, `futbol`, `politica`, `estudio`, `lugar`) VALUES
('4fcf7b0ad7a71', 'Alfonso', 'Calderon Chavez', 'tony2124@hotmail.com', 'tony2124', '4fd78eed419ee.jpg', 'equipo de futbol', 'partido politico que no sea PRI', 'ITSA asdsa', 'CEÑIDOR asd'),
('4fcf7c1ee9fd3', 'SUGEY KARINA', 'RODRIGUEZ HERNANDEZ', 'sugey@hotmail.com', 'sugey', '4fd7a872daacd.jpg', '', '', '', ''),
('4fcfb8a51ab42', 'MANUEL', 'OCHOA', 'ramirez@hotmail.com', 'tony2124', '4fd768adc765a.jpg', '', '', '', ''),
('4fcfd20f03d0c', 'Javier', 'Calderon', 'javo21@hotmail.com', 'tony2124', '4fd78211b52f1.jpg', '', '', '', ''),
('4fd7563e1f778', 'Jimena', 'Pancracia', 'maria@hotmail.com', 'tony2124', '4fd782693b74e.jpg', 'america', 'PRD', 'COBAEM', 'EL CEÑIDOR'),
('4fd9199fe1115', 'Chuche', 'Jimenez', 'chuche@hotmail.com', 'tony2124', '4fda8c9d7641a.png', '', '', '', ''),
('4fda784649e3e', 'Javier ', 'Calderon', 'javo21@hotmail.com', 'holamundo', 'BOOM.jpg', '', '', '', ''),
('4fda77dfaf7a1', 'javier', 'assadaas', 'javo2124@hotmail.com', 'tony', 'BOOM.jpg', '', '', '', '');