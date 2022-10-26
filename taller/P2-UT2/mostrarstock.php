<?php
session_start();

if ($_SESSION["usuario"] != "valen" || $_SESSION["password"] != "1234Abc@") {
    header('Location: http://localhost/JuegosMesa/login2.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h1>Bienvenido a la fortaleza de la soledad</h1>
    <br>
    <h2>Escoja la opción que desee</h2>
    <?php
    echo "<a href='modificarstock.php'>Modificar Stock</a><br>";


    ?>
    <h2>Aqui le mostramos nuestro catalogo de juegos</h2>

    <?php
    $host = 'localhost';
    $dbname = 'juegosdemesa';
    $username = 'valen';
    $password = '1234Abc@';

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = "SELECT * FROM juegos";
    $query = $con->prepare($sql);
    $query->execute();
    while ($resultado = $query->fetch()) {


        echo "
        <table border='1px' style='border-collapse: collapse' style=text-align:center ;>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Stock</th>

        </tr>
        <tr>
        <td>" . $resultado['id'] . "</td>
        <br>
        
        <td>" . $resultado['nombre'] . "</td>
        <br>
        <td>" . $resultado['descripcion'] . "</td>
        <br>
        <td>" . $resultado['stock'] . "</td>
        <br>
        </tr>
        
        </table>";
    }
    ?>
</body>

</html>