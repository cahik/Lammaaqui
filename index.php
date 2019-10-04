<?php

require_once "classes/site.class.php";

$Iniciar = new Site;

?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Llama Aqui</title>
  
  <!-- Carrossel -->
  <link href="media/css/font-awesome.min.css" rel="stylesheet">
  <link href="media/css/animate.min.css" rel="stylesheet">
  <link href="media/css/ionicons.min.css" rel="stylesheet">
  <link href="media/css/owl.carousel.min.css" rel="stylesheet">

  <?php require_once "include/links.html"; ?>

</head>
<body>

  <?php require_once "include/navbar.php"; ?>

  <!-- Carrossel -->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/salona.jpg)"><!-- cozinha -->
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">Encontre pessoas com interesses em comum!</p>
                    <h1 class="intro-title mb-4">
                      NÃO SABE QUEM CHAMAR?
                      <br>
                      <span class="color-b"> LLAMA AQUI </span>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="cadastro.php"><span class="price-a">Comece agora!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/cozinha.jpg)"><!-- cama -->
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">Seu bolso agradece!</p>
                    <h1 class="intro-title mb-4">
                      Economize tempo
                      <br>
                      <span class="color-b"> E DINHEIRO </span>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="cadastro.php"><span class="price-a">Comece agora!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/cama.jpg)"><!-- salona -->
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">A vida é muito curta pra passar sozinho!</p>
                    <h1 class="intro-title mb-4">
                      Faça novas
                      <br>
                      <span class="color-b"> AMIZADES </span>
                    </h1>
                    <p class="intro-subtitle intro-price">
                      <a href="cadastro.php"><span class="price-a">Comece agora!</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--/ Carousel /-->

  <!--/ Sobre  /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">        
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Aqui você encontra</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <img width="50"  src="media/images/2.png">
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Divisão de aluguel</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
               Encontrará pessoas para dividir os custos com o aluguel, condomínio, luz, água, internet (UFA!) e o que mais vocês decidirem.
             </p>
           </div>
         </div>
       </div>

       <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <img width="50" src="media/images/1.png">
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Gente boa</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
              Nossos filtros de pesquisa permitem você encontrar pessoas que se encaixem em suas preferências.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-box-c foo">
          <div class="card-header-c d-flex">
            <div class="card-box-ico">
              <img width="50" src="media/images/3.png">
            </div>
            <div class="card-title-c align-self-center">
              <h2 class="title-c">Parceria</h2>
            </div>
          </div>
          <div class="card-body-c">
            <p class="content-c">
             Além de gastar menos com aluguel, irá dividir a moradia com uma pessoa que pode ser parceria para vários roles, ou até para dividir a mesa num jantar de quinta a noite.
           </p>
         </div>
       </div>
     </div>
   </div>
 </div>
</section>
<!--/ Sobre /-->

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
<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="media/js/main.js"></script>

</body>
</html>
