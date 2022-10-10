<?php
define("NOMBREOK", "Pepe");
define("PASSOK", "1234");

if (isset($_REQUEST["nombre"]) && isset($_REQUEST["contraseña"])) {

    if ($_REQUEST["nombre"] == NOMBREOK) {
        header("Location: CarritoCompra.php");
    } else {
        echo "Nombre o contraseña incorrectos.";
    }
}
muestraFormulario("CarritoCompra.php");
?>

<?php
function muestraFormulario($url)
{
    echo <<<FIN
    <form method=post>
    <label>Nombre:</label>
    <input type=input name=nombre>
    <label>Contraseña</label>
    <input type=password name=contraseña>
    <input type=submit name=enviar value=Enviar>
    </form>
    FIN;
}
?>

<!-- "Location: index.php?redir=si" -->
<!-- die(); -->