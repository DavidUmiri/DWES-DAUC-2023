<?php
include('prueba.php'); //se incluye todo el código que hay en el archivo prueba.php
$pdo = new PDO("mysql:host=localhost;dbname=tienda;", "gerente", "gerente"); //dbname poner el nombre de tu base de datos.Mi base esta compuesta por una tabla Tienda con  ProductoTienda(PK) y Stock

if (!(isset($_POST["nombre"]) && isset($_POST["stock"]))) //Si no está definido nombre y stock los inicializo y muestro el contenido de la tabla Tienda.
{
    $_POST["nombre"] = "";
    $_POST["stock"] = 0;
    $_POST["nuevo"] = "";
    mostrar($pdo);
    echo "<br>";
} else {
    if (($_POST["stock"] <= 0 && empty($_POST["nuevo"])) || ($_POST["stock"] > 0 && empty($_POST["nombre"]))) { //si stock es <=0 y el input con name=nuevo está vacío ó, stock es > 0 y nombre está vacío entra muestra los datos de la tabla 
        mostrar($pdo);
    } elseif (!empty($_POST["nuevo"])) { // si nuevo no está vacío 

        $añadir = $_POST["nuevo"]; //creo $añadir y $eliminar para que no causar confusion aunque se puede hacer con una sola.
        $eliminar = "";
        $comprobar = TRUE;
        if ($consulta = $pdo->query("SELECT * from Tienda")) // si la consulta sale bien entra y en $consulta se guarda todo el select
        {
            while ($registro = $consulta->fetch()) { // mirar en prueba.php 

                if ($añadir === $registro["ProductoTienda"]) { // si es igual $eliminar toma el valor de $registro[ProductoTienda]

                    $eliminar = $registro["ProductoTienda"];
                    $comprobar = TRUE;
                    break; // y sale de bucle porque si sigue recorriendo los registro $comprobar tomará el valor de False y nunca se ejecutaría el borrado del producto
                } elseif ($añadir != $registro["ProductoTienda"]) {
                    $comprobar = FALSE;
                }
            }

            if ($comprobar) { // true elimina producto
                $borrar = $pdo->exec("DELETE FROM Tienda WHERE ProductoTienda LIKE '%$eliminar%'");
            } else { // false inserta producto nuevo
                $insertar = $pdo->exec("INSERT INTO Tienda values ('$añadir','0')");
            }
            mostrar($pdo); // muestra los registros
        } else { // si no sale bien imprime el mensaje
            echo "Problema accediendo a la base de datos";
        }
    } else { // si stock es >0 y nombre no está vacío

        $almacenar = 0;
        if ($consulta = $pdo->query("SELECT * from Tienda")) {
            while ($registro = $consulta->fetch()) {
                if ($_POST["nombre"] === $registro["ProductoTienda"]) {
                    $almacenar = $registro["Stock"]; // almaceno el stock que hay en el producto
                }
            }
        } else {
            echo "Problema accediendo a la base de datos";
        }
        $nom = $_POST["nombre"];
        $stock = $_POST["stock"] + $almacenar; //suma de stock del producto y la cantidad introducida
        $actualizar = $pdo->exec("UPDATE Tienda Set Stock='$stock' Where ProductoTienda LIKE '%$nom%'"); //actualizo el stock del producto seleccionado
        mostrar($pdo); //muestra registros
    }
}

//https://www.jairogarciarincon.com/clase/bases-de-datos-en-php/utilizacion-de-bases-de-datos-mediante-pdo-php-data-objects
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Modificar Stock</title>
</head>

<body>

    <form action="modificarStock.php" method="POST">
        <input type="text" name="nombre" placeholder="Introduce nombre producto" value="" size="23px">
        <input type="number" name="stock" placeholder="Introduce cantidad" value="">
        <input type="submit" value="Enviar">
        <br><br>
        <input type="text" name="nuevo" placeholder="Introduce nuevo producto" value="" size="23px">
        <input type="submit" value="AñadirEliminar">
    </form>
    <p><a href="panelControl.php">Ir a panel control</a></p>
    <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>

</body>

</html>