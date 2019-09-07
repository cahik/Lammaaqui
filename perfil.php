<?php

require_once "classes/perfil.class.php";

$Mostrar_dados = new Perfil();
$Mostrar_dados->consulta();


?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Perfil</title>
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
</head>

<body>

  <?php //require_once "include/navbar.php"; ?>

  <!--/ Intro Single /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Olá, (blabla)</h1>            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single /-->


  <!-- Formulário --> 
  <section>
    <div class="container emp-profile">
      <div class="row">
        <div class="col-md-4">

          <?php include_once("include/upload_imagem.php"); ?>

          <!-- Navegação - Dados pessoais, Filtros e Match -->

          <div class="col-md-6">
            <div class="profile-head">
             <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item nav-link">Dados pessoais</li>
            </ul>
          </div>
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="inputNome">Nome</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Seu nome" value="<?=$_SESSION['dados']['Nome']?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?=$_SESSION['dados']['Email']?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" value="<?=$_SESSION['dados']['Senha']?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity" value="<?=utf8_encode($Mostrar_dados->cidade['Nome'])?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Estado</label>
                    <select id="inputState" class="form-control">

                     <option selected value="<?=utf8_decode($Mostrar_dados->estado['Nome'])?>"><?=utf8_encode($Mostrar_dados->estado['Nome'])?></option>

                   </select>
                 </div>
                 <div class="form-group col-md-3">
                  <label for="inputZip">Cep</label>
                  <input type="text" class="form-control" id="inputZip" value="<?=$_SESSION['dados']['Cep']?>">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea style="resize: none;" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$_SESSION['dados']['Descricao']?></textarea>
              </div>


              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="masculino" name="sexo" class="custom-control-input radio" value="Masculino" <?php if ($_SESSION['dados']['Sexo'] == "Masculino") {echo "checked";} ?>>
                <label class="custom-control-label" for="masculino">Masculino</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="feminino" name="sexo" class="custom-control-input radio" value="Feminino" <?php if ($_SESSION['dados']['Sexo'] == "Feminino") {echo "checked";} ?>>
                <label class="custom-control-label" for="feminino">Feminino</label>
              </div>
            </form>         
          </form>
        </div>
      </div>
    </div>  
  </div>

  <!--/  Filtros  -->

  <div class="profile-head">  
   <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Filtros</a>    
    </li> 
  </ul>

  <!-- Filtro Fuma -->
  <ul>
    <div class="row mt-4 mb-3">
     <label>Você fuma?</label>
   </div>
   <div class="row">
     <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input radio" name="Fuma" id="fsim" value="1" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "1")) {echo "checked=''";}?>>
      <label class="custom-control-label" for="fsim"><strong>Sim</strong></label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input radio" name="Fuma" id="fnao" value="0" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "0")) {echo "checked=''";}?>>
      <label class="custom-control-label" for="fnao"><strong>Não</strong></label>
    </div>
  </div>

  <!--  Filtro Aceita_fumar -->  
  <div class="row mt-4 mb-3">
   <label> Aceita fumantes?</label>
 </div>
 <div class="row">
   <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input radio" name="aceita_fumar" id="dsim" value="1" <?php if (isset($_POST['aceita_fumar']) and ($_POST['aceita_fumar'] == "1")) {echo "checked=''";}?>>
    <label class="custom-control-label" for="dsim"><strong>Sim</strong></label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input radio" name="aceita_fumar" id="dnao" value="0" <?php if (isset($_POST['aceita_fumar']) and ($_POST['aceita_fumar'] == "0")) {echo "checked=''";}?>>
    <label class="custom-control-label" for="dnao"><strong>Não</strong></label>
  </div>
</div>

