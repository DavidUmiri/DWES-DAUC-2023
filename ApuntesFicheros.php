<?php
// Apertura para lectura
$fichero = fopen("datos.txt", 'r');

// Apertura para escritura silenciando errores con el operador @
$fichero = @fopen("datos.txt", 'w');

// Apertura para añadir, silenciando y buscando en el path
$fichero = @fopen("datos.txt", 'a', true);

// Apertura para lectura silenciando errores con el operador @
$fichero = @fopen("/datos/datos.txt", 'r');

// Si no se ha podido abrir el fichero finaliza la ejecución del
// script devolviendo un mensaje de error
if (!$fichero)
    die("ERROR: no se ha podido abrir el fichero de datos");

// En caso contrario el script continúa ejecutándose
