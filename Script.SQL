CREATE TABLE product(
    id_producto number(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_producto varchar(50),
    descripcion_producto varchar(250),
    stock_producto number(4),
    precio_producto number(7),
    estado number(1)
);

CREATE TABLE admin(
    id_admin number(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    password_admin varchar(16) NOT NULL
);

CREATE TABLE user(
    rut varchar(12) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    apellido varchar(50),
    correo nvarchar(255) NOT NULL,
    contraseña varchar(50) NOT NULL,
    telefono varchar(15),
);