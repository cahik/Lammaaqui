<?php 

require_once "classes/selects.class.php";

$teste = new Selects();

if (isset($_POST['Enviar'])) {

	$teste->select_pessoas();

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<link rel="stylesheet" type="text/css" href="media/css/padrao.css">
	<link rel="stylesheet" type="text/css" href="media/css/busca.css">
	<link rel="stylesheet" type="text/css" href="media/css/media.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="color: white; padding: 10px;">

	<form method="POST">

		Filtros<br><br><br>
		Caso não marque nenhuma da opções será considerado que não se importa.<br><br><br>

		Deve fumar?<br>
		<input type="radio" name="Fuma" id="fsim" value="1" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "1")) {echo "checked=''";}?>>
		<label for="fsim">Sim</label>
		<input type="radio" name="Fuma" id="fnao" value="0" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "0")) {echo "checked=''";}?>>
		<label for="fnao">Não</label><br><br><br>

		Deve beber?<br>
		<input type="radio" name="Bebe" id="bsim" value="1" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "1")) {echo "checked=''";}?>>
		<label for="bsim">Sim</label>
		<input type="radio" name="Bebe" id="bnao" value="0" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "0")) {echo "checked=''";}?>>
		<label for="bnao">Não</label><br><br><br>

		Deve ter animais?<br>
		<input type="radio" name="Tem_animal" id="tasim" value="1" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "1")) {echo "checked=''";}?>>
		<label for="tasim">Sim</label>
		<input type="radio" name="Tem_animal" id="tanao" value="0" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "0")) {echo "checked=''";}?>>
		<label for="tanao">Não</label><br><br><br>

		Deve trabalhar?<br>
		<input type="radio" name="Trabalha" id="trsim" value="1" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "1")) {echo "checked=''";}?>>
		<label for="trsim">Sim</label>
		<input type="radio" name="Trabalha" id="trnao" value="0" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "0")) {echo "checked=''";}?>>
		<label for="trnao">Não</label><br><br><br>

		Deve estudar?<br>
		<input type="radio" name="Estuda" id="esim" value="1" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "1")) {echo "checked=''";}?>>
		<label for="esim">Sim</label>
		<input type="radio" name="Estuda" id="enao" value="0" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "0")) {echo "checked=''";}?>>
		<label for="enao">Não</label><br><br><br>

		<select class="select" name="Sexo">
			<option value="Masculino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Masculino")) {echo "selected=''";}?>>Masculino</option>
			<option value="Feminino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Feminino")) {echo "selected=''";}?>>Feminino</option>
			<option value="NI" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "NI")) {echo "selected=''";}?>>Não me importo</option>
		</select><br><br><br>

		Qual o máximo que deseja pagar?<br><br>
		<span></span>
		<input id="Aceita_pagar" type="range" name="Aceita_pagar" 
		oninput="getElementById('Porcentagem').innerHTML = this.value;" 
		min="0" max="5000" value="<?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?>" step="50" />
		<span id="Porcentagem"><?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?></span><br><br>

		<button type="submit" name="Enviar">Enviar</button>

	</form>


	<div class="cartao">
		<div class="div_foto"></div>
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