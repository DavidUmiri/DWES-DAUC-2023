<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
</head>


<body>
    <br>
    <br>
    <p align="center"><strong>ADIVINA EL NUMERO</strong></p>

    <form action="AdivinarNumeroMensaje2.php" method="POST">
        <table align="center">
            <tr align="center">
                <td>Adivina un numero entre 1 y 100</td>
            </tr>
            <tr align="center">
                <td><input type="number" name="form_num" min="1" max="100"></td>
            </tr>
            <tr align="center">
                <td><input type="submit" name="comprobar" value="Comprobar"></td>
            </tr>
        </table>
    </form>

</body>

</html>