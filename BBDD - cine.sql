DROP DATABASE IF EXISTS cine;
CREATE DATABASE IF NOT EXISTS cine;
USE cine;

CREATE TABLE usuario (
	id_usuario SMALLINT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(30),
    apellido1 VARCHAR(30),
    apellido2 VARCHAR(30),
    nombre_usuario VARCHAR(30),
    correo VARCHAR(50),
    contrasena CHAR(64),
    rol CHAR(13) NOT NULL,
    
    CONSTRAINT pk_id_usuario PRIMARY KEY (id_usuario),
    CONSTRAINT ck_rol CHECK (rol IN ('Administrador', 'Cliente'))
);

CREATE TABLE butaca (
	id_butaca SMALLINT AUTO_INCREMENT NOT NULL,
    numero SMALLINT NOT NULL,
    fila SMALLINT NOT NULL,
    color CHAR(13) NOT NULL,
    
    CONSTRAINT pk_id_butaca PRIMARY KEY (id_butaca),
    CONSTRAINT ck_color CHECK (color IN ('Verde', 'Rojo', 'Gris'))
);

CREATE TABLE sala (
	id_sala SMALLINT AUTO_INCREMENT NOT NULL,
    descripcion VARCHAR(2000),
    capacidad SMALLINT,
    habilitada BOOLEAN NOT NULL,
    imagen VARCHAR(2000),
    luxury BOOLEAN NOT NULL,
    id_butaca SMALLINT NOT NULL,
    
    CONSTRAINT pk_id_sala PRIMARY KEY (id_sala),
    CONSTRAINT fk_id_butaca FOREIGN KEY (id_butaca) REFERENCES butaca (id_butaca)
);

CREATE TABLE pelicula (
	id_pelicula SMALLINT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(2000) NOT NULL,
    imagen VARCHAR(2000),
    descripcion VARCHAR(2000),
    categoria VARCHAR(2000),
    precio DOUBLE NOT NULL,
    duracion SMALLINT NOT NULL,
    
    CONSTRAINT pk_id_pelicula PRIMARY KEY (id_pelicula)
);

CREATE TABLE reserva (
	id_reserva SMALLINT NOT NULL AUTO_INCREMENT,
	fecha DATE NOT NULL,
    hora VARCHAR(100),
    id_sala SMALLINT NOT NULL,
    id_pelicula SMALLINT NOT NULL,
    id_usuario SMALLINT NOT NULL,
    
    CONSTRAINT pk_id_reserva PRIMARY KEY (id_reserva),
    CONSTRAINT fk_id_sala FOREIGN KEY (id_sala) REFERENCES sala (id_sala),
    CONSTRAINT fk_id_pelicula FOREIGN KEY (id_pelicula) REFERENCES pelicula (id_pelicula),
    CONSTRAINT fk_id_usuario_ FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)
);

INSERT INTO pelicula (nombre, imagen, descripcion, categoria, precio, duracion) VALUES ('Ocho apellidos vascos' ,'', 'Para público exigente', 'Comedia', 9.99, 140);
INSERT INTO usuario (nombre, apellido1, apellido2, nombre_usuario, correo, contrasena, rol) VALUES ('Juan', 'Gutierrez', 'Rodriguez', 'juan28', 'juan@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Cliente');
INSERT INTO usuario (nombre, apellido1, apellido2, nombre_usuario, correo, contrasena, rol) VALUES ('Marta', 'Fernandez', 'Sanchez', 'marta456', 'marta@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Administrador');
INSERT INTO usuario (nombre, apellido1, apellido2, nombre_usuario, correo, contrasena, rol) VALUES ('Pepe', 'Fernandez', 'Sanchez', 'pepe4', 'pepe@ciudadescolarfp.es', 'b2b4b251569487f1bd5ce7dff52f3ecd59cf04154e4dc46ede3c604f6b55c3bc', 'Administrador');
INSERT INTO butaca (numero, fila, color) VALUES (1, 2, 'Verde');
INSERT INTO sala (descripcion, capacidad, habilitada, imagen, luxury, id_butaca) VALUES ('Sala infantil', 100, 1, '', 0, 1); 

select * from pelicula;