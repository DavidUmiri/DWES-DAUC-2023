<?php
// será el archivo que se incluirá en los otros

session_start();

function mostrar($conexion)
{

    if ($consulta = $conexion->query("SELECT * from Tienda")) { // se guarda en $consulta todo el select y query devuelve verdadero si no ocurre ningún error

        while ($registro = $consulta->fetch()) // para obtener cada fila necesitamos fetch que devuelve un array indexado tanto por nombre como por posicion.fetch, devuelve false si ocurre un error
        {
            echo $registro["ProductoTienda"] . ":" . $registro["Stock"]; // muestra los nombres y stock de productos
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos";
    }
}

if (!isset($_SESSION["user"])) { // si la variable $_SESSION["user"] no está definida llama al header de iniciarSesion.php
    header("Location: iniciarSesion.php");
}
