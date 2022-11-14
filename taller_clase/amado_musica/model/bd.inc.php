<?php

/*
*	Función login
*/

function login_okey()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$user = $_POST["email"];
	$pass = $_POST["pass"];
	$sql = "select count(*)as cuenta from usuarios where Name='$user' and Pass='$pass';";
	$resultado = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($resultado);
	if ($array["cuenta"] > 0) {
		$_SESSION["userPass"] = $user . $pass;
		return true;
	} else {
		return false;
	}
}

/*
*	Función añadir un producto
*/
function anadir_producto()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$id = '';
	$nombre =  $_POST["nombre"];
	$precio =  $_POST["precio"];
	$stock =  $_POST["stock"];
	$sql = "select count(*)as comprueba from stock where ProdName='$nombre'";
	$resultado = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($resultado);
	if ($array["comprueba"] > 0) {
		show_msg("El producto existe.");
		return false;
	} else {
		$sql = "insert into `stock` values ('$id','$nombre',$precio,$stock);";
		$resultado = mysqli_query($conn, $sql);
		return true;
	}
}

/*
*	Función eliminar un producto
*/

function eliminar_producto()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$nombre =  $_REQUEST["instrumentos"];
	show_msg($nombre);
	$sql = "select count(*)as comprueba from stock where ProdName='$nombre'";
	$resultado = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($resultado);
	if ($array["comprueba"] > 0) {
		$sql = "delete from `stock` where ProdName='$nombre';";
		$resultado = mysqli_query($conn, $sql);
		return true;
	} else {
		
		return false;
	}
}

/*
*	Función eliminar stock
*/

function eliminar_stock()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$nombre =  $_POST["instrumentos"];
	$stock =  $_POST["cantidad"];
	$sql = "select count(*)as comprueba from stock where ProdName='$nombre'";
	$res = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($res);
	if ($array["comprueba"] > 0) {
		$sqls = "select ProdStock from stock where ProdName ='$nombre'";
		$res = mysqli_query($conn, $sqls);
		$array = mysqli_fetch_array($res);
		if ($array["ProdStock"] >= 0) {
			$sqli = "update stock set ProdStock = ProdStock-$stock where ProdName = '$nombre'";
			$res = mysqli_query($conn, $sqli);
			return true;
		} else {
			return false;
		}
	}
}

/*
*	Función añade stock
*/

function reponer_stock()
{
	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$nombre =  $_POST["instrumentos"];
	$stock =  $_POST["cantidad"];
	$sql = "select count(*)as comprueba from stock where ProdName='$nombre'";
	$res = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($res);
	if ($array["comprueba"] > 0) {
		$sqli = "update stock set ProdStock = ProdStock+$stock where ProdName = '$nombre'";
		$res = mysqli_query($conn, $sqli);
		return true;
	} else {
		show_msg("No queda stock.");
		return false;
	}
}

/*
*	Función crear usuario
*/

function crear_usuario()
{

	include 'configuration.inc.php';
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
	$id = '';
	$user = $_POST["email"];
	$pass = $_POST["pass"];
	$sql = "select count(*)as comprueba from usuarios where Name='$user' and Pass='$pass';";
	$resultado = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($resultado);
	if ($array["comprueba"] > 0) {
		show_msg("El usuario existe.");
		return false;
	} else {
		$sql = "insert into `usuarios` values ('$id','$user','$pass');";
		$resultado = mysqli_query($conn, $sql);
		return true;
	}
}
