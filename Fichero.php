<?php

// Abro el fichero.
$fichero = fopen("FicheroDatos.txt", "w");

// Meto contenido en el fichero.
fputs($fichero, "Linea 1 \n");
fputs($fichero, "Linea 2 \n");
fputs($fichero, "Linea 3 \n");
fputs($fichero, "Linea 4");

// Cierro fichero.
fclose($fichero);

echo "Se ha escrito el fichero correctamente.";
