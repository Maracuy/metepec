DROP TABLE IF EXISTS colonias;
CREATE TABLE IF NOT EXISTS colonias(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_colonia VARCHAR(100) NOT NULL,
  municipio VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO colonias (id, nombre_colonia, municipio) VALUES (NULL, 'Sin colonia', 'Sin municipio');

INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE COAXUSTENCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE SAN MATEO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE SAN MIGUEL','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE SANTA CRUZ','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE SANTA CRUZ OCOTITLAN','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DE SANTIAGUITO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('BARRIO DEL ESÍRITU SANTO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA AGRICOLA ALVARO OBREGON','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA AGRICOLA BELLAVISTA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA AGRICOLA FRANCISCO I. MADERO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA AGRICOLA LAZARO CARDENAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA DR. JORGE JIMENEZ CANTU','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA HIPICO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA LA MICHOACANA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA LA PROVIDENCIA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA LUISA ISABEL CAMPOS DE JIMENEZ CANTU','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA MUNICIPAL','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('COLONIA UNION','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('CONDOMINIO AGRIPIN GARCIA ESTRADA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO CASA BLANCA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO FUENTES DE SAN GABRIEL','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC I','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC II','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC III','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC IV','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC V','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO IZCALLI CUAUHTEMOC VI','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO JESUS JIMENEZ GALLARDO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO JUAN FERNANDEZ ALBARRAN','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO LAS HACIENDAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO LAS MARGARITAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO LAS MARINAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO LOS PILARES','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO RANCHO SAN FRANCISCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO RANCHO SAN LUCAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO REAL DE SAN JAVIER','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO SAN JOSE LA PILA','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('FRACCIONAMIENTO XINANTECATL','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN BARTOLOME TLALTELULCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN FRACISCO COAXUSCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN GASPAR TLAHUELILPAN','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN JERONIMO CHICAHUALCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN JORGE PUEBLO NUEVO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN LORENZO COACALCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN LUCAS TUNCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN MIGUEL TOTOCUITLAPILCO','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN SALVADOR TIZATLALLI','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SAN SEBASTIAN','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('PUEBLO DE SANTA MARIA MAGDALENA OCOTITLAN','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('UNIDAD HABITACIONAL ANDRES MOLINA ENRIQUEZ','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('UNIDAD HABITACIONAL LÁZARO CARDENAS','Metepec');
INSERT INTO colonias (nombre_colonia,municipio) VALUES ('UNIDAD HABITACIONAL TOLLOCAN II','Metepec');
