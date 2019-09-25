<?php

require_once "match.class.php";

$delete = new Mostrar_matches();
$delete->deletar_match($_POST['Id']);

echo $_POST['Id'];

?>