<doctype html>
  <html>

  <head>
    <title>Formulario</title>
  </head>

  <body>
    <?php
    if (isset($_REQUEST["enviar"])) {
      $nombre = $_REQUEST["nombre"];
      $apellidos = $_REQUEST["apellidos"];
      $edad = $_REQUEST["edad"];
      $sexo = $_REQUEST["sexo"];
      $resultado = $_REQUEST["resultado"];
      $resultado = $resultado . $nombre . " " . $apellidos . " " . $edad . " " . $sexo;
    } else {
      $nombre = "";
      $apellidos = "";
      $edad = "";
      $sexo = "";
      $resultado = "";
    }
    // http://localhost:8080/SaludoPost
    ?>
    <center>
      <br><br><br><br>
      <form action="" method="POST">
        <h2>FORMULARIO</h2>
        <b>NOMBRE</b>
        <input type="text" style="text-transform: uppercase" name="nombre" placeholder="Introduce un nombre" size="25" value="<?php echo $nombre; ?>" />
        <br />
        <br />
        <b>APELLIDOS</b>
        <input type="text" style="text-transform: uppercase" name="apellidos" placeholder="Introduce tus apellidos" size="25" value="<?php echo $apellidos; ?>" />
        <br />
        <br />
        <b>EDAD</b>
        <input type="number" style="text-transform: uppercase" name="edad" placeholder="Introduce tu edad" size="25" value="<?php echo $edad; ?>" />
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
        <br><br>
        <input type="text" name="escondido" value="<?php $nombre . $apellidos . $edad . $sexo ?>" hidden>
        <textarea style="text-transform: uppercase" name="resultado" cols="60" rows="10"><?php print "$resultado\n"; ?></textarea>
      </form>
    </center>
  </body>

  </html>
</doctype>