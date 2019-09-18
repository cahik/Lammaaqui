<?php

CONST HOST = "127.0.0.1";
CONST USER = "root";
CONST PASS = "";
CONST DB   = "llamaaqu_master";

// CONST HOST = "llamaaqui.ml:3306";
// CONST USER = "llamaaqui";
// CONST PASS = "entra21@Blusoft";
// CONST DB   = "llamaaqu_master";

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