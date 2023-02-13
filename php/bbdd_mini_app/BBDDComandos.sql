-- En Windows puedes hacer mysql -u root < fichero.sql
-- Cargar archivo en mysql (windows)
-- source C:\wamp64\www\DWES-DAUC-2023\BBDDMiniApp\BBDDComandos.sql

-- Borrar la base de datos si existe
drop database if exists tienda;

-- Crear la base de datos.
create database tienda;

-- Crear usuario y contraseña.
-- create user usuario identified by 'contraseña';
-- create user 'usuario'@'localhost' identified by 'contraseña';
-- create user 'usuario'@'%' identified by 'contraseña';

-- Permisos usuario.
-- grant all on * to usuario;

-- Usar la base
use tienda;

-- Crear tabla.
create table almacen(ropa varchar(20) primary key, cantidad int);

-- Insertar en la tabla.
insert into almacen values('sudaderas',20);

-- Insertar nuevos elementos.
-- insert into almacen (ropa,cantidad) values ('zapatillas', 10);

-- Actualizar datos.
-- update almacen set cantidad = cantidad + 10 where ropa = 'sudaderas'; 

-- Borrar datos.
-- delete from almacen where ropa="camisas";