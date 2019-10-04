<?php

	// CONST HOST = "127.0.0.1";
	// CONST USER = "root";
	// CONST PASS = "";
	// CONST DB   = "llamaaqu_master";

CONST HOST = "mysql380.umbler.com:41890";
CONST USER = "vintersr1";
CONST PASS = "entra21B";
CONST DB   = "llamaaqu_master";

	// indapl48
	// entra21@Blusoft

$con = mysqli_connect(HOST, USER, PASS, DB);

$estado = $_POST['estado'];

$sql = "SELECT * FROM cidade where Estado = $estado";

$query = mysqli_query($con, $sql);

$resultado = array();

while ($consulta = mysqli_fetch_array($query)) {

	$resultado[] = [
		"cidade" => utf8_encode($consulta['Nome_cidade']),
		"id" => utf8_encode($consulta['Id_cidade']),

	];

}

$json = json_encode($resultado);
echo $json;
?>