<?php

require_once "chat.class.php";

$mensagem = $_POST['mensagem'];
$id_enviou = $_POST['id_enviou'];
$id_recebeu = $_POST['id_recebeu'];


$a = new chat();
if ($a->click($mensagem, $id_enviou, $id_recebeu)){
 echo 1;
}else{
    echo 0;
}

?>