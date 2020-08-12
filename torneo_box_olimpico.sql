-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 06:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

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
  `id_boxeador` int(50) NOT NULL,
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
(1, '1', 'Pac Man', 'Emmanuel Dapidran Pacquiao', 71, 62, 39, 7, 3, 2, 'M', 'welter', 66, 1.66, 'Cotabato del Sur', 'General Santos City', 'ninguno', 'https://boxrec.com/media/images/thumb/f/fa/MannyPacquiao1.jpg/200px-MannyPacquiao1.jpg'),
(2, '1', 'Tank', 'Gervonta Davis', 23, 23, 22, 0, 0, 0, 'M', 'ligero', 62, 1.66, 'Maryland', 'Baltimore', NULL, 'https://boxrec.com/media/images/thumb/e/e6/643387.jpeg/200px-643387.jpeg'),
(3, '1', 'El Tornado de Tijuana', 'Antonio Margarito Montiel', 50, 41, 27, 8, 2, 0, 'M', 'welter', 74, 1.8, 'Baja California', 'Tijuana', NULL, 'https://boxrec.com/media/images/thumb/0/03/Antonio_margarito.jpg/200px-Antonio_margarito.jpg'),
(4, '1', 'Dinamita', 'Juan Manuel Márquez Méndez', 64, 56, 40, 7, 0, 1, 'M', 'pluma', 58, 1.7, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/1/15/Juan_Manuel_Marquez_Mendez.jpg/200px-Juan_Manuel_Marquez_Mendez.jpg'),
(5, '1', 'Canelo', 'Santos Saúl Álvarez Barragán', 56, 53, 36, 1, 0, 2, 'M', 'medio', 77, 1.73, 'Jalisco', 'Guadalajara', NULL, 'https://boxrec.com/media/images/thumb/7/74/Santos_Saul_Alvarez_Barragan1.jpg/200px-Santos_Saul_Alvarez_Barragan1.jpg'),
(6, '2', 'The Brockton Blockbuster', 'Rocco Francis Marchegiano', 49, 49, 43, 0, 0, 0, 'M', 'pesado', 91, 1.79, 'Massachusetts', 'Brockton', NULL, 'https://boxrec.com/media/images/thumb/f/fd/Gloved_RM.JPG/200px-Gloved_RM.JPG'),
(7, '2', 'Hi-Tech', 'Vasiliy Anatoliyovich Lomachenko', 15, 14, 10, 1, 0, 0, 'M', 'ligero', 63, 1.7, 'Dnistrovskyi', 'Bilhorod', NULL, 'https://boxrec.com/media/images/thumb/6/68/Vasyl_Lomachenko1.JPG/200px-Vasyl_Lomachenko1.JPG'),
(8, '2', 'El Brooklyn', 'Teofimo Andres Lopez', 15, 15, 12, 0, 0, 0, 'M', 'ligero', 62, 1.73, 'New York', 'Brooklyn', NULL, 'https://boxrec.com/media/images/thumb/c/c5/Teofimo_Lopez.JPG/200px-Teofimo_Lopez.JPG'),
(9, '2', 'Jaime Munguia', 'Jaime Munguia', 35, 35, 28, 0, 0, 0, 'M', 'medio', 78, 1.83, 'Baja California', 'Tijuana', NULL, 'https://boxrec.com/media/images/thumb/6/65/JaimeMunguia1.JPG/200px-JaimeMunguia1.JPG'),
(10, '2', 'El Gallo', 'Juan Francisco Estrada Romero', 43, 40, 27, 3, 0, 0, 'M', 'pluma', 59, 1.63, 'Sonora', 'Puerto Penasco', NULL, 'https://boxrec.com/media/images/thumb/7/75/467843.jpeg/200px-467843.jpeg'),
(11, '3', 'Gusano', 'Tomas Rojas Gomez', 72, 51, 34, 19, 4, 0, 'M', 'pluma', 59, 1.73, 'Veracruz', 'Veracruz', NULL, 'https://boxrec.com/media/images/thumb/a/a7/Clip_image008.jpg/200px-Clip_image008.jpg'),
(12, '3', 'Finito', 'Ricardo López Nava', 52, 51, 38, 0, 0, 1, 'M', 'minimosca', 48, 1.65, 'Morelos', 'Cuernavaca', NULL, 'https://boxrec.com/media/images/thumb/3/32/Viaja-finito-a-induccion-a-salon-de-la-fama.jpg/200px-Viaja-finito-a-induccion-a-salon-de-la-fama.jpg'),
(13, '3', 'El intocable', 'Nicolino Felipe Locche', 136, 117, 14, 4, 1, 14, 'M', 'ligero', 63, 1.68, 'Mendoza', 'Tunuyan', NULL, 'https://boxrec.com/media/images/thumb/6/62/Nicolino_Locche.jpg/200px-Nicolino_Locche.jpg'),
(14, '3', 'El Zurdo de Oro', 'Vicente Saldivar', 40, 37, 26, 3, 3, 0, 'M', 'pluma', 58, 1.6, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/1/18/Saldivar_Vicente.jpg/200px-Saldivar_Vicente.jpg'),
(15, '3', 'Golden Boy', 'Oscar de la Hoya', 45, 39, 30, 6, 2, 0, 'M', 'welter', 72, 1.85, 'California', 'Los Angeles', NULL, 'https://boxrec.com/media/images/thumb/2/2e/Oscar776823.jpg/200px-Oscar776823.jpg'),
(16, '4', 'Junito', 'Miguel Angel Cotto', 43, 32, 1, 11, 0, 0, 'M', 'mediano', 77, 1.71, 'Puerto Rico', 'Caguas', NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Miguel_Cotto.jpg/245px-Miguel_Cotto.jpg'),
(17, '4', 'Travieso', 'Jorge Arce', 75, 64, 49, 8, 5, 2, 'M', 'mini mosca', 49, 1.64, 'Sinaloa', 'Los Mochis', NULL, 'https://boxrec.com/media/images/thumb/0/03/Jorge_Arce1.jpg/200px-Jorge_Arce1.jpg'),
(18, '4', 'J.C.', 'Julio Cesar Chavez Gonzalez', 115, 107, 85, 6, 4, 2, 'M', 'ligero', 63, 1.71, 'Sonora', 'Ciudad Obregón', NULL, 'https://boxrec.com/media/images/thumb/4/40/Julio_Cesar_Chavez.jpg/200px-Julio_Cesar_Chavez.jpg'),
(19, '4', 'El Puas', 'Rubén Olivares Avila', 105, 89, 79, 13, 9, 3, 'M', 'gallo', 54, 1.66, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/3/33/Olivares.Ruben.jpg/200px-Olivares.Ruben.jpg'),
(20, '4', 'El Terrible', 'Erik Isaac Morales Elvira', 61, 52, 36, 9, 3, 0, 'M', 'gallo', 56, 1.73, 'California', 'San Ysidro', NULL, 'https://boxrec.com/media/images/thumb/d/dd/Erik_Isaac_Morales_Elvira.jpg/200px-Erik_Isaac_Morales_Elvira.jpg'),
(21, '5', 'Chava', 'Salvador Sánchez', 46, 44, 32, 1, 0, 1, 'M', 'pluma', 57, 1.68, 'México', 'Tianguistenco', NULL, 'https://boxrec.com/media/images/thumb/e/e6/Salvador_Sanchez.jpg/200px-Salvador_Sanchez.jpg'),
(22, '5', 'Baby Faced Assassin', 'Marco Antonio Barrera Tapia', 75, 67, 44, 7, 1, 0, 'M', 'gallo', 56, 1.68, 'Jalisco', 'Guadalajara', NULL, 'https://boxrec.com/media/images/thumb/5/50/MarcoBarrera.jpg/200px-MarcoBarrera.jpg'),
(23, '5', 'Baby Arizmendi', 'Alberto Arizmendi', 128, 87, 20, 26, 4, 14, 'M', 'pluma', 58, 1.64, 'Tamaulipas', 'Tampico', NULL, 'https://boxrec.com/media/images/thumb/e/e0/ArizmendiB.jpeg/200px-ArizmendiB.jpeg'),
(24, '5', 'Canas', 'Carlos Zárate ', 70, 66, 63, 4, 2, 0, 'M', 'gallo', 55, 1.73, 'Distrito Federal', 'Mexico City', NULL, 'https://boxrec.com/media/images/thumb/b/bf/Carlos_Zarate.jpg/200px-Carlos_Zarate.jpg'),
(25, '5', 'The Filipino Flash', 'Nonito Gonzales Donaire Jr', 46, 40, 26, 6, 1, 0, 'M', 'gallo', 56, 1.7, 'Bohol', 'Talibon', NULL, 'https://boxrec.com/media/images/thumb/b/b4/Nonito_Donaire.jpg/200px-Nonito_Donaire.jpg'),
(26, '6', 'The Greatest', 'Cassius Marcellus Clay', 61, 56, 37, 5, 1, 0, 'M', 'pesado', 91, 1.91, 'Kentucky', 'Louisville', NULL, 'https://boxrec.com/media/images/thumb/4/43/Ali_480938006.jpg/200px-Ali_480938006.jpg'),
(27, '6', 'Iron', 'Michael Gerard Tyson', 58, 50, 44, 6, 5, 0, 'M', 'pesado', 91, 1.78, 'New York', 'Brooklyn', NULL, 'https://boxrec.com/media/images/thumb/9/94/MikeTysonHeadshot2.jpg/200px-MikeTysonHeadshot2.jpg'),
(28, '6', 'Money Pretty Boy', 'Floyd Joy Sinclair', 50, 50, 27, 0, 0, 0, 'M', 'welter', 72, 1.73, 'Michigan', 'Grand Rapids', NULL, 'https://boxrec.com/media/images/thumb/1/1a/FloydMayweatherHeadshot3.jpg/200px-FloydMayweatherHeadshot3.jpg'),
(29, '6', 'Manos de Piedra / El Cholo', 'Roberto Duran Samaniego', 119, 103, 70, 16, 4, 0, 'M', 'ligero', 62, 1.7, 'Panama', 'El Chorrillo', NULL, 'https://boxrec.com/media/images/thumb/9/9c/Roberto_Duran1.JPG/200px-Roberto_Duran1.JPG'),
(30, '6', 'Kingry \r\n The Flash', 'Ryan Garcia', 20, 20, 17, 0, 0, 0, 'M', 'ligero', 62, 1.78, 'California', 'Los Angeles', NULL, 'https://boxrec.com/media/images/thumb/0/07/RyanGarcia.jpg/200px-RyanGarcia.jpg'),
(31, '1', 'Old man', 'Lucas', 4, 4, 4, 4, 4, 4, 'M', 'welter', 14, 147, 'xalapa', 'xalapa', 'xalapa', 'https://boxrec.com/media/images/thumb/f/fa/MannyPacquiao1.jpg/200px-MannyPacquiao1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gimnasio`
--

CREATE TABLE `gimnasio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(300) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gimnasio`
--

INSERT INTO `gimnasio` (`id`, `nombre`, `ubicacion`, `telefono`, `facebook`, `email`, `descripcion`, `foto`) VALUES
(1, 'DECA', 'https://www.google.com.mx/maps/place/Campo+Deportivo+Adolfo+Lopez+Mateos/@19.4968874,-96.9846754,13z/data=!4m8!1m2!2m1!1sCoatepec+ver+gimnasio+adolfo+lopez+mateo!3m4!1s0x85db2cdefd93b181:0xb299afcfde3f728e!8m2!3d19.4551188!4d-96.9661799?hl=en&authuser=0', '228 257 6388', 'DECA Deporte de calidad', 'decacoatepec@hotmail.com', 'Deporte de Calidad (DECA) es una iniciativa creada para organizar y realizar eventos en fomento y mejora del deporte.', 'https://scontent.fver2-1.fna.fbcdn.net/v/t1.0-9/14344929_122043848256029_4405021841722016663_n.jpg?_nc_cat=109&_nc_sid=09cbfe&_nc_ohc=oPtnzAZ6mR8AX9SGqtv&_nc_ht=scontent.fver2-1.fna&oh=41d0e4cc54e8de5b624213c9a30aeed1&oe=5F4C3C89'),
(2, 'KNOCKOUT', 'https://www.google.com.mx/maps/place/Gimnasio+Knockout/@19.5429518,-96.9398053,17z/data=!3m1!4b1!4m5!3m4!1s0x85db2e1280c42a6b:0x62fc736024fb53a!8m2!3d19.5429518!4d-96.9398053?hl=en&authuser=0', '228 112 5470', 'Boxeo Knockout', 'nockout@gmail.com', 'Equipo deportivo', 'https://scontent.fver2-1.fna.fbcdn.net/v/t1.0-9/10583950_1591330294426945_8978507321869844678_n.jpg?_nc_cat=109&_nc_sid=09cbfe&_nc_ohc=ZGxGJmEOmGwAX-eq8Ka&_nc_ht=scontent.fver2-1.fna&oh=401b25ef2b077c60dbaf59578b466324&oe=5F4DCB53'),
(3, 'Leones', 'https://www.google.com.mx/maps/place/Velodromo+Internacional+Xalapa/@19.5102922,-96.928647,17z/data=!4m5!3m4!1s0x85db2df2fdb0a561:0xa74bdbebe5232fe4!8m2!3d19.5102922!4d-96.928647?hl=en&authuser=0', 's/n', 'Leones Xalapa', 'leonesxalapa@outlook.es', 'Equipo deportivo de aficionados', 'https://scontent-qro1-1.xx.fbcdn.net/v/t1.0-9/53050650_391671104761585_2319697233680793600_n.jpg?_nc_cat=103&_nc_sid=09cbfe&_nc_ohc=M3Aze4x7cQIAX_6RoHS&_nc_ht=scontent-qro1-1.xx&oh=c7bc62a2b0a7aac59aa46c82c183918f&oe=5F53FD3E'),
(4, 'Sparring Boxing Club', 'https://www.google.com.mx/maps/place/Sparring+Boxing+Club/@19.528234,-96.8950183,17z/data=!3m1!4b1!4m5!3m4!1s0x85db322139a0ca7f:0x171560e90ccae6c0!8m2!3d19.528234!4d-96.8950183?hl=en&authuser=0', '228 180 2668', 'Sparring Boxing Club', 'sparringboxingclub@gmail.com', 'Gimnasio para la práctica del boxeo, en el cual mejorarás tu condición física, desarrollarás habilidades y reducirás de peso.', 'https://scontent-qro1-1.xx.fbcdn.net/v/t31.0-8/16107104_1282266461832842_1436045849957983601_o.jpg?_nc_cat=107&_nc_sid=09cbfe&_nc_ohc=MoV-NDzLQmYAX8b4F0Y&_nc_ht=scontent-qro1-1.xx&oh=78380d43c3ec5242bc09f0810a18b599&oe=5F542202'),
(5, 'Ultimate boxing club', 'https://www.google.com.mx/maps/place/UBC/@19.5413901,-96.9269425,15z/data=!4m8!1m2!2m1!1sultimate+boxing+club+xalapa+ver!3m4!1s0x85db31fce28ff8c1:0xd2c9fbb9cd42b464!8m2!3d19.5413901!4d-96.9181878?hl=en&authuser=0', '228 243 1365', 'Ultimate boxing club', 'adan.boxingcoach@hotmail.com', 'centro deportivo: preparación física para deportistas, escuela de boxeo amateur, olímpico, recreativo, rehabilitación deportiva, vendaje neuromuscular.', 'https://scontent-qro1-1.xx.fbcdn.net/v/t1.0-9/93118477_1572105486281272_7551123290341769216_o.jpg?_nc_cat=109&_nc_sid=09cbfe&_nc_ohc=_rFTOXBV6VwAX9-Rcb3&_nc_ht=scontent-qro1-1.xx&oh=966ba59d0e2b5decddc02a2c02d98311&oe=5F5252FC'),
(6, 'Boxeo Rojas', 'https://www.google.com.mx/maps/place/GIMNASIO+DE+BOX+TOMAS+%22GUSANO%22+ROJAS/@19.1650756,-96.453255,10z/data=!4m8!1m2!2m1!1sboxeo+rojas!3m4!1s0x85c343ed25d01e69:0x93e0a4a62852d14!8m2!3d19.1650756!4d-96.1731036?hl=en&authuser=0', 's/n', 'GIMNASIO DE BOX TOMAS ', 'ninguno', 'Escuela de box de Tomas el Gusano Rojas', 'https://scontent-qro1-1.xx.fbcdn.net/v/t1.0-9/70027397_641485939593820_1747406095757869056_o.jpg?_nc_cat=100&_nc_sid=09cbfe&_nc_ohc=B_dh5IqUKx4AX91NpR7&_nc_ht=scontent-qro1-1.xx&oh=ecd5796acce7f65d9dc77cca2816d0fe&oe=5F51D34B');

-- --------------------------------------------------------

--
-- Table structure for table `jueces`
--

CREATE TABLE `jueces` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jueces`
--

INSERT INTO `jueces` (`id`, `nombre`, `usuario`, `contrasena`, `foto`) VALUES
(1, 'Andres Sanchez', 'andresSanchez', '$2y$10$Qh0L8blcdmS8LCUQptDBIeR.tPTrRRJMIFbNCr6YzMUkAyayLJTGu', 'https://cdn4.iconfinder.com/data/icons/free-large-boss-icon-set/512/Security.png'),
(2, 'Beto Garcia', 'betoGarcia', '$2y$10$EkUrMhZ55izkS9grV7SLBuiuXYxitOo8DcanCi0RggWI85nGkAZxS', 'https://cdn4.iconfinder.com/data/icons/free-large-boss-icon-set/512/Security.png'),
(3, 'Carlos Gonzalez', 'carlosGonzalez', '$2y$10$qPprP0G2HKxFZnhHGCbrYe.7g7eo5hS8QlJ1Tj5wqesQgALmeJVZ2', 'https://cdn4.iconfinder.com/data/icons/free-large-boss-icon-set/512/Security.png'),
(4, 'Daniel Martinez', 'danielMartinez', '$2y$10$2DLmiMe7SP07/Ijs6pRhSOh5ociWsho0G3bjt5Qn9XlUchN24K0eW', 'https://cdn4.iconfinder.com/data/icons/free-large-boss-icon-set/512/Security.png');

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
(1, 'Campeonato estatal de boxeo', '2020-06-24', 'Se aproxima el campeonato estatal de boxeo olimpico de Veracruz.', 0x68747470733a2f2f696d67322e727476652e65732f692f3f773d3136303026693d313331363739363630363039362e6a7067),
(2, 'Apoya a esta causa', '2020-06-25', 'Solicitamos el apoyo para este gran boxeador peso mosca, para poder participar en las estatales.', 0x68747470733a2f2f7330332e7333632e65732f696d61672f5f76302f373730783432302f612f362f652f7461696c616e6469612d626f78656f2d6e696e6f2d726575746572732d322e6a7067),
(3, 'Asi relata esta gran boxeadora su vida arriba y fuera del ring', '2020-06-26', 'Su nombre es Emily Xochicale y su pasion siempre a sido el boxeo pero no a tenido una vida tan facil afuera del ring, se dedica a trabajar, estudiar y entrena en las noches en el gimnasio de su colonia, sin duda un ejemplo a seguir.', 0x68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6d756e646f2d6275636b65742d73332f77702d636f6e74656e742f75706c6f6164732f323031392f30392f30343038303031342f33342d3532313734312e6a7067),
(4, 'Por primera vez en la historia boxeadores profesionales podran participar en las olimpiadas.', '2020-06-27', 'Los Juegos Olímpicos Tokio 2020 y la posibilidad de que pugilistas profesionales participen en esa competencia reavivaron el diferendo entre los titulares del Consejo Mundial de Boxeo y de la Federación Mexicana de Box, Mauricio Sulaimán y Ricardo Conteras. El primero es tajante: de ninguna manera puede aceptarse que un boxeador profesional compita en esa justa; el segundo arguye que se hará todo lo posible para llevar a Japón la mejor delegación boxística de la historia y ganar medallas en esa disciplina.', 0x68747470733a2f2f696d672e766176656c2e636f6d2f682f3432393435305f6572726f6c2d7370656e63652d626f78696e672e6a7067),
(5, 'Boxeador peso welter con 0 derrotas hasta el momento.', '2020-06-28', 'El boxeador Saul a disputado 5 peleas seguidas sin derrota durante el campeonato estatal de boxeo', 0x68747470733a2f2f63646e2d332e657870616e73696f6e2e6d782f64696d73342f64656661756c742f323563366235322f323134373438333634372f73747269702f747275652f63726f702f353231783239372b302b302f726573697a652f313830307831303236212f7175616c6974792f39302f3f75726c3d68747470732533412532462532466368657272792d62726967687473706f742e73332e616d617a6f6e6177732e636f6d2532463539253246643425324662656663353931393432376338396663326666313065356632373261253246636170747572612d64652d70616e74616c6c612d323031362d30382d31372d612d6c61732d382e35312e3533253230612e6d2e2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `peleas_estatales`
--

CREATE TABLE `peleas_estatales` (
  `id` int(11) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  `division` varchar(50) NOT NULL,
  `id_juez1` varchar(50) NOT NULL,
  `id_juez2` varchar(50) NOT NULL,
  `id_juez3` varchar(50) NOT NULL,
  `id_juez4` varchar(50) NOT NULL,
  `id_boxeador1` varchar(50) NOT NULL,
  `id_boxeador2` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ganador` varchar(100) DEFAULT NULL,
  `foto_pelea` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peleas_estatales`
--

INSERT INTO `peleas_estatales` (`id`, `categoria`, `division`, `id_juez1`, `id_juez2`, `id_juez3`, `id_juez4`, `id_boxeador1`, `id_boxeador2`, `fecha`, `hora`, `ganador`, `foto_pelea`) VALUES
(3, 'F', 'gallo', 'Andres Sanchez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'Barby', 'Bonita', '2020-08-03', '23:00:00', 'ninguno', 'https://mis-juegos-olimpicos.com/wp-content/uploads/2016/02/boxeo-londres.jpg'),
(4, 'F', 'pluma', 'Andres Sanchez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'Areli Garcia', 'Brenda Hernández', '2020-08-10', '13:00:00', 'ninguno', 'https://elsuperhincha.com/wp-content/uploads/2020/02/boxeo-femenino.jpg'),
(5, 'F', 'mosca', 'Andres Sanchez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'Carla Sosa', 'Daniela Martinez', '2020-08-28', '12:00:00', 'ninguno', 'https://www.elsoldetijuana.com.mx/deportes/lybany-crisna-alvarez/ALTERNATES/LANDSCAPE_960/Crisna%20%C3%81lvarez');

-- --------------------------------------------------------

--
-- Table structure for table `peleas_municipales`
--

CREATE TABLE `peleas_municipales` (
  `id` int(11) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  `division` varchar(50) NOT NULL,
  `id_juez1` varchar(50) NOT NULL,
  `id_juez2` varchar(50) NOT NULL,
  `id_juez3` varchar(50) NOT NULL,
  `id_juez4` varchar(50) NOT NULL,
  `id_boxeador1` varchar(50) NOT NULL,
  `id_boxeador2` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ganador` varchar(100) NOT NULL,
  `foto_pelea` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peleas_municipales`
--

INSERT INTO `peleas_municipales` (`id`, `categoria`, `division`, `id_juez1`, `id_juez2`, `id_juez3`, `id_juez4`, `id_boxeador1`, `id_boxeador2`, `fecha`, `hora`, `ganador`, `foto_pelea`) VALUES
(1, 'M', 'minimosca', 'Carlos Gonzalez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'Tank', 'Jaime Munguia', '2020-07-10', '12:00:00', 'ninguno', 'https://i.ytimg.com/vi/6bHkvS3g5kY/maxresdefault.jpg'),
(3, 'M', 'ligero', 'Andres Sanchez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'Kingry  The Flash', 'Tank', '2020-08-01', '22:00:00', 'Kingry  The Flash', 'https://i.ytimg.com/vi/5UFfFlnprGc/maxresdefault.jpg'),
(4, 'M', 'ligero', 'Andres Sanchez', 'Beto Garcia', 'Carlos Gonzalez', 'Daniel Martinez', 'El Brooklyn', 'Hi-Tech', '2020-08-02', '23:00:00', 'ninguno', 'https://e00-us-marca.uecdn.es/claro/assets/multimedia/imagenes/2020/01/09/15786037991462.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posiciones_generales_estatales`
--

CREATE TABLE `posiciones_generales_estatales` (
  `id` int(11) NOT NULL,
  `alias_boxeador` varchar(100) NOT NULL,
  `gimnasio` varchar(50) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  `division` varchar(50) NOT NULL,
  `peleas_ganadas` int(11) NOT NULL,
  `peleas_perdidas` int(11) NOT NULL,
  `empates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posiciones_generales_estatales`
--

INSERT INTO `posiciones_generales_estatales` (`id`, `alias_boxeador`, `gimnasio`, `categoria`, `division`, `peleas_ganadas`, `peleas_perdidas`, `empates`) VALUES
(1, 'Pac man', 'DECA', 'M', 'welter', 1, 0, 0),
(2, 'Tank', 'DECA', 'M', 'ligero', 2, 0, 0),
(3, 'Dinamita', 'DECA', 'M', 'pluma', 3, 1, 1),
(4, 'Canelo', 'NOCKOUT', 'M', 'medio', 4, 1, 0),
(5, 'Finito', 'Leones', 'M', 'minimosca', 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posiciones_generales_municipales`
--

CREATE TABLE `posiciones_generales_municipales` (
  `id` int(11) NOT NULL,
  `alias_boxeador` varchar(100) NOT NULL,
  `gimnasio` varchar(50) NOT NULL,
  `categoria` varchar(1) NOT NULL,
  `division` varchar(50) NOT NULL,
  `peleas_ganadas` int(11) NOT NULL,
  `peleas_perdidas` int(11) NOT NULL,
  `empates` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posiciones_generales_municipales`
--

INSERT INTO `posiciones_generales_municipales` (`id`, `alias_boxeador`, `gimnasio`, `categoria`, `division`, `peleas_ganadas`, `peleas_perdidas`, `empates`) VALUES
(1, 'El Terrible', 'Sparring Boxing Club', 'M', 'pesado', 8, 2, 1),
(2, 'Tank', 'DECA', 'M', 'minimosca', 7, 0, 0),
(3, 'Dinamita', 'DECA', 'M', 'pluma', 3, 1, 1),
(4, 'Canelo', 'NOCKOUT', 'M', 'medio', 4, 1, 0),
(5, 'Finito', 'Leones', 'M', 'minimosca', 5, 0, 1),
(6, 'El Gallo', 'Leones', 'M', 'gallo', 4, 2, 1);

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
  `ganador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabla_de_pelea`
--

INSERT INTO `tabla_de_pelea` (`id`, `id_juez`, `id_pelea`, `id_boxeador`, `round1`, `round2`, `round3`, `round4`, `round5`, `round6`, `round7`, `round8`, `round9`, `round10`, `round11`, `round12`, `total_puntos`, `num_jabs`, `num_power`, `total_golpes`, `ganador`) VALUES
(1, 'Carlos Gonzalez', 1, 'Money Pretty Boy', 9, 9, 10, 10, 9, 10, 10, 9, 10, 9, 10, 9, 111, 153, 98, 255, 0),
(2, '1', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(3, '2', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(4, '2', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(5, '3', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(6, '3', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(7, '4', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(8, '4', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabla_de_pelea_estatal`
--

CREATE TABLE `tabla_de_pelea_estatal` (
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
  `ganador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabla_de_pelea_estatal`
--

INSERT INTO `tabla_de_pelea_estatal` (`id`, `id_juez`, `id_pelea`, `id_boxeador`, `round1`, `round2`, `round3`, `round4`, `round5`, `round6`, `round7`, `round8`, `round9`, `round10`, `round11`, `round12`, `total_puntos`, `num_jabs`, `num_power`, `total_golpes`, `ganador`) VALUES
(1, '1', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(2, '1', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(3, '2', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(4, '2', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(5, '3', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(6, '3', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0),
(7, '4', 1, 'Money Pretty Boy', 10, 10, 10, 9, 10, 9, 10, 9, 10, 9, 10, 9, 115, 150, 100, 250, 1),
(8, '4', 1, 'Pac Man', 9, 9, 9, 10, 9, 10, 9, 10, 9, 10, 9, 10, 113, 100, 80, 180, 0);

--
-- Indexes for dumped tables
--
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `apellido` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `cargo` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `cargo`, `password`) VALUES
(1, 'leo', 'Leonardo', 'Galicia', 'Administrador', '123'),
(2, 'pablo', 'Pablo', 'Luis', 'Usuario', '159'),
(3, 'law', 'Lawrense', 'la', 'Juez', '147'),
(4, 'drako', 'Drako', 'dragon', 'Administrador', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- Indexes for table `peleas_estatales`
--
ALTER TABLE `peleas_estatales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peleas_municipales`
--
ALTER TABLE `peleas_municipales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posiciones_generales_estatales`
--
ALTER TABLE `posiciones_generales_estatales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posiciones_generales_municipales`
--
ALTER TABLE `posiciones_generales_municipales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabla_de_pelea`
--
ALTER TABLE `tabla_de_pelea`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabla_de_pelea_estatal`
--
ALTER TABLE `tabla_de_pelea_estatal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boxeadores`
--
ALTER TABLE `boxeadores`
  MODIFY `id_boxeador` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gimnasio`
--
ALTER TABLE `gimnasio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jueces`
--
ALTER TABLE `jueces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peleas_estatales`
--
ALTER TABLE `peleas_estatales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peleas_municipales`
--
ALTER TABLE `peleas_municipales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posiciones_generales_estatales`
--
ALTER TABLE `posiciones_generales_estatales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posiciones_generales_municipales`
--
ALTER TABLE `posiciones_generales_municipales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tabla_de_pelea`
--
ALTER TABLE `tabla_de_pelea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tabla_de_pelea_estatal`
--
ALTER TABLE `tabla_de_pelea_estatal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
