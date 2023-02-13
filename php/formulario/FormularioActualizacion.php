<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario actualizacion</title>
</head>

<?php
if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $direccion = $_REQUEST['direccion'];
    $correo = $_REQUEST['correo'];
    $sexo = $_REQUEST["sexo"];

    $resultado =  $_REQUEST["resultado"];
    $resultado = $resultado . " " . $nombre . " " . $direccion . " " . $correo . " " . $sexo;
} else {
    $nombre = "";
    $direccion = "";
    $correo = "";
    $sexo = "";
    $resultado = "";
}


?>

<body>
    <br>
    <form action="FormularioActualizacion.php" method="POST">
        <!-- APELLIDOS Y NOMBRE -->
        <fieldset>
            <legend>APELLIDOS Y NOMBRE</legend>
            <p>
                <input autofocus style="text-transform: uppercase;" type="text" name="nombre" id="nombre" size="30" value="<?php echo $nombre ?>">
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
                <input type="radio" name="sexo" value="mujer">
                <label for="sexo">Mujer</label>
            </p>
            <p>
                <input type="radio" name="sexo" value="hombre">
                <label for="sexo">Hombre</label>
            </p>
            <p>
                <input type="radio" name="sexo" value="otro">
                <label for="sexo">Otro</label>
            </p>
        </fieldset>
        <!-- ENVIAR Y BORRAR -->
        <fieldset>
            <input type="submit" name="enviar" value="ENVIAR">
            <input style="float: right;" type="reset" name="borrar" value="BORRAR">
        </fieldset>
        <!-- ALMACENAR NOMBRE ANTERIOR -->
        <br>
        <textarea style="text-transform: uppercase;" name="resultado" cols="150" rows="10"><?php print "$resultado\n" ?></textarea>
    </form>


</body>

</html>