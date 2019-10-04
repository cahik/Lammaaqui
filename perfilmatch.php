<?php

// Backend cidades e estados
require_once "classes/cidades_estados.class.php";

require_once "classes/perfilmatch.class.php";

if (!isset($_GET['id'])) {
  die('Usuário não encontrado.');
}

$a = new Perfilmatch();
$resultados = $a->perfilmatch($_GET['id']);


$date = date_create($resultados['Data_nascimento']);
$data_nascimento = date_format($date,"d/m/Y");

$nascimento = $resultados['Data_nascimento'];
$atual = date('Y/m/d');
$idade = intval($atual) - intval($nascimento);

?>


<!DOCTYPE html>
<head>
  <title>Visualizar Perfil</title>
  <meta charset="utf-8">
  
  <?php require_once "include/links.html"; ?>
  
</head>

<body>

  <!-- Nav Bar -->
  <?php //require_once "include/navbar.php"; ?>

  <!-- Foto, título e formulário -->
  <form method="post" enctype="multipart/form-data">
    <div class="container">
      <section class="intro-single margemEsquerda">
        <div class="row">
          <div class="col-sm-4">
            <div class="title-single-box">
              <h5 class="title-single tt"><?=utf8_encode($resultados['Nome'])?></h5>      
            </div>
          </div>


          <div class="col-sm-4"></div> 

          <div id="foto" class="col-sm-4 mt-3">
            <img src= "<?php if ($resultados['Foto'] <> null and $resultados['Foto'] <> '') {echo 'media/images/fotos_usuarios/'.$resultados['Foto'];} else {echo 'media/images/fotos_usuarios/avatar.png';}?>" width="100%" height="300" class="rounded float-right img-fluid" alt="<?php if (isset($resultados['Nome'])) {echo $resultados['Nome'];} ?>">
          </div>


        </div>
      </section>
    </div>

    <!-- Container principal perfil -->
    <section class="margemEsquerda">
      <div class="container emp-profile">

       <!-- Navegação - Dados pessoais e Filtros -->
       <div class="col-md-12">
        <div class="profile-head">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Seus dados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Preferências</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Menu -->
      <div class="row">
        <div class="col-md-12">
          <div class="tab-content profile-tab" id="myTabContent">

            <!-- Filtros -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

             <div class="row">
              <div class="col-md-6">
                <label class="col-sm-2 col-form-label">Nome</label>
              </div>
              <div class="col-md-6">
                <p class="form-control mb-3"><?=utf8_encode($resultados['Nome'])?></p>
              </div>
            </div>

            <!-- Email -->
            <div class="row">
              <div class="col-md-6">
                <label class="col-sm-2 col-form-label">Email</label>
              </div>
              <div class="col-md-6">
                <p class="form-control mb-3"><?=utf8_encode($resultados['Email'])?></p>
              </div>
            </div>

            <!-- Telefone -->
            <div class="row">
              <div class="col-md-6">
                <label class="col-sm-2 col-form-label">Telefone</label>
              </div>
              <div class="col-md-6">
               <p class="form-control mb-3"><?php if ($resultados['Telefone'] <> null) {echo $resultados['Telefone'];} else {echo "Não possui telefone";}?></p>
             </div>
           </div>

           <!-- Celular -->
           <div class="row">
            <div class="col-md-6">
              <label class="col-sm-2 col-form-label">Celular</label>
            </div>
            <div class="col-md-6">
             <p class="form-control mb-3"><?php if ($resultados['Celular'] <> null) {echo $resultados['Celular'];} else {echo "Não possui celular";}?></p>
           </div>
         </div>

         <!-- Sexo -->
         <div class="row">
          <div class="col-md-6">
            <label class="col-sm-2 col-form-label">Sexo</label>
          </div>
          <div class="col-md-6">
            <p class="form-control mb-3"><?php if($resultados['Sexo'] == 'Masculino') {echo "Masculino";} else {echo "Feminino";} ?></p>
          </div>
        </div> 

        <div class="row">
          <div class="col-md-6">
            <label class="col-sm-12 col-form-label">Data de nascimento</label>
          </div>
          <div class="col-md-6">
            <p class="form-control mb-3"><?=$data_nascimento.", <strong>".$idade." anos</strong>"?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="col-sm-12 col-form-label">Descrição</label>
          </div>
          <div class="col-md-6">
            <textarea style="resize: none; width: 100%; min-height: 182px !important;" class="form-control mb-3"><?=$resultados['Descricao']?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="col-sm-12 col-form-label">Estado que deseja morar</label>
          </div>
          <div class="col-md-6">
            <p class="form-control mb-3"><?=utf8_encode($resultados['Nome_estado'])?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label class="col-sm-12 col-form-label">Cidade que deseja morar</label>
          </div>
          <div class="col-md-6">
            <p class="form-control mb-3"><?=utf8_encode($resultados['Nome_cidade'])?></p>
          </div>
        </div> 

      </div>

      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

       <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Fuma:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Fuma'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Aceita morar com quem fuma:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Aceita_fumar'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Aceita morar com quem bebe:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Aceita_beber'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Tem animais:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Tem_animal'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Aceita morar com quem tem animais:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Aceita_animais'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Trabalha:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Trabalha'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Estuda:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Estuda'] == 1) {echo "Sim";} else {echo "Não";} ?></p>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Aceita morar com pessoas do sexo:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?php if ($resultados['Aceita_genero'] == "Masculino") {echo "Masculino";} elseif ($resultados['Aceita_genero'] == "Feminino") {echo "Feminino";} else {echo "Não se importa";} ?></p>
        </div>
      </div> 

      <div class="row">
        <div class="col-md-6">
          <label class="col-sm-12 col-form-label">Máximo que aceita pagar:</label>
        </div>
        <div class="col-md-6">
          <p class="form-control mb-3"><?="R$ ".$resultados['Aceita_pagar'].",00"?></p>
        </div>
      </div> 

    </div>

  </div>         
</section>
</form>  


<!-- footer -->
<?php require_once "include/footer.php"; ?>

<!-- Botão de rolagem bottom/top -->
<a href="#" class="back-to-top"><img style="border-radius: 100%; padding: 10px;" src="media/images/seta.jpg" height="44"></a>
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