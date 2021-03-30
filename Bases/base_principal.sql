DROP DATABASE IF EXISTS u235387680_metepec;
CREATE DATABASE IF NOT EXISTS u235387680_metepec;
USE u235387680_metepec;


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


DROP TABLE IF EXISTS colonias;
CREATE TABLE IF NOT EXISTS colonias(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_colonia VARCHAR(100) NOT NULL,
    abreviatura VARCHAR(5),
    municipio VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO colonias (id, nombre_colonia, municipio) VALUES (NULL, 'Sin colonia', 'Sin municipio');


DROP TABLE IF EXISTS ciudadanos;
CREATE TABLE IF NOT EXISTS ciudadanos (
  id_ciudadano INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel INT NOT NULL DEFAULT 10,
  usuario_sistema VARCHAR(10),
  contrasenia VARCHAR(50),
  fecha_captura DATETIME DEFAULT CURRENT_TIMESTAMP,
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
  origen VARCHAR(255),
  id_registrante INT NOT NULL,
  observaciones TEXT NULL DEFAULT NULL
)ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

INSERT INTO ciudadanos(nivel,usuario_sistema,contrasenia,nombres,apellido_p,apellido_m) VALUES(0,'Goder','170390','Germán', 'Guillen', 'Sanchez');
INSERT INTO ciudadanos(nivel,usuario_sistema,contrasenia,nombres,apellido_p,apellido_m) VALUES(0,'roku','123456789','Angel', 'Tapia', 'Madero');
INSERT INTO ciudadanos(nivel,usuario_sistema,contrasenia,nombres,apellido_p,apellido_m) VALUES(0,'AndAO','1197','Andres', 'Albarran', 'Ortiz');


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
    estatus INT,
    exito INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS documentos;
CREATE TABLE IF NOT EXISTS documentos(
    id_documento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_ciudadano_subida INT,
    fecha_subida DATETIME,
    fecha_borrada DATETIME,
    id_ciudadano_documento INT,
    tipo_documento VARCHAR(10)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS tareas;
CREATE TABLE IF NOT EXISTS tareas(
    id_tarea INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo INT,
    id_ciudadano_crea_tarea INT NOT NULL,
    id_ciudadano_asigna_tarea INT NOT NULL,
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


DROP TABLE IF EXISTS zonas;
CREATE TABLE IF NOT EXISTS zonas(
    id_zona INT AUTO_INCREMENT PRIMARY KEY,
    zona INT,
    color VARCHAR(5)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS representantes_generales;
CREATE TABLE IF NOT EXISTS representantes_generales(
    id_representante_general INT AUTO_INCREMENT PRIMARY KEY,
    representante_general INT,
    id_zona INT,
    id_ciudadano_representante_general INT,
    color VARCHAR(5)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS secciones;
CREATE TABLE IF NOT EXISTS secciones(
    id_seccion INT AUTO_INCREMENT PRIMARY KEY,
    seccion INT,
    id_representante_general INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS casillas;
CREATE TABLE IF NOT EXISTS casillas(
    id_casilla INT AUTO_INCREMENT PRIMARY KEY,
    casilla INT,
    tipo_casilla VARCHAR(5),
    id_seccion INT 
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS puestos_defensa_casillas;
CREATE TABLE IF NOT EXISTS puestos_defensa_casillas(
    id_puesto INT AUTO_INCREMENT PRIMARY KEY,
    tipo_puesto INT,
    nombre_puesto VARCHAR(5),
    id_casilla INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS altas_defensa;
CREATE TABLE IF NOT EXISTS altas_defensa(
    id_alta_defensa INT AUTO_INCREMENT PRIMARY KEY,
    id_ciudadano INT,
    id_zona INT,
    id_zona_aux INT,
    id_rg INT,
    id_rg_aux INT,
    id_puesto INT,
    previo INT,
    posicion_prev VARCHAR(10),
    asistio INT,
    compromiso INT,
    afiliacion VARCHAR(255),
    origen VARCHAR(255),
    cubre INT,
    up INT,
    confirmacion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS messag;
CREATE TABLE IF NOT EXISTS messag(
 id_mensaje INT AUTO_INCREMENT PRIMARY KEY,
 mensaje TEXT,
 id_ciudadano INT,
 fecha_captura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS capacitaciones_defensa;
CREATE TABLE IF NOT EXISTS capacitaciones_defensa(
    id_capacitacion INT AUTO_INCREMENT PRIMARY KEY,
    cap1 INT,
    cap2 INT,
    cap3 INT,
    cap4 INT,
    cap5 INT,
    id_ciudadano INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS puestos_defensa;
CREATE TABLE IF NOT EXISTS puestos_defensa(
    id_defensa INT AUTO_INCREMENT PRIMARY KEY,
    id_ciudadano INT,
    zona VARCHAR(5),
    rg VARCHAR(5),
    seccion VARCHAR(5),
    casilla VARCHAR(5),
    puesto INT,
    previo INT,
    posicion_prev VARCHAR(10),
    asistio INT,
    compromiso INT,
    afiliacion VARCHAR(255),
    origen VARCHAR(255),
    cubre INT,
    up INT,
    confirmacion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS puestos_promocion;
CREATE TABLE IF NOT EXISTS puestos_promocion(
    id_promocion INT AUTO_INCREMENT PRIMARY KEY,
    id_ciudadano INT,
    zona VARCHAR(5),
    seccion INT,
    posicion_prev VARCHAR(10),
    asistio INT,
    compromiso INT,
    afiliacion VARCHAR(255),
    origen VARCHAR(255),
    cubre INT,
    up INT,
    confirmacion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS promotor_promocion;
CREATE TABLE IF NOT EXISTS promotor_promocion(
    id_promotor INT AUTO_INCREMENT PRIMARY KEY,
    seccion INT,
    manzana VARCHAR(5),
    id_ciudadano INT,
    posicion_prev VARCHAR(10),
    asistio INT,
    compromiso INT,
    afiliacion VARCHAR(255),
    origen VARCHAR(255),
    cubre INT,
    up INT,
    confirmacion INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS promovido_promocion;
CREATE TABLE IF NOT EXISTS promovido_promocion(
    id_promovido INT AUTO_INCREMENT PRIMARY KEY,
    id_ciudadano INT,
    id_promotor_promovido INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;