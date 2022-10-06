<table border="2" align="center">
    <?php
    
    echo "</br>";

    echo "<tr>";
    for ($horizontal = 0; $horizontal <= 10; $horizontal++) {
        echo "<th>";
        echo $horizontal;
        echo "</th>";
    }
    echo "</tr>";

    for ($vertical = 1; $vertical <= 10; $vertical++) {
        echo "<tr>";
        echo "<th>";
        echo $vertical;
        echo "</th>";

        for ($contenido = 1; $contenido <= 10; $contenido++) {
            $multiplicacion = $vertical * $contenido;
            echo "<td>";
            echo $multiplicacion;
            echo "</td>";
        }
        echo "</tr>";
    }

    ?>
</table>