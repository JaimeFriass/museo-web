-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2018 a las 14:35:10
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `coleccion`
--

CREATE TABLE `coleccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coleccion`
--

INSERT INTO `coleccion` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Piedras', 'Muchas piedras juntas que me encontré por el campo.'),
(2, 'Obras feas', 'Estas son las peores de la lista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colecciones`
--

CREATE TABLE `colecciones` (
  `id_col` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colecciones`
--

INSERT INTO `colecciones` (`id_col`, `id_obra`) VALUES
(1, 1),
(1, 2),
(1, 4),
(1, 5),
(2, 4),
(2, 5);

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

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`nom_com`, `id_com`, `texto_com`, `correo`, `fecha`, `obra_com`) VALUES
('Roberto García', 2, 'Hola me llamo Roberto | Mensaje editado por el moderador', 'roberto@robertete.com', '2018-04-06', 2),
('paco', 4, 'hola', 'prueba@correo.es', '2018-05-15', 1),
('paco', 5, 'Esta obra es una fuente para ensalada', 'prueba@correo.es', '2018-05-16', 4),
('paquete', 6, 'PEOEOEE', 'prueba@correo.es', '2018-05-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposiciones`
--

CREATE TABLE `exposiciones` (
  `id` int(11) NOT NULL COMMENT 'Id de la exp',
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Exposicion' COMMENT 'Nombre',
  `fechas` varchar(70) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Fechas en formato DD/MM',
  `horario` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Horario en formato HH:MM - HH:MM',
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sala Principal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `exposiciones`
--

INSERT INTO `exposiciones` (`id`, `nombre`, `fechas`, `horario`, `ubicacion`) VALUES
(1, 'Exposicion A', 'Lunes a Miércoles', '11:30 a 20:00', 'Sala C'),
(2, 'Exposicion B', 'Lunes a Viernes', '14:00 - 18:00', 'Sala Principal'),
(3, 'Exposicion C', 'Martes a Viernes', '10:00 - 14:00', 'Sala B'),
(4, 'Exposicion D', 'Viernes', '9:00 - 14:00', 'Sala A'),
(5, 'Exposicion F', 'Sábado', '9:00 - 14:00', 'Sala Principal');

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
  `imagen` text NOT NULL,
  `video` varchar(200) DEFAULT 'https://www.youtube.com/embed/dQw4w9WgXcQ',
  `visible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`Nombre`, `id`, `fecha`, `dimensiones`, `procedencia`, `comentario`, `imagen`, `video`, `visible`) VALUES
('Alabastron con inscripción jeroglífica', 1, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud 12 cm. Anchura: 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada', 'El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella.\r\nEl estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores.\r\nLa industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha. ', 'img/alabastron.jpg', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 1),
('Bifaz cordiformejeje', 2, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud, 12 cm.; anchura, 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada.', '                                                                                                                                                                                                                        El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella. El estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores. La industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha.                                                                                                                                                                                     ', 'img/bifazcordiforme.jpg', '', 1),
('Copa de vástago cuadrado', 3, 'Edad del Bronce, cultura argárica, 1.900-1.200 a.C', 'Alturaa, 27 cm.; diámetro de la boca, 21 cm.; diámetro de la base, 17,9 cm.', 'Cerro de la Encina, Monachil, Granada', '                                                                                                                                                                                                                                                                                                                                                Estaa copa de pie alto de cerámica, realizada a mano y de cocción oxidante, presenta varias peculiaridades, como su gran tamaño, los mamelones que circundan la parte superior de la copa y la forma cuadrada de su vástago que descansa sobre una base convexa circular. La copa forma parte de la vajilla habitual utilizada en los poblados argáricos del sureste peninsular. Esta vajilla estaba compuesta por cuencos, ollas de formas simples y carenadas y vasos troncocónicos. Estos objetos se utilizaban en las cocinas domésticas y también como elementos de ajuar en los enterramientos situados debajo del suelo de las viviendas. El contexto inmediato de la pieza es poco conocido, aunque se sabe que procede del poblado argárico del Cerro de la Encima.                                                                                                                                                                                                                                                                                        ', 'img/copa_vastago_cuadrado.jpg', '', 1),
('Fuente carenada', 4, 'Edad del Bronce, cultura del Bronce Final, 850-750 a.C.', 'Altura 12 cm.; diámetro máximo, 31 cm.; botones cobre, 6 cm', 'Pinos-Puente, Granada', '                        Fuentee carenada con decoración de incrustaciones metálicas de bronce, con forma de casquete esférico y carena alta. Esta pieza está encuadrada dentro del horizonte Bronce Final II, que se caracteriza por los influjos que desde la cultura tartésica llegan a la zona del sureste. Los últimos momentos de este horizonte están relacionados con los primeros asentamientos fenicios en la costa. Esta fuente parece proceder del Cerro de los Infantes en Pinos Puente, donde existió un asentamiento del Bronce Final caracterizado por grandes cabañas de planta oval cuyo espacio interior no estaba compartimentado pero sí especializado en zonas de distintas tareas domésticas y artesanales.                    ', 'img/fuente_carenada.jpg', '', 1),
('Ídolo antropomorfo masculino', 5, 'Calcolítico, 2.700-2.300 a.C.', 'Altura, 16,6 cm.; anchura máxima, 5,2 cm.', 'El Malagón, Cúllar, Granada.', 'Este ídolo apareció en los niveles superiores del interior de la cabaña F, de planta circular que mantenía el zócalo de piedra y alzado de tapial, hoy desaparecido. En su interior se documentó un banco adosado a la pared y un hogar. Esta cabaña era parte de un conjunto con otras que formaban un poblado fortificado. La actividad principal de este poblado, que explotaba los recursos minerales de su entorno, estaba relacionada con la metalurgia del cobre. El ídolo es estilizado y le falta la parte superior del cuerpo, donde se localiza un hueco de forma cuadrangular en el que se engarzaría otra pieza que completaría la figura masculina. En cuanto a su significado, hay varias hipótesis: considerado como un objeto artístico dentro de la iconografía de la Edad del cobre o como un elemento simbólico que conectaría la vida cotidiana con la muerte.', 'img/maegr_idolo.jpg', '', 1),
('Urna funeraria con esqueleto infantil', 6, 'Edad del Bronce, cultura argárica, 1.900 -1.200 a.C.', 'Altura, 32,5 cm.; diámetro boca, 33 cm', 'Fuente Amarga, Galera, Granada.', 'Esta pieza es una urna de cerámica a mano en la que se depósito un cadáver infantil. Tiene forma parabólica y borde recto con incisiones verticales alrededor de todo el diámetro de la boca. Presenta dos mamelones puntiagudos cerca del borde. El yacimiento de Fuente Amarga se sitúa en un cerro junto a la cañada de Fuenteamarga. En la excavación se documentaron diferentes zonas: una de hábitat, con muros de aterrazamiento y algunas sepulturas en el interior de las viviendas; otra con abundantes sepulturas en covacha; y, por último, un silo excavado en la roca y un enterramiento medieval en fosa. En la cultura argárica los tipos de enterramientos documentados son: fosa excavada en la roca; fosa revestida de piedra; fosa profunda; de tipo monumental  -gran fosa revestida de piedras y con estructura de madera y ramas- ; en urna, en cista y en pithos.', 'img/urnafuneraria_esqueletoinfantil.jpg', '', 1),
('Coraza anatómica', 7, 'Siglo IV a.C.', '\r\nAltura, 44,5 cm. Anchura, 37 cm.\r\n', 'Protohistoria, cultura púnica', 'Esta pieza apareció en la costa granadina, en el mar, en la bahía de la antigua ciudad de Sexi (Almunécar), donde se han encontrado fragmentos anfóricos púnicos de otros pecios hundidos posteriormente. Esta coraza o peto de bronce, probablemente suritálica, reproduce el esquema anatómico del cuerpo desnudo, modelado sobre la gran lámina de bronce. Una escotadura se adapta a la curvatura del cuello y dos laterales a las axilas. Se marcan los músculos pectorales y, mediante la incisión o troquelado, las tetillas. Se apuntan también los músculos del abdomen, insinuándose el relieve de las caderas y el círculo del ombligo. La presencia de esta coraza en el sur de la Península Ibérica asocia esta zona al comercio del Sur de Italia y de Sicilia desde las últimas décadas del siglo V y a lo largo del IV a.C. Las corazas anatómicas bivalvas de esta época son especialmente frecuentes en el área de Apulia, asociadas a enterramientos aristocráticos. En nuestro caso se piensa en el naufragio de un barco que arribaba al puerto púnico, pudiendo ser la coraza un presente para un guerrero aristocrático local. También se ha aludido a la posibilidad de que pudiera tratarse de un trofeo de guerra adquirido por un mercenario ibérico tras su regreso de alguna batalla en el Sur de Italia o en Sicilia, pero esta explicación se considera hoy con precaución y escepticismo. Queda una última opción, la de que se trate de una ofrenda sagrada, un exvoto tras un feliz viaje. Ello nos asociaría este objeto guerrero con otros armamentos hallados en la desembocadura de ríos o en entradas portuarias.', 'img/coraza_anatomica.jpg', '', 1),
('Astrolabio', 8, NULL, 'Bronce, fundido.\r\nDiámetro, 18,5 cm.', 'Albaicín, Granada', 'El astrolabio parece ser un invento de la escuela de Alejandría, tal vez de Hiparco o de Ptolomeo. El vocablo astrolabio significa comprensión de los astros. Es un instrumento de precisión que se utilizaba como observatorio y como ábaco de cálculo astronómico. Consta de un círculo metálico ahuecado, o madre, en el que aparecen grabados en sus dos caras círculos graduados y cuadrantes, la deferente del sol con sus 365 días y 12 meses, así como el zodiaco con su origen en el punto cero de Aries, que coincidía con el equinoccio de primavera. En el centro se colocaban las láminas, diferentes para cada latitud, y en ellas de dibujaban en proyección estereográfica sobre el ecuador, el cénit de la latitud correspondiente, que en el astrolabio de Granada es 37º, los almucantarats o círculos paralelos al horizonte de la citada latitud, el horizonte inclinado, el ecuador y los trópicos de Cáncer y de Capricornio. Sobre este conjunto se sitúa la red o araña, constituida por un enrejado de flechas cuyas puntas señalan la situación de algunas de las estrellas más brillantes del cielo. La araña puede girar en torno al centro del astrolabio, que representa el eje norte - sur, y en ese giro representa el movimiento aparente de la bóveda celeste. Con este instrumento los musulmanes hacían sus cálculos astronómicos y astrológicos. El astrolabio de Granada es uno de los cuarenta que se conservan en el mundo. ', 'img/astrolabio.jpg', '', 1),
('Jarra de Castril', 9, 'Edad Moderna, siglo XVIII', 'Altura, 25 cm.; diámetro, 10 cm', 'Castril, Granada', 'Jarra de vidrio verde amarillento, con dos asas y decorada con aplicaciones de vidrio en forma de aves y cadenas. El horno vidriero de Castril surge entre 1490 y 1507 como fundación de Hernando de Zafra, señor de Castril, que fue secretario de los Reyes Católicos y que en uno de sus viajes contactó con la producción vidriera de Barcelona. Vio entonces la conveniencia de instalar uno semejante en Castril. Se ubicó en un pequeño taller al lado de la casa que hizo construir la familia señorial, hoy "Posada del Pilar". La explotación del horno se hizo en régimen de arrendamiento a un socio industrial de garantía que pagaba un canon. La situación geográfica privilegiada de Castril permitía contar con los recursos naturales necesarios para mantener una industria de vidrio: abundante madera procedente de los bosques locales, cerro de arena silícea que domina la población con un caudaloso río de montaña que lo erosiona, y la barrilla, planta silvestre, que tras su combustión se convertía en sosa, como fundente imprescindible. En Castril sólo se utilizó sodio, y las propias cenizas de la leña, en la fusión de la sílice. Los productos de Castril, que llegaron a todos los rincones de Andalucía hasta el cese de la producción en 1878, eran los propios de una vidriera industrial: frascos, botellas y garrafas, todos ellos destinados a usarse y romperse en el trasiego de cocinas, almazaras o bodegas; aunque en ocasiones, tal vez con motivo de exámenes de aprendices u oficiales, o de hacer algún obsequio, se confeccionaban bellos y fantásticos objetos llenos de pinzados, rizos, filamentos, festones, cordones, anillas. ', 'img/jarra_castil.jpg', '', 0),
('Venus de Paulenca', 10, 'Edad Antigua, cultura romana, siglo II-V', 'Altura conservada, 50 cm.; anchura mayor, 17 cm.; grosor, 14 cm', 'Villa tardorromana de Paulenca, Guadix, Granada', 'Escultura romana denominada "Venus de Paulenca". Es una escultura de bulto redondo realizada en mármol blanco que representa a una mujer vestida con túnica. La escultura descansa sobre la pierna izquierda, que le sirve de sostén, mientras dobla la derecha, que sobresale a la altura de la rodilla, para después retrasar el pie. Este movimiento origina una torsión por la que destaca la cadera izquierda y da a la figura una pose sugestiva. Viste túnica transparente, ceñida por una cinta por debajo de los pechos y dejando el izquierdo descubierto. Sobre la túnica lleva un complicado manto, cuyos sinuosos pliegues, que caen pesadamente a la derecha de la figura hasta girar bruscamente en un torbellino de curvas y descender por fin entre las dos piernas, complican la figura por su barroquismo. La escultura, tanto por sus características como por su factura, en talleres hispanos, hay que fecharla en época de Bajo Imperio. Venus es una antigua divinidad romana de poca importancia que, en un principio, protegía los huertos y aseguraba la fecundación de las flores y la maduración de las plantas. A partir del siglo II a.C. fue asimilada a la diosa griega Afrodita. En el culto romano adquirió una autoridad notable y se le dedicó el mes de abril, época en que se manifiesta en toda la naturaleza la renovación del amor. ', 'img/venus.jpg', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 0),
('Portacandil', 11, 'Edad Media, cultura califal, siglos X-XI', 'Altura, 53,5 cm', 'Cortijo de las Monjas, Medina Elvira, Atarfe', '                                                                        Sobre una delgada base hexagonal se levanta un templete de esbeltas columnitas y dobles arcos de herradura que sostienen un entablamento y éste a su vez una cúpula rematada por chapitel y un vástago en el que se encastraría el candil. Al pie del vástago hay un disco calado en forma de "sello de Salomón" inscrito en una circunferencia. Un estudio iconográfico y decorativo data estas piezas en época califal, sobre todo basándose en paralelos con edificaciones y decoraciones bizantinas que hacen de tránsito entre el mundo pagano y el cristiano-medieval. Esta amalgama sería la misma de la que bebiesen otras tradiciones artísticas. Por este camino, se ha llegado a proponer que esta pieza formase parte de una iglesia cristiana, posiblemente del siglo VII y que después fue empleada en la mezquita de Medina Elvira sobrepuesta a la misma o que vino a sustituirla. Efectivamente la decoración que recubre los arcos, y el entablamento que éstos sostienen, nos recuerda sobremanera a la de algunos broches de cinturón liriformes en bronce del siglo VII en que se representan cabezas de pájaros odínicos o quebrantahuesos muy estilizadas, con el ojo en el centro y formando frisos. La iconografía y la finalidad sin duda religiosa de esta pieza -árboles del paraíso, halcones, la propia luz- tanto podría ser cristiana como musulmana. A diferencia de otras piezas halladas en la mezquita, los conocidos polycandela, cuya finalidad es aportar una iluminación masiva, el portacandil remite a un aspecto más simbólico y menos utilitario.                                                     ', 'img/portacandil.jpg', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 0),
('Cancel de época visigoda', 12, 'Edad Antigüa, cultura de época visigoda, siglos VI-VII', 'Altura, 119 cm.; anchura, 83 cm', 'Cortijo de La Capellanía de Montefrío, Granada', 'El cancel es una losa grande de piedra que separa el presbiterio de la iglesia, espacio que circunda al altar mayor reservado al clero, de la nave. Otras veces en vez de un cancel se utilizan gradas que separan ambos espacios. Este cancel de grandes dimensiones está tallado a bisel de poco resalte con la decoración típica germana de círculos enlazados con curvas y contracurvas enmarcadas en un cordón en tres de sus lados. El cancel apareció reutilizado como tapa de una sepultura moderna, por lo tanto no se sabe nada de su contexto arqueológico. Sí se sabe que por la zona donde apareció existen yacimientos de época visigoda, necrópolis en su mayoría y en menor grado algún asentamiento. Por tanto este cancel debería estar relacionado con algún edificio religioso que no ha dejado huella, salvo esta pieza.', 'img/cancel.jpg', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 0),
('Togado de Periate', 13, 'Edad Antigüa, cultura romana, siglo I', 'Altura, 160 cm.; anchura, 65 cm', 'Cortijo de Periate, Piñar, Granada', 'Escultura en bronce fundida en hueco que representa un personaje masculino a tamaño natural cubierto con larga toga. La cabeza es de distinta factura al cuerpo, más tosca, de pequeño tamaño, de pómulos salientes y ojos hundidos que dirigen la mirada hacia arriba en actitud ausente. Solamente conserva la mano izquierda, larga y de dedos finos, con gruesos anillos en los dedos anular y meñique. Tanto la cabeza como la mano están unidas al cuerpo con estuco. Se trata de un retrato de un importante personaje del que se ha querido destacar su papel civil, tanto por el gesto de la mano como por la ostentación de los anillos, símbolos de poder y prestigio. Probablemente adornaba la sala de una villa, una statio militar o una mansio. No obstante, se ha sugerido que el lugar donde apareció, donde también se ha localizado una inscripción honoraria, podría ser un antiguo "opidum" o poblado fortificado indígena al que habría sucedido una ciudad romana, donde habrían residido los "accitanis veteres" -miembros de un ordo especial, vinculado al ordo de Acci- , e incluso se ha sugerido que la inscripción dedicada a Lucius Aemilius Propinquus pudiera ser el pedestal que soportase el Togado de Periate. No obstante, unos pocos materiales cerámicos superficiales no parecen avalar esta hipótesis. También choca que la mencionada inscripción sea fechable en el siglo II y la escultura lo sea en el siglo III. Esta cuestión, en fin, queda abierta a discusión. Javier Arce cree que representa a Claudio II el Gótico, que gobernó el Imperio entre los años 68 y 70 d.C.', 'img/togado.jpg', '', 0),
('Ataifor del caballo', 14, 'Edad Media, cultura califal, siglo X', 'Altura, 8 cm.; diámetro, 35 cm', 'Medina Elvira, Atarfe, Granada.', 'Gran fuente de cerámica vidriada con decoración pintada en verde y negro (cobre y manganeso), denominada en el argot científico "verde manganeso". La decoración consiste en un caballo enjaezado y ensillado, de largas crines sueltas, cola recogida en su nacimiento y anudada hacia el final en tres ramales. Sobre la silla aparece un ave con las alas desplegadas y cogiendo las riendas con el pico. La figura del caballo, frecuente en el arte islámico oriental, no lo es tanto en el islámico hispano, conociéndose pocos ejemplares de esta época. La figura del caballo como soporte de un guerrero o caballero es relativamente frecuente en el arte oriental, si bien no se conoce tampoco esta extraña asociación de caballo cabalgado por un ave, por más que en Nisapur (Irán) en el siglo X se produjeron unas piezas en las que, además del guerrero, el caballo soporta sobre sus cuatro traseros un ave. Se da además la circunstancia de que el ave de la pieza de Elvira tiene un evidente paralelismo con otra ave del mismo Nisapu. El caballo sorprende por su naturalismo. Se habla de su aspecto mongol, y en efecto, parece mucho más un caballo mongol o chino, de no mucha alzada, con potentes flancos y rotundas pezuñas, que las abstracciones de caballos a las que nos tiene acostumbrados el arte islámico oriental. El origen granadino de esta pieza está fuera de duda, sin embargo se pueden detectar en ella tanto influencias persas como egipcias, aunque con fuerte carga de naturalismo que tradicionalmente se ha venido atribuyendo al peso del arte clásico en la península ibérica. ', 'img/ataifor.jpg', '', 0),
('Ánfora olearia', 15, 'Edad Antigüa, cultura romana, 0-199.', 'Altura, 79 cm.; diámetro, 44 cm.', 'Fondo marino de Motril, Granada.', 'Ánfora de cerámica -tipo Dressel 20D- de cuerpo globuloso con fondo puntiagudo y de cuello corto y estrecho de forma troncocónica, en el que van insertadas dos asas, enfrentadas, macizas, de sección redonda que forman un ángulo inferior a 90º C. Tiene borde triangular suavemente ranurado en el interior, labio redondeado y la marca de alfarero -AGRICOL- en la parte superior de un asa. Su superficie presenta abundantes concreciones marinas. Se usaba como contenedor de aceite de oliva para transporte y almacenamiento. La Administración de Roma supo dar a cada una de sus provincias las especializaciones económicas relacionadas con sus propios recursos. El aceite de oliva del valle del Guadalquivir se sitúa en primera línea de los productos exportados. Este comercio se vio favorecido por la navegabilidad del Betis, a su paso por Sevilla, Córdoba y Écija. El sistema de recolección del aceite se hizo a través de un proceso de reagrupamiento a lo largo del río. Una larga cadena de fábricas de ánforas es testimonio de esta actividad permanente relacionada con una organización racional del comercio de exportación. Este tipo de ánforas fueron los envases elegidos por las comunidades de las riberas del Guadalquivir para transportar el aceite de oliva que producían. Los alfares se suceden en Andalucía en un recorrido de unos 160 Kms. a lo largo del río, con una intensidad progresiva desde abajo hasta arriba y con una regularidad que demuestra el aumento de la producción del aceite, a medida que se remonta el río en dirección a Córdoba. ', 'img/anfora_olearia.jpg', '', 0),
('Crátera de campana de figuras rojas', 16, '', 'Altura, 32 cm.; diámetro boca, 37 cm.; diámetro base, 15,2 cm.', 'Zona de Baza.', 'Esta crátera de campana de figuras rojas sobre fondo negro tiene dos escenas pintadas que están limitadas por una cenefa de hojas de laurel entre dos líneas horizontales y por una banda de meandros entre líneas horizontales, con un motivo geométrico central. El anverso presenta una escena con tema dionisiaco. En el centro aparece una figura alada en levitación que lleva en la mano izquierda un collar y en la derecha el tímpano o pandero. Toda la figura y sus objetos están pintados en blanco. Al lado izquierdo de esta figura, que se interpreta como Ariadna, se encuentra una ménade sentada, y junto a ella, un sátiro de pie que porta el tirso, símbolo de Dionisios. Al lado derecho de Ariadna se encuentra un sátiro sentado tocando el aulos, o doble flauta, y a su lado una ménade en pie portando también un tirso y un collar. El reverso presenta una escena de palestra o gimnasio, con tres personajes masculinos en pie envueltos en sus mantos: el de la izquierda mantiene en su mano un disco; un aríbalo -frasco de perfumes y ungüentos- queda en el aire entre la figura anterior y la central, que parece que conversa con la tercera figura, que porta a su vez un báculo -símbolo de autoridad- ; entre ambos aparece un trozo de columna cortada, simulando que el tercer personaje del báculo está en el interior de algún edificio y los otros dos personajes, fuera. La crátera de campana es la forma más popular de los talleres griegos y su difusión por todo el Mediterráneo se produce a partir de la segunda mitad del siglo V a.C. hasta la interrupción del comercio fenicio en el siglo IV a.C. Su presencia en bastante común en necrópolis ibéricas formando parte del ajuar del difunto.', 'img/cratera.jpg', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `email` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tlf` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `pass`, `tipo`, `email`, `tlf`) VALUES
(1, 'paco', 'paco', 4, 'paco@gmail.com', 666554433),
(2, 'eusebio', 'eusebio', 4, 'eusebioputoamo@gmail.com', 724235392);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colecciones`
--
ALTER TABLE `colecciones`
  ADD PRIMARY KEY (`id_col`,`id_obra`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `exposiciones`
--
ALTER TABLE `exposiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `exposiciones`
--
ALTER TABLE `exposiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la exp', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
