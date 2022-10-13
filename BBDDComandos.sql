-- Crear la base de datos.
create database tienda;
use tienda;

-- Crear usuario y contraseña.
create user david identified by 'david';

-- Permisos usuario.
grant all on * to david;

-- Crear tabla.
create table almacen(ropa varchar(20) primary key, cantidad int);

-- Insertar en la tabla.
insert into almacen values('sudaderas',20);

-- Actualizar datos.
update almacen set cantidad = cantidad + 10 where ropa = 'sudaderas'; 