<?php

require_once "site.class.php";

$del = new Site();

$sql = "DELETE FROM notificacoes where Id_usuario = ".$_SESSION['dados']['Id'];


?>