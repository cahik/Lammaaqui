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


$sql = "SELECT * FROM gerador";
$query = mysqli_query($con, $sql);
$resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

for ($i = 1; $i <= 1000; $i++) {

	$randow = array_rand($resultado);
	$resultado_nome = $resultado[$randow]['Nome'];
	$resultado_email = $resultado[$randow]['Email']."_".mt_rand(1, 9999);
	$senha = mt_rand(10000000, 99999999);
	$sexo = mt_rand(1, 2);

	if ($sexo == 1) {
		$sexo = 'Masculino';
	} else {
		$sexo = 'Feminino';
	}


	$dia = mt_rand(1, 29);
	$mes = mt_rand(1, 12);
	$ano = mt_rand(1960, 2000);

	$estado = 24;
	$cidade = mt_rand (4413, 4705);

	$data = $ano."-".$mes."-".$dia;

	$sql_verifica = "SELECT * FROM dados_usuario where Email = '$resultado_email'";
	$query = mysqli_query($con, $sql_verifica);

	if (mysqli_num_rows($query) == 0) {

		$sql = "INSERT INTO dados_usuario (Nome, Email, Senha, Sexo, Data_nascimento, Fk_cidade, Fk_estado) values ('$resultado_nome', '$resultado_email', '$senha', '$sexo', '$data', '$cidade', '$estado')";

		mysqli_query($con, $sql);

	}


}


?>