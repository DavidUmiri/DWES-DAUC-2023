<!-- Muestra el botón de cambio de tema -->
<form method="post">
    <button name="cambiarTema" type="submit">Cambiar tema</button>
</form>

<!-- Incluye la hoja de estilo correspondiente al tema actual -->
{if $smarty.session.tema eq 'light'}
    <link rel="stylesheet" type="text/css" href="css/light.css">
{else}
    <link rel="stylesheet" type="text/css" href="css/dark.css">
{/if}