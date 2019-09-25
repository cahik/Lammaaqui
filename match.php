<?php

require_once "classes/selects.class.php";
require_once "classes/match.class.php";

$a = new Selects();
$a->select_pessoas();

// Lista de match
$matches = new Mostrar_matches();
$matches->mostrar();

?>
<!DOCTYPE html>
<head>

  <title>Tinder</title>
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Estilos CSS Match-->
  <link href="media/css/match.css" rel="stylesheet" type="text/css">
  <link href="media/css/busca.css" rel="stylesheet" type="text/css">
  <link href="media/css/style.css" rel="stylesheet" type="text/css">
  <link href="media/css/barra.css" rel="stylesheet" type="text/css">

  <!-- Estilos Gerais -->
  <link href="media/css/barra.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body>

  <style type="text/css">

    .match {
      margin-top: 10px;
      padding: 10px;
    }

    .foto {
      width: 50px;
      height: 50px;
      border-radius: 100%;
    }

  </style>

  <!-- Navbar -->    
  <?php //require_once "include/navbar.php"; ?>

  <!-- Titulo -->
  <div class="container">
    <section class="intro-single margemEsquerda">
      <div class="row">
        <div class="col-12">
          <div class="title-single-box">
            <h5>Aqui você pode encontrar pessoas para dividir moradia!</h5>      
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Menu -->
  <section class="margemEsquerda">
    <div class="container emp-profile">

      <!-- Navegação - Match/filtros e Lista de Match -->
      <div class="row"> 
        <div class="col-md-12">
          <div class="profile-head">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Busca</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lista de match</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Menu -->
      <div class="row">
        <div class="col-md-12">
          <div class="tab-content profile-tab" id="myTabContent">

            <!-- Match/filtros -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <!-- Formulário -->
              <form method="POST" action="">
                <!-- Obs filtros -->
                <div class="row ml-2 mr-2">
                  <div class="col-md-12">
                    <p class="mb-3"><small class="text-muted">Selecione os filtros e faça sua busca</small></p>
                    <p>
                      <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Filtros
                      </a>                    
                    </p>

                    <!-- Filtros -->
                    <div class="collapse p-3" id="collapseExample">
                      <!-- Diminuir tamanho da fonte dos filtros-->
                      <small> 
                       <!-- Pode fumar -->
                       <div class="row mb-4">                
                        <div class="col-sm">
                          <label>
                            Pode fumar?
                          </label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Fuma" id="fsim" value="1" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "1")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="fsim">
                              Sim
                            </label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Fuma" id="fnao" value="0" <?php if (isset($_POST['Fuma']) and ($_POST['Fuma'] == "0")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="fnao">
                              Não
                            </label>
                          </div>
                        </div>

                        <!-- Pode beber? -->
                        <div class="col-sm">
                          <label>
                            Pode beber?
                          </label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Bebe" id="bsim" value="1" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "1")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="bsim">
                              Sim
                            </label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Bebe" id="bnao" value="0" <?php if (isset($_POST['Bebe']) and ($_POST['Bebe'] == "0")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="bnao">
                              Não
                            </label>
                          </div>
                        </div>

                        <!-- Pode ter animal? -->
                        <div class="col-sm">
                          <label>
                            Pode ter animais?
                          </label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Tem_animal" id="tasim" value="1" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "1")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="tasim">
                              Sim
                            </label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Tem_animal" id="tanao" value="0" <?php if (isset($_POST['Tem_animal']) and ($_POST['Tem_animal'] == "0")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="tanao">
                              Não
                            </label>
                          </div>
                        </div>

                        <!-- Deve trabalhar? -->                        
                        <div class="col-sm">
                          <label>
                            Deve trabalhar?
                          </label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Trabalha" id="trsim" value="1" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "1")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="trsim">
                              Sim
                            </label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Trabalha" id="trnao" value="0" <?php if (isset($_POST['Trabalha']) and ($_POST['Trabalha'] == "0")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="trnao">
                              Não
                            </label>
                          </div>
                        </div>

                        <!-- Deve estudar? -->
                        <div class="col-sm">
                          <label>
                            Deve estudar?
                          </label><br>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Estuda" id="esim" value="1" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "1")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="esim">
                              Sim
                            </label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input radio" name="Estuda" id="enao" value="0" <?php if (isset($_POST['Estuda']) and ($_POST['Estuda'] == "0")) {echo "checked=''";} ?>>
                            <label class="custom-control-label" for="enao">
                              Não
                            </label>
                          </div>
                        </div>
                        <!-- Fim da linha de filtro "radio" -->
                      </div>

                      <!-- Aceita gênero? -->
                      <div class="row mb-4">
                        <div class="col-sm mt-2">
                          <label>
                            Aceita morar com pessoas do sexo:
                          </label>
                          <select class="select p-2" name="Sexo">
                            <option value="NI" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "NI")) {echo "selected=''";}?>>
                              Não me importo
                            </option>
                            <option value="Masculino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Masculino")) {echo "selected=''";}?>>
                              Masculino
                            </option>
                            <option value="Feminino" <?php if (isset($_POST['Sexo']) and ($_POST['Sexo'] == "Feminino")) {echo "selected=''";} ?>>
                              Feminino
                            </option>
                          </select>
                        </div>

                        <!-- Idade minima? --> 
                        <div class="col-sm mt-2">
                          <label for="menor_idade">
                            Qual a idade minima?
                          </label><br>
                          <input class="p-2" style="width: 130px;" max="100" min="18" type="number" name="menor_idade" id="menor_idade"  value="<?php if (isset($_POST['menor_idade'])) {echo $_POST['menor_idade'];} else {echo 18;} ?>">
                        </div>

                        <!-- Idade maxima? --> 
                        <div class="col-sm mt-2">
                          <label for="maior-idade">
                            Qual a idade máxima?
                          </label><br>
                          <input class="p-2" style="width: 130px;" max="100" min="18" type="number" name="maior_idade" id="maior_idade" value="<?php if (isset($_POST['maior_idade'])) {echo $_POST['maior_idade'];} else {echo 100;} ?>">
                        </div>
                        <!-- Pagar até quanto? -->
                        <div class="col-sm mt-2">
                          <label>
                            Até quanto quer pagar?
                          </label><br>
                          <span id="Porcentagem">
                            <?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;} ?>        
                          </span>
                          <input class="p-1" id="Aceita_pagar" type="range" name="Aceita_pagar" oninput="getElementById('Porcentagem').innerHTML = this.value;" min="0" max="3000" value="<?php if (isset($_POST['Aceita_pagar'])) {echo $_POST['Aceita_pagar'];} else {echo 0;} ?>" step="50" />
                        </div>
                        <!-- Fim da linha "select" -->
                      </div>
                    </small>

                    <!-- Obs filtro -->
                    <div class="row">
                      <div class="col-md-10 ">
                        <p class="float-left">
                          <small class="text-muted">
                            Caso não marque nenhuma da opções será considerado que não se importa.
                          </small>
                        </p>
                      </div>

                      <!-- Botão enviar -->
                      <div class="col-md-2">
                        <button type="submit" name="Enviar" class="d-block btn btn-b-n float-right" id="jp">
                          Enviar
                        </button>
                      </div>
                    </div>

                    <!-- Fim dos filtros -->
                  </div>
                  <!-- Fim coluna filtros -->
                </div>
                <!-- fim linha dos filtros -->
              </div>
              <!-- Fim do formulário -->
            </form>
            <!-- Fim menu filtros/match -->
          </div>

          <!-- Menu lista match -->
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                <?php foreach ($matches->resultado as $key => $value) { ?>

                  <div id="<?=$matches->resultado[$key]['Id_match']?>" class="row match ml-1 mr-1">
                    <!-- Borda -->
                    <span class="border p-2">
                      <nav class="nav">

                        <div class="col-md-auto col-sm-auto">

                          <!-- Imagem -->
                          <img class="foto" src="<?php if ($matches->resultado[$key]['Foto'] <> null) { echo 'media/images/fotos_usuarios/'.$matches->resultado[$key]['Foto'];} else { echo 'media/images/fotos_usuarios/avatar.png';} ?>">
                        </div>
                        <!-- Nome -->
                        <div class="col-md-auto col-sm-auto">
                          <a class="nav-link" href="#">
                            <small><?=utf8_encode($matches->resultado[$key]['Nome'])?></small>  
                          </a>          
                        </div>
                        <!-- Telefone -->
                        <div class="nav-link col-md-auto col-sm-auto">
                          <small><?php if ($matches->resultado[$key]['Telefone'] <> null) {echo utf8_encode($matches->resultado[$key]['Telefone']);} else {echo "Não tem telefone";}?></small>
                        </div>
                        <!-- Email -->
                        <div class="nav-link col-md-auto col-sm-auto">
                          <small><?=utf8_encode($matches->resultado[$key]['Email'])?></small>
                        </div>
                        <!-- Ver perfil -->
                        <div></div>
                        <!-- Desfazer match -->
                        <div class="nav-link col-md-auto col-sm-auto">
                          <button id="des_match" onclick="desfazer(<?=$matches->resultado[$key]['Id_match']?>)" class="btn btn-danger btn-sm mt-2">Desfazer match</button>
                        </div>
                      </nav>
                    </div>
                    <!-- Fim foreach -->
                  <?php  } ?>

                </div>
                <!-- Fim linha lista match -->
              </div>
              <!-- Borda -->
            </span>

            <!-- Fim menu lista match -->
          </div>
          <!-- Fim menu -->
        </div>
        <!-- Fim coluna do menu -->
      </div>
      <!-- Fim linha do menu -->
    </div>

    <!-- Card match -->
    <div class="row">
      <div class="col-md-6 col-sm-12 mt-2">
        <!-- Foreach para puxar os resultados do array "resultado" e mostrar os dados no card -->
        <?php foreach ($a->resultado as $chave => $valor) { ?>

          <!-- Card -->
          <div class="card cardlike card_<?=$chave?>" data-numero="<?=$chave?>" style="display: none;">             
            <div class="card-body text-center"> 
              <!-- Foto -->
              <img class="mx-auto" id="foto" src="media/images/fotos_usuarios/<?php $foto_card = $a->resultado[$chave]['Foto']; if ($foto_card == null || $foto_card == '') {echo 'avatar.png';} else {echo $foto_card;}?>">
              <!-- Nome -->
              <div class="row">
                <div class="col">
                  <h6 class="card-title mt-3">
                    <?=utf8_encode($a->resultado[$chave]['Nome'])?>    
                  </h6>
                </div>
              </div>
              <!-- Descrição -->
              <div class="row">
                <div class="col">
                  <p class="card-text my-3"><small>
                    <?=utf8_encode($a->resultado[$chave]['Descricao'])?>
                  </small></p>
                </div>
              </div>
              <!-- Botões -->               
              <div class="row">
                <!-- Like -->
                <div class="col-6">
                  <button type="button" name="like" class="btn btnlike" onclick="like( <?=$a->resultado[$chave]['Id']?>, <?=$_SESSION['dados']['Id']?>, 'like')">
                    <img id="botao" src="media/images/icons/like.png">
                  </button>
                </div>
                <!-- Dislike -->
                <div class="col-6">
                  <button type="button" name="dislike" class="btn btndislike" onclick="like( <?= $a->resultado[$chave]['Id'] ?>, <?= $_SESSION['dados']['Id']?>, 'deslike')">
                    <img id="botao" src="media/images/icons/dislike.png">
                  </button>
                </div>
                <!-- Linha botoes -->
              </div>                
              <!-- Fim card match -->
            </div>
          </div>
          <!-- Fim do Foreach -->
        <?php } ?> 
        <!-- Fim colunas match -->
      </div>
      <!-- Fim da linha match -->
    </div>
    <!-- Fim container -->
  </div>
  <!-- Fim sessão -->
</section>

<!-- Footer -->
<?php require_once "include/footer.php"; ?>

<!-- Spinner dourada -->
<div id="preloader"></div>

<!-- Biblioteca Javascript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>

<!-- Javascript match -->
<script src="media/js/match.js"></script>

<!-- Biblioteca Boostrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>

<!-- Javascript Geral -->
<script src="media/js/main.js"></script>

</body>
</html>


