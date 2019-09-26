<?php

require_once "../classes/match.class.php";
require_once "chat.class.php";


$a = new Mostrar_matches();
$a->mostrar();






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

                        }?>">
      </div>
      <div class="list__title">
        <?=$a->resultado [$chave]['Nome']; ?>
      </div>
    </div>
  </div>
  <div class="chat__bubbles">
    <div class="chat__bubble --left" >
  
    </div>
    <div class="chat__bubble --right">
      Ex odit sunt, accusantium. Vero tenetur accusamus quos facilis voluptate, aperiam soluta nesciunt, dolorum similique
    </div>
  </div>
  <div class="chat__input">
    <div class="chat__input-text">
 
		<label for="msn_enviada">Mensage  </label>
		<input type="text" name="msn_enviada" id="msn_enviada"  class="form-control" >	
    </div>
    <div class="chat__input-button">
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