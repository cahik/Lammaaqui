<!DOCTYPE html>
<html>
<head>
	<title>Página não encontrada</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="media/css/barra.css" rel="stylesheet">
</head>
<body>

	<?php 

	require_once "include/lhama.php"; 
	require_once "include/navbar.php";

	?>

	<style type="text/css">

		body {background-color: rgb(31, 0, 37) !important;}

		#e404 {
			margin: 200px auto 220px auto;
			width: 700px;
			height: 410px;
			background-color: white;
			padding: 30px;
			border: 3px solid #a5404d;
			border-radius: 15px;
			text-align: center;
		}

		

	</style>

	<div id="e404">	
		<div class="col-md-6 col-12 mt-5" style="float: left;">	
			<h1>Nossos servidores estão sem conexão.</h1>	
		</div>	
		<div class="col-6 d-md-block d-none mt-5" style="float: left;"><img src="media/images/alpaca.jpg" width="100%"></div>	
	</div>

	<?php require_once "include/footer.php"; ?>


	<script src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>

	<!-- Biblioteca Boostrap -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>

	<!-- Javascript Geral -->
	<script src="media/js/main.js"></script>

</body>
</html>