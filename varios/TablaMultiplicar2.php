<?php
echo "<table border = 1;>";
for($x=1; $x<=10; $x++){
    echo "<tr>";
    for($j=1; $j<=10; $j++){
        $resultado = ($x * $j);
        echo "<td>$resultado</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>