-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-01-2020 a las 13:30:54
-- Versión del servidor: 10.3.21-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jinetes`
--
DROP DATABASE jinetes;
CREATE DATABASE jinetes;
USE jinetes;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Arma`
--

CREATE TABLE `Arma` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL COMMENT 'Nombre',
  `descr` text DEFAULT NULL COMMENT 'Descripción',
  `tipo` int(11) DEFAULT NULL COMMENT 'Tipo de arma',
  `im_corte` varchar(20) DEFAULT NULL COMMENT 'Impacto cortante',
  `crit_corte` varchar(20) DEFAULT NULL COMMENT 'Crítico cortante',
  `dan_corte` varchar(20) DEFAULT NULL COMMENT 'Daño cortante',
  `im_pen` varchar(20) DEFAULT NULL COMMENT 'Impacto penetrante',
  `crit_pen` varchar(20) DEFAULT NULL COMMENT 'Crítico penetrante',
  `dan_pen` varchar(20) DEFAULT NULL COMMENT 'Daño penetrante',
  `im_apla` varchar(20) DEFAULT NULL COMMENT 'Impacto aplastante',
  `crit_apla` varchar(20) DEFAULT NULL COMMENT 'Crítico aplastante',
  `dan_apla` varchar(20) DEFAULT NULL COMMENT 'Daño aplastante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Arma`
--

