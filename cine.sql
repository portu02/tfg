-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2023 a las 20:36:20
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

CREATE TABLE `butaca` (
  `id_butaca` smallint(6) NOT NULL,
  `columna` smallint(6) NOT NULL,
  `fila` smallint(6) NOT NULL,
  `color` enum('Verde','Rojo','Gris') COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_sala` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`id_butaca`, `columna`, `fila`, `color`, `id_sala`) VALUES
(558, 1, 1, 'Verde', 24),
(559, 2, 1, 'Verde', 24),
(560, 5, 1, 'Verde', 24),
(561, 6, 1, 'Verde', 24),
(562, 9, 1, 'Verde', 24),
(563, 10, 1, 'Verde', 24),
(564, 1, 2, 'Verde', 24),
(565, 2, 2, 'Rojo', 24),
(566, 5, 2, 'Verde', 24),
(567, 6, 2, 'Verde', 24),
(568, 9, 2, 'Verde', 24),
(569, 10, 2, 'Verde', 24),
(570, 1, 3, 'Verde', 24),
(571, 2, 3, 'Verde', 24),
(572, 5, 3, 'Verde', 24),
(573, 6, 3, 'Verde', 24),
(574, 9, 3, 'Verde', 24),
(575, 10, 3, 'Verde', 24),
(576, 1, 4, 'Verde', 24),
(577, 2, 4, 'Verde', 24),
(578, 5, 4, 'Verde', 24),
(579, 6, 4, 'Verde', 24),
(580, 9, 4, 'Verde', 24),
(581, 10, 4, 'Verde', 24),
(582, 1, 5, 'Verde', 24),
(583, 2, 5, 'Verde', 24),
(584, 5, 5, 'Verde', 24),
(585, 6, 5, 'Verde', 24),
(586, 9, 5, 'Verde', 24),
(587, 10, 5, 'Verde', 24),
(588, 1, 6, 'Verde', 24),
(589, 2, 6, 'Verde', 24),
(590, 5, 6, 'Verde', 24),
(591, 6, 6, 'Gris', 24),
(592, 9, 6, 'Verde', 24),
(593, 10, 6, 'Verde', 24),
(594, 1, 7, 'Verde', 24),
(595, 2, 7, 'Verde', 24),
(596, 5, 7, 'Verde', 24),
(597, 6, 7, 'Verde', 24),
(598, 9, 7, 'Verde', 24),
(599, 10, 7, 'Verde', 24),
(600, 1, 8, 'Verde', 24),
(601, 2, 8, 'Verde', 24),
(602, 5, 8, 'Verde', 24),
(603, 6, 8, 'Verde', 24),
(604, 9, 8, 'Verde', 24),
(605, 10, 8, 'Verde', 24),
(606, 1, 9, 'Verde', 24),
(607, 2, 9, 'Verde', 24),
(608, 5, 9, 'Verde', 24),
(609, 6, 9, 'Verde', 24),
(610, 9, 9, 'Verde', 24),
(611, 10, 9, 'Verde', 24),
(612, 1, 10, 'Verde', 24),
(613, 2, 10, 'Verde', 24),
(614, 3, 10, 'Verde', 24),
(615, 4, 10, 'Verde', 24),
(616, 5, 10, 'Verde', 24),
(617, 6, 10, 'Verde', 24),
(618, 7, 10, 'Verde', 24),
(619, 8, 10, 'Verde', 24),
(620, 9, 10, 'Verde', 24),
(621, 10, 10, 'Verde', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` smallint(6) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_pelicula` smallint(6) NOT NULL,
  `id_sala` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `fecha`, `hora`, `id_pelicula`, `id_sala`) VALUES
(495, '2023-04-09', '16:00:00', 8, 1),
(496, '2023-04-09', '19:00:00', 17, 1),
(497, '2023-04-09', '21:00:00', 19, 1),
(498, '2023-04-09', '16:00:00', 1, 2),
(499, '2023-04-09', '18:00:00', 8, 2),
(500, '2023-04-09', '21:00:00', 13, 2),
(501, '2023-04-09', '16:00:00', 9, 3),
(502, '2023-04-09', '18:00:00', 11, 3),
(503, '2023-04-09', '20:00:00', 4, 3),
(504, '2023-04-09', '22:00:00', 18, 3),
(505, '2023-04-09', '16:00:00', 14, 4),
(506, '2023-04-09', '18:00:00', 19, 4),
(507, '2023-04-09', '20:00:00', 6, 4),
(508, '2023-04-09', '22:00:00', 2, 4),
(509, '2023-04-10', '16:00:00', 5, 1),
(510, '2023-04-10', '18:00:00', 3, 1),
(511, '2023-04-10', '20:00:00', 14, 1),
(512, '2023-04-10', '22:00:00', 17, 1),
(513, '2023-04-10', '16:00:00', 6, 2),
(514, '2023-04-10', '18:00:00', 12, 2),
(515, '2023-04-10', '21:00:00', 18, 2),
(516, '2023-04-10', '16:00:00', 1, 3),
(517, '2023-04-10', '18:00:00', 11, 3),
(518, '2023-04-10', '20:00:00', 8, 3),
(519, '2023-04-10', '16:00:00', 18, 4),
(520, '2023-04-10', '19:00:00', 5, 4),
(521, '2023-04-10', '21:00:00', 12, 4),
(522, '2023-04-11', '16:00:00', 6, 1),
(523, '2023-04-11', '18:00:00', 8, 1),
(524, '2023-04-11', '21:00:00', 12, 1),
(525, '2023-04-11', '16:00:00', 8, 2),
(526, '2023-04-11', '19:00:00', 8, 2),
(527, '2023-04-11', '22:00:00', 7, 2),
(528, '2023-04-11', '16:00:00', 4, 3),
(529, '2023-04-11', '18:00:00', 8, 3),
(530, '2023-04-11', '21:00:00', 7, 3),
(531, '2023-04-11', '16:00:00', 4, 4),
(532, '2023-04-11', '18:00:00', 11, 4),
(533, '2023-04-11', '20:00:00', 13, 4),
(534, '2023-04-11', '22:00:00', 18, 4),
(535, '2023-04-12', '16:00:00', 8, 1),
(536, '2023-04-12', '19:00:00', 14, 1),
(537, '2023-04-12', '21:00:00', 13, 1),
(538, '2023-04-12', '16:00:00', 10, 2),
(539, '2023-04-12', '18:00:00', 12, 2),
(540, '2023-04-12', '21:00:00', 19, 2),
(541, '2023-04-12', '16:00:00', 11, 3),
(542, '2023-04-12', '18:00:00', 2, 3),
(543, '2023-04-12', '20:00:00', 20, 3),
(544, '2023-04-12', '22:00:00', 13, 3),
(545, '2023-04-12', '16:00:00', 18, 4),
(546, '2023-04-12', '19:00:00', 11, 4),
(547, '2023-04-12', '21:00:00', 5, 4),
(548, '2023-04-13', '16:00:00', 10, 1),
(549, '2023-04-13', '18:00:00', 14, 1),
(550, '2023-04-13', '20:00:00', 10, 1),
(551, '2023-04-13', '22:00:00', 1, 1),
(552, '2023-04-13', '16:00:00', 7, 2),
(553, '2023-04-13', '18:00:00', 20, 2),
(554, '2023-04-13', '20:00:00', 15, 2),
(555, '2023-04-13', '22:00:00', 2, 2),
(556, '2023-04-13', '16:00:00', 7, 3),
(557, '2023-04-13', '18:00:00', 9, 3),
(558, '2023-04-13', '20:00:00', 17, 3),
(559, '2023-04-13', '22:00:00', 14, 3),
(560, '2023-04-13', '16:00:00', 15, 4),
(561, '2023-04-13', '18:00:00', 8, 4),
(562, '2023-04-13', '21:00:00', 11, 4),
(563, '2023-04-14', '16:00:00', 17, 1),
(564, '2023-04-14', '18:00:00', 6, 1),
(565, '2023-04-14', '20:00:00', 19, 1),
(566, '2023-04-14', '22:00:00', 14, 1),
(567, '2023-04-14', '16:00:00', 13, 2),
(568, '2023-04-14', '18:00:00', 12, 2),
(569, '2023-04-14', '21:00:00', 12, 2),
(570, '2023-04-14', '16:00:00', 5, 3),
(571, '2023-04-14', '18:00:00', 12, 3),
(572, '2023-04-14', '21:00:00', 8, 3),
(573, '2023-04-14', '16:00:00', 17, 4),
(574, '2023-04-14', '18:00:00', 3, 4),
(575, '2023-04-14', '20:00:00', 2, 4),
(576, '2023-04-14', '22:00:00', 3, 4),
(577, '2023-04-15', '16:00:00', 15, 1),
(578, '2023-04-15', '18:00:00', 20, 1),
(579, '2023-04-15', '20:00:00', 7, 1),
(580, '2023-04-15', '22:00:00', 8, 1),
(581, '2023-04-15', '16:00:00', 8, 2),
(582, '2023-04-15', '19:00:00', 20, 2),
(583, '2023-04-15', '21:00:00', 1, 2),
(584, '2023-04-15', '16:00:00', 17, 3),
(585, '2023-04-15', '18:00:00', 8, 3),
(586, '2023-04-15', '21:00:00', 8, 3),
(587, '2023-04-15', '16:00:00', 7, 4),
(588, '2023-04-15', '18:00:00', 16, 4),
(589, '2023-04-15', '20:00:00', 11, 4),
(590, '2023-04-15', '22:00:00', 1, 4),
(591, '2023-04-16', '16:00:00', 5, 1),
(592, '2023-04-16', '18:00:00', 11, 1),
(593, '2023-04-16', '20:00:00', 9, 1),
(594, '2023-04-16', '22:00:00', 3, 1),
(595, '2023-04-16', '16:00:00', 11, 2),
(596, '2023-04-16', '18:00:00', 6, 2),
(597, '2023-04-16', '20:00:00', 4, 2),
(598, '2023-04-16', '22:00:00', 4, 2),
(599, '2023-04-16', '16:00:00', 5, 3),
(600, '2023-04-16', '18:00:00', 9, 3),
(601, '2023-04-16', '20:00:00', 18, 3),
(602, '2023-04-16', '16:00:00', 13, 4),
(603, '2023-04-16', '18:00:00', 9, 4),
(604, '2023-04-16', '20:00:00', 10, 4),
(605, '2023-04-16', '22:00:00', 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` smallint(6) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sinopsis` varchar(2000) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `duracion` smallint(6) NOT NULL,
  `url` varchar(1000) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clasificacion` enum('TP','+7','+12','+16','+18') COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria` enum('Acción','Aventuras','Ciencia Ficción','Comedia','No-Ficción','Drama','Documental','Fantasía','Musical','Suspense','Terror','Thriller','Animación','Infantil') COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_estreno` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `nombre`, `imagen`, `sinopsis`, `duracion`, `url`, `clasificacion`, `categoria`, `fecha_estreno`) VALUES
