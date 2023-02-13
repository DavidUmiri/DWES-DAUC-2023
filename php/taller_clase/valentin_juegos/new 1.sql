// Creación de base de datos y borrar si hay otra

DROP DATABASE IF EXISTS juegodemesa;

CREATE DATABASE juegosdemesa;

USE juegosdemesa;

CREATE TABLE juegos(
id int PRIMARY KEY,
nombre VARCHAR(100),
descripcion VARCHAR(1000),
stock int
);

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("01","Virus","Tu misión consiste en enfrentarte
 con arrojo a la pandemia y competir por ser el primero 
 en erradicar los virus logrando aislar un cuerpo sano para evitar 
 la propagación de las terribles enfermedades. Éticos o no, todos 
 los medios a tu alcance valen para ganar","25");
 
 INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("02","Monopoly","Monopoly es un juego de mesa basado en el intercambio y la compraventa de bienes raíces","38");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("03","Catan","Catán es un juego de mecánica sencilla. Sobre un tablero que cambia su disposición en cada partida, cada jugador debe construir caminos, pueblos y ciudades y acumular diferentes cartas. Cada uno de estos elementos otorga ciertos puntos y el que llegue a 10 gana","15");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("04","Trivial","Trivial Pursuit es un juego de mesa muy popular cuyo objetivo es contestar correctamente la mayor cantidad de preguntas para juntar los seis “quesitos” y llegar a la pregunta final para ser el vencedor absoluto de la partida","2");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("05","Cluedo","El Cluedo es un juego de tablero donde los participantes deben resolver un crimen ficticio usando su capacidad de deducción.","15");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("Jenga","Jenga es un juego de habilidad física y mental en el que los participantes tienen que retirar los bloques de madera de una torre por turnos y colocarlos en la parte superior, hasta que ésta caiga.
","56");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("06","Dobble","Dobble es un increíble juego de mesa de rapidez mental y visual. El concepto es simple: cada una de las 55 cartas del mazo tiene ocho símbolos, y siempre hay exactamente un símbolo coincidente entre dos cartas cualquiera en el mazo. Tu objetivo es ser el más rápido en encontrar la coincidencia entre dos cartas","25");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("07","Dixit","El objetivo de los jugadores es adivinar cuál de las cartas es la que el cuentacuentos usó para construir su frase. Cada jugador vota de forma secreta la carta que cree que pertenece al cuentacuentos (el cuentacuentos no puede votar).
","64");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("08","Twister","Twister te desafía a colocar los pies y las manos en sitios diferentes en el tapete sin caerte; sé el último jugador que queda en pie para ganar","54");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("09","Party","Se trata de un juego por equipos, de 2 a hasta 5 persona por equipo. El objetivo del juego es superar correctamente una prueba para cada una de las 5 casillas principales para poder puntuar y acto seguido dirigirse a la casilla central para realizar la prueba final y ganar.","41");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("01","Uno","El uno consiste, básicamente, en competir con otros jugadores con el objetivo de ser los primeros que nos hemos quedado sin cartas, y el primero que lo haga ganará el juego, mientras que el último que se quede sin cartas será el perdedor y encargado de repartir nuevamente.
","36");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("10","Blokus","Blokus es un juego de estrategia abstracto que se juega como una extraña versión inversa del Tetris. Los jugadores compiten para colocar tantas piezas en el tablero como sea posible y cubrir la mayor parte del área. Las piezas del mismo color no pueden tocarse en los bordes exteriores, sino que deben estar conectadas por esquinas. Las piezas de diferentes colores pueden tocarse de cualquier manera.","215");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("11","Bang","Es un juego de disparos, al estilo Wild West, entre un grupo de Forajidos (Outlaws) y el Sheriff, su objetivo. Están los Alguaciles (Deputies) del Sheriff, pero también hay un Renegado que solo persigue sus propios intereses!","18");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("12","Evolution","Evolution es un juego de mesa donde los jugadores tendrán que adaptar sus especies en un entorno de lo más hostil. En este sentido, iremos adaptando nuestras especies en un ecosistema cambiante en donde la comida es escasa y los depredadores campan a sus anchas.","119");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("13","Soviet Kitchen","Es un juego cooperativo en el que nos convertimos en el equipo de cocina encargado de alimentar a la Madre Rusia con cachivaches de todo tipo. Si logramos encajar todos los trastos para que los colores se parezcan bastante al plato original y que los comensales no mueran en el intento, iremos escalando desde la cocina del frente hasta el mismísimo Kremlin cumpliendo alguna misión secreta de la KGB.","75");

INSERT INTO juegos(id,nombre,descripcion,stock)
VALUES("14","Ciudadelas","Ciudadelas es un juego de cartas de estrategia en el cual tendremos que construir una ciudad con sus diferentes distritos y conseguir que sea la de mayor esplendor.
","65");



