<?php
require_once "match.class.php";
$recebe = $_POST['id_recebe'];
$recebe1 = $_POST['Id_da'];
$acao = $_POST['acao'];

$a = new match();
die("morreu");

if ($acao == "like"){

$a->like($recebe, $recebe1  );

}else{
$a->dislike($recebe, $recebe1  );
}

?>