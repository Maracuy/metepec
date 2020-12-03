DROP DATABASE IF EXISTS u235387680_metepec;
CREATE DATABASE IF NOT EXISTS u235387680_metepec;
USE u235387680_metepec;


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

INSERT INTO empleados VALUES(NULL, "NULO", "Sin", "Responsable", "Aun", "1990-03-17",NULL, "Usuario", "123456", "sin_email@metepec.work", "Sin responsable");
INSERT INTO empleados VALUES(NULL, "Goder", "Germán", "Guillen", "Sanchez","1990-03-17","7224531128", "Super Admin", "170390", "ggs,webmaster@metepec.work", "Creador del Sistema");
INSERT INTO empleados VALUES (NULL, 'roku', 'Angel', 'Tapia', 'Madero', '2020-07-01', NULL, 'Super Admin', '123456789', 'hangarinteractive@gmail.com', NULL);


DROP TABLE IF EXISTS programas_municipales;
CREATE TABLE IF NOT EXISTS programas_municipales(
  id_programa_municipal INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviatura VARCHAR(10),
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO programas_municipales VALUES(NULL, "Sin programa", "SPGM", "Se elige esta opcion por defecto");



DROP TABLE IF EXISTS programas_estatales;
CREATE TABLE IF NOT EXISTS programas_estatales(
  id_programa_estatal INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviatura VARCHAR(10),
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO programas_estatales VALUES(NULL, "Sin programa", "SPGM", "Se elige esta opcion por defecto");



DROP TABLE IF EXISTS programas_federales;
CREATE TABLE IF NOT EXISTS programas_federales(
  id_programa_federal INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviatura VARCHAR(10),
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO programas_federales VALUES(NULL, "Sin programa", "SPGM", "Se elige esta opcion por defecto");
INSERT INTO programas_municipales VALUES(NULL, "Adulto Mayor", "ADMY", "Programa Federal de Apoyo al Adulto Mayor");




DROP TABLE IF EXISTS programas_internos;
CREATE TABLE IF NOT EXISTS programas_internos(
  id_programa INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviatura VARCHAR(10),
  nivel VARCHAR(255),
  descripcion TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO programas_internos VALUES(NULL, "Sin programa", "SPGM", "Sin Nivel", "Se elige esta opcion por defecto");



DROP TABLE IF EXISTS departamentos;
CREATE TABLE IF NOT EXISTS departamentos(
  id_departamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  abreviaruta VARCHAR(45) NOT NULL,
  descripcion VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO departamentos VALUES(NULL, "Sin Depto.", "SnDP", "Se usa por defecto o cuando no se conoce el departaento");



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



DROP TABLE IF EXISTS colonias;
CREATE TABLE IF NOT EXISTS colonias(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_colonia VARCHAR(100) NOT NULL,
  abreviatura VARCHAR(5),
  municipio VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO colonias (id, nombre_colonia, municipio) VALUES (NULL, 'Sin colonia', 'Sin municipio');



DROP TABLE IF EXISTS puestos_publicos;

CREATE TABLE IF NOT EXISTS puestos_publicos(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_puesto VARCHAR(30),
  abreviatura VARCHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO puestos_publicos VALUES (NULL, "Sin Puesto", "SIN");



DROP TABLE IF EXISTS servidores_publicos;

CREATE TABLE IF NOT EXISTS servidores_publicos(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres VARCHAR(30),
  apellido_p VARCHAR(30),
  apellido_m VARCHAR(30),
  id_puesto INT,
  CONSTRAINT fk_servidorpublico_puestospublicos FOREIGN KEY (id_puesto) REFERENCES puestos_publicos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO servidores_publicos VALUES (NULL, "Servidor", "Publico", "Desconocido" ,1);




DROP TABLE IF EXISTS ciudadanos;
CREATE TABLE IF NOT EXISTS ciudadanos (
  id_ciudadano INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel INT NOT NULL,
  usuario_sistema VARCHAR(10),
  contrasenia VARCHAR(50),
  fecha_captura DATETIME NULL,
  nombre_c VARCHAR(255) NOT NULL,
  nombres VARCHAR(45) NOT NULL,
  apellido_p VARCHAR(45) NOT NULL,
  apellido_m VARCHAR(45) NOT NULL,
  vulnerable INT,
  genero INT NULL DEFAULT NULL,
  curp VARCHAR(20) NULL DEFAULT NULL,
  numero_identificacion VARCHAR(50) NULL DEFAULT NULL,
  telefono VARCHAR(10) NULL DEFAULT NULL,
  otro_telefono VARCHAR(10) NULL,
  email VARCHAR(50) NULL DEFAULT NULL,
  whats INT,
  fecha_nacimiento DATE NULL DEFAULT NULL,
  estado_civil VARCHAR(50) NULL DEFAULT NULL,
  num_hijos INT NULL DEFAULT NULL,
  ocupacion VARCHAR(100) NULL DEFAULT NULL,
  pensionado INT NULL DEFAULT NULL,
  enfermedades_cron INT NULL DEFAULT NULL,
  cp VARCHAR(10) NULL DEFAULT NULL,
  dir_calle VARCHAR(45) NULL DEFAULT NULL,
  dir_numero VARCHAR(50) NULL DEFAULT NULL,
  dir_numero_int VARCHAR(50) NULL DEFAULT NULL,
  id_colonia INT NULL DEFAULT NULL,
  otra_colonia VARCHAR(50) NULL DEFAULT NULL,
  municipio VARCHAR(45) NULL DEFAULT NULL,
  zona INT,
  manzana VARCHAR(255) NULL DEFAULT NULL,
  lote VARCHAR(255) NULL DEFAULT NULL,
  dir_referencia VARCHAR(255) NULL DEFAULT NULL,
  seccion_electoral VARCHAR(45) NULL DEFAULT NULL,
  participo_eleccion INT NULL DEFAULT NULL,
  posicion VARCHAR(45) NULL DEFAULT NULL,
  asistio VARCHAR(45) NULL DEFAULT NULL,
  afiliacion VARCHAR(45) NULL DEFAULT NULL,
  simpatia INT,
  id_registrante INT NOT NULL,
  observaciones TEXT NULL DEFAULT NULL
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



DROP TABLE IF EXISTS galaxias;
CREATE TABLE IF NOT EXISTS galaxias(
  id_galaxia INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_ciudadano INT,
  padre INT,
  madre INT,
  conyuge INT,
  hermano INT,
  hijo INT,
  conocido INT,
  referido INT
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS hermanos;
CREATE TABLE IF NOT EXISTS hermanos(
  id_hermano INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_galaxia INT,
  hermano VARCHAR(255)
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS hijos;
CREATE TABLE IF NOT EXISTS hijos(
  id_hijo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_galaxia INT,
  hijo INT
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS conocidos;
CREATE TABLE IF NOT EXISTS conocidos(
  id_conocido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_galaxia INT,
  conocido INT
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


DROP TABLE IF EXISTS beneficiarios_int;
CREATE TABLE IF NOT EXISTS beneficiarios_int(
id_beneficiario_int INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(255),
abreviatura VARCHAR(10)
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



DROP TABLE IF EXISTS altas;
CREATE TABLE IF NOT EXISTS altas(
  id_alta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_ciudadano INT NOT NULL,
  fecha_activacion DATETIME DEFAULT NULL,
  tarjeta VARCHAR(12),
  padron VARCHAR(10),
  id_departamento INT NULL,
  id_programa_f INT NULL,
  id_programa_e INT NULL,
  id_programa_m INT NULL,
  id_responsable INT NOT NULL,
  visto_por_responsable INT,
  id_empleado_capt INT NOT NULL,
  exito BOOLEAN
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS peticiones;
CREATE TABLE IF NOT EXISTS peticiones(
  id_peticion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_ciudadano INT,
  fecha DATE,
  peticion TEXT,
  estatus INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS tareas;
CREATE TABLE IF NOT EXISTS tareas(
  id_tarea INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tipo INT,
  id_empleado_crea_tarea INT NOT NULL,
  id_empleado_asigna_tarea INT NOT NULL,
  creada_date DATE,
  fecha_limite DATE,
  tarea_titulo VARCHAR(255),
  tarea_descripcion TEXT,
  proceso INT,
  id_origen INT,
  id_beneficiario INT,
  id_beneficiario_int INT,
  id_programa_int INT,
  id_programa_ciud INT,
  vista INT,
  estatus INT,
  prioridad INT,
  avance INT,
  realizada INT,
  aceptada INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS comentarios;
CREATE TABLE IF NOT EXISTS comentarios(
  id_comentario INT PRIMARY KEY AUTO_INCREMENT,
  texto TEXT,
  fecha_comment TIMESTAMP,
  id_empleado INT,
  id_tarea INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS procesos;
CREATE TABLE IF NOT EXISTS procesos(
  id_proceso INT AUTO_INCREMENT PRIMARY KEY,
  id_alta INT,
  id_empleado INT,
  fecha DATE,
  estado INT,
  descripcion TEXT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/* Aqui comienza el area de defenza del voto, se cree que las zonas y las secciones se puede considerar en el area de promocion del voto pero aun no sabemos */

DROP TABLE IF EXISTS zonas;
CREATE TABLE IF NOT EXISTS zonas(
  id_zona INT AUTO_INCREMENT PRIMARY KEY,
  zona INT,
  id_cordinador_zona_defenza INT,
  id_cordinador_zona_promocion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS representantes_generales;
CREATE TABLE IF NOT EXISTS representantes_generales(
  id_representante_general INT AUTO_INCREMENT PRIMARY KEY,
  representante_general INT,
  id_zona INT,
  id_ciudadano_representante_general INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS secciones;
CREATE TABLE IF NOT EXISTS secciones(
  id_seccion INT AUTO_INCREMENT PRIMARY KEY,
  seccion INT,
  id_representante_general INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS casilla;
CREATE TABLE IF NOT EXISTS casilla(
  id_casilla INT AUTO_INCREMENT PRIMARY KEY,
  casilla INT,
  tipo_casilla VARCHAR(5),
  id_seccion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS representantes_de_casilla;
CREATE TABLE IF NOT EXISTS representantes_de_casilla(
  id_representante_de_casilla INT AUTO_INCREMENT PRIMARY KEY,
  id_ciudadano INT,
  tipo_representante VARCHAR(5),
  id_casilla INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/* 
DROP TABLE IF EXISTS defensa;
CREATE TABLE IF NOT EXISTS defensa(
  id_defensa INT AUTO_INCREMENT PRIMARY KEY,
  zona VARCHAR(2),
  id_cordinador_zona INT,
  id_representante_general INT,
  seccion VARCHAR(5),
  casilla VARCHAR(3),
  prin_sup VARCHAR(4),
  id_ciudadano INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; */

DROP TABLE IF EXISTS defenza_voto;
CREATE TABLE IF NOT EXISTS defenza_voto(
  id_defensa_voto INT AUTO_INCREMENT PRIMARY KEY,
  id_ciudadano INT,
  participo_eleccion INT,
  posicion VARCHAR(10),
  asistio INT,
  afiliacion VARCHAR(10),
  observaciones TEXT,
  zona INT,
  seccion INT 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;