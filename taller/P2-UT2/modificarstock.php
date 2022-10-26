<?php
session_start();

if($_SESSION["usuario"]!= "valen"|| $_SESSION["password"]!= "1234Abc@")
{
    header('Location: http://localhost/JuegosMesa/login2.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Stock</title>
</head>
<body>
    <h1>Aqui podrá realizar los cambios en el stock</h1>
    <form action="modificarstock.php" method="POST">
   <?php 
//Conexión
$host = 'localhost';
$dbname = 'juegosdemesa';
$username = 'valen';
$password = '1234Abc@';
$con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//Botón enviar

echo "<input type='submit' name='actualizar' value='Actualizar Stock'>";


if(isset($_POST["actualizar"])){
        
    if($respuesta = $con -> query("SELECT * from juegos"))
    {
        while($resultado = $respuesta->fetch())
        {
            $variable =['stock' => $_POST[$resultado["id"]]];
        
            
            $sql = "UPDATE juegos SET stock=:stock where id =". $resultado["id"];
            $stmt = $con->prepare($sql);
            $stmt -> execute($variable);
        }
    }
}


if($consulta=$con -> query("SELECT * from juegos"))
{
    while($resultado = $consulta -> fetch())
    {   

    
        echo "
        <table border='1px' style='border-collapse: collapse' style=text-align:center ;>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Nuevo Stock</th>

        </tr>
        <tr>
        <td>".$resultado['id']."</td>
        <td>".$resultado['nombre']."</td>
        <td>".$resultado['stock']."</td>
        <br>
        <td><input type='number' min='0' name='".$resultado['id']."' value='".$resultado['stock'] ."'</td>
        </tr>
        
        </table>";
    }
    }
    
?>
    </form>
</body>
</html>