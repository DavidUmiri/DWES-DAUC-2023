<html>

<body>
    <h1>TIEMPO</h1>

    <?php
    if ('post' === strtolower($_SERVER['REQUEST_METHOD'])) {
    ?>

        <!-- formato por defecto: JSON -->
        <h2><?php echo file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=Madrid&appid=5157ac5d3870a0edb23cc72ed0280f3a'); ?></h2>

        <!-- formato HTML -->
        <h2><?php echo file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=Madrid&appid=5157ac5d3870a0edb23cc72ed0280f3a&mode=html'); ?></h2>

        <!-- formato XML -->
        <h2><?php
            $xml = new SimpleXMLElement('https://api.openweathermap.org/data/2.5/weather?mode=xml&units=metric&q=Madrid&appid=5157ac5d3870a0edb23cc72ed0280f3a', 0, true);
            echo $xml->temperature['value'];
            ?></h2>

    <?php

    } else {

    ?>
        <form method="post">
            <input type="submit" value="Temperatura de MADRID actual">
        </form>
    <?php
    }
    ?>
</body>

</html>