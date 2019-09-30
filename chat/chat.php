<?php

require_once "../classes/match.class.php";
require_once "chat.class.php";


$a = new Mostrar_matches();
$a->mostrar();

$chat = new Chat();

?>







<html lang="en">

<head>
  <title>Chat screen</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  
  <!-- Font Awesome File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container app">
    <div class="row app-one">

      <div class="col-sm-4 side">
        <div class="side-one">
          <!-- Heading -->
          <div class="row heading">
            <div class="col-sm-3 col-xs-3 heading-avatar">
              <div class="heading-avatar-icon">
              <img src="<?php
                  if ($_SESSION['dados']['Foto'] <> null) {
                    echo '../media/images/fotos_usuarios/'.$_SESSION['dados']['Foto'];
                  } else {
                    echo '../media/images/fotos_usuarios/avatar.png';
                  }?>
                ">
              </div>
            </div>
            <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
              <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
            </div>
            <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
              <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
            </div>
          </div>
          <!-- Heading End -->

          <!-- SearchBox -->
          <div class="row searchBox">
            <div class="col-sm-12 searchBox-inner">
              <div class="form-group has-feedback">
                <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
          </div>

          <!-- Search Box End -->
          <?php foreach ($a->resultado as $chave => $valor) { ?>
          <!-- sideBar -->
          <div class="row sideBar">
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                <img src="<?php
                  if ($a->resultado[$chave]['Foto'] <> null) {
                    echo '../media/images/fotos_usuarios/'.$a->resultado[$chave]['Foto'];
                  } else {
                    echo '../media/images/fotos_usuarios/avatar.png';
                  }?>
                ">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta"> <?=$a->resultado [$chave]['Nome']; ?>
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
        
        
          </div>
          <!-- Sidebar End -->
        </div>
        <div class="side-two">

          <!-- Heading -->
          <div class="row newMessage-heading">
            <div class="row newMessage-main">
              <div class="col-sm-2 col-xs-2 newMessage-back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </div>
              <div class="col-sm-10 col-xs-10 newMessage-title">
                New Chat
              </div>
            </div>
          </div>
          <!-- Heading End -->

          <!-- ComposeBox -->
          <div class="row composeBox">
            <div class="col-sm-12 composeBox-inner">
              <div class="form-group has-feedback">
                <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
          </div>
          <!-- ComposeBox End -->

         

            
        <!-- Sidebar End -->
      </div>

                </div>
      <!-- New Message Sidebar End -->

      <!-- Conversation Start -->
      <div class="col-sm-8 conversation">
        <!-- Heading -->
        <div class="row heading">
          <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
            <div class="heading-avatar-icon">
            <img src="<?php
                  if ($a->resultado[$chave]['Foto'] <> null) {
                    echo '../media/images/fotos_usuarios/'.$a->resultado[$chave]['Foto'];
                  } else {
                    echo '../media/images/fotos_usuarios/avatar.png';
                  }?>
                ">
            </div>
          </div>
          <div class="col-sm-8 col-xs-7 heading-name">
            <a class="heading-name-meta"> <?=$a->resultado [$chave]['Nome']; ?>
            </a>
            <span>Online</span>
          </div>
          <div class="col-sm-1 col-xs-1  heading-dot pull-right">
            <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
          </div>
        </div>
        <!-- Heading End -->

        <!-- Message Box -->
        <div class="row message" id="conversation">

          <div class="row message-previous">
            <div class="col-sm-12 previous">
              <a onclick="previous(this)" id="ankitjain28" name="20">
              Show Previous Message!
              </a>
            </div>
          </div>

          <div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">
                <div class="chat__bubbles" id="balao">
          <?php
            $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $a->resultado[$chave]['Id']);

            foreach ($mensagens as $key => $mensagem) {
                if($mensagem['id_enviou'] == $_SESSION['dados']['Id']) {
                    echo ' <div class="chat__bubble --right">'.$mensagem['mensagem'].'</div>';
                }
            }
          ?>
                </div>
          </div>
                <span class="message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>

          <div class="row message-body">
            <div class="col-sm-12 message-main-sender">
              <div class="sender">
                <div class="message-text">
                <div class="chat__bubbles" id="balao">
                <?php
            $mensagens = $chat->todos_mensagem_por_usuario($_SESSION['dados']['Id'], $a->resultado[$chave]['Id']);

            foreach ($mensagens as $key => $mensagem) {
                 if ($mensagem['id_enviou'] == $a->resultado[$chave]['Id']) {
                    echo ' <div class="chat__bubble --left">'.$mensagem['mensagem'].'</div>';
                }
                
            }
          ?>
                </div>
          </div>
                <span class="message-time pull-right">
                  Sun
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- Message Box End -->

        <!-- Reply Box -->
        <div class="row reply">
          <div class="col-sm-1 col-xs-1 reply-emojis">
            <i class="fa fa-smile-o fa-2x"></i>
          </div>
          <div class="col-sm-9 col-xs-9 reply-main">
          <input type="hidden" name="id_enviou" value="<?=$_SESSION['dados']['Id']?>">
            <input type="hidden" name="id_recebeu" value="<?=$a->resultado[$chave]['Id']?>">
            <textarea rows="1" id="comment"  name="msn_enviada" class="enviar_msg"></textarea>
          </div>
          <div class="col-sm-1 col-xs-1 reply-recording">
            <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
          </div>
          <!-- <button>enviar</button> -->
          
            <div class="chat__input-button" id="botao_enviar">
          <ion-icon name="btnSalvar">enviar</ion-icon>
        </div>
          
        </div>
        <!-- Reply Box End -->
      </div>
      <!-- Conversation End -->
    </div>
    <!-- App One End -->
  </div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


<script src="chat.js"></script>

  <!-- App End -->
</body>

</html>