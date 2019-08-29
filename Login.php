<?php 

require_once "classes/cadastro_login.class.php";

$Executar_login = new Cadastro_login();
$Executar_login->logar();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/padrao.css">
	<link rel="stylesheet" type="text/css" href="media/css/media.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<?php 

	require_once "include/lhama.php"; 
	require_once "include/navbar.php"; 

	?>

	<form  class="forms" method="post">

		<h1 class="titulo_padrao">Conecte-se</h1>

		<div>
			<div class="form-group " >
				<label for="email">E-mail</label>
				<input class="inputs" type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail">
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input class="inputs" type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
			</div>

			<button type="submit" name="logar" class="btn btn-block btn_padrao mt-4">Entrar</button>
			<hr>
			<a class="" href="#">Esqueci minha senha.</a><br>
			<a class="" href="Cadastro.php">Quero me cadastrar.</a>
		</div>

	</form>


	<!-- //aqui é o carroussel de imagens  -->

<!-- 	<div id="carouselExampleSlidesOnly" class="carousel slide " style="margin-top: -600px; z-index: -1; " data-ride="carousel">


		<div class="carousel-inner">

			<div class="carousel-item active">
				<img src="img/caixas.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/net.png" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/img3.jpg" class="d-block w-100" alt="...">
			</div>

		</div>

	</div> -->


	<?php require_once "include/footer.php"; ?>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