<!-- Bebe? -->
<div class="row mt-4 mb-3">
 <label>Você bebe?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="bebe" id="tsim" value="1" <?php if (isset($_POST['bebe']) and ($_POST['bebe'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="tsim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="bebe" id="tnao" value="0" <?php if (isset($_POST['bebe']) and ($_POST['bebe'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="tnao"><strong>Não</strong></label>
</div>
</div>

<!-- Aceita quem bebe? -->
<div class="row mt-4 mb-3">
 <label>Aceita quem bebe?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="aceita_beber" id="asim" value="1" <?php if (isset($_POST['aceita_beber']) and ($_POST['aceita_beber'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="asim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="aceita_beber" id="anao" value="0" <?php if (isset($_POST['aceita_beber']) and ($_POST['aceita_beber'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="anao"><strong>Não</strong></label>
</div>
</div>

<!-- Tem animal? -->
<div class="row mt-4 mb-3">
 <label>Tem algum animal doméstico?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="tem_animal" id="hsim" value="1" <?php if (isset($_POST['tem_animal']) and ($_POST['tem_animal'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="hsim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="tem_animal" id="hnao" value="0" <?php if (isset($_POST['tem_animal']) and ($_POST['tem_animal'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="hnao"><strong>Não</strong></label>
</div>
</div>

<!-- Aceita animais -->
<div class="row mt-4 mb-3">
 <label>Aceita animais?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="aceita_animais" id="gsim" value="1" <?php if (isset($_POST['aceita_animais']) and ($_POST['aceita_animais'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="gsim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="aceita_animais" id="gnao" value="0" <?php if (isset($_POST['aceita_animais']) and ($_POST['aceita_animais'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="gnao"><strong>Não</strong></label>
</div>
</div>

<!-- Trabalha? -->
<div class="row mt-4 mb-3">
 <label>Trabalha?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="trabalha" id="qsim" value="1" <?php if (isset($_POST['trabalha']) and ($_POST['trabalha'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="qsim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="trabalha" id="qnao" value="0" <?php if (isset($_POST['trabalha']) and ($_POST['trabalha'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="qnao"><strong>Não</strong></label>
</div>
</div>

<!-- Estuda? -->
<div class="row mt-4 mb-3">
 <label>Estuda?</label>
</div>
<div class="row">
 <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="estuda" id="zsim" value="1" <?php if (isset($_POST['estuda']) and ($_POST['estuda'] == "1")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="zsim"><strong>Sim</strong></label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input radio" name="estuda" id="znao" value="0" <?php if (isset($_POST['estuda']) and ($_POST['estuda'] == "0")) {echo "checked=''";}?>>
  <label class="custom-control-label" for="znao"><strong>Não</strong></label>
</div>
</div>

<!-- Aceita gênero? -->
<div class="row mt-4 mb-3">
 <label>Aceita sexo?</label>
</div>
<div class="row">
  <div class="select_sexo col-md-2">
    <select class="select custom-select custom-select-sm" name="Sexo">
      <option selected>Escolha uma opção</option>
      <option value="Masculino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Masculino")) {echo "selected=''";}?>>Masculino</option>
      <option value="Feminino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Feminino")) {echo "selected=''";}?>>Feminino</option>
      <option value="NI" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "NI")) {echo "selected=''";}?>>Não me importo</option>
    </select>
  </div>
</div>

<!-- Pagar até quanto? -->
<div class="row mt-5">
 <label>Até quanto quer pagar?</label>
</div>
<input id="Aceita_pagar" type="range" name="Aceita_pagar" 
oninput="getElementById('Porcentagem').innerHTML = this.value;" 
min="0" max="5000" value="<?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?>" step="50" />
<span id="Porcentagem"><?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?></span><br><br>
</div>


<!-- Lista dos Match's -->
</ul>
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Match's</a>
  </li>
</ul>
<ul>
 <li>
  <a class="nav-link" data-toggle="tab" href="#" role="tab" aria-controls="profile" >(Usuário) deu match em você</a>
</li>  
</ul>
<br>
<div class="row">
 <button type="submit" name="Enviar" class="btn btn-b-n d-none d-md-block">Salvar alterações</button>
</div>
</div>          
</form>           
</div>

</div>
</section>

<!--/ footer Star /-->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="nav-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Sobre</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Contato</a>
            </li>              
          </ul>
        </nav>
        <div class="copyright-footer">
          <p class="copyright color-text-a">
            Desenvolvido com muita dedicação e café pelos alunos do curso de Programação em PHP
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!--   <script type="text/javascript">

    var $range = document.querySelector('#Aceita_pagar'),
    $value = document.querySelector('span');

    $range.addEventListener('#Aceita_pagar', function() {
      $value.textContent = this.value;
    });

  </script> -->

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