<html>
<head>
<meta charset="utf-8">
<title>Lista de la compra</title>
</head>

<body>

<h1>Lista de la compra</h1>

<?php 
if(isset($_REQUEST["enviar"])){
    $producto = $_REQUEST["producto"];
    $resultado = $_REQUEST["resultado"];
    $resultado = $resultado . $producto;
} else {
    $producto = "";
    $resultado = "";
}

if(isset($_REQUEST["borrar"])){
    $resultado = "";
}

?>

<form method=post>

<label>Producto:</label>
<input type="text" name="producto" autofocus/>
<br><br>
<input type="submit" name="enviar" value="Enviar" />
<input type="submit" name="borrar" value="Borrar todo" />

<br><br>
<textarea name="resultado" cols="30" rows="10"><?php print "$resultado\n"; ?></textarea>
</form>


</body>
</html>