INSERT INTO `Arma` (`id`, `nom`, `descr`, `tipo`, `im_corte`, `crit_corte`, `dan_corte`, `im_pen`, `crit_pen`, `dan_pen`, `im_apla`, `crit_apla`, `dan_apla`) VALUES
(1, 'Cuchillo', 'Un pequeño cuchillo de cocina', 1, '1d100+BDES+20', '100', '1d100+BFUE-50', '1d100+BDES+5', '100', '1d100+BFUE-45', '1d100+BDES', '100', '2d12+BFUE'),
(2, 'Bastón', 'Un bastón recto, de madera, ligeramente más bajo que el usuario.', 7, NULL, NULL, NULL, NULL, NULL, NULL, '1d100 + BDES + 10', '100', '1d100 + BF - 60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clase`
--

CREATE TABLE `Clase` (
  `nom` varchar(50) NOT NULL COMMENT 'Nombre de la clase',
  `caract` text NOT NULL DEFAULT 'DES' COMMENT 'Característica principal',
  `recurso` varchar(50) NOT NULL DEFAULT 'Aguante' COMMENT 'Nombre del recurso que utiliza (Mana, aguante, ki, etc...)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Información de las clases';

--
-- Volcado de datos para la tabla `Clase`
--

INSERT INTO `Clase` (`nom`, `caract`, `recurso`) VALUES
('Bardo', 'CAR', 'Mana'),
('Cazador', 'DES', 'Aguante'),
('Domabestias', 'CAR', 'Aguante'),
('Druida', 'SAB', 'Mana'),
('Guerrero', 'FUE', 'Aguante'),
('Herrero rúnico', 'FUE', 'Aguante'),
('Mago elemental', 'SAB', 'Mana'),
('Monje', 'SAB', 'Ki'),
('Paladín', 'SAB', 'Fe'),
('Pícaro', 'DES', 'Aguante'),
('Sacerdote', 'SAB', 'Fe'),
('Soldado', '\'DES\'', 'Aguante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ClaseUsaTipo`
--

CREATE TABLE `ClaseUsaTipo` (
  `tipo` varchar(20) NOT NULL,
  `clase` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ClaseUsaTipo`
--

INSERT INTO `ClaseUsaTipo` (`tipo`, `clase`) VALUES
('Básica', 'Bardo'),
('Canción', 'Bardo'),
('Combate', 'Bardo'),
('Doméstica', 'Bardo'),
('Hechizo', 'Bardo'),
('Cazador', 'Cazador'),
('Domabestias', 'Domabestias'),
('Básica', 'Druida'),
('Combate', 'Druida'),
('Doméstica', 'Druida'),
('Druídica', 'Druida'),
('Hechizo', 'Druida'),
('Guerrero', 'Guerrero'),
('Runa', 'Herrero rúnico'),
('Agua', 'Mago elemental'),
('Básica', 'Mago elemental'),
('Combate', 'Mago elemental'),
('Doméstica', 'Mago elemental'),
('Fuego', 'Mago elemental'),
('Hechizo', 'Mago elemental'),
('Tierra', 'Mago elemental'),
('Viento', 'Mago elemental'),
('Blindado', 'Monje'),
('Espadachín', 'Monje'),
('Kihon', 'Monje'),
('Luchador', 'Monje'),
('Milagro', 'Paladín'),
('Milagro', 'Sacerdote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Habilidad`
--

CREATE TABLE `Habilidad` (
  `id` int(11) NOT NULL,
  `revisar` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Pendiente de revisión',
  `nom` varchar(50) NOT NULL COMMENT 'Nombre de la habilidad',
  `tipo` varchar(20) NOT NULL COMMENT 'Tipo (habilidad, hechizo, runa, etc...)',
  `subtipo` varchar(20) DEFAULT NULL COMMENT 'Subtipo (Hechizo de fuego, Kihon de espadachín, etc...)',
  `tier` tinyint(4) NOT NULL COMMENT 'Tier de habilidad',
  `descr` text DEFAULT NULL COMMENT 'Descripción',
  `coment` text DEFAULT NULL COMMENT 'Comentarios sobre la habilidad',
  `contin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Si se puede mantener activada indefinidamente',
  `auto` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Si se puede utilizar sin lanzar dados',
  `gratis` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Si consume recurso al usarla'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Habilidad`
--

INSERT INTO `Habilidad` (`id`, `revisar`, `nom`, `tipo`, `subtipo`, `tier`, `descr`, `coment`, `contin`, `auto`, `gratis`) VALUES
(1, 1, 'Aura ígnea', 'Hechizo', 'Fuego', 3, 'El mago se rodea de fuego, haciendo que todas las criaturas que quiera en un radio de 5m sufran 1d100 de daño de fuego cada turno. Consume 1p de maná cada turno a partir del primero.', 'Adaptado a T3.', 1, 0, 0),
(2, 0, 'Brazo defensor', 'Hechizo', 'Tierra', 1, 'Transforma su brazo en una rodela (+10 AC, +10 vs proyectiles). Dura hasta que el mago decida cancelarlo o sea incapaz de hacer magia.', NULL, 0, 0, 0),
(3, 1, 'Estómago pétreo', 'Hechizo', 'Tierra', 1, 'Otorga +20 a CON para tiradas de resitir venenos, acohol, etc...', 'Especificar durante cuánto tiempo', 0, 0, 0),
(4, 0, 'Manantial', 'Hechizo', 'Agua', 1, 'Crea hasta 2 litros de agua potable.', NULL, 0, 1, 1),
(5, 1, 'Modificar temperatura', 'Hechizo', 'Agua', 2, 'Cambia la temperatura de una masa de agua de hasta 200l (una bañera llena, aproximadamente). Puede congelarla o evaporarla. Necesita contacto.', '', 0, 0, 0),
(6, 1, 'Piel de piedra', 'Hechizo', 'Tierra', 2, 'El mago endurece su piel en forma pétrea. Durante los siguientes 3 turnos suma 2d10+10 a su AC y a todas las tiradas de pelea.', 'OK', 0, 0, 0),
(7, 1, 'Pilar de piedra', 'Hechizo', NULL, 1, 'Golpea el suelo y alza un pilar de piedra en un rango de 15m de radio. El pilar tiene 1×1×10m. Las criaturas golpeadas deben superar tirada de DES 70 o salen lanzados 1d4m en una dirección aleatoria y sufren 2d20 de daño aplastante. También puede alzarlo lentamente, de forma que no haga daño.', 'OK', 0, 0, 0),
(8, 0, 'Abrir tunel', 'Hechizo', 'Tierra', 4, 'Abre un tunel de 2m de diámetro y 100m de longitud en línea recta a tráves de cualquier terreno.', NULL, 0, 0, 0),
(9, 0, 'Acicalar', 'Hechizo', 'Doméstica', 1, 'Limpia y arregla la ropa, el pelo y el aspecto general de una criatura por punto de mana gastado.', NULL, 0, 0, 0),
(10, 0, 'Acorde épico', 'Hechizo', 'Canción', 3, 'Todos los objetivos enemigos reciben 1d100 daño mágico y quedan aturdidos durante un turno si no superan una tirada de CAR contra el bardo.', NULL, 0, 1, 0),
(11, 0, 'Acorde vigorizante', 'Hechizo', 'Canción', 4, 'Los aliados en rango recuperan 1d100 HP y 1d6+2 aguante', NULL, 0, 1, 0),
(12, 0, 'Agudizar sentidos', 'Hechizo', 'Druídica', 1, 'Se lanza sobre una criatura que recibe +1d20 a tiradas relacionadas con un sentido a elección del druida.', NULL, 0, 0, 0),
(13, 0, 'Aliento de batalla', 'Hechizo', 'Druídica', 2, 'Da 2+1d6 p. Maná/Aguante/ki al objetivo.', NULL, 0, 0, 0),
(14, 0, 'Alterar metal', 'Hechizo', 'Tierra', 2, 'Toca un objeto de metal no mágico para alterar su estructura. Puede cambiar la forma, dureza, resistencia, flexibilidad... Consume 2p de mana por cada Kg.', NULL, 0, 0, 0),
(15, 0, 'Amplificador', 'Hechizo', 'Canción', 1, 'Activa. Duplica el rango de los sonidos (voz e instrumentos)', NULL, 1, 1, 0),
(16, 0, 'Animar', 'Habilidad', 'Domabestias', 1, 'Otorga 1d20 de inspiración a una bestia amistosa.', NULL, 0, 1, 0),
(17, 0, 'Antimosquitos', 'Hechizo', 'Doméstica', 1, 'Evita que mosquitos, insectos y otras criaturas diminutas entren en una habitación o área de 20m de diámetro alrededor del mago. Dura hasta que el mago decida desactivarlo o sea incapaz de hacer magia.', NULL, 0, 0, 0),
(18, 0, 'Apagar', 'Hechizo', 'Básica', 2, 'Absorbe toda la luz que emite un objeto. Durante el tiempo que duraría de forma natural puede restaurarla al mismo objeto o a otro.', NULL, 0, 0, 0),
(19, 0, 'Aparición', 'Hechizo', 'Portales', 4, 'El mago se teletransporta a un lugar conocido. Rango máximo 300km', NULL, 0, 0, 0),
(20, 0, 'Aqua totalus', 'Hechizo', 'Agua', 5, 'El mago se convierte en líquido y pasa a poseer el mismo. Pudiendo moverse en forma líquida llevando consigo 3x3x3 metros de volumen. Durante este tiempo no puede conjurar ni atacar pero si comunicarse. El líquido controlado por el mago no necesita continente, puede desplazarse en cualquier forma elegida por el mago pero no volar. Duración máxima 1 hora tras la cual el mago vuelve a su forma normal esté donde esté.', NULL, 0, 0, 0),
(21, 0, 'Árbol boxeador', 'Hechizo', 'Druídica', 2, 'Toma el control de las ramas de un árbol. Golpea BSAB+1d100 vs AC. Daño 1d100 físico. Puede apresar y lanzar. Su FUE es igual a la SAB del druida', NULL, 0, 0, 0),
(22, 0, 'Arenas movedizas', 'Hechizo', 'Tierra', 2, 'Licua el suelo por debajo de una criatura haciendo que se hunda hasta la mitad del cuerpo. Queda atrapado y para liberarse debe superar una tirada de salvación por FUE dif 70 y gastar un turno liberándose.', NULL, 0, 0, 0),
(23, 0, 'Arma mágica', 'Hechizo', 'Combate', 1, 'Invoca un arma del elemento propio del mago con las estadísticas propias del arma común, pero el daño se tira por BSAB y es mágico. Dura hasta que el mago la suelte o sea incapaz de hacer magia.', NULL, 0, 0, 0),
(24, 0, 'Asesinato', 'Habilidad', NULL, 3, 'El siguiente ataque, si impacta, es crítico.', NULL, 0, 1, 0),
(25, 0, 'Aspillera', 'Hechizo', 'Portales', 2, 'Crea dos portales de 30cm de diámetro. Se puede ver a través, pasar objetos y disparar.', NULL, 0, 0, 0),
(26, 0, 'Atrapar', 'Hechizo', 'Druídica', 2, 'Crea raíces en el suelo que atrapan al objetivo a no ser que  supere salvación por DES contra el éxito del hechizo, en cuyo caso, queda enmarañado 1 turno. Escapar dif 80 FUE/DES.', NULL, 0, 0, 0),
(27, 0, 'Aullido de socorro', 'Habilidad', 'Domabestias', 5, '1d6 bestias medianas y 1d4 bestias grandes acuden en ayuda del usuario si hay suficientes bestias en 1 km de radio. Además 1d10 bestias pequeñas acuden a montar algarabío.', NULL, 0, 1, 0),
(28, 0, 'Aura de espada', 'Kihon', 'Espadachín', 1, '1d10+BSAB de daño mágico extra por golpe a la katana.', NULL, 1, 1, 0),
(29, 0, 'Aura de viento', 'Hechizo', 'Viento', 2, 'El objetivo tiene ventaja o desventaja es todas sus tiradas de DES durante 1d4+1 turnos.', NULL, 0, 0, 0),
(30, 0, 'Avance rápido', 'Habilidad', 'Pícaro', 1, 'Desaparece en el aire y aparece en la espalda de un objetivo, rango máximo MOVx2.', NULL, 0, 1, 0),
(31, 0, 'Barbarie marcial', 'Habilidad', 'Guerrero', 3, 'Durante los 3 próximos turnos, +5 a críticos y las pifias se vuelven a tirar.', NULL, 0, 1, 0),
(32, 0, 'Barrera de ki', 'Kihon', 'Luchador', 3, 'Barrera de 3 metros de alto, 3 de largo y 1 de grosor. Dura 2 segundos pero funciona como un muro sólido impenetrable. Para hechizos hasta nivel 3, proyectiles y criaturas avanzando.', NULL, 0, 1, 0),
(33, 0, 'Barrera divina', 'Milagro', 'Sacerdote', 2, 'Crea una barrera esférica  semitransparente e impenetrable de 2m de diámetro. Dura 1 turno.', NULL, 0, 1, 0),
(34, 0, 'Barrera total', 'Hechizo', 'Combate', 4, 'Crea una barrera mágica semitransparente, solida e impenetrable. Dura 5 turnos, pero el mago puede desactivarla antes. 3m de radio sobre un punto fijo.', NULL, 0, 0, 0),
(35, 0, 'Bendecir', 'Milagro', 'Sacerdote', 3, 'Bendice a una criatura. Todas sus tiradas tendrán ventaja durante 2d4 turnos.', NULL, 0, 1, 0),
(36, 1, 'Berserk', 'Habilidad', NULL, 1, 'Ataques x2, -20% a tiradas de INT, -10AC, +2d20 daño desarmado. Consume 1p de aguante cada turno.', 'Es la de siempre, por que está marcada para revisar?', 1, 1, 1),
(37, 0, 'Bola de fuego', 'Hechizo', 'Fuego', 1, 'Proyectil de fuego. Impacta con 1d100+BDes vs AC. 1d100+BSAB de daño mágico de fuego.', NULL, 0, 1, 0),
(38, 1, 'Bola de sombras', 'Hechizo', 'Combate', 3, '4d20 de daño mágico. Si el objetivo falla tirada de SAB contra éxito del hechizo, tendrá desventaja en todas sus tiradas durante 1d4 turnos.', NULL, 0, 0, 0),
(39, 0, 'Bolsillo secreto', 'Hechizo', 'Portales', 2, 'Guarda un objeto en una dimension personal del mago. Se puede recuperar en cualquier momento de forma gratuita.', NULL, 0, 0, 0),
(40, 0, 'Brazos de la bestia', 'Habilidad', 'Guerrero', 1, '(gasta cada turno). +50% peso máx levantado', NULL, 1, 1, 0),
(41, 0, 'Brecha', 'Hechizo', 'Portales', 3, 'Crea un portal de transporte a un máximo de 20m de distancia. No es necesario ver la posición de destino si el mago conoce la zona. El portal dura 3 horas. Toda criatura que lo atraviese será transportada.', NULL, 0, 0, 0),
(42, 0, 'Brisa', 'Hechizo', 'Viento', 1, 'Provoca una pequeña brisa (agradable o incómoda, a elección del mago) en un área de hasta 50m de diámetro. Activo hasta que el mago decida cancelarlo o sea incapaz de hacer magia.', NULL, 0, 1, 1),
(43, 0, 'Calmar el alma', 'Habilidad', 'Domabestias', 2, 'El domador tranquiliza a una bestia objetivo de tamaño grande o inferior.', NULL, 0, 1, 0),
(44, 0, 'Calmar la manada', 'Habilidad', 'Domabestias', 4, 'El domador tranquiliza hasta 5 animales medianos, 3 grandes, 2 enormes o 1 gargantuesco si supera una tirada enfrentada de CAR contra la bestia.', NULL, 0, 1, 0),
(45, 0, 'Calor desértico', 'Hechizo', 'Viento', 3, 'Aumenta la temperatura en un área de hasta 50 metros de diámetro durante 3 turnos. Toda criatura deberá superar una tirada de CON dif 75 o sufrirá un -20 a tiradas. La temperatura ronda los 50ºC. El mago puede decidir mantener el área de calor desértico otros 3 turnos pagando de nuevo el coste.', NULL, 0, 0, 0),
(46, 0, 'Cambio climático', 'Hechizo', 'Viento', 4, 'Cambia es estado atmosférico al que el mago decida en un área de 10km.', NULL, 0, 0, 0),
(47, 0, 'Cambio de estado', 'Hechizo', 'Agua', 3, 'El mago se vuelve líquido. Es inmune al daño físico y puede moverse a voluntad, pero sufre el doble de daño de fuego. Paga el coste cada dos turnos. Volver al estado sólido es una acción gratuita.', NULL, 1, 0, 0),
(48, 0, 'Camuflaje', 'Habilidad', 'Domabestias', 2, 'El usuario y sus bestias se camuflan en un entorno natural y pueden moverse en sigilo. Los enemigos que intenten detectarlos reciben una penalización de -20 a tiradas de percepción.', NULL, 0, 1, 0),
(49, 0, 'Canción del titiritero', 'Hechizo', 'Canción', 4, 'Un solo objetivo. Si supera una tirada enfrentada de CAR, el bardo dirige las acciones físicas del objetivo con su música hasta que decida parar o sea interrumpido.', NULL, 1, 1, 0),
(50, 0, 'Carga celestial', 'Milagro', 'Paladín', 1, 'Añade 1d100 al daño de embestida de tu montura.', NULL, 0, 1, 0),
(51, 0, 'Carga de Ki', 'Kihon', 'Luchador', 1, 'Activable. Añade 1d10+5 de daño mágico al pelear desarmado cuerpo a cuerpo.', NULL, 1, 1, 0),
(52, 0, 'Carga imperiosa', 'Habilidad', NULL, 1, 'Aumenta la distancia de carga en un 50% y el bonificador de carga es +10.', NULL, 0, 1, 0),
(53, 0, 'Celeridad', 'Kihon', 'Luchador', 2, 'Activable. Consume maná cada turno. Peleando desarmado concede el doble de ataques por turno.', NULL, 1, 1, 0),
(54, 0, 'Chispas', 'Hechizo', 'Básica', 1, 'Usa el maná para crear pequeños chisporroteos de luz de colores en el aire.', NULL, 0, 1, 1),
(55, 0, 'Circulo de poder', 'Hechizo', 'Druídica', 1, 'Circulo de 1m de radio que aumenta un 50% la efectividad de todos los hechizos lanzados desde su interior. Dura 3 turnos.', NULL, 0, 0, 0),
(56, 0, 'Círculo ígneo', 'Hechizo', 'Fuego', 2, 'Radio 2 metros, grosor 50 cm. 3d20 daño x turno al contacto. Dura 3 turnos.', NULL, 0, 0, 0),
(57, 0, 'Cirugía de combate', 'Habilidad', NULL, 3, 'Cada turno que se usa sobre un aliado cura 3d20 HP. Necesita contacto y consume todo el turno. Solo efectivo con heridas, no con enfermedades. Si el objetivo es un animal, cura 6d20+30', NULL, 0, 1, 0),
(58, 0, 'Clarividencia', 'Hechizo', 'Básica', 4, 'Permite ver el presente en tiempo real de una criatura o localización conocida durante un turno (6s). Se puede mantener consumiendo 3 puntos de mana por turno extra. Mientras está activo el mago no puede realizar ninguna acción ni es consctiente de su entorno. Se interrumpe si recibe daño. Si se utiliza un objeto relacionado puede bajar la dificultad entre 10 y 30.', NULL, 1, 0, 0),
(59, 0, 'Cocinar', 'Hechizo', 'Doméstica', 1, 'Prepara una comida a partir de los ingredientes, caliente o fría, que el mago sepa preparar a mano. Tarda el mismo tiempo pero no necesita intervención ni supervisión.', NULL, 0, 0, 0),
(60, 0, 'Combo divino', 'Milagro', 'Paladín', 1, 'El paladín tiene 2 ataques este turno.', NULL, 0, 1, 0),
(61, 0, 'Contraataque', 'Kihon', NULL, 2, 'El monje anuncia durante su turno que guarda su acción y se apunta un contraataque. Cuando él decida durante el mismo combate, podrá evitar de forma gratuíta un ataque que vaya a impactarle y realizar un ataque de oportunidad.', NULL, 0, 1, 0),
(62, 0, 'Contragolpe marcial', 'Habilidad', 'Soldado', 4, 'Adoptas una pose de guardia y bloqueas el siguiente ataque físico recibido, devolviendo una estocada que, de impactar (con ventaja), realiza daño crítico.', NULL, 0, 1, 0),
(63, 0, 'Copiar libro', 'Hechizo', 'Doméstica', 1, 'Copia el contenido de un libro o manuscrito. Necesita los materiales (Papel y tinta). Si se dispone de madera y cuero también se encuadernará.', NULL, 0, 0, 0),
(64, 0, 'Corriente', 'Hechizo', 'Agua', 3, 'Crea una corriente de agua en una zona de hasta 5m×5m. Cada turno, las criaturas en el área tiran FUE/DES vs exito del hechizo para no ser arrastradas. Dura 3 turnos.', NULL, 0, 0, 0),
(65, 0, 'Corte devoto', 'Milagro', 'Paladín', 2, 'Añade 1d100 de daño mágico a este ataque.', NULL, 0, 1, 0),
(66, 0, 'Corte largo', 'Kihon', 'Espadachín', 2, 'Lanza una onda de Ki con la katana. Puede atacar objetivos hasta a 15m de distancia. Este ataque inflige daño mágico', NULL, 0, 1, 0),
(67, 0, 'Crear flora', 'Hechizo', 'Druídica', 2, 'Crea una planta o árbol de hasta 3 metros de altura.', NULL, 0, 0, 0),
(68, 0, 'Cristalizar', 'Hechizo', 'Agua', 4, 'Congela todo el agua en un radio de 40m. Las criaturas mojadas también quedan congeladas 2d4 turnos sufriendo 3d20 puntos de daño de frío por turno y quedando completamente inmovilizadas.', NULL, 0, 0, 0),
(69, 0, 'Cuchilla de aire', 'Hechizo', 'Viento', 3, 'Lanza hasta 3 proyectiles de aire. 0 daño, pero crítico de corte directo. Cada proyectil se tira 1d100+BDES vs AC como cualquier proyectil.', NULL, 0, 0, 0),
(70, 0, 'Cura en área', 'Hechizo', 'Druídica', 3, '+1d100 HP  a todos los aliados en 10 metros radio', NULL, 0, 0, 0),
(71, 0, 'Curación', 'Milagro', 'Sacerdote', 1, 'Otorga 1d100/2+BSAB HP a distancia en línea de visión. +1d100+BSAB HP contacto', NULL, 0, 1, 0),
(72, 0, 'Curación mágica', 'Hechizo', 'Druídica', 1, '+1d100/2 HP a un objetivo a distancia en línea de visión. +1d100 HP contacto.', NULL, 0, 0, 0),
(73, 0, 'Daga de desarme', 'Habilidad', 'Pícaro', 1, 'Lanza una daga a un objeto que el objetivo lleve encima. Tirada enfrentada FUE/DES vs DES. Si falla, suelta el objeto.', NULL, 0, 1, 0),
(74, 0, 'Daga, daga', 'Habilidad', NULL, 1, 'Lanza dos dagas al objetivo, la segunda impacta con ventaja.', NULL, 0, 1, 0),
(75, 0, 'Dagazo certero', 'Habilidad', 'Pícaro', 2, 'El ataque acierta siempre (tirar pifia/crítico)', NULL, 0, 1, 0),
(76, 0, 'Desangrar', 'Habilidad', 'Pícaro', 2, 'Lanza un dagazo a un órgano vital/arteria. Añade 1d20 al crítico. Dado de daño +50%.', NULL, 0, 1, 0),
(77, 0, 'Descarga de ki', 'Kihon', NULL, 1, 'Inflige 1d100+BSAB a un objetivo cuerpo a cuerpo.', NULL, 0, 1, 0),
(78, 0, 'Dimensión espejo', 'Hechizo', 'Portales', 4, 'Transporta a todas las criaturas que el mago decida en área de 50m de radio a una nueva dimensión idéntica, desde la que es imposible interactuar con la original. A los 10 minutos todos vuelven a la original.', NULL, 0, 0, 0),
(79, 0, 'Disonancia', 'Hechizo', 'Canción', 2, 'Toca un acorde malsonante que interrumpe el siguiente turno del objetivo.', NULL, 0, 1, 0),
(80, 0, 'Disparo aturdidor', 'Habilidad', NULL, 3, 'El objetivo debe superar salvación  por FUE contra dif. igual al éxito del ataque. Si la supera, cae arrodillado o sentado a 1d4 metros Si no la supera sale despedido 1d6+2 metros y cae tumbado.', NULL, 0, 1, 0),
(81, 0, 'Disparo certero', 'Habilidad', NULL, 2, 'Éxito automático al atacar, pero se tira crítico/pifia.', NULL, 0, 1, 0),
(82, 0, 'Disparo de aire', 'Hechizo', 'Viento', 1, 'Proyectil de aire. Impacta con 1d100+BDES vs AC. Daño mágico 1d100+BSAB-10. Empuja 1d4m', NULL, 0, 1, 0),
(83, 0, 'Disparo de desarme', 'Habilidad', 'Cazador', 1, 'Lanza una daga a un objeto que el objetivo lleve encima. Tirada enfrentada FUE/DES vs DES. Si falla, suelta el objeto', NULL, 0, 1, 1),
(84, 0, 'Disparo doble', 'Habilidad', NULL, 1, 'Carga 2 flechas en el mismo disparo. Impacta con desventaja pero añade 50% al daño.', NULL, 0, 1, 0),
(85, 0, 'Disparo triple', 'Habilidad', NULL, 3, 'Dispara 3 flechas en rápida sucesión. Decir objetivos antes de tirar impactos. Si las 3 van al mismo, segunda y tercera impactan con ventaja. Si cambia objetivos, 2a y 3a impactan con desventaja.', NULL, 0, 1, 0),
(86, 0, 'Doble equipo', 'Kihon', NULL, 3, 'Crea hasta 3 copias ilusorias del usuario. Las puede mover a voluntad, pero se desvanecen si entran en contacto con algún objeto sólido  o se alejan más de 10m.', NULL, 0, 1, 0),
(87, 0, 'Doble velocidad', 'Habilidad', 'Pícaro', 3, 'Durante los próximos 2 turnos, el número de ataques y movimiento se multiplica por dos.', NULL, 0, 1, 0),
(88, 0, 'Ejecución', 'Habilidad', NULL, 3, 'Tajo a un órgano vital de un enemigo fuera de posición de guardia (tumbado, sentado, dormido, atado, enmarañado, paralizado...) que impacta siempre (tirar pifia/crítico).', NULL, 0, 1, 0),
(89, 0, 'El filo del ki', 'Kihon', 'Espadachín', 4, 'Gasta un turno en concentrar Ki a lo largo del filo de la katana, durante el cual es invulnerable a todo ataque físico y no puede ser interrumpido. El siguiente turno, descarga una serie de ondas de luz flagrante en un cono de 30 grados y 10 metros de largo hacia donde apunte la espada. Si durante el turno de concentración su vida se reduce a 0 por daño mágico, cae inconsciente tras soltar el ataque. Cada enemigo impactado recibe 1d100+50+BSAB de daño mágico.', NULL, 0, 1, 0),
(90, 0, 'Embate de escudo', 'Habilidad', NULL, 1, 'Golpeas al enemigo con el borde del escudo produciendo 1d20 de daño aplastante. Enemigo -15 a tiradas en próximo turno.', NULL, 0, 1, 0),
(91, 0, 'Embelesar', 'Hechizo', 'Canción', 2, 'Embelesa un objetivo si supera una tirada enfrentada de CAR haciendo que todas las tiradas sociales del bardo hacia él se tiren con ventaja y las del objetivo hacia el bardo se tiren con desventaja. Dura 24h.', NULL, 0, 0, 0),
(92, 0, 'Encadenar', 'Milagro', 'Sacerdote', 2, 'Unos grilletes de luz encadenan al objetivo (-40 a acciones -30 a AC y no se puede mover). Para escapar debe utilizar una acción para superar una tirada de SAB dif 70).', NULL, 0, 1, 0),
(93, 0, 'Endurecer', 'Hechizo', 'Básica', 3, 'Protege un objeto de hasta 2kg de masa durante una hora de forma que no se puede romper ni dañar de ninguna forma física.', NULL, 0, 0, 0),
(94, 1, 'Enmascarar', 'Hechizo', 'Básica', 1, 'Oculta un hechizo activo. La dificultad será la dificultad base para lanzarlo +10 y el coste será igual al hechizo a ocultar. Añade 20 de dificultad a la hora de detectar magia.', NULL, 0, 0, 0),
(95, 0, 'Enredar', 'Hechizo', 'Básica', 2, 'Anima objetos cercanos como cuerdas o ropa para que atrapen a un objetivo. Para librarse debe superar una tirada de FUE/DES contra el éxito del hechizo. La dificultad de ésta tirada bajará en 10 cada turno que pase atrapado.', NULL, 0, 0, 0),
(96, 0, 'Enroque', 'Hechizo', 'Portales', 3, 'Intercambia la posición del mago con la de otra criatura a la vista.', NULL, 0, 0, 0),
(97, 0, 'Ensañamiento', 'Habilidad', 'Soldado', 2, 'El siguiente ataque tiene un +20 al crítico.', NULL, 0, 1, 0),
(98, 0, 'Envenenar', 'Hechizo', 'Druídica', 3, 'El objetivo tira salvación por CON contra el éxito del hechizo. Si falla, recibe 2d20 daño cada turno, -15 a tiradas y -15 AC.', NULL, 0, 0, 0),
(99, 0, 'Erupción', 'Hechizo', 'Agua', 2, 'Sale un chorro de agua del el suelo, repeliendo 1d4 metros a todas las criaturas en un diametro de 5m y empapándolo todo en un área de 10m de diámetro.', NULL, 0, 0, 0),
(100, 0, 'Escudo humano', 'Habilidad', 'Domabestias', 3, 'El domador crea un vínculo mágico y recibe el daño que fuese a recibir su bestia vinculada durante el siguiente turno.', NULL, 0, 1, 0),
(101, 0, 'Escudo mágico básico', 'Hechizo', 'Combate', 1, 'Escudo de 2m de radio desde el mago. Absorbe la ½ de daño mágico y ⅓ de daño físico hasta un máximo de 500 puntos. Dura 3 turnos. Hace 2d20 puntos de daño mágico al atravesarlo.', NULL, 0, 0, 0),
(102, 0, 'Espiar', 'Habilidad', 'Pícaro', 3, 'El personaje es capaz de escuchar todo lo que ocurre en un lugar como si estuviera presente. 50m de rango. Dura 15 minutos.', NULL, 0, 1, 0),
(103, 0, 'Estocada certera', 'Milagro', 'Paladín', 2, 'Aumenta el crítico en 15 para el siguiente golpe.', NULL, 0, 1, 0),
(104, 0, 'Explosión', 'Hechizo', 'Fuego', 3, 'El objetivo recibe 2d100 daño de fuego y sale despedido 1d6+2 metros.', NULL, 0, 0, 0),
(105, 0, 'Falla', 'Hechizo', 'Tierra', 5, 'Crea una grieta en el suelo de hasta 10×5×3m. Cualquier criatura encima debe superar una tirada de DES dif 100 o caerá al fondo. En cualquier momento el mago puede cerrarla haciendo que las criaturas en su interior sufran 1d100 de daño aplastante por turno. Para liberarse deben superar tirada de FUE dif 80.', NULL, 0, 0, 0),
(106, 0, 'Farol', 'Hechizo', 'Básica', 1, 'Bola de luz. El mago puede modificar su tamaño y posición a voluntad. Dura hasta que decida apagarla o sea incapaz de hacer magia.', NULL, 0, 1, 0),
(107, 0, 'Fénix de llamas', 'Hechizo', 'Fuego', 5, 'Invoca un pájaro de fuego que arrasa una zona de 3x20 metros. Todo ser vivo sufre 4d100 daño y cae al suelo: Sin tirada de salvación.', NULL, 0, 0, 0),
(108, 0, 'Festín de los héroes', 'Habilidad', NULL, 5, 'Prepara un banquete grandioso para un máximo de 6 criaturas. Necesita 100 monedas de oro en ingredientes. Cura y otorga inmunidad contra enfermedades menores, venenos  y terror, da ventaja a tiradas de salvación por SAB y +8d10 puntos de HP máxima. Dura 24h.', NULL, 0, 1, 0),
(109, 0, 'Flash', 'Hechizo', 'Combate', 1, 'Ciega a los enemigos en un cono de 45º y 20m desde la posición del mago durante 1d4 turnos. Si superan una tirada de Sabiduría contra la tirada del mago sólo quedan deslumbrados un turno. Si llevan capuchas grandes u otras prendas que cubran la cara tiran con ventaja.', NULL, 0, 0, 0),
(110, 0, 'Flecha de hielo', 'Hechizo', 'Agua', 1, 'De la punta del báculo sale un carámbano con forma de flecha. Impacta con 1d100+BDES vs AC y hace 1d100+BSAB de daño de hielo', NULL, 0, 1, 0),
(111, 0, 'Forma animal', 'Hechizo', 'Druídica', 4, 'Toma la forma de un animal a elección durante un máximo de 5 horas. Al cumplirse el tiempo, si no vuelve a su forma natural, podrá quedar convertido en ese animal para siempre (a decisión del Master)', NULL, 0, 0, 0),
(112, 0, 'Foso de lava', 'Hechizo', 'Fuego', 4, 'Agujero lleno de lava de 1 metro de radio bajo el enemigo. 1D100 daño x turno y funde metal en contacto con la lava.', NULL, 0, 0, 0),
(113, 0, 'Galletas mágicas', 'Hechizo', 'Doméstica', 1, 'Crea 12 galletas de la nada. Cuanta más experiencia tenga el mago con el hechizo, más ricas estarán.', NULL, 0, 0, 0),
(114, 0, 'Golpe alfa', 'Kihon', NULL, 3, 'Se vuelve intangible y golpea hasta 3 objetivos en un radio de 15m tras lo cual vuelve a su posición inicial. No genera ataques de oportunidad', NULL, 0, 1, 0),
(115, 0, 'Golpe de pomo', 'Habilidad', NULL, 1, 'Sujetas la espada a medio filo y golpeas con el agarre, reduciendo la AC enemiga en 15. El daño pasa a ser aplastante pero reduce 15 puntos al dado de daño.', NULL, 0, 1, 0),
(116, 0, 'Golpe del norte', 'Habilidad', 'Guerrero', 2, 'Otorga +15 al critico de impacto y +50% al dado de daño a este ataque.', NULL, 0, 1, 0),
(117, 0, 'Golpe sagrado', 'Milagro', 'Paladín', 2, 'El daño de este ataque evita armadura.', NULL, 0, 1, 0),
(118, 0, 'Grito de Baalum', 'Milagro', 'Paladín', 4, 'Escoge un objetivo maligno. Si supera una tirada de salvación por SAB dificultad 120, recibe 2d100 de daño directo. Si no la supera, un haz de luz sagrada lo desintegra por completo dejando sus pertenencias intactas', NULL, 0, 1, 0),
(119, 0, 'Grito de guerra', 'Habilidad', NULL, 1, 'Inspira a aliados en 15m de radio otorgándoles +1d10 en tiradas de habilidad, impacto, salvación', NULL, 0, 1, 0),
(121, 0, 'Himno de batalla', 'Hechizo', 'Canción', 1, 'Canción continua. Da 1d10 por turno a objetivos aliados. Éstos deciden en qué usarlo. No acumulable.', NULL, 1, 1, 0),
(122, 0, 'Himno de curación', 'Hechizo', 'Canción', 1, 'Canción continua. Regenera 1d20+5 por turno a todos los objetivos aliados.', NULL, 1, 1, 0),
(123, 0, 'Himno de defensa', 'Hechizo', 'Canción', 2, 'Canción continua. Añade 20 a la AC de objetivos aliados.', NULL, 1, 1, 0),
(124, 0, 'Himno de prisa o de pereza', 'Hechizo', 'Canción', 2, 'Canción continua. Un solo objetivo. El objetivo ve recibe x2 a su MOV y su número de acciones +1 o reduce su MOV a la mitad y tiene un penalizador de -20 a todas sus tiradas.', NULL, 1, 1, 0),
(125, 0, 'Ilusiones acuáticas', 'Hechizo', 'Agua', 1, 'Crea imágenes tridimensionales a partir de grandes cantidades de agua. Máximo de 3 imágenes y 5 metros cúbicos de volúmen. Funciona en la lluvia.', NULL, 0, 0, 0),
(126, 0, 'Ilusiones acuáticas +', 'Hechizo', 'Agua', 4, 'El mago utiliza el vapor de agua en el aire para reflectar la luz a su antojo y crear hasta 3 imágenes tridimensionales con un volúmen máximo de 5x5x5.', NULL, 0, 0, 0),
(127, 0, 'Imperceptibilidad', 'Kihon', NULL, 2, 'Se queda tan quieto que nadie es capaz de percibirlo (INT dif 95). Se interrumpe al moverse, excepto para comer un yogur.', NULL, 0, 1, 0),
(128, 0, 'Impermeabilizar', 'Hechizo', 'Doméstica', 1, 'Impermeabiliza un objeto durante 24h.', NULL, 0, 0, 0),
(129, 0, 'Improvisación vituosa', 'Hechizo', 'Canción', 3, 'Realiza una tirada de CAR con bono +30. Todo objetivo que no la supere queda prendado hasta recibir daño o termine la música', NULL, 1, 1, 0),
(130, 0, 'Inmunidad divina', 'Milagro', 'Sacerdote', 3, 'Durante el siguiente turno es inmune al daño que decida (físico, mágico, fuego, electrico...)', NULL, 0, 1, 0),
(131, 0, 'Insonorizar', 'Hechizo', 'Básica', 3, 'Aísla una habitación o área de 20m de diámetro evitando que se pueda escuchar desde fuera, tanto por medios mágicos como mundanos. Se mantiene hasta que el mago decida terminarlo o sea incapaz de hacer magia.', NULL, 0, 0, 0),
(132, 0, 'Inspirar', 'Milagro', NULL, 1, 'Todos los aliados en un área de 50m obtienen 1d20 que pueden sumar a cualquier tirada en un plazo de 24h. No acumulable.', NULL, 0, 1, 0),
(133, 0, 'Justicia divina', 'Milagro', 'Paladín', 3, 'En un área de 5x5x5 inflinge 4d100 daño directo (evita armadura) a seres malignos. Si superan una tirada de salvación por SAB dificultad 100, sólo reciben 1d100 daño directo.', NULL, 0, 1, 0),
(134, 0, 'La mano de Baalum', 'Milagro', NULL, 5, 'El paladín reza a Baalum para que intervenga directamente. 10% de probabilidades de éxito. (a decisión del Master)', NULL, 0, 1, 0),
(135, 0, 'Lamento de Banshee', 'Hechizo', 'Canción', 5, 'El objetivo que la escuche sufre una intensa agonía y muere tras 3 turnos. El bardo está en trance durante los 3 turnos y no puede decidir por sí mismo interrumpir la canción', NULL, 1, 0, 0),
(136, 0, 'Lanza helada', 'Hechizo', 'Agua', 2, 'Crea una lanza de hielo. Si permanece clavada un turno completo, congela a la criatura herida. (Mano y media, daño punzante, impacto 1d100+BDES-5, crit 99+, daño 1d100+BSAB+10)', NULL, 0, 0, 0),
(137, 0, 'Latigazo', 'Hechizo', 'Combate', 2, 'Hace 2d20+BSAB de daño mágico sin dejar marcas visibles. No puede reducir HP por debajo de 1 ni hacer más daño por localización o hacer críticos. El mago puede elegir localización.', NULL, 0, 0, 0),
(138, 0, 'Lavar', 'Hechizo', 'Doméstica', 1, 'Limpia hasta una habitación 5x5 por punto de maná gastado.', NULL, 0, 0, 0),
(139, 0, 'Levitar', 'Hechizo', 'Básica', 1, 'El mago levita a un máximo de 50cm de altura. Velocidad máxima equivalente a caminar (MOV/3). Dura hasta que el mago decida parar o sea incapaz de hacer magia.\r\n/* Añadí la restricción de velocidad. Igual hay que hacer cálculos */', NULL, 0, 0, 0),
(140, 1, 'Limpiar Mal de Ojo', 'Hechizo', 'Básica', 4, 'Reduce en un nivel la habilidad pasiva \"Malapata\". Solo se puede utilizar una vez al día en cada objetivo.', NULL, 0, 0, 0),
(141, 0, 'Llama del dragón', 'Hechizo', 'Fuego', 4, '3d100 daño en un cono de 45º x 10 metros. Este fuego funde el metal que se encuentre en su camino.', NULL, 0, 0, 0),
(142, 0, 'Lluvia de flechas', 'Habilidad', 'Cazador', 4, 'Gasta 10 flechas. 3d100 daño a toda criatura en 5 metros de radio. Máxima distancia 100 metros del tirador.', NULL, 0, 1, 0),
(143, 0, 'Lluvia de fuego', 'Hechizo', 'Fuego', 2, 'Afecta una zona de 3 metros de radio. 4d20 daño a toda criatura en su interior', NULL, 0, 0, 0),
(144, 0, 'Lluvia de témpanos', 'Hechizo', 'Agua', 2, 'Provoca que lluevan témpanos de hielo en un área de 6m de diametro, infligiendo 5d20 puntos de daño punzante.', NULL, 0, 0, 0),
(145, 0, 'Lluvia mágica', 'Hechizo', 'Viento', 2, 'Llueve durante 5 turnos en un área de 100 metros de diámetro. Bajo esta lluvia, los hechizos elementales de viento consumen 1 punto menos de maná', NULL, 0, 0, 0),
(146, 0, 'Luz mágica', 'Hechizo', 'Básica', 1, 'Ilumina una zona de 15m de radio alrededor del mago. Dura hasta que el mago decida apagarla o sea incapaz de hacer magia.', NULL, 0, 1, 1),
(147, 0, 'Luz sagrada', 'Milagro', 'Paladín', 2, 'Haz de luz de 5 metros de radio a máx 30 metros de distancia en línea de visión. Cura 20+(1d100/2) a aliados y a sí mismo dentro del área.', NULL, 0, 1, 0),
(148, 0, 'Maelstrom', 'Kihon', 'Espadachín', 4, 'Gira sobre sí mismo. Todos los objetivos en un radio de 5m sufren 4d20 de daño cortante. Si no superan una tirada de salvación por DES dif 90 son derribados.', NULL, 0, 1, 0),
(149, 1, 'Mal de Ojo', 'Hechizo', 'Básica', 4, 'Aumenta en un nivel la habilidad pasiva \"Malapata\". Solo se puede utilizar una vez al día en cada objetivo.', NULL, 0, 0, 0),
(150, 0, 'Mano de fuego', 'Hechizo', 'Fuego', 1, 'Agarra objetos o criaturas de hasta 60kg. 1d20 de daño de fuego por turno al contacto. Dura 3 turnos. Para escapar se necesita tirada de FUE/DES dificultad 70.', NULL, 0, 0, 0),
(151, 0, 'Máquina de asedio', 'Habilidad', 'Guerrero', 4, 'Permite al guerrero tribal realizar daño de asedio a estructuras. 1d20 por puñetazo. Dura 1 hora', NULL, 0, 1, 0),
(152, 0, 'Marca del cazador', 'Habilidad', 'Cazador', 1, 'Se coloca sobre un objetivo y aumenta el daño recibido de cualquier criatura en 1d10. El cazador es consciente de su posición, y obtiene +40 a tiradas para rastrearlo', NULL, 0, 1, 0),
(153, 0, 'Matar', 'Habilidad', NULL, 5, 'Si el objetivo está a 100HP o menos, lo mata directamente evitando todo tipo de armadura.', NULL, 0, 1, 0),
(154, 0, 'Mecha-Golem', 'Hechizo', 'Tierra', 5, 'Invoca un mecha-golem de piedra. Dentro del gólem sólo puede recibir daño mágico o de asedio. HP del mago +300, AC+20. BFUE +50. ', NULL, 0, 0, 0),
(155, 0, 'Mensaje mágico', 'Hechizo', 'Básica', 1, 'Envía un mensaje escrito a una criatura que el mago conozca.', NULL, 0, 1, 1),
(156, 1, 'Mensaje múltiple', 'Hechizo', 'Básica', 3, 'Envía un mensaje escrito a un grupo de criaturas. Consume una lista de nombres. La lista puede estar escrita por varias personas.', NULL, 0, 0, 0),
(157, 0, 'Mi nombre es...', 'Habilidad', 'Guerrero', 3, 'Grita en la lengua de los bárbaros. Objetivos en un radio de 15m que no superen salvación por CAR dificultad 100 huyen despavoridos durante 1d10 minutos.', NULL, 0, 1, 0),
(158, 0, 'Moldear naturaleza', 'Hechizo', 'Druídica', 3, 'Abre caminos en flora espesa, modela árboles, cuevas, aparta el bosque para crear un claro. Mueve hasta 5x5x5 metros.', NULL, 0, 0, 0),
(159, 0, 'Moldear piedra', 'Hechizo', 'Tierra', 2, 'Modifica la forma de la piedra. Puede desplazar o esculpir un volumen de hasta 5×5×5m. ', NULL, 0, 0, 0),
(160, 1, 'Mover agua', 'Hechizo', 'Agua', 1, 'Permite mover masas de agua de hasta 100l (media bañera, aprox). Puede gastar maná extra para aumentar la cantidad (50l/p)', 'Dowgrade de T2 a T1. Cantidad a la mitad, pero puede mover más con mana extra.', 0, 0, 0),
(161, 0, 'Muiñeira da morriña', 'Hechizo', 'Canción', 4, 'Interpreta una vieja canción enana que obliga a los objetivos que la escuchen a volver a sus hogares si no superan una tirada de CAR enfrentada con el bardo. No afecta a personajes sin familia/hogar. El efecto dura 1d10 días o hasta que lleguen a su destino si el bardo saca crítico.', NULL, 1, 1, 0),
(162, 0, 'Muro de fuego', 'Hechizo', 'Fuego', 1, 'Crea un muro de 5×1 metros. 3D20 de daño de fuego al contacto. Dura 3 turnos.', NULL, 0, 0, 0),
(163, 0, 'Muro de tierra', 'Hechizo', 'Tierra', 2, 'Levanta el suelo en un muro delante de sí mismo de 2 de alto y 2 de ancho con un grosor de 1 metro. El muro aguanta 300 puntos de daño mágico o asedio', NULL, 0, 0, 0),
(164, 0, 'Muro de viento', 'Hechizo', 'Viento', 2, 'Crea un muro de viento de 3m de longitud. Da cobertura 3/4 y los proyectiles que lo atraviesan tiran daño con desventaja. El muro dura 2 turnos.', NULL, 0, 0, 0),
(165, 0, 'Nana', 'Hechizo', 'Canción', 3, 'El bardo toca una pieza corta que duerme a los objetivos durante 1d10 horas a no ser que superen una tirada de CAR contra el bardo.', NULL, 1, 1, 0),
(166, 0, 'No hay dolor', 'Kihon', 'Blindado', 1, 'Activable, reduce todo el daño recibido en 1/3. Gasta ki cada turno.', NULL, 1, 1, 0),
(167, 0, 'Ojo de halcón', 'Habilidad', 'Cazador', 1, 'El siguiente ataque apunta sin desventaja.', NULL, 0, 1, 0),
(168, 0, 'Ojo del cazador', 'Habilidad', 'Cazador', 3, 'Revela criaturas ocultas en un radio de 25 metros.', NULL, 0, 1, 0),
(169, 0, 'Onda de ki', 'Kihon', 'Luchador', 2, 'Lanza un proyectil de Ki hacia un objetivo. 1d100+BDES vs AC para impactar. Si impacta, ignora armadura. 1d100+BSAB de daño mágico.', NULL, 0, 1, 0),
(170, 0, 'Orden directa', 'Habilidad', 'Soldado', 3, 'Si el objetivo no supera una tirada de CAR enfrentada , hará caso a una orden simple que le dés. (si el objetivo es enemigo directo, el que da la orden tira con desventaja, a decisión del Master)', NULL, 0, 1, 0),
(171, 0, 'Pacificar', 'Milagro', NULL, 2, 'El objetivo suelta su arma. Si falla tirada de CAR dif 70 será incapaz de tocar voluntariamente cualquier arma durante una hora.', NULL, 0, 1, 0),
(172, 0, 'Paraguas', 'Hechizo', 'Doméstica', 1, 'Cubre de la lluvia (y otros líquidos u objetos diminutos) un área de hasta 5m de diametro alrededor del mago. Se mantiene hasta que el mago decida terminarlo o sea incapaz de hacer magia.', NULL, 0, 0, 1),
(173, 0, 'Paralizar', 'Hechizo', 'Druídica', 2, 'Paraliza al objetivo durante  1d4 turnos. Si supera salvación por SAB contra el éxito del hechizo, solo 1 turno.', NULL, 0, 0, 0),
(174, 0, 'Paréntesis', 'Hechizo', 'Portales', 4, 'Crea una burbuja temporal de 1m de radio en la que el usuario puede quedarse hasta 3 turnos mientras que en el exterior el tiempo se detiene. Si intenta interactuar con cualquier cosa del exterior, se interrumpe.', NULL, 0, 0, 0),
(175, 0, 'Paso de sombras', 'Habilidad', 'Pícaro', 2, 'Superando una tirada de Sigilo dif INT del objetivo u objetivos, desaparece totalmente de la vista siempre que tenga una sombra en la que ocultarse.', NULL, 0, 1, 0),
(176, 0, 'Patada de Baalum', 'Kihon', 'Luchador', 3, 'Patada giratoria a la cabeza que noquea al adversario si no supera una tirada de CON dif 80. Hace el daño normal de una patada.', NULL, 0, 1, 0),
(177, 0, 'Pedrada', 'Hechizo', 'Tierra', 1, 'Una piedra sale disparada hacia el objetivo. Impacta con 1d100+BDES vs AC y hace 1d100+BSAB de daño aplastante.', NULL, 0, 1, 0),
(178, 0, 'Perímetro ', 'Habilidad', 'Cazador', 2, 'Afecta un área de hasta 40m de diametro. El usuario tiene ventaja en todas las tiradas de percepción en su interior. Dura 8 horas.', NULL, 0, 1, 0),
(179, 0, 'Perímetro mágico', 'Hechizo', 'Básica', 2, 'Afecta un área de hasta 40m de diametro. Si cualquier objeto mágico entra, el mago lo sabrá de imediato. Si está durmiendo se despierta. No revela la posición del objeto dentro del área. Dura 8 horas.', NULL, 0, 0, 0),
(180, 0, 'Petrificar', 'Hechizo', 'Tierra', 4, 'Convierte en una estatua de piedra al objetivo hasta que alguien deshaga el hechizo. También valen métodos que restauren estados alterados. Si supera tirada de SAB dif 80 solo queda paralizado 1d4 turnos.', NULL, 0, 0, 0),
(181, 0, 'Piel de acero', 'Hechizo', 'Tierra', 4, 'El mago cambia su piel por acero. Durante los siguientes 3 turnos el daño físico recibido se anula.', NULL, 0, 0, 0),
(182, 0, 'Piel de hierro', 'Hechizo', 'Tierra', 3, 'El mago endurece su piel en forma de hierro. Durante los siguientes 3 turnos el daño físico se reduce en 3d20', NULL, 0, 0, 0),
(183, 0, 'Planchar', 'Hechizo', 'Doméstica', 1, 'Plancha hasta un armario de ropa por punto de mana gastado.', NULL, 0, 0, 0),
(184, 0, 'Plataforma', 'Hechizo', 'Portales', 3, 'Crea una plataforma sólida de hasta 20m de diametro. Dura 5 turnos, pero se puede volver a pagar el coste para alargar la duración.', NULL, 0, 0, 0),
(185, 0, 'Poder divino', 'Milagro', 'Paladín', 3, 'Cono de luz sagrada 45º y 30 metros de longitud. Inflinge 2d100+BSAB daño a seres malignos y cura 1d100+BSAB a aliados en el área.', NULL, 0, 1, 0),
(186, 0, 'Portal avanzado', 'Hechizo', 'Portales', 5, 'Teletransporta a todas las criaturas en 5m de radio a un círculo de teletransporte previamente preparado en un rango máximo de 500km.', NULL, 0, 0, 0),
(187, 0, 'Portal básico', 'Hechizo', 'Portales', 3, 'El mago utiliza una dimensión paralela para transportarse a un máximo de 20 metros dentro de su rango de visión. Puede pagar 2 puntos de maná por turno para quedarse en esa dimensión paralela desde la que ve todo lo que pasa pero no puede interactuar. Cuando lo decide, aparece en un punto a 20 metros de donde desapareció de forma gratuita.', NULL, 0, 0, 0),
(188, 0, 'Potenciación', 'Kihon', NULL, 5, 'El usuario duplica todos sus bonos y tira con ventaja durante la próxima hora.', NULL, 0, 1, 0),
(189, 0, 'Presa de Mithaden', 'Kihon', 'Luchador', 4, 'Nudo con brazos y piernas alrededor del cuello del objetivo. Éste se desmaya si no supera una tirada de CON dif 100', NULL, 0, 1, 0),
(190, 0, 'Prestidigitación', 'Hechizo', 'Básica', 1, 'Mueve en el aire pequeños objetos de hasta 10kg de masa total y un máximo de 4 objetos.', NULL, 0, 0, 0),
(191, 0, 'Presurizar', 'Hechizo', 'Viento', 1, 'Aumenta drásticamente la presión alrededor del objetivo causando 2d20 de daño directo. Si falla tirada de CON dif 60 queda sordo durante 1d10 turnos.', NULL, 0, 0, 0),
(192, 0, 'Primer corte', 'Kihon', 'Espadachín', 3, 'Solo se puede usar al principio de cada combate y mientras la espada está envainada. Desenvaina la espada haciendo 3d20 en un área de 2×20m hacia delante.', NULL, 0, 1, 0),
(193, 0, 'Primeros auxilios', 'Habilidad', NULL, 1, 'Cura 1d20 y estabiliza las heridas deteniendo el sangrado. Si el objetivo es un animal 2d20+10.', NULL, 0, 1, 0),
(194, 0, 'Prisión', 'Hechizo', 'Tierra', 3, 'Crea una jaula con techo levantando el suelo alrededor de un área de 5 metros de diámetro. Los barrotes de piedra aguantan 500 puntos de daño mágico o asedio.', NULL, 0, 0, 0),
(195, 0, 'Proyección', 'Habilidad', NULL, 2, 'Lanza enemigo 1d10 metros por el aire. Este enemigo y todos con los que choque deberán superar una tirada de salvación por DES dificultad 90 o sufrirán 3d20 daño y caerán tumbados al suelo. Si la superan, 1d20 daño y caen sentados o de rodillas.', NULL, 0, 1, 0),
(196, 0, 'Proyección astral', 'Milagro', 'Sacerdote', 4, 'El sacerdote se aparece en forma de espectro a un máximo de 200 km de distancia. No puede realizar acciones físicas pero sí milagros pagando el doble de puntos de devoción.', NULL, 0, 1, 0),
(197, 0, 'Proyectil mágico', 'Hechizo', 'Combate', 1, 'Proyectil de maná. El mago lo lanza con 1d100 + BDES contra AC del objetivo. Inflige 1d100 + BSAB', NULL, 0, 1, 0),
(198, 0, 'Puerta de la muerte', 'Hechizo', 'Portales', 4, 'Crea un portal de 5m de diametro (esfera) o 10m de largo por 1m de ancho (elipsoide). Engulle todo lo que lo pisa y lo envía a una dimensión vacía. Salv DES dif 70 para esquivar. Dura 3 turnos.', NULL, 0, 0, 0),
(199, 0, 'Puño del norte', 'Habilidad', 'Guerrero', 3, 'Acción extra. Añade al combo de golpes un puñetazo de 1d100 de daño. Impacta siempre (tirar pifia/crítico)', NULL, 0, 1, 0),
(200, 0, 'Puño Od', 'Kihon', 'Luchador', 2, 'Golpea la mandíbula del objetivo de abajo arriba levantándolo en el aire y haciendo que caiga hacia atrás si no supera una tirada de CON dif 70.  Hace el daño normal de un puñetazo.', NULL, 0, 1, 0),
(201, 0, 'Puños del oso', 'Habilidad', 'Guerrero', 1, '(gasta cada turno). +50% daño desarmado', NULL, 1, 1, 0),
(202, 0, 'Purificar agua', 'Hechizo', 'Agua', 1, 'Limpia y purifica/potabiliza una masa de agua al contacto. Tarda una hora por cada tonelada (prorrateada).', NULL, 0, 0, 0),
(203, 0, 'Quemar', 'Hechizo', 'Fuego', 2, 'Prende fuego a un objetivo. 4d20 de daño. Si es inflamable sigue ardiendo.', NULL, 0, 0, 0),
(204, 0, 'Radar Divino', 'Milagro', 'Sacerdote', 1, 'Revela la posición de presencias divinas u oscuras en 1km a la redonda.', NULL, 0, 1, 0),
(205, 0, 'Raices', 'Hechizo', 'Druídica', 2, 'Objetivo tira salvación DES/FUE dif 90 o queda enmarañado (puede tirar la salvación cada turno).', NULL, 0, 1, 0),
(206, 0, 'Rayo', 'Hechizo', 'Viento', 4, 'Un rayo cae sobre un área de 5m de diámetro. Toda criatura en el área sufre 3d100 de daño eléctrico y salen despedidas 2d10m hacia el exterior. Si fallan tirada de CON contra el éxito del hechizo quedan aturdidos 1d4 turnos. Si la superan solo quedan deslumbrados.', NULL, 0, 0, 0),
(207, 0, 'Reflejo', 'Hechizo', 'Portales', 2, 'Refleja el próximo proyectil que vaya a impactar al mago y lo devuelve con la misma tirada de impacto y daño.', NULL, 0, 0, 0),
(208, 0, 'Reparar', 'Hechizo', 'Doméstica', 2, 'Arregla un objeto no mágico que se haya roto recientemente. La dificultad aumenta en 10 por cada hora que pase desde que se rompió.', NULL, 0, 0, 0),
(209, 0, 'Repetir', 'Hechizo', 'Portales', 4, 'Vuelve atrás en el tiempo permitiendo al mago repetir con ventaja su acción, movimiento o ataque como si nunca lo hubiera hecho.', NULL, 0, 0, 0),
(210, 0, 'Restauración total', 'Milagro', 'Sacerdote', 4, 'Cura cualquier estado alterado físico o mágico, como venenos o enfermedades y restaura HP completamente. Necesita tocar al objetivo.', NULL, 0, 1, 0),
(211, 0, 'Robar', 'Habilidad', 'Pícaro', 1, 'El siguiente ataque tiene posibilidad de robar un objeto aleatorio del inventario enemigo (a decisión del Master). Se puede apuntar a bolsillos o bolsas especificas.', NULL, 0, 1, 0),
(212, 0, 'Rompehierros', 'Habilidad', NULL, 2, 'Golpe que rompe armas, escudos o armaduras. Dificultad: Cuero 60, Madera 70, Mallas 80, Acero/escamas 90, Placas 100', NULL, 0, 1, 0),
(213, 0, 'Romper filas', 'Habilidad', 'Soldado', 4, 'Avanzas la mitad de tu movimiento asestando golpes (Impacto normal de arma) y empujones (Tirada enfrentada de fuerza. Si el enemigo pierde, cae tumbado boca arriba.) a los enemigos a tu paso. Impide cualquier ataque de oportunidad.', NULL, 0, 1, 0),
(214, 0, 'Runa de defensa', 'Runa', NULL, 1, 'Armadura. El siguiente ataque recibido reducirá su daño a la mitad.', NULL, 0, 1, 0),
(215, 0, 'Runa de fuerza', 'Runa', NULL, 1, 'Arma. El siguiente golpe añade el doble de BF.', NULL, 0, 1, 0),
(216, 0, 'Runa de intelecto', 'Runa', NULL, 4, 'Ropa. El usuario tiene ventaja en tiradas de INT y SAB durante 2h.', NULL, 0, 1, 0),
(217, 0, 'Runa de luz', 'Runa', NULL, 1, 'Cualquier objeto. El objeto brilla con la intensidad de una antorcha durante 24h o hasta que el herrero decida quitar la runa.', NULL, 0, 1, 0),
(218, 0, 'Runa de pereza', 'Runa', NULL, 2, 'Calzado. Durante los siguientes 3 turnos el movimiento se reduce a la mitad.', NULL, 0, 1, 0),
(219, 0, 'Runa de poder', 'Runa', NULL, 3, 'Ropa. Durante la siguiente media hora, el portador de esta armadura añade 1d20 a todas sus tiradas.', NULL, 0, 1, 0),
(220, 0, 'Runa de prisa', 'Runa', NULL, 2, 'Calzado. Durante los siguientes 3 turnos el movimiento se duplica.', NULL, 0, 1, 0),
(221, 0, 'Runa de sustento', 'Runa', NULL, 4, 'Ropa. El usuario no necesita comer ni dormir durante 24h, pero al día siguiente estará exhausto.', NULL, 0, 1, 0),
(222, 0, 'Runa elemental', 'Runa', NULL, 2, 'Arma. Cambia el daño físico por daño de elemento a elección.', NULL, 0, 1, 0),
(223, 0, 'Runa escudo', 'Runa', NULL, 3, 'Suelo. Crea una cúpula de 4 metros de radio que protege durante 3 turnos de proyectiles físicos y mágicos. 500HP.', NULL, 0, 1, 0),
(224, 0, 'Runa explosiva', 'Runa', NULL, 3, 'Cualquier cosa. Con el golpe del martillo, la runa da un fogonazo y explota, causando un daño al objetivo de 1d100.', NULL, 0, 1, 0),
(225, 0, 'Runa llave', 'Runa', NULL, 2, 'Puerta, tapa de cofre. Abre o cierra una puerta o contenedor de forma mágica.', NULL, 0, 1, 0),
(226, 0, 'Runa seísmo', 'Runa', NULL, 4, 'Suelo o pared. Abre una brecha en la superficie en la que se ha usado de 3m de alto, 3 de ancho y 5 de largo. Objetivos sufren 4d20 daño y si no superan salvación DES dif 100 quedan atrapados en el agujero (DES dif 80 para trepar, 1 acción completa)', NULL, 0, 1, 0),
(227, 0, 'Sabotaje', 'Habilidad', 'Pícaro', 3, 'Causa 3d100 de daño de asedio a estructuras complejas (maquinaria, trampas, etc...)', NULL, 0, 1, 0),
(228, 0, 'Salmo alentador', 'Milagro', 'Sacerdote', 1, 'Restaura 1+1d4p de mana, ki o cansancio.', NULL, 0, 1, 0),
(229, 0, 'Salto del cazador', 'Habilidad', 'Cazador', 2, 'Salta 5 metros en horizontal o 3 metros en vertical. Aterriza de forma perfecta.', NULL, 0, 1, 0),
(230, 0, 'Salto guardián', 'Habilidad', 'Domabestias', 2, 'El domador se mueve con velocidad inusitada y se sitúa al lado de su bestia vinculada evitando ataques de oportunidad enemigos. Rango de 10 metros.', NULL, 0, 1, 0),
(231, 0, 'Sanar el alma', 'Hechizo', 'Druídica', 4, 'Cura todo tipo de veneno y enfermedades severas.', NULL, 0, 0, 0),
(232, 0, 'Sanar el cuerpo', 'Hechizo', 'Druídica', 3, 'Cura venenos (tier 1 y 2) y enfermedades menores.', NULL, 0, 0, 0),
(233, 0, 'Sello corporal', 'Kihon', NULL, 3, 'Golpe con la punta de la vaina o el pomo de la espada y paraliza al objetivo 1d4+2 turnos si este no supera una tirada de CON dif 80. Si la supera solo queda paralizado un turno.', NULL, 0, 1, 0),
(234, 0, 'Sello dimensional', 'Hechizo', 'Portales', 5, 'Sella a una criatura incapacitada en una dimension especial sin tiempo. El hechizo requiere un ritual  de una hora y deja una puerta o portal en la dimensión original (a decisión del Master)', NULL, 0, 0, 0),
(235, 0, 'Sentido de Batalla', 'Habilidad', 'Soldado', 2, 'Aumenta tu AC en 20 mientras está activo. Gasta 1p de aguante cada turno.', NULL, 1, 1, 1),
(236, 0, 'Sentir naturaleza', 'Hechizo', 'Druídica', 1, 'Radar natural de 1 km de radio. Detecta caminos, criaturas, construcciones, cuevas...', NULL, 0, 0, 0),
(237, 0, 'Shunpo', 'Kihon', NULL, 1, 'Se mueve instantáneamente dentro de un radio de 5m. Si aparece detrás de un objetivo puede golpear con un +10.', NULL, 0, 1, 0),
(238, 0, 'Sombrilla', 'Hechizo', 'Doméstica', 1, 'Crea una zona de sombra en un área de hasta 5m de radio alrededor del mago. Se mantiene hasta que el mago decida terminarlo o sea incapaz de hacer magia.', NULL, 0, 0, 1),
(239, 0, 'Suelo sagrado', 'Milagro', NULL, 3, 'Protege 10 metros de radio durante 2+1d10 turnos. Dentro de la zona protegida sólo puede entrar quien designe el sacerdote. Si ya había alguien dentro, es empujado hasta el borde.', NULL, 0, 1, 0),
(240, 0, 'Sustento del alma', 'Milagro', 'Sacerdote', 4, 'La criatura objetivo no necesita comer ni dormir durante 24h, pero al día siguiente estará exhausta si no lo hace. Se puede utilizar sobre uno mismo.', NULL, 0, 1, 0),
(241, 0, 'Susurro', 'Habilidad', 'Pícaro', 3, 'Desaparece en el aire y aparece en la espalda de un objetivo, rango máximo 500 metros. Debe conocer nombre y rostro del objetivo.', NULL, 0, 1, 0),
(242, 0, 'Telepatía', 'Hechizo', 'Básica', 2, 'Permite al mago conectar su mente con la de otra criatura a la que conozca que hable su misma lengua para comunicarse con la misma. Dura hasta 8 horas y tiene un rango máximo de 100 km.', NULL, 0, 0, 0),
(243, 0, 'Teñir', 'Hechizo', 'Doméstica', 1, 'Cambia el color de una pieza de ropa de forma permanente.', NULL, 0, 0, 0),
(244, 0, 'Terremoto', 'Habilidad', 'Tierra', 4, 'Golpea el suelo con una fuerza tan descomunal que abre una brecha en cono de 45º, 5 metros de largo, 3 metros de profundidad. Objetivos sufren 4d20 daño y si no superan salvación DES dif 100 quedan atrapados en el agujero (DES dif 80 para trepar, 1 acción completa)', NULL, 0, 1, 0),
(245, 0, 'Toque de escarcha', 'Hechizo', 'Agua', 3, 'Un fino halo helado sale de la mano del mago y envulve al objetivo, que sufre 3d20 de daño por frío. Si falla tirada de SAB dif 80 queda congelado 1d6 turnos. Sufre el daño cada turno, es incapaz de realizar acciones y solo aplica AC de la armadura.', NULL, 0, 0, 0),
(246, 0, 'Tormenta de dagas', 'Habilidad', 'Pícaro', 4, 'Lanza hasta 5 dagas al oponente. Si no pifian, todas realizan impacto crítico.', NULL, 0, 1, 0),
(247, 0, 'Tormenta de fuego', 'Hechizo', 'Fuego', 3, 'Afecta un radio de 4 metros durante 2 turnos. 6D20 puntos de daño de fuego a toda criatura en su interior.', NULL, 0, 0, 0),
(248, 0, 'Tormenta eléctrica', 'Hechizo', 'Viento', 5, 'Caen rayos en un área de 10 metros de diámetro. Toda criatura en el área sufre 4d100 de daño eléctrico y queda aturdida durante 1d6 turnos si no supera una tirada de CON contra el éxito del hechizo.', NULL, 0, 0, 0),
(249, 1, 'Trasladar fuego', 'Hechizo', 'Fuego', 2, 'Mueve gran cantidad de llamas a partir de una zona incendiada. Si las suelta en el aire, desaparecen. Si las suelta sobre objetos inflamables, estos comienzan a arder.', 'La moví a T2. Creo que tiene más sentido.', 0, 0, 0),
(250, 0, 'Traspiés', 'Habilidad', 'Pícaro', 2, 'Objetivo debe superar una tirada dif 70+BDES(atacante) o cae al suelo y pierde su próximo turno.', NULL, 0, 1, 0),
(251, 0, 'Tullir', 'Habilidad', 'Soldado', 4, 'Incapacitas al enemigo con un golpe preciso. Reduces sus tiradas y AC en BFUE+1d10. Impacta siempre (tirar pifia/crítico)', NULL, 0, 1, 0),
(252, 0, 'Unidad', 'Kihon', NULL, 2, 'Activable. Las células de su cuerpo se fusionan con el Ki. Obtiene un bono de +20 a AC. Si el enemigo falla con menos de 20 en el dado, el monje obtiene un ataque de oportunidad.', NULL, 1, 1, 0);
INSERT INTO `Habilidad` (`id`, `revisar`, `nom`, `tipo`, `subtipo`, `tier`, `descr`, `coment`, `contin`, `auto`, `gratis`) VALUES
(253, 0, 'Venid a mi', 'Habilidad', 'Soldado', 3, 'Los enemigos en un radio de 15 metros que no superen una tirada de CAR dif 80 se verán forzados a atacar/cargar/avanzar hacia ti.', NULL, 0, 1, 0),
(254, 0, 'Ventisca', 'Hechizo', 'Viento', 3, 'Provoca una potente corriente de aire en un área de hasta 50m de diámetro durante 3 turnos. Los proyectiles tienen desventaja para impacto y daño y el alcance reducido a la mitad, el movimiento de criaturas se reduce a la mitad. La temperatura de la zona baja a 0ºC. El mago puede mantener la ventisca otros 3 turnos pagando de nuevo el coste.', NULL, 0, 0, 0),
(255, 0, 'Viaje astral', 'Kihon', NULL, 4, 'Convierte su cuerpo en Ki y viaja en segundos a cualquier localización conocida a 100 km de radio máximo.', NULL, 0, 1, 0),
(256, 0, 'Vínculo', 'Habilidad', 'Domabestias', 1, 'Si supera una tirada de CAR enfrentada con la bestia, ésta pasa a estar bajo el mando del domador. Bestias pequeñas.', NULL, 0, 1, 0),
(257, 0, 'Vínculo 2', 'Habilidad', 'Domabestias', 3, 'Si supera 2 de 3 tiradas de CAR enfrentadas contra la bestia, ésta pasa a estar bajo el mando del domador. Si falla, la bestia atacará o huirá. Bestias medianas.', NULL, 0, 1, 0),
(258, 0, 'Vínculo 3', 'Habilidad', 'Domabestias', 4, 'Si supera 3 de 5 tiradas de CAR enfrentadas con la bestia, ésta pasa a estar bajo el mando del domador. Si falla, la bestia atacará o huirá (a decisión del Master). Bestias grandes.', NULL, 0, 1, 0),
(259, 0, 'Volar', 'Hechizo', 'Druídica', 4, 'Puede volar durante una hora. Puede aumentar la duración otra hora pagando el coste hasta que decida parar o se quede sin maná En vuelo la velocidad máxima se ve multiplicada por 2.', NULL, 0, 0, 0),
(260, 0, 'Vuelta a la vida', 'Hechizo', 'Druídica', 5, 'Trae a estado Inconsciente, 1 HP a objetivo que haya muerto hace 5 turnos o menos.', NULL, 0, 0, 0),
(261, 0, 'Wololo', 'Milagro', 'Sacerdote', 4, 'Toma el control de una criatura inteligente. Cada turno hace una tirada de CAR con dificultad 90 para liberarse. Si pifia se salta la siguiente. Se mantiene hasta que el sacerdote decida terminarlo o quede incapacitado.', NULL, 0, 1, 0),
(262, 0, 'Zancadilla', 'Habilidad', NULL, 2, 'Si el enemigo no supera una tirada dificultad 60+BDES(atacante) cae al suelo boca arriba.', NULL, 0, 1, 0),
(263, 0, 'Zona estanca', 'Hechizo', 'Portales', 3, 'Crea una zona de 50m de diámetro durante una hora en la que es imposible abrir portales, manipular el espacio y el tiempo, o teletransportarse por medios mágicos.', NULL, 0, 0, 0),
(264, 0, 'Zona templada', 'Hechizo', 'Viento', 2, 'Crea una zona de 2m de radio alrededor del mago con una temperatura agradable. Dura hasta que el mago decida deshacerla o sea incapaz de hacer magia.', NULL, 0, 0, 0),
(267, 1, 'Cuerpo prestado', 'Hechizo', 'Druídica', 3, 'El druida transfiere su espíritu al cuerpo de un animal no agresivo, cercano y a la vista. Dura un máximo de 1 minuto. No puede hacer que el cuerpo del animal se dañe a sí mismo ni ponerlo en peligro intencionadamente.', NULL, 0, 0, 0),
(268, 1, 'Reencarnación', 'Milagro', 'Sacerdote', 5, 'Mediante un ritual de una hora, permite que el alma de una criatura que haya muerto hace menos de 24 horas tome forma como una nueva criatura, pero conservando sus recuerdos y conocimientos. Puede no fallar. Ver manual para reglas específicas.', 'Mecánica para permitir a jugadores hacerse un rework al PJ. Muy tocha?', 0, 1, 1),
(269, 0, 'Llamada de la naturaleza', 'Hechizo', 'Druídica', 5, 'Invoca un elemental de naturaleza con las características del entorno.\r\nFUE 100, DES 80, CON 80, INT 40, SAB 60, AC 60, HP 700, Mov 30 m/t, Lev 400 kg, Impacto 1d100+30 con ventaja, Crit 96+, Daño 1d100+50 aplastante (x2 a estructuras). Recibe x2 de un tipo de daño dependiendo del entorno.', NULL, 0, 0, 0),
(270, 1, 'Telequinesis', 'Hechizo', 'Básica', 2, 'Permite manipular un objeto a distancia. Cambia FUE por SAB. Si recibe daño el hechizo se interrumpe.', NULL, 0, 0, 0),
(271, 1, 'Presteza Aérea', 'Hechizo', 'Viento', 1, 'Duplica la velocidad de movimiento durante un turno. Se puede mantener gastando un punto de maná por turno.', '', 0, 0, 0),
(272, 1, 'Fuego fatuo', 'Habilidad', 'Fuego', 1, 'Invoca en el aire una pequeña llama, como de una vela. Dura hasta que alguien la apague.', '', 0, 0, 0),
(273, 1, 'Caldear', 'Habilidad', 'Fuego', 1, 'El mago emite calor o calienta un objeto. Puede aumentar la potencia gastando más maná.', '', 0, 1, 0),
(274, 1, 'Aire puro', 'Habilidad', 'Viento', 1, 'Limpia y mantiene el aire alrededor del mago libre de todo tipo de impurezas como venenos, gases, vapores o partículas en suspensión. 2m de radio. Dura 5 turnos.', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Hechizos_Potter`
--

CREATE TABLE `Hechizos_Potter` (
  `id` int(11) NOT NULL,
  `revisar` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Necesita revisión',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del hechizo',
  `vocal` text DEFAULT NULL COMMENT 'Palabras mágicas',
  `gesto` text DEFAULT NULL COMMENT 'Movimientos de varita',
  `tier` tinyint(4) NOT NULL COMMENT 'Tier',
  `tipo` varchar(20) NOT NULL DEFAULT 'Hechizo_Potter',
  `subtipo` varchar(20) DEFAULT NULL,
  `coment` text DEFAULT NULL COMMENT 'Comentarios sobre el hechizo',
  `descr` text DEFAULT NULL COMMENT 'Descripción'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista de hechizos para adaptación al sistema de Harry Potter';

--
-- Volcado de datos para la tabla `Hechizos_Potter`
--

INSERT INTO `Hechizos_Potter` (`id`, `revisar`, `nombre`, `vocal`, `gesto`, `tier`, `tipo`, `subtipo`, `coment`, `descr`) VALUES
(1, 0, 'Aberto', 'Aberto', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Abre una puerta sin bloquear.'),
(2, 0, 'Accio', 'Accio', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Atrae un objeto en el que el mago está pensando hacia sí mismo. Se debe decir el nombre del objeto. Si no se a la vista también es necesario conocerlo muy bien, pero no saber su localización exacta.'),
(3, 1, 'Linea de edad', NULL, 'Trazar la línea con la punta de la varita.', 2, 'Hechizo_Potter', NULL, NULL, 'Evita que criaturas la crucen en función de su edad.'),
(4, 0, 'Aguamenti', 'Aguamenti', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Crea un chorro de agua potable y clara que brota de la punta de la varita.'),
(5, 0, 'Alarte Ascendare', 'Alarte Ascendare', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Lanza al objetivo hacia arriba.'),
(6, 0, 'Alohomora', 'Alohomora', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Abre todo tipo de cerraduras. Si la cerradura está cerrada con algún conjuro se debe superar la tirada de dicho conjuro.'),
(7, 0, 'Anapneo', 'Anapneo', NULL, 2, 'Hechizo_Potter', NULL, NULL, 'Desbloquea las vías respiratorias de una criatura que se esté asfixiando o atragantando.'),
(8, 0, 'Anteoculatia', 'Anteoculatia', NULL, 1, 'Hechizo_Potter', NULL, NULL, 'Hace crecer astas al objetivo.'),
(9, 0, 'Hechizo antidesapariciones', NULL, NULL, 4, 'Hechizo_Potter', NULL, NULL, 'Previene Apariciones y Desapariciones en un área.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ingredientes`
--

CREATE TABLE `Ingredientes` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL COMMENT 'Nombre',
  `descr` text DEFAULT NULL COMMENT 'Descripción física',
  `local` text DEFAULT NULL COMMENT 'Localización, hábitat, como cosechar...',
  `prop` text DEFAULT NULL COMMENT 'Propiedades y usos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ingredientes`
--

INSERT INTO `Ingredientes` (`id`, `nom`, `descr`, `local`, `prop`) VALUES
(1, 'Agua pura', 'Agua destilada', '', ''),
(2, 'Agua de manantial', '', '', ''),
(3, 'Agua dulce', '', '', ''),
(4, 'Agua marina', '', '', ''),
(5, 'Zanahoria', 'Planta de hojas pequeñas y divididas. 10cm de altura. Flores blancas en racimos. Raiz naranza, gruesa y carnosa', 'Cultivable', 'Vista, nutritiva'),
(6, 'Espina de erizo', '', '', 'Oscuridad'),
(7, 'Vinagre de escorpión', '', '', ''),
(8, 'Leche de loba', '', '', ''),
(9, 'Flor cumbrosa', 'Cada planta da una única flor en forma de campana de 50cm. Color morado, azul o verde oscuro.', 'Paredes de roca a grandes alturas.', 'Ilusiones'),
(10, 'Médula de ballena', 'Médula ósea de la columna vertebral de ballenas abisales.', '', 'Antimagia'),
(11, 'Briza acuaticum', 'Alga que crece en pequeños globos verde oscuro rellenos de aire.', 'Charcas de agua salada', 'Aire, agua'),
(12, 'Liquen cavernario', 'Liquen bioluminiscente', 'Zonas profundas y oscuras.', 'Luz'),
(13, 'Huevo de elemental ígneo', '', '', ''),
(14, 'Armoracia rusticana', 'Planta perenne, de hasta 1m de altura. Hojas grandes. Flores blancas y pequeñas en racimos. (aka Rábano picante, rábano de caballo)', 'Suelos sueltos y húmedos. Cultivos.', 'Picante, digestiva, diurético.'),
(15, 'Scilla borealia', 'Planta bulbosa de hasta 20cm. Hojas alargadas y escasas. Flores azules en racimos pequeños.', 'Zonas frías, oscuras y costeras del norte.', ''),
(16, 'Tentáculo de anémona errante', '', '', ''),
(17, 'Infusión de tomillo', '', '', ''),
(18, 'Cáscara de huevo de serpiente voladora', '', '', ''),
(19, 'Ruca', 'Arbusto leñoso muy ramificado. Hasta 1m de altura. Hojas lobulares, verde azuladas y carnosas. Flores amarillas, pequeñas, de 4 pétalos. Desprende un aroma rancio.', 'Terrenos secos y cálidos.', 'Reduce espasmos y purifica la sangre.'),
(20, 'Sangre de wyvern', '', '', ''),
(21, 'Lágrimas de búho', '', '', ''),
(22, 'Baya de madreselva', 'Rojas, pequeñas, esféricas.', '', ''),
(23, 'Madreselva pilosa', 'Arbusto grande, de ramas rectas. Hojas grandes y redondeadas. Flores pequeñas y blancas.', 'Bosques de montaña.', ''),
(24, 'Poción de sueño', '', '', ''),
(25, 'Polvo de granito', '', '', ''),
(26, 'Amapola', 'Plantas de hasta 40cm. Hojas muy subdivididas y flores grandes, rojas, amarillas o blancas.', 'Terrenos cultivados y zonas arenosas', 'Sedante'),
(27, 'Ignitum tuberosum', 'Tubérculos de color amarillento, desprenden muchísimo calor y una luz rojiza', 'Temperaturas extremadamente altas, como túneles de magma activos', 'Calor, mucho calor'),
(28, 'Agua', 'Cualquier tipo de agua', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pociones`
--

CREATE TABLE `Pociones` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL COMMENT 'Nombre',
  `efecto` text DEFAULT NULL COMMENT 'Efecto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pociones`
--

INSERT INTO `Pociones` (`id`, `nom`, `efecto`) VALUES
(1, 'HP N1', 'Recupera 5d6+10 HP.'),
(2, 'HP N2', 'Recupera 6d10+20 HP.'),
(3, 'HP N3', 'Recupera 1d100+40 HP.'),
(4, 'Mana N1', 'Recupera 1d4+1 mana.'),
(5, 'Mana N2', 'Recupera 1d8+2 mana.'),
(6, 'Mana N3', 'Recupera 1d10+5 mana.'),
(7, 'Cansancio N1', 'Recupera 1d4+1 aguante/mana/ki.'),
(8, 'Cansancio N2', 'Recupera 1d8+2 aguante/mana/ki.'),
(9, 'Cansancio N3', 'Recupera 1d10+5 aguante/mana/ki.'),
(10, 'Veneno N1', '1d20 de daño por veneno. Salv CON 60.'),
(11, 'Veneno N2', '2d20 de daño por veneno. Salv CON 80.'),
(12, 'Veneno N3', '3d20 de daño por veneno. Salv CON 100.'),
(13, 'Antídoto N1', '+60 salv contra veneno.'),
(14, 'Antídoto N2', '+80 salv contra veneno.'),
(15, 'Antídoto N3', '+100 salv contra veneno.'),
(16, 'Revelación', 'Si se bebe permite ver cosas invisibles durante 10min. Si se echa sobre un objeto elimina cualquier encantamiento de ocultación o ilusión.'),
(17, 'Felix felicis', 'Al consumirla otorga ventaja a todas las tiradas durante 10 minutos.'),
(18, 'Insomnio', 'Inmune a los efectos que duermen y permite pasar despierto hasta 24h.'),
(19, 'Sueño', 'Duerme.'),
(20, 'Visión nocturna', 'Permite ver en la oscuridad durante una hora.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Poc_Ingr`
--

CREATE TABLE `Poc_Ingr` (
  `poc` int(11) NOT NULL COMMENT 'Poción',
  `ingr` int(11) NOT NULL COMMENT 'Ingrediente',
  `cant` float NOT NULL COMMENT 'Cantidad',
  `coment` text DEFAULT NULL COMMENT 'Comentario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Poc_Ingr`
--

INSERT INTO `Poc_Ingr` (`poc`, `ingr`, `cant`, `coment`) VALUES
(1, 1, 1, ''),
(1, 19, 1, 'Hojas'),
(1, 26, 2, ''),
(16, 9, 1, ''),
(16, 10, 1, ''),
(17, 13, 1, ''),
(17, 14, 1, ''),
(17, 15, 1, ''),
(17, 16, 1, ''),
(17, 17, 1, ''),
(17, 18, 1, 'En polvo'),
(17, 19, 1, 'Seca y en polvo'),
(17, 28, 1, ''),
(18, 7, 1, ''),
(18, 24, 1, ''),
(18, 25, 1, ''),
(19, 20, 0.5, ''),
(19, 21, 1, ''),
(19, 22, 5, ''),
(20, 5, 1, NULL),
(20, 6, 1, NULL),
(20, 7, 0.5, NULL),
(20, 8, 0.5, NULL),
(20, 28, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RelTipoPrim`
--

CREATE TABLE `RelTipoPrim` (
  `prim` varchar(20) NOT NULL,
  `sec` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `RelTipoPrim`
--

INSERT INTO `RelTipoPrim` (`prim`, `sec`) VALUES
('Básica', 'Combate'),
('Básica', 'Doméstica'),
('Básica', 'Portales'),
('Habilidad', 'Cazador'),
('Habilidad', 'Domabestias'),
('Habilidad', 'Guerrero'),
('Habilidad', 'Pícaro'),
('Habilidad', 'Soldado'),
('Hechizo', 'Agua'),
('Hechizo', 'Básica'),
('Hechizo', 'Canción'),
('Hechizo', 'Combate'),
('Hechizo', 'Doméstica'),
('Hechizo', 'Druídica'),
('Hechizo', 'Fuego'),
('Hechizo', 'Portales'),
('Hechizo', 'Tierra'),
('Hechizo', 'Viento'),
('Kihon', 'Blindado'),
('Kihon', 'Espadachín'),
('Kihon', 'Luchador'),
('Milagro', 'Paladín'),
('Milagro', 'Sacerdote');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TierHab`
--

CREATE TABLE `TierHab` (
  `num` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Tier de habilidad',
  `min` tinyint(4) NOT NULL DEFAULT 60 COMMENT 'Mínimo de la característica',
  `dif` tinyint(4) NOT NULL DEFAULT 60 COMMENT 'Dificultad para utilizar la habilidad',
  `coste` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Número de puntos del recurso que consume al utilizar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos de los tiers de habilidades';

--
-- Volcado de datos para la tabla `TierHab`
--

INSERT INTO `TierHab` (`num`, `min`, `dif`, `coste`) VALUES
(1, 60, 60, 1),
(2, 70, 70, 2),
(3, 80, 80, 3),
(4, 90, 100, 5),
(5, 100, 120, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoArma`
--

CREATE TABLE `TipoArma` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TipoArma`
--

INSERT INTO `TipoArma` (`id`, `nom`) VALUES
(1, 'Pequeña'),
(2, 'Arma corta'),
(3, 'Una mano'),
(4, 'Mano y media'),
(5, 'Dos manos'),
(6, 'Arma grande'),
(7, 'Arma de asta'),
(8, 'A distancia'),
(9, 'Arma corta'),
(10, 'Escudo'),
(11, 'Armadura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoHab`
--

CREATE TABLE `TipoHab` (
  `nom` varchar(20) NOT NULL COMMENT 'Nombre (Hechizo, runa, habilidad, kihon, etc...)',
  `primario` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Tipo primario',
  `exclus` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indica si solo pueder utilizada por una clase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tipos de habilidades';

--
-- Volcado de datos para la tabla `TipoHab`
--

INSERT INTO `TipoHab` (`nom`, `primario`, `exclus`) VALUES
('Agua', 0, 1),
('Básica', 0, 0),
('Blindado', 0, 1),
('Canción', 0, 1),
('Cazador', 0, 1),
('Combate', 0, 0),
('Domabestias', 0, 1),
('Doméstica', 0, 0),
('Druídica', 0, 1),
('Espadachín', 0, 1),
('Fuego', 0, 1),
('Guerrero', 0, 1),
('Habilidad', 1, 0),
('Hechizo', 1, 0),
('Hechizo_Potter', 1, 0),
('Kihon', 1, 0),
('Luchador', 0, 1),
('Milagro', 1, 0),
('Paladín', 0, 1),
('Pícaro', 0, 1),
('Portales', 0, 0),
('Runa', 1, 0),
('Sacerdote', 0, 1),
('Soldado', 0, 1),
('Tierra', 0, 1),
('Viento', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Arma`
--
ALTER TABLE `Arma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Arma_Tipo` (`tipo`);

--
-- Indices de la tabla `Clase`
--
ALTER TABLE `Clase`
  ADD PRIMARY KEY (`nom`);

--
-- Indices de la tabla `ClaseUsaTipo`
--
ALTER TABLE `ClaseUsaTipo`
  ADD PRIMARY KEY (`clase`,`tipo`),
  ADD KEY `FK_ClaseTipo_Tipo` (`tipo`);

--
-- Indices de la tabla `Habilidad`
--
ALTER TABLE `Habilidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `FK_Habilidad_Tier` (`tier`),
  ADD KEY `FK_Habilidad_Tipo` (`tipo`),
  ADD KEY `FK_Habilidad_Subtipo` (`subtipo`);

--
-- Indices de la tabla `Hechizos_Potter`
--
ALTER TABLE `Hechizos_Potter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Hechizos_Potter_Tier` (`tier`),
  ADD KEY `FK_Hechizos_Potter_Tipo` (`tipo`),
  ADD KEY `FK_Hechizos_Potter_Subtipo` (`subtipo`);

--
-- Indices de la tabla `Ingredientes`
--
ALTER TABLE `Ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pociones`
--
ALTER TABLE `Pociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Poc_Ingr`
--
ALTER TABLE `Poc_Ingr`
  ADD PRIMARY KEY (`poc`,`ingr`),
  ADD KEY `FK_PocIngr_Ingr` (`ingr`);

--
-- Indices de la tabla `RelTipoPrim`
--
ALTER TABLE `RelTipoPrim`
  ADD PRIMARY KEY (`prim`,`sec`),
  ADD KEY `FK_RelTipoPrim_Sec` (`sec`);

--
-- Indices de la tabla `TierHab`
--
ALTER TABLE `TierHab`
  ADD PRIMARY KEY (`num`);

--
-- Indices de la tabla `TipoArma`
--
ALTER TABLE `TipoArma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `TipoHab`
--
ALTER TABLE `TipoHab`
  ADD PRIMARY KEY (`nom`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Arma`
--
ALTER TABLE `Arma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Habilidad`
--
ALTER TABLE `Habilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de la tabla `Hechizos_Potter`
--
ALTER TABLE `Hechizos_Potter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `Ingredientes`
--
ALTER TABLE `Ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `Pociones`
--
ALTER TABLE `Pociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `TipoArma`
--
ALTER TABLE `TipoArma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Arma`
--
ALTER TABLE `Arma`
  ADD CONSTRAINT `FK_Arma_Tipo` FOREIGN KEY (`tipo`) REFERENCES `TipoArma` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ClaseUsaTipo`
--
ALTER TABLE `ClaseUsaTipo`
  ADD CONSTRAINT `FK_ClaseTipo_Clase` FOREIGN KEY (`clase`) REFERENCES `Clase` (`nom`),
  ADD CONSTRAINT `FK_ClaseTipo_Tipo` FOREIGN KEY (`tipo`) REFERENCES `TipoHab` (`nom`);

--
-- Filtros para la tabla `Habilidad`
--
ALTER TABLE `Habilidad`
  ADD CONSTRAINT `FK_Habilidad_Subtipo` FOREIGN KEY (`subtipo`) REFERENCES `TipoHab` (`nom`),
  ADD CONSTRAINT `FK_Habilidad_Tier` FOREIGN KEY (`tier`) REFERENCES `TierHab` (`num`),
  ADD CONSTRAINT `FK_Habilidad_Tipo` FOREIGN KEY (`tipo`) REFERENCES `TipoHab` (`nom`);

--
-- Filtros para la tabla `Hechizos_Potter`
--
ALTER TABLE `Hechizos_Potter`
  ADD CONSTRAINT `FK_Hechizos_Potter_Subtipo` FOREIGN KEY (`subtipo`) REFERENCES `TipoHab` (`nom`),
  ADD CONSTRAINT `FK_Hechizos_Potter_Tier` FOREIGN KEY (`tier`) REFERENCES `TierHab` (`num`),
  ADD CONSTRAINT `FK_Hechizos_Potter_Tipo` FOREIGN KEY (`tipo`) REFERENCES `TipoHab` (`nom`);

--
-- Filtros para la tabla `Poc_Ingr`
--
ALTER TABLE `Poc_Ingr`
  ADD CONSTRAINT `FK_PocIngr_Ingr` FOREIGN KEY (`ingr`) REFERENCES `Ingredientes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PocIngr_Poc` FOREIGN KEY (`poc`) REFERENCES `Pociones` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `RelTipoPrim`
--
ALTER TABLE `RelTipoPrim`
  ADD CONSTRAINT `FK_RelTipoPrim_Prim` FOREIGN KEY (`prim`) REFERENCES `TipoHab` (`nom`),
  ADD CONSTRAINT `FK_RelTipoPrim_Sec` FOREIGN KEY (`sec`) REFERENCES `TipoHab` (`nom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
