<!DOCTYPE html>
<html>

<head>
    <title>Claro - Oscuro</title>
</head>

<body>

    {* Dependiendo de la variable de sesión mostramos un css u otro *}
    {if $smarty.session.tema eq 'light'}
        <link rel="stylesheet" type="text/css" href="css/light.css">
        <h1>Claro</h1>
    {else}
        <link rel="stylesheet" type="text/css" href="css/dark.css">
        <h1>Oscuro</h1>
    {/if}

    {* Mostramos el botón de cambio de tema  *}
    <form method="post">
        <button name="cambiarTema" type="submit">Cambiar tema</button>
    </form>

</body>

</html>