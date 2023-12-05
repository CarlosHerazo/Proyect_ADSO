-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2023 a las 12:38:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_adso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `contra`, `nombre`) VALUES
(1, 'admin', '7b902e6ff1db9f560443f2048974fd7d386975b0', 'AgroAdonai');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'tuberculos'),
(2, 'frutas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `pedido_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio_unitario` decimal(60,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `numero` int(11) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `pedido_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `clave_transacion` varchar(250) NOT NULL,
  `fecha` datetime NOT NULL,
  `correo` varchar(500) NOT NULL,
  `id_Cliente` varchar(100) NOT NULL,
  `total` decimal(60,2) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `clave_transacion`, `fecha`, `correo`, `id_Cliente`, `total`, `status`) VALUES
(1, '2ED91868XN207915DhOLA', '2023-12-05 07:46:00', 'sb-pqfg127785797@personal.example.com', 'HG5Q89HU2AY5L', 6500.00, 'COMPLETED'),
(2, '66J64862TD9687819hOLA', '2023-12-05 07:47:48', 'sb-pqfg127785797@personal.example.com', 'HG5Q89HU2AY5L', 7500.00, 'COMPLETED'),
(3, '2ED6020874140423UhOLA', '2023-12-05 07:52:10', 'sb-pqfg127785797@personal.example.com', 'HG5Q89HU2AY5L', 7500.00, 'COMPLETED'),
(4, '87V61645H04504020', '2023-12-05 07:54:21', 'sb-pqfg127785797@personal.example.com', 'HG5Q89HU2AY5L', 7500.00, 'COMPLETED');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `precio`, `descripcion`, `estado`, `cantidad`, `imagen`, `categoria_id`) VALUES
(1, 'yuca', 400.00, 'La yuca es un tubérculo del arbusto Manihot Esculenta, de aspecto leñoso por fuera, ya que está recubierto por una cáscara de gran dureza y de color marrón que no es comestible. Esta consistencia firme también se encuentra en su pulpa, de color blanco y que presenta fibras longitudinales.\r\n', 'Activo', 1, 'https://www.semana.com/resizer/wpm5cy7iLgNmWLwHGfjyNbMAnNc=/1280x0/smart/filters:format(jpg):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/semana/2B666A7UU5CTLPPSF7MU7KOGTE.jpg', 1),
(3, 'Platano Verde', 500.00, 'El plátano que ofrecemos es de la más alta calidad y frescura garantizada. Cada fruto de plátano es cuidadosamente seleccionado y cultivado en nuestras tierras, utilizando métodos sostenibles y respetuosos con el medio ambiente.', 'Activo', 1, 'http://localhost/Proyect_ADSO/build/img/Productos/descarga.jfif', 1),
(4, 'Auyama', 400.00, 'La auyama o ahuyama (ambas formas son correctas según la Real Academia de la Lengua Española-RAE) es uno de los alimentos con múltiples beneficios para el organismo. Este vegetal contiene calcio, sodio, magnesio, zinc, hierro, potasio, fósforo, vitaminas A, C y B.\r\n', 'Activo', 1, 'https://www.mercadoscampesinos.gov.co/wp-content/uploads/2021/04/Auyama-comun-400x400.jpg', 1),
(6, 'Limon Criollo', 300.00, 'El limón es redondo y ligeramente alargado, pertenece a la familia de los agrios y por tanto comparte muchas de las características de otras especies de cítricos, como es tener una piel gruesa. La pulpa es color amarillo pálido, jugosa y de sabor ácido dividida en gajos. El color de la corteza es amarillo y especialmente brillante cuando está maduro.\r\n', 'Activo', 1, 'https://www.merkapp.com/cdn/shop/products/fyv105_1614010809.png?v=1638507322', 2),
(7, 'Ñame', 600.00, 'Los ñames son tubérculos almidonados de origen africano que son un alimento básico en América del Sur, África, las Antillas y las Islas del Pacífico. Además, es un alimento popular en las Islas Canarias, donde además existen plantaciones. A pesar de su contenido en almidón, el ñame tiene un bajo índice glucémico pues aporta carbohidratos complejos y fibra dietética.\r\n', 'Activo', 1, 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/203173/1380.jpg?v=637814193870330000', 1),
(8, 'Guayaba', 1000.00, 'Con el nombre científico de Psydium guajava se conoce el fruto del árbol guayabo. Este es originario de México, Brasil y el Perú; pero hoy en día se cultiva en países de clima tropical alrededor del mundo. Por este motivo, en zonas como América Central, India, Bangladés, Indonesia o China es muy conocida y consumida de forma habitual. La planta no solo se valora como alimento, sino que también cuenta con una larga historia de usos tradicionales como remedio natural para diversas condiciones de salud.\r\n', 'Activo', 1, 'https://5aldia.cl/wp-content/uploads/2021/03/guayaba.jpeg', 2),
(9, 'Mango manzana', 15000.00, 'Mango de manzana. Nutritivo', '', 1, 'https://s.cornershopapp.com/product-images/1079777.jpg?versionId=F9e2yYNyberVfnUiiK3Gt3SEYitLKDhX', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `idtelefono` int(11) NOT NULL,
  `fijo` decimal(10,0) NOT NULL,
  `mobil` decimal(10,0) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_numero` (`pedido_numero`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_numero` (`pedido_numero`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`idtelefono`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `idtelefono` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
