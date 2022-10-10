<?php
define("TOPE", 50);

// Intentos.
if (isset($_REQUEST["intentos"])) {
    $intentos = $_REQUEST["intentos"];
} else {
    $intentos = 0;
    $intentos++;
}

// Numero aleatorio.
if (isset($_REQUEST["aleatorio"])) {
    $aleatorio = $_REQUEST["aleatorio"];
} else {
    $aleatorio = rand(1, TOPE);
}

// 
if (isset($_REQUEST["numero"])) {
    $num = $_REQUEST["numero"];
    if ($num == $aleatorio) {
        echo "Lo adivinaste, en $intentos intentos";
    } else if ($num < $aleatorio) {
        echo "Mi numero es mayor";
    } else {
        echo "Mi numero es menor";
    }
}


muestraFormulario(TOPE, $aleatorio, $intentos);
?>


<?php
function muestraFormulario($tope, $ale, $intentos)
{
    echo <<<FIN
    <form method="post">
    <label for="">Dime tu numero entre 1 y $tope:</label>
    <input type="number" name="numero">
    <input type="submit" value="Enviar">
    <input type="hidden" name="aleatorio" value="$ale">
    <input type="hidden" name="intentos" value="$intentos">
    </form>
    FIN;
} // muestraFormulario
?>

<!-- <label>Llevas $intentos intentos</label><br>  -->