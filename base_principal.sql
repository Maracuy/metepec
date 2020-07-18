DROP DATABASE IF EXISTS metepec;
CREATE DATABASE IF NOT EXISTS metepec;
USE metepec ;


DROP TABLE IF EXISTS empleados ;

CREATE TABLE IF NOT EXISTS empleados (
  id_empleado INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(30) NOT NULL,
  nombres VARCHAR(45) NOT NULL,
  apellido_p VARCHAR(30) NOT NULL,
  apellido_m VARCHAR(30) NOT NULL,
  fech_nacimiento DATE NOT NULL,
  telefono VARCHAR(10) NULL,
  nivel ENUM('Super Admin', 'Admin', 'Capturista', 'Usuario') NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL,
  descripcion TEXT NULL,
  PRIMARY KEY (id_empleado)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO empleados VALUES(NULL, "Goder", "Germán", "Guillen", "Sanchez","1990-03-17","7224531128", "Super Admin", "7224531128", "ggs,webmaster@metepec.work", "Creador del Sistema");
INSERT INTO empleados VALUES (NULL, 'roku', 'Angel', 'Tapia', 'Madero', '2020-07-01', NULL, 'Super Admin', '123456789', 'hangarinteractive@gmail.com', NULL);


DROP TABLE IF EXISTS programas;

CREATE TABLE IF NOT EXISTS programas(
  id_programas INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviatura VARCHAR(10),
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS departamentos;

CREATE TABLE IF NOT EXISTS departamentos(
  id_departamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviaruta VARCHAR(45) NOT NULL,
  descripcion VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS origenes;

CREATE TABLE IF NOT EXISTS origenes (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  abreviatura varchar(10) NOT NULL,
  descripcion text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO origenes (id, nombre, abreviatura, descripcion) VALUES (NULL, 'Origen Pendiente', 'pend', 'Se usa cuando se desconoce el origen');



DROP TABLE IF EXISTS medio_contacto;

CREATE TABLE IF NOT EXISTS medio_contacto (
  id INT NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  abreviatura varchar(10) NOT NULL,
  descripcion text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO medio_contacto (id, nombre, abreviatura, descripcion) VALUES (NULL, 'Medio Pendiente', 'pend', 'Se usa cuando se desconoce el Medio de Contacto');



DROP TABLE IF EXISTS promotores;
CREATE TABLE IF NOT EXISTS promotores(
  id INT NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  abreviatura varchar(10) NOT NULL,
  descripcion text NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO promotores (id, nombre, abreviatura, descripcion) VALUES (NULL, 'Promotor Pendiente', 'pend', 'Se usa cuando se desconoce el Promotor');




DROP TABLE IF EXISTS puestos_publicos;

CREATE TABLE IF NOT EXISTS puestos_publicos(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_puesto VARCHAR(30),
  abreviatura VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS servidores_publicos;

CREATE TABLE IF NOT EXISTS servidores_publicos(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres VARCHAR(30),
  apellido_p VARCHAR(30),
  apellido_m VARCHAR(30),
  id_puesto INT,
  CONSTRAINT fk_servidorpublico_puestospublicos FOREIGN KEY (id) REFERENCES puestos_publicos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS auxiliares;

CREATE TABLE IF NOT EXISTS auxiliares(
  id_auxiliar INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres_auxiliar VARCHAR(45) NOT NULL,
  apellido_p_auxiliar VARCHAR(45) NULL,
  apellido_m_auxiliar VARCHAR(45) NULL,
  telefono_auxiliar VARCHAR(20) NULL DEFAULT NULL,
  id_beneficiario INT NOT NULL,
  parentesco VARCHAR(45) NULL,
  CONSTRAINT fk_auxiliar_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id_beneficiario)
    ON DELETE CASCADE
  )ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_unicode_ci;



DROP TABLE IF EXISTS procesos;
CREATE TABLE IF NOT EXISTS procesos(
  id_procesos INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_beneficiario INT NOT NULL,
  id_alta INT NOT NULL,
  fecha_listado DATE,
  fecha_enviado DATE,
  respuesta TEXT,
  se_informa_beneficiario INT,
  fecha_de_informe DATE,
  fecha_solicitud_visita DATE,
  fecha_programa_visita DATE,
  id_servidor_publico INT,
  fecha_real_visita DATE,
  ingreso_al_sistema INT,
  fecha_estimada_programacion DATE,
  stado_pago INT,
  reporte TEXT,
  CONSTRAINT fk_procesos_beneficiario FOREIGN KEY (id_beneficiario) REFERENCES beneficiarios(id_beneficiario) ON DELETE CASCADE,
  CONSTRAINT fk_procesos_altas FOREIGN KEY (id_alta) REFERENCES altas(id_alta),
  CONSTRAINT fk_procesos_servidor FOREIGN KEY (id_servidor_publico) REFERENCES servidores_publicos(id) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS pagos_adulto_mayor;
CREATE TABLE IF NOT EXISTS pagos_adulto_mayor(
  id_pagos INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  forma_de_pago VARCHAR(15),
  year_on_curse VARCHAR(4),
  id_alta INT NOT NULL,
  bim_1 INT,
  fecha_de_pago_bim_1 DATE,
  bim_2 INT,
  fecha_de_pago_bim_2 DATE,
  bim_3 INT,
  fecha_de_pago_bim_3 DATE,
  bim_4 INT,
  fecha_de_pago_bim_4 DATE,
  bim_5 INT,
  fecha_de_pago_bim_5 DATE,
  bim_6 INT,
  fecha_de_pago_bim_6 DATE,
  CONSTRAINT fk_pagos_programa FOREIGN KEY (id_alta) REFERENCES altas(id_alta) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


