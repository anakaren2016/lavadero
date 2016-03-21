CREATE TABLE cliente (
  id        INT PRIMARY KEY       AUTO_INCREMENT,
  nombre    VARCHAR(100) NOT NULL,
  telefono  VARCHAR(10)  NOT NULL,
  direccion VARCHAR(100),
  ci        VARCHAR(20)  NOT NULL,
  eliminado BOOLEAN      NOT NULL DEFAULT FALSE
);

CREATE TABLE tipo_vehiculo (
  id          INT(11) PRIMARY KEY  AUTO_INCREMENT,
  nombre      VARCHAR(20) NOT NULL,
  descripcion VARCHAR(30),
  eliminado   BOOLEAN     NOT NULL DEFAULT FALSE
);

CREATE TABLE vehiculo (
  id               INT PRIMARY KEY     AUTO_INCREMENT,
  placa            VARCHAR(8) NOT NULL UNIQUE,
  eliminado        BOOLEAN    NOT NULL DEFAULT FALSE,
  id_cliente       INT        NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES cliente (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  id_tipo_vehiculo INT        NOT NULL,
  FOREIGN KEY (id_tipo_vehiculo) REFERENCES tipo_vehiculo (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `cliente` (
  `id`        INT(11)     NOT NULL,
  `nombre`    VARCHAR(60) NOT NULL,
  `telefono`  VARCHAR(10) NOT NULL,
  `direccion` VARCHAR(50) DEFAULT NULL,
  `ci`        VARCHAR(8)  NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE IF NOT EXISTS `detalle_orden` (
  `cod_orden` INT(11)    NOT NULL,
  `cod_ser`   VARCHAR(5) NOT NULL,
  `estado`    INT(11)    NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `cod_orden` INT(11)    NOT NULL,
  `fecha`     DATE       NOT NULL,
  `hora`      TIME       NOT NULL,
  `placa`     VARCHAR(7) NOT NULL,
  `total`     INT(11)    NOT NULL,
  `tiempo`    INT(11)    NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `codS`        VARCHAR(5)  NOT NULL,
  `descripcion` VARCHAR(35) NOT NULL,
  `tiempo_Est`  INT(11)     NOT NULL,
  `precio`      INT(11)     NOT NULL,
  `tipo_v`      INT(11)     NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE IF NOT EXISTS `tipo_vehiculo` (
  `id`          INT(11)     NOT NULL,
  `nombre`      VARCHAR(20) NOT NULL,
  `descripcion` VARCHAR(30) NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1
  AUTO_INCREMENT = 1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `placa`      VARCHAR(7) NOT NULL,
  `estado`     BIT(2)     NOT NULL,
  `id_cliente` INT(11)    NOT NULL,
  `id_tipo_v`  INT(11)    NOT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
ADD PRIMARY KEY (`cod_orden`, `cod_ser`);

--
-- Indices de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
ADD PRIMARY KEY (`cod_orden`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
ADD PRIMARY KEY (`codS`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
ADD PRIMARY KEY (`placa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orden_trabajo`
--
ALTER TABLE `orden_trabajo`
MODIFY `cod_orden` INT(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
