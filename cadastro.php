<?php

require_once "classes/cadastro_login.class.php";
require_once "classes/cidades_estados.class.php";

$Executar_cadastro = new Cadastro_login();
$Executar_cadastro->cadastrar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="media/images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link href="media/css/barra.css" rel="stylesheet">
	<!--===============================================================================================-->
</head>
<body>

	<?php //require_once "include/navbar.php"; ?>
	
	<div class="limiter text-center">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Criando minha conta
					</span>
					
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=utf8_encode($Executar_cadastro->nome)?>">	
					</div>
					

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=utf8_encode($Executar_cadastro->email)?>">
					</div>
					
					
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" minlength="8" required="" placeholder="Senha (Min: 8 caracteres)" value="<?=utf8_encode($Executar_cadastro->senha)?>">
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" id="senha2" minlength="8" required="" placeholder="Repetir a senha">
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>" maxlength="10">
					</div>					



					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>" maxlength="11">
					</div>


					<br><br>

					<p class="p_cadastro"><center><BIG>Sexo</BIG></center></p>	

					
					<div class=" input-group-text" style="float: left; margin-left: 20px;">
						<input class="" type="radio" id="masculino" name="sexo"  value="Masculino" required="" <?php if (isset($_POST['sexo']) and ($_POST['sexo'] == "Masculino")) {echo "checked=''";}?>>Masculino
						<label for="masculino"></label>
					</div>

					<div class="input-group-text" style="float: left; margin-left: 20px;">
						<input  type="radio" id="feminino" name="sexo"  value="Feminino" <?php if (isset($_POST['sexo']) and $_POST['sexo'] == "Feminino") {echo "checked=''";}?>>Feminino
						<label for="feminino"></label>
					</div>
					

					<br>

					<p><BIG>Data de nascimento:</BIG></p>

					<select name="dia" class="select" required="">

						<?php for ($i = 1; $i <= 31; $i++) {?>
							<option <?php if (isset($_POST['dia']) and $_POST['dia'] == $i) {echo "selected";}?> value="<?=$i?>" ><?=$i?></option>
						<?php } ?>

					</select>

					<select name="mes" class="select" required="">
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "01") {echo "selected";} ?> value="01">Janeiro</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "02") {echo "selected";} ?> value="02">Fevereiro</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "03") {echo "selected";} ?> value="03">Março</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "04") {echo "selected";} ?> value="04">Abril</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "05") {echo "selected";} ?> value="05">Maio</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "06") {echo "selected";} ?> value="06">Junho</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "07") {echo "selected";} ?> value="07">Julho</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "08") {echo "selected";} ?> value="08">Agosto</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "09") {echo "selected";} ?> value="09">Setembro</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "10") {echo "selected";} ?> value="10">Outubro</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "11") {echo "selected";} ?> value="11">Novembro</option>
						<option <?php if (isset($_POST['mes']) and $_POST['mes'] == "12") {echo "selected";} ?> value="12">Dezembro</option>
					</select>


					<select name="ano" class="select" required="">

						<?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
							<option <?php if (isset($_POST['ano']) and $_POST['ano'] == $i) {echo "selected";}?> value="<?=$i?>"><?=$i?></option>
						<?php } ?>

					</select>

					<br><br>

					<p><BIG>Estado</BIG></p>

					<select id="id_estado" name="estado" required onchange="executar_ajax()">
						<option value="">Estado</option>
						
						<?php foreach ($Mostrar_cid_est->resultado_estados as $chave => $valor) { ?>

							<option <?php if (isset($_POST['estado']) and $_POST['estado'] == $Mostrar_cid_est->resultado_estados[$chave]['Id_estado']) {echo "selected";} ?>  value="<?=$Mostrar_cid_est->resultado_estados[$chave]['Id_estado']?>"><?=utf8_encode($Mostrar_cid_est->resultado_estados[$chave]['Nome_estado'])?></option>

						<?php } ?>

					</select>

					<br><br>

					<p><BIG>Cidade</BIG></p>

					<select <?php if (!isset($_POST['estado'])) {echo "disabled";} ?> id="id_cidade" name="cidade" required>

						<?php if (isset($_POST['estado'])) {				

							foreach ($Mostrar_cid_est->resultado_cidades as $chave => $valor) { ?>

								<option <?php if (utf8_encode($Mostrar_cid_est->resultado_cidades[$chave]['Nome_cidade']) == $_POST['cidade']) {echo "selected";} ?> value="<?=$Mostrar_cid_est->resultado_cidades[$chave]['Id_cidade']?>"><?=utf8_encode($Mostrar_cid_est->resultado_cidades[$chave]['Nome_cidade'])?></option>

								<?php
							} 
						} ?>

					</select>

					<br><br>

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="cadastrar" type="submit">Enviar</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url('media/images/caixas.jpg');">
				</div>
			</div>


		</div>
	</div>

	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>

	<!-- Function Ajax cidade/estado -->
	<script src="media/js/ajax_cidades.js"></script>

	<script type="text/javascript">

		jQuery("#telefone")
		.mask("(99) 9999-9999")
		.focusout(function (event) {  
			var target, phone, element;  
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
			phone = target.value.replace(/\D/g, '');
			element = $(target);  
			element.unmask();
		});

		jQuery("#celular")
		.mask("(99) 9999?9-9999")
		.focusout(function (event) {  
			var target, phone, element;  
			target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
			phone = target.value.replace(/\D/g, '');
			element = $(target);  
			element.unmask();  
			if(phone.length > 10) {  
				element.mask("(99) 9999?9-9999");  
			} else {  
				element.mask("(99) 9999?9-9999");  
			}  
		});


	</script>


</body>
</html>