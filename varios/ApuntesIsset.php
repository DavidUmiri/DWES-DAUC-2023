<?php
// Si tenemos por ejemplo un formulario de contacto con las variables definidas así:

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$spamcheck = $_REQUEST['spamcheck'];
$error = false;

// Nos aparecerá el siguiente mensaje en nuestra web: "Notice: Undefined index:" porque que estamos accediendo a un array cuyo indice no existe. Lo solucionamos de esta forma:

if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
} else {
    $name = "";
}

if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
} else {
    $email = "";
}

if (isset($_REQUEST['subject'])) {
    $subject = $_REQUEST['subject'];
} else {
    $subject = "";
}

if (isset($_REQUEST['message'])) {
    $message = $_REQUEST['message'];
} else {
    $message = "";
}

if (isset($_REQUEST['spamcheck'])) {
    $spamcheck = $_REQUEST['spamcheck'];
} else {
    $spamcheck = "";
}
