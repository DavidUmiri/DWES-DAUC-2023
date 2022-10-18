<?php

$cantidad = $_POST['cantidad'];

if ($pdo = new PDO("mysql:dbname=frutas;host=localhost", "frutero", "frutero")) {
	$update = "UPDATE stock SET stock=stock-$cantidad WHERE frutas='kiwi' and stock >= $cantidad;";

	if ($resultado = $pdo->query($update) != null && $resultado->rowCount() > 0) {
		print "decremento ok";
	} else {
		print "No hay stock suficiente";
	}
} else {
	echo "Problemas al acceder a la BBDD";
}


?>

<form method="POST">
	<label>Cantidad</label>
	<input type="text" name="cantidad">
	<input type="submit" value="Enviar">
</form>


<!-- Como os comentaba antes en clase, dos opciones:

1.- Con curl, opción -F, ejemplo del propio man de curl:

curl -F name=John -F shoesize=11 https://example.com/
o

curl -F cantidad=3 http://www.misitio.com/stockv2.php

pero es de una en una, con un bucle de bash y terminando el curl con & para que no se quede esperando, podríamos hacer masivas.

2.- Con ab, opciones -T y -p con un archivo que contenga el texto parametro=valor:

ab -T application/x-www-form-urlencoded -n 100 -c 5 -p post.txt http://www.misitio.com/stockv2.php

Referencias:

https://stackoverflow.com/questions/29731023/make-a-post-request-using-ab-apache-benchmarking-on-a-django-server

https://stackoverflow.com/questions/14551194/how-are-parameters-sent-in-an-http-post-request -->