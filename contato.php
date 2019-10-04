<?php

require_once "classes/contato.class.php";

$Mandar_contato = new Contato();

if (isset($_POST['Enviar'])) {
  $Mandar_contato->mandar_mensagem();
}

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Contato</title>
  
  <?php require_once "include/links.html"; ?>
  
</head>

<body>

  <?php require_once "include/navbar.php"; ?>

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8">

          <?php
          require_once "include/alertas.php";
          ?> 

        </div>
      </div> 
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Fale com a gente</h1>
          </div>
        </div> 
      </div> 
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <form class="form-a" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="text" name="nome" class="form-control form-control-lg form-control-a" placeholder="Nome" required="" value="<?php if (isset($_SESSION['dados'])) {echo utf8_encode($_SESSION['dados']['Nome']);}?>">
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email" required="" value="<?php if (isset($_SESSION['dados'])) {echo $_SESSION['dados']['Email'];}?>">
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <input type="text" name="assunto" class="form-control form-control-lg form-control-a" placeholder="Assunto" required="">
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea name="mensagem" class="form-control" name="message" cols="45" rows="8" required="" placeholder="Mensagem"></textarea>
                  <div class="validation"></div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <button type="submit" name="Enviar" class="btn btn-a">Enviar Mensagem</button>
              </div>
            </div>
          </form>
        </div>
      </div>                    
    </div>
  </div>
</div>
</section>
<!--/ Fim do formulário /-->

<!-- Footer -->
<?php require_once "include/footer.php"; ?>

<!-- Botão de rolagem bottom/top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"><img style="border-radius: 100%; padding: 10px;" src="media/images/seta.jpg" height="44"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/popper/popper.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/scrollreveal/scrollreveal.min.js"></script>

<!-- Template Main Javascript File -->
<script src="media/js/main.js"></script>

</body>
</html>
