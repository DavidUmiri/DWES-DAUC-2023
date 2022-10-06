<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario actualizacion</title>
</head>

<?php
// APELLIDOS Y NOMBRE
if (isset($_REQUEST['nombre'])) {
    $nombre = $_REQUEST['nombre'];
} else {
    $nombre = "";
}
// DIRECCIÓN
if (isset($_REQUEST['direccion'])) {
    $direccion = $_REQUEST['direccion'];
} else {
    $direccion = "";
}
// CORREO ELECTRÓNICO
if (isset($_REQUEST['correo'])) {
    $correo = $_REQUEST['correo'];
} else {
    $correo = "";
}
// SEXO
// ENVIAR Y BORRAR

?>

<body>
    <br>
    <form action="FormularioActualizacion" method="POST">
        <!-- APELLIDOS Y NOMBRE -->
        <fieldset>
            <legend>APELLIDOS Y NOMBRE</legend>
            <p>
                <input style="text-transform: uppercase;" type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" size="30">
            </p>
        </fieldset>
        <!-- DIRECCIÓN -->
        <fieldset>
            <legend>DIRECCIÓN</legend>
            <p>
                <input style="text-transform: uppercase;" type="text" name="direccion" id="direccion" value="<?php echo $direccion ?>" size="30">
            </p>
        </fieldset>
        <!-- CORREO ELECTRÓNICO -->
        <fieldset>
            <legend>CORREO ELECTRÓNICO</legend>
            <p>
                <input type="email" name="correo" id="correo" value="<?php echo $correo ?>" size="30" placeholder="ejemplo_correo@gmail.com">
            </p>
        </fieldset>
        <!-- SEXO -->
        <fieldset>
            <legend>SEXO</legend>
            <p>
                <input type="radio" name="sexo" id="mujer" value="">
                <label for="sexo">Mujer</label>
            </p>
            <p>
                <input type="radio" name="sexo" id="hombre" value="">
                <label for="sexo">Hombre</label>
            </p>
            <p>
                <input type="radio" name="sexo" id="otro" value="">
                <label for="sexo">Otro</label>
            </p>
        </fieldset>
        <!-- ENVIAR Y BORRAR -->
        <fieldset>
            <input type="submit" name="enviar" value="ENVIAR">
            <input style="float: right;" type="reset" name="borrar" value="BORRAR">
        </fieldset>
    </form>

</body>

</html>