<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form name="passs" method="post" action="">
        <label>Pass:</label>
        <input type="text" name="password"><br />
        <label>Salt:</label>
        <input type="text" name="salt"><br />
        <input type="submit" name="submit" value="Generar">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $hash_md5_double = md5(sha1($_POST['salt'] . $_POST['password']));
        echo 'MD5 con Salt & Sha1: ' . $hash_md5_double . '<br><br>';
    }
    ?>

</body>

</html>