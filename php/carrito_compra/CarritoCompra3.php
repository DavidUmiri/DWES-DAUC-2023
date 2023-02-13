<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_REQUEST["enviar"])) {
        $marca_elegida = $_REQUEST["marcas"];
        $color_elegido = $_REQUEST["colores"];
        $resultado = $_REQUEST["resultado"];
        $resultado = $resultado . $marca_elegida .  " | " . $color_elegido;
    } else {
        $marca_elegida = "";
        $color_elegido = "";
        $resultado = "";
    }
    ?>

    <form action="" method="POST">
        <fieldset>
            <legend>COCHES Y COLORES</legend>

            <label for="marcas">Marcas</label>
            <select name="marcas">
                <option>BMW</option>
                <option>MERCEDES</option>
                <option>MINI</option>
                <option>HONDA</option>
            </select>

            <label for="colores">Colores</label>
            <select name="colores">
                <option>AZUL</option>
                <option>ROJO</option>
                <option>NEGRO</option>
                <option>BLANCO</option>
            </select>

            <input type="submit" name="enviar" value="Enviar">
        </fieldset>

        <fieldset>
            <legend>COCHES ELEGIDOS</legend>

            <!-- <input type="text" name="escondido" value="" hidden> -->
            <textarea name="resultado" cols="30" rows="10"><?php print "$resultado\n"; ?></textarea>

        </fieldset>
    </form>


</body>

</html>