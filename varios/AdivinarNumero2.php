<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>

<body style="align-items: center;">

    <?php
    // Obtenemos el numero indicado por el jugador en el formulario.
    $num_jugador = $_REQUEST["form_num"];

    // Comprobamos si hay almacenado un numero en la sesion,
    // o tenemos que inventar uno nuevo.
    if (isset($_SESSION["num_aleatorio"]) == false) {
        $_SESSION["num_aleatorio"] = rand(1, 10);
    }
    ?>

    <!-- Utilizar en pantalla información de depuración. -->
    <p>Num jugador: <?php echo $num_jugador ?></p>
    <p>Num secreto: <?php echo $_SESSION["num_aleatorio"] ?></p>


    <?php
    // Comprobamos si ha acertado.
    if ($_SESSION["num_aleatorio"] == $num_jugador) {
        // Ha acertado, mostramos resultado.
        // Eliminamos la variable de sesion para una nueva partida.
        unset($_SESSION["num_aleatorio"]);
    ?>

        <p>Acierto!</p>
        <p><a href="AdivinarNumero.php"><button>Nueva partida</button></a></p>

    <?php } else { ?>

        <p>Fallo!</p>
        <p><a href="AdivinarNumero.php"><button>Intentarlo de nuevo</button></a></p>

    <?php } ?>

</body>

</html>