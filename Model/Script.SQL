CREATE DATABASE FLORERIA;

USE FLORERIA;

CREATE TABLE producto(
    id int(5),
    nombre varchar(50),
    descripcion varchar(250),
    stock int(4),
    precio int(7),
    estado int(1)
);

CREATE TABLE foto(
    id_foto int(4),
    id_producto int(5),
    foto longblob
);

CREATE TABLE carrito(
    id_carrito int(7),
    usuario varchar(255),
    confirmado int(1)
);

CREATE TABLE carrito_producto(
    id_carrito int(7),
    id_producto int(5),
    cantidad int(3)
);

CREATE TABLE admin(
    id_admin int(3),
    usuario varchar(30),
    contraseña varchar(24)
);

CREATE TABLE visita(
    nombre VARCHAR(50),
    mail VARCHAR(50),
    dia DATE,
    hora VARCHAR (10)
);

ALTER TABLE producto
ADD CONSTRAINT PK_product PRIMARY KEY (id);
ALTER TABLE producto MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE foto
ADD CONSTRAINT PK_foto PRIMARY KEY (id_foto);
ALTER TABLE foto MODIFY id_foto INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE carrito
ADD CONSTRAINT PK_carrito PRIMARY KEY (id_carrito);
ALTER TABLE carrito MODIFY id_carrito INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE admin
ADD CONSTRAINT PK_admin PRIMARY KEY (id_admin);
ALTER TABLE admin MODIFY id_admin INTEGER NOT NULL AUTO_INCREMENT;


ALTER TABLE carrito_producto
ADD CONSTRAINT FK_carrito_producto_producto FOREIGN KEY (id_producto) REFERENCES producto(id);

ALTER TABLE carrito_producto
ADD CONSTRAINT FK_carrito_producto_carrito FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito);

ALTER TABLE foto
ADD CONSTRAINT FK_foto_producto FOREIGN KEY (id_producto) REFERENCES producto(id);

