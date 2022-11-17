<html>

<body>
    <h1>Weather query</h1>
    <?php
    if ('post' === strtolower($_SERVER['REQUEST_METHOD'])) {
    ?>
        <!-- NO FUNCIONA -->
        <h2><?php echo file_get_contents('https://api.openweathermap.org/data/2.5/weather?lat=44.34&lon=10.99&appid=5157ac5d3870a0edb23cc72ed0280f3a'); ?></h2>
    <?php
    } else {
    ?>
        <form method="post">
            <input type="submit" value="Get London's temperature">
        </form>
    <?php
    }
    ?>
</body>

</html>