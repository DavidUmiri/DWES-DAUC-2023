create database frutas;
create user frutero identified by 'frutero';
use frutas;
grant all on * to frutero;
create table stock(fruta varchar(20) primary key, stock int);
insert into stock values('platano',20);