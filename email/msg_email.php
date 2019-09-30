<?php

$corpo = '<div class="total" style="margin-left: auto; margin-right: auto; width: 45%; font-family: Arial; padding: 0px; border: 2px solid #343a40; border-radius: 10px;">';
$corpo .= '<div style="background-color: #343a40; padding: 10px 10px 5px 10px; border-radius: 5px 5px 0 0;">';
$corpo .= '<h1 style="margin: 0px; font-size: 3em;"><span style="color: #ffc107;">LLama</span><span style="color: white;">Aqui</span></h1>';
$corpo .= '<h2 style="color: #007bff; margin: 30px 0 0 0;">Redefinir senha</h2>';
$corpo .= '</div>';
$corpo .= '<div style="background-color: white; padding: 0px 10px 5px 10px; border-radius: 0 0 10px 10px;">';
$corpo .= '<p style=" font-size: 1.5em; color: #343a40;">Olá, verificamos que você fez uma requisição para alterar sua senha.<br>Pressione o botão ou clique no link abaixo para ser redirecionado.<br></p>';
$corpo .= '<p style="margin-bottom: 100px !important;"><a href="'.$link.'" style="color: #007bff; text-decoration: none;">'.$link.'</a></p>';
$corpo .= '<a href="'.$link.'"><button style="width: 40% !important; height: 40px; border-radius: 5px; background-color: #007bff; border: 2px solid #007bff; color: white; font-size: 16px; font-weight: 400; margin: 0 2% 15px 2%; color: white !important;"><strong>Trocar senha</strong></button></a>';
$corpo .= '</div>';
$corpo .= '</div>';


echo $corpo;

?>