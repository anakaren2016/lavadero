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

CREATE TABLE servicio (
  id               INT PRIMARY KEY       AUTO_INCREMENT,
  descripcion      VARCHAR(100) NOT NULL,
  tiempo_estimado  INT          NOT NULL,
  precio           INT          NOT NULL,
  id_tipo_vehiculo INT          NOT NULL,
  FOREIGN KEY (id_tipo_vehiculo) REFERENCES tipo_vehiculo (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  eliminado        BOOLEAN      NOT NULL DEFAULT FALSE
);

CREATE TABLE orden_trabajo (
  id         INT PRIMARY KEY                                                                                                                            AUTO_INCREMENT,
  fecha_hora TIMESTAMP   NOT NULL DEFAULT NOW(),
  placa      VARCHAR(10) NOT NULL,
  total      INT         NOT NULL,
  tiempo     INT         NOT NULL
);

CREATE TABLE IF NOT EXISTS detalle_orden (
  id          INT PRIMARY KEY AUTO_INCREMENT,
  id_orden    INT NOT NULL,
  FOREIGN KEY (id_orden) REFERENCES orden_trabajo (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  id_servicio INT NOT NULL,
  FOREIGN KEY (id_servicio) REFERENCES servicio (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

USE lavadero;