(1, 'Ocho apellidos vascos', 'ocho_apellidos.jpg', 'Rafa, un señorito andaluz que nunca ha salido de Sevilla, decide dejarlo todo para conquistar a Amaia, una chica vasca. Se muda al País Vasco y allí tendrá que adaptarse a un nuevo entorno y hacerse pasar por vasco para ganarse la aprobación del padre de Amaia.', 98, 'YfopzNHLp4o', 'TP', 'Comedia', '2014-03-14'),
(2, 'Oso Vicioso', 'oso_vicioso.jpg', 'Un varipinto grupo formado por policias, delincuentes, turistas y adolescentes converge en un bosque de Georgia donde un oso negro de 500 libras se vuelve loco después de ingerir cocaina sin querer, que cayo del avión de un narcotraficante.', 95, 'CvYGl5BESEI', '+16', 'Comedia', '2023-04-05'),
(3, 'Super Mario Bros', 'mario_bros.jpg', 'Adaptación de la serie de videojuegos de Nintendo. La película cuenta la historia de Mario y Luigi, dos hermanos que viajan a un mundo oculto para rescatar a la Princesa Peach, capturada por el malvado Rey Bowser. Las cosas, sin embargo no serán sencillas. Mario y Luigi tendrán que enfrentarse a un ejército de setas animadas antes de luchar contra su oponente. Rutas de ladrillos y castillos con múltiples peligros serán algunos de los obstáculos que los hermanos tendrán que superar para conseguir su objetivo.', 92, 'AevYlpcndXQ', 'TP', 'Aventuras', '2023-04-05'),
(4, 'Dungeons & Dragons: Honor entre ladrones', 'dungeons_&_dragons.jpg', 'Adaptación cinematográfica del primer juego de rol de la historia, publicado por primera vez en 1974. Un ladrón encantador y una banda de aventureros increíbles emprenden un atraco épico para recuperar una reliquia perdida, pero las cosas salen rematadamente mal cuando se topan con las personas equivocadas.', 134, 'YgB324ne4Ek', '+12', 'Aventuras', '2023-03-31'),
(5, 'Tin & Tina', 'Tin_&_Tina.jpg', 'Cuando Lola pierde los bebés que estaba esperando, también pierde su fe en Dios. Con la esperanza de recuperarla, acude junto a su marido Adolfo a un convento de monjas donde conocen a Tin y Tina, dos angelicales hermanos de siete años por los que Lola se siente extrañamente atraída. Aunque Adolfo no siente lo mismo, deciden adoptarlos. Con el paso del tiempo Lola empieza a caer en una espiral de sospecha y obsesión con los niños y sus macabros juegos religiosos.', 119, 'Cz7kTfxAEJE', '+16', 'Terror', '2023-03-31'),
(6, '65', '65.jpg', 'Después de un catastrófico accidente en un planeta desconocido, el piloto Mills (Adam Driver) descubre rápidamente que realmente está varado en la Tierra… hace 65 millones de años. Ahora, con solo una oportunidad de rescate, Mills y la otra única superviviente, Koa (Ariana Greenblatt), deberán abrirse camino a través del desconocido territorio plagado con peligrosas criaturas prehistóricas en una épica lucha por sobrevivir.', 93, 'YeKgkbYSUhA', '+16', 'Ciencia Ficción', '2023-03-24'),
(7, 'El hotel de los líos. García y García 2', 'el_hotel.jpg', 'Tras hacerse cargo de un hotelito destartalado, comprado por error en una subasta por un precio desorbitado, los dos Javier García viven una nueva aventura, ayudados esta vez, muy a su pesar, por un grupo de niños superdotados que se alojan en el hotel para asistir a la Final Nacional de Talentos. Junto a su explosiva profe, Martina, los niños se enfrentarán al mafioso Benito Camarena, que con sus secuaces - su madre y su hermano - tratarán de arrebatar a los García el botín escondido en el hotel, antigua guarida de los facinerosos. Spin-off de \'García y García\' (2021).', 95, 'lBW4smfROyQ', 'TP', 'Comedia', '2023-03-24'),
(8, 'John Wick 4', 'John_Wick.jpg', 'John Wick, legendario asesino retirado, vuelve de nuevo a la acción impulsado por una incontrolable búsqueda de venganza. Al tener que luchar contra asesinos sedientos de sangre que le persiguen, John tendrá que llevar sus habilidades al límite si quiere salir esta vez con vida.', 169, 'L0anWmmd8TI', '+12', 'Acción', '2023-03-24'),
(9, 'Scream VI', 'Scream_VI.jpg', 'Tras los últimos asesinatos de Ghostface, los cuatro supervivientes abandonan Woodsboro para dar comienzo a un nuevo capítulo en la ciudad de Nueva York.', 122, 'ECc_KdCZ8-I', '+16', 'Terror', '2023-03-10'),
(10, 'Mari(dos)', 'Mari(dos).jpg', 'Toni (Paco León) y Emilio (Ernesto Alterio) reciben la misma trágica llamada: sus mujeres están en coma tras un alud en una estación de esquí. Cuando se presentan en el mostrador de admisiones del hospital de montaña hacen un sorprendente descubrimiento: sus mujeres son, en realidad, la misma persona, Laura (Celia Freijeiro). Durante años, Laura ha llevado en secreto vidas paralelas, una salvaje montaña rusa a caballo entre sus dos familias. Obligados a convivir hasta que Laura despierte y pueda ser trasladada, Emilio y Toni luchan por demostrar quién de los dos es el único y auténtico marido.', 102, 'KPHk2hD8l28', '+12', 'Comedia', '2023-03-10'),
(11, 'Creed III', 'Creed_III.jpg', 'Después de dominar el mundo del boxeo, Adonis Creed ha progresado tanto en su carrera como en su vida familiar. Cuando Damian (Jonathan Majors), un amigo de la infancia y antiguo prodigio del boxeo, reaparece después de cumplir una larga condena en prisión, Adonis Creed quiere demostrar que merece una oportunidad en el ring. El enfrentamiento entre estos antiguos amigos es algo más que una simple pelea. Para ajustar cuentas, Adonis debe arriesgar su futuro para enfrentarse a Damian, un boxeador que no tiene nada que perder.', 117, 'ZBqVwzCKMck', '+12', 'Drama', '2023-03-03'),
(12, 'Avatar: El sentido del agua', 'Avatar.jpg', 'Ambientada más de una década después de los acontecimientos de la primera película, \'Avatar: The Way of Water\' empieza contando la historia de la familia Sully (Jake, Neytiri y sus hijos), los problemas que los persiguen, lo que tienen que hacer para mantenerse a salvo, las batallas que libran para seguir con vida y las tragedias que sufren. Secuela del éxito de taquilla Avatar (2009).', 192, 'FSyWAxUg3Go', '+12', 'Ciencia Ficción', '2022-12-16'),
(13, 'Air', 'Air.jpg', 'Narra la increíble y revolucionaria asociación entre Michael Jordan -un novato en ese momento- y la incipiente sección de baloncesto de Nike que revolucionó el mundo del deporte y la cultura contemporánea con la marca Air Jordan. Cuenta la atrevida apuesta que definió la carrera de un equipo poco convencional, la visión implacable de una madre que conoce el valor del inmenso talento de su hijo y el fenómeno del baloncesto que se convertiría en el más grande de todos los tiempos.', 112, 'KLyx_wvMkhk', '+12', 'Drama', '2023-04-05'),
(14, 'La memoria de un asesino', 'memory.jpg', 'Alex, un sicario, se convierte en el objetivo de su organización por negarse a cumplir un trabajo. Mientras huye de ellos, el FBI y el servicio de inteligencia mexicano siguen sus pasos, alertados por el reguero de cadáveres que deja por donde va.', 114, 'E17QCtHNh8g', '+18', 'Acción', '2022-08-05'),
(15, 'Black Adam', 'Black_Adam.jpg', 'Unos arqueólogos liberan de su tumba a Black Adam, quien llevaba 5000 años preso tras haber recibido los poderes de los dioses. De nuevo entre los humanos, Black Adam se dispone a imponer su justicia, muy diferente a la del mundo en el que despertó.', 125, 'u8IhWfgnicU', '+12', 'Acción', '2022-10-21'),
(16, 'El proyecto Adam', 'El_proyecto_Adam.jpg', 'Adam Reed, un viajero del tiempo y piloto de combate, aterriza en el año 2022. Allí, se encuentra con su yo de doce años y, junto a él, tratará de salvar el futuro.', 106, 'cIbg9zHw44A', '+12', 'Ciencia Ficción', '2022-02-28'),
(17, 'El visitante del futuro', 'El_visitante_del_futuro.jpg', 'Alice es una joven que se opone a la construcción de una central nuclear iniciada por su padre, que es diputado. Es entonces cuando un extraño visitante los traslada al año 2555, un futuro devastado por la explosión de la central.', 102, 'nYPinRsbiEk', '+18', 'Ciencia Ficción', '2022-08-18'),
(18, 'Spider-Man: No Way Home', 'Spider-Man.jpg', 'Esta versión extendida cuenta con más de 11 minutos contenido extra, incluyendo escenas eliminadas.Por primera vez en la historia cinematográfica de Spider-Man, nuestro héroe, vecino y amigo es desenmascarado y por tanto ya no es capaz de separar su vida normal de los enormes riesgos que conlleva ser un Súper Héroe. Cuando pide ayuda a Doctor Strange, los riesgos pasan a ser aún más peligrosos, obligándole a descubrir lo que realmente significa ser Spider-Man.', 148, 'SkmRT3M4Vx4', '+7', 'Acción', '2021-12-17'),
(19, 'Encanto', 'Encanto.jpg', 'En lo alto de las montañas de Colombia hay un lugar encantado llamado Encanto. Aquí, en una casa mágica, vive la extraordinaria familia Madrigal donde todos tienen habilidades fantásticas.', 109, 'SAH_W9q_brE', 'TP', 'Infantil', '2021-11-24'),
(20, 'Hasta el cielo', 'Hasta_el_cielo.jpg', 'Un thriller con trasfondo social, que narra las peripecias de una banda de chavales delincuentes tras las grúas de la burbuja inmobiliaria.', 122, 'wlmGEXJAM', '+16', 'Suspense', '2020-08-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` smallint(6) NOT NULL,
  `id_horario` smallint(6) NOT NULL,
  `id_usuario` smallint(6) NOT NULL,
  `entradas` smallint(6) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` smallint(6) NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `capacidad` smallint(6) DEFAULT NULL,
  `habilitada` tinyint(1) NOT NULL,
  `luxury` tinyint(1) NOT NULL,
  `lleno` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `descripcion`, `capacidad`, `habilitada`, `luxury`, `lleno`) VALUES
(1, 'Sala infantil', 0, 1, 0, 0),
(2, 'Sala infantil', 114, 1, 0, 0),
(3, 'Sala infantil', 114, 1, 0, 0),
(4, 'Sala infantil', 114, 1, 0, 0),
(24, 'LA SALA', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` smallint(6) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `contrasena` char(64) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol` char(13) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `contrasena`, `rol`) VALUES
(1, 'Juan', 'Gutierrez', 'juan@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Cliente'),
(2, 'Marta', 'Fernandez', 'marta@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Administrador'),
(3, 'Pepe', 'Fernandez', 'pepe@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD PRIMARY KEY (`id_butaca`),
  ADD KEY `fk_id_sala` (`id_sala`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `pelicula_fk` (`id_pelicula`),
  ADD KEY `sala_fk` (`id_sala`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `usuario_fk` (`id_usuario`),
  ADD KEY `horario_fk` (`id_horario`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `id_butaca` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD CONSTRAINT `fk_id_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `pelicula_fk` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sala_fk` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `horario_fk` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
