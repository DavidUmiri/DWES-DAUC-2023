<?php
// Define: para definir constantes 
define("RUTA_ARCHIVO", "stock.ser");

if (file_exists(RUTA_ARCHIVO)) {
    // echo "El archivo existe";
    $stock = unserialize(file_get_contents(RUTA_ARCHIVO));
    foreach ($stock as $fruta => $valor) {
        echo "<br> $fruta : $valor";
    }
} else {
    // rellenamos el array
    $stock = array(
        "fresas" => 10,
        "platanos" => 20,
        "kiwis" => 5
    );
    // file_put_contents rellena o crea el archivo si no existe
    echo "<br>" . file_put_contents(RUTA_ARCHIVO, serialize($stock));
}
