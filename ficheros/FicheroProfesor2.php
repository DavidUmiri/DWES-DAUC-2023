<?php
// define(): se utiliza para definir constantes. 
define("RUTA_ARCHIVO", "stock.csv");

if (file_exists(RUTA_ARCHIVO)) {
    // echo "El archivo existe";
    $file = fopen(RUTA_ARCHIVO, "r");
    while ($linea = fgets($file)) {
        // explode(): divide un string en varios string.w
        $campos = explode(",", $linea);
        $stock[$campos[0]] = $campos[1];
    }
    foreach ($stock as $fruta => $valor) {
        echo "<br>$fruta : $valor";
    }
} else {
    // echo "El archivo no existe";
    $stock = array(
        "fresas" => 10,
        "platanos" => 20,
        "kiwis" => 5
    );
    echo "<br>" . file_put_contents(RUTA_ARCHIVO, serialize($stock));

    $file = fopen(RUTA_ARCHIVO, "w");
    foreach ($stock as $fruta => $valor) {
        fputs($file, $fruta . "," . $valor . "\n");
    }
}
