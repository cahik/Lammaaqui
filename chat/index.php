<?php

require_once "../classes/match.class.php";
require_once "chat.class.php";


$a = new Mostrar_matches();
$a->mostrar();

$chat = new Chat();

//echo '<pre>';
//var_dump($a->resultado);
//echo '</pre>';
//
//die();






?>


<!DOCTYPE html>
<html>
<head>
	

	<title>teste</title>
	  <link rel="stylesheet" type="text/css" href="chat.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

</head>
<body>

<div id="container">

  <?php foreach ($a->resultado as $chave => $valor) { ?>
    <div class="chat__wrapper" style="float: right;">
      <div class="chat__heading">
        <div class="heading__list">
          <div class="list__avatar">
              <img src="<?php
                  if ($a->resultado[$chave]['Foto'] <> null) {
                    echo '../media/images/fotos_usuarios/'.$a->resultado[$chave]['Foto'];
                  } else {
                    echo '../media/images/fotos_usuarios/avatar.png';
                  }?>
                ">
          </div>
          <div class="list__title">
            <?=$a->resultado [$chave]['Nome']; ?>
          </div>
        </div>
      </div>
      <div class="chat__bubbles" id="balao">
          <?php
            $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $a->resultado[$chave]['Id']);

            foreach ($mensagens as $key => $mensagem) {
                if($mensagem['id_enviou'] == $_SESSION['dados']['Id']) {
                    echo ' <div class="chat__bubble --right">'.$mensagem['mensagem'].'</div>';
                } else if ($mensagem['id_enviou'] == $a->resultado[$chave]['Id']) {
                    echo ' <div class="chat__bubble --left">'.$mensagem['mensagem'].'</div>';
                }
            }
          ?>
      </div>
      <div class="chat__input">
        <div class="chat__input-text" style="margin: 0 !important; padding: 0 !important;">
            <input type="hidden" name="id_enviou" value="<?=$_SESSION['dados']['Id']?>">
            <input type="hidden" name="id_recebeu" value="<?=$a->resultado[$chave]['Id']?>">
            <input type="text" name="msn_enviada" class="enviar_msg">
        </div>
        <div class="chat__input-button" id="botao_enviar">
          <ion-icon name="btnSalvar"></ion-icon>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


<script src="chat.js"></script>



</body>
</html>