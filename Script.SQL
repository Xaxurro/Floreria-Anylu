CREATE DATABASE FLORERIA;

USE FLORERIA;

CREATE TABLE product(
    id_producto number(5),
    nombre_producto varchar(50),
    descripcion_producto varchar(250),
    stock_producto number(4),
    precio_producto number(7),
    estado number(1)
);

CREATE TABLE user(
    rut varchar(12),
    nombre varchar(50),
    apellido varchar(50),
    correo nvarchar(255),
    contraseña varchar(50),
    telefono varchar(15),
);

CREATE TABLE cart(
    id_carrito number(7),
    id_producto number(5),
    cantidad number(3)
);

CREATE TABLE order(
    id_orden number(7),
    rut varchar(12),
    id_carrito
);