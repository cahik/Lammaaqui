<?php
require_once "msn_enviada.php";


$a = new msn_enviada();
$resultado = $a->recebe_msn();



?>

<!-- 		$this->id = $_POST['id'];
		$this->msn_recebida = $_POST['msn_recebida'];
		$this->msn_enviada = $_POST['msn_enviada'];
 -->
<!DOCTYPE html>
<html>
<head>
	

	<title>teste</title>
	  <link rel="stylesheet" type="text/css" href="chat.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

</head>
<body>
 <?//php $resultado = mysqli_fetch_array($query);  	
//echo "$resultado";

 	?>


<?php
require_once "msn_recebida.php";

$re = new msn_recebida();

$recebida_msn = $re->select_msn();

// $oi = mysqli_fetch_array();
// var_dump($oi);

?>

<div id="container">



<div class="chat__wrapper">
  <div class="chat__heading">
    <div class="heading__list">
      <div class="list__avatar">
        <img src="http://dummyimage.com/100x100/bbb/fff" alt="Dummy Avatar" />
      </div>
      <div class="list__title">
        João de Paula
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



<div class="row">
	<div class="container">
	<form method="post" action="" name="msn_recebida">


									<!--  <?php $resultado //= mysqli_fetch_array($query) { 	?> -->


	




	<div class="form-group">

		<label for="msn_enviada">Mensage enviada </label>
		<input type="text" name="msn_enviada" id="msn_enviada"  class="form-control" >		
	</div>



<input type="submit" name="btnSalvar" value="Salvar" class="btn btn-primary">

<input type="submit" name="btnExcluir" value="Excluir" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>

  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>


<script src="chat.js"></script>


</form>
</div>
</body>
</html>