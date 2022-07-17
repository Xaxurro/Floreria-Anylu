DROP DATABASE FLORERIA;


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
    id_foto int(8),
    id_producto int(5),
    foto longblob
);

CREATE TABLE carrito(
    id_carrito int(7),
    usuario varchar(255)
);

CREATE TABLE carrito_producto(
    id_carrito int(7),
    id_producto int(5),
    cantidad int(3)
);

CREATE TABLE admin(
    id int(3),
    usuario varchar(30),
    contraseña varchar(24)
);

CREATE TABLE visita(
    id_visita int(7),
    nombre VARCHAR(70),
    correo VARCHAR(50),
    telefono VARCHAR(15),
    id_carrito int(7),
    dia DATE,
    hora VARCHAR (10)
);

ALTER TABLE producto
ADD CONSTRAINT PK_producto PRIMARY KEY (id);
ALTER TABLE producto MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE foto
ADD CONSTRAINT PK_foto PRIMARY KEY (id_foto);
ALTER TABLE foto MODIFY id_foto INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE carrito
ADD CONSTRAINT PK_carrito PRIMARY KEY (id_carrito);
ALTER TABLE carrito MODIFY id_carrito INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE carrito_producto
ADD CONSTRAINT PK_carrito_producto PRIMARY KEY (id_carrito, id_producto);

ALTER TABLE admin
ADD CONSTRAINT PK_admin PRIMARY KEY (id);
ALTER TABLE admin MODIFY id INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE visita
ADD CONSTRAINT PK_visita PRIMARY KEY (id_visita);
ALTER TABLE visita MODIFY id_visita INTEGER NOT NULL AUTO_INCREMENT;


ALTER TABLE carrito_producto
ADD CONSTRAINT FK_carrito_producto_producto FOREIGN KEY (id_producto) REFERENCES producto(id);

ALTER TABLE carrito_producto
ADD CONSTRAINT FK_carrito_producto_carrito FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito);

ALTER TABLE foto
ADD CONSTRAINT FK_foto_producto FOREIGN KEY (id_producto) REFERENCES producto(id);



INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'holas', 21, 160, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'epico', 52, 690, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'holas', 91, 830, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'increible', 32, 320, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'hola', 96, 50, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'hola', 1, 450, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'ola', 55, 490, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'que pasa', 88, 860, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'epico', 16, 890, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'increible', 39, 330, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('no', 'si', 26, 690, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'hola', 90, 50, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'epico', 42, 480, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'ola', 83, 390, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'epico', 75, 940, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'hola', 95, 770, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('que pasa', 'no', 3, 400, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'holas', 38, 790, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'si', 64, 860, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'no', 52, 70, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'epico', 29, 300, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'tal vez', 39, 910, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'hola', 4, 420, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'holas', 80, 130, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('increible', 'holas', 29, 570, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'si', 89, 990, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'no', 21, 680, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('que pasa', 'epico', 6, 90, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('que pasa', 'tal vez', 64, 870, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'tal vez', 79, 470, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'epico', 21, 10, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('no', 'si', 6, 780, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'hola', 24, 110, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('hola', 'si', 34, 480, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'ola', 51, 970, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'que pasa', 23, 200, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'ola', 32, 780, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'ola', 10, 70, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'epico', 3, 70, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('holas', 'tal vez', 85, 130, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'increible', 61, 560, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'tal vez', 64, 820, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('no', 'no', 53, 790, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'epico', 96, 520, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('epico', 'tal vez', 40, 510, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'tal vez', 78, 630, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('ola', 'increible', 89, 0, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('si', 'hola', 57, 170, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('no', 'increible', 14, 10, 1);
INSERT INTO producto(nombre, descripcion, stock, precio, estado) VALUES ('tal vez', 'epico', 4, 870, 1);