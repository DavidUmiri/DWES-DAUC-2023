<doctype html>
  <html>

  <head>
    <title>Formulario</title>
  </head>

  <body>
    <form action="Formulario.php" method="POST">
      <h2>FORMULARIO</h2>

      <b>NOMBRE</b>
      <input type="text" style="text-transform: uppercase" name="nombre" placeholder="Introduce un nombre" size="25" />
      <br />
      <br />

      <b>APELLIDOS</b>
      <input type="text" style="text-transform: uppercase" name="apellidos" placeholder="Introduce tus apellidos" size="25" />
      <br />
      <br />

      <b>EDAD</b>
      <input type="number" style="text-transform: uppercase" name="edad" placeholder="Introduce tu edad" size="25" />
      <br />
      <br />

      <b>SEXO</b>
      <input type="radio" name="sexo" value="mujer" />
      <label for="mujer">MUJER</label>
      <input type="radio" name="sexo" value="hombre" />
      <label for="hombre">HOMBRE</label>

      <br />
      <br />
      <input type="submit" style="text-transform: uppercase" name="enviar" />
    </form>

    <?php
    if (!isset($_REQUEST["nombre"], $_REQUEST["apellidos"], $_REQUEST["edad"])) {
      $_REQUEST["nombre"] = "";
      $_REQUEST["apellidos"] = "";
      $_REQUEST["edad"] = 0;
    } else {
      $nombre = $_REQUEST["nombre"];
      $apellidos = $_REQUEST["apellidos"];
      $edad = $_REQUEST["edad"];

      $resumen = $nombre . " " . $apellidos . " " . $edad;
      echo "<textarea style='text-transform: uppercase'>$resumen</textarea>";
    }



    ?>
  </body>

  </html>
</doctype>