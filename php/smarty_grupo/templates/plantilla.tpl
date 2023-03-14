<!DOCTYPE html>
<html>

<head>
    <title>Claro - Oscuro</title>
</head>

<body>

    {* Muestra el botón de cambio de tema  *}
    <form method="post">
        <button name="cambiarTema" type="submit">Cambiar tema</button>
    </form>

    {* Incluye la hoja de estilo correspondiente al tema actual  *}
    {if $smarty.session.tema eq 'light'}
        <link rel="stylesheet" type="text/css" href="../css/light.css">
        <h1>Claro</h1>
    {else}
        <link rel="stylesheet" type="text/css" href="../css/dark.css">
        <h1>Oscuro</h1>
    {/if}

</body>

</html>