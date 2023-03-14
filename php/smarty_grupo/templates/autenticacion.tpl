<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Autenticación</title>
    <link rel="stylesheet" href="css/autenticacion.css">
</head>

<body>

    {if $formulario == true}

        {* Si $formulario es verdadero, mostramos el formulario de inicio de sesión *}

        <h1>Iniciar sesión</h1>

        <form method="post" action="autenticacion.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" autofocus>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena"><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>

    {elseif $usuario}

        {* Si $formulario es falso y $usuario está definido, mostramos el mensaje de bienvenida *}

        <h1>Bienvenido, {$usuario}</h1>
        <h1>Tu contraseña es: {$contrasena}</h1>

        {* Formulario para cerrar cesión *}
        <form method="post" action="autenticacion.php">
            <input type="hidden" name="cerrar" value="true">
            <input type="submit" value="Cerrar sesión">
        </form>

    {/if}

</body>

</html>