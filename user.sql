CREATE DATABASE user;

CREATE TABLE `usuarios`(
id_u INTEGER AUTO_INCREMENT PRIMARY KEY,
nombre_u VARCHAR(15) NOT NULL, 
apellidos_u VARCHAR(20) NOT NULL,
ciudad_u VARCHAR(12),
fecha_nac_u DATE,
user_u VARCHAR(20) NOT NUll,
pass_u CHAR(32) NOT NUll

);

INSERT INTO `usuarios` VALUES
('NULL','carlos','reyes','Pucallpa','1999-10-16','carl@gmail.com',md5('carletos'));