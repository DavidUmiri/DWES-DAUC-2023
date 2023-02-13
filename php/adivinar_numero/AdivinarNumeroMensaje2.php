<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>

<body style="text-align: center;">

    <?php
    // Obtenemos el numero indicado por el jugador en el formulario.
    $num_jugador = $_REQUEST["form_num"];

    // Comprobamos si hay almacenado un numero en la sesion o tenemos que inventar uno nuevo.
    if (isset($_SESSION["num_aleatorio"]) == false) {
        $_SESSION["num_aleatorio"] = mt_rand(1, 100);
    }
    ?>

    <!-- Compruebo en pantalla si el numero aleatorio se mantiene. -->
    <br>
    <p>Num jugador: <?php echo $num_jugador ?></p>
    <p>Num secreto: <?php echo $_SESSION["num_aleatorio"] ?></p>

    <?php
    // Comprobamos si ha acertado.
    if ($_SESSION["num_aleatorio"] == $num_jugador) {
        // Ha acertado, mostramos resultado.
        // Eliminamos la variable de sesion para una nueva partida.
        unset($_SESSION["num_aleatorio"]);
        echo "¡Acertaste!";
        echo "<p><a href='AdivinarNumeroMensaje.php'><button>Nueva partida</button></a></p>";
    } else {
        echo "¡Fallaste!";
        echo "<p><a href='AdivinarNumeroMensaje.php'><button>Intentarlo de nuevo</button></a></p>";
        // Le mandamos un mensaje al usuario y le decimos si tiene que subir o bajar de numero.
        if ($num_jugador > $_SESSION["num_aleatorio"]) {
            echo "Baja de numero";
        } else if ($num_jugador < $_SESSION["num_aleatorio"]) {
            echo "Sube de numero";
        }
    }
    ?>

</body>

</html>