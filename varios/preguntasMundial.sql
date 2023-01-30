DROP DATABASE IF EXISTS preguntasMundial;
CREATE DATABASE preguntasMundial;
DROP USER IF EXISTS jugador;
CREATE USER jugador IDENTIFIED BY 'jugador';
USE preguntasMundial;
GRANT ALL ON *.* TO jugador;

CREATE TABLE jugadores
(
   id int PRIMARY KEY AUTO_INCREMENT,
   nombre VARCHAR (100) NOT NULL,
   puntuacion int NOT NULL
);