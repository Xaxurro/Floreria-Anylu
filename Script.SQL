CREATE DATABASE FLORERIA;

USE FLORERIA;

CREATE TABLE product(
    id_producto int(5),
    nombre_producto varchar(50),
    descripcion_producto varchar(250),
    stock_producto int(4),
    precio_producto int(7),
    estado int(1)
);

CREATE TABLE photo(
    id_foto int(4),
    id_producto int(5),
    foto blob
);

CREATE TABLE usuario(
    rut_usuario varchar(12),
    nombre varchar(50),
    apellido varchar(50),
    correo varchar(255),
    contraseña varchar(50),
    telefono varchar(15)
);

CREATE TABLE cart(
    id_carrito int(7),
    id_producto int(5),
    cantidad int(3)
);

CREATE TABLE user_order(
    id_orden int(7),
    id_carrito int(7),
    rut_usuario varchar(12)
);

CREATE TABLE admin(
    id_admin int(3),
    username_admin varchar(30),
    password_admin varchar(50)
);


ALTER TABLE product
ADD CONSTRAINT PK_product PRIMARY KEY (id_producto);
ALTER TABLE product MODIFY id_producto INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE photo
ADD CONSTRAINT PK_photo PRIMARY KEY (id_foto);
ALTER TABLE photo MODIFY id_foto INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE usuario
ADD CONSTRAINT PK_usuario PRIMARY KEY (rut_usuario);

ALTER TABLE cart
ADD CONSTRAINT PK_cart PRIMARY KEY (id_carrito, id_producto);
ALTER TABLE cart MODIFY id_carrito INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE user_order
ADD CONSTRAINT PK_user_order PRIMARY KEY (id_orden);
ALTER TABLE user_order MODIFY id_orden INTEGER NOT NULL AUTO_INCREMENT;

ALTER TABLE admin
ADD CONSTRAINT PK_admin PRIMARY KEY (id_admin);
ALTER TABLE admin MODIFY id_admin INTEGER NOT NULL AUTO_INCREMENT;


ALTER TABLE cart
ADD CONSTRAINT PK_cart_user_order FOREIGN KEY (id_producto) REFERENCES product(id_producto);

ALTER TABLE user_order
ADD CONSTRAINT PK_user_order_cart FOREIGN KEY (id_carrito) REFERENCES cart(id_carrito);

ALTER TABLE photo
ADD CONSTRAINT PK_photo_product FOREIGN KEY (id_producto) REFERENCES product(id_producto);

ALTER TABLE user_order
ADD CONSTRAINT PK_user_order_user FOREIGN KEY (rut_usuario) REFERENCES usuario(rut_usuario);