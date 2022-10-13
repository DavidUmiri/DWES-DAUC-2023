<?php
// creo dos variables en otro documento, nombreapellido.php
$nombre = 'Pedro';
$apellido = 'Garcia';

// la línea inferior no muestra el contenido de las variables porque no existen aun en el script
echo "El nombre es $nombre y el apellido es $apellido";

// realizamos el include
include 'nombreapellido.php';

// esta línea si muestra el contenido de las variables porque ya existen en el include
echo "El nombre es $nombre y el apellido es $apellido";
