<!DOCTYPE html>
<html>
<head>
	<title>Teste</title>
</head>
<body>

	<style type="text/css">
		
		.show_match {
			width: 50%;
			height: 70px;
			border: 1px solid red;
			border-radius: 5px;
			margin-bottom: 10px;
			padding: 10px;
		}

		@media (max-width: 780px) {

			.show_match {
				width: 100%;
			}

		}

		.show_foto {
			width: 50px;
			height: 50px;
			border-radius: 100%;
		}

		/* Imagem */

		#foto {
			border-radius: 100%;
			width: 300px;
			height: 300px;
		}

		/* Botoes */ 

		.btn_desfazer {
			width: 40px;
			height: 40px;
			border-radius: 5px;
			border: 3px solid darkred;
			padding: 0px;
			right: 0;
		}

		.btn_ver {
			width: 40px;
			height: 40px;
			border-radius: 5px;
			border: 3px solid darkgreen;
			padding: 0px;
			right: 0;
		}

		.fl {
			float: left;
		}

	</style>

	<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		<div class="collapse p-3" id="collapseExample2">
			<div class="row ml-2 mr-2">                
				<div class="col-md-12">
					<p>
						<small>
							Estas são as pessoas que combinaram com você.
						</small>
					</p>
				</div>
			</div>



			<!-- Lista match  -->

			<div class="row mb-2">
				<div class="col-md-10 col-sm-12">
					<!-- Busca de match -->

					<div id="1" class="row show_match">
						<!-- Borda -->
						<nav class="nav">
							<!-- Imagem -->
							<div class="col-1 fl">
								<img class="show_foto" src="../media/images/fotos_usuarios/avatar.png">
							</div>
							<!-- Nome -->
							<div class="nav-link fl">
								<a>
									<small>Gustavo Vergilio Poleza</small>  
								</a>          
							</div>
							<!-- Telefone -->
							<div class="nav-link fl">
								<small>4740028922</small>
							</div>
							<div class="nav-link fl">
								<button class="btn_ver"><a href="#"><img class="rounded" src="../media/images/icons/olho.jpg" alt="Ver Perfil" height="100%"></a></button>
							</div>
							<!-- Desfazer match -->
							<div class="nav-link fl">
								<button onclick="desfazer(1)" class="btn_desfazer"><img class="rounded" src="../media/images/icons/lixo.jpg" alt="Excluir match" height="100%"></button>
							</div>
						</nav>                   
					</div>
				</div>
				<!-- Fim linha lista match -->
			</div>
			<!-- Borda -->
		</div>
		<!-- Fim menu lista match -->
	</div>



</body>
</html>