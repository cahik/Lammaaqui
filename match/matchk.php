<?php
require_once "match.class.php";
$recebe = $_POST['id_recebe'];
$recebe1 = $_POST['Id_da'];


$a = new match();
$a->like($recebe, $recebe1  );


?>