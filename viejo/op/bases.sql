DROP DATABASE IF EXISTS metepec;
CREATE DATABASE IF NOT EXISTS metepec;
USE metepec;



CREATE TABLE empleados(
    id_empleados INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(45) NOT NULL,
    apellido_p VARCHAR(30) NOT NULL,
    apellido_m VARCHAR(30) NOT NULL,
    edad INT NOT NULL,
    telefono VARCHAR(10),
    nivel INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_empleados)
) ENGINE = InnoDB;


CREATE TABLE privilegios(
    nivel_id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(20), 
    descripcion VARCHAR(255)
)ENGINE = InnoDB;

CREATE TABLE programas(
    id_programas INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
)ENGINE = InnoDB;

CREATE TABLE departamentos(
    id_departamento INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
)ENGINE = InnoDB;



CREATE TABLE registros(
    id_registro INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fecha DATE NOT NULL,
    id_empleado INT UNSIGNED NOT NULL,
    nivel ENUM("1", "2", "3", "4", "5"),
    descripcion TEXT NOT NULL,
    id_departamento INT UNSIGNED NOT NULL,

);

CREATE TABLE beneficiario(
    id_beneficiario INT AUTO_INCREMENT NOT NULL,
    nombres VARCHAR(45) NOT NULL,
    apellido_p VARCHAR(30) NOT NULL,
    apellido_m VARCHAR(30) NOT NULL,
    edad INT NOT NULL,
    telefono VARCHAR(15) DEFAULT 'Sin Telefono',
    id_registro INT UNSIGNED NOT NULL,


    colonia VARCHAR(30) NOT NULL,
    municipio VARCHAR(30) NOT NULL,
    referencia VARCHAR(30),

    id_programa_apoyo INT NOT NULL, 


    FULLTEXT KEY search(nombre, empleado ),
    PRIMARY KEY(id_apoyo),
    FOREIGN KEY (id_empleado) REFERENCES empleados (id_empleados),
    FOREIGN KEY (id_estatus) REFERENCES 

    ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE = InnoDB;

