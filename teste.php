<?php 

require_once "classes/selects.class.php";

$teste = new Selects();
$teste->select_pessoas();


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
			padding: 20px 40px;
		}

		.foto_usuario {
			border-radius: 100%;
		}

		.dados_user {
			width: 100%;
			max-height: 300px;
			padding: 15px;
		}

		h2 {
			font-family: 
		}


	</style>

	<form method="POST">

		Filtros<br><br><br>

		Pode fumar?<br>
		<input type="radio" name="Fuma" id="fsim" value="1">
		<label for="fsim">Sim</label>
		<input type="radio" name="Fuma" id="fnao" value="0">
		<label for="fnao">Não</label><br><br><br>

		Pode beber?<br>
		<input type="radio" name="Bebe" id="bsim" value="1">
		<label for="bsim">Sim</label>
		<input type="radio" name="Bebe" id="bnao" value="0">
		<label for="bnao">Não</label><br><br><br>

		Pode ter animais?<br>
		<input type="radio" name="Tem_animal" id="tasim" value="1">
		<label for="tasim">Sim</label>
		<input type="radio" name="Tem_animal" id="tanao" value="0">
		<label for="tanao">Não</label><br><br><br>

		Deve trabalhar?<br>
		<input type="radio" name="Trabalha" id="trsim" value="1">
		<label for="trsim">Sim</label>
		<input type="radio" name="Trabalha" id="trnao" value="0">
		<label for="trnao">Não</label><br><br><br>

		Deve estudar?<br>
		<input type="radio" name="Estuda" id="esim" value="1">
		<label for="esim">Sim</label>
		<input type="radio" name="Estuda" id="enao" value="0">
		<label for="enao">Não</label><br><br><br>

		<select name="Sexo">
			<option value="">Sexo</option>
			<option value="Masculino">Masculino</option>
			<option value="Feminino">Feminino</option>
			<option value="NI">Não me importo</option>
		</select><br><br><br>

		Qual o máximo que deseja pagar?<br><br>
		<span></span>
		<input id="Aceita_pagar" type="range" name="Aceita_pagar" 
		oninput="getElementById('Porcentagem').innerHTML = this.value;" 
		min="0" max="10000" value="0" step="50" />
		<span id="Porcentagem">0</span><br><br>

		<button type="submit" name="Enviar">Enviar</button>

	</form>


	<div class="cartao">
		<div class="div_foto"><img src="media/images/alpaca.jpg" width="100%" height="100%" class="foto_usuario"></div>
		<div class="dados_user">
			<h2><?=$teste->resultado['Nome']?></h2>
			<div class="descricao"><?=$teste->resultado['Descricao']?></div>
		</div>
	</div>


	<script type="text/javascript">

		var $range = document.querySelector('#Aceita_pagar'),
		$value = document.querySelector('span');

		$range.addEventListener('#Aceita_pagar', function() {
			$value.textContent = this.value;
		});

	</script>


</body>
</html>