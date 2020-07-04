-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 05:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `torneo_box_olimpico`
--

-- --------------------------------------------------------

--
-- Table structure for table `boxeadores`
--

CREATE TABLE `boxeadores` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_p` varchar(50) NOT NULL,
  `apellido_m` varchar(50) NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `num_peleas` int(11) NOT NULL,
  `num_peleas_ganadas` int(11) NOT NULL,
  `num_peleas_perdidas` int(11) NOT NULL,
  `num_empates` int(11) NOT NULL,
  `ko` int(11) NOT NULL,
  `loseko` int(11) NOT NULL,
  `winsdesicion` int(11) NOT NULL,
  `losedesicion` int(11) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  `id_gimnasio` varchar(50) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categoria_varonil_peso_welter`
--

CREATE TABLE `categoria_varonil_peso_welter` (
  `id_boxeador` varchar(50) NOT NULL,
  `id_gimnasio` varchar(50) NOT NULL,
  `nombre_boxeador` varchar(100) NOT NULL,
  `peleas_ganadas` int(11) NOT NULL,
  `peleas_perdidas` int(11) NOT NULL,
  `empates` int(11) NOT NULL,
  `foto_boxeador` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria_varonil_peso_welter`
--

INSERT INTO `categoria_varonil_peso_welter` (`id_boxeador`, `id_gimnasio`, `nombre_boxeador`, `peleas_ganadas`, `peleas_perdidas`, `empates`, `foto_boxeador`) VALUES
('B1', 'G1', 'Manny Pacquiao', 62, 7, 0, NULL),
('B10', 'G2', 'Ricardo López', 50, 1, 0, NULL),
('B11', 'G3', 'Alberto Arizmendi', 87, 26, 0, NULL),
('B12', 'G3', 'Nonito Donaire', 40, 6, 0, NULL),
('B13', 'G3', 'Muhammad Ali', 56, 6, 0, NULL),
('B14', 'G3', 'Myke Tyson', 56, 4, 0, NULL),
('B15', 'G3', 'Floyd Mayweather Jr', 50, 0, 0, NULL),
('B16', 'G4', 'Roberto Duran', 103, 16, 0, NULL),
('B17', 'G4', 'Ryan Garcia', 20, 0, 0, NULL),
('B18', 'G4', 'Gervonta Davis', 23, 0, 0, NULL),
('B19', 'G4', 'Margarito', 41, 8, 0, NULL),
('B2', 'G1', 'Juan Manuel Márquez', 56, 7, 0, NULL),
('B20', 'G4', 'Canelo', 53, 1, 0, NULL),
('B21', 'G5', 'Rocky Marciano', 49, 0, 0, NULL),
('B22', 'G5', 'Vasyl Lomachenko', 14, 1, 0, NULL),
('B23', 'G5', 'Teófimo Lopez', 15, 0, 0, NULL),
('B24', 'G5', 'Jaime Munguia', 35, 0, 0, NULL),
('B25', 'G5', 'Francisco el gallo Estrada', 40, 3, 0, NULL),
('B26', 'G6', 'Tomas el gusano Rojas', 51, 18, 0, NULL),
('B27', 'G6', 'Nicolino Locche', 117, 4, 0, NULL),
('B28', 'G6', 'Vicente Saldivar', 37, 3, 0, NULL),
('B29', 'G6', 'Oscar de la Hoya', 39, 6, 0, NULL),
('B3', 'G1', 'Miguel Cotto', 41, 6, 0, NULL),
('B30', 'G6', 'Jorge Arce', 64, 8, 0, NULL),
('B4', 'G1', 'Julio César Chávez', 107, 6, 0, NULL),
('B5', 'G1', 'Rubén Olivares', 89, 13, 0, NULL),
('B6', 'G2', 'Érik Morales', 59, 9, 0, NULL),
('B7', 'G2', 'Salvador Sánchez', 41, 1, 0, NULL),
('B8', 'G2', 'Marco Antonio Barrera', 67, 7, 0, NULL),
('B9', 'G2', 'Carlos Zárate ', 66, 4, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gimnasio`
--

CREATE TABLE `gimnasio` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gimnasio`
--

INSERT INTO `gimnasio` (`id`, `nombre`, `ubicacion`, `telefono`, `facebook`, `email`, `descripcion`, `foto`) VALUES
('G1', 'DECA', 'https://www.google.com.mx/maps/place/Campo+Deportivo+Adolfo+Lopez+Mateos/@19.4968874,-96.9846754,13z/data=!4m8!1m2!2m1!1sCoatepec+ver+gimnasio+adolfo+lopez+mateo!3m4!1s0x85db2cdefd93b181:0xb299afcfde3f728e!8m2!3d19.4551188!4d-96.9661799?hl=en&authuser=0', '228 257 6388', 'DECA Deporte de calidad', 'decacoatepec@hotmail.com', 'Deporte de Calidad (DECA) es una iniciativa creada para organizar y realizar eventos en fomento y mejora del deporte.', 0x484f4c41),
('G2', 'KNOCKOUT', 'https://www.google.com.mx/maps/place/Gimnasio+Knockout/@19.5429518,-96.9398053,17z/data=!3m1!4b1!4m5!3m4!1s0x85db2e1280c42a6b:0x62fc736024fb53a!8m2!3d19.5429518!4d-96.9398053?hl=en&authuser=0', '228 112 5470', 'Boxeo Knockout', NULL, 'Equipo deportivo', NULL),
('G3', 'Leones', 'https://www.google.com.mx/maps/place/Velodromo+Internacional+Xalapa/@19.5102922,-96.928647,17z/data=!4m5!3m4!1s0x85db2df2fdb0a561:0xa74bdbebe5232fe4!8m2!3d19.5102922!4d-96.928647?hl=en&authuser=0', '', 'Leones Xalapa', 'leonesxalapa@outlook.es', 'Equipo deportivo de aficionados', NULL),
('G4', 'Sparring Boxing Club', 'https://www.google.com.mx/maps/place/Sparring+Boxing+Club/@19.528234,-96.8950183,17z/data=!3m1!4b1!4m5!3m4!1s0x85db322139a0ca7f:0x171560e90ccae6c0!8m2!3d19.528234!4d-96.8950183?hl=en&authuser=0', '228 180 2668', 'Sparring Boxing Club', 'sparringboxingclub@gmail.com', 'Gimnasio para la práctica del boxeo, en el cual mejorarás tu condición física, desarrollarás habilidades y reducirás de peso.', NULL),
('G5', 'Ultimate boxing club', 'https://www.google.com.mx/maps/place/UBC/@19.5413901,-96.9269425,15z/data=!4m8!1m2!2m1!1sultimate+boxing+club+xalapa+ver!3m4!1s0x85db31fce28ff8c1:0xd2c9fbb9cd42b464!8m2!3d19.5413901!4d-96.9181878?hl=en&authuser=0', '228 243 1365', 'Ultimate boxing club', 'adan.boxingcoach@hotmail.com', 'centro deportivo: preparación física para deportistas, escuela de boxeo amateur, olímpico, recreativo, rehabilitación deportiva, vendaje neuromuscular.', NULL),
('G6', 'Boxeo Rojas', 'https://www.google.com.mx/maps/place/GIMNASIO+DE+BOX+TOMAS+%22GUSANO%22+ROJAS/@19.1650756,-96.453255,10z/data=!4m8!1m2!2m1!1sboxeo+rojas!3m4!1s0x85c343ed25d01e69:0x93e0a4a62852d14!8m2!3d19.1650756!4d-96.1731036?hl=en&authuser=0', '', 'GIMNASIO DE BOX TOMAS \"GUSANO\" ROJAS', '', 'Escuela de box de Tomas el Gusano Rojas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jueces`
--

CREATE TABLE `jueces` (
  `id` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `cuerpo` varchar(10000) NOT NULL,
  `foto` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `fecha`, `cuerpo`, `foto`) VALUES
(1, 'Campeonato estatal de boxeo', '2020-06-24', 'Se aproxima el campeonato estatal de boxeo olimpico de Veracruz Para más información da clic en la imagen.', NULL),
(2, 'Apoya a esta causa', '2020-06-25', 'Solicitamos el apoyo para este gran boxeador peso gallo, para poder participar en las estatales.', NULL),
(3, 'Asi relata esta gran boxeadora su vida arriba y fuera del ring', '2020-06-26', 'Su nombre es Johana y su pasion siempre a sido el boxeo pero no a tenido una vida tan facil afuera del ring, se dedica a trabajar, estudiar y entrena en las noches en el gimnasio de su colonia, sin duda un ejemplo a seguir.', NULL),
(4, 'Por primera vez en la historia boxeadores profesionales podran participar en las olimpiadas.', '2020-06-27', 'Los Juegos Olímpicos Tokio 2020 y la posibilidad de que pugilistas profesionales participen en esa competencia reavivaron el diferendo entre los titulares del Consejo Mundial de Boxeo y de la Federación Mexicana de Box, Mauricio Sulaimán y Ricardo Conteras. El primero es tajante: de ninguna manera puede aceptarse que un boxeador profesional compita en esa justa; el segundo arguye que se hará todo lo posible para llevar a Japón la mejor delegación boxística de la historia y ganar medallas en esa disciplina.', NULL),
(5, 'Boxeador peso welter son 0 derrotas hasta el momento.', '2020-06-28', 'El boxeador Saul a disputado 5 peleas seguidas sin derrota durante el campeonato estatal de boxeo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peleas_estatales_categoria_varonil`
--

CREATE TABLE `peleas_estatales_categoria_varonil` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `id_juez1` varchar(50) NOT NULL,
  `id_juez2` varchar(50) NOT NULL,
  `id_juez3` varchar(50) NOT NULL,
  `id_juez4` varchar(50) NOT NULL,
  `id_boxeador1` varchar(50) NOT NULL,
  `id_boxeador2` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peleas_estatales_categoria_varonil`
--

INSERT INTO `peleas_estatales_categoria_varonil` (`id`, `categoria`, `id_juez1`, `id_juez2`, `id_juez3`, `id_juez4`, `id_boxeador1`, `id_boxeador2`, `fecha`, `hora`) VALUES
(1, 'welter', 'J1', 'J2', 'J3', 'J5', 'B1', 'B2', '2020-07-10', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `peleas_municipios_categoria_varonil`
--

CREATE TABLE `peleas_municipios_categoria_varonil` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `id_juez1` varchar(50) NOT NULL,
  `id_juez2` varchar(50) NOT NULL,
  `id_juez3` varchar(50) NOT NULL,
  `id_juez4` varchar(50) NOT NULL,
  `id_boxeador1` varchar(50) NOT NULL,
  `id_boxeador2` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peleas_municipios_categoria_varonil`
--

INSERT INTO `peleas_municipios_categoria_varonil` (`id`, `categoria`, `id_juez1`, `id_juez2`, `id_juez3`, `id_juez4`, `id_boxeador1`, `id_boxeador2`, `fecha`, `hora`) VALUES
(1, 'welter', 'J1', 'J2', 'J3', 'J4', 'B1', 'B2', '2020-07-01', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resultados_estatales_categoria_varonil`
--

CREATE TABLE `resultados_estatales_categoria_varonil` (
  `id` int(11) NOT NULL,
  `idb1` varchar(50) NOT NULL,
  `idb2` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `idganador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resultados_municipios_categoria_varonil`
--

CREATE TABLE `resultados_municipios_categoria_varonil` (
  `id` int(11) NOT NULL,
  `aliasb1` varchar(50) NOT NULL,
  `aliasb2` varchar(50) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `aliasganador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resultados_municipios_categoria_varonil`
--

INSERT INTO `resultados_municipios_categoria_varonil` (`id`, `aliasb1`, `aliasb2`, `peso`, `aliasganador`) VALUES
(1, 'B1', 'B2', 'welter', 'B1');

-- --------------------------------------------------------

--
-- Table structure for table `tabla_de_pelea`
--

CREATE TABLE `tabla_de_pelea` (
  `id` int(11) NOT NULL,
  `id_juez` varchar(50) NOT NULL,
  `id_pelea` int(11) NOT NULL,
  `id_boxeador` varchar(50) NOT NULL,
  `round1` int(11) DEFAULT NULL,
  `round2` int(11) DEFAULT NULL,
  `round3` int(11) DEFAULT NULL,
  `round4` int(11) DEFAULT NULL,
  `round5` int(11) DEFAULT NULL,
  `round6` int(11) DEFAULT NULL,
  `round7` int(11) DEFAULT NULL,
  `round8` int(11) DEFAULT NULL,
  `round9` int(11) DEFAULT NULL,
  `round10` int(11) DEFAULT NULL,
  `round11` int(11) DEFAULT NULL,
  `round12` int(11) NOT NULL,
  `total_puntos` int(11) DEFAULT NULL,
  `num_jabs` int(11) DEFAULT NULL,
  `num_power` int(11) DEFAULT NULL,
  `total_golpes` int(11) DEFAULT NULL,
  `ganador?` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabla_de_pelea`
--

INSERT INTO `tabla_de_pelea` (`id`, `id_juez`, `id_pelea`, `id_boxeador`, `round1`, `round2`, `round3`, `round4`, `round5`, `round6`, `round7`, `round8`, `round9`, `round10`, `round11`, `round12`, `total_puntos`, `num_jabs`, `num_power`, `total_golpes`, `ganador?`) VALUES
(1, 'J1', 1, 'B1', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(2, 'J1', 1, 'B2', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(3, 'J2', 1, 'B1', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(4, 'J2', 1, 'B2', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(5, 'J3', 1, 'B1', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(6, 'J3', 1, 'B2', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(7, 'J4', 1, 'B1', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(8, 'J4', 1, 'B2', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boxeadores`
--
ALTER TABLE `boxeadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria_varonil_peso_welter`
--
ALTER TABLE `categoria_varonil_peso_welter`
  ADD PRIMARY KEY (`id_boxeador`);

--
-- Indexes for table `gimnasio`
--
ALTER TABLE `gimnasio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jueces`
--
ALTER TABLE `jueces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabla_de_pelea`
--
ALTER TABLE `tabla_de_pelea`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
