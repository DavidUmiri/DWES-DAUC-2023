<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php
if(isset($_REQUEST["enviar"])){
    $nombre = $_REQUEST["nombre"];
    $edad = $_REQUEST["edad"];
    $genero = $_REQUEST["genero"];
} else {
    $nombre = "";
    $edad = "";
    $genero = "";
}
?>


<form method=post>
<label>Nombre:</label>
<input type="text" name="nombre" value="<?php print $nombre; ?>"/>

<label>Edad:</label>
<input type="number" name="edad" min="16" max="90" value="<?php print $edad; ?>"/>

<label>Género:</label>
<select name="genero">
    <option value="<?php echo $genero; ?>"><?php echo $genero; ?></option>
    <option value="Femenino">Femenino</option>
    <option value="Masculino">Masculino</option>
    <option value="No binario">No binario</option>
</select>
<br>

<input name="enviar" type="submit" value="Enviar" />
</form>

<?php 
if(isset($_REQUEST["enviar"])){
    if($nombre == ""){
        echo "El nombre no deberia estar vacio";
    } 
    
    echo "<br><br>";
    
    if ($edad == ""){
        echo "Debe especificar la edad";
    }

    echo "<br><br>";

    
    if ($genero == ""){
        echo "Debe especificar el genero";
    }

    if($nombre != "" && $edad != "" && $genero != ""){
        echo "Todo correcto, David Umiri";
    }
}

?>
</body>
</html>
