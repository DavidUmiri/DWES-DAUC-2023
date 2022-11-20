<?php
session_start();
define("TOPE", 50);

// Intentos.
if (isset($_SESSION["intentos"])) {
    $intentos = $_SESSION["intentos"] + 1;
} else {
    $intentos = 0;
}

$_SESSION["intentos"] = $intentos;

// Numero aleatorio.
if (isset($_SESSION["aleatorio"])) {
    $aleatorio = $_SESSION["aleatorio"];
} else {
    $aleatorio = rand(1, TOPE);
    $_SESSION["aleatorio"] = $aleatorio;
}

$_SESSION["aleatorio"] = $aleatorio;

// Numero.
if (isset($_REQUEST["numero"])) {
    $num = $_REQUEST["numero"];
    if ($num == $aleatorio) {
        echo "Lo adivinaste, en $intentos intentos";
        unset($_SESSION["intentos"]);
        unset($_SESSION["aleatorio"]);
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
    </form>
    FIN;
}
?>

<!-- <label>Llevas $intentos intentos</label><br>  -->