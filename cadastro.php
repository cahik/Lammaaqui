<?php

// Backend cadastro e login
require_once "classes/cadastro_login.class.php";

// Backend cidades e estados
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

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

	<!-- <link rel="icon" type="image/png" href="media/images/icons/favicon.ico"/> -->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link href="media/css/barra.css" rel="stylesheet">
	
</head>
<body>

	<!-- Navbar -->
	<?php require_once "include/navbar.php"; ?>


	<div class="limiter text-center">
		<div class="container-login100">
			
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Criando minha conta
					</span>
					
					<!-- Nome -->					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome" id="nome" required="" placeholder="Nome" value="<?=utf8_encode($Executar_cadastro->nome)?>">	
					</div>
					
					<!-- Email -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" required="" placeholder="E-mail" value="<?=utf8_encode($Executar_cadastro->email)?>">
					</div>
					
					<!-- Senha -->
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha" id="senha" minlength="8" required="" placeholder="Senha (Min: 8 caracteres)" value="<?=utf8_encode($Executar_cadastro->senha)?>">
					</div>

					<!-- Repetir senha -->
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="senha2" id="senha2" minlength="8" required="" placeholder="Repetir a senha">
					</div>

					<!-- Telefone -->
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="telefone" id="telefone" placeholder="Número de Telefone" value="<?=$Executar_cadastro->telefone?>" maxlength="10">
					</div>					

					<!-- Celular -->
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="celular" id="celular" placeholder="Número de celular" value="<?=$Executar_cadastro->celular?>" maxlength="11">
					</div>

					<!-- Sexo -->
					<div class="wrap-input100">
						<div class="row pb-2">

							<div class="col-md-3">
								<label class="input100 mb-sm-3 mb-2">Sexo</label>
							</div>

							<!-- Masculino -->
							<div class="col-md-9 mb-sm-0 mb-1 ml-sm-0 ml-4">
								<div class="custom-control custom-radio custom-control-inline">
									<input class="custom-control-input radio" type="radio" id="masculino" name="sexo"  value="Masculino" required="" <?php if (isset($_POST['sexo']) and ($_POST['sexo'] == "Masculino")) {echo "checked=''";}?>>
									<label class="custom-control-label" for="masculino">Masculino</label>
								</div>

								<!-- Feminino -->
								<div class="custom-control custom-radio custom-control-inline" style="float: left; margin-left: 20px;">
									<input class="custom-control-input radio" type="radio" id="feminino" name="sexo"  value="Feminino" <?php if (isset($_POST['sexo']) and $_POST['sexo'] == "Feminino") {echo "checked=''";}?>>
									<label class="custom-control-label" for="feminino">Feminino</label>
								</div>
							</div>

						</div>
					</div>

					<!-- Data de nascimento -->
					<div class="wrap-input100">
						<div class="row mb-3">

							<div class="col-sm-3 p-2 mt-sm-0">
								<label class="input100">Nascimento</label>
							</div>

							<!-- Dia -->
							<div class="col-sm-9">								
								<select name="dia" class="select col-3 mb-sm-0" required="">
									<?php for ($i = 1; $i <= 31; $i++) {?>
										<option <?php if (isset($_POST['dia']) and $_POST['dia'] == $i) {echo "selected";}?> value="<?=$i?>" ><?=$i?></option>
									<?php } ?>
								</select>

								<!-- Mês -->
								<select name="mes" class="select col-3 mb-sm-0" required="">
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

								<select name="ano" class="select col-4 mb-sm-0" required="">
									<?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
										<option <?php if (isset($_POST['ano']) and $_POST['ano'] == $i) {echo "selected";}?> value="<?=$i?>"><?=$i?></option>
									<?php } ?>
								</select>	
							</div>						
						</div>
					</div>

					<!-- Estado -->
					<div class="wrap-input100">
						<div class="row mb-3">

							<div class="col-sm-3">
								<label class="input100 p-2">Estado</label>
							</div>		

							<div class="col-sm-9">								
								<select id="id_estado" name="estado" class="form-control mb-sm-0 mb-1 ml-sm-0 ml-4" required onchange="executar_ajax()">

									<?php foreach ($Mostrar_cid_est->resultado_estados as $chave => $valor) { ?>

										<option <?php if (isset($_POST['estado']) and $_POST['estado'] == $Mostrar_cid_est->resultado_estados[$chave]['Id_estado']) {echo "selected";} ?>  value="<?=$Mostrar_cid_est->resultado_estados[$chave]['Id_estado']?>"><?=utf8_encode($Mostrar_cid_est->resultado_estados[$chave]['Nome_estado'])?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<!-- Cidade -->
					<div class="wrap-input100">
						<div class="row mb-3">

							<div class="col-sm-3">
								<label class="input100 p-2">Cidade</label>
							</div>

							<div class="col-sm-9">

								<select class="form-control mb-sm-0 mb-1 ml-sm-0 ml-4" <?php if (!isset($_POST['estado'])) {echo "disabled";} ?> id="id_cidade" name="cidade" required>

									<?php if (isset($_POST['estado'])) {				

										foreach ($Mostrar_cid_est->resultado_cidades as $chave => $valor) { ?>

											<option <?php if (utf8_encode($Mostrar_cid_est->resultado_cidades[$chave]['Nome_cidade']) == $_POST['cidade']) {echo "selected";} ?> value="<?=$Mostrar_cid_est->resultado_cidades[$chave]['Id_cidade']?>"><?=utf8_encode($Mostrar_cid_est->resultado_cidades[$chave]['Nome_cidade'])?></option>

											<?php
										} 
									} ?>

								</select>
							</div>
						</div>
					</div>			

					<!-- Botão enviar -->
					<div class="container-login100-form-btn">
						<div class="row">
							<div class="col-12 text-center">
							<button class="btn salvarDados mt-2" name="cadastrar" type="submit">Enviar</button>
							</div>
						</div>
					</div>
				</form>
				
		

		</div>
	</div>

	<!-- Biblioteca Boostrap -->
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="media/js/main.js"></script>

	<!-- Ajax cidades -->
	<script src="media/js/ajax_cidades.js"></script>

	<!-- Mascara para telefone e celular -->
	<script src="media/js/mascara_numeros.js"></script>


</body>
</html>