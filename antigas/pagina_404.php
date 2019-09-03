<!DOCTYPE html>
<html>
<head>
	<title>Página não encontrada</title>
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

	<div id="e404">
		<div class="col-md-6 col-12 mt-5" style="float: left;">
			<h1><strong>ERRO 404.<br></strong>Página não encontrada.</h1>
			<a href="#" class="btn btn_padrao mt-5">Página Inicial</a>
		</div>
		<div class="col-6 d-md-block d-none mt-5" style="float: left;"><img src="media/images/alpaca.jpg" width="100%"></div>
	</div>

	<?php require_once "include/footer.php"; ?>

</body>
</html>