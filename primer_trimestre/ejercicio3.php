<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form method=post>
<label>Nombre:</label>
<input type="text" name="nombre" />
<label>Edad:</label>
<input type="number" name="edad" min="16" max="90" />
<label>Género:</label>
<select name="genero">
<option value=""></option>
<option value="F">Femenino</option>
<option value="M">Masculino</option>
<option value="X">No binario</option>
</select>
<br>
<input type="submit" value="Enviar" />
</form>
</body>
</html>
