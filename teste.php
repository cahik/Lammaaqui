<?php

$nascimento = '2003-05-18';
$atual = date('Y-m-d');

$idade = intval($atual) - intval($nascimento);

var_dump($idade);


?>