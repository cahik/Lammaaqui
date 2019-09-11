<?php



$estado = $_POST['estado'];

$sql2 = "SELECT * FROM cidade where Estado = $estado";

$query2 = mysqli_query($con, $sql2);

$resultado2 = array();

while ($consulta = mysqli_fetch_array($query2)) {

	$resultado2[] = utf8_encode($consulta['Nome_cidade']);

}

$json = json_encode($resultado2);

echo $json;



?>