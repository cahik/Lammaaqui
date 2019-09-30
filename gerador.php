<?php

CONST HOST = "llamaaqui.ml:3306";
CONST USER = "llamaaqui";
CONST PASS = "entra21@Blusoft";
CONST DB   = "llamaaqu_master";

$con = mysqli_connect(HOST, USER, PASS, DB);


$sql = "SELECT * FROM gerador";
$query = mysqli_query($con, $sql);
$resultado = mysqli_fetch_all($query, MYSQLI_ASSOC);

// for ($i = 1; $i <= 100; $i++) {

$teste = array_rand($resultado);
$resultado_nome = $resultado[$teste]['Nome'];
$resultado_email = $resultado[$teste]['Email'];
$senha = mt_rand(10000000, 99999999);
$sexo = mt_rand(1, 2);

if ($sexo = 1) {
	$sexo = 'Masculino';
} elseif ($sexo = 2) {
	$sexo = 'Feminino';
}

$dia = mt_rand(1, 29);
$mes = mt_rand(1, 12);
$ano = mt_rand(1930, 2000);

$estado = 24;
$cidade = mt_rand (4413, 4705);

$final = array ('Nome' => $resultado_nome, 'Email' => $resultado_email, 'Senha' =>$senha, 'Sexo' => $sexo, 'Dia' => $dia, 'Mes' => $mes, 'Ano' => $ano, 'Estado' => $estado, 'Cidade' => $cidade);
var_dump($final);

// }


?>