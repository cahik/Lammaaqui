<?php

require_once "classes/cadastro_login.class.php";

$Executar_login = new Cadastro_login();

if (isset($_POST['logar'])) {
	$Executar_login->logar();
}

?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Llama Aqui</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="media/css/style.css" rel="stylesheet">
  <link href="media/css/barra.css" rel="stylesheet">
</head>

<body>
 
  <?php require_once "include/navbar.php"; ?>

  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form" method="POST">
					<span class="login100-form-title p-b-43 text-warning">
						Login
					</span>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" name="email" id="email" placeholder="Email">
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="senha" id="senha" placeholder="Senha">
					</div>

					<big>
						<div class="flex-sb-m w-full p-t-3 p-b-32">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Memorizar login e senha
								</label>
							</div>

							<div>
								<a href="rebotsenha.php" class="txt1">
									Esqueceu sua senha?
								</a><br>
								<a href="/Lammaaqui/cadastro.php" class="txt1">
									Cadastre-se
								</a>
							</div>
						</div>
					</big>

					<div class="container-login100-form-btn ">
						<button class="login100-form-btn btn-warning" name="logar">
							Login
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('media/images/net.png');">
				</div>
			</div>
		</div>
	</div>




  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>


  <?php require_once "include/footer.php"; ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="media/js/main.js"></script>

</body>
</html>
