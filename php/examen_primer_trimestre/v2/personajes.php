<?php

$personajes = [
	["id" => 1, "nombre" => "Bob Esponja"],
	["id" => 2, "nombre" => "Patricio Estrella"],
	["id" => 3, "nombre" => "Calamardo Tentáculos"],
	["id" => 4, "nombre" => "Arenita Mejillas"],
	["id" => 5, "nombre" => "Don Cangrejo"],
	["id" => 6, "nombre" => "Plankton"],
	["id" => 7, "nombre" => "Perla Cangrejo"],
	["id" => 8, "nombre" => "Karen"],
	["id" => 9, "nombre" => "Sra. Puff"],
	["id" => 10, "nombre" => "Gary"],
];

if (strtoupper($_SERVER["REQUEST_METHOD"]) != "GET") {
	header('HTTP/1.1 422 Unprocessable Entity');
	die();
} else {
	// header('Content-type:application/json;charset=utf-8'); -> designa el contenido para que esté en formato JSON, codificado en la codificación de caracteres UTF-8
	header('Content-type:application/json;charset=utf-8');
	// para cambiar el formato de vista JSON_PRETTY_PRINT
	// para ver las tildes correctamente JSON_UNESCAPED_UNICODE
	// para colocar varios flags(opciones) |
	echo json_encode($personajes, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

$matches = array();

if (preg_match("/(\d+)$/", $_SERVER['REQUEST_URI'], $matches)) {
	// Si el URI termina por un número, se lo asignamos a $id
	$id = $matches[0];
	header('Content-type:application/json;charset=utf-8');
	echo json_encode($personajes[$id - 1], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}
