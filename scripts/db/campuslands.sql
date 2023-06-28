CREATE DATABASE campuslands;

USE campuslands;

CREATE TABLE
    departamento(
        idDept INT NOT NULL AUTO_INCREMENT,
        nombreDep VARCHAR(50),
        idPais INT NOT NULL
    );

CREATE TABLE
    pais(
        idPais INT NOT NULL AUTO_INCREMENT,
        nombrePais INT
    );

CREATE TABLE
    campers (
        idCamper INT NOT NULL AUTO_INCREMENT,
        nombreCamper VARCHAR(50),
        apellidoCAmper VARCHAR(50),
        fechaNac DATE,
        idReg INT
    );

CREATE TABLE
    region (
        idReg INT NOT NULL AUTO_INCREMENT,
        nombreReg VARCHAR(60),
        idDep INT
    );

ALTER TABLE campers ADD CONSTRAINT PRIMARY KEY (idCamper);

ALTER TABLE pais ADD CONSTRAINT PRIMARY KEY (idPais);

ALTER TABLE departamento ADD CONSTRAINT PRIMARY KEY (idDept);

ALTER TABLE region ADD CONSTRAINT PRIMARY KEY (idRegion);

ALTER TABLE departamento ADD CONSTRAINT FOREIGN KEY (IdPais) REFERENCES pais (IdPais);

ALTER TABLE region ADD CONSTRAINT FOREIGN KEY (idDep) REFERENCES departamento (idDept);

ALTER TABLE campers ADD CONSTRAINT FOREIGN KEY (idReg) REFERENCES region (idDep);