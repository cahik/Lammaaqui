<?php

// Backend do perfil
require_once "classes/perfil.class.php";

// Upload de imagens
require_once "classes/uploader.class.php";

// Mostrar dados cadastrados e/ou alterados
$Mostrar_dados = new Perfil();
$Mostrar_dados->consulta();
$Mostrar_dados->update();

?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Perfil</title>
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
</head>

<body>

  <!-- Nav Bar -->
  <?php require_once "include/navbar.php"; ?>


  <!--/ Intro Single /-->
  <section class="intro-single margemEsquerda">
    <div class="container">
      <form method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-sm-4">
            <div class="title-single-box">
              <h5 class="title-single">Este é seu perfil, <?php if (isset($Mostrar_dados->dados_usuario['Nome'])) {echo $Mostrar_dados->dados_usuario['Nome'];}?>!</h5>        
            </div>
          </div>
          <div class="col-sm-4"></div>          
          <div class="col-sm-4 tam">
            <img src="<?php if (isset($Mostrar_dados->dados_usuario['Foto'])) { echo $Mostrar_dados->dados_usuario['Foto']; }else { echo'media/images/elenice.jpg';} ?>" class="rounded float-right img-fluid" alt="<?php if (isset($Mostrar_dados->dados_usuario['Nome'])) {echo $Mostrar_dados->dados_usuario['Nome'];}?>">

            <div class="profile-img">            
              <div class="EnviarFoto file btn btn-sm btn-primary">           
                Escolha sua foto
                <input type="file" name="arquivos[]" id="arquivos" multiple="" required="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Formulário --> 
    <section class="margemEsquerda">
      <div class="container emp-profile">
        <div class="row">        

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
        </div>

        <!-- Menu -->
        <div class="row">
          <div class="col-md-12">
            <div class="tab-content profile-tab" id="myTabContent">

              <!-- Dados pessoais -->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="row mb-4">                
                  <div class="col-md-12">
                    <label>Atualize seus dados para que as pessoas te encontrar</label>
                  </div>
                </div>

                <!-- Nome -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Nome</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="colFormLabel" value="<?php if (isset($Mostrar_dados->dados_usuario['Nome'])) {echo $Mostrar_dados->dados_usuario['Nome'];}?>" placeholder="Seu nome" name="Nome" required="">
                  </div>
                </div>

                <!-- Email -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="colFormLabel" value="<?php if (isset($Mostrar_dados->dados_usuario['Email'])) {echo $Mostrar_dados->dados_usuario['Email'];}?>" placeholder="Seu email" name="Email">
                  </div>
                </div>

                <!-- Nova senha -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm col-form-label">Nova senha <small>(se quiser mudar)</small></label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="colFormLabel" value="" name="Senha" placeholder="*******">
                  </div>
                </div>

                <!-- Telefone -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Telefone</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="colFormLabel" value="<?php if (isset($Mostrar_dados->dados_usuario['Telefone'])) {echo $Mostrar_dados->dados_usuario['Telefone'];}?>" placeholder="Ex: 3361 8244" name="Telefone">
                  </div>
                </div>

                <!-- Celular -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Celular</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="colFormLabel" value="<?php if (isset($Mostrar_dados->dados_usuario['Celular'])) {echo $Mostrar_dados->dados_usuario['Celular'];}?>" placeholder="Ex: 99961 8233" name="Celular">
                  </div>
                </div>

                <!-- Sexo -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Sexo</label>
                  </div>
                  <div class="col-md-6">

                    <!-- Masculino -->
                    <div class="custom-control custom-radio custom-control-inline dados_usuarios mb-3">
                      <input type="radio" id="masculino" name="sexo" class="custom-control-input radio" value="Masculino" <?php if (isset($Mostrar_dados->dados_usuario['Sexo']) and ($Mostrar_dados->dados_usuario['Sexo'] == "Masculino")) {echo "checked=''";}?>>
                      <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>

                    <!-- Feminino -->
                    <div class="custom-control custom-radio custom-control-inline dados_usuarios">
                      <input type="radio" id="feminino" name="sexo" class="custom-control-input radio" value="Feminino" <?php if (isset($Mostrar_dados->dados_usuario['Sexo']) and ($Mostrar_dados->dados_usuario['Sexo'] == "Feminino")) {echo "checked=''";}?>>
                      <label class="custom-control-label" for="feminino">Feminino</label>
                    </div>

                  </div>
                </div> 

                <!-- Data de nascimento -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm mb-3 col-form-label">Data de nascimento</label>
                  </div>
                  <div style="resize: none;" class="col-md-6">

                    <!-- Separar dia/mês/ano em um select para cada -->
                    <?php 

                    $data_nascimento = explode ("-", $Mostrar_dados->dados_usuario['Data_nascimento']);

                    ?>

                    <!-- Dia -->
                    <select for="colFormLabel" class="form-group col-sm-2" name="dia" class="select" required="">

                      <option value="<?php if (isset($Mostrar_dados->dados_usuario['dia'])) { echo $Mostrar_dados->dados_usuario['dia'];} else { echo '';}?>"><?php if (isset($Mostrar_dados->dados_usuario['dia'])) { echo $Mostrar_dados->dados_usuario['dia'];} else { echo 'Dia';}?></option>

                      <?php for ($i = 1; $i <= 31; $i++) {?>
                        <option><?=$i?></option>
                      <?php } ?>
                    </select>

                    <!-- Mês -->
                    <select for="colFormLabel" class="form-group col-sm-2" name="mes" class="select" required="">
                      <option value="<?php if (isset($Mostrar_dados->dados_usuario['mes'])) { echo $Mostrar_dados->dados_usuario['mes'];} else { echo '';}?>"><?php if (isset($Mostrar_dados->dados_usuario['mes'])) { echo $Mostrar_dados->dados_usuario['mes'];} else { echo 'Mês';}?></option>

                      <option value="01">Janeiro</option>
                      <option value="02">Fevereiro</option>
                      <option value="03">Março</option>
                      <option value="04">Abril</option>
                      <option value="05">Maio</option>
                      <option value="06">Junho</option>
                      <option value="07">Julho</option>
                      <option value="08">Agosto</option>
                      <option value="09">Setembro</option>
                      <option value="10">Outubro</option>
                      <option value="11">Novembro</option>
                      <option value="12">Dezembro</option>
                    </select>

                    <!-- Ano -->
                    <select for="colFormLabel" class="form-group col-sm-2" name="ano" class="select" required="">

                      <option value="<?php if (isset($Mostrar_dados->dados_usuario['ano'])) { echo $Mostrar_dados->dados_usuario['ano'];} else { echo '';}?>"><?php if (isset($Mostrar_dados->dados_usuario['ano'])) { echo $Mostrar_dados->dados_usuario['ano'];} else { echo 'Ano';}?></option>

                      <?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
                        <option><?=$i?></option>
                      <?php } ?>
                    </select>

                  </div>
                </div>

                <!-- Descrição -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Descrição</label>
                  </div>
                  <div class="col-md-4">
                    <textarea style="resize: none;" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Essa é a descrição que seu perfil mostrará nas buscas de perfil" required=""><?php if (isset($Mostrar_dados->dados_usuario['Descricao'])) {echo $Mostrar_dados->dados_usuario['Descricao'];}?></textarea>
                  </div>
                </div>   

                <!-- Onde quero morar -->
                <div class="row">
                  <div class="col-md-12">
                    <label for="colFormLabel" class="col-sm mb-3 mt-3 col-form-label">Onde quero morar:</label>
                  </div>
                </div>

                <!-- Estado -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Estado</label>
                  </div>

                  <!-- Estado -->
                  <div class="col-md-6">
                   <select id="inputState" class="form-control mb-3" name="estado">

                    <?php while ($resultado = mysqli_fetch_array($Mostrar_dados->resultado_estado)) { ?>

                      <option <?php if ($resultado['Nome_estado'] == $_SESSION['dados']['Nome_estado']) {echo "selected";}?> value="<?=$resultado['Id_estado']?>"><?=utf8_encode($resultado['Nome_estado'])?></option>

                    <?php }?>
                  </select>
                </div>
              </div>

              <!-- Cidade -->
              <div class="row">
                <div class="col-md-6">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Cidade</label>
                </div>
                <div class="col-md-6">
                  <select id="inputCity" class="form-control mb-3" name="cidade">

                    <?php foreach ($Mostrar_dados->resultado_cidade as $chave => $valor) { ?>

                      <option <?php if ($Mostrar_dados->resultado_cidade[$chave]['Nome_cidade'] == $_SESSION['dados']['Nome_cidade']) {echo "selected";}?> value="<?=$Mostrar_dados->resultado_cidade[$chave]['Id_cidade']?>"><?=utf8_encode($Mostrar_dados->resultado_cidade[$chave]['Nome_cidade'])?></option>

                    <?php } ?> 
                  </select>                
                </div> 
              </div> 

            </div>

            <!-- Filtros -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              <div class="row mb-4">                
                <div class="col-md-12">
                  <label>Se não marcar nenhuma das opções será considerado que não se importa</label>
                </div>
              </div>

              <!-- Filtro Fuma -->
              <div class="row">                
                <div class="col-md-6">
                  <label>Você fuma?</label>
                </div>
                <div class="col-md-6 mb-3">
                 <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input radio" name="Fuma" id="fsim" value="1" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "1")) {echo "checked=''";}?>>
                  <label class="custom-control-label" for="fsim">Sim</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input radio" name="Fuma" id="fnao" value="0" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "0")) {echo "checked=''";}?>>
                  <label class="custom-control-label" for="fnao">Não</label>
                </div>
              </div>
            </div>

            <!--  Filtro Aceita_fumar --> 
            <div class="row">
              <div class="col-md-6">
                <label>Aceita fumantes?</label>
              </div>
              <div class="col-md-6 mb-3">
               <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input radio" name="aceita_fumar" id="dsim" value="1" <?php if (isset($_POST['aceita_fumar']) and ($_POST['aceita_fumar'] == "1")) {echo "checked=''";}?>>
                <label class="custom-control-label" for="dsim">Sim</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input radio" name="aceita_fumar" id="dnao" value="0" <?php if (isset($_POST['aceita_fumar']) and ($_POST['aceita_fumar'] == "0")) {echo "checked=''";}?>>
                <label class="custom-control-label" for="dnao">Não</label>
              </div>
            </div>
          </div>

          <!-- Bebe? -->
          <div class="row">
            <div class="col-md-6">
              <label>Você bebe?</label>
            </div>
            <div class="col-md-6 mb-3">
             <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="bebe" id="tsim" value="1" <?php if (isset($_POST['bebe']) and ($_POST['bebe'] == "1")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="tsim">Sim</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="bebe" id="tnao" value="0" <?php if (isset($_POST['bebe']) and ($_POST['bebe'] == "0")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="tnao">Não</label>
            </div>
          </div>
        </div>

        <!-- Aceita quem bebe? --> 
        <div class="row">
          <div class="col-md-6">
            <label>Aceita quem bebe?</label>
          </div>
          <div class="col-md-6 mb-3">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="aceita_beber" id="asim" value="1" <?php if (isset($_POST['aceita_beber']) and ($_POST['aceita_beber'] == "1")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="asim">Sim</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="aceita_beber" id="anao" value="0" <?php if (isset($_POST['aceita_beber']) and ($_POST['aceita_beber'] == "0")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="anao">Não</label>
            </div>
          </div>
        </div>

        <!-- Tem animal? -->
        <div class="row">
          <div class="col-md-6">
            <label>Tem algum animal doméstico?</label>
          </div>
          <div class="col-md-6 mb-3">
           <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input radio" name="tem_animal" id="hsim" value="1" <?php if (isset($_POST['tem_animal']) and ($_POST['tem_animal'] == "1")) {echo "checked=''";}?>>
            <label class="custom-control-label" for="hsim">Sim</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input radio" name="tem_animal" id="hnao" value="0" <?php if (isset($_POST['tem_animal']) and ($_POST['tem_animal'] == "0")) {echo "checked=''";}?>>
            <label class="custom-control-label" for="hnao">Não</label>
          </div>
        </div>
      </div>

      <!-- Aceita animais -->
      <div class="row">
        <div class="col-md-6">
          <label>Aceita animais?</label>
        </div>
        <div class="col-md-6 mb-3">
         <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input radio" name="aceita_animais" id="gsim" value="1" <?php if (isset($_POST['aceita_animais']) and ($_POST['aceita_animais'] == "1")) {echo "checked=''";}?>>
          <label class="custom-control-label" for="gsim">Sim</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input radio" name="aceita_animais" id="gnao" value="0" <?php if (isset($_POST['aceita_animais']) and ($_POST['aceita_animais'] == "0")) {echo "checked=''";}?>>
          <label class="custom-control-label" for="gnao">Não</label>
        </div>
      </div>
    </div>

    <!-- Trabalha? -->
    <div class="row">
      <div class="col-md-6">
        <label>Trabalha?</label>
      </div>
      <div class="col-md-6 mb-3">
       <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input radio" name="trabalha" id="qsim" value="1" <?php if (isset($_POST['trabalha']) and ($_POST['trabalha'] == "1")) {echo "checked=''";}?>>
        <label class="custom-control-label" for="qsim">Sim</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input radio" name="trabalha" id="qnao" value="0" <?php if (isset($_POST['trabalha']) and ($_POST['trabalha'] == "0")) {echo "checked=''";}?>>
        <label class="custom-control-label" for="qnao">Não</label>
      </div>
    </div>
  </div>

  <!-- Estuda? -->
  <div class="row">
    <div class="col-md-6">
      <label>Estuda?</label>
    </div>
    <div class="col-md-6 mb-3">
     <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input radio" name="estuda" id="zsim" value="1" <?php if (isset($_POST['estuda']) and ($_POST['estuda'] == "1")) {echo "checked=''";}?>>
      <label class="custom-control-label" for="zsim">Sim</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input radio" name="estuda" id="znao" value="0" <?php if (isset($_POST['estuda']) and ($_POST['estuda'] == "0")) {echo "checked=''";}?>>
      <label class="custom-control-label" for="znao">Não</label>
    </div>
  </div>
</div>

<!-- Aceita gênero? -->
<div class="row">
  <div class="col-md-6">
    <label>Aceita morar com pessoas do sexo:</label>
  </div>
  <div class="col-md-4 mb-3">
   <div class="select_sexo">
    <select class="select custom-select custom-select" name="Sexo">
      <option selected>Escolha uma opção</option>
      <option value="Masculino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Masculino")) {echo "selected=''";}?>>Masculino</option>
      <option value="Feminino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Feminino")) {echo "selected=''";}?>>Feminino</option>
      <option value="NI" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "NI")) {echo "selected=''";}?>>Não me importo</option>
    </select>
  </div>
