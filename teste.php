<?php 

require_once "classes/selects.class.php";

$teste = new Selects();
$teste->select_dados();


?>


<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>

	<style type="text/css">

		.cartao {
			width: 400px;
			background-color: lightgray;
			border-radius: 8px;
			margin-right: auto;
			margin-left: auto;
			margin-top: 8%;
		}

		.foto_user {
			width: 100%;
			height: 350px;
		}

		.dados_user {
			width: 100%;
			height: 200px;
			padding: 15px;
		}


	</style>


	<div class="cartao">
		<div class="foto_user"></div>
		<div class="dados_user">
			<h2><?=$teste->resultado['Nome']?></h2>
			<div></div>
		</div>
	</div>




</body>
</html>