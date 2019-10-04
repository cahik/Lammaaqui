<?php

// Backend do perfil
require_once "classes/perfil.class.php";

// Upload de imagens
require_once "classes/uploader.class.php";

// Backend cidades e estados
require_once "classes/cidades_estados.class.php";


// Mostrar dados cadastrados e/ou alterados
$Mostrar_dados = new Perfil();
$Mostrar_dados->consulta();
$Mostrar_dados->update();

?>

<!DOCTYPE html>
<head>
  <title>Perfil</title>
  <meta charset="utf-8">
  
  <?php require_once "include/links.html"; ?>
  
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

            <?php
            require_once "include/alertas.php";
            ?>
            
            <div class="title-single-box">
              <h5 class="title-single tt">Oi, <?=utf8_encode($Mostrar_dados->dados_usuario['Nome'])?>!</h5>      
            </div>
          </div>


          <div class="col-sm-4"></div> 

          <div id="foto" class="col-sm-4 mt-3 tam" onmouseover="foto()" onmouseout="tirar_foto()">
            <img src= "<?php if ($Mostrar_dados->dados_usuario['Foto'] <> null and $Mostrar_dados->dados_usuario['Foto'] <> '') {echo 'media/images/fotos_usuarios/'.$Mostrar_dados->dados_usuario['Foto'];} else {echo 'media/images/fotos_usuarios/avatar.png';}?>" width='100%' height='300' class="rounded float-right img-fluid" alt="<?php if (isset($Mostrar_dados->dados_usuario['Nome'])) {echo $Mostrar_dados->dados_usuario['Nome'];} ?>">

            <div class="camera">             
              <center>
                <div class="profile-img">
                  <label style="cursor: pointer;" for="arquivos"><img src="media/images/camera.jpg" width="100%"></label>
                  <input type="file" class="input_foto" name="arquivos[]" id="arquivos" multiple="" >
                </div>
              </center>
            </div>

            <center>
              <p><strong style="color:#ebbf31;">Atenção!</strong> Alterações na imagem serão carregadas após clicar em "salvar alterações".</p>
            </center>

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
                    <label>Atualize seus dados para que as pessoas possam te encontrar</label>
                  </div>
                </div>

                <!-- Nome -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_nome" class="col-sm-2 col-form-label">Nome</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control mb-3" id="id_nome" value="<?=utf8_encode($Mostrar_dados->dados_usuario['Nome'])?>" placeholder="Seu nome" name="Nome" required="">
                  </div>
                </div>

                <!-- Email -->
                <div class="row">
                  <div class="col-md-6">
                    <label class="col-sm-2 col-form-label">Email</label>
                  </div>
                  <div class="col-md-6">
                    <p class="form-control mb-3 text-muted"><?=utf8_encode($Mostrar_dados->dados_usuario['Email'])?></p>
                  </div>
                </div>

                <!-- Nova senha -->
                <div class="row">
                  <div class="col-md-6">
                    <label class="col-sm col-form-label">Nova senha</label>
                  </div>
                  <div class="col-md-6">
                    <a href="send_email.php" class="form-control mb-3" name="Senha"><small>Se quiser mudar sua senha, clique aqui.</small></a>
                  </div>
                </div>

                <!-- Telefone -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control mb-3" id="telefone" value="<?=$Mostrar_dados->dados_usuario['Telefone']?>" placeholder="Operadora + número de telefone" name="Telefone" maxlength="10">

                  </div>
                </div>

                <!-- Celular -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="celular" class="col-sm-2 col-form-label">Celular</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control mb-3" id="celular" value="<?=$Mostrar_dados->dados_usuario['Celular']?>" placeholder="Operadora + número de celular" name="Celular" maxlength="11">
                  </div>
                </div>

                <!-- Sexo -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                  </div>
                  <div class="col-md-6">

                    <!-- Masculino -->
                    <div class="custom-control custom-radio custom-control-inline dados_usuarios mb-3">
                      <input type="radio" id="masculino" name="sexo" class="custom-control-input radio" value="Masculino" <?php if ($Mostrar_dados->dados_usuario['Sexo'] == "Masculino") {echo "checked=''";}?>>
                      <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>

                    <!-- Feminino -->
                    <div class="custom-control custom-radio custom-control-inline dados_usuarios">
                      <input type="radio" id="feminino" name="sexo" class="custom-control-input radio" value="Feminino" <?php if ($Mostrar_dados->dados_usuario['Sexo'] == "Feminino") {echo "checked=''";}?>>
                      <label class="custom-control-label" for="feminino">Feminino</label>
                    </div>

                  </div>
                </div> 

                <!-- Data de nascimento -->
                <div class="row">

                  <div class="col-md-6">
                    <label class="col-sm mb-3 col-form-label">Data de nascimento</label>
                  </div>
                  <div style="resize: none;" class="col-md-6">

                    <!-- Separar dia/mês/ano em um select para cada -->
                    <?php $data_nascimento = explode ("-", $Mostrar_dados->dados_usuario['Data_nascimento']); ?>

                    <!-- Dia -->
                    <select class="select col-sm-3 mb-2" name="dia" required="">

                      <?php for ($i = 1; $i <= 31; $i++) {?>
                        <option <?php if ($data_nascimento[2] == $i) {echo "selected";} ?> ><?=$i?></option>
                      <?php } ?>
                    </select>

                    <!-- Mês -->
                    <select class="select col-sm-4 mb-2" name="mes" required="">

                      <option <?php if ($data_nascimento[1] == '01') {echo "selected";} ?> value="01">Janeiro</option>
                      <option <?php if ($data_nascimento[1] == '02') {echo "selected";} ?> value="02">Fevereiro</option>
                      <option <?php if ($data_nascimento[1] == '03') {echo "selected";} ?> value="03">Março</option>
                      <option <?php if ($data_nascimento[1] == '04') {echo "selected";} ?> value="04">Abril</option>
                      <option <?php if ($data_nascimento[1] == '05') {echo "selected";} ?> value="05">Maio</option>
                      <option <?php if ($data_nascimento[1] == '06') {echo "selected";} ?> value="06">Junho</option>
                      <option <?php if ($data_nascimento[1] == '07') {echo "selected";} ?> value="07">Julho</option>
                      <option <?php if ($data_nascimento[1] == '08') {echo "selected";} ?> value="08">Agosto</option>
                      <option <?php if ($data_nascimento[1] == '09') {echo "selected";} ?> value="09">Setembro</option>
                      <option <?php if ($data_nascimento[1] == '10') {echo "selected";} ?> value="10">Outubro</option>
                      <option <?php if ($data_nascimento[1] == '11') {echo "selected";} ?> value="11">Novembro</option>
                      <option <?php if ($data_nascimento[1] == '12') {echo "selected";} ?> value="12">Dezembro</option>

                    </select>

                    <!-- Ano -->
                    <select class="select col-sm-4 mb-2" name="ano" required="">

                      <?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) {?>
                        <option <?php if ($data_nascimento[0] == $i) {echo "selected";} ?> ><?=$i?></option>
                      <?php } ?>
                    </select>

                  </div>
                </div>

                <!-- Descrição -->
                <div class="row">
                  <div class="col-md-6">
                    <label for="id_descricao" class="col-sm-2 col-form-label">Descrição</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="Descricao" id="id_descricao" style="resize: none; width: 100%;" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escreva uma descrição para mostrar aos outros usuários quão legal você é." maxlength="255"><?=utf8_encode($Mostrar_dados->dados_usuario['Descricao'])?></textarea>
                  </div>
                </div>

                <!-- Estado -->
                <div class="row mt-3">
                  <div class="col-md-6">
                    <label for="id_estado" class="col-sm-12 col-form-label">Estado que deseja morar</label>
                  </div>

                  <div class="col-md-6">
                   <select id="id_estado" class="form-control mb-3" name="estado" required onchange="executar_ajax()">

                    <?php foreach ($Mostrar_cid_est->resultado_estados as $chave => $valor) { ?>

                      <option <?php if ($Mostrar_dados->dados_usuario['Fk_estado'] == $Mostrar_cid_est->resultado_estados[$chave]['Id_estado']) {echo "selected";} ?> value="<?=$Mostrar_cid_est->resultado_estados[$chave]['Id_estado']?>"><?=utf8_encode($Mostrar_cid_est->resultado_estados[$chave]['Nome_estado'])?></option>

                    <?php } ?>

                  </select>
                </div>

              </div>

              <!-- Cidade -->
              <div class="row">
                <div class="col-md-6">
                  <label for="id_cidade" class="col-sm-12 col-form-label">Cidade que deseja morar</label>
                </div>
                <div class="col-md-6">

                  <select id="id_cidade" class="form-control mb-3" name="cidade" required>

                    <?php

                    $Mostrar_cid_est->Mostrar_cidades();

                    foreach ($Mostrar_cid_est->resultado_cidades as $chave => $valor) { ?>

                      <option <?php if ($Mostrar_cid_est->resultado_cidades[$chave]['Id_cidade'] == $Mostrar_dados->dados_usuario['Fk_cidade']) {echo "selected";} ?> value="<?=$Mostrar_cid_est->resultado_cidades[$chave]['Id_cidade']?>"><?=utf8_encode($Mostrar_cid_est->resultado_cidades[$chave]['Nome_cidade'])?></option>

                    <?php } ?>

                  </select>

                </div> 
              </div> 

            </div>

            <!-- Filtros -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              <div class="row mb-4">                
                <div class="col-md-12">
                  <label>Por favor marque todas as opções para que a sua busca de perfil possa ocorrer sem futuros erros.</label>
                </div>
              </div>

              <!-- Filtro Fuma -->
              <div class="row">                
                <div class="col-md-6">
                  <label>Você fuma?</label>
                </div>
                <div class="col-md-6 mb-3">
                 <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input radio" name="Fuma" id="fsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Fuma']) and ($Mostrar_dados->dados_usuario['Fuma'] == "1")) {echo "checked=''";}?>>
                  <label class="custom-control-label" for="fsim">Sim</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" class="custom-control-input radio" name="Fuma" id="fnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Fuma']) and ($Mostrar_dados->dados_usuario['Fuma'] == "0")) {echo "checked=''";}?>>
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
                <input type="radio" class="custom-control-input radio" name="Aceita_fumar" id="dsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_fumar']) and ($Mostrar_dados->dados_usuario['Aceita_fumar'] == "1")) {echo "checked=''";}?>>
                <label class="custom-control-label" for="dsim">Sim</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input radio" name="Aceita_fumar" id="dnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_fumar']) and ($Mostrar_dados->dados_usuario['Aceita_fumar'] == "0")) {echo "checked=''";}?>>
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
              <input type="radio" class="custom-control-input radio" name="Bebe" id="tsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Bebe']) and ($Mostrar_dados->dados_usuario['Bebe'] == "1")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="tsim">Sim</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="Bebe" id="tnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Bebe']) and ($Mostrar_dados->dados_usuario['Bebe'] == "0")) {echo "checked=''";}?>>
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
              <input type="radio" class="custom-control-input radio" name="Aceita_beber" id="asim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_beber']) and ($Mostrar_dados->dados_usuario['Aceita_beber'] == "1")) {echo "checked=''";}?>>
              <label class="custom-control-label" for="asim">Sim</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input radio" name="Aceita_beber" id="anao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_beber']) and ($Mostrar_dados->dados_usuario['Aceita_beber'] == "0")) {echo "checked=''";}?>>
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
            <input type="radio" class="custom-control-input radio" name="Tem_animal" id="hsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Tem_animal']) and ($Mostrar_dados->dados_usuario['Tem_animal'] == "1")) {echo "checked=''";}?>>
            <label class="custom-control-label" for="hsim">Sim</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input radio" name="Tem_animal" id="hnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Tem_animal']) and ($Mostrar_dados->dados_usuario['Tem_animal'] == "0")) {echo "checked=''";}?>>
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
          <input type="radio" class="custom-control-input radio" name="Aceita_animais" id="gsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_animais']) and ($Mostrar_dados->dados_usuario['Aceita_animais'] == "1")) {echo "checked=''";}?>>
          <label class="custom-control-label" for="gsim">Sim</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input radio" name="Aceita_animais" id="gnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_animais']) and ($Mostrar_dados->dados_usuario['Aceita_animais'] == "0")) {echo "checked=''";}?>>
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
        <input type="radio" class="custom-control-input radio" name="Trabalha" id="qsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Trabalha']) and ($Mostrar_dados->dados_usuario['Trabalha'] == "1")) {echo "checked=''";}?>>
        <label class="custom-control-label" for="qsim">Sim</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input radio" name="Trabalha" id="qnao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Trabalha']) and ($Mostrar_dados->dados_usuario['Trabalha'] == "0")) {echo "checked=''";}?>>
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
      <input type="radio" class="custom-control-input radio" name="Estuda" id="zsim" value="1" <?php if (isset($Mostrar_dados->dados_usuario['Estuda']) and ($Mostrar_dados->dados_usuario['Estuda'] == "1")) {echo "checked=''";}?>>
      <label class="custom-control-label" for="zsim">Sim</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input radio" name="Estuda" id="znao" value="0" <?php if (isset($Mostrar_dados->dados_usuario['Estuda']) and ($Mostrar_dados->dados_usuario['Estuda'] == "0")) {echo "checked=''";}?>>
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
    <select name="Aceita_genero" class="custom-select">
      <option value="Masculino" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_genero']) and ($Mostrar_dados->dados_usuario['Aceita_genero'] == "Masculino")) {echo "selected=''";}?>>Masculino</option>
      <option value="Feminino" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_genero']) and ($Mostrar_dados->dados_usuario['Aceita_genero'] == "Feminino")) {echo "selected=''";}?>>Feminino</option>
      <option value="Não me importo" <?php if (isset($Mostrar_dados->dados_usuario['Aceita_genero']) and utf8_encode($Mostrar_dados->dados_usuario['Aceita_genero']) == "Não me importo") {echo "selected=''";}?>>Não me importo</option>
      
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
    <input id="Aceita_pagar" class="p-1" type="range" name="Aceita_pagar" 
    oninput="getElementById('Porcentagem').innerHTML = this.value;" 
    min="0" max="3000" value="<?php if (isset($Mostrar_dados->dados_usuario['Aceita_pagar'])) {echo $Mostrar_dados->dados_usuario['Aceita_pagar'];} else {echo 0;}?>" step="50" />
    <span id="Porcentagem"><?php if (isset($Mostrar_dados->dados_usuario['Aceita_pagar'])) {echo $Mostrar_dados->dados_usuario['Aceita_pagar'];} else {echo 0;}?></span><br><br>
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


</div>         
</section>
</form>  


<!-- footer -->
<?php require_once "include/footer.php"; ?>

<!-- Botão de rolagem bottom/top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"><img style="border-radius: 100%; padding: 10px;" src="media/images/seta.jpg" height="44"></i></a>
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