</div>
</div>

<!-- Pagar até quanto? -->
<div class="row mb-3">
  <div class="col-md-6">
    <label>Até quanto quer pagar?</label>
  </div>
  <div class="col-md-6">
    <input id="Aceita_pagar" type="range" name="Aceita_pagar" 
    oninput="getElementById('Porcentagem').innerHTML = this.value;" 
    min="0" max="5000" value="<?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?>" step="50" />
    <span id="Porcentagem"><?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;}?></span><br><br>
  </div>
</div>                                        
</div>

</div>

<!-- Botão salvar -->
<div class="row">
  <div class="col-md-12">
   <button type="submit" name="salvarDados" class="btn salvarDados mt-5 float-right">Salvar alterações</button>
 </div>
</div>

</div>
</div>
</div>

<!-- Lista dos Match's -->
<div class="row listaMatch">
  <div class="col-sm-1">
  </div>
  <div class="col-md-10">
    <div class="profile-head">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Match's</a>
        </li>
      </ul>
      <div class="row mt-5">
        <div class="col-md-6">
          <label>"Usuário banco de dados com tabela de like recebido"</label>
        </div>
        <div class="col-md-6">
          <a href="#">Analisar</a>
        </div>
      </div>
    </div>         
  </div>
</div>

</form>  
</div>         
</section>


<!-- footer -->
<?php require_once "include/footer.php"; ?>

<!-- Botão de rolagem bottom/top -->
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

<!-- Function Ajax cidade/estado -->
<script src="media/js/ajax_cidades.js"></script>

</body>
</html>