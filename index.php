<?php

require_once "classes/site.class.php";

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

  <!--/ Carousel /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/cozinha.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">Encontre pessoas com interesses em comum</p>
                    <h1 class="intro-title mb-4">
                      <h1 class="intro-title mb-4">
                      NÃO SABE QUEM CHAMAR? <br>
                      <span class="color-b"> LLAMA AQUI </span>
                    <p class="intro-subtitle intro-price">
                      <a href="login.php"><span class="price-a">VER PERFIS</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/cama.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">Economize tempo e dinheiro </p>
                    <h1 class="intro-title mb-4">
                      <h1 class="intro-title mb-4">
                      NÃO SABE QUEM CHAMAR? <br>
                      <span class="color-b"> LLAMA AQUI </span>
                    <p class="intro-subtitle intro-price">
                      <a href="login.php"><span class="price-a">VER PERFIS</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(media/images/salona.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top mt-5">Facilite sua vida </p>
                     <h1 class="intro-title mb-4">
                      <h1 class="intro-title mb-4">
                      NÃO SABE QUEM CHAMAR? <br>
                      <span class="color-b"> LLAMA AQUI </span>
                    <p class="intro-subtitle intro-price">
                      <a href="login.php"><span class="price-a">VER PERFIS</span></a>
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
