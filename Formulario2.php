<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 2</title>
</head>

<?php
if (array_key_exists('nombre', $_REQUEST)) {
    echo "Hola mundo";
} else {
    echo "Hola " . $_REQUEST["nombre"];
    if (array_key_exists('anterior', $_REQUEST)) {
        echo ", " . $_REQUEST["anterior"] . " te saluda";
    }
}

echo "<br>";

if (array_key_exists('nombre', $_REQUEST)) {
    echo "<input type=hidden name=anterior value=" . $_REQUEST['nombre'] . ">";
}
?>

<body>
    <form action="Formulario2.php" name="nombre"></form>
</body>

</html>