<?php
include('../class/accesos.php');
if(isset($_POST['submit'])) {
	$correo = $_POST['correo'];
	$pass = $_POST['pass'];
	$params = array(
		'correo'=>$correo, 
		'pass'=>$pass
	);

	$login = json_decode($accesos->login($params));

	if ($login->estado == true) {
		echo 'Se inicio sesion correctamente.';
		print_r($login);
	} else {
		echo '<p>Ocurrio un error.</p>';
		echo $login->mensaje;
	}
}
?>