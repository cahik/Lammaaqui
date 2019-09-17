<!DOCTYPE html>
<html>
<head>
	<title>Página não encontrada</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="media/css/util.css">
	<link rel="stylesheet" type="text/css" href="media/css/main.css">
	<link rel="stylesheet" type="text/css" href="media/css/style.css">
	<link rel="stylesheet" type="text/css" href="lib/vendor/bootstrap/css/bootstrap.min.css">
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


</body>
</html>