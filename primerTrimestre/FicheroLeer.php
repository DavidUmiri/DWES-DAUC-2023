<?php

// Colocamos el fichero en modo lectura.
$fichero = fopen("FicheroDatos.txt", "r");

// Mientras no acabe de leer el fichero...
while (!feof($fichero)) {
    // fgets nos da el fichero.
    $linea = fgets($fichero);
    echo $linea . "<br>";
}

// Cerramos el fichero.
fclose($fichero);
