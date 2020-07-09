-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 08:11 PM
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
  `id_boxeador` varchar(50) NOT NULL,
  `id_gimnasio` varchar(50) DEFAULT NULL,
  `alias` varchar(100) NOT NULL,
  `nombre_boxeador` varchar(100) DEFAULT NULL,
  `total_peleas` int(11) NOT NULL,
  `peleas_ganadas` int(11) DEFAULT NULL,
  `peleas_ganadas_ko` int(11) NOT NULL,
  `peleas_perdidas` int(11) DEFAULT NULL,
  `peleas_perdidas_ko` int(11) NOT NULL,
  `empates` int(11) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `division` varchar(50) NOT NULL,
  `peso` float DEFAULT NULL,
  `altura` float DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxeadores`
--

INSERT INTO `boxeadores` (`id_boxeador`, `id_gimnasio`, `alias`, `nombre_boxeador`, `total_peleas`, `peleas_ganadas`, `peleas_ganadas_ko`, `peleas_perdidas`, `peleas_perdidas_ko`, `empates`, `categoria`, `division`, `peso`, `altura`, `estado`, `ciudad`, `municipio`, `foto`) VALUES
('B1', 'G1', 'Pac Man', 'Emmanuel Dapidran Pacquiao', 71, 62, 39, 7, 3, 2, 'M', 'welter', 66, 1.66, 'Cotabato del Sur', 'General Santos City', NULL, 'https://boxrec.com/media/images/thumb/f/fa/MannyPacquiao1.jpg/200px-MannyPacquiao1.jpg'),
('B10', 'G2', 'Finito', 'Ricardo López Nava', 52, 51, 38, 0, 0, 1, 'M', 'minimosca', 48, 1.65, 'Morelos', 'Cuernavaca', NULL, 'https://boxrec.com/media/images/thumb/3/32/Viaja-finito-a-induccion-a-salon-de-la-fama.jpg/200px-Viaja-finito-a-induccion-a-salon-de-la-fama.jpg'),
('B11', 'G3', 'Baby Arizmendi', 'Alberto Arizmendi', 128, 87, 20, 26, 4, 14, 'M', 'pluma', 58, 1.64, 'Tamaulipas', 'Tampico', NULL, 'https://boxrec.com/media/images/thumb/e/e0/ArizmendiB.jpeg/200px-ArizmendiB.jpeg'),
('B12', 'G3', 'The Filipino Flash', 'Nonito Gonzales Donaire Jr', 46, 40, 26, 6, 1, 0, 'M', 'gallo', 56, 1.7, 'Bohol', 'Talibon', NULL, 'https://boxrec.com/media/images/thumb/b/b4/Nonito_Donaire.jpg/200px-Nonito_Donaire.jpg'),
('B13', 'G3', 'The Greatest', 'Cassius Marcellus Clay', 61, 56, 37, 5, 1, 0, 'M', 'pesado', 91, 1.91, 'Kentucky', 'Louisville', NULL, 'https://boxrec.com/media/images/thumb/4/43/Ali_480938006.jpg/200px-Ali_480938006.jpg'),
('B14', 'G3', 'Iron', 'Michael Gerard Tyson', 58, 50, 44, 6, 5, 0, 'M', 'pesado', 91, 1.78, 'New York', 'Brooklyn', NULL, 'https://boxrec.com/media/images/thumb/9/94/MikeTysonHeadshot2.jpg/200px-MikeTysonHeadshot2.jpg'),
('B15', 'G3', 'Money Pretty Boy', 'Floyd Joy Sinclair', 50, 50, 27, 0, 0, 0, 'M', 'welter', 72, 1.73, 'Michigan', 'Grand Rapids', NULL, 'https://boxrec.com/media/images/thumb/1/1a/FloydMayweatherHeadshot3.jpg/200px-FloydMayweatherHeadshot3.jpg'),
('B16', 'G4', 'Manos de Piedra / El Cholo', 'Roberto Duran Samaniego', 119, 103, 70, 16, 4, 0, 'M', 'ligero', 62, 1.7, 'Panama', 'El Chorrillo', NULL, 'https://boxrec.com/media/images/thumb/9/9c/Roberto_Duran1.JPG/200px-Roberto_Duran1.JPG'),
('B17', 'G4', '\'Kingry\' \'The Flash\'', 'Ryan Garcia', 20, 20, 17, 0, 0, 0, 'M', 'ligero', 62, 1.78, 'California', 'Los Angeles', NULL, 'https://boxrec.com/media/images/thumb/0/07/RyanGarcia.jpg/200px-RyanGarcia.jpg'),
('B18', 'G4', 'Tank', 'Gervonta Davis', 23, 23, 22, 0, 0, 0, 'M', 'ligero', 62, 1.66, 'Maryland', 'Baltimore', NULL, 'https://boxrec.com/media/images/thumb/e/e6/643387.jpeg/200px-643387.jpeg'),
('B19', 'G4', 'El Tornado de Tijuana', 'Antonio Margarito Montiel', 50, 41, 27, 8, 2, 0, 'M', 'welter', 74, 1.8, 'Baja California', 'Tijuana', NULL, 'https://boxrec.com/media/images/thumb/0/03/Antonio_margarito.jpg/200px-Antonio_margarito.jpg'),
('B2', 'G1', 'Dinamita', 'Juan Manuel Márquez Méndez', 64, 56, 40, 7, 0, 1, 'M', 'pluma', 58, 1.7, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/1/15/Juan_Manuel_Marquez_Mendez.jpg/200px-Juan_Manuel_Marquez_Mendez.jpg'),
('B20', 'G4', 'Canelo', 'Santos Saúl Álvarez Barragán', 56, 53, 36, 1, 0, 2, 'M', 'medio', 77, 1.73, 'Jalisco', 'Guadalajara', NULL, 'https://boxrec.com/media/images/thumb/7/74/Santos_Saul_Alvarez_Barragan1.jpg/200px-Santos_Saul_Alvarez_Barragan1.jpg'),
('B21', 'G5', 'The Brockton Blockbuster', 'Rocco Francis Marchegiano', 49, 49, 43, 0, 0, 0, 'M', 'pesado', 91, 1.79, 'Massachusetts', 'Brockton', NULL, 'https://boxrec.com/media/images/thumb/f/fd/Gloved_RM.JPG/200px-Gloved_RM.JPG'),
('B22', 'G5', 'Hi-Tech', 'Vasiliy Anatoliyovich Lomachenko', 15, 14, 10, 1, 0, 0, 'M', 'ligero', 63, 1.7, 'Dnistrovskyi', 'Bilhorod', NULL, 'https://boxrec.com/media/images/thumb/6/68/Vasyl_Lomachenko1.JPG/200px-Vasyl_Lomachenko1.JPG'),
('B23', 'G5', 'El Brooklyn', 'Teofimo Andres Lopez', 15, 15, 12, 0, 0, 0, 'M', 'ligero', 62, 1.73, 'New York', 'Brooklyn', NULL, 'https://boxrec.com/media/images/thumb/c/c5/Teofimo_Lopez.JPG/200px-Teofimo_Lopez.JPG'),
('B24', 'G5', 'Jaime Munguia', 'Jaime Munguia', 35, 35, 28, 0, 0, 0, 'M', 'medio', 78, 1.83, 'Baja California', 'Tijuana', NULL, 'https://boxrec.com/media/images/thumb/6/65/JaimeMunguia1.JPG/200px-JaimeMunguia1.JPG'),
('B25', 'G5', 'El Gallo', 'Juan Francisco Estrada Romero', 43, 40, 27, 3, 0, 0, 'M', 'pluma', 59, 1.63, 'Sonora', 'Puerto Penasco', NULL, 'https://boxrec.com/media/images/thumb/7/75/467843.jpeg/200px-467843.jpeg'),
('B26', 'G6', 'Gusano', 'Tomas Rojas Gomez', 72, 51, 34, 19, 4, 0, 'M', 'pluma', 59, 1.73, 'Veracruz', 'Veracruz', NULL, 'https://boxrec.com/media/images/thumb/a/a7/Clip_image008.jpg/200px-Clip_image008.jpg'),
('B27', 'G6', 'El intocable', 'Nicolino Felipe Locche', 136, 117, 14, 4, 1, 14, 'M', 'ligero', 63, 1.68, 'Mendoza', 'Tunuyan', NULL, 'https://boxrec.com/media/images/thumb/6/62/Nicolino_Locche.jpg/200px-Nicolino_Locche.jpg'),
('B28', 'G6', 'El Zurdo de Oro', 'Vicente Saldivar', 40, 37, 26, 3, 3, 0, 'M', 'pluma', 58, 1.6, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/1/18/Saldivar_Vicente.jpg/200px-Saldivar_Vicente.jpg'),
('B29', 'G6', 'Golden Boy', 'Oscar de la Hoya', 45, 39, 30, 6, 2, 0, 'M', 'welter', 72, 1.85, 'California', 'Los Angeles', NULL, 'https://boxrec.com/media/images/thumb/2/2e/Oscar776823.jpg/200px-Oscar776823.jpg'),
('B3', 'G1', 'Junito', 'Miguel Angel Cotto', 43, 32, 1, 11, 0, 0, 'M', 'mediano', 77, 1.71, 'Puerto Rico', 'Caguas', NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Miguel_Cotto.jpg/245px-Miguel_Cotto.jpg'),
('B30', 'G6', 'Travieso', 'Jorge Arce', 75, 64, 49, 8, 5, 2, 'M', 'mini mosca', 49, 1.64, 'Sinaloa', 'Los Mochis', NULL, 'https://boxrec.com/media/images/thumb/0/03/Jorge_Arce1.jpg/200px-Jorge_Arce1.jpg'),
('B4', 'G1', 'J.C.', 'Julio Cesar Chavez Gonzalez', 115, 107, 85, 6, 4, 2, 'M', 'ligero', 63, 1.71, 'Sonora', 'Ciudad Obregón', NULL, 'https://boxrec.com/media/images/thumb/4/40/Julio_Cesar_Chavez.jpg/200px-Julio_Cesar_Chavez.jpg'),
('B5', 'G1', '', 'Rubén Olivares', 0, 89, 0, 13, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, ''),
('B6', 'G2', '', 'Érik Morales', 0, 59, 0, 9, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, ''),
('B7', 'G2', '', 'Salvador Sánchez', 0, 41, 0, 1, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, ''),
('B8', 'G2', '', 'Marco Antonio Barrera', 0, 67, 0, 7, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, ''),
('B9', 'G2', '', 'Carlos Zárate ', 0, 66, 0, 4, 0, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, '');

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
('G1', 'DECA', 'https://www.google.com.mx/maps/place/Campo+Deportivo+Adolfo+Lopez+Mateos/@19.4968874,-96.9846754,13z/data=!4m8!1m2!2m1!1sCoatepec+ver+gimnasio+adolfo+lopez+mateo!3m4!1s0x85db2cdefd93b181:0xb299afcfde3f728e!8m2!3d19.4551188!4d-96.9661799?hl=en&authuser=0', '228 257 6388', 'DECA Deporte de calidad', 'decacoatepec@hotmail.com', 'Deporte de Calidad (DECA) es una iniciativa creada para organizar y realizar eventos en fomento y mejora del deporte.', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f74312e302d392f31343334343932395f3132323034333834383235363032395f343430353032313834313732323031363636335f6e2e6a70673f5f6e635f6361743d313039265f6e635f7369643d303963626665265f6e635f6f68633d7a4a5a552d665736592d4141582d39636b2d72265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d3931353363393037346139363966333236623163643562396437316161663434266f653d3546323441463839),
('G2', 'KNOCKOUT', 'https://www.google.com.mx/maps/place/Gimnasio+Knockout/@19.5429518,-96.9398053,17z/data=!3m1!4b1!4m5!3m4!1s0x85db2e1280c42a6b:0x62fc736024fb53a!8m2!3d19.5429518!4d-96.9398053?hl=en&authuser=0', '228 112 5470', 'Boxeo Knockout', 'nockout@gmail.com', 'Equipo deportivo', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f74312e302d392f31303538333935305f313539313333303239343432363934355f383937383530373332313836393834343637385f6e2e6a70673f5f6e635f6361743d313039265f6e635f7369643d303963626665265f6e635f6f68633d61784d7432532d3039575541585f6941484a74265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d3639383732383364353232366136393639613634616134386166363730316635266f653d3546323633453533),
('G3', 'Leones', 'https://www.google.com.mx/maps/place/Velodromo+Internacional+Xalapa/@19.5102922,-96.928647,17z/data=!4m5!3m4!1s0x85db2df2fdb0a561:0xa74bdbebe5232fe4!8m2!3d19.5102922!4d-96.928647?hl=en&authuser=0', 's/n', 'Leones Xalapa', 'leonesxalapa@outlook.es', 'Equipo deportivo de aficionados', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f74312e302d392f35333035303635305f3339313637313130343736313538355f323331393639373233333638303739333630305f6e2e6a70673f5f6e635f6361743d313033265f6e635f7369643d303963626665265f6e635f6f68633d393158673339723038797341582d6b6d775232265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d3236626437613537336136356665363839396438383937633830373661306535266f653d3546323837424245),
('G4', 'Sparring Boxing Club', 'https://www.google.com.mx/maps/place/Sparring+Boxing+Club/@19.528234,-96.8950183,17z/data=!3m1!4b1!4m5!3m4!1s0x85db322139a0ca7f:0x171560e90ccae6c0!8m2!3d19.528234!4d-96.8950183?hl=en&authuser=0', '228 180 2668', 'Sparring Boxing Club', 'sparringboxingclub@gmail.com', 'Gimnasio para la práctica del boxeo, en el cual mejorarás tu condición física, desarrollarás habilidades y reducirás de peso.', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f7433312e302d382f31363130373130345f313238323236363436313833323834325f313433363034353834393935373938333630315f6f2e6a70673f5f6e635f6361743d313037265f6e635f7369643d303963626665265f6e635f6f68633d427067317242596b354d4141583862646d7934265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d3661633335396638313430633561303638326333396565643331626134316632266f653d3546323841303832),
('G5', 'Ultimate boxing club', 'https://www.google.com.mx/maps/place/UBC/@19.5413901,-96.9269425,15z/data=!4m8!1m2!2m1!1sultimate+boxing+club+xalapa+ver!3m4!1s0x85db31fce28ff8c1:0xd2c9fbb9cd42b464!8m2!3d19.5413901!4d-96.9181878?hl=en&authuser=0', '228 243 1365', 'Ultimate boxing club', 'adan.boxingcoach@hotmail.com', 'centro deportivo: preparación física para deportistas, escuela de boxeo amateur, olímpico, recreativo, rehabilitación deportiva, vendaje neuromuscular.', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f74312e302d392f39333131383437375f313537323130353438363238313237325f373535313132333239303334313736393231365f6f2e6a70673f5f6e635f6361743d313039265f6e635f7369643d303963626665265f6e635f6f68633d5476487752624f347172774158395969724744265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d3765306532353937643738333337373164336630323634646666613634643236266f653d3546323644313743),
('G6', 'Boxeo Rojas', 'https://www.google.com.mx/maps/place/GIMNASIO+DE+BOX+TOMAS+%22GUSANO%22+ROJAS/@19.1650756,-96.453255,10z/data=!4m8!1m2!2m1!1sboxeo+rojas!3m4!1s0x85c343ed25d01e69:0x93e0a4a62852d14!8m2!3d19.1650756!4d-96.1731036?hl=en&authuser=0', 's/n', 'GIMNASIO DE BOX TOMAS ', 'ninguno', 'Escuela de box de Tomas el Gusano Rojas', 0x68747470733a2f2f73636f6e74656e742e66766572322d312e666e612e666263646e2e6e65742f762f74312e302d392f37303032373339375f3634313438353933393539333832305f313734373430363039353735373836393035365f6f2e6a70673f5f6e635f6361743d313030265f6e635f7369643d303963626665265f6e635f6f68633d4b43744757675950644a6b41585f766251536f265f6e635f68743d73636f6e74656e742e66766572322d312e666e61266f683d6234656365353366633930666163343536643036316137643532613861393439266f653d3546323635314342);

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
(1, 'Campeonato estatal de boxeo', '2020-06-24', 'Se aproxima el campeonato estatal de boxeo olimpico de Veracruz Para más información da clic en la imagen.', 0x68747470733a2f2f696d67322e727476652e65732f692f3f773d3136303026693d313331363739363630363039362e6a7067),
(2, 'Apoya a esta causa', '2020-06-25', 'Solicitamos el apoyo para este gran boxeador peso gallo, para poder participar en las estatales.', 0x68747470733a2f2f656e637279707465642d74626e302e677374617469632e636f6d2f696d616765733f713d74626e253341414e64394763527046716d5f58676f3251497a656752433467695439392d55596e55343059523647446726757371703d434155),
(3, 'Asi relata esta gran boxeadora su vida arriba y fuera del ring', '2020-06-26', 'Su nombre es Emily Xochicale y su pasion siempre a sido el boxeo pero no a tenido una vida tan facil afuera del ring, se dedica a trabajar, estudiar y entrena en las noches en el gimnasio de su colonia, sin duda un ejemplo a seguir.', 0x68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6d756e646f2d6275636b65742d73332f77702d636f6e74656e742f75706c6f6164732f323031392f30392f30343038303031342f33342d3532313734312e6a7067),
(4, 'Por primera vez en la historia boxeadores profesionales podran participar en las olimpiadas.', '2020-06-27', 'Los Juegos Olímpicos Tokio 2020 y la posibilidad de que pugilistas profesionales participen en esa competencia reavivaron el diferendo entre los titulares del Consejo Mundial de Boxeo y de la Federación Mexicana de Box, Mauricio Sulaimán y Ricardo Conteras. El primero es tajante: de ninguna manera puede aceptarse que un boxeador profesional compita en esa justa; el segundo arguye que se hará todo lo posible para llevar a Japón la mejor delegación boxística de la historia y ganar medallas en esa disciplina.', 0x68747470733a2f2f696d672e766176656c2e636f6d2f682f3432393435305f6572726f6c2d7370656e63652d626f78696e672e6a7067),
(5, 'Boxeador peso welter con 0 derrotas hasta el momento.', '2020-06-28', 'El boxeador Saul a disputado 5 peleas seguidas sin derrota durante el campeonato estatal de boxeo', 0x68747470733a2f2f6530302d6d617263612e756563646e2e65732f6173736574732f6d756c74696d656469612f696d6167656e65732f323032302f30332f31302f31353833383334383537323437392e6a7067);

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