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

		.div_foto {
			width: 320px;
			height: 300px;
			text-align: center;
		}

		.foto_usuario {
			border-radius: 100%;
		}

		.dados_user {
			width: 100%;
			max-height: 300px;
			padding: 15px;
		}


	</style>


	<div class="cartao">
		<div class="div_foto"><img src="media/images/alpaca.jpg" width="100%" height="100%" class="foto_usuario"></div>
		<div class="dados_user">
			<h2><?=$teste->resultado['Nome']?></h2>
			<div class="descricao"><?=$teste->resultado['Descricao']?></div>
		</div>
	</div>




</body>
</html>