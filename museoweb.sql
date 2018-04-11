-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2018 a las 19:23:57
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `museoweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `nom_com` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `id_com` int(11) NOT NULL,
  `texto_com` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `obra_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `Nombre` varchar(50) DEFAULT NULL COMMENT 'nombre de la obra',
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `dimensiones` varchar(75) DEFAULT NULL,
  `procedencia` varchar(50) DEFAULT NULL,
  `comentario` text,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`Nombre`, `id`, `fecha`, `dimensiones`, `procedencia`, `comentario`, `imagen`) VALUES
('Alabastron con inscripción jeroglífica', 1, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud 12 cm. Anchura: 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada', 'El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella.\r\nEl estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores.\r\nLa industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha. ', 'img/alabastron.jpg'),
('Bifaz cordiforme', 2, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud, 12 cm.; anchura, 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada.', 'El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella. El estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores. La industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha. ', 'img/bifazcordiforme.jpg'),
('Copa de vástago cuadrado', 3, 'Edad del Bronce, cultura argárica, 1.900-1.200 a.C', 'Altura, 27 cm.; diámetro de la boca, 21 cm.; diámetro de la base, 17,9 cm.', 'Cerro de la Encina, Monachil, Granada', 'Esta copa de pie alto de cerámica, realizada a mano y de cocción oxidante, presenta varias peculiaridades, como su gran tamaño, los mamelones que circundan la parte superior de la copa y la forma cuadrada de su vástago que descansa sobre una base convexa circular. La copa forma parte de la vajilla habitual utilizada en los poblados argáricos del sureste peninsular. Esta vajilla estaba compuesta por cuencos, ollas de formas simples y carenadas y vasos troncocónicos. Estos objetos se utilizaban en las cocinas domésticas y también como elementos de ajuar en los enterramientos situados debajo del suelo de las viviendas. El contexto inmediato de la pieza es poco conocido, aunque se sabe que procede del poblado argárico del Cerro de la Encima.', 'img/copa_vastago_cuadrado.jpg'),
('Fuente carenada con incrustaciones metálicas', 4, 'Edad del Bronce, cultura del Bronce Final, 850-750 a.C.', 'Altura 12 cm.; diámetro máximo, 31 cm.; botones cobre, 6 cm', 'Pinos-Puente, Granada', 'Fuente carenada con decoración de incrustaciones metálicas de bronce, con forma de casquete esférico y carena alta. Esta pieza está encuadrada dentro del horizonte Bronce Final II, que se caracteriza por los influjos que desde la cultura tartésica llegan a la zona del sureste. Los últimos momentos de este horizonte están relacionados con los primeros asentamientos fenicios en la costa. Esta fuente parece proceder del Cerro de los Infantes en Pinos Puente, donde existió un asentamiento del Bronce Final caracterizado por grandes cabañas de planta oval cuyo espacio interior no estaba compartimentado pero sí especializado en zonas de distintas tareas domésticas y artesanales.', 'img/fuente_carenada.jpg'),
('Ídolo antropomorfo masculino', 5, 'Calcolítico, 2.700-2.300 a.C.', 'Altura, 16,6 cm.; anchura máxima, 5,2 cm.', 'El Malagón, Cúllar, Granada.', 'Este ídolo apareció en los niveles superiores del interior de la cabaña F, de planta circular que mantenía el zócalo de piedra y alzado de tapial, hoy desaparecido. En su interior se documentó un banco adosado a la pared y un hogar. Esta cabaña era parte de un conjunto con otras que formaban un poblado fortificado. La actividad principal de este poblado, que explotaba los recursos minerales de su entorno, estaba relacionada con la metalurgia del cobre. El ídolo es estilizado y le falta la parte superior del cuerpo, donde se localiza un hueco de forma cuadrangular en el que se engarzaría otra pieza que completaría la figura masculina. En cuanto a su significado, hay varias hipótesis: considerado como un objeto artístico dentro de la iconografía de la Edad del cobre o como un elemento simbólico que conectaría la vida cotidiana con la muerte.', 'img/maegr_idolo.jpg'),
('Urna funeraria con esqueleto infantil', 6, 'Edad del Bronce, cultura argárica, 1.900 -1.200 a.C.', 'Altura, 32,5 cm.; diámetro boca, 33 cm', 'Fuente Amarga, Galera, Granada.', 'Esta pieza es una urna de cerámica a mano en la que se depósito un cadáver infantil. Tiene forma parabólica y borde recto con incisiones verticales alrededor de todo el diámetro de la boca. Presenta dos mamelones puntiagudos cerca del borde. El yacimiento de Fuente Amarga se sitúa en un cerro junto a la cañada de Fuenteamarga. En la excavación se documentaron diferentes zonas: una de hábitat, con muros de aterrazamiento y algunas sepulturas en el interior de las viviendas; otra con abundantes sepulturas en covacha; y, por último, un silo excavado en la roca y un enterramiento medieval en fosa. En la cultura argárica los tipos de enterramientos documentados son: fosa excavada en la roca; fosa revestida de piedra; fosa profunda; de tipo monumental  -gran fosa revestida de piedras y con estructura de madera y ramas- ; en urna, en cista y en pithos.', 'img/urnafuneraria_esqueletoinfantil.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
