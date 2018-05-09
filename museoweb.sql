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
('Paco', 1, 'Me parece interesante', 'paco@paquete.com', '2018-04-10', 1),
('Roberto García', 2, 'Si sólo es una piedra', 'roberto@robertete.com', '2018-04-06', 2);

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
  `video` varchar(200) DEFAULT 'https://www.youtube.com/embed/dQw4w9WgXcQ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`Nombre`, `id`, `fecha`, `dimensiones`, `procedencia`, `comentario`, `imagen`, `video`) VALUES
('Alabastron con inscripción jeroglífica', 1, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud 12 cm. Anchura: 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada', 'El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella.\r\nEl estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores.\r\nLa industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha. ', 'img/alabastron.jpg', 'https://www.youtube.com/embed/dQw4w9WgXcQ'),
('Bifaz cordiforme', 2, 'Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.', 'Longitud, 12 cm.; anchura, 8,9 cm.', 'Solana del Zamborino, Fonelas, Granada.', 'El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix, a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella. El estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar: primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva, así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales, entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados por los grupos cazadores- recolectores. La industria lítica está realizada sobre todo en cuarzo y cuarcita, siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces, cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad distal apuntada que confiere al útil una morfología más larga que ancha. ', 'img/bifazcordiforme.jpg', ''),
('Copa de vástago cuadrado', 3, 'Edad del Bronce, cultura argárica, 1.900-1.200 a.C', 'Altura, 27 cm.; diámetro de la boca, 21 cm.; diámetro de la base, 17,9 cm.', 'Cerro de la Encina, Monachil, Granada', 'Esta copa de pie alto de cerámica, realizada a mano y de cocción oxidante, presenta varias peculiaridades, como su gran tamaño, los mamelones que circundan la parte superior de la copa y la forma cuadrada de su vástago que descansa sobre una base convexa circular. La copa forma parte de la vajilla habitual utilizada en los poblados argáricos del sureste peninsular. Esta vajilla estaba compuesta por cuencos, ollas de formas simples y carenadas y vasos troncocónicos. Estos objetos se utilizaban en las cocinas domésticas y también como elementos de ajuar en los enterramientos situados debajo del suelo de las viviendas. El contexto inmediato de la pieza es poco conocido, aunque se sabe que procede del poblado argárico del Cerro de la Encima.', 'img/copa_vastago_cuadrado.jpg', ''),
('Fuente carenada con incrustaciones metálicas', 4, 'Edad del Bronce, cultura del Bronce Final, 850-750 a.C.', 'Altura 12 cm.; diámetro máximo, 31 cm.; botones cobre, 6 cm', 'Pinos-Puente, Granada', 'Fuente carenada con decoración de incrustaciones metálicas de bronce, con forma de casquete esférico y carena alta. Esta pieza está encuadrada dentro del horizonte Bronce Final II, que se caracteriza por los influjos que desde la cultura tartésica llegan a la zona del sureste. Los últimos momentos de este horizonte están relacionados con los primeros asentamientos fenicios en la costa. Esta fuente parece proceder del Cerro de los Infantes en Pinos Puente, donde existió un asentamiento del Bronce Final caracterizado por grandes cabañas de planta oval cuyo espacio interior no estaba compartimentado pero sí especializado en zonas de distintas tareas domésticas y artesanales.', 'img/fuente_carenada.jpg', ''),
('Ídolo antropomorfo masculino', 5, 'Calcolítico, 2.700-2.300 a.C.', 'Altura, 16,6 cm.; anchura máxima, 5,2 cm.', 'El Malagón, Cúllar, Granada.', 'Este ídolo apareció en los niveles superiores del interior de la cabaña F, de planta circular que mantenía el zócalo de piedra y alzado de tapial, hoy desaparecido. En su interior se documentó un banco adosado a la pared y un hogar. Esta cabaña era parte de un conjunto con otras que formaban un poblado fortificado. La actividad principal de este poblado, que explotaba los recursos minerales de su entorno, estaba relacionada con la metalurgia del cobre. El ídolo es estilizado y le falta la parte superior del cuerpo, donde se localiza un hueco de forma cuadrangular en el que se engarzaría otra pieza que completaría la figura masculina. En cuanto a su significado, hay varias hipótesis: considerado como un objeto artístico dentro de la iconografía de la Edad del cobre o como un elemento simbólico que conectaría la vida cotidiana con la muerte.', 'img/maegr_idolo.jpg', ''),
('Urna funeraria con esqueleto infantil', 6, 'Edad del Bronce, cultura argárica, 1.900 -1.200 a.C.', 'Altura, 32,5 cm.; diámetro boca, 33 cm', 'Fuente Amarga, Galera, Granada.', 'Esta pieza es una urna de cerámica a mano en la que se depósito un cadáver infantil. Tiene forma parabólica y borde recto con incisiones verticales alrededor de todo el diámetro de la boca. Presenta dos mamelones puntiagudos cerca del borde. El yacimiento de Fuente Amarga se sitúa en un cerro junto a la cañada de Fuenteamarga. En la excavación se documentaron diferentes zonas: una de hábitat, con muros de aterrazamiento y algunas sepulturas en el interior de las viviendas; otra con abundantes sepulturas en covacha; y, por último, un silo excavado en la roca y un enterramiento medieval en fosa. En la cultura argárica los tipos de enterramientos documentados son: fosa excavada en la roca; fosa revestida de piedra; fosa profunda; de tipo monumental  -gran fosa revestida de piedras y con estructura de madera y ramas- ; en urna, en cista y en pithos.', 'img/urnafuneraria_esqueletoinfantil.jpg', ''),
('Coraza anatómica', 7, 'Siglo IV a.C.', '\r\nAltura, 44,5 cm. Anchura, 37 cm.\r\n', 'Protohistoria, cultura púnica', 'Esta pieza apareció en la costa granadina, en el mar, en la bahía de la antigua ciudad de Sexi (Almunécar), donde se han encontrado fragmentos anfóricos púnicos de otros pecios hundidos posteriormente. Esta coraza o peto de bronce, probablemente suritálica, reproduce el esquema anatómico del cuerpo desnudo, modelado sobre la gran lámina de bronce. Una escotadura se adapta a la curvatura del cuello y dos laterales a las axilas. Se marcan los músculos pectorales y, mediante la incisión o troquelado, las tetillas. Se apuntan también los músculos del abdomen, insinuándose el relieve de las caderas y el círculo del ombligo. La presencia de esta coraza en el sur de la Península Ibérica asocia esta zona al comercio del Sur de Italia y de Sicilia desde las últimas décadas del siglo V y a lo largo del IV a.C. Las corazas anatómicas bivalvas de esta época son especialmente frecuentes en el área de Apulia, asociadas a enterramientos aristocráticos. En nuestro caso se piensa en el naufragio de un barco que arribaba al puerto púnico, pudiendo ser la coraza un presente para un guerrero aristocrático local. También se ha aludido a la posibilidad de que pudiera tratarse de un trofeo de guerra adquirido por un mercenario ibérico tras su regreso de alguna batalla en el Sur de Italia o en Sicilia, pero esta explicación se considera hoy con precaución y escepticismo. Queda una última opción, la de que se trate de una ofrenda sagrada, un exvoto tras un feliz viaje. Ello nos asociaría este objeto guerrero con otros armamentos hallados en la desembocadura de ríos o en entradas portuarias.', 'img/coraza_anatomica.jpg', ''),
('Astrolabio', 8, NULL, 'Bronce, fundido.\r\nDiámetro, 18,5 cm.', 'Albaicín, Granada', 'El astrolabio parece ser un invento de la escuela de Alejandría, tal vez de Hiparco o de Ptolomeo. El vocablo astrolabio significa comprensión de los astros. Es un instrumento de precisión que se utilizaba como observatorio y como ábaco de cálculo astronómico. Consta de un círculo metálico ahuecado, o madre, en el que aparecen grabados en sus dos caras círculos graduados y cuadrantes, la deferente del sol con sus 365 días y 12 meses, así como el zodiaco con su origen en el punto cero de Aries, que coincidía con el equinoccio de primavera. En el centro se colocaban las láminas, diferentes para cada latitud, y en ellas de dibujaban en proyección estereográfica sobre el ecuador, el cénit de la latitud correspondiente, que en el astrolabio de Granada es 37º, los almucantarats o círculos paralelos al horizonte de la citada latitud, el horizonte inclinado, el ecuador y los trópicos de Cáncer y de Capricornio. Sobre este conjunto se sitúa la red o araña, constituida por un enrejado de flechas cuyas puntas señalan la situación de algunas de las estrellas más brillantes del cielo. La araña puede girar en torno al centro del astrolabio, que representa el eje norte - sur, y en ese giro representa el movimiento aparente de la bóveda celeste. Con este instrumento los musulmanes hacían sus cálculos astronómicos y astrológicos. El astrolabio de Granada es uno de los cuarenta que se conservan en el mundo. ', 'img/astrolabio.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `id`, `correo`, `pass`, `tipo`) VALUES
('paco', 1, 'paco@gmail.com', 'paco', 0);

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
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `exposiciones`
--
ALTER TABLE `exposiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la exp', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
