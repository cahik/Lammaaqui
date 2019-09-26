<?php
// Backend do perfil
require_once "classes/perfil.class.php";

// Backend cidades e estados
require_once "classes/cidades_estados.class.php";

require_once "classes/perfilmatch.class.php";

if (!isset($_GET['id'])) {
  die('Usuário não encontrado.');
}


// Mostrar dados cadastrados e/ou alterados
$Mostrar_dados = new Perfil();
$Mostrar_dados->consulta();

$a = new Perfilmatch();
$resultados = $a->perfilmatch($_GET['id']);


$date=date_create($resultados['Data_nascimento']);
$data_nascimento = date_format($date,"d/m/Y");


?>


<!DOCTYPE html>
<head>
  <title>Perfil</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

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

  <!-- Nav Bar -->
  <?php require_once "include/navbar.php"; ?>

 <!-- Foto, título e formulário -->
  <form method="post" enctype="multipart/form-data">
    <div class="container">
      <section class="intro-single margemEsquerda">
        <div class="row">
          <div class="col-sm-4">
            <div class="title-single-box">
              <h5 class="title-single tt"><?=utf8_encode($resultados['Nome'])?> !</h5>      
            </div>
          </div>


          <div class="col-sm-4"></div> 

          <div id="foto" class="col-sm-4 tam" onmouseover="foto()" onmouseout="tirar_foto()">
            <img src= "<?php if ($resultados['Foto'] <> null and $resultados['Foto'] <> '') {echo 'media/images/fotos_usuarios/'.$resultados['Foto'];} else {echo 'media/images/fotos_usuarios/avatar.png';}?>" width="100%" class="rounded float-right img-fluid" alt="<?php if (isset($resultados['Nome'])) {echo $resultados['Nome'];} ?>">

            <div class="camera">             
              <center>
                <div class="profile-img">
                  <label style="cursor: pointer;" for="arquivos"><img src="media/images/camera.jpg" width="100%"></label>
                  <input type="file" class="input_foto" name="arquivos[]" id="arquivos" multiple="" >
                </div>
              </center>
            </div>

          </div>


        </div>
      </section>
    </div>

    <!-- Container principal perfil -->
    <section class="margemEsquerda">
      <div class="container emp-profile">
        <div class="row">         

          <!-- Navegação - Dados pessoais e Filtros -->
          <div class="col-md-12">
            <div class="profile-head">             
            </div>
          </div>
        </div>

        <!-- Menu -->
        <div class="row">
          <div class="col-md-12">
            <div class="tab-content profile-tab" id="myTabContent">

              <!-- Dados pessoais -->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row mb-4">                
                  <div class="col-md-12">                    
                  </div>
                </div>

                <!-- Nome -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_nome" class="col-sm-2 col-form-label">Nome</label>
                  </div>
                  <div class="col-md-6">
                    <p name="Nome" id="Nome" style="font-weight: 300!important; resize: none; width: 100%;" id="Nome" rows="3" maxlength="255"><?=utf8_encode($resultados['Nome'])?></p>
                  </div>
                </div>

                <!-- Email -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_email" class="col-sm-2 col-form-label">Email</label>
                  </div>
                  <div class="col-md-6">
                    <p name="Email" id="Email" style="font-weight: 300!important; resize: none; width: 100%;" id="Email" rows="3" maxlength="255"><?=utf8_encode($resultados['Email'])?></p>
                  </div>
                </div>              

                <!-- Telefone -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                  </div>
                  <div class="col-md-6">
                    <p name="Telefone" id="Telefone" style="font-weight: 300!important; resize: none; width: 100%;" id="Telefone" rows="3" maxlength="255"><?=utf8_encode($resultados['Telefone'])?></p>
                  </div>
                </div>

                <!-- Celular -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="celular" class="col-sm-2 col-form-label">Celular</label>
                  </div>
                  <div class="col-md-6">
                   <p name="Celular" id="Celular" style="font-weight: 300!important; resize: none; width: 100%;" id="Celular" rows="3" maxlength="255"><?=utf8_encode($resultados['Celular'])?></p>
                  </div>
                </div>

                <!-- Sexo -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                  </div>
                  <div class="col-md-6">

                   <p name="Sexo" id="Sexo" style="font-weight: 300!important; resize: none; width: 100%;" id="Sexo" rows="3" maxlength="255"><?=utf8_encode($resultados['Sexo'])?></p>

                  </div>
                </div> 

                <!-- Data de nascimento -->
                <div class="row">

                  <div class="col-md-6">
                    <label class="col-sm mb-3 col-form-label">Data de nascimento</label>
                  </div>
                  <div style="resize: none;" class="col-md-6">

                    <p name="Data_nascimento" id="Data_nascimento" style="font-weight: 300!important; resize: none; width: 100%;" id="Data_nascimento" rows="3" maxlength="255"><?=($data_nascimento)?></p>             

                  </div>
                </div>

                <!-- Descrição -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_descricao" class="col-sm-2 col-form-label">Descrição</label>
                  </div>
                  <div class="col-md-6">
                    <p name="Descricao" id="id_descricao" style="resize: none; width: 100%;" id="exampleFormControlTextarea1" rows="3" maxlength="255"><?=utf8_encode($resultados['Descricao'])?></p>
                  </div>
                </div>   

                <!-- Onde quero morar -->
                <div class="row">
                  <div class="col-md-12">
                    <label class="col-sm mb-3 mt-3 col-form-label">Onde quero morar:</label>
                  </div>
                </div>

                <!-- Estado -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_estado" class="col-sm-2 col-form-label">Estado</label>
                  </div>

                  <div class="col-md-6">
                    <p name="Fk_estado" id="Fk_estado" style="font-weight: 300!important; resize: none; width: 100%;" id="Fk_estado" rows="3" maxlength="255"><?=utf8_encode($resultados['Nome_estado'])?></p>
                </div>

              </div>

              <!-- Cidade -->
              <div class="row">
                <div class="col-md-6">
                  <label for="id_cidade" class="col-sm-2 col-form-label">Cidade</label>
                </div>
                <div class="col-md-6">

                  <p name="Fk_cidade" id="Fk_cidade" style="font-weight: 300!important; resize: none; width: 100%;" id="Fk_cidade" rows="3" maxlength="255"><?=utf8_encode($resultados['Nome_cidade'])?></p>

                </div> 
              </div> 

            </div>

           

        




</div>         
</section>
</form>  




<!-- footer -->
<?php require_once "include/footer.php"; ?>

<!-- Botão de rolagem bottom/top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- Biblioteca Boostrap -->
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Biblioteca JavaScript -->
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/popper/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/scrollreveal/scrollreveal.min.js"></script>

<!-- Formulário de Contato -->
<script src="contactform/contactform.js"></script>

<!-- Javascript perfil -->
<script src="media/js/perfil.js"></script>

<!-- Javascript Geral -->
<script src="media/js/main.js"></script>

<!-- Ajax cidades -->
<script src="media/js/ajax_cidades.js"></script>

<!-- Mascara para telefone e celular -->
<script src="media/js/mascara_numeros.js"></script>

</body>
</html>